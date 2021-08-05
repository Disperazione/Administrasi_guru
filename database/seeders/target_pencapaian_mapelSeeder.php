<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class target_pencapaian_mapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <=  4; $i++) {
            DB::table('target_pencapaian_mapel')->insert([
                'target' => 'Siswa dapat membuat User Interface studi kasus Soal UKK RPL',
                'keterangan' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam dignissimos blanditiis accusamus, accusantium nostrum necessitatibus.',
                'id_target_pembelajaran' => 1
            ]);
        }
    }
}
