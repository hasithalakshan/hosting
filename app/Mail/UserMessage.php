<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $userMessage;
    protected $email;
    //public is also work
    public function __construct($userMessage,$email)
    {
        $this->userMessage=$userMessage;
        $this->email=$email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = "anyemail@gmail.com";
        $subject = 'User Message';
        $name = 'CoolHost Admin ';
//        $name = 'හසිත ලක්ශාන්';


        return $this->view('mails/userMessageMail')
            ->from($address, $name)
            ->subject($subject)
            ->with(['userMsg' => $this->userMessage,'userEmail'=> $this->email]);
    }
}
