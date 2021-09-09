<?php

namespace App\Http\Controllers\admin\lembar_kerja;

use App\Http\Controllers\Controller;
use App\Models\Admin_cloud;
use App\Models\Bidang_keahlian;
use App\Models\Indikator_ketercapaian;
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
                ->addColumn('btn_upload', function ($data) {

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
                        $button = '<a type="button" id="upload"   data-id="' . $data->id . '" class="btn btn-success text-white btn-sm" data-toggle="tooltip" data-placement="bottom" title="Uplod"><i class="fas fa-cloud-upload-alt"></i></a>';
                        break;
                    case 'pending_2':
                        $button = '<a type="button" id="upload"   data-id="' . $data->id . '" class="btn btn-success text-white btn-sm disabled" data-toggle="tooltip" data-placement="bottom" title="Uplod"><i class="fas fa-cloud-upload-alt"></i></a>';
                        break;
                    case 'kosong':
                        $button = '<a type="button" id="upload"   data-id="' . $data->id . '" class="btn btn-success text-white btn-sm ml-1" data-toggle="tooltip" data-placement="bottom" title="Uplod"><i class="fas fa-cloud-upload-alt"></i></a>';
                        break;
                }



                    $button .= '<a href="/admin/lk_3/' . $data->id . '/pdf" class="edit btn btn-danger text-white btn-sm ml-1" data-toggle="tooltip" data-placement="bottom" title="download pdf"><i class="fas fa-file-pdf"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a href="/admin/Lembar-kerja-3/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Detail PDF"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/Lembar-kerja-3/' . $data->id . '/edit" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm mt-1"><i class="fas fa-trash"></i></button>';
                    return $button;
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
        return view('admin.lembar_kerja_tiga.tambah');
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
            $indikator = Bidang_keahlian::has('kompetensi_dasar')->where(['id_guru', auth()->id()], ['id', $id])->get();
        } else if (Auth::user()->role == 'ad,om') {
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
