<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('styles', function (Blueprint $table) {
            $table->increments('id');

<<<<<<< HEAD:database/migrations/2014_02_02_203322_create_styles_table.php
            $table->string('style');
            $table->enum('metric', ['time', 'weight', 'reps', 'distance']);
=======
            $table->string('gravatar')->nullable();
            $table->longText('bio')->nullable();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
>>>>>>> 7b581b0706212a53015b1579d788198a7ecde511:database/migrations/2019_11_11_204252_create_profiles_table.php

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
        Schema::dropIfExists('styles');
    }
}
