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
        return $this->belongsToMany('App\WorkoutLine');
    }

    public function wodlines(){
        return $this->belongsToMany('App\WodLine');
    }
}
