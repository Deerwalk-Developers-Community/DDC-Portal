<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Deerwalk Developers Community',
            'email' => 'developers.community@deerwalk.edu.np',
            'password' => Hash::make('Dev#Community#00'),
            'role' => 1,
            'bio' => ''
        ]);
    }
}
