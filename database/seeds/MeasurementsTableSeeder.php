<?php

use App\Measurement;
use Illuminate\Database\Seeder;

class MeasurementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Measurement::create([
            'longname' => 'kilograms',
            'abbreviation' => 'kg',
        ]);
        Measurement::create([
            'longname' => 'metres',
            'abbreviation' => 'm',
        ]);
        Measurement::create([
            'longname' => 'kilometres',
            'abbreviation' => 'km',
        ]);
        Measurement::create([
            'longname' => 'minutes',
            'abbreviation' => 'mins',
        ]);
    }
}
