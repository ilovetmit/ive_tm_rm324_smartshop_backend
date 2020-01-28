<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('vending');
        Schema::create('vending', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_qrcode');
            // $table->foreign('product_qrcode','product_qrcode_fk')->references('qrcode')->on('products')->onDelete('cascade');
            $table->integer('user_id');
            // $table->foreign('user_id','user_id_fk')->references('user_id')->on('users')->onDelete('cascade');
            $table->integer('vending_channel')->default(-1);
            $table->string('status')->default('0');
            $table->softDeletes();
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
        Schema::dropIfExists('vending');
    }
}
