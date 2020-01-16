<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'distance',
        'time',
        'weight',
        'metric',
        'user_id',
        'exercise_id',
    ];

    public function exercise(){
        return $this->belongsTo('App\Exercise');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function onerepmax($repetitions, $weight)
    {
        return $weight * (($repetitions / 30) + 1);
    }
}
