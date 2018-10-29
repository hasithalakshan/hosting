<?php

namespace App\Console\Commands;

use App\SharedHostingPlan;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Invoice;
use App\Payment;
use App\Mail\RememberToPayment;
use App\Mail\NotPaidInformAdmin;
use App\Libs;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;



class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification e-mails to a user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::beginTransaction();

        try{
            echo('started tron job..');
            //get current date...
            $date = date('Y-m-d H:i:s');
            //get invoices details as an array...
            $invoiceDetails = DB::table('invoices')
                ->where('user_id','>', 0)
                ->get();

            foreach ($invoiceDetails as $invoiceDetail) {

                //get different between current date and renew date
                $dateTimestamp = strtotime($date); //time as string value display...

                $checkingInvoiceId=$invoiceDetail->id;
                $existInvoiceInPayment=Payment::where('invoice_id', '=',$checkingInvoiceId)->exists();

                if ($existInvoiceInPayment == null) {
                    //invoice date to payment
                    $dateToPaymentStr = strtotime($invoiceDetail->date);
                    $invoiceTimestamp = date("Y-m-d", strtotime("-1 year",$dateToPaymentStr));
                    $invoiceTimestampStr=strtotime($invoiceTimestamp);
                }
                else{
                    $invoiceTimestampStr = $dateTimestamp; //it is define to avoid invoices which have done payment...
                }
                $difference = ($invoiceTimestampStr - $dateTimestamp)/(60*60*24);

                if($difference<-7){
                    //Disable the host and send an email to admin with each user details...
                    $checkingUserId = $invoiceDetail->user_id;
                    $userName=User::where('id',$checkingUserId)->value('name');
                    $dateToPayment = Invoice::where('user_id', $checkingUserId)->orderBy('date', 'desc')->first()->value('date');

                    Mail::to('coolhost111@gmail.com')->send(new NotPaidInformAdmin($checkingUserId,$userName,$dateToPayment));

                    //cal to a external function in Libs folder to suspend vesta host...
                    $suspendAccount=Libs\SuspendVestaAccount::suspendVestaAccount($userName,$checkingUserId);
                    echo $suspendAccount;

                }else {

                    //check whether the invoice has paid or not...
                    $checkingInvoiceId = $invoiceDetail->id;

                    echo($checkingInvoiceId);
                    if (Payment::where('invoice_id', '=', $checkingInvoiceId)->exists()) {
                        $paymentDone = 'yes';
                    } else {
                        $paymentDone = 'no';
                    }

                    if (($difference < 30) && ($paymentDone == 'no')) {

                        echo('have 30 days more');
                        //get user email that related to invoice..
                        $checkingUserId = $invoiceDetail->user_id;
                        $checkingUserEmail = User::where('id', '=', $checkingUserId)->value('email');
                        echo($checkingUserEmail);

                        //get payment renew date...
                        $checkingUserPayToDateF = strtotime($invoiceDetail->date);
                        $checkingUserPayToDate=date("Y-m-d", strtotime("-1 year",$checkingUserPayToDateF));
                        echo($checkingUserPayToDate);

                        //get User details related to invoice...
                        $checkingUserId = $invoiceDetail->user_id;
                        $userName=User::where('id',$checkingUserId)->value('name');
                        $userEmail=User::where('id',$checkingUserId)->value('email');

                        $pkgPrice=Invoice::where('user_id',$checkingUserId)->first()->value('amount');
                        $hostName=SharedHostingPlan::where('id',$invoiceDetail->hosting_id)->value('type');

                        //get checking invoice..
                        $paymentInvoice=Invoice::where('id',$checkingInvoiceId)->first();

                        //get current Payment date
                        $currentRenewDate = strtotime($paymentInvoice->date);
                        $invoiceRenewDate = date("Y-m-d", strtotime("-1 s", $currentRenewDate));

                        //get current invoice start date...
                        $currentInvoiceStartDate = date("Y-m-d", strtotime("-1 year", $currentRenewDate));

                        //get Current invoice created at..
                        $currentInvoiceCreatedAt = strtotime($paymentInvoice->created_at);
                        $currentInvoiceCreatedAt = date("Y-m-d", strtotime("-1 s", $currentInvoiceCreatedAt));
                        
                        //invoice id has got above
                        $invoiceDetailsToMail = [

                            'name' => $userName,
                            'email' => $userEmail,
                            'invoice_id' => $checkingInvoiceId,
                            'pkgPrice' => $pkgPrice,
                            'hostName' => $hostName,
                            'paymentStatus'=>$paymentInvoice->paymentStatus,
                            'currentInvoiceStartDate' => $currentInvoiceStartDate,
                            'invoiceRenewDate' => $invoiceRenewDate,
                            'currentInvoiceCreatedAt'=>$currentInvoiceCreatedAt

                        ];

                        //convert invoiceToMail.blade.php to pdf
                        $pdf = PDF::loadView('invoicePdf',$invoiceDetailsToMail)->setPaper('A4', 'portrait');


                        //$checkingUserEmail
                        Mail::to('wasantharandima111@gmail.com')->send(new RememberToPayment($checkingUserPayToDate, $pdf,$userName,$hostName));
                        }
                    }
                }
                DB::commit();
            }

        catch(\Exception $e){
            DB::rollback();
        }

    }
}
