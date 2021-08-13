<?php

namespace App\Http\Controllers\admin\lembar_kerja;

use App\Http\Controllers\Controller;
use App\Models\Bidang_keahlian;
use App\Models\Target_pembelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LembarKerjaSatu extends Controller
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
                $data = Bidang_keahlian::where('id_guru', Auth()->id())->has('target_pembelajaran')->get();
            } else if (Auth::user()->role == 'admin') {
                $data = Bidang_keahlian::has('target_pembelajaran')->get();
            }
            return datatables()->of($data)
                ->addColumn('guru', function ($data) {
                    return $data->guru->name;
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-danger text-white btn-sm"><i class="fas fa-file-pdf"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a href="/admin/Lembar-kerja-1/{Lembar_kerja_1}' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/target_pembelajaran/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()->make(true);
        }
        return view('admin.lembar_kerja_satu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lembar_kerja_satu.tambah');
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
        if (Auth::user()->role == 'guru') {
            $target = Bidang_keahlian::has('target_pembelajaran')->where(['id_guru', Auth()->id()], ['id', $id])->first();
        } else if (Auth::user()->role == 'admin') {
            $target = Bidang_keahlian::has('target_pembelajaran')->where('id', $id)->first();
        }
        return view('admin.lembar_kerja_satu.detail', compact('target'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->role == 'guru') {
            $target = Bidang_keahlian::has('target_pembelajaran')->where(['id_guru', Auth()->id()], ['id', $id])->first();
        } else if (Auth::user()->role == 'admin') {
            $target = Bidang_keahlian::has('target_pembelajaran')->where('id', $id)->first();
        }
        return view('admin.lembar_kerja_satu.edit', compact('target'));
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
        Target_pembelajaran::where('id_bidang_keahlian', $id)->delete();
        return response()->json($data = 'berhasil');
    }
}
