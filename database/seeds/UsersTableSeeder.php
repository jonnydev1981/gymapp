<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([ // create a new user
            'name' => 'John Taylor',
            'email' => 'vandammit091281@gmail.com',
            'password' => Hash::make('password'),
            'box_id' => '1',
            'permission' => 'user'
        ]);
        User::create([ // create a new box owner
            'name' => 'Box Owner',
            'email' => 'boxowner@test.com',
            'password' => Hash::make('password'),
            'box_id' => '1',
            'permission' => 'box'
        ]);
    }
}
