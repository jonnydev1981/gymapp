<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogWorkout extends Model
{
    //
    protected $fillable = [
        'routine_id',
        'workout_id',
    ];
}
