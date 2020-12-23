<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'permission' => 'user',
        ]);
        User::create([ // create a new user
            'name' => 'RXed Admin',
            'email' => 'admin@rxed.co.uk',
            'password' => Hash::make('password'),
            'permission' => 'admin',
        ]);
    }
}