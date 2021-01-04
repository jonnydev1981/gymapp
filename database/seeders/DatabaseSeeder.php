<?php

namespace Database\Seeders;

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
        $this->call(ExercisesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(WorkoutsTableSeeder::class);
        $this->call(LinesTableSeeder::class);
    }
}
