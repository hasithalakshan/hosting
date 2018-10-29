<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
	        $table->string('telephone',15)->nullable();
            $table->string('company',50)->nullable();
            $table->string('country',50)->nullable();
            $table->string('payment_renew_date')->nullable();
 	        $table->string('address',50)->nullable();
	        $table->string('state',50)->nullable();
            $table->string('username',50)->nullable();
            $table->text('password');
            $table->integer('hosting_id')->unsigned()->nullable();
            $table->string('success_status',50)->nullable();
            $table->string('vesta_account_status',50)->nullable();
            $table->rememberToken();
            $table->string('resetToken',50)->nullable();
            $table->foreign('hosting_id')->references('id')->on('shared_hosting_plans');
            $table->timestamps();
	    
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
