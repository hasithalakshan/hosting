<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['payment_method','payment_value','image','image_directory','verified'];

    public function invoice(){
        return $this->belongsTo('App\Invoice');
    }

    public function user(){
        return $this->belongsTo('App\Invoice');
    }
}
