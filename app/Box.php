<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    public function users(){
        return $this->hasMany('App\User');
    }

    public function wods(){
        return $this->hasMany('App\Wod');
    }
}
