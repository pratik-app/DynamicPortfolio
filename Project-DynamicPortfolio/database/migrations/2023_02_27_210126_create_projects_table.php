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
        Schema::create('projects', function (Blueprint $table) {
            $table->id('projectID');
            $table->string('projectName')->nullable();
            $table->string('projectPrice')->nullable();
            $table->string('projectAdvancePaymentAmount')->nullable();
            $table->string('projectAdvancePaymentStatus')->default('1');
            $table->string('projectNumber')->nullable();
            $table->string('client_outstandingAmount')->nullable();
            $table->string('projectDeadLine')->nullable();
            $table->string('project_status')->default('I');
            $table->string('clientName')->nullable();
            $table->string('clientEmail')->nullable();
            $table->string('clientMobile')->nullable();
            $table->string('projectAssignedTo')->nullable();
            $table->string('client_ID')->nullable();
            $table->string('leadID')->nullable();
            $table->string('project_paymentStatus')->nullable();
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
        Schema::dropIfExists('projects');
    }
};
