<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkoutLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout_lines', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('order');
            $table->integer('reps');
            $table->integer('weight');
            $table->boolean('scaled');
            $table->boolean('completed');
            $table->enum('metric', ['time', 'weight', 'reps', 'distance']);

            $table->integer('workout_id')->unsigned();
            $table->foreign('workout_id')->references('id')->on('workouts');

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
        Schema::dropIfExists('workout_lines');
    }
}
