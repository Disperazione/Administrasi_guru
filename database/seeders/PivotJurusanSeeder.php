<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PivotJurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 3 ; $i++) {
            Db::table('guru_jurusan')->insert(
                [
                    'id_guru' => 1,
                    'id_jurusan' => $i, // 1,2,3
                ]
            );
        }
    }
}
