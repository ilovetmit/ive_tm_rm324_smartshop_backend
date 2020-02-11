<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductWallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_walls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('qrcode',8);
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')              ->references('id')->on('products')->onDelete('cascade');
            $table->string('message');
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
        Schema::dropIfExists('product_walls');
    }
}
