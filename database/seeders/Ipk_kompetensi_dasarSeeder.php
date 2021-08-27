<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Ipk_kompetensi_dasarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ipk_kompetensi_dasar')->insert(
        [
            'ipk_kd_ketrampilan' => '1.	Menerapkan instruksi thread dalam pemrograman aplikasi berorientasi obyek.',
            'ipk_kd_pengetahuan' => '1.	Menjelaskan konsep dasar instruksi thread dalam pemrograman aplikasi berorientasi obyek',
            'id_kompetensi_dasar' => 1
        ],
        [
            'ipk_kd_ketrampilan' => '2.	Merancang program aplikasi berorientasi obyek dengan penerapan instruksi thread.',
            'ipk_kd_pengetahuan' => '2.	Menjelaskan prosedur instruksi thread  dalam pemrograman aplikasi berorientasi obyek.',
            'id_kompetensi_dasar' => 1
        ],
        [
            'ipk_kd_ketrampilan' => '3.	Membuat kode program aplikasi berorientasi obyek yang menerapkan instruksi thread.',
            'ipk_kd_pengetahuan' => '3.	Menjelaskan prosedur instruksi thread  dalam pemrograman aplikasi berorientasi obyek.',
            'id_kompetensi_dasar' => 1
        ],
        [
            'ipk_kd_ketrampilan' => '4.	Menguji program aplikasi berorientasi obyek yang menerapkan instruksi thread.',
            'ipk_kd_pengetahuan' => null,
            'id_kompetensi_dasar' => 1
        ],
        );
    }
}
