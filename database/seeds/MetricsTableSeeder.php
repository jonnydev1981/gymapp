<?php

use App\Metric;
use Illuminate\Database\Seeder;

class MetricsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Metric::create([
            'name' => 'distance',
        ]);
        Metric::create([
            'name' => 'reps',
        ]);
        Metric::create([
            'name' => 'time',
        ]);
        Metric::create([
            'name' => 'weight',
        ]);
    }
}
