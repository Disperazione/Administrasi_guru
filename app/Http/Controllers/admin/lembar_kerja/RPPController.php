<?php

namespace App\Http\Controllers\admin\lembar_kerja;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Bidang_keahlian;
use App\Models\Kompetensi_dasar;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class RPPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $id = auth()->id();
            // nkompetensi dasar yang mempunyai bidang keahlian dan mempunyai rpp
            if (Auth::user()->role == 'guru') {
                $data = Kompetensi_dasar::whereHas('bidang_keahlian', function (Builder $query) use ($id) {
                    $query->where('id_guru', $id);
                })->has('rencana_pelaksanaan_pembelajaran')->get();
            } else if (Auth::user()->role == 'admin') {
                $data = Kompetensi_dasar::has('bidang_keahlian')->has('rencana_pelaksanaan_pembelajaran')->get();
            }

            return datatables()->of($data)
                ->addColumn('bidang_studi', function ($data) {
                    return $data->bidang_keahlian->bidang_studi;
                })
                ->addColumn('mapel', function ($data) {
                    return $data->bidang_keahlian->mapel;
                })
                ->addColumn('guru', function ($data) {
                    return $data->bidang_keahlian->guru->name;
                })
                ->addColumn('guru', function ($data) {
                    return $data->bidang_keahlian->guru->jurusan->singkatan_jurusan;
                })
                ->addColumn('action', function ($data) {
                $button = '<a href="' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-success btn-sm"><i class="fas fa-download"></i></a>';
                $button .= '&nbsp';
                    $button .= '<a href="' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/target_pembelajaran/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()->make(true);
        }
        return view('admin.rpp.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rpp.tambah');
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
            $rpp = Kompetensi_dasar::whereHas('bidang_keahlian', function (Builder $query) use ($id) {
                $query->where('id_guru', $id);
            })->has('rencana_pelaksanaan_pembelajaran')->where('id', $id)->get();
        } else if (Auth::user()->role == 'admin') {
            $rpp = Kompetensi_dasar::has('bidang_keahlian')->has('rencana_pelaksanaan_pembelajaran')->where('id', $id)->get();
        }
        return view('admin.rpp.detail', compact('rpp'));
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
            $rpp = Kompetensi_dasar::whereHas('bidang_keahlian', function (Builder $query) use ($id) {
                $query->where('id_guru', $id);
            })->has('rencana_pelaksanaan_pembelajaran')->where('id', $id)->get();
        } else if (Auth::user()->role == 'admin') {
            $rpp = Kompetensi_dasar::has('bidang_keahlian')->has('rencana_pelaksanaan_pembelajaran')->where('id', $id)->get();
        }
        return view('admin.rpp.edit', compact('rpp'));
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
        $kd = Kompetensi_dasar::where('id', $id)->first();
        $kd->rencana_pelaksanaan_pembelajaran->delete();
        return response()->json($data = 'berhasil');
    }
}
