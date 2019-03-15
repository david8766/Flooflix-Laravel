<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use App\Mail\ResetPassword;
use Carbon\Carbon;
use App\User;
use App\Role;
use App\BankCard;
use App\Category;
use App\Movie;
use App\Website;
use App\Page;
use App\Text;
use App\Font;
use App\Color;
use App\Picture;
use JavaScript;

class UserController extends Controller
{
    /**
     * Show the form for creating a new user.
     *
     * @return View
     */
    public function create()
    {
        //get ressources for display
        $website = Website::where('name', 'flooflix')->first();
        $page = Page::where('website_id', $website->id)->where('name', 'inscription')->first(); 
        $datas = $page->getResourcesToDisplayPage($page);
        return view('flooflix.forms.createUser',compact('datas'));
    }

    /**
     * Store a new user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return View
     */
    public function store(Request $request)
    {
        // Validate the fields
        request()->validate([
            'last_name' => ['required','string'],
            'first_name' => ['required','string'],
            'email' => ['required','email'],
            'login' =>['required','string'],
            'password' => ['required','string'],
            'birth_date' => ['required','date']
        ]);

        // Data verification
        if(isset($request->last_name) && isset($request->first_name) && isset($request->email) && isset($request->login) && isset($request->password) && isset($request->birth_date) && !is_null($request->last_name) && !is_null($request->first_name)  && !is_null($request->email) && !is_null($request->login) && !is_null($request->password) && !is_null($request->birth_date) && !empty($request->last_name) && !empty($request->first_name) && !empty($request->email) && !empty($request->login) && !empty($request->password) && !empty($request->birth_date) && is_string($request->last_name) && is_string($request->first_name) && is_string($request->email) && is_string($request->login) && is_string($request->password) && is_string($request->birth_date)){ 
            // Check if login or email exists in database
            $users = User::all();
            foreach ($users as $user) {
                if(($user->login == $request->login)){
                    return back()->with('message', 'Ce login existe déjà.');
                }
            }   
            foreach ($users as $user) {
                if(($user->email == $request->email)){
                    return back()->with('message', 'Cette adresse email existe déjà.');
                }
            }   
            // Save datas
            $user = new User;
            $user->last_name = ucfirst(strtolower(e($request->last_name)));
            $user->first_name = ucfirst(strtolower(e($request->first_name)));
            $user->email = e($request->email);
            $user->login = e($request->login);
            $user->password = bcrypt(e($request->password));
            $user->birth_date = e($request->birth_date);
            $user->save();
            $role = Role::where('role', 'member')->first();
            // Assign the role of member
            $role->users()->save($user);
            // log user
            Auth::loginUsingId($user->id);
            return redirect('/')->with('message', 'Votre compte a été créé.');
        }else{
            return redirect('/')->with('messageError', "Une erreur est survenue lors de la création de votre compte.Veuillez contacter l'administrateur du site");
        }  
    }

    /**
     * Show the form for editing the user.
     *
     * @return View
     */
    public function edit()
    {
        //get user
        $user =  auth()->user('id');

        //get ressources for display
        $website = Website::where('name', 'flooflix')->first();
        $page = Page::where('website_id', $website->id)->where('name', 'compte')->first();
        $datas = $page->getResourcesToDisplayPage($page);

        return view('Flooflix.forms.editUser',compact('user','datas'));
    }

