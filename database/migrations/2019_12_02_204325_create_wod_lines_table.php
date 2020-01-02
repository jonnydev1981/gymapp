<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWodLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wod_lines', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('order');
            $table->integer('rx_reps');
            $table->integer('rx_weight_m');
            $table->integer('rx_weight_f');
            $table->enum('metric', ['time', 'weight', 'reps', 'distance']);

            $table->integer('wod_id')->unsigned();
            $table->foreign('wod_id')->references('id')->on('wods');

            $table->integer('exercise_id')->unsigned();
            $table->foreign('exercise_id')->references('id')->on('exercises');

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
        Schema::dropIfExists('wod_lines');
    }
}
