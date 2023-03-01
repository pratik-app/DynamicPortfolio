<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_openings', function (Blueprint $table) {
            $table->id('job_id');
            $table->string('job_title')->nullable();
            $table->string('job_location')->nullable();
            $table->string('job_type')->nullable();
            $table->string('job_description')->nullable();
            $table->string('job_pay_range')->nullable();
            $table->string('job_application_deadline')->nullable();
            $table->string('job_posted_date')->nullable();
            $table->string('job_status')->nullable();
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
        Schema::dropIfExists('job_openings');
    }
};
