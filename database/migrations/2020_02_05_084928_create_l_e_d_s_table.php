<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLEDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_e_d_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shop_product_id');
            $table->foreign('shop_product_id')              ->references('id')->on('shop_products')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('l_e_d_s');
    }
}
