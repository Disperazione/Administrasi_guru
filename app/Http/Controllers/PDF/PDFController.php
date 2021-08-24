<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use App\Models\Bidang_keahlian;
use App\Models\Kompetensi_dasar;
class PDFController extends Controller
{
    public function LK_1($id)
    {
        $target = Bidang_keahlian::has('target_pembelajaran')->where('id', $id)->first();
        // nyari kompetensi dasar yang semesternya ganjil & bidnag keahlian nya id  = $id
        $s_ganjil = Kompetensi_dasar::where([['semester','ganjil'],['id_bidang_keahlian',$id]])->has('kd_target_pemebelajaran')->get();
        $s_genap = Kompetensi_dasar::where([['semester', 'genap'],['id_bidang_keahlian',$id]])->has('kd_target_pemebelajaran')->get();
        $pdf = PDF::loadView('export.PDF.lk_1', compact('target','s_ganjil','s_genap'));
        return $pdf->stream('LK1.PDF');
    }

    public function LK_2($id)
    {
        $target = Bidang_keahlian::has('target_pembelajaran')->where('id', $id)->first();
        // nyari kompetensi dasar yang semesternya ganjil & bidnag keahlian nya id  = $id
        $s_ganjil = Kompetensi_dasar::where([['semester','ganjil'],['id_bidang_keahlian',$id]])->get();
        $s_genap = Kompetensi_dasar::where([['semester', 'genap'],['id_bidang_keahlian',$id]])->get();
        $pdf = PDF::loadView('export.PDF.lk_2', compact('target','s_ganjil','s_genap'));
        return $pdf->stream('LK2.PDF');
    }

    public function LK_3($id)
    {
        $target = Bidang_keahlian::has('target_pembelajaran')->where('id', $id)->first();
        // nyari kompetensi dasar yang semesternya ganjil & bidnag keahlian nya id  = $id
        $s_ganjil = Kompetensi_dasar::where([['semester','ganjil'],['id_bidang_keahlian',$id]])->get();
        $s_genap = Kompetensi_dasar::where([['semester', 'genap'],['id_bidang_keahlian',$id]])->get();
        $pdf = PDF::loadView('export.PDF.lk_3', compact('target','s_ganjil','s_genap'));
        return $pdf->stream('LK3.PDF');
    }

    public function LK_4($id)
    {
        // ambil bidang yang mempunyai kompetensi dasar tang id nya sma kaya id bidang
        $target = Bidang_keahlian::has('kompetensi_dasar')->where('id', $id)->first();
        // nyari kompetensi dasar yang semesternya ganjil & bidnag keahlian nya id  = $id
        $s_ganjil = Kompetensi_dasar::where([['semester','ganjil'],['id_bidang_keahlian',$id]])->has('materi_bahan_ajar')->get();
        $s_genap = Kompetensi_dasar::where([['semester', 'genap'],['id_bidang_keahlian',$id]])->has('materi_bahan_ajar')->get();
        $m_bahan_ajar = Kompetensi_dasar::where('id_bidang_keahlian', $id)->has('materi_bahan_ajar')->get();
        $pdf = PDF::loadView('export.PDF.lk_4', compact('target','s_ganjil','s_genap', 'm_bahan_ajar'));
        return $pdf->stream('LK4.PDF');
    }
}
