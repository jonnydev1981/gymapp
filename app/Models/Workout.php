<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'performed',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function lines(){
        return $this->hasMany('App\Line');
    }
}
