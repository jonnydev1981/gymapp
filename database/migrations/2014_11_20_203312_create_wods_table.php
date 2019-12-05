<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wods', function (Blueprint $table) {
            $table->increments('id');

            $table->longtext('description');
            $table->time('rx_time');

            $table->integer('style_id')->unsigned();
            $table->foreign('style_id')->references('id')->on('styles');

            $table->integer('box_id')->unsigned();
            $table->foreign('box_id')->references('id')->on('boxes');

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
        Schema::dropIfExists('wods');
    }
}
