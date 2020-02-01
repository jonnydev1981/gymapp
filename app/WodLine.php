<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WodLine extends Model
{
    protected $fillable = [
        'order',
        'rx_reps',
        'rx_weight_m',
        'rx_weight_f',
        'exercise_id',
        'wod_id',
        'metric_id',
        'exercise_id',
    ];

    public function wod(){
        return $this->belongsTo('App\Wod');
    }

    public function exercise(){
        return $this->belongsTo('App\Exercise');
    }

    public function metric(){
        return $this->belongsTo('App\Metric');
    }

    public function measurement(){
        return $this->belongsTo('App\Measurement');
    }
}
