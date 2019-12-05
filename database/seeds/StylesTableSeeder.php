<?php

use App\Style;
use Illuminate\Database\Seeder;

class StylesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Style::create([ // create a new staff user
            'style' => 'Weightlifting',
            'metric' => 'weight'
        ]);
        Style::create([ // create a new staff user
            'style' => 'EMOM',
            'metric' => 'time'
        ]);
        Style::create([ // create a new staff user
            'style' => 'Ladder',
            'metric' => 'time'
        ]);
    }
}
