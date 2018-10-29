<?php

namespace App\libs;

use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\UnsuspendedHostInformUser;

class UnSuspendVestaAccount{

    public static function unSuspendVestaAccount($userName,$logedUserId){

        // Server credentials
        $vst_hostname = 'hasithauom.com';
        $vst_username = 'admin';
        $vst_password = 'aDVRrI2T8o';
        $vst_returncode = 'yes';
        $vst_command = 'v-unsuspend-user';


//        $username = 'amaris';
        $username = $userName;

        // Prepare POST query
        $postvars = array(
            'user' => $vst_username,
            'password' => $vst_password,
            'returncode' => $vst_returncode,
            'cmd' => $vst_command,
            'arg1' => $username,

        );

        $postdata = http_build_query($postvars);

        // Send POST query via cURL
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
            echo "account $username has been successfully unSuspended\n";
            $unSuspendedUser=User::where('id',$logedUserId)->get()->first();
            $unSuspendedUser->vesta_account_status="unSuspended";
            $unSuspendedUser->save();

            Mail::to('coolhost111@gmail.com')->send(new UnsuspendedHostInformUser($userName));

            return "unSuspended";
        } else {
            echo "Query returned error code: " .$answer. " for $username\n";

            return "fail to unSuspend Your Account";
        }
        //end of unSuspend host function...

    }
}

?>