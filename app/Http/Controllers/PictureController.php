<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    /**
     * Display a listing of the pictures.
     *
     * @return view
     */
    public function index()
    {
        $pictures = Picture::all();
        return view('admin.pictures',compact('pictures'));
    }

    /**
     * Show the form for creating a new picture.
     *
     * @return view
     */
    public function create()
    {
        return view('admin.forms.createPicture');
    }

    /**
     * Store a newly created picture in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function store(Request $request)
    {
        // Validate the fields
        request()->validate(['name' => ['required','string']]);
        request()->validate(['picture' => ['required','file','image']]);
        
        // Check if an image is downloaded
        if( $request->hasFile('picture') && $request->file('picture')->isValid()){
            
            // Get the extension file
            $extension = $request->picture->extension();
            
            // Modify jpeg extension
            if($extension == "jpeg"){
                $extension = "jpg";
            }
            // Data verification
            if (isset($request->name) && !is_null($request->name) && !empty($request->name) && is_string($request->name)) {
                // Store picture in local storage
                $res = $request->picture->storeAs('public/images', $request->name . '.' . $extension);
                dump($res);
    
                // Create path for style tag
                $path = 'storage/images/' . $request->name . '.' . $extension;
                
                // Save Path for style tag
                $picture = New Picture;
                $picture->name = $request->name;
                $picture->link = $res;
                $picture->style = $path;
                $picture->save();
            } else {
                return redirect('/picture')->with('messageError', "Un problème est survenu lors de l'enrtegistrement des données"); 
            }
            
        }else{
            return redirect('/picture')->with('messageError', "l'image n'a pas été reconnu par le système.");
        }
        return redirect('/picture')->with('message', 'Les données ont bien été ajoutées');         
    }

    /**
     * Display the specified picture.
     *
     * @param  \App\Picture  $picture
     * @return view
     */
    public function show(Picture $picture)
    {
        return view('admin.picture',compact('picture'));
    }

    /**
     * Show the form for editing the specified picture.
     *
     * @param  \App\Picture  $picture
     * @return view
     */
    public function edit(Picture $picture)
    {
        return view('admin.forms.editPicture',compact('picture'));
    }

    /**
     * Update the picture.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Picture  $picture
     * @return view
     */
    public function update(Request $request, Picture $picture)
    {
        // Validate the fields
        request()->validate(['name' => ['required','string']]);
        request()->validate(['link' => ['required','string']]);
        request()->validate(['style' => ['required','string']]);

        // Data verification
        if (isset($request->name) && isset($request->link) && isset($request->style) && !is_null($request->name) && !is_null($request->link) && !is_null($request->style) && !empty($request->name) && !empty($request->link) && !empty($request->style) && is_string($request->name) && is_string($request->link) && is_string($request->style)) {
            if(($request->name == $picture->name) && ($request->link ==$picture->link) && ($request->style == $picture->style)){
                // if datas entered are the same.
                return redirect('/picture');
            }else{
                // else update datas
                $picture->update($request->all());
                return redirect('/picture')->with('message', 'Les données ont bien été modifiées');
            }
        }else{
            return redirect('/picture')->with('messageError', "l'image n'a pas été reconnu par le système.");
        }
    }

    /**
     * Remove the specified picture from storage.
     *
     * @param  \App\Picture  $picture
     * @return view
     */
    public function destroy(Picture $picture)
    {
        Storage::delete('public/images/'. $picture->name);
        $picture->delete();
        return redirect('/picture')->with('message',"L'image a bien été supprimé");
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
     * Displays the view pictures list. 
     *
     * @return view
     */
    public function picturesList()
    {
        $pictures = Picture::all();
        return view('Flooflix_websiteManagement.picturesList',compact('pictures'));
    }

    /**
     * Store a newly created picture in storage form management.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function storePictureFromManagement(Request $request)
    {
        // Validate the fields
        request()->validate(['name' => ['required','string']]);
        request()->validate(['picture' => ['required','file','image']]);
        
        // Check if an image is downloaded
        if( $request->hasFile('picture') && $request->file('picture')->isValid()){
            
            // Get the extension file
            $extension = $request->picture->extension();
            
            // Modify jpeg extension
            if($extension == "jpeg"){
                $extension = "jpg";
            }
            // Data verification
            if (isset($request->name) && !is_null($request->name) && !empty($request->name) && is_string($request->name)) {
                // Store picture in local storage
                $res = $request->picture->storeAs('public/images', $request->name . '.' . $extension);
                dump($res);
    
                // Create path for style tag
                $path = 'storage/images/' . $request->name . '.' . $extension;
                
                // Save Path for style tag
                $picture = New Picture;
                $picture->name = $request->name;
                $picture->link = $res;
                $picture->style = $path;
                $picture->save();
            } else {
                return redirect('/ListeDesImages')->with('messageError', "Un problème est survenu lors de l'enrtegistrement des données"); 
            }
            
        }else{
            return redirect('/ListeDesImages')->with('messageError', "l'image n'a pas été reconnu par le système.");
        }
        return redirect('/ListeDesImages')->with('message', "L'image a bien été ajoutée");         
    }

    /** 
     * Show the form for editing the picture name.
     *
     * @param  \App\Picture  $picture
     * @return view
     */
    public function editPictureName(Picture $picture)
    {
        return view('Flooflix_websiteManagement.forms.pictures.editPictureName', compact('picture'));
    }

    /**
     * Update the picture name.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Picture  $picture
     * @return view
     */
    public function updatePictureName(Request $request,Picture $picture)
    {
        //Validate fields
        request()->validate(['name' => ['required','string']]);

        // Save data
        $name = $request->name;
        if(isset($name) && !is_null($name) && is_string($name)){
            $picture->name =  $request->name;
            $picture->save();
            return redirect('/ListeDesImages')->with('message', "Le nom de l'image a bien été modifié");
        }else{
            return redirect('/ListeDesImages')->with('messageError', "Un problème est survenu lors de l'enrtegistrement des données"); 
        }
    }

    /** 
     * Show the form for editing the visual of the picture.
     *
     * @param  \App\Picture  $picture
     * @return view
     */
    public function editVisualOfPicture(Picture $picture)
    {
        return view('Flooflix_websiteManagement.forms.pictures.editVisualPicture', compact('picture'));
    }

    /**
     * Update the visual of the picture.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Picture  $picture
     * @return view
     */
    public function updateVisualOfPicture(Request $request,Picture $picture)
    {
        // Validate the fields
        request()->validate(['picture' => ['required','file','image']]);
        
        // Check if an image is downloaded
        if($request->hasFile('picture') && $request->file('picture')->isValid()){
            
            // Delete old picture
            $result = Storage::delete($picture->link);
            // Get the extension file
            $extension = $request->picture->extension();
            
            // Modify jpeg extension
            if($extension == "jpeg"){
                $extension = "jpg";
            }
            // Data verification
            $res = $request->picture->storeAs('public/images', $picture->name . '.' . $extension);
            dump($res); 

            // Create path for style tag
            $path = 'storage/images/' . $picture->name . '.' . $extension;
            
            // Save Path for style tag
            $picture->link = $res;
            $picture->style = $path;
            $picture->save();
            
        }else{
            return redirect('/ListeDesImages')->with('messageError', "l'image n'a pas été reconnu par le système.");
        }
        return redirect('/ListeDesImages')->with('message',"L'image a bien été modifiée"); 
    }

    /**
     * Delete picture.
     *
     * @param  \App\Picture  $picture
     * @return view
     */
    public function deletePicture(Picture $picture)
    {
        // Delete picture file in storage
        $result = Storage::delete($picture->link);
        // Delete picture in database
        $picture->delete();
        
        return redirect('/ListeDesImages')->with('message', "L'image a bien été supprimée");
        
    }





}


