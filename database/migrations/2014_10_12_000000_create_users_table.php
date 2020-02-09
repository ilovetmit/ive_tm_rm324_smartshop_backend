<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * Copy from last smartshop project
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            // $table->engine = 'MyISAM';                           -> (unknow)
            
            $table->bigIncrements('id');
            $table->string('email')                 ->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password');
            $table->text('avatar');
            $table->date('birthday')                ->nullable();
            $table->int('gender');
            $table->int('telephone')                ->nullable();
            $table->text('bio')                     ->nullable();
            $table->int('status');
            $table->timestamp('email_verified_at')  ->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
