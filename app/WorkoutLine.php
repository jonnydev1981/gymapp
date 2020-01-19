<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkoutLine extends Model
{
    protected $fillable = [
        'order',
        'reps',
        'weight',
        'scaled',
        'completed',
    ];

    public function workout(){
        return $this->belongsTo('App\Workout');
    }

    public function exercise(){
        return $this->belongsTo('App\Exercise');
    }

    public function metric(){
        return $this->belongsTo('App\Metric');
    }
}
