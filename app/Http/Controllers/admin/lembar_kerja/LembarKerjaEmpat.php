<?php

namespace App\Http\Controllers\admin\lembar_kerja;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Bidang_keahlian;
use App\Models\Kompetensi_dasar;
use Illuminate\Http\Request;

class LembarKerjaEmpat extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // mencari distinct/unique id_bidag_keahlian koompetensi dasar yang punya  indikator_ketercapaian
            $kompetensi = Kompetensi_dasar::select('id_bidang_keahlian')->has('materi_bahan_ajar')->get()->unique();
            $id_keahlian = [];
            foreach ($kompetensi as $key => $value) {
                $id_keahlian[] = $value->id_bidang_keahlian;
            }

            if (Auth::user()->role == 'guru') {
                // mendapat bidang keahlian yang sudah mempunyai kompetensi dasar yang mempunyai materi bahan ajar
                $data = Bidang_keahlian::has('kompetensi_dasar')->whereIn('id',  $id_keahlian)->where('id_guru', auth()->id())->get();
            } else if (Auth::user()->role == 'admin') {
                $data = Bidang_keahlian::has('kompetensi_dasar')->whereIn('id',  $id_keahlian)->get();
            }

            return datatables()->of($data)
                ->addColumn('guru', function ($data) {
                    return $data->guru->name;
                })
            ->addColumn('action', function ($data) {
                $button = '<a href="' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-danger text-white btn-sm"><i class="fas fa-file-pdf"></i></a>';
                $button .= '&nbsp';
                    $button .= '<a href="/admin/Lembar-kerja-4/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/target_pembelajaran/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()->make(true);
        }
        return view('admin.lembar_kerja_empat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lembar_kerja_empat.tambah');
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
            $materi = Bidang_keahlian::has('kompetensi_dasar')->where(['id_guru', auth()->id()], ['id', $id])->get();
        } else if (Auth::user()->role == 'admin') {
            $materi = Bidang_keahlian::has('kompetensi_dasar')->where('id',  $id)->get();
        }
        return view('admin.lembar_kerja_empat.detail', compact('materi'));
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
            $materi = Bidang_keahlian::has('kompetensi_dasar')->where(['id_guru', auth()->id()], ['id', $id])->get();
        } else if (Auth::user()->role == 'admin') {
            $materi = Bidang_keahlian::has('kompetensi_dasar')->where('id',  $id)->get();
        }
        return view('admin.lembar_kerja_empat.detail', compact('materi'));
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
        $kd = Kompetensi_dasar::where('id_bidang_keahlian', $id)->get();
        foreach ($kd as $key => $value) {
            $kd->materi_bahan_ajar->delete();
        }
        return response()->json($data = 'berhasil');
    }
}
