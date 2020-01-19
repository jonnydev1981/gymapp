<?php

use App\WorkoutLine;
use Illuminate\Database\Seeder;

class WorkoutLinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkoutLine::create([
            'order' => '1',
            'reps' => '8',
            'weight' => '40',
            'scaled' => false,
            'completed' => true,
            'metric_id' => '4',
            'workout_id' => '1',
            'exercise_id' => '103',
            'measurement_id' => '1',
        ]);
        WorkoutLine::create([
            'order' => '2',
            'reps' => '8',
            'weight' => '40',
            'scaled' => false,
            'completed' => true,
            'metric_id' => '4',
            'workout_id' => '1',
            'exercise_id' => '103',
            'measurement_id' => '1',
        ]);
        WorkoutLine::create([
            'order' => '3',
            'reps' => '8',
            'weight' => '40',
            'scaled' => false,
            'completed' => true,
            'metric_id' => '4',
            'workout_id' => '1',
            'exercise_id' => '103',
            'measurement_id' => '1',
        ]);
        WorkoutLine::create([
            'order' => '4',
            'reps' => '8',
            'weight' => '40',
            'scaled' => false,
            'completed' => true,
            'metric_id' => '4',
            'workout_id' => '1',
            'exercise_id' => '103',
            'measurement_id' => '1',
        ]);
        WorkoutLine::create([
            'order' => '1',
            'reps' => '4',
            'weight' => '30',
            'scaled' => true,
            'completed' => true,
            'metric_id' => '3',
            'workout_id' => '2',
            'exercise_id' => '191',
            'measurement_id' => '4',
        ]);
        WorkoutLine::create([
            'order' => '2',
            'reps' => '4',
            'weight' => '30',
            'scaled' => true,
            'completed' => true,
            'metric_id' => '3',
            'workout_id' => '2',
            'exercise_id' => '191',
            'measurement_id' => '4',
        ]);
        WorkoutLine::create([
            'order' => '3',
            'reps' => '4',
            'weight' => '30',
            'scaled' => true,
            'completed' => true,
            'metric_id' => '3',
            'workout_id' => '2',
            'exercise_id' => '191',
            'measurement_id' => '4',
        ]);
        WorkoutLine::create([
            'order' => '4',
            'reps' => '4',
            'weight' => '30',
            'scaled' => true,
            'completed' => true,
            'metric_id' => '3',
            'workout_id' => '2',
            'exercise_id' => '191',
            'measurement_id' => '4',
        ]);
        WorkoutLine::create([
            'order' => '5',
            'reps' => '4',
            'weight' => '30',
            'scaled' => true,
            'completed' => true,
            'metric_id' => '3',
            'workout_id' => '2',
            'exercise_id' => '191',
            'measurement_id' => '4',
        ]);
        WorkoutLine::create([
            'order' => '1',
            'reps' => '21',
            'weight' => '40',
            'scaled' => false,
            'completed' => true,
            'metric_id' => '3',
            'workout_id' => '3',
            'exercise_id' => '311',
            'measurement_id' => '4',
        ]);
        WorkoutLine::create([
            'order' => '2',
            'reps' => '15',
            'weight' => '40',
            'scaled' => false,
            'completed' => true,
            'metric_id' => '3',
            'workout_id' => '3',
            'exercise_id' => '311',
            'measurement_id' => '4',
        ]);
        WorkoutLine::create([
            'order' => '3',
            'reps' => '8',
            'weight' => '40',
            'scaled' => false,
            'completed' => false,
            'metric_id' => '3',
            'workout_id' => '3',
            'exercise_id' => '311',
            'measurement_id' => '4',
        ]);
    }
}
