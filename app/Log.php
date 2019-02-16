<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //
    protected $fillable = [
        'set_number', 'reps_performed', 'weight',
    ];
}
