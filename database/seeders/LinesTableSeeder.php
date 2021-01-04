<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Line;

class LinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Line::create(
            [
            'set_no' => '1',
            'reps' => '8',
            'weight_kg' => '40',
            'workout_id' => '1',
            'exercise_id' => '103',
            ]
        );
        Line::create(
            [
            'set_no' => '2',
            'reps' => '8',
            'weight_kg' => '40',
            'workout_id' => '1',
            'exercise_id' => '103',
            ]
        );
        Line::create(
            [
            'set_no' => '3',
            'reps' => '8',
            'weight_kg' => '40',
            'workout_id' => '1',
            'exercise_id' => '103',
            ]
        );
        Line::create(
            [
            'set_no' => '1',
            'reps' => '8',
            'weight_kg' => '40',
            'workout_id' => '2',
            'exercise_id' => '103',
            ]
        );
        Line::create(
            [
            'set_no' => '2',
            'reps' => '8',
            'weight_kg' => '40',
            'workout_id' => '2',
            'exercise_id' => '103',
            ]
        );
        Line::create(
            [
            'set_no' => '3',
            'reps' => '8',
            'weight_kg' => '40',
            'workout_id' => '2',
            'exercise_id' => '103',
            ]
        );
        Line::create(
            [
            'set_no' => '1',
            'reps' => '8',
            'weight_kg' => '40',
            'workout_id' => '3',
            'exercise_id' => '103',
            ]
        );
        Line::create(
            [
            'set_no' => '2',
            'reps' => '8',
            'weight_kg' => '40',
            'workout_id' => '3',
            'exercise_id' => '103',
            ]
        );
        Line::create(
            [
            'set_no' => '3',
            'reps' => '8',
            'weight_kg' => '40',
            'workout_id' => '3',
            'exercise_id' => '103',
            ]
        );
    }
}
