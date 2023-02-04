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
        Schema::create('emp_records', function (Blueprint $table) {
            $table->id();
            $table->string('emp_name')->nullable();
            $table->string('emp_position')->nullable();
            $table->string('emp_address')->nullable();
            $table->string('emp_mobile')->nullable();
            $table->string('emp_email')->nullable();
            $table->string('emp_type')->nullable();
            $table->string('emp_letter')->nullable();
            $table->string('emp_work_permit')->nullable();
            $table->string('emp_work_proof')->nullable();
            $table->string('emp_experience')->nullable();
            $table->string('emp_salary')->nullable();
            $table->string('emp_start_date')->nullable();
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
        Schema::dropIfExists('emp_records');
    }
};
