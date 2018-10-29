<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function updatePaymentStatus(Request $request){

        //header('Access-Control-Allow-Origin: *');
        return "SUCCESS";
    }

    public function confirmPayment($order_id){

        echo $order_id;
        //payment response work on windows...
        return redirect('resOfCheckout');

//        DB::beginTransaction();
//
//        try {
//            if (Auth::check()) {
//
//                //save payment success status in user table...
//                $UserSuccessState = User::find(Auth::user()->id);
//                $UserSuccessState->success_status = "success";
//                $UserSuccessState->save();
//
//
//                //in first payment invoice date update...
//                $noOfPayment=Invoice::where('user_id',Auth::user()->id)->count();
//
//                if($noOfPayment==1){
//                    $firstPaymentDate = strtotime(date('Y-m-d'));
//                    $firstInVoiceRenewDate = date("Y-m-d", strtotime("+1 year", $firstPaymentDate));
//
//                    DB::table('invoices')->where('user_id',Auth::id())->update([
//                        'date'=>$firstInVoiceRenewDate,
//                    ]);
//                }
//
//                //update last payment invoice as PAID...
//                $lastInvoice=Invoice::where('user_id',Auth::id())->get()->last();
//
//                $lastInvoice->paymentStatus="paid";
//                $lastInvoice->save();
//
//                //create a new invoice after payment...
//                $newInvoice = new Invoice();
//                $lastPaymentRow = DB::table('invoices')->where('user_id', Auth::user()->id)->orderBy('date', 'desc')->first();
//
//                // check whether user has done payment oy not...
//                $hasVestaAccount = Payment::where('user_id', Auth::user()->id)->max('id');
//
//                //create a payment
//                $payment = new Payment();
//
//                $payment->user_id = Auth::user()->id;
//                $payment->invoice_id = DB::table('invoices')->where('user_id', Auth::user()->id)->max('id');
//                $payment->payment_value = DB::table('invoices')->where('user_id', Auth::user()->id)->value('amount');
//                $payment->payment_method="online";
//                $payment->save();
//
//
//                //create new reNew date...
//                $lastPaymentDoneDate = strtotime($lastPaymentRow->date);
//                $newRenewDate = date("Y-m-d", strtotime("+1 year", $lastPaymentDoneDate));
//
//
//                $newInvoice->user_id = Auth::user()->id;
//                $newInvoice->hosting_id = $lastPaymentRow->hosting_id;
//                $newInvoice->amount = $lastPaymentRow->amount;
//                $newInvoice->date = $newRenewDate;
//                $newInvoice->paymentStatus = "Unpaid";
//                $newInvoice->save();
//
////                    dd($newInvoice);
//
//                //send request to vestaCp by calling this function...
//                If ($hasVestaAccount > 0) {
//
//                    //get user name for the send email.
//                    $userName = Auth::user()->name;
//                    $user=User::find(Auth::id());
//
//                    //get new invoice data for the invoice pdf...
//                    $invoiceId = Invoice::where('user_id','=', Auth::user()->id)->orderBy('id', 'desc')->value('id');
//
//                    $maxInvoiceId=DB::table('invoices')->where('user_id',Auth::user()->id)->get()->max('id');
//                    $paymentInvoice=Invoice::where('id',$maxInvoiceId)->get()->first();
//
//                    //get current Payment date
//                    $currentRenewDate = strtotime($paymentInvoice->date);
//                    $invoiceRenewDate = date("Y-m-d", strtotime("-1 s", $currentRenewDate));
//
//                    //get current invoice start date...
//                    $currentInvoiceStartDate = date("Y-m-d", strtotime("-1 year", $currentRenewDate));
//
//                    //get Current invoice created at..
//                    $currentInvoiceCreatedAt = strtotime($paymentInvoice->created_at);
//                    $currentInvoiceCreatedAt = date("Y-m-d", strtotime("-1 s", $currentInvoiceCreatedAt));
//
//                    $hostName = SharedHostingPlan::where('id', $lastPaymentRow->hosting_id)->value('type');
//
//                    $newRenewDateStr = strtotime($newRenewDate);
//                    $newRenewDate = date("Y-m-d", strtotime("-1 year", $newRenewDateStr));
//
//                    $invoiceDetailsToMail = [
//
//                        'name' => $user->name,
//                        'email' => $user->email,
//                        'invoice_id' => $invoiceId,
//                        'pkgPrice' => $paymentInvoice->amount,
//                        'hostName' => $hostName,
//                        'paymentStatus'=>$paymentInvoice->paymentStatus,
//                        'currentInvoiceStartDate' => $currentInvoiceStartDate,
//                        'invoiceRenewDate' => $invoiceRenewDate,
//                        'currentInvoiceCreatedAt'=>$currentInvoiceCreatedAt
//                    ];
//
//
//                    //Create a pdf for see to user..
//                    $pdfInvoice = PDF::loadView('invoicePdf',$invoiceDetailsToMail)->setPaper('A4', 'portrait');
//
//                    //return $pdfInvoice->download('invoice.pdf');
//                    Mail::to('coolhost111@gmail.com')->send(new PaymentRenewDone($pdfInvoice, $userName));
//
//                    //IF HOST was disabled and payment renew date+7 > current date  unSuspend host.
//                    $currentDate=date('Y-m-d');
//                    //get time as string...
//
//                    $dateTimestamp=strtotime($currentDate);
//                    $invoiceTimestamp=strtotime($newRenewDate);
//                    $difference=($invoiceTimestamp-$dateTimestamp)/(60*60*24);
//
//                    $vestaAccountStatus=User::where('id',Auth::user()->id)->value('vesta_account_status');
//
//                    if($difference>-7 && ($vestaAccountStatus=='suspended')){
//                        $logedUserId=Auth::user()->id;
//                        //unSuspend vesta account
//                        $vestaStatus=Libs\UnSuspendVestaAccount::unSuspendVestaAccount($userName,$logedUserId);
//                        echo $vestaStatus;
//
//                    }
//
//                } else {
//                    //create vestaCP user account
//                    $userName=User::where('id',Auth::id())->value('name');
//                    $userEmail=User::where('id',Auth::id())->value('email');
//
//                    $vestaStatus=Libs\CreateVestaAccount::createVestaAccount($userName,$userEmail);   //$vestaStatus is success if done...
//                    echo $vestaStatus;
//
//                }
//            }
//
//            DB::commit();
//
//            $hasDoneAPayment=Payment::where('user_id',Auth::id())->exists();
//
//            if($hasDoneAPayment){
//                $paymentTimes=Payment::where('user_id',Auth::user()->id)->count();
//                if($paymentTimes>1){
//                    return redirect('yearlyPaymentSuccess');
//                }
//            }
//            else{
//                return view("successRes");
//            }
//
//
//
//        } catch (\Exception $e) {
//            DB::rollBack();
//
//            $myfile = fopen("paymentError/errorLog.txt", "a") or die("Unable to open file!");
//
//            $invoice_id=Invoice::where('user_id',Auth::id())->get()->max('id');
//            $var1 = "*\tError:-"."user id=".Auth::id()."\n";
//            $var2 = "\tinvoice id=".$invoice_id."\n";
//            $var3 = "\tmessage=".$e->getmessage()."\n";
//            $date = "\tDate :".date('Y-m-d H:i:s')."\n\n\n";
//
//            fwrite($myfile, $var1);
//            fwrite($myfile, $var2);
//            fwrite($myfile,$var3);
//            fwrite($myfile,$date);
//
//            fclose($myfile);
//
//            dd($e->getMessage());
//            return "error";
//        }

    }

    public function errorPayment($order_id){

        abort(404);

    }
}
