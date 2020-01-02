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
        Style::create([
            'style' => 'Weightlifting'
        ]);
        Style::create([
            'style' => 'EMOM'
        ]);
        Style::create([
            'style' => 'Ladder'
        ]);
    }
}
