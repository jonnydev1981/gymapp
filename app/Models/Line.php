<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    use HasFactory;

    protected $fillable = [
        'set_no',
        'reps',
        'weight_kg',
        'notes',
        'workout_id',
        'exercise_id',
    ];

    public function workout(){
        return $this->belongsTo('App\Workout');
    }

    public function exercise(){
        return $this->belongsTo('App\Exercise');
    }
}
