<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'performed_on',
        'time_taken',
        'user_id',
        'wod_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function workoutlines(){
        return $this->hasMany('App\WorkoutLine');
    }

    public function wod(){
        return $this->hasOne('App\Wod');
    }
}
