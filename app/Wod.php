<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wod extends Model
{
    public function box(){
        return $this->belongsTo('App\Box');
    }

    public function wodlines(){
        return $this->hasMany('App\WodLine');
    }
}
