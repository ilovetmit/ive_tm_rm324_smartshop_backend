<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLockersTable extends Migration
{
    /**
     * Run the migrations.
     * Copy from last smartshop project
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('lockers');
        Schema::create('lockers', function (Blueprint $table) {
            // $table->engine = 'MyISAM';                           -> (unknow)

            $table->bigIncrements('locker_id');
            $table->string('qrcode')->unique()->nullable();
            $table->boolean('available')->default(true);
            $table->boolean('using')->default(false);
            $table->string('size')->nullable();
            $table->text('price');
            // $table->integer('hours')->default(2)->nullable();
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
        Schema::dropIfExists('lockers');
    }
}
