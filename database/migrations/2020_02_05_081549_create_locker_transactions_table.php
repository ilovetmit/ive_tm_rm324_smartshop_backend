<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLockerTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locker_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transaction_id');
            $table->foreign('transaction_id')               ->references('id')->on('transactions')->onDelete('cascade');
            $table->unsignedBigInteger('locker_id');
            $table->foreign('locker_id')                    ->references('id')->on('lockers')->onDelete('cascade');
            $table->unsignedBigInteger('recipient_user_id');
            $table->foreign('recipient_user_id')            ->references('id')->on('users')->onDelete('cascade');
            $table->string('item');
            $table->date('deadline')->nullable();
            $table->text('remark');
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
        Schema::dropIfExists('locker_transactions');
    }
}
