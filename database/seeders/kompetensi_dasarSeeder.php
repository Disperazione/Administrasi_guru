<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class kompetensi_dasarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i <= 20 ; $i++) {
            if ($i >= 10) {
                $kd_pengetahuan = "3.$i";
                $kd_ketrampilan = "4.$i";
            }else{
                $kd_pengetahuan = "3.0$i";
                $kd_ketrampilan = "4.0$i";
            }

            DB::table('kompetensi_dasar')->insert([
                'kd_pengetahuan' => $kd_pengetahuan,
                'keterangan_pengetahuan' => 'Merancang User Interface menggunakan library',
                'kd_ketrampilan' => $kd_ketrampilan,
                'keterangan_ketrampilan' =>
                'Merancang User Interface menggunakan
                library',
                'materi_inti'=> 'Konsep pembuatan user
                interface menggunakan library
                bawaan dalam pemrograman
                aplikasi berbasis oop
                Prosedur pembuatan user
                interface dengan menggunakan
                library dalam pemrograman
                aplikasi berbasis oop (PHP
                bootstrap)
                ',
                'durasi' => 8 ,
                'pertemuan' => '1-4',
                'semester' => 'Ganjil',
                'semester_kd' => 2,
                'id_bidang_keahlian' => 1
            ]);
        }
        for ($i = 20; $i <= 40; $i++) {
            if ($i >= 10) {
                $kd_pengetahuan = "3.$i";
                $kd_ketrampilan = "4.$i";
            } else {
                $kd_pengetahuan = "3.0$i";
                $kd_ketrampilan = "3.0$i";
            }

            DB::table('kompetensi_dasar')->insert([
                'kd_pengetahuan' => $kd_pengetahuan,
                'keterangan_pengetahuan' => 'Merancang User Interface menggunakan
                library',
                'kd_ketrampilan' => $kd_ketrampilan,
                'keterangan_ketrampilan' =>
                'Merancang User Interface menggunakan
                library',
                'materi_inti' => 'Konsep pembuatan user
                interface menggunakan library
                bawaan dalam pemrograman
                aplikasi berbasis oop
                Prosedur pembuatan user
                interface dengan menggunakan
                library dalam pemrograman
                aplikasi berbasis oop (PHP
                bootstrap)
                ',
                'durasi' => 8,
                'pertemuan' => '1-4',
                'semester' => 'Genap',
                'semester_kd' => 2,
                'id_bidang_keahlian' => 1
            ]);
        }


    }
}
