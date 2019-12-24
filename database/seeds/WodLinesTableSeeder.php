<?php

use App\WodLine;
use Illuminate\Database\Seeder;

class WodLinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WodLine::create([
            'order' => '1',
            'rx_reps' => '8',
            'rx_weight_m' => '40',
            'rx_weight_f' => '30',
            'wod_id' => '1',
            'exercise_id' => '103'
        ]);
        WodLine::create([
            'order' => '2',
            'rx_reps' => '8',
            'rx_weight_m' => '40',
            'rx_weight_f' => '30',
            'wod_id' => '1',
            'exercise_id' => '103'
        ]);
        WodLine::create([
            'order' => '3',
            'rx_reps' => '8',
            'rx_weight_m' => '40',
            'rx_weight_f' => '30',
            'wod_id' => '1',
            'exercise_id' => '103'
        ]);
        WodLine::create([
            'order' => '4',
            'rx_reps' => '8',
            'rx_weight_m' => '40',
            'rx_weight_f' => '30',
            'wod_id' => '1',
            'exercise_id' => '103'
        ]);
        WodLine::create([
            'order' => '1',
            'rx_reps' => '4',
            'rx_weight_m' => '40',
            'rx_weight_f' => '30',
            'wod_id' => '2',
            'exercise_id' => '191'
        ]);
        WodLine::create([
            'order' => '2',
            'rx_reps' => '4',
            'rx_weight_m' => '40',
            'rx_weight_f' => '30',
            'wod_id' => '2',
            'exercise_id' => '191'
        ]);
        WodLine::create([
            'order' => '3',
            'rx_reps' => '4',
            'rx_weight_m' => '40',
            'rx_weight_f' => '30',
            'wod_id' => '2',
            'exercise_id' => '191'
        ]);
        WodLine::create([
            'order' => '4',
            'rx_reps' => '4',
            'rx_weight_m' => '40',
            'rx_weight_f' => '30',
            'wod_id' => '2',
            'exercise_id' => '191'
        ]);
        WodLine::create([
            'order' => '5',
            'rx_reps' => '4',
            'rx_weight_m' => '40',
            'rx_weight_f' => '30',
            'wod_id' => '2',
            'exercise_id' => '191'
        ]);
        WodLine::create([
            'order' => '1',
            'rx_reps' => '21',
            'rx_weight_m' => '40',
            'rx_weight_f' => '30',
            'wod_id' => '3',
            'exercise_id' => '311'
        ]);
        WodLine::create([
            'order' => '2',
            'rx_reps' => '15',
            'rx_weight_m' => '40',
            'rx_weight_f' => '30',
            'wod_id' => '3',
            'exercise_id' => '311'
        ]);
        WodLine::create([
            'order' => '3',
            'rx_reps' => '8',
            'rx_weight_m' => '40',
            'rx_weight_f' => '30',
            'wod_id' => '3',
            'exercise_id' => '311'
        ]);
    }
}
