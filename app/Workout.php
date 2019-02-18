<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    //
    protected $fillable = [
        'comments',
        'rating',
        'lod_id',
        'user_id',
    ];

    public function logs(){
        return $this->hasMany('App\Models\Log');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
