<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pertemuan_rppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <=  1 ; $i++) {
            DB::table('pertemuan_rpp')->insert([
                'pertemuan' => 'pertemuan ' . $i,
                'id_rencana_pelaksanaan_pembelajaran' => 1
            ]);
        }

    }
}
