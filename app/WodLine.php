<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WodLine extends Model
{
    protected $fillable = [
        'order',
        'rx_sets',
        'rx_reps',
        'rx_weight_m',
        'rx_weight_f',
        'exercise_id',
        'wod_id',
    ];

    public function wod(){
        return $this->belongsTo('App\Wod');
    }

    public function exercise(){
        return $this->belongsTo('App\Exercise');
    }
}
