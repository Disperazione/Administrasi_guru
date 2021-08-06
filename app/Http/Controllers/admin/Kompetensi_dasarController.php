<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Bidang_keahlian;
use Illuminate\Http\Request;

class Kompetensi_dasarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if (Auth::user()->role == 'guru') {
                $data = Bidang_keahlian::where('id_guru',Auth::user()->id)->has('kompetensi_dasar')->get();
            }else if(Auth::user()->role == 'admin'){
                $data = Bidang_keahlian::has('kompetensi_dasar')->get();
            }

            return datatables()->of($data)
                ->addColumns('guru', function ($data) {
                    return $data->guru->name;
                })
                ->addColumns('guru', function ($data) {
                    return $data->bidang_studi->guru->name;
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . $data->id . '"   id="' . $data->id . '" class="btn btn-success btn-sm"><i class="fas fa-download"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/guru/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()->make(true);
        }
        return view('admin.kompetensi_dasar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kompetensi_dasar.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bidang = Bidang_keahlian::find($id)->first();
        return view('admin.kompetensi_dasar.detail', compact('bidang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bidang = Bidang_keahlian::find($id)->first();
        return view('admin.kompetensi_dasar.edit', compact('bidang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bidang_keahlian::find($id)->delete();
        return response()->json($data = 'berhasil');
    }
}
