<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceTable extends Migration
{
    /**
     * Run the migrations.
     * Copy from last smartshop project
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('insurance');
        Schema::create('insurance', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->text('price');                  // MONTHLY, QUARTERLY, YEARLY
            $table->text('image')->nullable();
            $table->text('detail')->nullable();
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
        Schema::dropIfExists('insurance');
    }
}
