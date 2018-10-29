<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    protected $fillable = ['amount','date'];

    public function payment(){
        return $this->hasOne('App\Payment');
    }

    public function shared_hosting_plan(){
        return $this->belongsTo('App\SharedHostingPlan');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}