    /**
     * Update the user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return View
     */
    public function update(Request $request, User $user)
    {
        // Validate the fields
        request()->validate([
            'last_name' => ['required','string'],
            'first_name' => ['required','string'],
            'email' => ['required','email'],
            'login' =>['required','string'],
            'password' => ['required','string'],
            'birth_date' => ['required','date']
        ]);
        
        // Data verification
        if(isset($request->last_name) && isset($request->first_name) && isset($request->email) && isset($request->login) && isset($request->password) && isset($request->birth_date) && !is_null($request->last_name) && !is_null($request->first_name)  && !is_null($request->email) && !is_null($request->login) && !is_null($request->password) && !is_null($request->birth_date) && !empty($request->last_name) && !empty($request->first_name) && !empty($request->email) && !empty($request->login) && !empty($request->password) && !empty($request->birth_date) && is_string($request->last_name) && is_string($request->first_name) && is_string($request->email) && is_string($request->login) && is_string($request->password) && is_string($request->birth_date)){
            // Check if user login and user email exists in database   
            $users = User::all();
            foreach ($users as $item) {
                if($item->login == $request->login && $item->id != $user->id){
                    return back()->with('message', 'Ce login existe déjà.');
                }
            }   
            foreach ($users as $item) {
                if($item->email == $request->email && $item->id != $user->id){
                    return back()->with('message', 'Cette adresse email existe déjà.');    
                }
            } 
            
            if(($request->last_name == $user->last_name) && ($request->first_name == $user->first_name) && ($request->email == $user->email) && ($request->login == $user->login) && ($request->password == $user->password) && ($request->birth_date == $user->birth_date)){
                // if datas entered are the same.
                return redirect()->route('user.account', [$user]);
            }else{
                // else update datas
                $user->last_name = ucfirst(strtolower(e($request->last_name)));
                $user->first_name = ucfirst(strtolower(e($request->first_name)));
                $user->email = e($request->email);
                $user->login = e($request->login);
                $user->password = bcrypt(e($request->password));
                $user->birth_date = e($request->birth_date);
                $user->save();
                return redirect()->route('user.account', [$user])->with('message', 'Les données ont bien été modifiées');
            }
        }else{
            return redirect()->route('user.account', [$user])->with('messageError', "Une erreur est survenue lors de l'enregistrement des données.");
        }
    }

