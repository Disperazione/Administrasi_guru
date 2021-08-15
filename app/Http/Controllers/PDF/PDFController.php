<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PDFController extends Controller
{
    public function LK_1()
    {


       

        $pdf = PDF::loadView('export.pdf.lk_1');

        return $pdf->stream('LK1.PDF');

        


    }
}
