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
        Schema::create('home_slides', function (Blueprint $table) {
            $table->id();
            $table->string('portfolio_img')->nullable();
            $table->string('nav_tab1')->nullable();
            $table->string('nav_tab2')->nullable();
            $table->string('nav_tab3')->nullable();
            $table->string('nav_tab4')->nullable();
            $table->string('nav_tab5')->nullable();
            $table->string('nav_tab6')->nullable();
            $table->string('nav_tab7')->nullable();
            $table->string('reCallbtn')->nullable();
            $table->string('title')->nullable();
            $table->string('short_title')->nullable();
            $table->string('home_slide')->nullable();
            $table->string('video_url')->nullable();
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
        Schema::dropIfExists('home_slides');
    }
};
