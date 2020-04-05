<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('job_description');
            $table->string('job_location')->nullable();
            $table->dateTime('last_email_sent');
            $table->string('email_verification_token')->nullable();
            $table->string('direct_login_token');
            $table->boolean('subscribed')->nullable();
            $table->string('unsubscription_token');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscribers');
    }
}
