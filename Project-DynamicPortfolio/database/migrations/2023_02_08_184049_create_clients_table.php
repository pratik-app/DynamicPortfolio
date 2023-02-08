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
        Schema::create('clients', function (Blueprint $table) {
            $table->id('client_id');
            $table->string('client_name')->nullable();
            $table->string('client_email')->nullable();
            $table->string('client_mobile')->nullable();
            $table->string('client_assignedTO')->nullable();
            $table->string('client_contract')->nullable();
            $table->string('client_invoice')->nullable();
            $table->string('client_payment_status')->nullable();
            $table->string('client_sold_price')->nullable();
            $table->string('client_advanced_paid_amount')->nullable();
            $table->string('client_number_of_projects')->nullable();
            $table->string('client_outstanding_amount')->nullable();
            $table->string('client_project_deadline')->nullable();
            $table->string('client_delivery_status')->nullable();
            $table->string('client_status')->nullable();
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
        Schema::dropIfExists('clients');
    }
};
