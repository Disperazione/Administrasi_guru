<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class komentarController extends Controller
{
    //
    public function coment(){

        return view('admin.komen.tambah');
    }
}
