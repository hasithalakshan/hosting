<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\User;
use App\SharedHostingPlan;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Mockery\CountValidator\Exception;


class FileController extends Controller
{

    public function uploadDepositInfo(Request $request){

        if($request->hasFile('image')){

            $image=$request->file('image');
            $invoice_id=$request->order_id;
            $user_id=Auth::id();

            $imageName="bank.".$user_id.".".$invoice_id.".".$image->getClientOriginalExtension();
            $destinationPath=public_path('/bankDetail_images');

            //$image->move($destinationPath, $imageName);

            $thumb_image=Image::make($image->getRealPath())->resize(700, 700);
            $thumb_image->save($destinationPath.'/'.$imageName);

        }
        return redirect()->back();
    }


    public function downloadInvoice(Request $request){

        try{
            $invoice_id=$request->invoice_id;
            $user=User::find(Auth::id());

            $chosenHostingPlan=SharedHostingPlan::where('id',$user->hosting_id)->first();
            $currentInvoice=Invoice::where('id',$invoice_id)->get()->first();

            $hostName = SharedHostingPlan::where('id', $currentInvoice->hosting_id)->value('type');

            //get current Payment date
            $currentRenewDate = strtotime($currentInvoice->date);
            $invoiceRenewDate = date("Y-m-d", strtotime("-1 s", $currentRenewDate));

            //get current invoice start date...
            $currentInvoiceStartDate = date("Y-m-d", strtotime("-1 year", $currentRenewDate));

            //get Current invoice created at..
            $currentInvoiceCreatedAt = strtotime($currentInvoice->created_at);
            $currentInvoiceCreatedAt = date("Y-m-d", strtotime("-1 s", $currentInvoiceCreatedAt));


            $invoiceDetailsToMail = [
                'name' => $user->name,
                'email' => $user->email,
                'invoice_id' => $invoice_id,
                'pkgPrice' => $currentInvoice->amount,
                'hostName' => $hostName,
                'paymentStatus'=>$currentInvoice->paymentStatus,
                'currentInvoiceStartDate' => $currentInvoiceStartDate,
                'invoiceRenewDate' => $invoiceRenewDate,
                'currentInvoiceCreatedAt'=>$currentInvoiceCreatedAt
            ];

            $pdf = PDF::loadView('invoicePdf',$invoiceDetailsToMail)->setPaper('A4', 'portrait');
        }catch (\Exception $e){
            abort(505);
        }


        return $pdf->download('invoice.pdf');
    }


    public function clientArea(Request $request){

        $userName=Auth::user()->name;
        $loggedUserInvoices=Invoice::where('user_id',Auth::id())->get();

        $noOfUnpaidInvoices=0;
        $noOfPaidInvoices=0;
        $rowNumber=1;
        $countOfInvoices=0;

        foreach($loggedUserInvoices as $loggedUserInvoice){
            $paymentStatus=$loggedUserInvoice->paymentStatus;
            if($paymentStatus=='Unpaid'){
                $noOfUnpaidInvoices++;
            }
            if($paymentStatus=='paid'){
                $noOfPaidInvoices++;
            }

            $countOfInvoices++;
        }

        $loggedUserFirstInvoice=Invoice::where('user_id',Auth::id())->get()->first();
        $amountForOneInvoice=$loggedUserFirstInvoice->amount;

        $fullAmountForUnPaid=$noOfUnpaidInvoices*$amountForOneInvoice;

        return view('clientArea')->with(['userName'=>$userName,'rowNumber'=>$rowNumber,'loggedUserInvoices'=>$loggedUserInvoices,'noOfUnpaidInvoices'=>$noOfUnpaidInvoices,'noOfPaidInvoices'=>$noOfPaidInvoices,'countOfInvoices'=>$countOfInvoices,'fullAmountForUnPaid'=>$fullAmountForUnPaid]);
    }


    public function invoicePdf(Request $request)
    {
        $user=User::find(Auth::id());
        $chosenHostingPlan=SharedHostingPlan::where('id',$user->hosting_id)->first();
        $currentInvoice=Invoice::where('user_id',Auth::user()->id)->get()->last();

        //get current Payment date
        $currentRenewDate = strtotime($currentInvoice->date);
        $invoiceRenewDate = date("Y-m-d", strtotime("-1 s", $currentRenewDate));

        //get Current invoice created at..
        $currentInvoiceCreatedAt = strtotime($currentInvoice->created_at);
        $currentInvoiceCreatedAt = date("Y-m-d", strtotime("-1 s", $currentInvoiceCreatedAt));

        return view('invoicePdf')->with(['chosenHostingPlan'=>$chosenHostingPlan,'user'=>$user,'currentInvoice'=>$currentInvoice,'invoiceRenewDate'=>$invoiceRenewDate,'currentInvoiceCreatedAt'=>$currentInvoiceCreatedAt]);
    }

    public function viewInvoicesFromClientArea(Request $request)
    {
        $invoice_id=$request->invoice_id;
        $user=User::find(Auth::id());

        $chosenHostingPlan=SharedHostingPlan::where('id',$user->hosting_id)->first();
        $currentInvoice=Invoice::where('id',$invoice_id)->get()->first();

        //get current Payment date
        $currentRenewDate = strtotime($currentInvoice->date);
        $invoiceRenewDate = date("Y-m-d", strtotime("-1 s", $currentRenewDate));

        //get current invoice start date...
        $currentInvoiceStartDate = date("Y-m-d", strtotime("-1 year", $currentRenewDate));

        //get Current invoice created at..
        $currentInvoiceCreatedAt = strtotime($currentInvoice->created_at);
        $currentInvoiceCreatedAt = date("Y-m-d", strtotime("-1 s", $currentInvoiceCreatedAt));

        return view('paymentInvoice')->with(['chosenHostingPlan'=>$chosenHostingPlan,'user'=>$user,'currentInvoice'=>$currentInvoice,'invoiceRenewDate'=>$invoiceRenewDate,'currentInvoiceStartDate'=>$currentInvoiceStartDate,'currentInvoiceCreatedAt'=>$currentInvoiceCreatedAt]);

    }

}
