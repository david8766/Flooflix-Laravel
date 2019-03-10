<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Carbon;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param string $subject
     * @param string $message
     * @param string $last_name
     * @param string $first_name
     * @param string $email
     * 
     * @return void
     */
    public function __construct(String $date,String $subject,String $message,String $last_name,String $first_name,string $email)
    {
        $this->subject = $subject;
        $this->message = $message;    
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->email = $email;
        $this->date = $date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {    
        return $this->subject($this->subject)
        ->from($this->email)
        ->view('Flooflix.mail.contact')->with([
            'date' => $this->date,
            'subject' => $this->subject,
            'text' => $this->message,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'email' => $this->email
        ]);
    }
}
