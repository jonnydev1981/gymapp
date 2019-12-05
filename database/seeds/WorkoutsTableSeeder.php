<?php

use App\Workout;
use Illuminate\Database\Seeder;

class WorkoutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Workout::create([
            'name' => 'Test Weight Lifting Workout',
            'description' => 'Test Weight Lifting Workout',
            'time_taken' => '00:15:00',
            'performed_on' => '2019-12-01 20:00:00',
            'user_id' => '1',
            'wod_id' => '1'
        ]);
        Workout::create([
            'name' => 'Test EMOM Workout',
            'description' => 'Test EMOM Workout',
            'time_taken' => '00:20:00',
            'performed_on' => '2019-12-02 20:00:00',
            'user_id' => '1',
            'wod_id' => '2'
        ]);
        Workout::create([
            'name' => 'Test Ladder Workout',
            'description' => 'Test Ladder Workout',
            'time_taken' => '00:25:00',
            'performed_on' => '2019-12-03 20:00:00',
            'user_id' => '1',
            'wod_id' => '3'
        ]);
    }
}
