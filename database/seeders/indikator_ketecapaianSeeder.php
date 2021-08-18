<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class indikator_ketecapaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i <= 40 ; $i++){
            DB::table('indikator_ketercapaian')->insert([
                'bukti' => 'Penilaian KIKD',
                'ketuntasan' => 'Siswa Mampu membuat
                form dan front end
                aplikasi web dengan
                library bootstrap',
                'jumlah_pertemuan' => 4,
                // 'alat_bahan' => '- Koneksi
                // Internet
                // - Code Editor
                // Visual Studio
                // Code
                // - Framework
                // front end
                // - Framework
                // Codeigniter',
                // 'sumber_pembelajaran' => 'Modul Digital
                // - Video
                // Pembelajaran
                // ',
                'keterangan' => 'keterangan',
                'id_kompetensi_dasar' => $i
            ]);
        }
    }
}
