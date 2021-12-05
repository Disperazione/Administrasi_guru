<?php

namespace App\Http\Controllers\admin\lembar_kerja;

use App\Http\Controllers\Controller;
use App\Models\Admin_cloud;
use App\Models\Bidang_keahlian;
use App\Models\Indikator_ketercapaian;
use App\Models\Alat_bahan;
use App\Models\Sumber_belajar;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Kompetensi_dasar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LembarKerjaTiga extends Controller
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
            $kompetensi = Kompetensi_dasar::select('id_bidang_keahlian')->has('indikator_ketercapaian')->get()->unique();
            $id_keahlian = [];
            foreach ($kompetensi as $key => $value) {
                $id_keahlian[] = $value->id_bidang_keahlian;
            }
            if (Auth::user()->role == 'guru') {
                $data = Bidang_keahlian::has('kompetensi_dasar')->whereIn('id',  $id_keahlian)->where('id_guru', auth()->id())->get();
            } else if (Auth::user()->role == 'admin') {
                $data = Bidang_keahlian::has('kompetensi_dasar')->whereIn('id',  $id_keahlian)->get();
            }

            return datatables()->of($data)
                ->addColumn('guru', function ($data) {
                    return $data->guru->name;
                })
                ->addColumn('status', function ($data) {
                    $jenis = $data->admin_cloud()->where('jenis', 'LK3')->first();
                    switch ($jenis->status) {
                        case 'pending':
                            return "<span class='badge badge-pill badge-primary'>$jenis->status</span>";
                            break;
                        case 'acc':
                            $badge = "<span class='badge badge-pill badge-success'>$jenis->status</span>";
                            return $badge;
                            break;
                        case 'tolak':
                            $badge = "<a  href='' class='badge badge-pill badge-danger badge-tolak' data-toggle='modal' data-id='" . $jenis->id . "' data-target='#komen'>$jenis->status</a>";
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
                ->addColumn('btn_upload', function ($data) {

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
                    return $data->lembar_kerja->Lk_3;
                })
                ->addColumn('action', function ($data) {
                    $jenis = $data->admin_cloud()->where('jenis', 'LK3')->first();
                switch ($jenis->status) {
                    case 'pending':
                        $button = '<a type="button" id="upload"   data-id="' . $data->id . '" class="btn btn-success text-white btn-sm disabled" data-toggle="tooltip" data-placement="bottom" title="Uplod"><i class="fas fa-cloud-upload-alt"></i></i></a>';
                        break;
                    case 'acc':
                        $button = '<a type="button" id="upload"   data-id="' . $data->id . '" class="btn btn-success text-white btn-sm disabled" ><i class="fas fa-cloud-upload-alt"></i></a>';
                        break;
                    case 'tolak':
                        $button = '<a type="button" id="upload"   class="btn btn-success text-white btn-sm" data-toggle="tooltip" data-placement="bottom"  data-id="' . $data->id . '" title="Uplod"><i class="fas fa-cloud-upload-alt"></i></a>';
                        break;
                    case 'pending_2':
                        $button = '<a type="button" id="upload"   data-id="' . $data->id . '" class="btn btn-success text-white btn-sm disabled" data-toggle="tooltip" data-placement="bottom" title="Uplod"><i class="fas fa-cloud-upload-alt"></i></a>';
                        break;
                    case 'kosong':
                        $button = '<a type="button" id="upload"   data-id="' . $data->id . '" class="btn btn-success text-white btn-sm ml-1" data-toggle="tooltip" data-placement="bottom" title="Uplod"><i class="fas fa-cloud-upload-alt"></i></a>';
                        break;
                }



                    $button .= '<a href="/admin/lk_3/' . $data->id . '/pdf" class="edit btn btn-danger text-white btn-sm ml-1" data-toggle="tooltip" data-placement="bottom" title="download pdf"><i class="fas fa-file-pdf"></i></a>';
                    // $button .= '&nbsp';
                    // $button .= '<a href="/admin/Lembar-kerja-3/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Detail PDF"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/Lembar-kerja-3/' . $data->id . '/edit" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm mt-1"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->addColumn('updated', function ($data) {
                    $id_bidang = [];
                    $kom = $data->kompetensi_dasar()->has('indikator_ketercapaian')->first();
                    return !empty($kom->indikator_ketercapaian->updated_at) ? $kom->indikator_ketercapaian->updated_at->Isoformat('D MMMM Y') : 'Belum di update';
                })
                ->rawColumns(['action', 'kompetensi_keahlian','status','btn_upload'])
                ->addIndexColumn()->make(true);
        }
        return view('admin.lembar_kerja_tiga.index');
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
        // return view('admin.lembar_kerja_dua.tambah', compact('guru','bidang','mapel','jurusan'));
        return view('admin.lembar_kerja_tiga.tambah', compact('guru','bidang','mapel','jurusan'));
    }

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        // dd($jml_kd);        
        
        // dd($kd,$request);
        $jml_kd = count($request->kd_ganjil) + count($request->kd_genap);
        
        $kd = array_merge($request->kd_ganjil,$request->kd_genap);
        
        $data = $request->all();

        $bidang = Bidang_keahlian::where('id', $request->mapel)->first();
        // dd($bidang);
        
        // $AlatBahan = array_merge($data['AlatBahanGanjil'],$data['AlatBahanGenap']);
        // $id_AlatBahan = array_merge($data['id_AlatBahanGanjil'],$data['id_AlatBahanGenap']);
        // dd($data);

        // dd($kd);


  

            for ($i=0; $i < $jml_kd; $i++) { 
                Indikator_ketercapaian::create([
                    'bukti'  => $data['bukti'][$i], 
                    'ketuntasan' => $data['ketuntasan'][$i],
                    'jumlah_pertemuan' => $data['jumlah_pertemuan'][$i],
                    'keterangan' => $data['keterangan'][$i], 
                    'id_kompetensi_dasar' => $kd[$i] 

                ]);
                
            }



            //  buat perulangan untuk di buatkan array nya dan di satukan  id_kd dan AlatBahanGanjil
            for ($z=0; $z < count($data['AlatBahanGanjil']); $z++) { 
                $AlatBahanGanjil[] = [$data['AlatBahanGanjil'][$z],$data['id_AlatBahanGanjil'][$z]];
            }
            //  buat perulangan untuk di buatkan array nya dan di satukan  id_kd dan AlatBahanGenap
            for ($x=0; $x < count($data['AlatBahanGenap']); $x++) { 
                $AlatBahanGenap[] = [$data['AlatBahanGenap'][$x],$data['id_AlatBahanGenap'][$x]];
            }

            //lalu satukan jadi AlatBahan dan masing masing memegang id kd nya
            $AlatBahan = array_merge($AlatBahanGanjil,$AlatBahanGenap);

            // for ($c=0; $c < count($AlatBahan); $c++) { 
            //     $id_kdAlatBahan[] = $AlatBahan[$c][1];
            // }

            // $id_kdAlatBahan_unique = array_unique($id_kdAlatBahan);

            // foreach ($id_kdAlatBahan_unique as $key ) {
            //    $id_kdAlatBahan_uniqueSort[] = $key;
            // }
         
            // dd($id_kdAlatBahan_uniqueSort,$AlatBahan);

            // dd($id_kdAlatBahan);
    
            // dd($data,$AlatBahan,$id_kdAlatBahan_uniqueSort);
                
            for ($i=0; $i < count($AlatBahan); $i++) { 
                $id_indikator[] = Indikator_ketercapaian::where('id_kompetensi_dasar',$AlatBahan[$i][1])->first()->id;

            }   
            // dd($AlatBahan,$id_indikator);

            for ($ab=0; $ab < count($AlatBahan); $ab++) { 
                // dd($AlatBahan[$ab][0]);
                Alat_bahan::create([
                    'isi' => $AlatBahan[$ab][0],
                    'id_indikator_ketercapaian' => $id_indikator[$ab]
                ]);
            }
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------

             //  buat perulangan untuk di buatkan array nya dan di satukan  id_kd dan AlatBahanGanjil
             for ($z=0; $z < count($data['SumberBelajarGanjil']); $z++) { 
                $SumberBelajarGanjil[] = [$data['SumberBelajarGanjil'][$z],$data['id_SumberBelajarGanjil'][$z]];
            }
            //  buat perulangan untuk di buatkan array nya dan di satukan  id_kd dan SumberBelajarGenap
            for ($x=0; $x < count($data['SumberBelajarGenap']); $x++) { 
                $SumberBelajarGenap[] = [$data['SumberBelajarGenap'][$x],$data['id_SumberBelajarGenap'][$x]];
            }

            //lalu satukan jadi SumberBelajar dan masing masing memegang id kd nya
            $SumberBelajar = array_merge($SumberBelajarGanjil,$SumberBelajarGenap);

            for ($c=0; $c < count($SumberBelajar); $c++) { 
                $id_kdSumberBelajar[] = $SumberBelajar[$c][1];
            }

            $id_kdSumberBelajar_unique = array_unique($id_kdSumberBelajar);

            foreach ($id_kdSumberBelajar_unique as $key ) {
               $id_kdSumberBelajar_uniqueSort[] = $key;
            }
         
            // dd($id_kdSumberBelajar_uniqueSort,$SumberBelajar);

            // dd($id_kdSumberBelajar);
    
            // dd($data,$SumberBelajar,$id_kdSumberBelajar_uniqueSort);
                
            for ($i=0; $i < count($SumberBelajar); $i++) { 
                $id_indikator[] = Indikator_ketercapaian::where('id_kompetensi_dasar',$SumberBelajar[$i][1])->first()->id;

            }

            for ($ab=0; $ab < count($SumberBelajar); $ab++) { 
                Sumber_belajar::create([
                    'isi' => $SumberBelajar[$ab][0],
                    'id_indikator_ketercapaian' => $id_indikator[$ab]

                ]);
            }


            Admin_cloud::create([
                "nama" => "Lembar-kerja-3",
                "jenis" => "LK3",
                'status' => "kosong",
                'path' => '',
                "id_guru" => Auth::user()->guru->id,
                "id_bidang_keahlian" => $bidang->id
            ]);

        return redirect()->route('admin.Lembar-kerja-3.index')->with('berhasil','data berhasil di tambahkan');




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
            $indikator = Bidang_keahlian::has('kompetensi_dasar')->where(['id_guru', auth()->id()], ['id', $id])->get();
        } else if (Auth::user()->role == 'admin') {
            $indikator = Bidang_keahlian::has('kompetensi_dasar')->where('id', $id)->get();
        }
        return view('admin.lembar_kerja_tiga.detail', compact('indikator'));
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
            // dd($id);            

            $bidangkeahlian = Bidang_keahlian::has('kompetensi_dasar')->with('indikator_ketercapaian')->where([['id_guru', Auth()->id()], ['id', $id]])->first();
            // $w = Auth::user()->guru->bidang_keahlian()->first();
            dd($bidangkeahlian);
            
            // $isi_komptensi_dasar_ganjil = Kompetensi_dasar::has('bidang_keahlian')->where('semester','ganjil')->where('id_bidang_keahlian',$id)->get();
            $isi_komptensi_dasar_ganjil = Kompetensi_dasar::doesntHave('strategi_pembelajaran')->where('semester','ganjil')->where('id_bidang_keahlian',$id)->get();
            $isi_komptensi_dasar_genap = Kompetensi_dasar::doesntHave('strategi_pembelajaran')->where('semester','genap')->where('id_bidang_keahlian',$id)->get();

        
        } else if (Auth::user()->role == 'admin') {
            $indikator = Bidang_keahlian::has('kompetensi_dasar')->where('id', $id)->get();

        }
        return view('admin.lembar_kerja_tiga.detail', compact('indikator'));
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
        $kd = Kompetensi_dasar::where('id_bidang_keahlian', $id)->has('indikator_ketercapaian')->get();
        foreach ($kd as $key => $value) {
            $value->indikator_ketercapaian->delete();
        }
        Admin_cloud::where('id_bidang_keahlian', $id)->where('jenis', "LK3")->delete();
        return response()->json($data = 'berhasil');
    }
}
