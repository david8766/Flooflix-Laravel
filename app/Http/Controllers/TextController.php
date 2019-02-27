<?php

namespace App\Http\Controllers;

use App\Text;
use App\Page;
use App\Website;
use Illuminate\Http\Request;

class TextController extends Controller
{
    /**
     * Display a listing of the text.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $texts = Text::all();
        $pages = Page::all();
        $websites = Website::all();
        
        return view('admin.texts',compact('texts','pages','websites'));
    }

    /**
     * Show the form for select a website to create a text.
     *  
     * @return \Illuminate\Http\Response
     */
    public function selectWebsite()
    {
        $websites = Website::all();
        return view('admin.forms.selectWebsiteToCreateText',compact('websites'));
    }

    /**
     * Get pages for the selected website.
     *  
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getPages(Request $request)
    {
        // Validate the fields
        request()->validate([
            'websites' => ['required']
        ]);
        $id = $request->input('websites');
        if(isset($id) && !empty($id) && is_numeric($id)){
            return redirect()->route('createText', compact('id'));
        }else{
            return back()->with('messageError', "Une erreur est survenue lors de la réception du formulaire.Veuillez contacter l'admnistrateur du site.");
        } 
    }

    /**
     * Show the form for creating a new text.
     * 
     * @param mixed $pages
     * @return \Illuminate\Http\Response
     */
    public function createText($id)
    {  
        $pages = Page::where('website_id', $id)->get();
        return view('admin.forms.createText',compact('pages'));           
    }

    /**
     * Store a newly created text in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /// Validate the fields
        request()->validate(['title' => ['required']]);
        request()->validate(['text' => ['required']]);
        request()->validate(['pages' => ['required']]);

        // Verify if text exists in database
        $texts = Text::all();
        foreach ($texts as $item) {
            if(($item->title == $request->input('title'))){
                return back()->with('message', 'Ce texte existe déjà');
            }
        }

        // The e function runs PHP's htmlspecialchars function with the double_encode option set to true by default
        $enteredTitle = e($request->input('title')); 
        $enteredText = e($request->input('text'));
        $enteredPage = e($request->input('pages'));

        // If the data is present and validated it is stored.
        if(isset($enteredTitle) && isset($enteredText) && !empty($enteredTitle) && !empty($enteredText) && is_string($enteredTitle) && is_string($enteredText)){
            $text = new Text;
            $text->title = $enteredTitle;
            $text->text = $enteredText;
            $text->page_id = $enteredPage;
            $text->save();
            return redirect('/text')->with('message', 'Les données ont bien été ajoutées');
        }else{
            return back()->with('messageError',"Une erreur s'est produite lors de l'enrgistrement des données.Veuillez contacter l'admnistrateur du site.");
        }

    }

    /**
     * Display the specified text.
     *
     * @param  \App\Text  $text
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Text $text)
    {
        if (!is_null($text->page_id)) {
            $page = Page::where('id' , $text->page_id)->first();
        }
        
        return view('admin.text',compact('text','page'));
    }

    /**
     * Display texts for a page.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function showTextsForPage(Page $page)
    {
        $texts = Text::where('page_id' , $page->id)->get();
    
        return view('admin.pageTexts',compact('page','texts'));
    }

    /**
     * Show the form for editing the specified text.
     *
     * @param  \App\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function edit(Text $text)
    {
        return view('admin.forms.editText',compact('text'));
    }

    /**
     * Update the specified text in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Text $text)
    {
        if(($request->title == $text->title) && ($request->text == $text->text)){
            return redirect('/text');
        }else{
        $text->update($request->all());
        return redirect('/text')->with('message', 'Les données ont bien été modifiées');
        }
    }

    /**
     * Remove the specified text from storage.
     *
     * @param  \App\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function destroy(Text $text)
    {
        $text->delete();
        return redirect('/text')->with('message','Le texte a bien été supprimé');
    }
}
