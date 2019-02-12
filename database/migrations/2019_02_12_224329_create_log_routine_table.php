<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogRoutineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_routine', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('log_id')->unsigned();
            $table->integer('routine_id')->unsigned();
            
            $table->foreign('log_id')->references('id')->on('logs');
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
        Schema::dropIfExists('log_routine');
    }
}
