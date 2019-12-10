<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WodLine extends Model
{
    public function wod(){
        return $this->belongsTo('App\Wod');
    }

    public function exercise(){
        return $this->belongsTo('App\Exercise');
    }
}
