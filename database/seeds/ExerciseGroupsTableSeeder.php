<?php

use App\ExerciseGroup;
use Illuminate\Database\Seeder;

class ExerciseGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExerciseGroup::insert([
            'group' => 'Squats'
        ]);
        ExerciseGroup::insert([
            'group' => 'Cleans'
        ]);
        ExerciseGroup::insert([
            'group' => 'Snatches'
        ]);
    }
}
