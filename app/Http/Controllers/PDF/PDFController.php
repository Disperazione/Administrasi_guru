<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use App\Models\Bidang_keahlian;
use App\Models\Kompetensi_dasar;
use App\Models\Rencana_pelaksanaan_pembelajaran;
class PDFController extends Controller
{
    public function LK_1($id)
    {
        $target = Bidang_keahlian::has('target_pembelajaran')->where('id', $id)->first();
        // nyari kompetensi dasar yang semesternya ganjil & bidnag keahlian nya id  = $id
        $s_ganjil = Kompetensi_dasar::where([['semester','ganjil'],['id_bidang_keahlian',$id]])->has('kd_target_pemebelajaran')->get();
        $s_genap = Kompetensi_dasar::where([['semester', 'genap'],['id_bidang_keahlian',$id]])->has('kd_target_pemebelajaran')->get();
        $id_jurusan = [];
        foreach ($target->jurusan as $key => $value) {
            $id_jurusan[] .= $value->singkatan_jurusan;
        }
        $jurusan =  implode(', ', $id_jurusan);
        $pdf = PDF::loadView('export.PDF.lk_1', compact('target','s_ganjil','s_genap','jurusan'));
        return $pdf->stream('LK1.PDF');
    }

    public function LK_2($id)
    {
        $target = Bidang_keahlian::has('target_pembelajaran')->where('id', $id)->first();
        // nyari kompetensi dasar yang semesternya ganjil & bidnag keahlian nya id  = $id
        $s_ganjil = Kompetensi_dasar::where([['semester','ganjil'],['id_bidang_keahlian',$id]])->has('strategi_pembelajaran')->get();
        $s_genap = Kompetensi_dasar::where([['semester', 'genap'],['id_bidang_keahlian',$id]])->has('strategi_pembelajaran')->get();
        $id_jurusan = [];
        foreach ($target->jurusan as $key => $value) {
            $id_jurusan[] .= $value->singkatan_jurusan;
        }
        $jurusan =  implode(', ', $id_jurusan);
        $pdf = PDF::loadView('export.PDF.lk_2', compact('target','s_ganjil','s_genap','jurusan'));
        return $pdf->stream('LK2.PDF');
    }

    public function LK_3($id)
    {
        $target = Bidang_keahlian::has('target_pembelajaran')->where('id', $id)->first();
        // nyari kompetensi dasar yang semesternya ganjil & bidnag keahlian nya id  = $id
        $s_ganjil = Kompetensi_dasar::where([['semester','ganjil'],['id_bidang_keahlian',$id]])->has('indikator_ketercapaian')->get();
        $s_genap = Kompetensi_dasar::where([['semester', 'genap'],['id_bidang_keahlian',$id]])->has('indikator_ketercapaian')->get();
        $id_jurusan = [];
        foreach ($target->jurusan as $key => $value) {
            $id_jurusan[] .= $value->singkatan_jurusan;
        }
        $jurusan =  implode(', ', $id_jurusan);
        $pdf = PDF::loadView('export.PDF.lk_3', compact('target','s_ganjil','s_genap','jurusan'));
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
        $id_jurusan = [];
        foreach ($target->jurusan as $key => $value) {
            $id_jurusan[] .= $value->singkatan_jurusan;
        }
        $jurusan =  implode(', ', $id_jurusan);
        $pdf = PDF::loadView('export.PDF.lk_4', compact('target','s_ganjil','s_genap', 'm_bahan_ajar','jurusan'));
        return $pdf->stream('LK4.PDF');
    }

    public function rpp($id)
    {
        $kompetensi_dasar = kompetensi_dasar::where('id',$id)->first();
        $rpp = Rencana_pelaksanaan_pembelajaran::where('id_kompetensi_dasar',$id)->first();
        $pdf = PDF::loadView('export.PDF.rpp', compact('rpp','kompetensi_dasar'));
        return $pdf->stream('RPP.PDF');
    }
}
