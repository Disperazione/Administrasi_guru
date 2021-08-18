<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Sumber_belajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 40; $i++) {
            DB::table('sumber_belajar')->insert(
                [
                    'isi' => 'Koneksi internet',
                    'id_indikator_ketercapaian' => $i,
                ],
                [
                    'isi' => 'Code Editor Visual StudioCode',
                    'id_indikator_ketercapaian' => $i,
                ],
                [
                    'isi' => 'Framework front end bootstrap',
                    'id_indikator_ketercapaian' => $i,
                ],
            );
        }
    }
}
