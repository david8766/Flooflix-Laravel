<?php

namespace App\Http\Controllers;

use App\Font;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FontController extends Controller
{
    /**
     * Display a listing of fonts.
     *
     * @return view
     */
    public function index()
    {
        $fonts = Font::all();
        return view('admin.fonts',compact('fonts'));
    }

    /**
     * Show the form for creating a new font.
     *
     * @return view
     */
    public function create()
    {
        return view('admin.forms.createFont');
    }

    /**
     * Store a newly created font in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function store(Request $request)
    {
        // Validate the fields
        request()->validate([
            'name' => ['required','string'],
            'link' => ['required','string'],
            'style' => ['required','string']
        ]);
        // Data verification
        if(isset($request->name) && isset($request->link) && isset($request->style) && !is_null($request->name) && !is_null($request->link)  && !is_null($request->style) && !empty($request->name) && !empty($request->link) && !empty($request->style) && is_string($request->name) && is_string($request->link) && is_string($request->style)){
            // Verify if font exists in database
            $fonts = Font::all();
            foreach ($fonts as $font) {
                if(($font->name == $request->name) && ($font->link == $request->link) && ($font->style == $request->style)){
                    return back()->with('message', 'Cette police existe déjà');
                }
            }
            // Save datas
            $font = New Font;
            $font->name = e($request->name);
            $font->link = e($request->link);
            $font->style = e($request->style);
            $font->save();
            return redirect('/font')->with('message', 'Les données ont bien été ajoutées');
        }else{
            return redirect('/font')->with('messageError', "Une erreur est survenue lors de l'enregistrement des données");      
        }
    }

    /**
     * Display the specified font.
     *
     * @param  \App\Font  $font
     * @return view
     */
    public function show(Font $font)
    {
        return view('admin.font',compact('font'));
    }

    /**
     * Show the form for editing the specified font.
     *
     * @param  \App\Font  $font
     * @return view
     */
    public function edit(Font $font)
    {
        return view('admin.forms.editFont',compact('font'));
    }

    /**
     * Update the specified font in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Font  $font
     * @return view
     */
    public function update(Request $request, Font $font)
    {
        // Validate the fields
        request()->validate([
            'name' => ['required','string'],
            'link' => ['required','string'],
            'style' => ['required','string']
        ]);
        // Data verification
        if(isset($request->name) && isset($request->link) && isset($request->style) && !is_null($request->name) && !is_null($request->link)  && !is_null($request->style) && !empty($request->name) && !empty($request->link) && !empty($request->style) && is_string($request->name) && is_string($request->link) && is_string($request->style)){
            // if datas entered are the same.
            if(($request->name == $font->name) && ($request->link == $font->link) && ($request->style == $font->style)){
                return redirect('/font');
            }else{
            // Update data
            $font->name = e($request->name);
            $font->link = e($request->link);
            $font->style = $request->style;
            $font->save();
            return redirect('/font')->with('message', 'Les données ont bien été modifiées');
            }
        }else{
            return redirect('/font')->with('messageError', "Une erreur est survenue lors de l'enregistrement des données");      
        }
    }

    /**
     * Remove the specified font from storage.
     *
     * @param  \App\Font  $font
     * @return view
     */
    public function destroy(Font $font)
    {
        $font->delete();
        return redirect('/font')->with('message','Les données ont bien été supprimé');
    }

    /*
    |--------------------------------------------------------------------------
    | FONCTIONS FOR WEBSITE MANAGEMENT
    |--------------------------------------------------------------------------
    |
    | These functions are used for managing the site for its owner.
    |
    */

    /**
     * Displays the view fonts list. 
     *
     * @return view
     */
    public function fontsList()
    {
        // total fonts
        $total = count(Font::all());
        // get fonts ids sort by last register and paginate result
        $fonts = DB::table('fonts')
        ->select('id')
        ->orderBy('created_at','desc')
        ->paginate(15);

        // set fonts collection for display
        foreach ($fonts as $key => $value) {  
            $font = Font::find($value->id);
            $fonts[$key] = $font;   
        }
        return view('Flooflix_websiteManagement.fontsList',compact('fonts','total'));
    }

    /**
     * Displays the view font. 
     *
     * @param \App\Font  $font
     * @return view
     */
    public function showFontInformations($font)
    {
        $fonts = Font::all();
        $font = Font::find($font);
        return view('Flooflix_websiteManagement.fontInformations',compact('font','fonts'));
    }

    /**
     * Displays the view font informations by research. 
     *
     * @param \Illuminate\Http\Request  $request
     * @return view
     */
    public function showfontInformationsByResearch(Request  $request)
    {
        //dd($request->search);
        $search = $request->search;
        $words = explode(" ",$search);
        $q = "";
        foreach ($words as $word) {
            $q .= '%'.$word;
        };
        $q .= '%';
        $font = Font::where('name', 'like', $q)->first();
        if (is_null($font)) {
            return back()->with('messageError','Aucune image ne correspond à votre recherche');
        } else { 
            return view('Flooflix_websiteManagement.fontInformations', compact('font'));
        }
        
    }

    /**
     * Displays the view to add font. 
     *
     * @return view
     */
    public function addFont()
    {
        return view('Flooflix_websiteManagement.forms.fonts.createFont');
    }

    /**
     * Store a newly created font in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function storeFont(Request $request)
    {
        // Validate the fields
        request()->validate([
            'name' => ['required','string'],
            'link' => ['required','string'],
            'style' => ['required','string']
        ]);
        // Data verification
        if(isset($request->name) && isset($request->link) && isset($request->style) && !is_null($request->name) && !is_null($request->link)  && !is_null($request->style) && !empty($request->name) && !empty($request->link) && !empty($request->style) && is_string($request->name) && is_string($request->link) && is_string($request->style)){
            // Verify if font exists in database
            $fonts = Font::all();
            foreach ($fonts as $font) {
                if(($font->name == $request->name) && ($font->link == $request->link) && ($font->style == $request->style)){
                    return back()->with('message', 'Cette police existe déjà');
                }
            }
            // Save datas
            $font = New Font;
            $font->name = $request->name;
            $font->link = $request->link;
            $font->style = $request->style;
            $font->save();
            return redirect()->route('fonts.list')->with('message', 'Les données ont bien été ajoutées');
        }else{
            return redirect()->route('fonts.list')->with('messageError', "Une erreur est survenue lors de l'enregistrement des données");      
        } 
    }

    /** 
     * Show the form for editing the font name.
     *
     * @param  \App\Font  $font
     * @return view
     */
    public function editFontName(Font $font)
    {
        return view('Flooflix_websiteManagement.forms.fonts.editFontName', compact('font'));
    }

    /**
     * Update the font name.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Font  $font
     * @return view
     */
    public function updateFontName(Request $request,Font $font)
    {
        //Validate fields
        request()->validate(['name' => ['required','string']]);

        // Save data
        $name = $request->name;
        if(isset($name) && !is_null($name) && is_string($name)){
            $font->name = $name;
            $font->save();
            return redirect()->route('font.informations',$font)->with('message', "Le nom de la police a bien été modifié");
        }else{
            return redirect()->route('font.informations',$font)->with('messageError', "Un problème est survenu lors de l'enrtegistrement des données"); 
        }
    }

    /** 
     * Show the form for editing the font link.
     *
     * @param  \App\Font  $font
     * @return view
     */
    public function editFontLink(Font $font)
    {
        return view('Flooflix_websiteManagement.forms.fonts.editFontLink', compact('font'));
    }

    /**
     * Update the font link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Font  $font
     * @return view
     */
    public function updateFontLink(Request $request,Font $font)
    {
        //Validate fields
        request()->validate(['link' => ['required','string']]);

        // Save data
        $link = $request->link;
        if(isset($link) && !is_null($link) && is_string($link)){
            $font->link = $link;
            $font->save();
            return redirect()->route('font.informations',$font)->with('message', "Le lien de la police a bien été modifié");
        }else{
            return redirect()->route('font.informations',$font)->with('messageError', "Un problème est survenu lors de l'enrtegistrement des données"); 
        }
    }

    /** 
     * Show the form for editing the font style.
     *
     * @param  \App\Font  $font
     * @return view
     */
    public function editFontStyle(Font $font)
    {
        return view('Flooflix_websiteManagement.forms.fonts.editFontStyle', compact('font'));
    }

    /**
     * Update the font style.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Font  $font
     * @return view
     */
    public function updateFontStyle(Request $request,Font $font)
    {
        //Validate fields
        request()->validate(['style' => ['required','string']]);

        // Save data
        $style = $request->style;
        if(isset($style) && !is_null($style) && is_string($style)){
            $font->style = $style;
            $font->save();
            return redirect()->route('font.informations',$font)->with('message', "Le lien de la police a bien été modifié");
        }else{
            return redirect()->route('font.informations',$font)->with('messageError', "Un problème est survenu lors de l'enrtegistrement des données"); 
        }
    }

    /**
     * Delete font.
     *
     * @param  \App\Font  $font
     * @return view
     */
    public function deleteFont(Font $font)
    {
        // Delete font in database
        $font->delete();
        
        return redirect()->route('fonts.list')->with('message', "La police a bien été supprimée");
        
    }
}
