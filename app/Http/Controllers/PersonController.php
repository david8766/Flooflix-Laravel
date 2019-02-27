<?php

namespace App\Http\Controllers;

use App\Person;
use App\Movie;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @param  \App\Movie  $movie
     * @return view
     */
    public function edit( Movie $movie,Person $person)
    {
        return view('Flooflix.websiteManagement.forms.movie.editPerson', compact('movie','person')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return view
     */
    public function update(Request $request, Movie $movie, Person $person)
    {
        //Validate fields
        request()->validate(['last_name' => ['required','string']]);
        request()->validate(['first_name' => ['required','string']]);

        $person->last_name = $request->last_name;
        $person->first_name = $request->first_name;
        $person->save();

        return redirect()->route('movie.informations',$movie)->with('message','Les informations pour cette personne ont bien été modifiées');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
    }
}
