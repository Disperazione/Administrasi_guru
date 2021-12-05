<?php

namespace App\Http\Controllers\admin\lembar_kerja;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Bidang_keahlian;
use App\Models\Jurusan;
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
                        if($jurusan->singkatan_jurusan == "RPL"){
                        $singkatan_badge[] .= "<span class='badge badge-pill badge-primary'>$jurusan->singkatan_jurusan</span>";
                        }if($jurusan->singkatan_jurusan == "MM"){
                        $singkatan_badge[] .= "<span class='badge badge-pill badge-success'>$jurusan->singkatan_jurusan</span>";
                        }if($jurusan->singkatan_jurusan == "BC"){
                            $singkatan_badge[] .= "<span class='badge badge-pill badge-secondary'>$jurusan->singkatan_jurusan</span>";
                        }if($jurusan->singkatan_jurusan == "TKJ"){
                            $singkatan_badge[] .= "<span class='badge badge-pill badge-warning'>$jurusan->singkatan_jurusan</span>";
                        }if($jurusan->singkatan_jurusan == "TEI"){
                            $singkatan_badge[] .= "<span class='badge badge-pill badge-light'>$jurusan->singkatan_jurusan</span>";
                        }

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
                    // $button .= '&nbsp';
                    // $button .= '<a href="/admin/Lembar-kerja-2/{Lembar_kerja_2}' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
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

        // if ($request->ajax()) {
        //     // mencari distinct/unique id_bidag_keahlian koompetensi dasar yang punya strategi
        //     $kompetensi = Kompetensi_dasar::select('id_bidang_keahlian')->has('strategi_pembelajaran')->get()->unique();
        //     $id_keahlian = [];
        //     // loop kompetensi lalu ambil bidang keahlian abis itu masukin ke array
        //     foreach ($kompetensi as $key => $value) {
        //         $id_keahlian[] = $value->id_bidang_keahlian;
        //     }
        //     // jika role nya guru
        //     if (Auth::user()->role == 'guru') {
        //         // mencari bidang keahlian yang idnya sama kaya id_bidang keahlian di table bidang kompetensi tadi dan id guru nya == 1
        //         $data = Bidang_keahlian::has('kompetensi_dasar')->whereIn('id',  $id_keahlian)->where('id_guru', auth()->id())->get();
        //     } else {
        //         $data = Bidang_keahlian::has('kompetensi_dasar')->whereIn('id',  $id_keahlian)->get();
        //     }

        //     return datatables()->of($data)
        //         ->addColumn('guru', function ($data) {
        //             return $data->guru->name;
        //         })

        //         ->editColumn('bidang_studi', function ($data) {
        //             return $data->lembar_kerja->Lk_2;
        //         })
        //         ->addColumn('kompetensi_keahlian', function ($data) {
        //             $singkatan_badge = [];
        //             foreach ($data->jurusan as $jurusan) {
        //                 $singkatan_badge[] .= "<span class='badge badge-pill badge-primary'>$jurusan->singkatan_jurusan</span>";
        //             }
        //             if (empty($singkatan_badge)) {
        //                 return 'Jurusan koosng';
        //             }
        //             return implode(' ', $singkatan_badge);
        //         })
        //         ->addColumn('status', function($data){
        //             $jenis = $data->admin_cloud()->where('jenis', 'LK2')->first();
        //             switch ($jenis->status) {
        //                 case 'pending':
        //                     return "<span class='badge badge-pill badge-primary'>$jenis->status</span>";
        //                     break;
        //                 case 'acc':
        //                     $badge = "<span class='badge badge-pill badge-success'>$jenis->status</span>";
        //                     if (!empty($jenis->komentar_cloud)) {
        //                         $badge .= "<a href='' class='btn btn-primary text-white'><i class='fas fa-comments'></i></a>";
        //                     }
        //                     return $badge;
        //                     break;
        //                 case 'tolak':
        //                     $badge = "<span class='badge badge-pill badge-danger'>$jenis->status</span>";
        //                     if (!empty($jenis->komentar_cloud)) {
        //                         $badge .= "<a href='' class='btn btn-primary text-white'><i class='fas fa-comments'></i></a>";
        //                     }
        //                     return  $badge;
        //                     break;
        //                 case 'pending_2':
        //                     $badge = "<span class='badge badge-pill badge-primary'>pending</span>";
        //                         if (!empty($jenis->komentar_cloud)) {
        //                             $badge .= "<a href='' class='btn btn-primary text-white'><i class='fas fa-comments'></i></a>";
        //                         }
        //                     return $badge;
        //                     break;
        //                 case 'kosong':
        //                     return "<span class='badge badge-pill badge-secondary'>$jenis->status</span>";
        //                     break;
        //             }
        //         })
                
          
        //         ->addColumn('action', function ($data) {
        //         $button = '<a href="/admin/lk_2/' . $data->id . '/pdf" class="edit btn btn-danger text-white btn-sm"><i class="fas fa-file-pdf"></i></a>';
        //         $button .= '&nbsp';
        //             $button .= '<a href="/admin/Lembar-kerja-2/{Lembar_kerja_2}' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
        //             $button .= '&nbsp';
        //             $button .= '<a  href="/admin/Lembar-kerja-2/'. $data->id .'/edit" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
        //             $button .= '&nbsp';
        //             $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
        //             return $button;
        //         })
        //         ->rawColumns(['action', 'kompetensi_keahlian','status'])
        //         ->addIndexColumn()->make(true);
        // }
        return view('admin.lembar_kerja_dua.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all();
        $mapel = Bidang_keahlian::where('id_guru', Auth::user()->guru->id)->get();
        $bidang = Bidang_keahlian::get();
        $jurusan = Jurusan::all();
        // dd($mapel,$bidang);
        return view('admin.lembar_kerja_dua.tambah', compact('guru','bidang','mapel','jurusan'));

    }


      // autocompte bidang mapel
      public function option_mapel($id)
      {
          $mapel = Bidang_keahlian::where('id',$id)->first();
          $s_genap = $mapel->kompetensi_dasar()->where('semester','genap')->get();
          $s_ganjil = $mapel->kompetensi_dasar()->where('semester', 'ganjil')->get();
  
          $id_jurusan = [];
          foreach ($mapel->jurusan as $key => $value) {
              $id_jurusan[] .= $value->id; // id dari jurusan;
          }
  
          return response()->json(['mapel' => $mapel, 's_genap'=> $s_genap ,'s_ganjil'=> $s_ganjil, 'id_jurusan' => $id_jurusan]);
      }
      public function option_mapel_edit($id)
      {
          $mapel = Bidang_keahlian::where('id',$id)->first();

          $s_ganjil = Kompetensi_dasar::doesntHave('strategi_pembelajaran')->where('semester','ganjil')->where('id_bidang_keahlian',$id)->get();
          $s_genap = Kompetensi_dasar::doesntHave('strategi_pembelajaran')->where('semester','genap')->where('id_bidang_keahlian',$id)->get();

          

          //   $s_genap = $mapel->kompetensi_dasar()->where('semester','genap')->get();
        //   $s_ganjil = $mapel->kompetensi_dasar()->where('semester', 'ganjil')->get();
  
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
        
        // dd($request);

        $jml_kd = count($request->kd_ganjil) + count($request->kd_genap);
        // dd($jml_kd);        
        $kd = array_merge($request->kd_ganjil,$request->kd_genap);
        // dd($kd[0]);
        $data = $request->all();
        // dd($data);

      

        for ($i=0; $i < $jml_kd ; $i++) { 
            $dataa = array(
                "model_pembelajaran" => $data['modelPembelajaran'][$i],
                "deskripsi_kegiatan" => $data['deskripsiKegiatan'][$i],
                "id_kompetensi_dasar" => $kd[$i],
            );
            // dd($dataa);
             Strategi_pembelajaran::create($dataa);
        }

        for ($i=0; $i < count($request->id_kd); $i++) { 
            // dd($request->metodePembalajaran[$i]);
            $arr_kd[] =  [$request->metodePembalajaran[$i],$request->id_kd[$i]];
                // dd($arr_kd[$i][1]);
            $strategiPembelajaran =   Strategi_pembelajaran::where('id_kompetensi_dasar',$arr_kd[$i][1])->first();
            // dd($strategiPembelajaran->id);


            Metode_pembelajaran::create([
                "metode" => $arr_kd[$i][0] ,
                "id_strategi_pembelajaran" => $strategiPembelajaran->id
            
            ]);
        }
        return redirect()->route('admin.Lembar-kerja-2.index')->with('berhasil','data berhasil di tambahkan');




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
        // dd($id);
        if (Auth::user()->role == 'guru') {
            // menambil bidang keahlian yang sudah di filter di table / datatable ajax yang di atas
            $bidangkeahlian = Bidang_keahlian::has('kompetensi_dasar')->with('kompetensi_dasar')->where([['id_guru', Auth()->id()], ['id', $id]])->first();
            $w = Auth::user()->guru->bidang_keahlian()->first();
            // dd($bidangkeahlian,$w);
            
            // $isi_komptensi_dasar_ganjil = Kompetensi_dasar::has('bidang_keahlian')->where('semester','ganjil')->where('id_bidang_keahlian',$id)->get();
            $isi_komptensi_dasar_ganjil = Kompetensi_dasar::doesntHave('strategi_pembelajaran')->where('semester','ganjil')->where('id_bidang_keahlian',$id)->get();
            $isi_komptensi_dasar_genap = Kompetensi_dasar::doesntHave('strategi_pembelajaran')->where('semester','genap')->where('id_bidang_keahlian',$id)->get();
            // $siswa = Siswa::doesntHave('kelompok_laporan')->doesntHave('data_prakerin')->whereHas('pembekalan_magang', function ($query) { return $query->where('psikotes', '=', 'sudah')->where('soft_skill', '=', 'sudah')->whereNotNull('file_portofolio'); })->get();
            // Strategi_pembelajaran::where('id_kompetensi_dasar',$s_ganjil[$i]->id)->get();
            // dd($isi_komptensi_dasar_genap);
            
            // $isi_komptensi_dasar_genap = Kompetensi_dasar::has('bidang_keahlian')->where('semester','genap')->where('id_bidang_keahlian',$id)->get();
            // dd($isi_komptensi_dasar);
            $kompetensiDasar = Kompetensi_dasar::where('id_bidang_keahlian',$id)->whereHas('strategi_pembelajaran')->get()->toArray();
                // dd($kompetensiDasar);
                foreach ($kompetensiDasar as $kd) {
                    # code...
                    $strategi[] = Strategi_pembelajaran::where('id_kompetensi_dasar',$kd['id'])->first();
                }
                // dd($strategi);
                # code...
            
            for ($i=0; $i < count($strategi); $i++) { 
                $metode[] = metode_pembelajaran::where('id_strategi_pembelajaran',$strategi[$i]['id'])->first();
                # code...
            }
            $jurusan = Jurusan::all();
        // dd($jurusan);
        $s_genap = Kompetensi_dasar::has('strategi_pembelajaran')->where('id_bidang_keahlian',$id)->where('semester','Genap')->get();
        // dd($s_genap);
        $s_ganjil = Kompetensi_dasar::has('strategi_pembelajaran')->where('id_bidang_keahlian',$id)->where('semester', 'Ganjil')->get();
            // dd($s_ganjil);
              // foreach ($s_ganjil as $key ) {
            // dd($key);
            // $strategi =    Strategi_pembelajaran::has('metode_pembelajaran')->where('semester','Ganjil')->get();
            for ($i=0; $i < count($s_ganjil); $i++) { 
                $strategi_ganjil[] =    Strategi_pembelajaran::where('id_kompetensi_dasar',$s_ganjil[$i]->id)->first();
            }
            // dd($strategi_ganjil);
            for ($i=0; $i < count($strategi_ganjil); $i++) { 
                $metode_ganjil[] = Metode_pembelajaran::has('strategi_pembelajaran')->where('id_strategi_pembelajaran',$strategi_ganjil[$i]->id)->get()->toArray();
                # code...
            }
            // dd($metode_ganjil);
            
            for ($i=0; $i < count($s_genap); $i++) { 
                $strategi_genap[] =    Strategi_pembelajaran::where('id_kompetensi_dasar',$s_genap[$i]->id)->first();
            }
            for ($i=0; $i < count($strategi_genap); $i++) { 
                $metode_genap[] = Metode_pembelajaran::has('strategi_pembelajaran')->where('id_strategi_pembelajaran',$strategi_genap[$i]->id)->get()->toArray();
                # code...
            }
        // }
            $arr_jurusan = [];
            foreach ($bidangkeahlian->jurusan as $key => $value) {
    
                $arr_jurusan[] .= $value->id; // id dari jurusan;
            }
            $id_jurusan = collect($arr_jurusan);
            // dd($id_jurusan);
            // foreach ($strategi as $key => $value) {
                
            // }
            // $kd_ganjil = Kompetensi_dasar::where('semester','ganjil')->has('strategi_pembelajaran')->get();
            // $metode_ganjil = Strategi_pembelajaran::where('id_kompetensi_dasar',1)->has('metode_pembelajaran')->get();
            // dd($metode_ganjil);
            // dd($strategiPembelajaran);
           
           

        } else {
            $bidangkeahlian = Bidang_keahlian::has('kompetensi_dasar')->where('id',  $id)->get();
        }
        return view('admin.lembar_kerja_dua.edit', compact('isi_komptensi_dasar_ganjil','isi_komptensi_dasar_genap','strategi_genap','strategi_ganjil','metode_genap','metode_ganjil','s_genap','s_ganjil','bidangkeahlian','bidangkeahlian','kompetensiDasar','metode','id_jurusan','jurusan'));
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
        // dd($request);
        $jml_kd = count($request->kd_ganjil) + count($request->kd_genap);
        // $bidangkeahlian = Bidang_keahlian::has('kompetensi_dasar')->with('kompetensi_dasar')->where([['id_guru', Auth()->id()], ['id', $id]])->first();
        $s_genap = Kompetensi_dasar::has('strategi_pembelajaran')->where('id_bidang_keahlian',$id)->where('semester','Genap')->get()->toArray();
        $s_ganjil = Kompetensi_dasar::has('strategi_pembelajaran')->where('id_bidang_keahlian',$id)->where('semester', 'Ganjil')->get()->toArray();
        $kompetensiDasar = Kompetensi_dasar::where('id_bidang_keahlian',$id)->has('strategi_pembelajaran')->get()->toArray();

        for ($i=0; $i < count($kompetensiDasar); $i++) { 
            Strategi_pembelajaran::where('id_kompetensi_dasar',$kompetensiDasar[$i]['id'])->delete();
        }


        $jml_kd = count($request->kd_ganjil) + count($request->kd_genap);
        // dd($jml_kd);        
        $kd = array_merge($request->kd_ganjil,$request->kd_genap);
        // dd($kd[0]);
        $data = $request->all();
        // dd($data);

      

        for ($i=0; $i < $jml_kd ; $i++) { 
            $dataa = array(
                "model_pembelajaran" => $data['modelPembelajaran'][$i],
                "deskripsi_kegiatan" => $data['deskripsiKegiatan'][$i],
                "id_kompetensi_dasar" => $kd[$i],
            );
            // dd($dataa);
             Strategi_pembelajaran::create($dataa);
        }

        for ($i=0; $i < count($request->id_kd); $i++) { 
            // dd($request->metodePembalajaran[$i]);
            $arr_kd[] =  [$request->metodePembalajaran[$i],$request->id_kd[$i]];
                // dd($arr_kd[$i][1]);
            $strategiPembelajaran =   Strategi_pembelajaran::where('id_kompetensi_dasar',$arr_kd[$i][1])->first();
            // dd($strategiPembelajaran->id);


            Metode_pembelajaran::create([
                "metode" => $arr_kd[$i][0] ,
                "id_strategi_pembelajaran" => $strategiPembelajaran->id
            
            ]);
        }
        return redirect()->route('admin.Lembar-kerja-2.index')->with('berhasil','data berhasil di tambahkan');

        
        // dd($kompetensiDasar);

        

    //     // dd();
    //     if ($jml_kd > count($kompetensiDasar)) { // jika jml_kd nya bertambah atau lebih besar dari yang awal 
    //     //    dd('w');
    //         $kd_baru = array_merge($request->kd_ganjil,$request->kd_genap);
    //         for ($i=0; $i < count($kompetensiDasar); $i++) { 
    //             $kd_lama[] = $kompetensiDasar[$i]['id'];
    //         }
    //        $w = array_diff($kd_baru,$kd_lama);

    //     //    $arr_kd_lama = [];
    //     //    for($i=1;$i< count($w);$i++){
    //     //     $arr_kd_lama[$i-1] .= $w[$i];
    //     //    }
    //     //    dd($arr_kd_lama);
    //     //    dd($kd_baru,$kd_lama,$w);

    //     //    $array = [
    //     //     'old1' => 1,
    //     //     'old2' => 2
    //     // ];
        
    //   for ($l=0; $l < count($w); $l++) { 
    //     $index[] = $l;
    //  }   
    // //  dd($index);
        
    //     $z = array_combine(array_map(function($el) use ($index) {
    //         return $index[$el];
    //     }, array_keys($w)), array_values($w));
    //        dd($z);
    //     // $newarr[$newkey] = $oldarr[$oldkey];
    //     // $oldarr=$newarr;
    //     // unset($newarr);
            
        
      

    //         dd($kd_baru,$kd_lama,$w);
           

    //     }else if($jml_kd < count($kompetensiDasar)){ // jika jml_kd nya berkurang atau kurang dari  yang awal 

    //     }else { // jika jml_kd nya tidak ada yang berubah maka lakukan update pada 
            
    //                  $kompetensiDasar = Kompetensi_dasar::where('id_bidang_keahlian',$id)->whereHas('strategi_pembelajaran')->get()->toArray();
    //                  for ($i=0; $i < count($kompetensiDasar); $i++) { 
    //                      $kd_lama[] = $kompetensiDasar[$i]['id'];
    //                  }
    //                  $kd_baru = array_merge($request->kd_ganjil,$request->kd_genap);
                 
    //                  $comparison = ($kd_lama == $kd_baru);
    //                 //  dd($comparison,$kd_lama,$kd_baru);
                 
    //                 if ($comparison == true) { // jika kd nya sama maka  update strategi dan metode tanpa mengubah id kd nya
    //                          //  dd('benar');
    //                          // dd($request);

    //                          $data = $request->all();
    //                          // dd();
    //                          for ($i=0; $i < count($kd_baru); $i++) { 
    //                              Strategi_pembelajaran::where('id_kompetensi_dasar',$kd_lama[$i])->update([
    //                                  "model_pembelajaran" => $data['modelPembelajaran'][$i],
    //                                  "deskripsi_kegiatan" => $data['deskripsiKegiatan'][$i],
    //                              ]);
                             
    //                          }
    //                          // $kompetensi_dasar = Kompetensi_dasar::has('strategi_pembelajaran')->where('id_bidang_keahlian',$id)->get();
    //                          // dd($kompetensi_dasar);
    //                          for ($i=0; $i < count($kd_lama); $i++) { 
    //                              $strategi[] =    Strategi_pembelajaran::has('metode_pembelajaran')->where('id_kompetensi_dasar',$kd_lama[$i])->first();
    //                          }
    //                          $metode_total =    Strategi_pembelajaran::has('metode_pembelajaran')->where('id_kompetensi_dasar')->get();
    //                          // dd($metode_total);
                         
    //                          for ($x=0; $x < count($strategi); $x++) { 
    //                              $metode[] = Metode_pembelajaran::has('strategi_pembelajaran')->where('id_strategi_pembelajaran',$strategi[$x]->id)->get()->toArray();
    //                          }

    //                          // dd($metode,$data);  
                         
    //                          for ($j=0; $j < count($metode); $j++) { 
    //                              for ($d=0; $d < count($metode[$j]) ; $d++) { 
    //                                  $id_metode[] = $metode[$j][$d]['id'];
    //                              }
    //                          }
                         
    //                          // dd($id_metode);
    //                          for ($z=0; $z < count($id_metode); $z++) { 
    //                              Metode_pembelajaran::where('id',$id_metode[$z])->update([
    //                                  "metode" => $data['metodePembalajaran'][$z],
    //                              ]);
    //                          }
                         
    //                             return redirect()->route('admin.Lembar-kerja-2.index')->with('berhasil','data berhasil di tambahkan');
                         
                        
                    
    //                 }else{
    //                     $data = $request->all();
    //                     // dd($data,$kd_baru);
                        

    //                     for ($i=0; $i < count($kd_baru); $i++) { 
    //                         Strategi_pembelajaran::where('id_kompetensi_dasar',$kd_lama[$i])->update([
    //                             "model_pembelajaran" => $data['modelPembelajaran'][$i],
    //                             "deskripsi_kegiatan" => $data['deskripsiKegiatan'][$i],
    //                             "id_kompetensi_dasar" => $kd_baru[$i],
    //                         ]);

    //                     }
    //                     // $kompetensi_dasar = Kompetensi_dasar::has('strategi_pembelajaran')->where('id_bidang_keahlian',$id)->get();
    //                     // dd($kompetensi_dasar);
    //                     for ($i=0; $i < count($kd_lama); $i++) { 
    //                         $strategi[] =    Strategi_pembelajaran::has('metode_pembelajaran')->where('id_kompetensi_dasar',$kd_baru[$i])->first();
    //                     }
    //                     $metode_total =    Strategi_pembelajaran::has('metode_pembelajaran')->where('id_kompetensi_dasar')->get();
    //                     // dd($strategi);

    //                     for ($x=0; $x < count($strategi); $x++) { 
    //                         $metode[] = Metode_pembelajaran::has('strategi_pembelajaran')->where('id_strategi_pembelajaran',$strategi[$x]->id)->get()->toArray();
    //                     }
                        
    //                     // dd($metode,$data);  

    //                     for ($j=0; $j < count($metode); $j++) { 
    //                         for ($d=0; $d < count($metode[$j]) ; $d++) { 
    //                             $id_metode[] = $metode[$j][$d]['id'];
    //                         }
    //                     }

    //                     // dd($id_metode);
    //                     for ($z=0; $z < count($id_metode); $z++) { 
    //                         Metode_pembelajaran::where('id',$id_metode[$z])->update([
    //                             "metode" => $data['metodePembalajaran'][$z],
    //                         ]);
    //                     }

    //                        return redirect()->route('admin.Lembar-kerja-2.index')->with('berhasil','data berhasil di tambahkan');
                      
    //                 }
                   

    //     }    

        // $kd = array_merge($request->kd_ganjil,$request->kd_genap);
        // dd($kd);
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
        return response()->jsonp($data = 'berhasil');
    }
}
