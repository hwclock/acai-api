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
            'name' => 'testUser',
            'email' => 'test.user@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table(('users'))->insert([
            'name' => 'adminUser',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
