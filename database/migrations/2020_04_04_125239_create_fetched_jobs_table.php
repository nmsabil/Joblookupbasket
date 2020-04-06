<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFetchedJobsTable extends Migration {
    public function up() {
        Schema::create('fetched_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('subscriber_id');

            $table->string('url', 500);
            $table->string('title');
            $table->string('postcode')->nullable();
            $table->string('job_type')->nullable();
            $table->string('logo')->nullable();
            $table->longText('snippet');
            $table->string('age')->nullable();
            $table->string('age_days')->nullable();
            $table->string('location')->nullable();
            $table->string('salary')->nullable();
            $table->string('company')->nullable();

            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('fetched_jobs');
    }
}
