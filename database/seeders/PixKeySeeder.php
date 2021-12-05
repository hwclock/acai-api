<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PixKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pix_keys')->insert([
            'chave' => '687456tretg5464f45t',
            'proprietario' => 1,
        ]);

        DB::table('pix_keys')->insert([
            'chave' => '53646841weferg54398r4qwds',
            'proprietario' => 1,
        ]);

        DB::table('pix_keys')->insert([
            'chave' => 'aqwewdc3445g5541351qwevuili9ol53',
            'proprietario' => 2,
        ]);
    }
}
