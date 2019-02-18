<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'sets',
        'reps',
        'exercise_id',
        'user_id', 
    ];

    public function exercises(){
        return $this->hasMany('App\Exercise');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
