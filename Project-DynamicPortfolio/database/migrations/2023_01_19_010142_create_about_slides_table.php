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
        Schema::create('about_slides', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('short_title')->nullable();
            $table->text('about_description')->nullable();
            $table->string('multiple_img')->nullable();
            $table->string('aboutme_btn')->nullable();
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
        Schema::dropIfExists('about_slides');
    }
};
