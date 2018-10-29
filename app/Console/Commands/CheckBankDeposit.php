<?php

namespace App\Console\Commands;

use App\Invoice;
use App\Payment;
use App\SharedHostingPlan;
use Illuminate\Console\Command;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentRenewDone;
use Barryvdh\DomPDF\Facade as PDF;
use App\Libs;

class CheckBankDeposit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:bankDeposit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check bank deposit and update db';

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
            $maxUserId=Invoice::where('user_id','>',0)->get()->max('user_id');

            for($checkUserId = 2;$checkUserId<=$maxUserId;$checkUserId++)
            {

                if(Invoice::where('user_id','=',$checkUserId)->exists()){
                    $lastInvoice=Invoice::where('user_id','=',$checkUserId)->get()->last();
                }
                else{
                    continue;
                }

                $lastInvoice=Invoice::where('user_id','=',$checkUserId)->get()->last();

                if($lastInvoice->paymentStatus=="paid"){
                    //save payment success status in user table...
                    $UserSuccessState = User::find($checkUserId);
                    $UserSuccessState->success_status = "success";
                    $UserSuccessState->save();


                    //in first payment invoice date update...
                    $noOfPayment=Invoice::where('user_id',$checkUserId)->count();

                    if($noOfPayment==1){

                        $firstPaymentDate = strtotime(date('Y-m-d'));
                        $firstInVoiceRenewDate = date("Y-m-d", strtotime("+1 year", $firstPaymentDate));

                        DB::table('invoices')->where('user_id',$checkUserId)->update([
                            'date'=>$firstInVoiceRenewDate,
                        ]);
                    }

                    //update last payment invoice as PAID...
                    $lastInvoice=Invoice::where('user_id',$checkUserId)->get()->last();
                    $lastInvoice->paymentStatus="paid";
                    $lastInvoice->save();

                    //create a new invoice after payment...
                    $newInvoice = new Invoice();
                    $lastPaymentRow = DB::table('invoices')->where('user_id', $checkUserId)->orderBy('date', 'desc')->first();

                    // check whether user has done payment oy not...
                    $hasVestaAccount = Payment::where('user_id', $checkUserId)->max('id');

                    //create a payment
                    $payment = new Payment();

                    $payment->user_id = $checkUserId;
                    $payment->invoice_id = DB::table('invoices')->where('user_id', $checkUserId)->max('id');
                    $payment->payment_value = DB::table('invoices')->where('user_id', $checkUserId)->value('amount');
                    $payment->payment_method="bank Deposit";
                    $payment->save();

                    //create new reNew date...
                    $lastPaymentDoneDate = strtotime($lastPaymentRow->date);
                    $newRenewDate = date("Y-m-d", strtotime("+1 year", $lastPaymentDoneDate));

                    $newInvoice->user_id = $checkUserId;
                    $newInvoice->hosting_id = $lastPaymentRow->hosting_id;
                    $newInvoice->amount = $lastPaymentRow->amount;
                    $newInvoice->date = $newRenewDate;
                    $newInvoice->paymentStatus = "Unpaid";
                    $newInvoice->save();


                    //send request to vestaCp by calling this function...
                    If ($hasVestaAccount > 0) {

                        $user=User::where('id',$checkUserId)->first();
                        //get user name for the send email.
                        $checkingUserName=User::where('id',$checkUserId)->value('name');
                        $userName = $checkingUserName;

                        //get new invoice data for the invoice pdf...
                        $invoiceId = Invoice::where('user_id', $checkUserId)->orderBy('id', 'desc')->value('id');
                        $amount = Invoice::where('user_id', $checkUserId)->orderBy('id', 'desc')->first()->value('amount');

                        $hostName = SharedHostingPlan::where('id', $lastPaymentRow->hosting_id)->value('type');

                        //get checking invoice..
                        $paymentInvoice=Invoice::where('id',$invoiceId)->first();

                        //get current Payment date
                        $currentRenewDate = strtotime($paymentInvoice->date);
                        $invoiceRenewDate = date("Y-m-d", strtotime("-1 s", $currentRenewDate));

                        //get current invoice start date...
                        $currentInvoiceStartDate = date("Y-m-d", strtotime("-1 year", $currentRenewDate));

                        //get Current invoice created at..
                        $currentInvoiceCreatedAt = strtotime($paymentInvoice->created_at);
                        $currentInvoiceCreatedAt = date("Y-m-d", strtotime("-1 s", $currentInvoiceCreatedAt));

                        $invoiceDetailsToMail = [

                            'name' => $user->name,
                            'email' => $user->email,
                            'invoice_id' => $invoiceId,
                            'pkgPrice' => $amount,
                            'hostName' => $hostName,
                            'paymentStatus'=>$paymentInvoice->paymentStatus,
                            'currentInvoiceStartDate' => $currentInvoiceStartDate,
                            'invoiceRenewDate' => $invoiceRenewDate,
                            'currentInvoiceCreatedAt'=>$currentInvoiceCreatedAt
                        ];

                        //Create a pdf for see to user..
                        $pdfInvoice = PDF::loadView('invoicePdf', $invoiceDetailsToMail)->setPaper('A4', 'portrait');

                        //return $pdfInvoice->download('invoice.pdf');
                        Mail::to('coolhost111@gmail.com')->send(new PaymentRenewDone($pdfInvoice, $userName));


                        //IF HOST was disabled and payment renew date+7 > current date  unSuspend host.
                        $currentDate=date('Y-m-d');
                        //get time as string...

                        $dateTimestamp=strtotime($currentDate);
                        $invoiceTimestamp=strtotime($newRenewDate);
                        $difference=($invoiceTimestamp-$dateTimestamp)/(60*60*24);

                        $vestaAccountStatus=User::where('id',$checkUserId)->value('vesta_account_status');

                        if($difference>-7 && ($vestaAccountStatus=='suspended')){
                            $logedUserId=$checkUserId;
                            //unSuspend vesta account
                            $vestaStatus=Libs\UnSuspendVestaAccount::unSuspendVestaAccount($userName,$logedUserId);
                            echo $vestaStatus;

                        }


                    } else {
                        //create vestaCP user account
                        $userName=User::where('id',$checkUserId)->first()->value('name');
                        $userEmail=User::where('id',$checkUserId)->first()->value('email');

                        $vestaStatus=Libs\CreateVestaAccount::createVestaAccount($userName,$userEmail);   //$vestaStatus is success if done...
                        echo $vestaStatus;
                    }
                }
            }
            DB::commit();

        }catch(\Exception $e){
            DB::rollback();
        }

    }
}
