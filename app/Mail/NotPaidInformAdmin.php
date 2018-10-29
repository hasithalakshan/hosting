<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotPaidInformAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $checkingUserId;
    protected $userName;
    protected $dateToPayment;
    public function __construct($checkingUserId,$userName,$dateToPayment)
    {
        $this->checkingUserId=$checkingUserId;
        $this->userName=$userName;
        $this->dateToPayment=$dateToPayment;
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
        $name = 'CoolHost';

        return $this->view('mails/notPaidInformAdmin')
            ->from($address, $name)
            ->subject($subject)
            ->with(['checkingUserId'=>$this->checkingUserId,'userName'=>$this->userName,'dateToPayment'=>$this->dateToPayment]);

    }
}
