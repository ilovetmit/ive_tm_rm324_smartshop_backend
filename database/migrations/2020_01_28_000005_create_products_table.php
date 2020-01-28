<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     * Copy from last smartshop project
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('product_transactions');
        Schema::dropIfExists('products');
        Schema::create('products', function (Blueprint $table) {
            // $table->engine = 'MyISAM';                           -> (unknow)

            $table->string('qrcode')->primary();
            $table->string('name');
            $table->double('price');
            $table->string('category');
            $table->integer('quantity')->default(0);
            $table->text('extra')->nullable();
            $table->text('description')->nullable();
            $table->text('url')->nullable();
            $table->boolean('is_vending')->default(false);
            $table->integer('vending_channel')->nullable();
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
        Schema::dropIfExists('product_transactions');
        Schema::dropIfExists('products');
    }
}
