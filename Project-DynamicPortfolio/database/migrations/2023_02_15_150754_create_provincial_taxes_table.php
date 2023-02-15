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
        Schema::create('provincial_taxes', function (Blueprint $table) {
            $table->id();
            $table->string('province_Name')->nullable();
            $table->string('province_income_amount')->nullable();
            $table->string('province_tax_percent')->nullable();            
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
        Schema::dropIfExists('provincial_taxes');
    }
};
