<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkoutLine extends Model
{
    public function workout(){
        return $this->belongsTo('App\Workout');
    }
}
