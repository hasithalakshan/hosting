<?php

namespace App\Mail;

use App\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RememberToPayment extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $checkingUserPayToDate;
    protected $pdf;
    protected $userName;
    protected $hostName;
    protected $checkingInvoiceId;
    public function __construct($checkingUserPayToDate, $pdf,$userName,$hostName)
    {
        $this->checkingUserPayToDate = $checkingUserPayToDate;
        $this->pdf = $pdf->output();
        $this->userName = $userName;
        $this->hostName = $hostName;
        echo($checkingUserPayToDate);
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

        return $this->view('mails/rememberToPaymentMail')
            ->from($address, $name)
            ->subject($subject)
            ->with([ 'checkingUserPayToDate' => $this->checkingUserPayToDate,'userName'=>$this->userName,'hostName'=>$this->hostName])
            ->attachData($this->pdf, 'invoice.pdf', [
                'mime' => 'application/pdf']);
    }
}
