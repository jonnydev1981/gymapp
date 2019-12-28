<?php

use App\Statistic;
use Illuminate\Database\Seeder;

class StatisticsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Statistic::create([
            'weight' => '49.65',
            'metric' => 'weight',
            'user_id' => '1',
            'exercise_id' => '103'
        ]);
        Statistic::create([
            'weight' => '32.73',
            'metric' => 'weight',
            'user_id' => '1',
            'exercise_id' => '191'
        ]);
        Statistic::create([
            'weight' => '90.00',
            'metric' => 'weight',
            'user_id' => '1',
            'exercise_id' => '311'
        ]);
    }
}
