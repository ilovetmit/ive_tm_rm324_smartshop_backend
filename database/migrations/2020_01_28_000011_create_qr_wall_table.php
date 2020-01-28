<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQrWallTable extends Migration
{
    /**
     * Run the migrations.
     * Copy from last smartshop project
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('qr_wall');
        Schema::create('qr_wall', function (Blueprint $table) {
            $table->string('qrcode')->primary();
            $table->string('product_qrcode');
            // $table->foreign('product_qrcode','product_qrcode_fk')->references('qrcode')->on('products')->onDelete('cascade');
            $table->string('message')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('qr_wall');
    }
}
