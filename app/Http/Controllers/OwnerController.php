<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Picture;
use App\Font;
use App\Text;
use App\Color;

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
        return view('Flooflix_websiteManagement.home');
    }

    /**
     * Displays the view movies management. 
     *
     * @return view
     */
    public function moviesManagement()
    {
        return view('Flooflix_websiteManagement.moviesManagement');
    }

    
    /**
     * Displays the view users management. 
     *
     * @return view
     */
    public function usersManagement()
    {
        return view('Flooflix_websiteManagement.usersManagement');
    }

    /**
     * Displays the view users list. 
     *
     * @return view
     */
    public function usersList()
    {
        return view('Flooflix_websiteManagement.usersList');
    }

    /**
     * Displays the view user's movie collection. 
     *
     * @return view
     */
    public function showUserMoviesCollection()
    {
        return view('Flooflix_websiteManagement.userMoviesCollection');
    }

    /**
     * Displays the view pages management. 
     *
     * @return view
     */
    public function pagesManagement()
    {
        return view('Flooflix_websiteManagement.pagesManagement');
    }

    /**
     * Displays the view general information Management. 
     *
     * @return view
     */
    public function generalInformationManagement()
    {
        return view('Flooflix_websiteManagement.generalInformationManagement');
    }

    /**
     * Displays the view visual elements management. 
     *
     * @return view
     */
    public function visualElementsManagement()
    {
        $fonts = Font::all();
        $colors = Color::all();
        $pictures = Picture::all();
        return view('Flooflix_websiteManagement.visualElementsManagement',compact('pictures','colors','fonts'));
    }

    /**
     * Displays the view add font. 
     *
     * @return view
     */
    public function addFont()
    {
        return view('Flooflix_websiteManagement.forms.createFont');
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
