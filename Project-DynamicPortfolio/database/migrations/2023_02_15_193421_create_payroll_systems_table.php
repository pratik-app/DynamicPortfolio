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
        Schema::create('payroll_systems', function (Blueprint $table) {
            $table->id();
            $table->string('emp_name')->nullable();
            $table->string('emp_position')->nullable();
            $table->string('emp_salary')->nullable();
            $table->string('emp_address')->nullable();
            $table->string('emp_mobile')->nullable();
            $table->string('emp_email')->nullable();
            $table->string('emp_province_tax')->nullable();
            $table->string('emp_work_hours')->nullable();
            $table->string('emp_payment_method')->nullable();
            $table->string('emp_chequeNumber')->nullable();
            $table->string('emp_cpp_amount')->nullable();
            $table->string('emp_EI_amount')->nullable();
            $table->string('emp_sin')->nullable();
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
        Schema::dropIfExists('payroll_systems');
    }
};
