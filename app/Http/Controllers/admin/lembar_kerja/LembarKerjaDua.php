<?php

namespace App\Http\Controllers\admin\lembar_kerja;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin_cloud;
use App\Models\Bidang_keahlian;
use App\Models\Kompetensi_dasar;
use App\Models\Guru;
use App\Models\Strategi_pembelajaran;
use App\Models\Metode_pembelajaran;
use Illuminate\Http\Request;

class LembarKerjaDua extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // mencari distinct/unique id_bidag_keahlian koompetensi dasar yang punya strategi
            $kompetensi = Kompetensi_dasar::select('id_bidang_keahlian')->has('strategi_pembelajaran')->get()->unique();
            $id_keahlian = [];
            // loop kompetensi lalu ambil bidang keahlian abis itu masukin ke array
            foreach ($kompetensi as $key => $value) {
                $id_keahlian[] = $value->id_bidang_keahlian;
            }
            // jika role nya guru
            if (Auth::user()->role == 'guru') {
                // mencari bidang keahlian yang idnya sama kaya id_bidang keahlian di table bidang kompetensi tadi dan id guru nya == 1
                $data = Bidang_keahlian::has('kompetensi_dasar')->whereIn('id',  $id_keahlian)->where('id_guru', auth()->id())->get();
            } else {
                $data = Bidang_keahlian::has('kompetensi_dasar')->whereIn('id',  $id_keahlian)->get();
            }

            return datatables()->of($data)
                ->addColumn('guru', function ($data) {
                    return $data->guru->name;
                })
                ->addColumn('status', function ($data) {
                    $jenis = $data->admin_cloud()->where('jenis', 'LK2')->first();
                    switch ($jenis->status) {
                        case 'pending':
                            return "<span class='badge badge-pill badge-primary'>$jenis->status</span>";
                            break;
                        case 'acc':
                            $badge = "<span class='badge badge-pill badge-success'>$jenis->status</span>";
                            return $badge;
                            break;
                        case 'tolak':
                            $badge = "<a  href='' class='badge badge-pill badge-danger badge-tolak' data-id='".$jenis->id."' data-toggle='modal' data-target='#komen'>$jenis->status</a>";
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
                ->editColumn('bidang_studi', function ($data) {
                    return $data->lembar_kerja->Lk_2;
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
                    $jenis = $data->admin_cloud()->where('jenis', 'LK2')->first();
                    switch ($jenis->status) {
                        case 'pending':
                            $button = '<a type="button" id="upload"   data-id="' . $data->id . '" class="btn btn-success text-white btn-sm disabled" data-toggle="tooltip" data-placement="bottom" title="Uplod"><i class="fas fa-cloud-upload-alt"></i></i></a>';
                            break;
                        case 'acc':
                            $button = '<a type="button" id="upload"   data-id="' . $data->id . '" class="btn btn-success text-white btn-sm disabled" ><i class="fas fa-cloud-upload-alt"></i></a>';
                            break;
                        case 'tolak':
                            $button = '<a type="button" id="upload"   data-id="' . $data->id . '" class="btn btn-success text-white btn-sm badge-tolak" data-toggle="tooltip" data-placement="bottom" title="Uplod"><i class="fas fa-cloud-upload-alt"></i></a>';
                            break;
                        case 'pending_2':
                            $button = '<a type="button" id="upload"   data-id="' . $data->id . '" class="btn btn-success text-white btn-sm disabled" data-toggle="tooltip" data-placement="bottom" title="Uplod" ><i class="fas fa-cloud-upload-alt"></i></a>';
                            break;
                        case 'kosong':
                            $button = '<a type="button" id="upload"   data-id="' . $data->id . '" class="btn btn-success text-white btn-sm ml-1" data-toggle="tooltip" data-placement="bottom" title="Uplod"><i class="fas fa-cloud-upload-alt"></i></a>';
                            break;
                    }


                    $button .= '<a href="/admin/lk_2/' . $data->id . '/pdf" class="edit btn btn-danger text-white btn-sm ml-1"><i class="fas fa-file-pdf"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a href="/admin/Lembar-kerja-2/{Lembar_kerja_2}' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/Lembar-kerja-2/' . $data->id . '/edit" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm mt-1"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->addColumn('updated', function ($data) {
                    $id_bidang = [];
                    $kom = $data->kompetensi_dasar()->has('strategi_pembelajaran')->first();
                    return !empty($kom->strategi_pemeblajaran->updated_at) ? $kom->strategi_pemeblajaran->updated_at->Isoformat('D MMMM Y') : 'Belum di update';
                })
                ->rawColumns(['action','kompetensi_keahlian', 'status', 'btn_upload'])
                ->addIndexColumn()->make(true);
        }
        return view('admin.lembar_kerja_dua.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::has('bidang_keahlian')->get();
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
        return view('admin.lembar_kerja_dua.tambah', compact('guru'));
    }


      // autocompte bidang mapel
      public function option_mapel($id)
      {
          // ,engammbil kompetensi dasar belum mempunyai mempunyai lk4 / bahan ajar
          $kompetensi = Kompetensi_dasar::doesntHave('materi_bahan_ajar')->get();
          // arr ( isinya id bidang keahlian )
          $id_keahlian = []; // loop untuk mendapat id bidang keahlian
          foreach ($kompetensi as $key => $value) {
              $id_keahlian[] = $value->id_bidang_keahlian;
          }
          $mapel = Bidang_keahlian::whereIn('id', $id_keahlian)->where('id_mapel', $id)->with('kompetensi_dasar')->get();
          return response()->json(['mapel' => $mapel]);
      }

       // buat option bidang
    public function option_bidang($id)
    {
        $bidang = Bidang_keahlian::where('id', $id)->with('kompetensi_dasar')->first();
        return response()->json(['bidang' => $bidang]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        Kompetensi_dasar::create([
            // 'kd_pengetahuan' => $request
            // 'keterangan_pengetahuan' => $request
            // 'kd_ketrampilan' => $request
            // 'keterangan_ketrampilan' => $request
            // 'materi_inti' => $request
            // 'durasi' => $request
            // 'pertemuan'=> $request
            // 'semester' => $request
            // 'semester_kd' => $request
        ]);
        Strategi_pembelajaran::create([

        ]);


        Metode_pembelajaran::create([

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
        if (Auth::user()->role == 'guru') {
            // menambil bidang keahlian yang sudah di filter di table / datatable ajax yang di atas
            $strategi = Bidang_keahlian::has('kompetensi_dasar')->where(['id_guru', auth()->id()], ['id', $id])->get();
        } else {
            $strategi = Bidang_keahlian::has('kompetensi_dasar')->where('id',  $id)->get();
        }
        return view('admin.lembar_kerja_dua.detail', compact('strategi'));
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
            // menambil bidang keahlian yang sudah di filter di table / datatable ajax yang di atas
            $strategi = Bidang_keahlian::has('kompetensi_dasar')->where(['id_guru', auth()->id()], ['id', $id])->get();
        } else {
            $strategi = Bidang_keahlian::has('kompetensi_dasar')->where('id',  $id)->get();
        }
        return view('admin.lembar_kerja_dua.edit', compact('strategi'));
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
        $kom = Kompetensi_dasar::where('id_bidang_keahlian', $id)->has('strategi_pembelajaran')->get();
        foreach ($kom as $key => $value) {
            $value->strategi_pembelajaran->delete();
        }
        Admin_cloud::where('id_bidang_keahlian', $id)->where('jenis', "LK2")->delete();
        return response()->jsonp($data = 'berhasil');
    }
}
