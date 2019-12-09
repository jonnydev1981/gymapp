<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkoutLine extends Model
{
    protected $fillable = [
        'order',
        'sets',
        'reps',
        'weight',
        'scaled',
        'completed',
    ];

    public function workout(){
        return $this->belongsTo('App\Workout');
    }
}
