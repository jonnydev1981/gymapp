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
        return $this->belongsTo(Workout::class);
    }

    public function exercise(){
        return $this->belongsTo(Exercise::class);
    }
}
