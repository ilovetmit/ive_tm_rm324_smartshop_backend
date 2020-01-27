<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLedsTable extends Migration
{
    /**
     * Run the migrations.
     * Copy from last smartshop project
     * @return void
     */
    public function up()
    {
        Schema::create('leds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type');
            $table->text('data');
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
        Schema::dropIfExists('leds');
    }
}
