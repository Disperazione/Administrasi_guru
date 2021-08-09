<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class admin_cloudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_cloud')->insert([
            'nama' => "Surat",
            'path' => 'file/surat/surat.pdf',
            'id_guru' => 1
        ]);
        DB::table('admin_cloud')->insert([
            'nama' => "Surat",
            'path' => 'file/surat/surat.pdf',
            'id_guru' => 2
        ]);
    }
}
