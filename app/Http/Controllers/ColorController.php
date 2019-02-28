<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    /**
     * Display a listing of colors.
     *
     * @return view
     */
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors',compact('colors'));
    }

    /**
     * Show the form for creating a new color.
     *
     * @return view
     */
    public function create()
    {
        return view('admin.forms.createColor');
    }

    /**
     * Store a newly created color in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
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
                    return back()->with('message', 'Cette couleur existe déjà');
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
     * @return view
     */
    public function show(Color $color)
    {
        return view('admin.color',compact('color'));
    }

    /**
     * Show the form for editing the specified color.
     *
     * @param  \App\Color  $color
     * @return view
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
     * @return view
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
     * @return view
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect('/color')->with('message','Les données ont bien été supprimé');
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
     * Displays the view colors list. 
     *
     * @return view
     */
    public function colorsList()
    {
        // total colors
        $total = count(Color::all());
        // get colors ids sort by last register and paginate result
        $colors = DB::table('colors')
        ->select('id')
        ->orderBy('created_at','desc')
        ->paginate(15);

        // set colors collection for display
        foreach ($colors as $key => $value) {  
            $color = Color::find($value->id);
            $colors[$key] = $color;   
        }
        return view('Flooflix_websiteManagement.colorsList',compact('colors','total'));
    }

    /** 
     * Show the form for editing the color name.
     *
     * @param  \App\Color  $color
     * @return view
     */
    public function editColorName(Color $color)
    {
        return view('Flooflix_websiteManagement.forms.colors.editcolorName', compact('color'));
    }

    /**
     * Update the color name.
     *
     * @param  \App\Color  $color
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function updateColorName(Request $request,Color $color)
    {
        // Validate fields
        request()->validate(['name' => ['required','string']]);

        // Save data
        $name = $request->name;
        if(isset($name) && !is_null($name) && is_string($name)){
            $color->name = $name;
            $color->save();
            return redirect()->route('color.informations',$color)->with('message', "Le nom de la couleur a bien été modifié");
        }else{
            return redirect()->route('color.informations',$color)->with('messageError', "Un problème est survenu lors de l'enrtegistrement des données"); 
        }
    }

    /** 
     * Show the form for editing the code RGB.
     *
     * @param  \App\Color $color
     * @return view
     */
    public function editRGBcode(Color $color)
    {
        return view('Flooflix_websiteManagement.forms.colors.editCodeRGB', compact('color'));
    }

    /**
     * Update the code rgb.
     *
     * @param  \App\Color $color
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function updateRGBcode(Request $request,Color $color)
    {
        // Validate fields
        request()->validate(['rgb' => ['required','string']]);

        // Save data
        $rgb = $request->rgb;
        if(isset($rgb) && !is_null($rgb) && is_string($rgb)){
            $color->rgb = $rgb;
            $color->save();
            return redirect()->route('color.informations',$color)->with('message', "Le code rgb de la couleur a bien été modifié");
        }else{
            return redirect()->route('color.informations',$color)->with('messageError', "Un problème est survenu lors de l'enrtegistrement des données"); 
        }
    }

    /** 
     * Show the form for editing the opacity.
     *
     * @param  \App\Color $color
     * @return view
     */
    public function editOpacity(Color $color)
    {
        return view('Flooflix_websiteManagement.forms.colors.editOpacity', compact('color'));
    }

    /**
     * Update the opacity.
     *
     * @param  \App\Color $color
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function updateOpacity(Request $request,Color $color)
    {
        // Validate fields
        request()->validate(['opacity' => ['required','string']]);

        // Save data
        $opacity = $request->opacity;
        if(isset($opacity) && !is_null($opacity) && is_string($opacity)){
            $color->opacity = $opacity;
            $color->save();
            return redirect()->route('color.informations',$color)->with('message', "L'opacité de la couleur a bien été modifié");
        }else{
            return redirect()->route('color.informations',$color)->with('messageError', "Un problème est survenu lors de l'enrtegistrement des données"); 
        }
    }

    /**
     * Displays the view color informations by research. 
     *
     * @param \Illuminate\Http\Request  $request
     * @return view
     */
    public function showColorInformationsByResearch(Request  $request)
    {
        //dd($request->search);
        $search = $request->search;
        $words = explode(" ",$search);
        $q = "";
        foreach ($words as $word) {
            $q .= '%'.$word;
        };
        $q .= '%';
        $color = Color::where('name', 'like', $q)->first();
        if (is_null($color)) {
            return back()->with('messageError','Aucune image ne correspond à votre recherche');
        } else { 
            return view('Flooflix_websiteManagement.colorInformations', compact('color'));
        }
        
    }
    
    /**
     * Displays the view to add color. 
     *
     * @return view
     */
    public function addColor()
    {
        return view('Flooflix_websiteManagement.forms.colors.createColor');
    }

    /**
     * Displays the view color. 
     *
     * @param \App\color  $color
     * @return view
     */
    public function showColorInformations($color)
    {
        $color = Color::find($color);
        return view('Flooflix_websiteManagement.colorInformations',compact('color'));
    }

    /**
     * Store a newly created color in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function storeColor(Request $request)
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
                    return back()->with('message', 'Cette couleur existe déjà');
                }
            }
            // Save data
            $color = New Color;
            $color->name = e($request->name);
            $color->rgb = e($request->rgb);
            if($request->opacity == null){
                $opacity = 1;
            }else{
                $opacity = $request->opacity;
            }
            $color->opacity = e($opacity);
            $color->save();
            return redirect()->route('colors.list')->with('message', 'Les données ont bien été ajoutées');
        }else{
            return redirect()->route('create.color')->with('messageError', "Une erreur est survenue lors de l'enregistrement des données.");
        } 
    }

    /**
     * Delete color.
     *
     * @param  \App\Color  $color
     * @return view
     */
    public function deleteColor(color $color)
    {
        // Delete color in database
        $color->delete();
        
        return redirect()->route('colors.list')->with('message', "L'image a bien été supprimée");
        
    }

}
