<?php

namespace App\Http\Controllers;

use App\Page;
use App\Website;
use App\Font;
use App\Color;
use App\Text;
use App\Picture;
use App\Movie;
use JavaScript;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the page.
     *
     * @return view
     */
    public function index()
    {
        $pages = Page::all();
        $websites = Website::all();
        return view('admin.pages', compact('pages','websites'));
    }

    /**
     * Show the form for creating a new page.
     *
     * @return view
     */
    public function create()
    {
        $websites = Website::all(); 
        return view('admin.forms.createPage',compact('websites')); 
    }

    /**
     * Store a newly created page in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function store(Request $request)
    {
        // Validate the fields
        request()->validate([
            'name' => ['required'],
            'url' => ['required'],
            'websites' => ['required']
        ]);
        
        // Data verification
        if(isset($request->name) && isset($request->url) && isset($request->websites) && !is_null($request->name) && !is_null($request->url) && !is_null($request->websites) && !empty($request->name) && !empty($request->url) && !empty($request->websites) && is_string($request->name) && preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $request->url) && is_numeric($request->websites)){ 
            // Verify if page exists in database
            $pages = Page::all();
            foreach ($pages as $item) {
                if(($item->name == $request->input('name')) && ($item->url == $request->input('url'))){
                    return back()->with('message', 'Cette page existe déjà');
                }
            }
            // Save the data
            $page = new Page;
            $page->name = e($request->name);
            $page->url = e($request->url);
            $page->website_id = e($request->websites);
            $page->save();

            return redirect('/page')->with('message', 'Les données ont bien été ajoutées');
        }else{
            return redirect('/page')->with('messageError', "Une erreur est survenue lors de l'enregistrement des données");      
        }
    }

    /**
     * Display the specified page.
     *
     * @param  \App\Page  $page
     * @return view
     */
    public function show(Page $page)
    {
        $fonts = Font::all();
        $colors = Color::all();
        $pictures = Picture::all();
        $website = Website::find($page->website_id);
        return view('admin.page',compact('page','website','fonts','colors','pictures'));
    }

    /**
     * Show the form for editing the specified page.
     *
     * @param  \App\Page  $page
     * @return view
     */
    public function edit(Page $page)
    {
        return view('admin.forms.editPage',compact('page'));
    }

    /**
     * Update the specified page in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return view
     */
    public function update(Request $request, Page $page)
    {
        // Validate the fields
        request()->validate([
            'name' => ['required','string'],
            'url' => ['required','string'],
        ]);
        
        // Data verification
        if(isset($request->name) && isset($request->url) && !is_null($request->name) && !is_null($request->url)  && !empty($request->name) && !empty($request->url) && is_string($request->name) && preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $request->url)){ 
            // if datas entered are the same.
            if(($request->name == $page->name) && ($request->url == $page->url)){
                return redirect('/page');
            }else{
                // Update datas
                $page->name = e($request->name);
                $page->url = e($request->url);
                $page->save();
                return redirect('/page')->with('message', 'Les données ont bien été modifiées');
            }
        }else{
            return redirect('/page')->with('messageError', "Une erreur est survenue lors de l'enregistrement des données");      
        }
    }

    /**
     * Remove the specified page from storage.
     *
     * @param  \App\Page  $page
     * @return view
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect('/page')->with('message','La page a bien été supprimé');
    }

    /**
     * Join resources.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return view
     */
    public function join(Request $request, Page $page)
    {
        switch (!is_null($request)) {
            case (!is_null($request->fonts)):
                // Get the fonts associated with this page 
                $fontsPage = $page->fonts;
                if (isset($fontsPage) && !is_null($fontsPage) && !empty($fontsPage)) {
                    foreach ($fontsPage as $font) {
                        // We check if the selected font is not already associated with this page
                        if($font->id == $request->fonts){
                            return back()->with('message','La police est déjà associée à cette page');
                        }
                    }
                    $page->fonts()->attach($request->fonts);
                    return back()->with('message','La police a bien été associée');
                    break;                   
                } else {
                    $page->fonts()->attach($request->fonts);
                    return back()->with('message','La police a bien été associée');
                    break;
                }
            case (!is_null($request->colors)):
                // Get the colors associated with this page 
                $colorsPage = $page->colors;
                if (isset($colorsPage) && !is_null($colorsPage) && !empty($colorsPage)) {
                    foreach ($colorsPage as $color) {
                        // We check if the selected color is not already associated with this page
                        if($color->id == $request->colors){
                            return back()->with('message','La couleur est déjà associée à cette page');
                        }
                    } 
                    $page->colors()->attach($request->colors);
                    return back()->with('message','La couleur a bien été associée');
                    break;    
                } else {
                    $page->colors()->attach($request->colors);
                    return back()->with('message','La couleur a bien été associée');
                    break;
                }   
            case (!is_null($request->pictures)):
                // Get the pictures associated with this page 
                $picturesPage = $page->pictures;
                if (isset($picturesPage) && !is_null($picturesPage) && !empty($picturesPage)) {
                    foreach ($picturesPage as $picture) {
                        // We check if the selected picture is not already associated with this page
                        if($picture->id == $request->pictures){
                            return back()->with('message',"L'image est déjà associée à cette page");
                        }
                    } 
                    $page->pictures()->attach($request->pictures);
                    return back()->with('message',"L'image a bien été associée");
                    break;           
                } else {
                    $page->pictures()->attach($request->pictures);
                    return back()->with('message',"L'image a bien été associée");
                    break;
                }
            default:
                return back()->with('message',"Un problème est survenu lors de l'enregistrement des données.");
                break;
        }  
    }

    /**
     * Unjoin Font.
     * @param  \App\Page  $page
     * @param  \App\Font  $font
     * @return view
     */
    public function unjoinFont(Page $page,Font $font)
    {
        if(!is_null($font)){
        $page->fonts()->detach($font->id); 
        return back()->with('message','La police a bien été dissociée');       
        }  
    }

    /**
     * Unjoin Color.
     * @param  \App\Page  $page
     * @param  \App\Color  $color
     * @return view
     */
    public function unjoinColor(Page $page,Color $color)
    {
        if(!is_null($color)){
        $page->colors()->detach($color->id); 
        return back()->with('message','La couleur a bien été dissociée');       
        }  
    }

    /**
     * Unjoin Picture.
     * @param  \App\Page  $page
     * @param  \App\Picture  $picture
     * @return view
     */
    public function unjoinPicture(Page $page,Picture $picture)
    {
        if(!is_null($picture)){
        $page->pictures()->detach($picture->id); 
        return back()->with('message',"L'image a bien été dissociée");       
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
     * edit homePage.
     * 
     * @return view
     */
    public function editHomePage()
    {
        $website = Website::where('name','flooflix')->first();
        $page = Page::where('website_id', $website->id)->where('name','accueil')->first();
        $fonts = Font::all();
        $colors = Color::all();
        $pictures = Picture::where('name','like','bg %')->get();
        $texts = Text::where('page_id',$page->id)->get();
        $movies = Movie::all()->sortBy('title');
    
        return view('Flooflix.websiteManagement.forms.pages.editHomePage',compact('fonts','colors','pictures','texts','movies'));
    }

    /**
     * show home page preview.
     * 
     * @return view
     */
    public function showPreviewHomePage()
    {
        // get resources to preview the home page
        $fonts = Font::all();
        $colors = Color::all();
        $pictures = Picture::all();
        $movies = Movie::all();
        $movies_stats = Movie::getStats($movies);
        $top_movies = Movie::getTopMovies($movies_stats);
        $new_movies = Movie::getNewMovies();
        JavaScript::put([
            'fonts' => $fonts,
            'colors' => $colors,
            'pictures' => $pictures,
            'movies' => $movies,
            'top_movies' => $top_movies,
            'new_movies' => $new_movies,
        ]);
        return view('Flooflix.websiteManagement.previews.home',compact('fonts','colors','pictures','top_movies','new_movies'));
    }
}