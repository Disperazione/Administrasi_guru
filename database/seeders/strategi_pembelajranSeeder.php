<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class strategi_pembelajranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 40 ; $i++) {
             DB::table('strategi_pembelajaran')->insert([
            'model_pembelajaran' => 'Project Based
            Learning (PjBL) /',
            'metode_pembelajaran' => '- Simulasi ',
            'deskripsi_kegiatan' => 'Praktek membuat user
            interface menggunakan
            library frond end',
                'id_kompetensi_dasar' => $i
        ]);
        }

    }
}
