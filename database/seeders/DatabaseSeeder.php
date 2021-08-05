<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            userSeeder::class,
            jurusanSeeder::class,
            guruSeeder::class,
            bidang_keahlianSeeder::class,
            kompetensi_dasarSeeder::class,
            target_pembelajaranSeeder::class,
            rincian_buktiSeeder::class,
            kompentensi_intiSeeder::class,
            target_pencapaian_mapelSeeder::class,
            target_pencapaian_kkidSeeder::class,
            strategi_pembelajranSeeder::class,
            indikator_ketecapaianSeeder::class,
            materi_bahan_ajarSeeder::class,
            rencana_pelaksanaan_pembelajaranSeeder::class,
            pertemuan_rppSeeder::class,
            admin_cloudSeeder::class
        ]);
    }
}