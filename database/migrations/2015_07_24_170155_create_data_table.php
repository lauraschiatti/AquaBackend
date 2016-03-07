<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('node_id');
            $table->integer('sensorbynode_id');
            $table->dateTime('time');
            $table->float('value');
            $table->timestamps();

            /*$table->foreign('node_id')->references('id')->on('nodes');
            $table->foreign('sensorbynode_id')->references('id')->on('sensorsbynode');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('data');
    }
}
