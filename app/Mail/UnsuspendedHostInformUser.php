<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UnsuspendedHostInformUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $userName;
    public function __construct($userName)
    {
        $this->userName=$userName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'testing@coolhostme.com';
        $subject = 'UnSuspended Your Host';
        $name = 'CoolHost';

        return $this->view('mails/unSuspendedHostMail')
            ->from($address, $name)
            ->subject($subject)
            ->with(['userName'=>$this->userName]);

    }
}
