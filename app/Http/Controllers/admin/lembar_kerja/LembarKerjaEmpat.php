<?php

namespace App\Http\Controllers\admin\lembar_kerja;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Bidang_keahlian;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Kompetensi_dasar;
use App\Models\Lembar_kerja;
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
                $singkatan_badge = [];
                foreach ($data->jurusan as $jurusan) {
                    $singkatan_badge[] .= "<span class='badge badge-pill badge-primary'>$jurusan->singkatan_jurusan</span>";
                }
                if (empty($singkatan_badge)) {
                    return 'Jurusan koosng';
                }
                return implode(' ', $singkatan_badge);
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
                ->rawColumns(['action', 'kompetensi_keahlian'])
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
        $id_jurusan = [];
        foreach ($mapel->jurusan as $key => $value) {
            $id_jurusan[] .= $value->id;
        }
        return response()->json(['mapel' => $mapel,'kd'=>$kd,'id_jurusan'=>$id_jurusan]);
    }

    public function create()
    {
        // mencari distinct/unique id_bidag_keahlian koompetensi dasar yang punya  indikator_ketercapaian
        $guru = Guru::all();
        // nyari kompetensi yang mencari bidang keahlian
        $d_bid_kel_has = Kompetensi_dasar::select('id_bidang_keahlian')->has('materi_bahan_ajar')->get();

        $id_kom2 = []; // lalu loop collection ambil bidang keahlian
        foreach ($d_bid_kel_has as $key => $value) {
            $id_kom2[] .= $value->id_bidang_keahlian;
        }
        // nyari kompetensi yanng tidak mempunyai bidang keahlian
        $kompetensi = Kompetensi_dasar::select('id_bidang_keahlian')->whereNotIn('id_bidang_keahlian', $id_kom2)->doesntHave('materi_bahan_ajar')->get()->unique();
        $jurusan = Jurusan::all();

        $id_keahlian = []; // mengambil id_bidang keahlian dari kompetesi dasar
        foreach ($kompetensi as $key => $value) {
            $id_keahlian[] = $value->id_bidang_keahlian;
        }

        $data = Bidang_keahlian::has('kompetensi_dasar')->whereIn('id',  $id_keahlian)->where('id_guru', auth()->id())->get();

        return view('admin.lembar_kerja_empat.tambah', compact('guru','jurusan','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bidang = Bidang_keahlian::where('id',$request->mapel)->first();
        if (empty($bidang->lembar_kerja)) {
            // lembar kerja
            Lembar_kerja::create([
                'Lk_4' => $request->lembar_kerja,
                'id_bidang_keahlian' => $request->mapel
            ]);
        } else {
            Lembar_kerja::where('id_bidang_keahlian', $request->mapel)->update(['Lk_4' => $request->lembar_kerja]);
        }

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
        $jurusan = Jurusan::all();
        if (Auth::user()->role == 'guru') {
            $materi = Bidang_keahlian::has('kompetensi_dasar')->where(['id_guru', auth()->id()], ['id', $id])->get();
        } else if (Auth::user()->role == 'admin') {
            $materi = Bidang_keahlian::has('kompetensi_dasar')->where('id',  $id)->get();
        }
        return view('admin.lembar_kerja_empat.detail', compact('materi','jurusan'));
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
        $jurusan = Jurusan::all();
        $guru = Guru::has('bidang_keahlian')->get(); // ini loop guru
        $bidang_main = Bidang_keahlian::where('id',$id)->first(); // mencari bidang keahlian main
        $kompetensi = Kompetensi_dasar::has('materi_bahan_ajar')->get();

        $bidang_table = Kompetensi_dasar::has('materi_bahan_ajar')->where('id_bidang_keahlian',$id)->get(); // mencari bidang keahlian table
        $arr_jurusan = [];
        foreach ($bidang_main->jurusan as $key => $value) {

            $arr_jurusan[] .= $value->id; // id dari jurusan;
        }
        $id_jurusan = collect($arr_jurusan);
        return view('admin.lembar_kerja_empat.edit', compact('guru', 'bidang_main', 'bidang_table','jurusan','id_jurusan'));
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
        // lembar kerja
        $bidang = Bidang_keahlian::where('id', $id)->first();
        if (empty($bidang->lembar_kerja)) {
            // lembar kerja
            Lembar_kerja::create([
                'Lk_4' => $request->lembar_kerja,
                'id_bidang_keahlian' => $id
            ]);
        } else {
            Lembar_kerja::where('id_bidang_keahlian', $id)->update(['Lk_4' => $request->lembar_kerja]);
        }

        /// membuat baru setelah di apus
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
        $kd = Kompetensi_dasar::where('id_bidang_keahlian', $id)->has('materi_bahan_ajar')->get();
        foreach ($kd as $key => $value) {
            $value->materi_bahan_ajar->delete();
        }
        return response()->json($data = 'berhasil');
    }
}
