<?php

namespace App\Http\Controllers;

use DB;
use App\Invoice;
use App\SharedHostingPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Laracurl;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\TwoCheckout;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserMessage;
use App\Mail\ResetEmail;
use App\Libs;
use Image;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function loadPage(Request $request)
    {
        $hostPlans = SharedHostingPlan::all();
        return view('index', ['hostPlans' => $hostPlans]);
    }

    public function plans(Request $request)
    {
        $hostPlans = SharedHostingPlan::all();
        return view('plans', ['hostPlans' => $hostPlans]);
    }

    public function passwordEmail(Request $request)
    {
        return view('password/email');
    }

    public function yearlyPaymentSuccess(Request $request)
    {
        return view('yearlyPaymentSuccess');
    }

    public function hostDepSuccess(Request $request)
    {
        return view('successRes');
    }


    public function termsAndCondition(Request $request)
    {
        return view('termsAndCondition');
    }

    public function invoice(Request $request)
    {
        $userName=Auth::user()->name;
        return view('invoice')->with(['userName'=>$userName]);
    }

    public function register(Request $request)
    {
        return view('register');
    }

    public function directLogin(Request $request)
    {
        return view('directLogin');
    }

    public function myProfile(Request $request){
        $user=DB::table('users')->where('id',Auth::id())->first();

        return view('myProfile')->with(['user'=>$user]);
    }

    public function goToClientArea(Request $request){
        if(Auth::check()){
            return redirect("clientArea");
        }
        else{
            return redirect('directLogin');
        }
    }

    public function checkout(Request $request)
    {
        $hostPlan = SharedHostingPlan::all();
        $userName=Auth::user()->name;
        //get user invoice details...
        $currentInvoice=DB::table('invoices')->where('user_id',Auth::user()->id)->get()->last();

        return view('checkout', ['hostPlan' => $hostPlan, 'userName'=>$userName,'currentInvoice'=>$currentInvoice]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function passwordReset($key)
    {
        $resetUserEmail=User::where('resetToken',$key)->value('email');
        return redirect('viewPasswordReset')->with('resetUserEmail',$resetUserEmail);
    }

    public function viewPasswordReset()
    {
        return view('password/resetPassword');
    }

    public function emailCheckToResetPwd(Request $request)
    {
        try{
            $resetEmail = $request->resetEmail;

            if (User::where('email', '=', $resetEmail)->exists()) {
                $random=str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*');
                $token=substr($random,0,18);
                $passwordResetUser=User::where('email', '=', $resetEmail)->first();
                $passwordResetUser->resetToken=$token;
                $passwordResetUser->save();

                Mail::to($resetEmail)->send(new ResetEmail($token));
            };

                return redirect()->back()->with('emailSend', 'Password reset link sent to your email');

            }  catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->with('resetEmailIssue', 'Please check your internet connection');
        }

    }

    public function passwordUpdate(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ];

        $this->validate($request, $rules);

        $emailAddress=$request->email;
        $userInfo=User::where('email',$emailAddress)->get()->first();
        $userInfo->password=bcrypt($request->password);
        $userInfo->save();


        $remember = $request->has('remember') ? true : false;

        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password),$remember)) {
            // Authentication passed...
            if (Auth::check()) {
                // The user is logged in...
                $userName = Auth::user()->name;
                $user=User::find(Auth::id());
                Session::flash('loginsuccess', 'successfully logged in');

                if (Auth::user()->success_status == 'success') {
                    //get user invoice details...
                    $currentInvoice=DB::table('invoices')->where('user_id',Auth::user()->id)->get()->last();

                    //get current Payment date
                    $currentRenewDate = strtotime($currentInvoice->date);
                    $invoiceRenewDate = date("Y-m-d", strtotime("-1 s", $currentRenewDate));

                    //get current invoice start date...
                    $currentInvoiceStartDate = date("Y-m-d", strtotime("-1 year", $currentRenewDate));

                    //get Current invoice created at..
                    $currentInvoiceCreatedAt = strtotime($currentInvoice->created_at);
                    $currentInvoiceCreatedAt = date("Y-m-d", strtotime("-1 s", $currentInvoiceCreatedAt));

                    //get chosen host pkg name...
                    $chosenHostingPlan=DB::table('shared_hosting_plans')->where('id',$currentInvoice->hosting_id)->first();


                    return view('invoice')->with(['chosenHostingPlan'=>$chosenHostingPlan,'user'=>$user,'currentInvoice'=>$currentInvoice,'invoiceRenewDate'=>$invoiceRenewDate,'currentInvoiceStartDate'=>$currentInvoiceStartDate,'currentInvoiceCreatedAt'=>$currentInvoiceCreatedAt,'userName'=>$userName]);
                }

                else {
                    $chooseHostingPlan = SharedHostingPlan::find(Auth::user()->hosting_id);
                    $user_id=Auth::user()->id;

                    //get user invoice details...
                    $currentInvoice=DB::table('invoices')->where('user_id',Auth::user()->id)->get()->last();

                    return view('checkout')->with(['user_id'=>$user_id,'userName' => $userName, 'hostPlan' => $chooseHostingPlan,'currentInvoice'=>$currentInvoice]);
                }
                Auth::logout();
                Session::flash('loginfailed', 'attempt to login with disabled user');
                return redirect()->back();

            }
        }else {
            Auth::logout();
            Session::flash('loginfailed', 'Invalid credentials. Please check & Try again.');
            return redirect()->back();
        }

    }


    public function sendUserMessage(Request $request)
    {
        $email=$request->messageUserEmail;
        $message=$request->messageUserMessage;
        //must not get token to controller
        $token=$request->_token;

        if($email!=null && $message!=null && $email!='Email'&& $message!='Message'){
            Mail::to('hlakshan11@gmail.com')->send(new UserMessage($message,$email));
            return 'success';
        }
        else{
            return false;
        }

    }


    public function updateMyProfile(Request $request){

        $userName=$request->userName;
        $email=$request->email;
        $currentPassword=$request->currentPassword;
        $newPassword=$request->newPassword;
        $confirmPassword=$request->confirmPassword;

        if($request->hasFile('image')){

            $image=$request->file('image');
            $imageName=time().'.'.$image->getClientOriginalExtension();
            $destinationPath=public_path('/thumbnail_images');

            //$image->move($destinationPath, $imageName);

            $thumb_image=Image::make($image->getRealPath())->resize(700, 700);
            $thumb_image->save($destinationPath.'/'.$imageName);

            $user=User::find(Auth::id());
            $user->avatar=$imageName;
            $user->save();

        }

        $newPassWordBecrypt=bcrypt($request->$newPassword);

        DB::table('users')->where('id',Auth::id())
            ->update([
                'name' => $userName,
                'email' => $email
            ]);


        if(!empty($currentPassword)||!empty($newPassword)||!empty($confirmPassword)){
            $data = $request->all();
            $user = User::find(auth()->user()->id);

            if(!Hash::check($data['currentPassword'], $user->password)){

                return redirect()->back()->with('currentPasswordNotMatch','Current Password is does not match');
            }else{

            $this->validate($request, [
                'newPassword' => 'required',
                'confirmPassword' => 'required|same:newPassword',
            ]);

             DB::table('users')->where('id',Auth::id() )->update(['password' => bcrypt($newPassword)]);
            }
        }

        return redirect()->back()->with('message','Successfully Updated Your profile');

    }


    public function checkoutStart(Request $request)
    {
        $inputs = $request->all();
        $user_id=$request->user_id;
        $hostPlan=@$inputs['hostPlan'];
        $table=$request->user;
        $userName=$request->userName;
        $paymentApprove=$request->paymentApprove;
        $paymentSuccess=$request->paymentSuccess;
        $paymentError=$request->paymentError;

        //get user invoice details...
        $currentInvoice=DB::table('invoices')->where('user_id',Auth::user()->id)->get()->last();

        return view('checkout', ['user_id'=>$user_id,'hostPlan' => $hostPlan, 'user' => $table, 'userName' => $userName,'paymentApprove'=>$paymentApprove,'paymentSuccess'=>$paymentSuccess,'paymentError'=>$paymentError,'currentInvoice'=>$currentInvoice]);
    }


    public function accountCreate(Request $request)
    {
        if(Auth::check()){

            //Auth::logout();

            $user_id=Auth::user()->id;
            $hostPlan = SharedHostingPlan::where('id', Auth::user()->hosting_id)->first();
            $table=User::where('id',Auth::user()->id)->get();
            $userName= Auth::user()->name;

            //get user invoice details...
            $currentInvoice=DB::table('invoices')->where('user_id',Auth::user()->id)->get()->last();

            return view('checkout', ['user_id'=>$user_id,'hostPlan' => $hostPlan, 'user' => $table, 'userName' => $userName,'currentInvoice'=>$currentInvoice]);
        }
        else{

            //reg
            $existingUser = User::where('email', $request->input('email'))->get()->first();

            if ($existingUser) {
                \Illuminate\Support\Facades\Session::flash('regfailed', 'email already existing');
                return redirect()->back();
            } else {
//                DB::transaction(function() use($request) {  //use request in the transaction...
                $table = new User();

                $table->name = $request->input('fname');
                $table->email = $request->input('email');
                $table->password = bcrypt($request->input('password'));
                $table->hosting_id = $request->input('pkg');

                $table->save();
                \Illuminate\Support\Facades\Session::flash('regsuccess', 'successfully registered');

                $hostPlan = SharedHostingPlan::find($table->hosting_id);

                //user set as logged..
                Auth::login($table);
                $userName = Auth::user()->name;

                //create an invoice
                $invoice = new Invoice();
                //  Chose renew date...
                $PaymentDoneDate = strtotime(date('Y-m-d'));
                $renewDate = date("Y-m-d", strtotime("+1 year", $PaymentDoneDate));

                //calculate amount to pay for a year...
                $invoice->amount = ($hostPlan->price)*12;
                $invoice->date = $renewDate;
                $invoice->hosting_id = $hostPlan->id;
                $invoice->user_id = Auth::user()->id;
                $invoice->paymentStatus = "Unpaid";
                $invoice->save();
                //echo"saved invoice";

                $user_id=Auth::user()->id;
                //get user invoice details...
                $currentInvoice=DB::table('invoices')->where('user_id',Auth::user()->id)->get()->last();

                //return redirect()->route('checkoutStart',['user_id'=>$user_id,'hostPlan' => $hostPlan, 'user' => $table, 'userName' => $userName,'currentInvoice'=>$currentInvoice]);
                return view('checkout', ['user_id'=>$user_id,'hostPlan' => $hostPlan, 'user' => $table, 'userName' => $userName,'currentInvoice'=>$currentInvoice]);
            }
        }
    }

    //directLogin and directRegister functions
    public function directLoginCreate(Request $request)
    {
        //directLog
        $remember = $request->get('remember') ? true : false;

        if (Auth::attempt(array('email' => $request->input('existingemail'), 'password' => $request->input('existingpassword')),$remember)) {
            // Authentication passed...

            if (Auth::check()) {
                // The user is logged in...
                $userName = Auth::user()->name;
                $user_id=Auth::user()->id;
                $user=User::find(Auth::id());

                Session::flash('loginsuccess', 'successfully logged in');

                if (Auth::user()->success_status == 'success') {
                    //get user invoice details...
                    $currentInvoice=DB::table('invoices')->where('user_id',Auth::user()->id)->get()->last();

                    //get current Payment date
                    $currentRenewDate = strtotime($currentInvoice->date);
                    $invoiceRenewDate = date("Y-m-d", strtotime("-1 s", $currentRenewDate));

                    //get current invoice start date...
                    $currentInvoiceStartDate = date("Y-m-d", strtotime("-1 year", $currentRenewDate));

                    //get Current invoice created at..
                    $currentInvoiceCreatedAt = strtotime($currentInvoice->created_at);
                    $currentInvoiceCreatedAt = date("Y-m-d", strtotime("-1 s", $currentInvoiceCreatedAt));

                    //get chosen host pkg name...
                    $chosenHostingPlan=DB::table('shared_hosting_plans')->where('id',$currentInvoice->hosting_id)->first();

                    return view('invoice')->with(['chosenHostingPlan'=>$chosenHostingPlan,'user'=>$user,'currentInvoice'=>$currentInvoice,'invoiceRenewDate'=>$invoiceRenewDate,'currentInvoiceStartDate'=>$currentInvoiceStartDate,'currentInvoiceCreatedAt'=>$currentInvoiceCreatedAt,'userName'=>$userName]);

                }

                else {
                    $chooseHostingPlan = SharedHostingPlan::find(Auth::user()->hosting_id);
                    $currentInvoice=DB::table('invoices')->where('user_id',Auth::user()->id)->get()->last();

                    return view('checkout')->with(['user_id'=>$user_id,'userName' => $userName, 'hostPlan' => $chooseHostingPlan,'currentInvoice'=>$currentInvoice]);
                }

                Auth::logout();
                Session::flash('loginfailed', 'attempt to login with disabled user');
                return redirect()->back();
            }
        }else {
            Auth::logout();
            Session::flash('loginfailed', 'Invalid credentials. Please check & Try again.');
            return redirect()->back();
        }
    }



    public function paymentInvoice(Request $request)
    {
        $user=User::find(Auth::id());
        $chosenHostingPlan=SharedHostingPlan::where('id',$user->hosting_id)->first();
        $currentInvoice=Invoice::where('user_id',Auth::user()->id)->get()->last();
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

