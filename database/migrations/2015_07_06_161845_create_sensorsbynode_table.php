<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorsbynodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensorsbynode', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('node_id')->unsigned();
            $table->integer('sensor_type_id')->unsigned();
            $table->integer('weight')->unsigned();
            $table->timestamps();

            /*$table->foreign('node_id')->references('id')->on('nodes');
            $table->foreign('sensor_type_id')->references('id')->on('sensors');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sensorsbynode');
    }
}
