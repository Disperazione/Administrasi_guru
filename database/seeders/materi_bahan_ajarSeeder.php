<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class materi_bahan_ajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 40 ; $i++) {
            DB::table('materi_bahan_ajar')->insert([
                'modul' => 'Judul:
                Merancang
                user interface
                web dengan
                bootstrap
                link : -
                ',
                'vidio_pembelajaran' => 'Judul :
                link:
                https://www.youtube.com/watch?v=u810GTZ9_hg',
                'deskripsi_bahan_ajar' => 'Praktek membuat user
                interface menggunakan
                library frond end bootstrap',
                'deskripsi_bahan_ajar' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas modi aliquam debitis quod unde quae',
                'keterangan' => 'keterangan',
                'id_kompetensi_dasar' => $i
            ]);
        }



    }
}
