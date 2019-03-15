<?php

namespace App\Http\Controllers;

use JavaScript;
use App\Movie;
use App\Category;
use App\Person;
use App\User;
use App\Website;
use App\Page;
use App\Font;
use App\Text;
use App\Color;
use App\Picture;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    /**
     * Display a movie.
     *
     * @param mixed $movie
     * @return view
     */
    public function showMovie($movie)
    {
        // get resources for display
        $website = Website::where('name','flooflix')->first();
        if (!is_null($website) && !empty($website)) {
            $page = Page::where('website_id', $website->id)->where('name','film')->first();
            if(!is_null($page) && !empty($page)){
                $datas = $page->getResourcesToDisplayPage($page);
            }    
        }else{
            return view('errors.404');
        }

        // get movie
        $movie = Movie::where('title', $movie)->first();
        // get user
        $user = auth()->user('id');
        // define status for movie
        $status = "not acquired";
        if(!is_null($user) && !empty($user)){
            // get grade of movie from user
            $grade = DB::table('movie_user')->select('grade')->where('user_id',$user->id)->where('movie_id',$movie->id)->first();
            //get user's movies
            $movies = $user->movies()->get();
            if(!is_null($movies) && !empty($movies)){
                foreach($movies as $item){
                    if($item->id == $movie->id){
                        $status = 'acquired';
                    }
                }
            }
        }
        // get average ratings
        $grades = DB::table('movie_user')->select('grade')->where('movie_id',$movie->id)->get();
    
        if (!is_null($grades) && !empty($grades) && count($grades) != 0) {
            $total = 0;
            $total_grades = count($grades);
            foreach ($grades as $item){
                $total = $total + $item->grade;
            }
            $average = $total/$total_grades;
            switch ($average) {
                case ($average < 1.5) : 
                    $average = 1;
                    break;
                case ($average >= 1.5 && $average <= 2 && $average < 2.5) :
                    $average = 2;
                    break;
                case ($average >= 2.5 && $average <= 3 && $average < 3.5) :
                    $average = 3;
                    break;
                case ($average >= 3.5 && $average <= 4 && $average < 4.5) :
                    $average = 4;
                    break;
                case ($average >= 4.5 && $average = 5) :
                    $average = 4;
                    break;
            }
        } else {
            $average = null;
        }

        $film_directors = $movie->getFilmDirectors();
        $actors = $movie->getActors();
        $people = $movie->people()->get();
        $categories = Category::all();
        $pictures = Picture::all();

        return view('Flooflix.movie',compact('movie','datas','categories','pictures','film_directors','actors','people','status','average','grade'));
    }

    /**
     * Add movie in shopping cart.
     *
     * @param  \App\Movie $movie
     * @return view
     */
    public function addMovieInShoppingCart(Movie $movie)
    {
        // get user
        $user = auth()->user('id');
        // check user
        if (is_null($user) || empty($user)) {
            return back()->with('messageError','Vous devez être inscrit et identifié pour ajouter des films au panier.');
        } else { 
            // get session values with movies title
            $session = session()->all();
            // check if movie title exists in session
            foreach($session as $key => $value){  
                if($key == $movie->title){
                    return back()->with('messageError','Ce film est déjà ajouté au panier.');
                }
            }
            // put in session: movie
            session()->put($movie->title,$movie);
            // get title for url movie page
            $movie = $movie->title;
            return redirect()->route('movie',$movie)->with('message','le film a bien été ajouté au panier.');
        }   
    }

    /**
     * Add movie by research.
     *
     * @param \Illuminate\Http\Request  $request
     * @return view
     */
    public function showMovieByResearch(Request  $request)
    {
        $search = $request->search;
        $words = explode(" ",$search);
        $q = "";
        foreach ($words as $word) {
            $q .= '%'.$word;
        };
        $q .= '%';
        $movie = Movie::where('title', 'like', $q)->first();
        if (is_null($movie)) {
            return back()->with('messageError','Aucun film ne correspond à votre recherche');
        } else { 
            $movie = $movie->title;
            return redirect()->route('movie',$movie);
        }
        
    }
    
    /*
    |--------------------------------------------------------------------------
    | FONCTIONS FOR FLOOFLIX WEBSITE MANAGEMENT
    |--------------------------------------------------------------------------
    |
    | These functions are used for managing the site for its owner.
    |
    */

    /**
     * Displays the view movies management. 
     * @param \Illuminate\Http\Request  $request
     * @return view
     */
    public function moviesManagement(Request $request)
    {
        // chek if request exists
        if (isset($request->category) && !is_null($request->category) && !empty($request->category)) {
            $category = Category::find($request->category)->id;
        }else{
            $category = Category::first()->id;
        }
        // get movies for this category
        $movies_by_category = Movie::where('category_id',$category)->get();
        // use static functions in App/movie for stats for a category
        $stats_by_category = Movie::getStats($movies_by_category);
        $total_sales_by_category = 0;
        foreach($stats_by_category as $key => $value){
            $total_sales_by_category += $stats_by_category[$key]['total_sales'];
        }
        $top_copies_by_category = Movie::getMovieWithMaxCopiesSold($stats_by_category);
        $min_copies_by_category = Movie::getMovieWithMinCopiesSold($stats_by_category);
        // use static functions in App/movie for stats for all movies
        $movies = Movie::all();
        $stats = Movie::getStats($movies);
        $total_sales = 0;
        foreach($stats as $key => $value){
            $total_sales += $stats[$key]['total_sales'];
        }
        $top_copies = Movie::getMovieWithMaxCopiesSold($stats);
        $min_copies = Movie::getMovieWithMinCopiesSold($stats);
        
        
        // get categories for display select in form
        $categories = Category::all();
        Javascript::put([
            'category' => $category
        ]);
        return view('Flooflix_websiteManagement.moviesManagement',compact('movies','movies_by_category','top_copies_by_category','min_copies_by_category','top_copies','min_copies','total_sales_by_category','total_sales','categories'));
    }

    /**
     * Displays the movies list. 
     *
     * @return view
     */
    public function moviesList()
    {
        $movies = Movie::all();
        $movies_grades = [];
        foreach ($movies as $movie) {  
            $grades = DB::table('movie_user')->select('grade')->where('movie_id',$movie->id)->get();
            if (!is_null($grades) && !empty($grades) && count($grades) != 0) {
                $total = 0;
                $total_grades = count($grades);
                foreach ($grades as $item){
                    $total = $total + $item->grade;
                }
                $average = $total/$total_grades;
                switch ($average) {
                    case ($average < 1.5) : 
                        $average = 1;
                        break;
                    case ($average >= 1.5 && $average <= 2 && $average < 2.5) :
                        $average = 2;
                        break;
                    case ($average >= 2.5 && $average <= 3 && $average < 3.5) :
                        $average = 3;
                        break;
                    case ($average >= 3.5 && $average <= 4 && $average < 4.5) :
                        $average = 4;
                        break;
                    case ($average >= 4.5 && $average = 5) :
                        $average = 4;
                        break;
                }
            } else {
                $average = null;
            }
            $movies_grade[$movie->id] = $average;
        }
        // Pagination
        $movies = Movie::orderBy('created_at', 'DESC')->paginate(15);
        $categories = Category::all();
        $people = Person::all();
        return view('Flooflix_websiteManagement.moviesList',compact('movies','people','categories','movies_grade'));
    }

    /**
     * Add movie by research.
     *
     * @param \Illuminate\Http\Request  $request
     * @return view
     */
    public function showMovieByResearchInWebsiteManagement(Request  $request)
    {
        //dd($request->search);
        $search = $request->search;
        $words = explode(" ",$search);
        $q = "";
        foreach ($words as $word) {
            $q .= '%'.$word;
        };
        $q .= '%';
        $movie = Movie::where('title', 'like', $q)->first();
        if (is_null($movie)) {
            return back()->with('messageError','Aucun film ne correspond à votre recherche');
        } else { 
            $movie = $movie->id;
            return redirect()->route('movie.informations',$movie);
        }
        
    }

    /**
     * Displays the customers list for amovie. 
     *
     * @param \App\Movie  $movie
     * @return view
     */
    public function customersList($movie)
    {
        $customers = DB::table('movie_user')->select('user_id','created_at','price')->where(['movie_id' => $movie])->orderBy('created_at','desc')->get();
        //dd($customers);
        $users = [];
        foreach($customers as $item){
            $user = User::find($item->user_id);
            $users[] = ['user' => $user,'date' => $item->created_at,'price' => $item->price];
        }
        //dd($users);
        return view('Flooflix_websiteManagement.customersList',compact('users'));
    }

    /**
     * Displays the movies informations.
     *
     * @param  \App\Movie  $movie
     * @return view
     */
    public function showMovieInformations(Movie $movie)
    {
        $movies = Movie::all();
        $pictures = Picture::all();
        $categories = Category::all();
        $people = Person::all();
        return view('Flooflix_websiteManagement.movieInformations',compact('movie','movies','pictures','people','categories'));
    }

    /* functions for displays forms to store movies informations by step */

    /**
     * Show the form for creating a new movie.
     *
     * @return view
     */
    public function createStep1()
    {    
        $categories = Category::all();
        return view('Flooflix_websiteManagement.forms.movie.createMovieStep1', compact('categories'));
    }

    /**
     * Show the form for creating a new movie.(step2)
     *
     * @param \App\Movie $movie
     * @return view
     */
    public function createStep2($movie)
    {
        $movie = Movie::find($movie);
        // get all film directors
        $film_directors = DB::table('movie_person')->select('person_id')->where(['job' => 'film_director'])->get();
        $collection = array();
        foreach ($film_directors as $film_director) {
            $dir = Person::find($film_director->person_id);
            $collection[$dir->id]  = $dir->last_name . ' ' . $dir->first_name;
        }
        // Sort the table in alphabetical order
        natcasesort($collection); 
        $film_directors = $collection;
        
        return view('Flooflix_websiteManagement.forms.movie.createMovieStep2', compact('film_directors','movie'));
    }

    /**
     * Show the form for creating a new movie.(step3)
     *
     * @param \App\Movie $movie
     * @return view
     */
    public function createStep3($movie)
    {  
        $movie = Movie::find($movie);
        // get all actors
        $actors = DB::table('movie_person')->select('person_id')->where(['job' => 'actor'])->get();
        $collection = array();
        foreach ($actors as $actor) {
            $dir = Person::find($actor->person_id);
            $collection[$dir->id]  = $dir->last_name . ' ' . $dir->first_name;
        }
        // Sort the table in alphabetical order
        natcasesort($collection); 
        $actors = $collection;
        return view('Flooflix_websiteManagement.forms.movie.createMovieStep3', compact('actors','movie'));
    }

    /**
     * Show the form for creating a new movie.(step4)
     *
     * @param \App\Movie $movie
     * @return view
     */
    public function createStep4($movie)
    {  
        $pictures = Picture::all();
        $collection = array();
        foreach ($pictures as $picture) {
            $collection[$picture->id] = $picture->name;
        }
        // Sort the table in alphabetical order
        natcasesort($collection); 
        $pictures = $collection;
        return view('Flooflix_websiteManagement.forms.movie.createMovieStep4', compact('pictures','movie'));
    }

    /**
     * Show the form for creating a new movie.(step5)
     *
     * @param \App\Movie $movie
     * @return view
     */
    public function createStep5($movie)
    {  
        $movie = Movie::find($movie);
        return view('Flooflix_websiteManagement.forms.movie.createMovieStep5', compact('movie'));
    }

    /** Functions to store movies informations by step */

    /**
     * Store a newly created movie in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function storeStep1(Request $request)
    {
        // Validate fields
        request()->validate(['category' => ['required','string']]);
        request()->validate(['title' => ['required','string']]);
        request()->validate(['release_date' =>['required','date']]);
        request()->validate(['duration' => ['required','string']]);
        request()->validate(['price' => ['required','numeric']]);
        request()->validate(['synopsis' => ['required', 'string']]);

        $category = $request->category;
        $title = $request->title;
        $date = $request->release_date;
        $duration = $request->duration;
        $synopsis = $request->synopsis;
        $price = $request->price;
        
        $movies = Movie::all();
        foreach ($movies as $item) {
            if(($item->title == $title) && ($item->duration == $duration)){
                return back()->with('message', 'Ce film est déjà enregistré');
            }
        }
        $movie = Movie::where('title',$title)->first();
        
        //save Datas
        $movie = new Movie;
        $movie->title = strtoupper($title);
        $movie->release_date = $date;
        $movie->category_id = $category;
        $movie->duration = $duration;
        $movie->synopsis = $synopsis;
        $movie->price = $price;
        $movie->save();

        return redirect()->route('create.movie.step2',[$movie])->with('message','Les données pour le film "'. $movie->title .'" ont bien été enregistrées.');      
    }

    /**
     * Store a newly created movie in storage.
     * 
     * @param  \App\movie $movie
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function storeStep2(Request $request, Movie $movie)
    {
        // Validate fields
        if(isset($request->last_name) && isset($request->first_name)){
            request()->validate(['last_name' => ['required','string']]);
            request()->validate(['first_name'=>['required','string']]);
            $last_name = $request->last_name;
            $first_name = $request->first_name;
        } elseif (isset($request->film_director)) {
            request()->validate(['film_director'=>['required','string']]);
        }
        if (isset($last_name) && isset($first_name) && !is_null($last_name) && !is_null($first_name) && is_string($last_name) && is_string($first_name)) {
            //check if person exists in database
            $person = Person::where('last_name',$last_name)->where('first_name',$first_name)->first();
            //save Datas
            if($person == null){
                $person = new Person;
                $person->last_name = ucfirst(strtolower($last_name));
                $person->first_name = ucfirst(strtolower($first_name));
                $person->save(); 
            } 
            // associate movie with film director
            $test_person = DB::table('movie_person')->select('person_id')->where(['movie_id' => $movie->id,'person_id' => $person->id])->first();
            $job = DB::table('movie_person')->select('job')->where(['movie_id' => $movie->id,'person_id' => $person->id])->first();
            if ($job != null) {
                $job = $job->job;
            }
            if($job == 'film_director'){
                return redirect()->route('create.movie.step2',[$movie])->with('message',"Le réalisateur/réalisatrice ". $person->last_name . ' ' . $person->first_name .' a déjà été enregistré(e)');
            }
            if($test_person != null && $job != 'film_director'){
                DB::table('movie_person')->where(['movie_id' => $movie->id,'person_id' => $person->id])->update(['job' => 'film_director,actor']);
            }else{
                DB::table('movie_person')->insert(['movie_id' => $movie->id,'person_id' => $person->id,'job' => 'film_director']);
            }

            return redirect()->route('create.movie.step2',[$movie])->with('message','Le réalisateur/réalisatrice '. $person->first_name . ' ' . $person->last_name .' a bien été enregistré');      
        } else {
            return back()->with('mesage','messageError',"Une erreur est survenue lors de l'enregistrement des données.");
        }
        if(isset($request->film_director) && !is_null($request->film_director) && is_string($request->film_director)) {
            // save datas
            $film_director = explode(' ',$request->film_director);
            $film_director_last_name = $film_director[0];
            $film_director_first_name = $film_director[1];
            $person = Person::where(['last_name'=>$film_director_last_name,'first_name'=>$film_director_first_name])->first();
            // associate movie with film director
            $test_person = DB::table('movie_person')->select('person_id')->where(['movie_id' => $movie->id,'person_id' => $person->id])->first();
            $job = DB::table('movie_person')->select('job')->where(['movie_id' => $movie->id,'person_id' => $person->id])->first();
            if ($job != null) {
                $job = $job->job;
            }
            if($job == 'film_director'){
                return redirect()->route('create.movie.step2',[$movie])->with('message',"Le réalisateur/réalisatrice ". $person->last_name . ' ' . $person->first_name .' a déjà été enregistré(e)');
            }
            if($test_person != null && $job != 'film_director'){
                DB::table('movie_person')->where(['movie_id' => $movie->id,'person_id' => $person->id])->update(['job' => 'film_director,actor']);
            }else{
                DB::table('movie_person')->insert(['movie_id' => $movie->id,'person_id' => $person->id,'job' => 'film_director']);
            }
            return redirect()->route('create.movie.step2',[$movie])->with('message','Le réalisateur '. $person->first_name . ' ' . $person->last_name .' a bien été enregistré');
        } else {
            return back()->with('messageError',"Une erreur est survenue lors de l'enregistrement des données");
        }    
    }

    /**
     * Store a newly created movie in storage.
     * @param  \App\movie $movie
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function storeStep3(Request $request, Movie $movie)
    {
        // Validate fields 
        if(isset($request->last_name) && isset($request->first_name)){
            request()->validate(['last_name' => ['required','string']]);
            request()->validate(['first_name'=>['required','string']]);
            $last_name = $request->last_name;
            $first_name = $request->first_name;
        } elseif (isset($request->actor)) {
            request()->validate(['actor'=>['required','string']]);
        }
        if (isset($last_name) && isset($first_name) && !is_null($last_name) && !is_null($first_name) && is_string($last_name) && is_string($first_name)) {
            // save Datas
            $person = Person::where('last_name',$last_name)->where('first_name',$first_name)->first();
            if($person == null){
                $person = new Person;
                $person->last_name = ucfirst(strtolower($last_name));
                $person->first_name = ucfirst(strtolower($first_name));
                $person->save(); 
            }
            // associate movie with actor
            $test_person = DB::table('movie_person')->select('person_id')->where(['movie_id' => $movie->id,'person_id' => $person->id])->first();
            $job = DB::table('movie_person')->select('job')->where(['movie_id' => $movie->id,'person_id' => $person->id])->first();
            if ($job != null) {
                $job = $job->job;
            }
            if($job == 'actor'){
                return redirect()->route('create.movie.step2',[$movie])->with('message',"Le réalisateur/réalisatrice ". $person->last_name . ' ' . $person->first_name .' a déjà été enregistré(e)');
            }
            if($test_person != null && $job != 'actor'){
                DB::table('movie_person')->where(['movie_id' => $movie->id,'person_id' => $person->id])->update(['job' => 'film_director,actor']);
            }else{
                DB::table('movie_person')->insert(['movie_id' => $movie->id,'person_id' => $person->id,'job' => 'actor']);
            }
            return redirect()->route('create.movie.step3',[$movie])->with('message',"L'acteur/actrice ". $person->first_name . ' ' . $person->last_name .' a bien été enregistré');      

        } elseif(isset($request->actor) && !is_null($request->actor) && is_string($request->actor)) {
            //save datas    
            $actor = explode(' ',$request->actor);
            $actor_last_name = $actor[0];
            $actor_first_name = $actor[1];
            $person = Person::where(['last_name'=>$actor_last_name,'first_name'=>$actor_first_name])->first();
            // associate movie with actor
            $test_person = DB::table('movie_person')->select('person_id')->where(['movie_id' => $movie->id,'person_id' => $person->id])->first();
            $job = DB::table('movie_person')->select('job')->where(['movie_id' => $movie->id,'person_id' => $person->id])->first();
            if ($job != null) {
                $job = $job->job;
            }
            if($job == 'actor'){
                return redirect()->route('create.movie.step2',[$movie])->with('message',"Le réalisateur/réalisatrice ". $person->last_name . ' ' . $person->first_name .' a déjà été enregistré(e)');
            }
            if($test_person != null && $job != 'actor'){
                DB::table('movie_person')->where(['movie_id' => $movie->id,'person_id' => $person->id])->update(['job' => 'film_director,actor']);
            }else{
                DB::table('movie_person')->insert(['movie_id' => $movie->id,'person_id' => $person->id,'job' => 'actor']);
            }
            return redirect()->route('create.movie.step3',[$movie])->with('message',"L'acteur/actrice ". $person->first_name . ' ' . $person->last_name .' a bien été enregistré');
        } else {
            return back()->with('messageError',"Une erreur est survenue lors de l'enregistrement des données");
        }    
    }

    /**
     * Store a newly created movie in storage.
     * @param  \App\movie $movie
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function storeStep4(Request $request, Movie $movie)
    {
        //Validate fields
        if(isset($request->picture1)){
            request()->validate(['picture1' => ['required','string']]);
        } elseif (isset($request->picture2) && isset($request->name)) {
            request()->validate(['name' => ['required','string']]);
            request()->validate(['picture2' => ['required','file','image']]);
        }
        if(isset($request->picture1) && !is_null($request->picture1) && is_string($request->picture1)){
            $picture =  Picture::where('name', $request->picture1)->first();
            $movie->picture_id = $picture->id;
            $movie->save();
        } 
        
        if($request->hasFile('picture2') && $request->file('picture2')->isValid()){   
            // Get the extension file
            $extension = $request->picture2->extension();
            // Modify jpeg extension
            if($extension == "jpeg"){
                $extension = "jpg";
            }
            // Data verification
            if (isset($request->name) && !is_null($request->name) && !empty($request->name) && is_string($request->name)) {
                // Store picture in local storage
                $res = $request->picture2->storeAs('public/images', $request->name . '.' . $extension);
                // Create path for style tag
                $path = 'storage/images/' . $request->name . '.' . $extension;
                // Save Path for style tag
                $picture = New Picture;
                $picture->name = $request->name;
                $picture->link = $res;
                $picture->style = $path;
                $picture->save();
                $movie->picture_id = $picture->id;
                $movie->save();
            } else {
                return redirect()->route('create.movie.step4',[$movie])->with('messageError', "Un problème est survenu lors de l'enregistrement des données."); 
            }      
        }else{
            return redirect()->route('create.movie.step4',[$movie])->with('messageError', "l'image n'a pas été reconnu par le système.");
        }
        return redirect()->route('create.movie.step5',[$movie])->with('message',"L'image " . $picture->name . " a bien été ajoutée");  
    }

    /**
     * Store a newly created movie in storage.
     * @param  \App\movie $movie
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function storeStep5(Request $request, Movie $movie)
    {
        //Validate fields
        request()->validate(['trailer' => ['required','string']]);
        request()->validate(['movie' => ['required','string']]);
        
        $link_trailer = $request->trailer;
        $link_movie = $request->movie;
        
        if(isset($link_trailer) && !is_null($link_trailer) && is_string($link_trailer) && isset($link_movie) && !is_null($link_movie) && is_string($link_movie)){
            $movie->link_trailer = $link_trailer;
            $movie->link_movie = $link_movie;
            $movie->save();
        return redirect()->route('movie.informations',$movie);
        }else{
            return back()->with('messageError',"Un problème est survenu lors de l'enregistrement des données.");
        }
    }
    
    /*
    |--------------------------------------------------------------------------
    | FONCTIONS TO EDIT AND UPDATE ONE MOVIE
    |--------------------------------------------------------------------------
    |
    | These functions are used to edit and update informations from movie informations page.
    |
    */

    /** 
     * Show the form for editing the category movie.
     *
     * @param  \App\Movie  $movie
     * @return view
     */
    public function editCategory(Movie $movie)
    {
        $categories = Category::all();
        return view('Flooflix_websiteManagement.forms.movie.editCategory', compact('movie','categories'));
    }

    /**
     * Update the category movie.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return view
     */
    public function updateCategory(Request $request, Movie $movie)
    {
        //Validate fields
        request()->validate(['category' => ['required','string']]);

        $movie->category_id =  $request->category;
        $movie->save();
        return redirect()->route('movie.informations',$movie)->with('message','La catégorie a bien été modifié');
    }

    //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    /** 
     * Show the form for editing the picture.
     *
     * @param  \App\Movie  $movie
     * @return view
     */
    public function editPoster(Movie $movie)
    {
        $pictures = Picture::all();
        $collection = array();
        foreach ($pictures as $picture) {
            $collection[$picture->id] = $picture->name;
        }
        natcasesort($collection); 
        $pictures = $collection;
        return view('Flooflix_websiteManagement.forms.movie.editPoster', compact('pictures','movie'));
    }

    /**
     * Update the poster.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return view
     */
    public function updatePoster(Request $request, Movie $movie)
    {

        //Validate field
        if(isset($request->picture1) && !is_null($request->picture1) && is_string($request->picture1)){
            $picture =  Picture::where('name', $request->picture1)->first();
            $movie->picture_id = $picture->id;
            $movie->save();
        } elseif($request->hasFile('picture2') && $request->file('picture2')->isValid()){   
            // Get the extension file
            $extension = $request->picture2->extension();
            
            // Modify jpeg extension
            if($extension == "jpeg"){
                $extension = "jpg";
            }
            // Data verification
            if (isset($request->name) && !is_null($request->name) && !empty($request->name) && is_string($request->name)) {
                // Store picture in local storage
                $res = $request->picture2->storeAs('public/images', $request->name . '.' . $extension);
                dump($res);
    
                // Create path for style tag
                $path = 'storage/images/' . $request->name . '.' . $extension;
                
                // Save Path for style tag
                $picture = New Picture;
                $picture->name = $request->name;
                $picture->link = $res;
                $picture->style = $path;
                $picture->save();
                $movie->picture_id = $picture->id;
                $movie->save();
            } else {
                return redirect()->route('movie.informations',[$movie])->with('messageError', "Un problème est survenu lors de l'enregistrement des données."); 
            }      
        }else{
            return redirect()->route('movie.informations',[$movie])->with('messageError', "l'image n'a pas été reconnu par le système.");
        }
        return redirect()->route('movie.informations',[$movie])->with('message',"L'image " . $picture->name . " a bien été ajoutée");
    }
    //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    /** 
     * Show the form for editing the title movie.
     *
     * @param  \App\Movie  $movie
     * @return view
     */
    public function editTitle(Movie $movie)
    {
        return view('Flooflix_websiteManagement.forms.movie.editTitle', compact('movie'));
    }

    /**
     * Update the title movie.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return view
     */
    public function updateTitle(Request $request, Movie $movie)
    {
        //Validate fields
        request()->validate(['title' => ['required','string']]);

        $movie->title = strtoupper($request->title);
        $movie->save();
        return redirect()->route('movie.informations',$movie)->with('message','Le titre a bien été modifié');
    }
    //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    /** 
     * Show the form for editing the duration movie.
     *
     * @param  \App\Movie  $movie
     * @return view
     */
    public function editDuration(Movie $movie)
    {
        return view('Flooflix_websiteManagement.forms.movie.editDuration', compact('movie'));
    }

    /**
     * Update the duration movie.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return view
     */
    public function updateDuration(Request $request, Movie $movie)
    {
        //Validate fields
        request()->validate(['duration' => ['required','string']]);

        $movie->duration =  $request->duration;
        $movie->save();
        return redirect()->route('movie.informations',$movie)->with('message','La durée a bien été modifiée');
    }
    //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    /** 
     * Show the form for editing the release date.
     *
     * @param  \App\Movie  $movie
     * @return view
     */
    public function editReleaseDate(Movie $movie)
    {
        return view('Flooflix_websiteManagement.forms.movie.editReleaseDate', compact('movie'));
    }

    /**
     * Update the release date.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return view
     */
    public function updateReleaseDate(Request $request, Movie $movie)
    {
        //Validate fields
        request()->validate(['release_date' => ['required','date']]);

        $movie->release_date =  $request->release_date;
        $movie->save();
        return redirect()->route('movie.informations',$movie)->with('message','La date de sortie a bien été modifiée');
    }
    //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    /** 
     * Show the form for editing the price.
     *
     * @param  \App\Movie  $movie
     * @return view
     */
    public function editPrice(Movie $movie)
    {
        return view('Flooflix_websiteManagement.forms.movie.editPrice', compact('movie'));
    }

    /**
     * Update the price.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return view
     */
    public function updatePrice(Request $request, Movie $movie)
    {
        //Validate fields
        request()->validate(['price' => ['required','numeric']]);

        $movie->price =  $request->price;
        $movie->save();
        return redirect()->route('movie.informations',$movie)->with('message','Le prix a bien été modifiée');
    }
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    /** 
     * Show the form for editing the synopsis.
     *
     * @param  \App\Movie  $movie
     * @return view
     */
    public function editSynopsis(Movie $movie)
    {
        return view('Flooflix_websiteManagement.forms.movie.editSynopsis', compact('movie'));
    }

    /**
     * Update the synopsis.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return view
     */
    public function updateSynopsis(Request $request, Movie $movie)
    {
        //Validate fields
        request()->validate(['synopsis' => ['required','string']]);

        $movie->synopsis = $request->synopsis;
        $movie->save();
        return redirect()->route('movie.informations',$movie)->with('message','Le synopsis a bien été modifié');
    }
    //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    /** 
     * Show the form for add film director.
     *
     * @param  \App\Movie  $movie
     * @return view
     */
    public function addFilmDirector(Movie $movie)
    {
        $film_directors = DB::table('movie_person')->select('person_id')->where(['job' => 'film_director'])->get();
        $collection = array();
        foreach ($film_directors as $film_director) {
            $dir = Person::find($film_director->person_id);
            $collection[$dir->id]  = $dir->last_name . ' ' . $dir->first_name;
        }
        natcasesort($collection); 
        $film_directors = $collection;
        return view('Flooflix_websiteManagement.forms.movie.addFilmDirector', compact('movie','film_directors'));
    }

    /**
     * Store film director for movie.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return view
     */
    public function storeFilmDirector(Request $request, Movie $movie)
    {
        // validate fields
        if(isset($request->last_name) && isset($request->first_name) && !is_null($request->last_name) && !is_null($request->first_name)){
            request()->validate(['last_name' => ['required','string']]);
            request()->validate(['first_name'=>['required','string']]);
            $last_name = $request->last_name;
            $first_name = $request->first_name;
        } elseif (isset($request->film_director) && !is_null($request->film_director) ) {
            request()->validate(['film_director'=>['required','string']]);
        } else {
            request()->validate(['last_name' => ['required','string']]);
            request()->validate(['first_name'=>['required','string']]);
            request()->validate(['film_director'=>['required','string']]);
        }
        
        if (isset($last_name) && isset($first_name) && !is_null($last_name) && !is_null($first_name) && is_string($last_name) && is_string($first_name)) {
            //save Datas
            $person = Person::where('last_name',$last_name)->where('first_name',$first_name)->first();
            if($person == null){
                $person = new Person;
                $person->last_name = ucfirst(strtolower($last_name));
                $person->first_name = ucfirst(strtolower($first_name));
                $person->save(); 
            }

            // associate movie with film_directior
            $test_person = DB::table('movie_person')->select('person_id')->where(['movie_id' => $movie->id,'person_id' => $person->id])->first();
            $job = DB::table('movie_person')->select('job')->where(['movie_id' => $movie->id,'person_id' => $person->id])->first();
            if ($job != null) {
                $job = $job->job;
            }
            if($job == 'film_director'){
                return redirect()->route('movie.informations',[$movie])->with('message',"Le réalisateur/réalisatrice ". $person->last_name . ' ' . $person->first_name .' a déjà été enregistré(e)');
            }
            if($test_person != null && $job != 'film_director'){
                DB::table('movie_person')->where(['movie_id' => $movie->id,'person_id' => $person->id])->update(['job' => 'film_director,actor']);
            }else{
                DB::table('movie_person')->insert(['movie_id' => $movie->id,'person_id' => $person->id,'job' => 'film_director']);
            }
            return redirect()->route('movie.informations',[$movie])->with('message',"Le réalisateur/réalisatrice ". $person->last_name . ' ' . $person->first_name .' a bien été enregistré(e)');      

        } elseif(isset($request->film_director) && !is_null($request->film_director) && is_string($request->film_director)) {
            //save datas
            $film_director = explode(' ',$request->film_director);
            $fd_last_name = $film_director[0];
            $fd_first_name = $film_director[1];
            $person = Person::where(['last_name'=>$fd_last_name,'first_name'=>$fd_first_name])->first();
            // associate movie with film_directior
            $test_person = DB::table('movie_person')->select('person_id')->where(['movie_id' => $movie->id,'person_id' => $person->id])->first();
            $job = DB::table('movie_person')->select('job')->where(['movie_id' => $movie->id,'person_id' => $person->id])->first();
            if ($job != null) {
                $job = $job->job;
            }
            if($job == 'film_director'){
                return redirect()->route('movie.informations',[$movie])->with('message',"Le réalisateur/réalisatrice ". $person->last_name . ' ' . $person->first_name .' a déjà été enregistré(e)');
            }
            if($test_person != null && $job != 'film_director'){
                DB::table('movie_person')->where(['movie_id' => $movie->id,'person_id' => $person->id])->update(['job' => 'film_director,actor']);
            }else{
                DB::table('movie_person')->insert(['movie_id' => $movie->id,'person_id' => $person->id,'job' => 'film_director']);
            }
            return redirect()->route('movie.informations',[$movie])->with('message',"Le réalisateur/réalisatrice ". $person->last_name . ' ' . $person->first_name .' a bien été enregistré(e)');
        } else {
            return back()->with('messageError',"Une erreur est survenue lors de l'enregistrement des données");
        } 
    }
    /**
     * Remove the film director from list.
     *
     * @param  \App\Movie  $movie
     * @param  \app\Person $person
     * @return view
     */
    public function deleteFilmDirector(Movie $movie,Person $person)
    {
        DB::table('movie_person')->where(['movie_id' => $movie->id,'person_id' => $person->id])->delete();
        return redirect()->route('movie.informations',$movie)->with('message','Le réalisateur/réalisatrice a bien été supprimé(e) de la liste');
    }

    //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    /** 
     * Show the form for add actor.
     *
     * @param  \App\Movie  $movie
     * @return view
     */
    public function addActor(Movie $movie)
    {

        $actors = DB::table('movie_person')->select('person_id')->where(['job' => 'actor'])->get();
        $collection = array();
        foreach ($actors as $actor) {
            $dir = Person::find($actor->person_id);
            $collection[$dir->id]  = $dir->last_name . ' ' . $dir->first_name;
        }
        natcasesort($collection); 
        $actors = $collection;
        return view('Flooflix_websiteManagement.forms.movie.addActor', compact('movie','actors'));
    }

    /**
     * Store actor for movie.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return view
     */
    public function storeActor(Request $request, Movie $movie)
    {
        // validate fields
        if(isset($request->last_name) && isset($request->first_name) && !is_null($request->last_name) && !is_null($request->first_name)){
            request()->validate(['last_name' => ['required','string']]);
            request()->validate(['first_name'=>['required','string']]);
            $last_name = $request->last_name;
            $first_name = $request->first_name;
        } elseif (isset($request->actor) && !is_null($request->actor) ) {
            request()->validate(['actor'=>['required','string']]);
        } else {
            request()->validate(['last_name' => ['required','string']]);
            request()->validate(['first_name'=>['required','string']]);
            request()->validate(['actor'=>['required','string']]);
        }
        
        // save fields
        if (isset($last_name) && isset($first_name) && !is_null($last_name) && !is_null($first_name) && is_string($last_name) && is_string($first_name)) {
            //save Datas
            $person = Person::where('last_name',$last_name)->where('first_name',$first_name)->first();
            if($person == null){
                $person = new Person;
                $person->last_name = ucfirst(strtolower($last_name));
                $person->first_name = ucfirst(strtolower($first_name));
                $person->save(); 
            }
            // associate movie with actor
            $test_person = DB::table('movie_person')->select('person_id')->where(['movie_id' => $movie->id,'person_id' => $person->id])->first();
            $job = DB::table('movie_person')->select('job')->where(['movie_id' => $movie->id,'person_id' => $person->id])->first();
            if ($job != null) {
                $job = $job->job;
            }
            if($job == 'actor'){
                return redirect()->route('movie.informations',[$movie])->with('message',"L'acteur/actrice ". $person->last_name . ' ' . $person->first_name .' a déjà été enregistré(e)');
            }
            if($test_person != null && $job != 'actor'){
                DB::table('movie_person')->where(['movie_id' => $movie->id,'person_id' => $person->id])->update(['job' => 'film_director,actor']);
            }else{
                DB::table('movie_person')->insert(['movie_id' => $movie->id,'person_id' => $person->id,'job' => 'actor']);
            }
            return redirect()->route('movie.informations',[$movie])->with('message',"L'acteur/actrice ". $person->last_name . ' ' . $person->first_name .' a bien été enregistré(e)');      

        } else {
            return back()->with('messageError',"Une erreur est survenue lors de l'enregistrement des données");
        }
        if(isset($request->actor) && !is_null($request->actor) && is_string($request->actor)) {
            //save datas
            $actor = explode(' ',$request->actor);
            $actor_last_name = $actor[0];
            $actor_first_name = $actor[1];
            $person = Person::where(['last_name'=>$actor_last_name,'first_name'=>$actor_first_name])->first();
            $job = DB::table('movie_person')->select('job')->where(['movie_id' => $movie->id,'person_id' => $person->id])->first();
            if ($job != null) {
                $job = $job->job;
            }
            if($job == 'actor'){
                return redirect()->route('movie.informations',[$movie])->with('message',"L'acteur/actrice ". $person->last_name . ' ' . $person->first_name .' a déjà été enregistré(e)');
            }
            // associate movie with actor
            $test_person = DB::table('movie_person')->select('person_id')->where(['movie_id' => $movie->id,'person_id' => $person->id])->first();
            if($test_person != null && $job != 'actor'){
                DB::table('movie_person')->where(['movie_id' => $movie->id,'person_id' => $person->id])->update(['job' => 'film_director,actor']);
            }else{
                DB::table('movie_person')->insert(['movie_id' => $movie->id,'person_id' => $person->id,'job' => 'actor']);
            }
            return redirect()->route('movie.informations',[$movie])->with('message',"L'acteur/actrice ". $person->last_name . ' ' . $person->first_name .' a bien été enregistré(e)');
        } else {
            return back()->with('messageError',"Une erreur est survenue lors de l'enregistrement des données");
        } 
    }

    /**
     * Remove the actor from list.
     *
     * @param  \App\Movie  $movie
     * @param  \app\Person $person
     * @return view
     */
    public function deleteActor(Movie $movie,Person $person)
    {
        DB::table('movie_person')->where(['movie_id' => $movie->id,'person_id' => $person->id])->delete();
        return redirect()->route('movie.informations',$movie)->with('message',"L'acteur/actrice a bien été supprimé(e) de la liste");
    }

    //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    /** 
     * Show the form for editing the trailer link.
     *
     * @param  \App\Movie  $movie
     * @return view
     */
    public function editTrailerLink(Movie $movie)
    {
        return view('Flooflix_websiteManagement.forms.movie.editTrailerLink', compact('movie'));
    }

    /**
     * Update the trailer link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return view
     */
    public function updateTrailerLink(Request $request, Movie $movie)
    {
        //Validate fields
        request()->validate(['trailer' => ['required','string']]);
       // dd($request->trailer);

        $movie->link_trailer = $request->trailer;
        $movie->save();
        return redirect()->route('movie.informations',$movie)->with('message','Le lien pour la bande annonce a bien été modifié');
    }
    //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    /** 
     * Show the form for editing the movie link.
     *
     * @param  \App\Movie  $movie
     * @return view
     */
    public function editMovieLink(Movie $movie)
    {
        return view('Flooflix_websiteManagement.forms.movie.editMovieLink', compact('movie'));
    }

    /**
     * Update the movie link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return view
     */
    public function updateMovieLink(Request $request, Movie $movie)
    {
        //Validate fields
        request()->validate(['movie' => ['required','string']]);

        $movie->link_movie = $request->movie;
        $movie->save();
        return redirect()->route('movie.informations',$movie)->with('message','Le lien pour la vidéo a bien été modifié');
    }
}
