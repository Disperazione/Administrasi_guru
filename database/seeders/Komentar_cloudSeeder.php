<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Komentar_cloudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=3; $i <= 4 ; $i++) {
            DB::table('komentar_cloud')->insert([
                'comment' => 'bagus',
                'id_admin_cloud' => $i,
                'id_guru' => 2
            ]);
        }
    }
}
