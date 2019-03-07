<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Storage;
use App\Role;
use App\User;
use App\Website;
use App\Page;
use App\Text;
use App\Font;
use App\Color;
use App\Picture;
use JavaScript;

class LoginController extends Controller
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
     * Displays the view of the users authentication form. 
     *
     * @return view
     */
    public function login()
    {
        // get resources for display login form
        $website = Website::where('name', 'flooflix')->first();
        $page = Page::where('website_id', $website->id)->where('name', 'connexion')->first();
        $datas = $page->getResourcesToDisplayPage($page);
        return view('Flooflix.auth.login',compact('datas'));
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
        $res = request()->validate([
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
            
            return redirect()->route('home')->with('message', 'Bienvenue sur Flooflix '. $user->first_name . '.');       
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
        session()->flush();
        auth()->logout(); 
        return redirect()->route('home')->with('message','Vous êtes déconnecté.');
    }
}
