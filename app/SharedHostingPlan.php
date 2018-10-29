<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SharedHostingPlan extends Model
{
        protected $fillable = ['price','SSH','storage','bandwidth','no_of_email_account','cron_job'];
    
    protected $hidden=['remember_token'];

    public function user(){
        return $this->hasMany('App\User');
    }

    public function invoice(){
        return $this->hasMany('App\Invoice');
    }

}
