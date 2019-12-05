<?php

use App\Wod;
use Illuminate\Database\Seeder;

class WodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wod::create([
            'description' => 'Test Weight Lifting WOD',
            'rx_time' => '00:15:00',
            'style_id' => '1',
            'box_id' => '1'
        ]);
        Wod::create([
            'description' => 'Test EMOM WOD',
            'rx_time' => '00:20:00',
            'style_id' => '2',
            'box_id' => '1'
        ]);
        Wod::create([
            'description' => 'Test Ladder WOD',
            'rx_time' => '00:25:00',
            'style_id' => '3',
            'box_id' => '1'
        ]);
    }
}
