<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ExerciseGroupsTableSeeder::class);
        $this->call(ExercisesTableSeeder::class);
        $this->call(BoxesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StylesTableSeeder::class);
        $this->call(WodsTableSeeder::class);
        $this->call(WodLinesTableSeeder::class);
        $this->call(WorkoutsTableSeeder::class);
        $this->call(WorkoutLinesTableSeeder::class);
        $this->call(StatisticsTableSeeder::class);
    }
}
