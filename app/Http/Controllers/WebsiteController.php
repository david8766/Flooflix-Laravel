<?php

namespace App\Http\Controllers;

use App\Website;
use App\Page;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Display a listing of websites.
     *
     * @return view
     */
    public function index()
    {
        $websites = Website::all();
        return view('admin.websites',compact('websites'));
    }

    /**
     * Show the form for creating a new website.
     *
     * @return view
     */
    public function create()
    {
        return view('admin.forms.createWebsite');
    }

    /**
     * Store a newly created website in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function store(Request $request)
    {
        // Validate the fields
        request()->validate([
            'name' => ['required','string'],
            'url' => ['required','url']
        ]);

        // Data verification
        if(isset($request->name) && isset($request->url) && !is_null($request->name) && !is_null($request->url) && !empty($request->name) && !empty($request->url) && is_string($request->name) && preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $request->url)){ 
            // Check if website exists in database
            $websites = Website::all();
            foreach ($websites as $item) {
                if(($item->name == $request->input('name')) && ($item->url == $request->input('url'))){
                    return back()->with('message', 'Ce site existe déjà');
                }
            }   
            // Save datas
            $website = new Website;
            $website->name = e($request->name);
            $website->url = e($request->url);
            $website->save();
            return redirect('/website')->with('message', 'Les données ont bien été ajoutées');
        }else{
            return redirect('/website')->with('messageError', "Une erreur est survenue lors de l'enregistrement des données.");
        }      
    }

    /**
     * Display the specified website.
     *
     * @param  \App\Website  $website
     * @return view
     */
    public function show(Website $website)
    {
        return view('admin.website',compact('website'));
    }

    /**
     * Show the form for editing the specified website.
     *
     * @param  \App\Website  $website
     * @return view
     */
    public function edit(Website $website)
    {
        return view('admin.forms.editWebsite',compact('website'));
    }

    /**
     * Update the specified website in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Website  $website
     * @return view
     */
    public function update(Request $request, Website $website)
    {
        // Validate the fields
        request()->validate([
            'name' => ['required','string'],
            'url' => ['required','url']
        ]);

        // Data verification
        if(isset($request->name) && isset($request->url) && !is_null($request->name) && !is_null($request->url) && !empty($request->name) && !empty($request->url) && is_string($request->name) && preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $request->url)){
            if(($request->name == $website->name) && ($request->url == $website->url)){
                // if datas entered are the same.
                return redirect('/website');
            }else{
                // else update datas
                $website->name = e($request->name);
                $website->email = e($request->url);
                $website->save();
                return redirect('/website')->with('message', 'Les données ont bien été modifiées');
            }
        }else{
            return redirect('/website')->with('messageError', "Une erreur est survenue lors de l'enregistrement des données.");
        }
    }

    /**
     * Remove the specified website from storage.
     *
     * @param  \App\Website  $website
     * @return view
     */
    public function destroy(Website $website)
    {
        $website->delete();
        return redirect('/website')->with('message','Le site a bien été supprimé');
    }

     /**
     * Display a listing of pages for website.
     *
     * @param  \App\Website  $website
     * @return view
     */
    public function pages(Website $website)
    {
        // Select all pages for a site
        $pages = Page::where('website_id', '=' , $website->id )->get();
        return view('admin.websitePages', compact('pages' , 'website'));
    }
}
