<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'url',
    ];

    public function routines(){
        return $this->belongsToMany('App\Routine');
    }
}
