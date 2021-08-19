<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mapel')->insert([
            'nama_mapel' => 'PEMROGRAMAN BERORENTASI OBJEK',
            'id_guru' => '1',
        ]);
    }
}
