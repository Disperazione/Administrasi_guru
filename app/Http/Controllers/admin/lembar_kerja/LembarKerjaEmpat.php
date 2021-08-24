<?php

namespace App\Http\Controllers\admin\lembar_kerja;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Bidang_keahlian;
use App\Models\Guru;
use App\Models\Kompetensi_dasar;
use App\Models\Mapel;
use App\Models\Materi_bahan_ajar;
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

                ->addColumn('kompetensi_keahlian', function ($data) {
                    return $data->jurusan->singkatan_jurusan;
                })
                ->addColumn('kompetensi_keahlian', function ($data) {
                    return $data->jurusan->singkatan_jurusan;
                })
                ->editColumn('bidang_studi', function ($data) {
                    return $data->lembar_kerja->Lk_4;
                })
            ->addColumn('action', function ($data) {
                $button = '<a href="/admin/lk_4/' . $data->id . '/pdf" class="edit btn btn-danger text-white btn-sm"><i class="fas fa-file-pdf"></i></a>';
                $button .= '&nbsp';
                    $button .= '<a href="/admin/Lembar-kerja-4/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/Lembar-kerja-4/' . $data->id . '/edit" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
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



    // buat option bidang
    public function option_bidang($id)
    {
        $bidang = Bidang_keahlian::where('id', $id)->with('kompetensi_dasar')->first();
        return response()->json(['bidang' => $bidang]);
    }

    // autocomplete mapel mapel
    public function option_jurusan($id)
    {
        $kompetensi = Kompetensi_dasar::doesntHave('materi_bahan_ajar')->get();
        $id_keahlian = []; // id_keahlian ngambil dari loop kompetensi dasar
        foreach ($kompetensi as $key => $value) {
            $id_keahlian[] = $value->id_bidang_keahlian;
        }
        $mapel = Bidang_keahlian::where('id_jurusan',$id)->whereIn('id',$id_keahlian)->doesnthave('target_pembelajaran')->get(); // buat option mapel
        return response()->json(['mapel' => $mapel]);
    }
    // autocompte bidang mapel
    public function option_mapel($id)
    {
        $mapel = Bidang_keahlian::where('id', $id)->with('kompetensi_dasar')->first(); // buat input + detail mapel
        // $s_genap = $mapel->kompetensi_dasar()->where('semester','genap')->get();
        // $s_ganjil = $mapel->kompetensi_dasar()->where('semester', 'ganjil')->get();
        $kd = $mapel->kompetensi_dasar()->get();
        return response()->json(['mapel' => $mapel,'kd'=>$kd]);
    }

    public function create()
    {
        // mencari distinct/unique id_bidag_keahlian koompetensi dasar yang punya  indikator_ketercapaian
        $guru = Guru::all();
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
        return view('admin.lembar_kerja_empat.tambah', compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // loop id dari kd nya dulu
        for ($i=0; $i < count($request->id_kd) ; $i++) {
            Materi_bahan_ajar::create([
                'modul' => $request->modul[$i],
                'vidio_pembelajaran' => $request->vidio_pel[$i],
                'deskripsi_bahan_ajar' => $request->deskripsi_bahan[$i],
                'keterangan' => $request->keterangan[$i],
                'id_kompetensi_dasar' => $request->id_kd[$i],
            ]);
        }
        return redirect()->route('admin.Lembar-kerja-4.index')->with('berhasil','Data berhasil di tambahkan');
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
    public function option_mapel_edit($id)
    {

        $mapel = Bidang_keahlian::where('id', $id)->with('kompetensi_dasar')->first();
        $kd = Kompetensi_dasar::doesntHave('materi_bahan_ajar')->where('id_bidang_keahlian',$id)->get();
        return response()->json(['mapel' => $mapel,'kd'=>$kd]);
    }

    public function edit($id)
    {
        $guru = Guru::has('bidang_keahlian')->get(); // ini loop guru
        $bidang_main = Bidang_keahlian::where('id',$id)->first(); // mencari bidang keahlian main
        $kompetensi = Kompetensi_dasar::has('materi_bahan_ajar')->get();

        $bidang_table = Kompetensi_dasar::has('materi_bahan_ajar')->where('id_bidang_keahlian',$id)->get(); // mencari bidang keahlian table
        return view('admin.lembar_kerja_empat.edit', compact('guru', 'bidang_main', 'bidang_table'));
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
        $kd = Kompetensi_dasar::where('id_bidang_keahlian', $id)->has('materi_bahan_ajar')->get();
        foreach ($kd as $key => $value) {
            $value->materi_bahan_ajar->delete(); // hapus materi bahan ajar yang lama
        }

        if (empty($request->id_kd)) {
            # code...
        }else{
            for ($i = 0; $i < count($request->id_kd); $i++) {
                Materi_bahan_ajar::create([ // buat yang baru
                    'modul' => $request->modul[$i],
                    'vidio_pembelajaran' => $request->vidio_pel[$i],
                    'deskripsi_bahan_ajar' => $request->deskripsi_bahan[$i],
                    'keterangan' => $request->keterangan[$i],
                    'id_kompetensi_dasar' => $request->id_kd[$i],
                ]);
            }
        }

        return redirect()->route('admin.Lembar-kerja-4.index')->with('berhasil', 'Data berhasil di update');
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
            $value->materi_bahan_ajar->delete();
        }
        return response()->json($data = 'berhasil');
    }
}
