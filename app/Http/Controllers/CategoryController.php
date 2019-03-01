<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Movie;
use App\Website;
use App\Page;
use App\Font;
use App\Color;
use App\Text;
use App\Picture;
use JavaScript;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        // get resources for display
        $website = Website::where('name','flooflix')->first();
        $page = Page::where('website_id', $website->id)->where('name','categories')->first(); 
        $datas = $page->getResourcesToDisplayPage($page);
        $categories = Category::all();
        $pictures = Picture::all();
        $texts = Text::all();
        $chunks = $categories->chunk(3);
        $categories = $chunks;

        return view('Flooflix.categories',compact('categories','datas','pictures','texts'));
    }

    /**
     * Display the movies by category.
     *
     * @param mixed $category
     * @return view
     */
    public function showMoviesByCategory($category)
    {
        $category = Category::where('genre',$category)->first();
        $movies = $category->movies()->get();
        $website = Website::where('name','flooflix')->first();
        $page = Page::where('website_id', $website->id)->where('name','categorie')->first(); 
        $datas = $page->getResourcesToDisplayPage($page);
        $chunks = $movies->chunk(6);
        $movies = $chunks;
        $pictures = Picture::all();

        return view('Flooflix.category',compact('category','movies','datas','pictures'));
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
     * Displays the categories list. 
     *
     * @return view
     */
    public function categoriesList()
    {
        // Pagination
        $categories = Category::orderBy('created_at', 'DESC')->paginate(10);
        $total = count($categories);
        $pictures = Picture::all();
        return view('Flooflix_websiteManagement.categoriesList',compact('categories','pictures','total'));
    }

    /**
     * Displays the category informations.
     *
     * @param  \App\Category  $category
     * @return view
     */
    public function showCategoryInformations(Category $category)
    {
        $pictures = Picture::all();
        return view('Flooflix_websiteManagement.categoryInformations',compact('category','pictures'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return view
     */
    public function create()
    {
        $pictures = Picture::all();
        return view('Flooflix_websiteManagement.forms.categories.createCategory',compact('pictures'));
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return view
     */
    public function store(Request $request)
    {
        // Validate fields
        $request->validate(['genre' => ['required', 'string']]);
        if(isset($request->picture1)){
            request()->validate(['picture1' => ['required','string']]);
        } elseif (isset($request->picture2) && isset($request->name)) {
            request()->validate(['name' => ['required','string']]);
            request()->validate(['picture2' => ['required','file','image']]);
        }
        if(isset($request->picture1) && !is_null($request->picture1) && is_string($request->picture1)){
            $picture = Picture::where('name', $request->picture1)->first();
            $category = New Category;
            $category->genre = $request->genre;
            if(!is_null($picture) && !empty($picture)){
                $category->picture_id = $picture->id;
            }
            $category->save();
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
                $category = New Category;
                $category->genre = $request->genre;
                $category->picture_id = $picture->id;
                $category->save();
            } else {
                return redirect()->back()->with('messageError', "Un problème est survenu lors de l'enregistrement des données."); 
            }      
        }else{
            return redirect()->back()->with('messageError', "l'image n'a pas été reconnu par le système.");
        }
        return redirect()->route('categories.list')->with('message',"La categorie a bien été ajoutée");
    }

    
    /**
     * Show the form for editing the specified category.
     *
     * @param  \App\Category  $category
     * @return view
     */
    public function editGenre(Category $category)
    {
        return view('Flooflix_websiteManagement.forms.categories.editGenre', compact('category'));
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return view
     */
    public function updateGenre(Request $request, Category $category)
    {
        // Valide field
        request()->validate(['genre' => ['required','string']]);

        // Save data
        $genre = $request->genre;
        if(isset($genre) && !is_null($genre) && is_string($genre)){
            $category->genre = $genre;
            $category->save();
            return redirect()->route('category.informations',$category)->with('message', "Le genre de la catégorie a bien été modifié");
        }else{
            return redirect()->route('category.informations',$category)->with('messageError', "Un problème est survenu lors de l'enregistrement des données"); 
        }
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  \App\Category  $category
     * @return view
     */
    public function editPicture(Category $category)
    {
        $pictures = Picture::all();
        return view('Flooflix_websiteManagement.forms.categories.editPicture', compact('category','pictures'));
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return view
     */
    public function updatePicture(Request $request, Category $category)
    {
        if(isset($request->picture1)){
            request()->validate(['picture1' => ['required','string']]);
        } elseif (isset($request->picture2) && isset($request->name)) {
            request()->validate(['name' => ['required','string']]);
            request()->validate(['picture2' => ['required','file','image']]);
        }
        if(isset($request->picture1) && !is_null($request->picture1) && is_string($request->picture1)){
            $picture = Picture::where('name', $request->picture1)->first();
            if(!is_null($picture) && !empty($picture)){
                $category->picture_id = $picture->id;
            }
            $category->save();
            return redirect()->route('category.informations',$category)->with('message',"La categorie a bien été modifiée");
        }elseif($request->hasFile('picture2') && $request->file('picture2')->isValid()){   
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
                $category->picture_id = $picture->id;
                $category->save();
                return redirect()->route('category.informations',$category)->with('message',"La categorie a bien été modifiée");
            } else {
                return redirect()->back()->with('messageError', "Un problème est survenu lors de l'enregistrement des données."); 
            }      
        }else{
            return redirect()->back()->with('messageError', "l'image n'a pas été reconnu par le système.");
        }
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  \App\Category  $category
     * @return view
     */
    public function deleteCategory(Category $category)
    {
        // Get picture associate to category
        $picture = Picture::find($category->picture_id);
        // Delete category in database
        $category->delete();   
        // Delete picture file in storage
        $result = Storage::delete($picture->link);
        dump($result);
        // Delete picture in database
        $picture->delete();
        return redirect()->route('categories.list')->with('message', "La catégorie a bien été supprimée");
    }
}
