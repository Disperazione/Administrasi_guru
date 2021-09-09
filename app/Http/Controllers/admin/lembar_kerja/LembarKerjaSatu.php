<?php

namespace App\Http\Controllers\admin\lembar_kerja;

use App\Http\Controllers\Controller;
use App\Models\Admin_cloud;
use App\Models\Bidang_keahlian;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Kd_target_pembelajaran;
use App\Models\Kompetensi_dasar;
use App\Models\Kompetensi_inti;
use App\Models\Lembar_kerja;
use App\Models\Rincian_bukti;
use App\Models\Target_pembelajaran;
use App\Models\Target_pencapaian_kkd;
use App\Models\Target_pencapaian_mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
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
                ->addColumn('status', function($data){
                    $jenis = $data->admin_cloud()->where('jenis', 'LK1')->first();
                    switch ($jenis->status) {
                        case 'pending':
                            return "<span class='badge badge-pill badge-primary'>$jenis->status</span>";
                            break;
                        case 'acc':
                            $badge = "<span class='badge badge-pill badge-success'>$jenis->status</span>";
                            return $badge;
                            break;
                        case 'tolak':
                            $badge = "<a  href='' class='badge badge-pill badge-danger' data-toggle='modal' data-target='#komen'>$jenis->status</a>";
                            return  $badge;
                            break;
                        case 'pending_2':
                            $badge = "<span class='badge badge-pill badge-primary'>pending</span>";
                            return $badge;
                            break;
                        case 'kosong':
                            return "<span class='badge badge-pill badge-secondary'>$jenis->status</span>";
                            break;
                    }
                })
                // ->addColumn('btn_upload', function($data){


                // })
                ->addColumn('kompetensi_keahlian', function($data){
                    $singkatan_badge = [];
                    foreach ($data->jurusan as $jurusan) {
                        $singkatan_badge[] .= "<span class='badge badge-pill badge-primary'>$jurusan->singkatan_jurusan</span>";
                    }
                    if (empty($singkatan_badge)) {
                        return 'Jurusan koosng';
                    }
                    return implode(' ', $singkatan_badge);
                })
                ->editColumn('bidang_studi', function($data){
                    return $data->lembar_kerja->Lk_1;
                })
                ->addColumn('action', function ($data) {
                    $jenis = $data->admin_cloud()->where('jenis', 'LK1')->first();
                switch ($jenis->status) {
                    case 'pending':
                        $button = '<a type="button" id="upload"   data-id="' . $data->id . '" class="btn btn-success text-white btn-sm disabled" data-toggle="tooltip" data-placement="bottom" title="Uplod"><i class="fas fa-cloud-upload-alt"></i></i></a>';
                        break;
                    case 'acc':
                        $button = '<a type="button" id="upload"   data-id="' . $data->id . '" class="btn btn-success text-white btn-sm disabled"  ><i class="fas fa-cloud-upload-alt"></i></a>';
                        break;
                    case 'tolak':
                        $button = '<a type="button" id="upload"   data-id="' . $data->id . '" class="btn btn-success text-white btn-sm" data-toggle="tooltip" data-placement="bottom" title="Uplod"><i class="fas fa-cloud-upload-alt"></i></a>';
                        break;
                    case 'pending_2':
                        $button = '<a type="button" id="upload"   data-id="' . $data->id . '" class="btn btn-success text-white btn-sm disabled" data-toggle="tooltip" data-placement="bottom" title="Uplod" ><i class="fas fa-cloud-upload-alt"></i></a>';
                        break;
                    case 'kosong':
                        $button = '<a type="button" id="upload"   data-id="' . $data->id . '" class="btn btn-success text-white btn-sm ml-1" data-toggle="tooltip" data-placement="bottom" title="Uplod"><i class="fas fa-cloud-upload-alt"></i></a>';
                        break;
                }

                    $button .= '<a href="/admin/lk_1/' . $data->id . '/pdf"   id="' . $data->id . '" class="edit btn btn-danger text-white btn-sm ml-1" data-toggle="tooltip" data-placement="bottom" title="download pdf"><i class="fas fa-file-pdf"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a href="/admin/Lembar-kerja-1/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="detail PDF"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/Lembar-kerja-1/' . $data->id . '/edit" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm mt-1"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['status','action', 'kompetensi_keahlian', 'btn_upload'])
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
        $guru = Guru::all();
        $mapel = Bidang_keahlian::where('id_guru', Auth::user()->guru->id)->doesnthave('target_pembelajaran')->get();
        $bidang = Bidang_keahlian::doesnthave('target_pembelajaran')->get();
        $jurusan = Jurusan::all();
        return view('admin.lembar_kerja_satu.tambah', compact('guru','bidang','mapel','jurusan'));
    }
    // autocomplete mapel mapel
    // public function option_jurusan($id)
    // {
    //     $mapel = Bidang_keahlian::where('id_jurusan',$id)->doesnthave('target_pembelajaran')->get();
    //     return response()->json(['mapel' => $mapel]);
    // }
    // autocompte bidang mapel
    public function option_mapel($id)
    {
        $mapel = Bidang_keahlian::where('id',$id)->doesnthave('target_pembelajaran')->first();
        $s_genap = $mapel->kompetensi_dasar()->where('semester','genap')->get();
        $s_ganjil = $mapel->kompetensi_dasar()->where('semester', 'ganjil')->get();

        $id_jurusan = [];
        foreach ($mapel->jurusan as $key => $value) {
            $id_jurusan[] .= $value->id; // id dari jurusan;
        }

        return response()->json(['mapel' => $mapel, 's_genap'=> $s_genap ,'s_ganjil'=> $s_ganjil, 'id_jurusan' => $id_jurusan]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // target pembelajaran
        $target = Target_pembelajaran::create(['id_bidang_keahlian' => $request->mapel]);
        $bidang = Bidang_keahlian::where('id', $request->mapel)->first();

        if (empty($request->bidang_studi)) {
           $bin = 'TEHNOLOGI INFORMASI DAN KOMUKNIKASI';
        }else{
            $bin = $request->bidang_studi;
        }
        if (empty($bidang->lembar_kerja)) {
            // lembar kerja
            Lembar_kerja::create([
                'Lk_1' => $bin,
                'id_bidang_keahlian' => $request->mapel
            ]);
        }else{
            Lembar_kerja::where('id_bidang_keahlian', $request->mapel)->update(['Lk_1' => $bin]);
        }

        if (empty($request->kd_ganjil)) {
        } else {
            // kompetensi_dasar
            for ($i = 0; $i < count($request->kd_ganjil); $i++) {
                Kd_target_pembelajaran::create([
                    'id_target_pembelajaran' => $target->id,
                    'id_kompetensi_dasar' => $request->kd_ganjil[$i]
                ]);
            }
        }

        if (empty($request->kd_genap)) {
        } else {
            // kompetensi_dasar
            for ($i = 0; $i < count($request->kd_genap); $i++) {
                Kd_target_pembelajaran::create([
                    'id_target_pembelajaran' => $target->id,
                    'id_kompetensi_dasar' => $request->kd_genap[$i]
                ]);
            }
        }

       // pencapaian mapel
        for ($i=0; $i < count($request->target_mapel) ; $i++) {
            Target_pencapaian_mapel::create([
                'id_target_pembelajaran' => $target->id, // ngambil id dari target yang abis di input
                'target' => $request->target_mapel[$i],
                'keterangan' => $request->keterangan_mapel[$i],
            ]);
        }

        // pencapaian kkid
        for ($i = 0; $i < count($request->target_kkid); $i++) {
            Target_pencapaian_kkd::create([
                'id_target_pembelajaran' => $target->id, // ngambil id dari target yang abis di input
                'target' => $request->target_kkid[$i],
                'keterangan' => $request->keterangan_kkid[$i],
            ]);
        }

        // bukti
        for ($i = 0; $i < count($request->bukti); $i++) {
            Rincian_bukti::create([
                'id_target_pembelajaran' => $target->id, // ngambil id dari target yang abis di input
                'rincian_bukti' => $request->bukti[$i],
            ]);
        }

        // bukti
        for ($i = 0; $i < count($request->kompetensi); $i++) {
            Kompetensi_inti::create([
                'id_target_pembelajaran' => $target->id, // ngambil id dari target yang abis di input
                'konpetensi' => $request->kompetensi[$i],
            ]);
        }

        // membuat admin cloud yang isinya kosong
        Admin_cloud::create([
            "nama" => "Lembar-kerja-1",
            "status" => "kosong",
            "jenis" => "LK1",
            "path" => null,
            "id_guru" => Auth::user()->guru->id,
            "id_bidang_keahlian" => $bidang->id
        ]);

        return redirect()->route('admin.Lembar-kerja-1.index')->with('berhasil','data berhasil di tambahkan');
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
            $target = Bidang_keahlian::has('target_pembelajaran')->where([['id_guru', Auth()->id()], ['id', $id]])->first();
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
        $guru = Guru::all();
        $bidang = Bidang_keahlian::doesnthave('target_pembelajaran')->get();
        $target = Bidang_keahlian::has('target_pembelajaran')->with('target_pembelajaran')->where([['id_guru', Auth()->id()], ['id', $id]])->first(); // target untuk nyari bidang yang id = id
        $s_genap = Kompetensi_dasar::has('kd_target_pemebelajaran')->where('semester','Genap')->get();
        $s_ganjil = Kompetensi_dasar::has('kd_target_pemebelajaran')->where('semester', 'Ganjil')->get();

        $jurusan = Jurusan::all();
        $arr_jurusan = [];
        foreach ($target->jurusan as $key => $value) {

            $arr_jurusan[] .= $value->id; // id dari jurusan;
        }
        $id_jurusan = collect($arr_jurusan);
        return view('admin.lembar_kerja_satu.edit', compact('target','guru','bidang','s_genap','s_ganjil', 'id_jurusan','jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function option_mapel_edit($id)
    {
        $mapel = Bidang_keahlian::where('id', $id)->first();
        $s_genap = Kompetensi_dasar::where('id_bidang_keahlian',$id)->where('semester', 'Genap')->get();
        $s_ganjil = Kompetensi_dasar::where('id_bidang_keahlian', $id)->where('semester', 'Ganjil')->get();
        return response()->json(['mapel' => $mapel, 's_genap' => $s_genap, 's_ganjil' => $s_ganjil]);
    }

    public function update(Request $request, $id)
    {
        // update target pemeblajaran
        $setTarget = Target_pembelajaran::where('id_bidang_keahlian',$id)->update(['id_bidang_keahlian'=> $request->mapel]);
        $target = Target_pembelajaran::where('id_bidang_keahlian', $request->mapel)->first();

        // hapus column yang lama
        Target_pencapaian_mapel::where('id_target_pembelajaran',$target->id)->delete();
        Target_pencapaian_kkd::where('id_target_pembelajaran', $target->id)->delete();
        Rincian_bukti::where('id_target_pembelajaran', $target->id)->delete();
        Kompetensi_inti::where('id_target_pembelajaran', $target->id)->delete();
        Kd_target_pembelajaran::where('id_target_pembelajaran', $target->id)->delete();
        // setelah itu menambkahkan column yang batu

        $bidang = Bidang_keahlian::where('id',$request->mapel)->first();

        // jika bidang study nya koosng buat bin yg baru
        if (empty($request->bidang_studi)) {
            $bin = 'TEHNOLOGI INFORMASI DAN KOMUKNIKASI';
        } else {
            $bin = $request->bidang_studi;
        }
        if (empty($bidang->lembar_kerja)) {
            // lembar kerja
            Lembar_kerja::create([
                'Lk_1' => $bin,
                'id_bidang_keahlian' => $request->mapel
            ]);
        } else {
            Lembar_kerja::where('id_bidang_keahlian', $request->mapel)->update(['Lk_1' => $bin]);
        }

        if (empty($request->kd_ganjil)) {
        } else {
            // kompetensi_dasar
            for ($i = 0; $i < count($request->kd_ganjil); $i++) {
                Kd_target_pembelajaran::create([
                    'id_target_pembelajaran' => $target->id,
                    'id_kompetensi_dasar' => $request->kd_ganjil[$i]
                ]);
            }

        }

        if (empty($request->kd_genap)) {
        } else {
            // kompetensi_dasar
            for ($i = 0; $i < count($request->kd_genap); $i++) {
                Kd_target_pembelajaran::create([
                    'id_target_pembelajaran' => $target->id,
                    'id_kompetensi_dasar' => $request->kd_genap[$i]
                ]);
            }
        }

        // pencapaian mapel
        for ($i = 0; $i < count($request->target_mapel); $i++) {
            Target_pencapaian_mapel::create([
                'id_target_pembelajaran' => $target->id, // ngambil id dari target yang abis di input
                'target' => $request->target_mapel[$i],
                'keterangan' => $request->keterangan_mapel[$i],
            ]);
        }

        // pencapaian kkid
        for ($i = 0; $i < count($request->target_kkid); $i++) {
            Target_pencapaian_kkd::create([
                'id_target_pembelajaran' => $target->id, // ngambil id dari target yang abis di input
                'target' => $request->target_kkid[$i],
                'keterangan' => $request->keterangan_kkid[$i],
            ]);
        }

        // bukti
        for ($i = 0; $i < count($request->bukti); $i++) {
            Rincian_bukti::create([
                'id_target_pembelajaran' => $target->id, // ngambil id dari target yang abis di input
                'rincian_bukti' => $request->bukti[$i],
            ]);
        }

        // bukti
        for ($i = 0; $i < count($request->kompetensi); $i++) {
            Kompetensi_inti::create([
                'id_target_pembelajaran' => $target->id, // ngambil id dari target yang abis di input
                'konpetensi' => $request->kompetensi[$i],
            ]);
        }


        return redirect()->route('admin.Lembar-kerja-1.index')->with('berhasil','data berhasil di update');
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
        Admin_cloud::where('id_bidang_keahlian',$id)->where('jenis','LK1')->delete();
        return response()->json($data = 'berhasil');
    }
}
