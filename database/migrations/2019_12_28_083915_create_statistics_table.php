<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('distance')->nullable();
            $table->integer('time')->nullable();
            $table->float('weight', 8, 2)->nullable();

            $table->integer('metric_id')->unsigned();
            $table->foreign('metric_id')->references('id')->on('metrics');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('statistics');
    }
}
