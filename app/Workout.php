<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    //
    protected $fillable = [
        'comments',
        'rating',
        'lod_id',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function workoutlines(){
        return $this->hasMany('App\WorkoutLine');
    }
}