    /**
     * Create link request form.
     *
     * @return void
     */
    public function showLinkRequestForm()
    {
        return view('Flooflix.auth.passwords.email');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function sendResetLinkEmail(Request  $request)
    {
        request()->validate(['email' => 'required|email']);
        // Get users
        $users = User::all();
        
        // test email if exists in database
        foreach ($users as $user) {
            if($user->email == $request->email){
                // generate token
                $key = str_random(32);
                // get datetime
                $date = now()->format('Y-m-d H:i:s');
                // save data in database
                DB::table('password_resets')->insert(['email' => $request->email , 'token' => $key, 'created_at' => $date]);
                // get token
                $token = DB::table('password_resets')->select('token')->where('email',$user->email)->first();
                // send email to user
                Mail::to($user->email)->send(new ResetPassword($user,$token->token));
                return redirect()->route('home')->with('message','Un message vient de vous être envoyé avec un lien de redirection pour réinitialiser votre mot de passe');
            }else{
                return back()->with('messageError','Votre adresse email ne correspond à aucune adresse email connue de notre site.');
            }
        }      
    }

    /**
     * Show password reset form.
     *
     * @param string $token
     * @return view
     */
    public function showResetForm($token)
    {
        return view('Flooflix.auth.passwords.reset',compact('token'));
    }


    /**
     * Upadte password.
     *
     * @param string $token
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function updatePassword(Request $request,string $token)
    {
        // validate fields
        request()->validate(['email' => 'required|email']);
        request()->validate(['password' => 'required']);
        // get password
        $password = $request->password;
        // get token and email in database
        $test = DB::table('password_resets')->select('email')->where('email',$request->email)->where('token',$token)->first();
        // test email
        if(!is_null($test) && !empty($test) && is_string($test->email)){
            // get user
            $user = User::where('email',$test->email)->first();
            // test password
            if(!is_null($password) && !empty($password) && is_string($password)){
                // save password for user
                $user->password = bcrypt($request->password);
                $user->save();
                // clear the verification data
                DB::table('password_resets')->where('email',$request->email)->where('token',$token)->delete();
                return redirect()->route('home')->with('message','Votre nouveau mot de passe a bien été enregistré.');
            }else{
                return back()->with('messageError', "Votre mot de passe n'est pas reconnu par le système.");
            }
        }else{
            return back()->with('messageError', "Votre adresse email n'est pas reconnu par le système.");
        }
    }

    /**
     * Display the user account.
     *
     * @return View
     */
    public function showUserAccount()
    {
        $user = auth()->user('id');
        $bankCard = BankCard::find($user->bank_card_id);

        //get ressources for display
        $website = Website::where('name', 'flooflix')->first();
        $page = Page::where('website_id', $website->id)->where('name', 'compte')->first();
        $datas = $page->getResourcesToDisplayPage($page);
        $pictures = Picture::all();
        return view('Flooflix/app/userAccount',compact('datas','pictures','bankCard'));  
    }
    
    /**
     * displays the credits addition form.
     *
     * @param  \App\User  $user
     * @return View
     */
    public function addCredits(User $user)
    {
        $user = auth()->user('id');
        if($user->bank_card_id == null){
            return back()->with('messageError','Veuillez enregistrer une carte bancaire pour ajouter des crédits.');
        }else{
            $bankCard = BankCard::find($user->bank_card_id);
        }
        
        $website = Website::where('name', 'flooflix')->first();
        $page = Page::where('website_id', $website->id)->where('name', 'ajouter-credits')->first();
        $datas = $page->getResourcesToDisplayPage($page);
        return view('Flooflix.forms.addCredits',compact('bankCard','datas'));
    }

    /**
     * store credits for a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return View
     */
    public function storeCredits(User $user,Request $request)
    {
        // get user
        $user = auth()->user('id');
        // Validate the fields
        request()->validate([
            'credits' => ['required','string'],
        ]);
        // Validate data is digits
        if($this->isDigits($request->credits)){
            $credits = $request->credits;
        }else{
            return back()->with('messageError',"Erreur lors de l'envoi des credits.Veuillez contacter l'administrateur du site");
        }
        // Data verification
        if(isset($credits) && !is_null($credits) && !empty($credits) && is_string($credits)) {
            $user->credits = $user->credits + $credits;
            $user->save();
            return redirect()->route('user.account', [$user])->with('message', 'Les crédits ont bien été ajoutés à votre compte'); 
        }else{
            return redirect()->route('user.account', [$user])->with('messageError', "Une erreur est survenue lors de l'ajout des crédits.Veuillez contacter l'administrateur du site");
        }
    }

    /**
     * Display shopping cart page for a user.
     * 
     * @return View
     */
    public function showShoppingCart()
    {
        //get user
        $user = auth()->user('id');
        //get bank card for user
        $bankCard = BankCard::find($user->bank_card_id);

        //get all movies to set shopping cart
        $movies = Movie::all();
        //get session values with movies title
        $session = session()->all();
        //set shopping cart
        $shopping_cart = array();
        foreach ($session as $key => $value) {
            foreach ($movies as $movie) {
                if ($key == $movie->title) {
                    $shopping_cart[] = $movie;
                }
            }
        }
        
        //get ressources for display
        $pictures = Picture::all();
        $website = Website::where('name','flooflix')->first();
        $page = Page::where('website_id', $website->id)->where('name','panier')->first();
        $datas = $page->getResourcesToDisplayPage($page);
        return view('flooflix.app.shoppingCart',compact('user','datas','bankCard','shopping_cart','movies','pictures'));
    }

    /**
     * Remove movie in cart.
     *
     * @param  \App\Movie $movie
     * @param  \App\User $user
     * @return View
     */
    public function removeMovieInCart(Movie $movie,User $user)
    {
        session()->pull($movie->title);
        return redirect()->route('show.shoppingCart',$user);
    }

    /**
     * Add movies to movies collection.
     *
     * @return View
     */
    public function addMoviesToCollection()
    {
        //get user
        $user = auth()->user('id');

        //get movies
        $movies = Movie::all();

        //get session values with movies title
        $session = session()->all();

        //set shopping cart with movies title values
        $shopping_cart = array();
        foreach ($session as $key => $value) {
            foreach ($movies as $movie) {
                if ($key == $movie->title) {
                    $shopping_cart[] = $movie;
                }
            }
        }
        //get total purchases
        $total = 0;
        foreach ($shopping_cart as $movie) {
            $total += $movie->price;
        }
        //check if the user has enough credits and store movies in collection user with bying date
        $date = now();
        if($total > $user->credits){
            return back()->with('messageError',"Votre total de crédits est insuffisant.Vous pouvez ajouter des crédits depuis votre compte client.");
        }else{
            $user->credits = $user->credits - $total;
            $user->save();
            foreach ($shopping_cart as $movie) {
                DB::table('movie_user')->insert(['movie_id' => $movie->id,'user_id' => $user->id,'price' => $movie->price,'created_at' => $date,'updated_at' => $date]);
                session()->pull($movie->title);
            }
            $member = Role::where('role','member')->first();
            if($user->role_id == $member->id){
                $customer = Role::where('role','customer')->first();   
                $user->role_id = $customer->id;
                $user->save();    
            }
            return redirect()->route('home')->with('message','Le contenu de votre panier à bien été ajouté à votre collection');
        }  
    }

    /**
     * Display the user movies collection in Flooflix website.
     *
     * @return View
     */
    public function showUserMoviesCollection()
    {
        //get user
        $user = auth()->user('id');

        //get user's movies
        $movies = $user->movies()->get();
        
        //set a collection by category
        $collection = array();
        $categories = Category::all();
        foreach ($movies as $movie) {
            foreach ($categories as $category) {
                if($movie->category_id == $category->id){
                    $collection[$category->genre][] = $movie;
                }
            }
        }

        // Separation of the movies collection by category into several array of 6 values for display
        foreach ($collection as $category => $movies) {
            $chunks = array_chunk($movies,6);
            $collection[$category] = $chunks;   
        }
        
        // get ressources for display
        $website = Website::where('name','flooflix')->first();
        $page = Page::where('website_id', $website->id)->where('name', 'collection')->first();
        $datas = $page->getResourcesToDisplayPage($page);
        $pictures = Picture::all();
        return view('Flooflix/app/userMoviesCollection',compact('datas','pictures','user','categories','collection'));  
    }


    /**
     * Show the purchase history.
     *
     * @return View
     */
    public function showPurchaseHistory()
    {
        //get user
        $user = auth()->user('id');

         //get user's movies
        $movies = $user->movies()->get();
        
        //make movies collection sort by date
        //get movies sort by date
        $movies_by_date = DB::table('movie_user')->select('movie_id as movie', 'created_at as date')->where('user_id',$user->id)->orderByRaW('created_at DESC')->get();
        //replace movie's id by movie's object and add picture's objet
        foreach ($movies_by_date as $key => $tab) {
            $movie = Movie::find($tab->movie);
            $tab->movie = $movie; 
            $picture = Picture::find($movie->picture_id);
            $tab->picture = $picture;
            $category = Category::find($movie->category_id);
            $tab->category = $category; 
        }
        //Separation of the movies_by_date collection into several collections of 2 values for display
        $chunks = $movies_by_date->chunk(3);
        $movies = $chunks;
      
        //get ressources for display
        $website = Website::where('name','flooflix')->first();
        $page = Page::where('website_id', $website->id)->where('name', 'historique-des-achats')->first();
        $datas = $page->getResourcesToDisplayPage($page);
        return view('Flooflix/app/purchaseHistory',compact('datas','movies')); 
    }

    /**
     * Attribute grade for a movie by a user.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Movie $movie
     * @return View
     */
    public function attributeGrade(Request $request,Movie $movie)
    {
        //get user
        $user = auth()->user('id'); 
        
        $result = DB::table('movie_user')->select('movie_id as movie', 'user_id as user')->where('user_id',$user->id)->where('movie_id',$movie->id)->first();
        if (!is_null($result) && $result->movie == $movie->id && $result->user == $user->id) {
            $res = DB::table('movie_user')->where('user_id',$user->id)->where('movie_id',$movie->id)->update(['grade'=>$request->grade]);
            return back()->with('message', "Votre note a bien été attribuée pour ce film");
        } else {
            return back()->with('messageError', "Une erreur est survenue lors de l'attribution de la note.Veuillez contacter l'administrateur du site");
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
     * Displays the view users management. 
     *
     * @param string $year
     * @param string $month
     * @param string $day
     * @param \Illuminate\Http\Request  $request
     * @return view
     */
    public function usersManagement(Request $request)
    {
        //get users total
        $users = DB::table('roles')
        ->join('users','roles.id','=','users.role_id')
        ->select('users.id')
        ->whereIn('role',['member','customer'])
        ->get();
        $total_users = count($users);

        //get total customers
        $customers = DB::table('roles')
        ->join('users','roles.id','=','users.role_id')
        ->select('users.id')
        ->where('role','customer')
        ->get();
        $total_customers = count($customers);

        //get total sales
        $total_ca = DB::table('movie_user')
        ->selectRaw('SUM(price) as total')
        ->first();

        // check requests
        $current_date = new Carbon();
        if (isset($request->year)) {
            $year = $request->year;
        } else {
            $year = $current_date->year;
        }
        if (isset($request->month)) {
            $date = explode('-',$request->month);
            $year2 = $date[0];
            $month2 = $date[1];
        } else {
            $year2 = $current_date->year;
            $month2 = $current_date->month;
            if ($month2 < 10) {
            $month2 = '0'. $month2;
            }
        }
        if (isset($request->day)) {
            $date = explode('-',$request->day);
            $year3 = $date[0];
            $month3 = $date[1];
            $day = $date[2];
        } else {
            $year3 = $current_date->year;
            $month3 = $current_date->month;
            if ($month3 < 10) {
            $month3 = '0'. $month3;
            }
            $day = $current_date->day;
            if ($day < 10) {
                $day = '0'. $day;
            }
        }

        // total annual sales
        $total_year = DB::table('movie_user')
        ->selectRaw('SUM(price) as total')
        ->whereYear('created_at',$year)
        ->first();
        if (is_null($total_year->total)) {
            $total_year->total = 0;
        }

        // total month sales
        $total_month = DB::table('movie_user')
        ->selectRaw('SUM(price) as total')
        ->whereYear('created_at',$year2)
        ->whereMonth('created_at',$month2)
        ->first();
        if (is_null($total_month->total)) {
            $total_month->total = 0;
        }

        // total day sales
        $total_day = DB::table('movie_user')
        ->selectRaw('SUM(price) as total')
        ->whereYear('created_at',$year3)
        ->whereMonth('created_at',$month3)
        ->whereDay('created_at',$day)
        ->first();
        if (is_null($total_day->total)) {
            $total_day->total = 0;
        }
        
        return view('Flooflix_websiteManagement.usersManagement',compact('total_users','total_customers','total_ca','total_year','total_month','total_day','year','year2','year3','month2','month3','day'));
    }

    /**
     * Displays the view users list. 
     *
     * @return view
     */
    public function usersList()
    {
        // get users ids sort by last register and paginate result
        $users = DB::table('roles')
        ->join('users','roles.id','=','users.role_id')
        ->select('users.id')
        ->whereIn('role',['member','customer'])
        ->orderBy('users.created_at','desc')
        ->paginate(8);

        $total = count($users);

        // set users collection for display
        foreach ($users as $key => $value) {  
            $user = User::find($value->id);
            $users[$key] = $user;   
        }
        return view('Flooflix_websiteManagement.usersList',compact('users','total'));
    }

    /**
     * Displays the view user informations. 
     *
     * @param App\User $user
     * @return view
     */
    public function userInformations($user)
    {
        $user = User::find($user);
        if(is_null($user->bank_card_id)){
            $bank_card = 'NON';
        } else {
            $bank_card = BankCard::find($user->bank_card_id);
            $bank_card = $bank_card->type;
        }
        $movies = DB::table('movie_user')->select('movie_id as movie', 'created_at as date','grade','price')->where('user_id',$user->id)->orderByRaW('created_at DESC')->get();
        foreach ($movies as $movie) {
            $item = Movie::find($movie->movie);
            $movie->movie = $item->title;
            if(is_null($movie->grade)){
              $movie->grade = 'Pas de note attribuée';
            }
        } 
        return view('Flooflix_websiteManagement.userInformations',compact('user','bank_card','movies'));  
    }

    /**
     * Displays the view user informations by research. 
     *
     * @param \Illuminate\Http\Request  $request
     * @return view
     */
    public function addUserByResearch(Request  $request)
    {
        // Validate the fields
        request()->validate([
            'search' => ['required','string'],
        ]);
        $search = $request->search;
        $words = explode(" ",$search);
    
        $user = User::where('last_name', 'like', ucfirst($words[1]))->where('first_name', 'like', ucfirst($words[0]))->first();
        if (is_null($user)) {
            return back()->with('messageError','Aucun utilisateur ne correspond à votre recherche');
        } else { 
            return redirect()->route('user.informations',$user);
        }  
        return view('Flooflix_websiteManagement.userInformations',compact('user'));
        
    }

    /**
     * Delete user. 
     *
     * @param App\User $user
     * @return view
     */
    public function deleteUser($user){
        
        $user = User::find($user);
        $bank_card = BankCard::find($user->bank_card_id);

        //dd($user->bank_card()->get());
        if(!is_null($user)){
            $user->delete();
        }
        if(!is_null($bank_card)){
            $bank_card->delete();
        }  
        return redirect()->route('users.list')->with('message',"L'utilisateur a bien été supprimé");
    }
    

    /*
    |--------------------------------------------------------------------------
    | Complementary functions
    |--------------------------------------------------------------------------
    |
    |
    */

    /**
     * Check if a string contains only numbers.
     *
     * @param  string $element
     * @return boolean
     */
    public function isDigits($element) {
        return !preg_match ("/[^0-9]/", $element);
    }
}
