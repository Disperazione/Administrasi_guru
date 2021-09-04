<?php

namespace App\Http\Controllers\admin\lembar_kerja;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin_cloud;
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
                ->addColumn('mapel', function ($data) {
                    return $data->bidang_keahlian->mapel;
                })
                ->addColumn('status', function ($data) {
                                        // ini ngambil dari hasmany 1:3 bidang -> cloud
                    $jenis = $data->bidang_keahlian->admin_cloud()->where('jenis', "RPP kd $data->kd_pengetahuan & kd $data->kd_ketrampilan")->first();
                    switch ($jenis->status) {
                        case 'pending':
                            return "<span class='badge badge-pill badge-primary'>$jenis->status</span>";
                            break;
                        case 'acc':
                            $badge = "<span class='badge badge-pill badge-success'>$jenis->status</span>";
                            if (!empty($jenis->komentar_cloud)) {
                                $badge .= " <a href='' class='btn btn-primary text-white'><i class='fas fa-comments'></i></a>";
                            }
                            return $badge;
                            break;
                        case 'tolak':
                            $badge = "<span class='badge badge-pill badge-danger'>$jenis->status</span>";
                            if (!empty($jenis->komentar_cloud)) {
                                $badge .= " <a href='' class='btn btn-primary text-white'><i class='fas fa-comments'></i></a>";
                            }
                            return  $badge;
                            break;
                        case 'pending_2':
                            $badge = "<span class='badge badge-pill badge-primary'>pending</span>";
                            if (!empty($jenis->komentar_cloud)) {
                                $badge .= " <a href='' class='btn btn-primary text-white'><i class='fas fa-comments'></i></a>";
                            }
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
                        $singkatan_badge[] .= "<span class='badge badge-pill badge-primary'>$jurusan->singkatan_jurusan</span>";
                    }
                    if (empty($singkatan_badge)) {
                        return 'Jurusan koosng';
                    }
                    return implode(' ', $singkatan_badge);
                })
                ->addColumn('action', function ($data) {
                    $jenis =  $data->bidang_keahlian->admin_cloud()->where('jenis', "RPP kd $data->kd_pengetahuan & kd $data->kd_ketrampilan")->first();
                    switch ($jenis->status) {
                        case 'pending':
                            $button = '<a type="button" id="upload"   data-id="' . $data->id . '" data-tittle="RPP kd '.$data->kd_pengetahuan.' & kd '.$data->kd_ketrampilan.' '.$data->mapel.'" class="btn btn-success text-white btn-sm disabled">Sudah di upload</i></a>';
                            break;
                        case 'acc':
                            $button = '<a type="button" id="upload"   data-id="' . $data->id . '" data-tittle="RPP kd ' . $data->kd_pengetahuan . ' & kd ' . $data->kd_ketrampilan.''.$data->mapel.'" class="btn btn-success text-white btn-sm disabled">Sudah di terima</i></a>';
                            break;
                        case 'tolak':
                            $button = '<a type="button" id="upload"   data-id="' . $data->id . '" data-tittle="RPP kd ' . $data->kd_pengetahuan . ' & kd ' . $data->kd_ketrampilan.''.$data->mapel.'" class="btn btn-success text-white btn-sm
                            data-toggle="tooltip" data-placement="bottom" title="Uplod Cloud"><i class="fas fa-cloud-upload-alt"></i></a>';
                            break;
                        case 'pending_2':
                            $button = '<a type="button" id="upload"   data-id="' . $data->id . '" data-tittle="RPP kd ' . $data->kd_pengetahuan . ' & kd ' . $data->kd_ketrampilan.''.$data->mapel.'" class="btn btn-success text-white btn-sm disabled">Sudah di upload</i></a>';
                            break;
                        case 'kosong':
                            $button = '<a type="button" id="upload"   data-id="' . $data->id . '" data-tittle="RPP kd ' . $data->kd_pengetahuan . ' & kd ' . $data->kd_ketrampilan.''.$data->mapel.'" class="btn btn-success text-white btn-sm
                            data-toggle="tooltip" data-placement="bottom" title="Uplod Cloud"><i class="fas fa-cloud-upload-alt"></i></a>';
                            break;
                    }


                    $button .= '<a href="' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-danger text-white btn-sm ml-1"><i class="fas fa-file-pdf"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a href="/admin/RPP/{RPP}' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/target_pembelajaran/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
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
        Admin_cloud::where('id_bidang_keahlian',$kd->id_bidang_keahlian)->where('jenis', "RPP kd $kd->kd_pengetahuan & kd $kd->kd_ketrampilan")->delete();
        $kd->rencana_pelaksanaan_pembelajaran->delete();
        return response()->json($data = 'berhasil');
    }
}
