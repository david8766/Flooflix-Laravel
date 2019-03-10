<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Illuminate\Support\Carbon;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param string $token
     * @param User $user
     * @return void
     */
    public function __construct(User $user,String $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {    
        return $this->subject('Invitation à réinitialiser le mot de passe')
        ->from('contact@flooflix.com')
        ->view('Flooflix.mail.resetPassword')->with([
            'date' => (new Carbon)->format('d/m/Y'),
            'user' => $this->user,
            'token' => $this->token
        ]);
    }
}
