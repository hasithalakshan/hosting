<?php

namespace App\Libs;
use Illuminate\Support\Facades\Auth;
use App\User;

class SuspendVestaAccount{

public static function suspendVestaAccount($userName,$checkingUserId){

    // Server credentials
    $vst_hostname = 'hasithauom.com';
    $vst_username = 'admin';
    $vst_password = 'aDVRrI2T8o';
    $vst_returncode = 'yes';
    $vst_command = 'v-suspend-user';


    $username = 'amaris';
    //$username = $userName;

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
        echo "account $username has been successfully suspended\n";
        $suspendUser=User::where('id',$checkingUserId)->get()->first();

        $suspendUser->vesta_account_status= "suspended";
        $suspendUser->save();

        return "suspended";

    } else {
        echo "Query returned error code: " .$answer. "\n";

        return "fail to suspend user";
    }
    //end of suspend host function..



}


}

?>