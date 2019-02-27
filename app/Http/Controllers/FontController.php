<?php

namespace App\Http\Controllers;

use App\Font;
use Illuminate\Http\Request;

class FontController extends Controller
{
    /**
     * Display a listing of fonts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fonts = Font::all();
        return view('admin.fonts',compact('fonts'));
    }

    /**
     * Show the form for creating a new font.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.forms.createFont');
    }

    /**
     * Store a newly created font in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function show(Font $font)
    {
        return view('admin.font',compact('font'));
    }

    /**
     * Show the form for editing the specified font.
     *
     * @param  \App\Font  $font
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function destroy(Font $font)
    {
        $font->delete();
        return redirect('/font')->with('message','Les données ont bien été supprimé');
    }
}
