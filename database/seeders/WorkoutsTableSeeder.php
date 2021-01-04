<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Workout;

class WorkoutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Workout::create(
            [
            'name' => 'Workout 1',
            'performed' => '2021-01-01 20:00:00',
            'user_id' => '1'
            ]
        );
        Workout::create(
            [
            'name' => 'Workout 2',
            'performed' => '2021-01-01 21:00:00',
            'user_id' => '1'
            ]
        );
        Workout::create(
            [
            'name' => 'Workout 3',
            'performed' => '2021-01-01 22:00:00',
            'user_id' => '1'
            ]
        );
    }
}
