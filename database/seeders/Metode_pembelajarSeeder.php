<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Metode_pembelajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 40 ; $i++) {
            DB::table('metode_pembelajaran')->insert(
                [
                    'metode' => 'Koneksi internet',
                    'id_strategi_pembelajaran' => $i,
                ],
                [
                    'metode' => 'Code Editor Visual StudioCode',
                    'id_strategi_pembelajaran' => $i,
                ],
                [
                    'metode' => 'Framework front end bootstrap',
                    'id_strategi_pembelajaran' => $i,
                ],
            );
        }
    }
}
