<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of colors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors',compact('colors'));
    }

    /**
     * Show the form for creating a new color.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.forms.createColor');
    }

    /**
     * Store a newly created color in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the fields
        request()->validate([
            'name' => ['required','string'],
            'rgb' => ['required','string'],
        ]);

        // Data verification
        if(isset($request->name) && isset($request->rgb) && !is_null($request->name) && !is_null($request->rgb)  && !empty($request->name) && !empty($request->rgb) && is_string($request->name) && is_string($request->rgb)){
            // Check if color exists in database
            $colors = Color::all();
            foreach ($colors as $item) {
                if(($item->name == $request->name) && ($item->rgb == $request->rgb)){
                    return back()->with('message', 'Cette police existe déjà');
                }
            }
            // Save data
            $color = New Color;
            $color->name = e($request->name);
            $color->rgb = e($request->rgb);
            $color->opacity = e($request->opacity);
            $color->save();
            return redirect('/color')->with('message', 'Les données ont bien été ajoutées');
        }else{
            return redirect('/website')->with('messageError', "Une erreur est survenue lors de l'enregistrement des données.");
        } 
    }

    /**
     * Display the specified color.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        return view('admin.color',compact('color'));
    }

    /**
     * Show the form for editing the specified color.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        return view('admin.forms.editColor',compact('color'));
    }

    /**
     * Update the specified color in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        // Validate the fields
        request()->validate([
            'name' => ['required','string'],
            'rgb' => ['required','string']
        ]);
        // Data verification
        if(isset($request->name) && isset($request->rgb) && !is_null($request->name) && !is_null($request->rgb)  && !empty($request->name) && !empty($request->rgb) && is_string($request->name) && is_string($request->rgb)){
            // if datas entered are the same.
            if(($request->name == $color->name) && ($request->rgb == $color->rgb) && ($request->opacity == $color->opacity) ){
                return redirect('/color');
            }else{
                $color->name = e($request->name);
                $color->rgb = e($request->rgb);
                $color->opacity = e($request->opacity);
                $color->save();
                return redirect('/color')->with('message', 'Les données ont bien été modifiées');
            }
        }else{
            return redirect('/website')->with('messageError', "Une erreur est survenue lors de l'enregistrement des données.");
        } 
        
    }

    /**
     * Remove the specified color from storage.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect('/color')->with('message','Les données ont bien été supprimé');
    }
}
