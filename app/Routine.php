<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'sets',
        'reps',
        'exercide_id',
        'user_id', 
    ];
}
