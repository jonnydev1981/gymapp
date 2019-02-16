<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoutineUser extends Model
{
    //
    protected $fillable = [
        'routine_id',
        'user_id',
    ];
    
}
