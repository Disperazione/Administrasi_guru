<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class guruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        DB::table('guru')->insert([
            'name' => $faker->name,
            'nik' => '0000000',
            'jabatan' => 'Guru',
            'alamat' => $faker->address(),
            'fax' => '00',
            'no_telp' => $faker->phoneNumber(),
            'id_jurusan' => 1,
            'id_user' => 1
        ]);

        DB::table('guru')->insert([
            'name' => $faker->name,
            'nik' => '0000000',
            'jabatan' => 'Admin',
            'alamat' => $faker->address(),
            'fax' => '00',
            'no_telp' => $faker->phoneNumber(),
            'id_jurusan' => 1,
            'id_user' => 2
        ]);
    }
}
