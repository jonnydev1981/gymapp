<?php

use App\Box;
use Illuminate\Database\Seeder;

class BoxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Box::insert([ 
            'name' => 'CrossFit Spitfire',
            'address' => '8, Caston Industrial Estate, Salhouse Road, Norwich NR7 9AQ'
        ]);
    }
}
