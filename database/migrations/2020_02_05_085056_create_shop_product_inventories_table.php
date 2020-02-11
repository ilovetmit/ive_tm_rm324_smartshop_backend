<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopProductInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product_inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shop_product_id');
            $table->foreign('shop_product_id')              ->references('id')->on('shop_products')->onDelete('cascade');
            $table->string('rfid_code');
            $table->integer('is_sold');
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
        Schema::dropIfExists('shop_product_inventories');
    }
}
