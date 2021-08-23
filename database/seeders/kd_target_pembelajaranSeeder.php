<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kd_target_pembelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=40 ; $i++) {
            DB::table('kd_target_pembelajaran')->insert([
                'id_target_pembelajaran' => 1,
                'id_kompetensi_dasar' => $i,
            ]);
        }
    }
}
