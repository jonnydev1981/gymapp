<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseRoutineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_routine', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exercise_id')->unsigned();
            $table->integer('routine_id')->unsigned();
            
            $table->foreign('exercise_id')->references('id')->on('exercises');
            $table->foreign('routine_id')->references('id')->on('routines');

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
        Schema::dropIfExists('exercise_routine');
    }
}
