<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    public function wods(){
        return $this->belongsToMany('App\Wod');
    }
}
