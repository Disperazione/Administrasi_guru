<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;

class Cloud_adminController extends Controller
{
    //
    public function cloud_admin()
    {
        return view('admin.cloud.index');
    }
}
