<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use App\Role;

class OwnerController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Users are authenticated by login.
     *
     * @return string
     */
    public function username()
    {
        return 'login';
    }

    /**
     * Displays the view home. 
     *
     * @return view
     */
    public function home()
    {
        return view('Flooflix.websiteManagement.home');
    }

    /**
     * Displays the view movies management. 
     *
     * @return view
     */
    public function moviesManagement()
    {
        return view('Flooflix.websiteManagement.moviesManagement');
    }

    
    /**
     * Displays the view users management. 
     *
     * @return view
     */
    public function usersManagement()
    {
        return view('Flooflix.websiteManagement.usersManagement');
    }

    /**
     * Displays the view users list. 
     *
     * @return view
     */
    public function usersList()
    {
        return view('Flooflix.websiteManagement.usersList');
    }

    /**
     * Displays the view user's movie collection. 
     *
     * @return view
     */
    public function showUserMoviesCollection()
    {
        return view('Flooflix.websiteManagement.userMoviesCollection');
    }

    /**
     * Displays the view pages management. 
     *
     * @return view
     */
    public function pagesManagement()
    {
        return view('Flooflix.websiteManagement.pagesManagement');
    }

    /**
     * Displays the view general information Management. 
     *
     * @return view
     */
    public function generalInformationManagement()
    {
        return view('Flooflix.websiteManagement.generalInformationManagement');
    }

    /**
     * Displays the view visual elements management. 
     *
     * @return view
     */
    public function visualElementsManagement()
    {
        return view('Flooflix.websiteManagement.visualElementsManagement');
    }

    /**
     * Displays the view fonts list. 
     *
     * @return view
     */
    public function fontsList()
    {
        return view('Flooflix.websiteManagement.fontsList');
    }

    /**
     * Displays the view add font. 
     *
     * @return view
     */
    public function addFont()
    {
        return view('Flooflix.websiteManagement.forms.createFont');
    }
    /**
     * Displays the view colors list. 
     *
     * @return view
     */
    public function colorsList()
    {
        return view('Flooflix.websiteManagement.colorsList');
    }

    /**
     * Displays the view add color. 
     *
     * @return view
     */
    public function addcolor()
    {
        return view('Flooflix.websiteManagement.forms.createColor');
    }

    /**
     * Displays the view add Picture. 
     *
     * @return view
     */
    public function addPicture()
    {
        return view('Flooflix.websiteManagement.forms.createPicture');
    }

    /**
     * Logout a user.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function logout()
    {
        auth()->logout(); 
        return redirect('/owner')->with('message', 'Vous êtes déconnecté.');
    }
}
