<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSharedHostingPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shared_hosting_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->double('price',9,2);
            $table->string('SSH');
            $table->string('type');
            $table->double('storage');
            $table->double('bandwidth',6,2);
            $table->integer('no_of_email_account');
            $table->string('cron_job');
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shared_hosting_plans');
    }
}
