<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'url',
    ];

    public function workoutlines(){
        return $this->hasMany('App\WorkoutLine');
    }

    public function wodlines(){
        return $this->hasMany('App\WodLine');
    }
}
