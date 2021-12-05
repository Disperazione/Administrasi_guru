<?php

namespace App\Http\Controllers\admin\lembar_kerja;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin_cloud;
use App\Models\Bidang_keahlian;
use App\Models\Ipk_kompetensi_dasar;
use App\Models\Jurusan;
use App\Models\Kompetensi_dasar;
use App\Models\Pertemuan_rpp;
use App\Models\Rencana_pelaksanaan_pembelajaran;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;
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
                ->addColumn('mapel', function ($data) {
                    return $data->bidang_keahlian->mapel;
                })
                ->addColumn('status', function ($data) {
                $get_mapel = $data->bidang_keahlian->mapel;
                                        // ini ngambil dari hasmany 1:3 bidang -> cloud
                    $jenis = $data->bidang_keahlian->admin_cloud()->where('jenis', "RPP kd $data->kd_pengetahuan & kd $data->kd_ketrampilan id=$data->id")->first();
                    switch ($jenis->status) {
                        case 'pending':
                            return "<span class='badge badge-pill badge-primary'>$jenis->status</span>";
                            break;
                        case 'acc':
                            $badge = "<span class='badge badge-pill badge-success'>$jenis->status</span>";
                            return $badge;
                            break;
                        case 'tolak':
                            $badge = "<a  href='' class='badge badge-pill badge-danger badge-tolak' data-id=".$jenis->id." data-toggle='modal' data-target='#komen'>$jenis->status</a>";
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
                ->addColumn('guru', function ($data) {
                    return $data->bidang_keahlian->guru->name;
                })
                ->addColumn('kompetensi_keahlian', function ($data) {
                    $singkatan_badge = [];
                    foreach ($data->bidang_keahlian->jurusan as $jurusan) {
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
                ->addColumn('action', function ($data) {
                    $get_mapel = $data->bidang_keahlian->mapel;
                    $jenis =  $data->bidang_keahlian->admin_cloud()->where('jenis', "RPP kd $data->kd_pengetahuan & kd $data->kd_ketrampilan id=$data->id")->first();
                switch ($jenis->status) {
                    case 'pending':
                        $button = '<a type="button" id="upload"   data-id="' . $data->bidang_keahlian->id . '" data-kd="' . $data->id . '"
                        data-tittle="RPP kd '.$data->kd_pengetahuan.' & kd '. $data->kd_ketrampilan.' id='.$data->id.'" class="btn btn-success text-white btn-sm disabled"><i class="fas fa-cloud-upload-alt"></i></i></a>';
                        break;
                    case 'acc':
                        $button = '<a type="button" id="upload"   data-id="' . $data->bidang_keahlian->id . '" data-kd="' . $data->id . '"
                        data-tittle="RPP kd '.$data->kd_pengetahuan.' & kd '. $data-> kd_ketrampilan. ' id=' . $data->id .'" class="btn btn-success text-white btn-sm disabled" ><i class="fas fa-cloud-upload-alt"></i></a>';
                        break;
                    case 'tolak':
                        $button = '<a type="button" id="upload"   data-id="' . $data->bidang_keahlian->id . '" data-kd="' . $data->id . '"
                        data-tittle="RPP kd '.$data->kd_pengetahuan.' & kd '. $data-> kd_ketrampilan.' id='.$data->id.'" class="btn btn-success text-white btn-sm badge-tolak"><i class="fas fa-cloud-upload-alt"></i></a>';
                        break;
                    case 'pending_2':
                        $button = '<a type="button" id="upload"   data-id="' . $data->bidang_keahlian->id . '" data-kd="' . $data->id . '"
                        data-tittle="RPP kd '.$data->kd_pengetahuan.' & kd '. $data-> kd_ketrampilan.' id='.$data->id.'" class="btn btn-success text-white btn-sm disabled" ><i class="fas fa-cloud-upload-alt"></i></a>';
                        break;
                    case 'kosong':
                        $button = '<a type="button" id="upload"   data-id="' . $data->bidang_keahlian->id . '" data-kd="' . $data->id . '"
                        data-tittle="RPP kd '.$data->kd_pengetahuan.' & kd '. $data-> kd_ketrampilan.' id='.$data->id.'" class="btn btn-success text-white btn-sm ml-1 data-toggle="tooltip" data-placement="bottom"><i class="fas fa-cloud-upload-alt"></i></a>';
                        break;
                }




                    $button .= '<a href="/admin/rpp/' . $data->id . '/pdf"   id="' . $data->id . '" class="edit btn btn-danger text-white btn-sm ml-1" data-toggle="tooltip" data-placement="bottom" title="download pdf"><i class="fas fa-file-pdf"></i></a>';
                    // $button .= '&nbsp';
                    // $button .= '<a href="/admin/RPP/{RPP}' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="detail pdf"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/RPP/' . $data->id . '/edit" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->addColumn('updated', function ($data) {
                    $id_bidang = [];
                    return !empty($data->rencana_pelaksanaan_pembelajaran->updated_at) ? $data->rencana_pelaksanaan_pembelajaran->updated_at->Isoformat('D MMMM Y') : 'Belum di update';
                })
                ->rawColumns(['action','status','btn_upload', 'kompetensi_keahlian'])
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

        $bidang = Bidang_keahlian::all();
        $jurusan = Jurusan::all();
        return view('admin.rpp.tambah', ['bidang' => $bidang,'jurusan'=>$jurusan]);
    }

    public function option_mapel($id){
        $bid = Bidang_keahlian::where('id',$id)->with('kompetensi_dasar')->first(); // mencari id bidang yang id = id & yang pertama
        $kd = Kompetensi_dasar::where('id_bidang_keahlian',$bid->id)->doesntHave('rencana_pelaksanaan_pembelajaran')->get(); // mencair kd yang belum punya rpp
        $id_jurusan = []; // membuat array jurusan
        foreach ($bid->jurusan as $key => $value) { // loop bidan yang berelasi dengan jurusan belongstomany / morhpmany
            $id_jurusan[] .= $value->id;
        }

        return response()->json(['bidang'=>$bid,'id_jurusan'=> collect($id_jurusan),'kd'=>$kd]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // masukin id kd ke rpp
        $kd = Kompetensi_dasar::where('id', $request->id_kd_pengethuan)->first(); // nyari kompetensi dasar yang id = id pengetahuan
        $rpp = Rencana_pelaksanaan_pembelajaran::create(['id_kompetensi_dasar'=>$request->id_kd_pengethuan,'alokasi_waktu'=> $kd->jam_pertemuan,'created_at'=>Carbon::now()->format('Y-m-d'), 'updated_at' => null]);
         for($i = 0 ; $i < count($request->pertemuan); $i++){ // loop pertemuan lalu ambil index nya buat di create satu2
            Pertemuan_rpp::create(['id_rencana_pelaksanaan_pembelajaran' => $rpp->id,'pertemuan'=> $request->pertemuan[$i]]); // create pertemuan
        }
         // input ipk
        if (count($request->ipk_ketrampilan) > count($request->ipk_pengetahuan) ) { // jika jumlah ipk ketampilan > ipk pengetahuan
            $count = count($request->ipk_ketrampilan); // jumlah ketrampilam untuk loop array nya
        }else{
            $count = count($request->ipk_pengetahuan); // jik tidak jumlah pengetahuan yang jadi arraynya
        }

        for ($i=0; $i < $count ; $i++) {  // ipk kompetensi dasar

            Ipk_kompetensi_dasar::create([
                'id_kompetensi_dasar' => $request->id_kd_pengethuan ,
                'ipk_kd_pengetahuan' => !empty($request->ipk_pengetahuan[$i]) ? $request->ipk_pengetahuan[$i] : null, // jika ipk_pengetahuan[1] == kosong maka di siinya null
                'ipk_kd_ketrampilan' => !empty($request->ipk_ketrampilan[$i]) ? $request->ipk_ketrampilan[$i] : null,
            ]);
        }
        Admin_cloud::create([ // membuat cloud sattus kosong dengan jenis yang unique
            'id_bidang_keahlian' => $kd->id_bidang_keahlian ,
            'nama' => "RPP",
            'jenis' => "RPP kd $kd->kd_pengetahuan & kd $kd->kd_ketrampilan id=$kd->id",
            'status' => "kosong",
            'path' => '',
            'id_guru' => Auth::user()->guru->id
        ]);
        return redirect()->route('admin.RPP.index')->with('berhasil','Data anda berhasil di tambahkan');
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
        $rpp = Rencana_pelaksanaan_pembelajaran::where('id_kompetensi_dasar',$id)->first(); // mencari rpp yang bersangkutan
        $kompetensi_dasar = Kompetensi_dasar::where('id_bidang_keahlian',$rpp->kompetensi_dasar->bidang_keahlian->id)->WheredoesntHave('rencana_pelaksanaan_pembelajaran',
        function($query)use($rpp){$query->where('id','!=',$rpp->id);})->get(); // mngembil kompetensi dasar yang belongsto dengan bidang keahlian 1:3 / inservest relitaionship
        // dan mencari kd yang tidak mempunyai relasi rpp keluali rpp_id yang sedang di edit
        $bidang_kd = Bidang_keahlian::where('id', $rpp->kompetensi_dasar->id_bidang_keahlian)->first();
        $bidang = Bidang_keahlian::all();
        $jurusan = Jurusan::all();

        // mengambil id_jurusan dari many2many bidang keahlian
        $id_jurusan_keahlian = [];
        foreach ($bidang_kd->jurusan as $value) {
            $id_jurusan_keahlian[] .= $value->id;
        }
        $id_jurusan = collect($id_jurusan_keahlian); // mnengubah array menjadi collection
        return view('admin.rpp.edit', compact('rpp','bidang','jurusan','kompetensi_dasar','bidang_kd','id_jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestknnbhbbhh
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rpp = Rencana_pelaksanaan_pembelajaran::where('id',$id)->first(); // mencari rpp
        $kd = Kompetensi_dasar::where('id', $request->id_kd_pengethuan)->first(); // nyari kompetensi dasar lama yang id = id pengetahuan
        // mencari admin cloud lama
        $old_admin = Admin_cloud::where('jenis', 'RPP kd ' . $rpp->kompetensi_dasar->kd_pengetahuan . ' & kd ' . $rpp->kompetensi_dasar->kd_ketrampilan.' id='.$kd->id)->first();
        // update cloud
        Admin_cloud::where('jenis', 'RPP kd ' . $rpp->kompetensi_dasar->kd_pengetahuan . ' & kd ' . $rpp->kompetensi_dasar->kd_ketrampilan)->update([ // membuat cloud sattus kosong
            'id_bidang_keahlian' => $kd->id_bidang_keahlian,
            'nama' => "RPP",
            'jenis' => "RPP kd $kd->kd_pengetahuan & kd $kd->kd_ketrampilan id=$kd->id",
            'status' => $old_admin->status, // mengambil status dari admin lama
            'path' => $old_admin->path, // pengambil path dari adminn lama
            'id_guru' => Auth::user()->guru->id
        ]);

        Ipk_kompetensi_dasar::where('id_kompetensi_dasar',$rpp->id_kompetensi_dasar)->delete(); // hapus kompeensi dasar yang id kd rpp di tas == id dari kd nya
        $rpp->delete(); // hapus rpp yang sudah di panggil tadi

        // buat baru ngambil kd yang di atas
        $rpp = Rencana_pelaksanaan_pembelajaran::create(['id_kompetensi_dasar' => $request->id_kd_pengethuan, 'alokasi_waktu' => $kd->jam_pertemuan, 'created_at' => Carbon::noe()->format('Y-m-d'),'updated_at'=>Carbon::now()->format('Y-m-d')]);
        for ($i = 0; $i < count($request->pertemuan); $i++) { // loop pertemuan lalu ambil index nya buat di create satu2
            Pertemuan_rpp::create(['id_rencana_pelaksanaan_pembelajaran' => $rpp->id, 'pertemuan' => $request->pertemuan[$i]]); // create pertemuan
        }
        // input ipk
        if (count($request->ipk_ketrampilan) > count($request->ipk_pengetahuan)) { // jika jumlah ipk ketampilan > ipk pengetahuan
            $count = count($request->ipk_ketrampilan); // jumlah ketrampilam untuk loop array nya
        } else {
            $count = count($request->ipk_pengetahuan); // jik tidak jumlah pengetahuan yang jadi arraynya
        }
        for ($i = 0; $i < $count; $i++) {  // ipk kompetensi dasar
            Ipk_kompetensi_dasar::create([
                'id_kompetensi_dasar' => $request->id_kd_pengethuan,
                'ipk_kd_pengetahuan' => !empty($request->ipk_pengetahuan[$i]) ? $request->ipk_pengetahuan[$i] : null, // jika ipk_pengetahuan[1] == kosong maka di siinya null
                'ipk_kd_ketrampilan' => !empty($request->ipk_ketrampilan[$i]) ? $request->ipk_ketrampilan[$i] : null,
            ]);
        }

        return redirect()->route('admin.RPP.index')->with('berhasil','Data anda berhasil di update');
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
        Admin_cloud::where('id_bidang_keahlian',$kd->id_bidang_keahlian)->where('jenis', "RPP kd $kd->kd_pengetahuan & kd $kd->kd_ketrampilan")->delete();
        $kd->rencana_pelaksanaan_pembelajaran->delete();
        return response()->json($data = 'berhasil');
    }
}
