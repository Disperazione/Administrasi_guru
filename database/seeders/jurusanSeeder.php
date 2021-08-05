<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class jurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i <= 3 ; $i++) {
            DB::table('jurusan')->insert([
                'nama_jurusan' => 'Rekayasa perangkat lunak',
                'singkatan_jurusan' => 'RPL'
            ]);
        }
    }
}
