<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lines', function (Blueprint $table) {
            $table->id();

            $table->integer('set_no');
            $table->integer('reps');
            $table->integer('weight_kg');
            $table->longtext('notes');

            //$table->unsignedBigInteger('exercise_id');
            //$table->foreign('exercise_id')->references('id')->on('exercises');
            $table->foreignId('exercise_id')->constrained();

            //$table->unsignedBigInteger('workout_id');
            //$table->foreign('workout_id')->references('id')->on('workouts');
            $table->foreignId('workout_id')->constrained();

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
        Schema::dropIfExists('lines');
    }
}
