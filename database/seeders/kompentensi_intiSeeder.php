<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kompentensi_intiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <=  4; $i++) {
            DB::table('kompetensi_inti')->insert([
                'konpetensi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam quod vel consectetur blanditiis, dignissimos nisi molestiae beatae, id, voluptate laudantium hic impedit itaque obcaecati quis! Possimus ipsa reiciendis iste totam voluptatum officiis cupiditate unde assumenda veniam. At ullam, dolore, laudantium autem, aut tempora quam repellat recusandae hic quod aliquam alias',
                'id_target_pembelajaran' => 1
            ]);
        }
    }
}
