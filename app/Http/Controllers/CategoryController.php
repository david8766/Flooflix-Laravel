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


    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return view
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return view
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return view
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return view
     */
    public function destroy(Category $category)
    {
        //
    }
}
