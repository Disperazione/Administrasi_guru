<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidang_keahlian;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Kompetensi_dasar;
use App\Models\User;

class ViewController extends Controller
{
    public function dashboard()
    {
        $user = User::all();
        $jurusan = Jurusan::count();
        $kd = Kompetensi_dasar::select('id_bidang_keahlian')->get()->unique();
        $strategi = Kompetensi_dasar::select('id_bidang_keahlian')->has('strategi_pembelajaran')->get()->unique();
        $indikator = Kompetensi_dasar::select('id_bidang_keahlian')->has('indikator_ketercapaian')->get()->unique();
        $materi = Kompetensi_dasar::select('id_bidang_keahlian')->has('materi_bahan_ajar')->get()->unique();
        $rpp = Kompetensi_dasar::select('id_bidang_keahlian')->has('rencana_pelaksanaan_pembelajaran')->get()->unique();
        $id_keahlian_strategi = [];
        $id_keahlian_indikator = [];
        $id_keahlian_materi = [];
        $id_keahlian_kd = [];
        $id_keahlian_rpp = [];
        foreach ($kd as $key => $value) {
            $id_keahlian_kd[] = $value->id_bidang_keahlian;
        }
        foreach ($strategi as $key => $value) {
            $id_keahlian_strategi[] = $value->id_bidang_keahlian;
        }
        foreach ($indikator as $key => $value) {
            $id_keahlian_indikator[] = $value->id_bidang_keahlian;
        }
        foreach ($materi as $key => $value) {
            $id_keahlian_materi[] = $value->id_bidang_keahlian;
        }
        foreach ($rpp as $key => $value) {
            $id_keahlian_rpp[] = $value->id_bidang_keahlian;
        }
        $kd = Bidang_keahlian::has('kompetensi_dasar')->whereIn('id',  $id_keahlian_kd)->where('id_guru', auth()->id())->count();
        $lk_1 = Bidang_keahlian::has('target_pembelajaran')->where('id_guru', auth()->id())->count();
        $lk_2 = Bidang_keahlian::has('kompetensi_dasar')->whereIn('id',  $id_keahlian_strategi)->where('id_guru', auth()->id())->count();
        $lk_3 = Bidang_keahlian::has('kompetensi_dasar')->whereIn('id',  $id_keahlian_indikator)->where('id_guru', auth()->id())->count();
        $lk_4 = Bidang_keahlian::has('kompetensi_dasar')->whereIn('id',  $id_keahlian_materi)->where('id_guru', auth()->id())->count();
        $total = $lk_1 + $lk_2 + $lk_3 + $lk_4;
        $rpp = Bidang_keahlian::has('kompetensi_dasar')->whereIn('id',  $id_keahlian_rpp)->where('id_guru', auth()->id())->count();
        
        return view('admin.dashboard', compact('user','jurusan','kd','lk_1', 'lk_2', 'lk_3', 'lk_4','total','rpp'));
    }
}
