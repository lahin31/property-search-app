<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('houseName');
            $table->string('houseFor');
            $table->integer('housePrice');
            $table->string('houseAddress');
            $table->string('houseImage')->default('default-home');
            $table->text('houseDescription');
            $table->integer('houseBedrooms');
            $table->integer('houseBathrooms');
            $table->integer('houseArea');
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
        Schema::drop('houses');
    }
}
