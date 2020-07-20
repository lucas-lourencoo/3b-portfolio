<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Salespeople extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salespeoples', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('celphone', 20);
            $table->string('email');
            $table->string('photo');
            $table->unsignedBigInteger('regional');
            $table->foreign('regionals')->references('id')->on('regionals');
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
        Schema::dropIfExists('salespeople');
    }
}
