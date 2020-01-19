<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metric extends Model
{
    public function workoutlines(){
        return $this->hasMany('App\WorkoutLine');
    }

    public function wodlines(){
        return $this->hasMany('App\WodLine');
    }

    public function statistics(){
        return $this->hasMany('App\Statistic');
    }
}
