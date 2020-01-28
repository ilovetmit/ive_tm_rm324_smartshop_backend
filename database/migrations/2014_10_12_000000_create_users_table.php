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
            
            $table->increments('user_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->string('credit_card')->nullable();           -> (cancel)
            // $table->string('cc_type')->nullable();               -> (cancel)
            // $table->double('balance')->default(0.0);             -> (cancel)
            $table->double('saving_account')->default(0.0);
            $table->double('current_account')->default(0.0);
            // $table->double('ive_coin')->default(0.0);            -> (cancel)
            $table->double('bitcoin')->default(0.0);             // -> (unknow type)
            $table->string('avatar')->default('icon.jpg');
            // $table->integer('role')->default(10);                -> (permission package?)
            $table->text('bio')->nullable();
            // $table->text('interest')->nullable();                -> (cancel||useless attribute)
            // $table->text('face_id')->nullable();                 -> (cancel)
            $table->string('api_token')->nullable();
            $table->softDeletes();           
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
