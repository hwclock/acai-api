<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pessoas')->insert([
            'nome' => 'Bill Gates',
            'user' => 1,
        ]);

        DB::table('pessoas')->insert([
            'nome' => 'Ronaldinho',
            'user' => 2,
        ]);
    }
}
