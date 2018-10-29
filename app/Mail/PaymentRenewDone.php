<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class PaymentRenewDone extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

//    protected $user;
    protected $pdfInvoice;
    protected $userName;
    public function __construct($pdfInvoice,$userName)
    {
        $this->userName=$userName;
        //if not add output() give error as base_64 encode error...
        $this->pdfInvoice=$pdfInvoice->output();;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'testing@coolhostme.com';
        $subject = 'Payment Renew Done!';
        $name = 'CoolHost site';

        return $this->view('mails/paymentRenewDoneMail')
            ->from($address, $name)
            ->subject($subject)
            ->with([ 'userName'=> $this->userName])
            ->attachData($this->pdfInvoice, 'invoice123.pdf', [
                'mime' => 'application/pdf']);
    }
}
