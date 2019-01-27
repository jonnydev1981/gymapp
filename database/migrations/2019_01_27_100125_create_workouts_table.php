<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longtext('description');
            $table->timestamp('workout_performed');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('plan_id')->references('id')->on('plans');
            $table->foreign('note_id')->references('id')->on('notes');
            $table->integer('exercise_sets_performed');
            $table->integer('exercise_reps_performed');
            $table->integer('exercise_weight_kg');
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
        Schema::dropIfExists('workouts');
    }
}
