<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;


//    protected $fillable = [
//        'name', 'email', 'password','avatar','telephone','company','country','payment_renew_date','address','state','username'
//    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function invoice(){
        return $this->hasMany('App/Invoice');
    }

    public function payment(){
        return $this->hasMany('App/Payment');
    }

    public function sharedHostingPlan(){
        return $this->belongsTo('App/SharedHostingPlan');
    }
}
