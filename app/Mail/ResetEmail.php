<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $token;
    public function __construct($token)
    {
        $this->token=$token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'testing@coolhostme.com';
        $subject = 'Password Reset';
        $name = 'CoolHost';

        return $this->view('mails/passwordResetMail')
            ->from($address, $name)
            ->subject($subject)
            ->with(['token'=>$this->token]);
    }
}
