<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
	use App\Models\Bidang_keahlian;
use App\Models\Kompetensi_dasar;
use App\Models\Guru;
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
        // dd(
        //     $data = Bidang_keahlian::has('kompetensi_dasar')->get()

        // );
        if ($request->ajax()) {
            if (Auth::user()->role == 'guru') {
                $data = Bidang_keahlian::where('id_guru',Auth::user()->id)->has('kompetensi_dasar')->get();
            }else if(Auth::user()->role == 'admin'){
                $data = Bidang_keahlian::has('kompetensi_dasar')->get();
            }

            return datatables()->of($data)
                ->addColumn('guru', function ($data) {
                    return $data->guru->name;
                })
                ->addColumn('kompetensi_keahlian', function ($data) {
                    $singkatan_badge = [];
                    foreach ($data->jurusan as $jurusan) {
                        $singkatan_badge[] .= "<span class='badge badge-pill badge-primary'>$jurusan->singkatan_jurusan</span>";
                    }
                    if (empty($singkatan_badge)) {
                        return 'Jurusan koosng';
                    }
                    return implode(' ', $singkatan_badge);
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . $data->id . '"   id="' . $data->id . '" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/guru/' . $data->id . '/edit" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action', 'kompetensi_keahlian'])
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
        $guru = Guru::all();
        // dd($guru);
        return view('admin.kompetensi_dasar.tambah',compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);

      $bidang_keahlian =  Bidang_keahlian::create([
            'bidang_studi' =>  $request->bidang_studi,
            'kompetensi_keahlian' =>  $request->kompetensi_keahlian,
            'kelas' =>  $request->kelas,
            'jam_pelajaran' =>  $request->jam_pelajaran,
            'id_mapel' =>  $request->id_mapel,
            'total_waktu_jam_pelajaran' =>  $request->total_waktu_jam_pelajaran,
            'id_guru' =>  $request->id_guru,
        ]);

        $data = $request->all();

        foreach ($data['kd_pengetahuan'] as $key => $value) {
                dd($key);
            $dataStore = array(
                'kd_pengetahuan' =>  $data['pengetahuan'],
                // 'keterangan_pengetahuan' =>
                // 'kd_ketrampilan' =>
                // 'keterangan_ketrampilan' =>
            );

        }


        Kompetensi_dasar::create([

        ]);


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
