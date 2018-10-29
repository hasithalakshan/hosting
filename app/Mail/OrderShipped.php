<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $userName;
    protected $VestaPassword;
    protected $websiteUserName;

    public function __construct($userName,$VestaPassword,$websiteUserName)
    {
        $this->userName=$userName;
        $this->VestaPassword=$VestaPassword;
        $this->websiteUserName=$websiteUserName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'testing@coolhostme.com';
        $subject = 'CoolHost Hosting Provider!';
        $name = 'Hasitha Lakshan';

        return $this->view('mails/mail')
            ->from($address, $name)
            ->subject($subject)
            ->with([ 'userName' => $this->userName, 'VestaPassword'=>$this->VestaPassword,'websiteUserName'=>$this->websiteUserName]);

    }
}
