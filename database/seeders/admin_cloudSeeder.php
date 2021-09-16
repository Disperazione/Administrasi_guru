<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class admin_cloudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i <= 2  ; $i++) {
            DB::table('admin_cloud')->insert([
                'nama' => "Lembar-kerja-$i",
                'jenis' => "LK$i",
                'status' => 'kosong',
                'path' => "file/surat/lk_$i.pdf",
                'id_guru' => 1,
                'id_bidang_keahlian' => 1
            ]);
        }

        for ($i = 3; $i <= 4; $i++) {
            DB::table('admin_cloud')->insert([
                'nama' => "Lembar-kerja-$i",
                'jenis' => "LK$i",
                'status' => 'tolak',
                'path' => "file/surat/lk_$i.pdf",
                'id_guru' => 1,
                'id_bidang_keahlian' => 1
            ]);
        }

        DB::table('admin_cloud')->insert([
            'nama' => "RPP",
            'jenis' => "RPP kd 3.01 & kd 4.01 id=1",
            'status' => 'kosong',
            'path' => 'file/surat/RPP.pdf',
            'id_guru' => 2,
            'id_bidang_keahlian' => 1,
            'updated_at' => Carbon::now(),
        ]);
    }
}
