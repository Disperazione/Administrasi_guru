<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class rencana_pelaksanaan_pembelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rencana_pelaksanaan_pembelajaran')->insert([
            'ipk_kd_ketrampilan' => '3.01',
            'ipk_kd_pengetahuan' => '4.01',
            'alokasi_waktu' => '4 JP',
            'id_kompetensi_dasar' => 1
        ]);
    }
}

