<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     * Copy from last smartshop project
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('product_transactions');

        Schema::create('product_transactions', function (Blueprint $table) {
            // $table->engine = 'MyISAM';                           -> (unknow)

            $table->bigIncrements('id');
            $table->string('product_qrcode');
            // $table->foreign('product_qrcode','product_qrcode_fk')->references('qrcode')->on('products')->onDelete('cascade');
            $table->integer('user_id');
            // $table->foreign('user_id','user_id_fk')->references('user_id')->on('users')->onDelete('cascade');
            $table->double('cost');
            $table->string('payment')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('delivery_date_time')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('products');
    }
}
