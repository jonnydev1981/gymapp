<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWorkout extends Model
{
    //
    protected $fillable = [
        'user_id',
        'workout_id',
    ];
}
