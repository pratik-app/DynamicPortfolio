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
        Schema::create('lead_stats', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->boolean('lead_status');
            $table->string('lead_action');
            $table->string('appointment_status')->nullable();
            $table->string('lead_assigned_to')->nullable();
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
        Schema::dropIfExists('lead_stats');
    }
};
