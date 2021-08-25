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
            Db::table('MorphJurusans')->insert(
                [
                    'MorphJurusan_type' => 'App\Models\Guru', // model bersangkutan
                    'MorphJurusan_id' => 1, // id dari models tersebut
                    'jurusan_id' => $i, // 1,2,3
                ],
            );
            Db::table('MorphJurusans')->insert(
                [
                    'MorphJurusan_type' => 'App\Models\Bidang_keahlian',
                    'MorphJurusan_id' => 1, // id model yang bersangkuran
                    'jurusan_id' => $i, // 1,2,3
                ],
            );
        }
    }
}


