<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLockerTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     * Copy from last smartshop project
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('locker_transactions');
        Schema::create('locker_transactions', function (Blueprint $table) {
            // $table->engine = 'MyISAM';                           -> (unknow)

            $table->bigIncrements('id');                                                                // -> (double id?)
            $table->integer('locker_id');                                                               // -> (double id?)
            // $table->foreign('locker_id','locker_id_fk')->references('locker_id')->on('lockers')->onDelete('cascade');  // -> (locker->unknow table)
            $table->integer('user_id');
            // $table->foreign('user_id','user_id_fk')->references('user_id')->on('users')->onDelete('cascade');
            $table->integer('to_user_id');
            // $table->foreign('to_user_id','to_user_id_fk')->references('user_id')->on('users')->onDelete('cascade');
            $table->integer('transactions_id');
            // $table->foreign('transactions_id','transactions_id_fk')->references('id')->on('transactions')->onDelete('cascade');
            $table->string('type')->default('0');
            $table->string('item');
            $table->timestamp('deadline');
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('locker_transactions');
    }
}
