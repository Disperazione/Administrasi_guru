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
        $s_ganjil = Kompetensi_dasar::where([['semester','ganjil'],['id_bidang_keahlian',$id]])->get();
        $s_genap = Kompetensi_dasar::where([['semester', 'genap'],['id_bidang_keahlian',$id]])->get();
        $pdf = PDF::loadView('export.pdf.lk_1', compact('target','s_ganjil','s_genap'));
        return $pdf->stream('LK1.PDF');
    }
}
