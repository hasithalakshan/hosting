<?php

namespace App\Libs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Redirect;
use TCG\Voyager\Models\User;

class CreateVestaAccount
{
    public static function createVestaAccount($userName,$userEmail)
    {
        // Server credentials
        $vst_hostname = 'hasithauom.com';
        $vst_username = 'admin';
        $vst_password = 'aDVRrI2T8o';
        $vst_returncode = 'yes';
        $vst_command = 'v-add-user';

        // New Account

        $noOfUsers=User::where('name',$userName)->count();
        if($noOfUsers>1){
            $username=$userName.$noOfUsers;
        }
        else{
            $username = $userName;
        }

        //$userPassword=Auth::user()->password;
        //$hashedPassword=Hash::make($userPassword);
        $random=str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
        $VestaPassword=substr($random,0,10);

        $password = $VestaPassword;
        $email =$userEmail;
        $package = 'default';
        $fist_name = 'Rust';
        $last_name = 'Cohle';

        // Prepare POST query
        $postvars = array(
            'user' => $vst_username,
            'password' => $vst_password,
            'returncode' => $vst_returncode,
            'cmd' => $vst_command,
            'arg1' => $username,
            'arg2' => $password,
            'arg3' => $email,
            'arg4' => $package,
            'arg5' => $fist_name,
            'arg6' => $last_name
        );
        $postdata = http_build_query($postvars);

        // Send POST query via cURL
        $postdata = http_build_query($postvars);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://' . $vst_hostname . ':8083/api/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
        $answer = curl_exec($curl);

        // Check result
        if($answer == 0) {
            $websiteUserName=$userName;
            echo "User $username account has been successfully created\n";

            //Send an email to user with login url to user...

            //($email), is the sending email address...
            Mail::to('coolhost111@gmail.com')->send(new OrderShipped($username,$VestaPassword,$websiteUserName));


            return redirect('hostDepSuccess');
        } else {
            echo "Query returned error code: " .$answer. "\n";

            return abort(505);
        }
    }
}

?>