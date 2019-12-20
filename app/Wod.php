<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wod extends Model
{
    protected $fillable = [
        'description',
        'rx_time',
        'box_id',
        'style_id',
    ];

    public function box(){
        return $this->belongsTo('App\Box');
    }

    public function wodlines(){
        return $this->hasMany('App\WodLine');
    }

    public function workouts(){
        return $this->hasMany('App\Workout');
    }

    public function style(){
        return $this->belongsTo('App\Style');
    }
}
