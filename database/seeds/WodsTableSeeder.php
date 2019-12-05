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
        Wod::create([ // create a new staff user
            'description' => 'John Taylor',
            'style' => 'vandammit091281@gmail.com',
            'box_id' => '1'
        ]);
    }
}
