<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Mail\ResetPassword;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    //use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLinkRequestForm()
    {
        return view('Flooflix.auth.passwords.email');
    }

    /**
     * reset password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function sendResetLinkEmail(Request  $request)
    {
        $this->validate($request, ['email' => 'required|email']);
        $users = User::all();
        foreach ($users as $user) {
            if($user->email == $request->email){
                Mail::to($user->email)->send(new ResetPassword($user));
                return redirect()->route('home')->with('message','Un message vient de vous être envoyé avec un lien de redirection pour réinitialiser votre mot de passe');
            }else{
                return back()->with('messageError','Votre adresse email ne correspond à aucune adresse email connue de notre site.');
            }
        }      
    }
}
