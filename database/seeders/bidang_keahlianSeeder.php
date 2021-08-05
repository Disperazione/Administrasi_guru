<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class bidang_keahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        DB::table('bidang_keahlian')->insert([
            'bidang_studi' => 'TEKNOLOGI INFORMASI DAN KOMUNIKASI',
            'kelas' => 'X',
            'jam_pelajaran' => '128 JP',
            'total_waktu_jam_pelajaran' => '48 Menit',
            'mapel' => 'PEMROGRAMAN BERORENTASI OBJEK',
            'id_guru' => 1
        ]);
    }
}
