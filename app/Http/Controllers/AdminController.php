<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use App\Role;


class AdminController extends Controller
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
        return view('admin.home');
    }

    /**
     * Displays the view of the developer authentication form. 
     *
     * @return view
     */
    public function login()
    {
        return view('admin.auth.login');
    }
   

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return view
     */
    public function authenticate(Request $request)
    {
        // Form fields validation.
        request()->validate([
            'login' => ['required','string'],
            'password' => ['required','string']
        ]);
        // Verifying that the data matches a user. 
        $result = auth()->attempt([
            'login' => request('login'),
            'password' => request('password')
        ]);
        // $result return true or false.
        if($result == true){
            // We retrieve the user who corresponds to the entered login
            $user = User::where('login', request('login'))->first();
            // We get the admin role object
            $role = Role::where('role','admin')->first();
            // We retrieve the user's ID
            $user = $user->role_id;
            // We get the identifier of the admin role
            $admin = $role->id;
            // We compare the identifiers
            if($user == $admin){
                return redirect()->route('admin.home');
            }
            else{
                return back()->withInput()->withErrors([
                    'login' => "Vous n'êtes pas administrateur! Veuillez quitter cette page."
                ]);
            }
        }
        else{
            return back()->withInput()->withErrors([
                'login' => "Vos identifiants sont incorrects."
            ]);
        }
    }

    /**
     * Logout a user.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return view
     */
    public function logout()
    {
        auth()->logout(); 
        return redirect()->route('admin.login')->with('message', 'Vous êtes déconnecté.');
    }
}
