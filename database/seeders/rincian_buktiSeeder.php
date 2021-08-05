<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class rincian_buktiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 10 ; $i++) {
            DB::table('rincian_bukti')->insert([
                'rincian_bukti' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, ab facere libero nam sed nobis!',
                'id_target_pembelajaran' => 1
            ]);
        }

    }
}
