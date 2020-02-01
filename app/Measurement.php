<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    public function workoutlines(){
        return $this->hasMany('App\WorkoutLine');
    }

    public function wodlines(){
        return $this->hasMany('App\WodLine');
    }
}
