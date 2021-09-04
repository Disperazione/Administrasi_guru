<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;
use App\Models\Guru;
use App\Models\Admin_cloud;
use Carbon\Carbon;

class Cloud_adminController extends Controller
{
    //
    public function cloud_admin()
    {
        $guru = Guru::where('jabatan','guru')->get();
        return view('admin.cloud.index', compact('guru'));
    }

    public function table($id)
    {
        $guru = Guru::find($id);
        return view('admin.cloud.table', compact('guru'));
    }

    public function cloud_ajax($id){
        // $admin = Admin_cloud::where('id_guru',$id)->where('status','!=','tolak')->get();
        $admin = Admin_cloud::where('id_guru', $id)->where('status','!=','kosong')->get();
        return datatables()->of($admin)
            ->addColumn('judul', function ($admin) {
                return $admin->nama;
            })
            ->addColumn('mapel', function ($admin) {
                return $admin->bidang_keahlian->mapel;
            })
            ->addColumn('bidang_studi', function ($admin) {
                return $admin->bidang_keahlian->bidang_studi;
            })
            ->addColumn('kompetensi_keahlian', function ($admin) {
                $singkatan_badge = [];
                foreach ($admin->bidang_keahlian->jurusan as $jurusan) {
                    $singkatan_badge[] .= "<span class='badge badge-pill badge-primary'>$jurusan->singkatan_jurusan</span>";
                }
                if (empty($singkatan_badge)) {
                    return 'Jurusan koosng';
                }
                return implode(' ', $singkatan_badge);
            })
            ->addColumn('status', function ($admin) {
            switch ($admin->status) {
                case 'pending':
                    return "<span class='badge badge-pill badge-primary'>$admin->status</span>";
                    break;
                case 'acc':
                    $badge = "<span class='badge badge-pill badge-success'>$admin->status</span>";
                    if (count($admin->komentar_cloud) > 0) { // jika tidak kosog
                        $badge .= " <a href='/admin/komentar/view/".$admin->id."' class='btn btn-primary text-white'><i class='fas fa-comments'></i></a>";
                    }
                    return $badge;
                    break;
                case 'tolak':
                    $badge = "<span class='badge badge-pill badge-danger'>$admin->status</span>";
                    if (count($admin->komentar_cloud) > 0) {
                        $badge .= " <a href='/admin/komentar/view/".$admin->id."' class='btn btn-primary text-white'><i class='fas fa-comments'></i></a>";
                    }
                    return  $badge;
                    break;
                case 'pending_2':
                    $badge = "<span class='badge badge-pill badge-primary'>pending</span>";
                    if (count($admin->komentar_cloud) > 0) {
                        $badge .= " <a href='/admin/komentar/view/".$admin->id."' class='btn btn-primary text-white'><i class='fas fa-comments'></i></a>";
                    }
                    return $badge;
                    break;
                case 'kosong':
                    return "<span class='badge badge-pill badge-secondary'>$admin->status</span>";
                    break;
            }
            })
            ->addColumn('persejutuan', function($admin){
                $button = '<a href="#" class="btn btn-icon btn-success" id="acc" data-id="' . $admin->id . '"><i class="fas fa-check"></i></a> ';
                $button .= '<a href="/admin/komentar/'.$admin->id.'" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a> ';
                return $button;
            })
            ->addColumn('action', function ($admin) {
                $button = '<a href="/admin/cloud/download/' . $admin->id . '/pdf" class="edit btn btn-danger text-white btn-sm" ><i class="fas fa-file-pdf"></i></a>';
                $button .= '&nbsp';
                $button .= '<a href="/admin/cloud/view/' . $admin->id . '/pdf"   id="' . $admin->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                return $button;
            })

            ->rawColumns(['action', 'kompetensi_keahlian', 'status', 'persejutuan'])
            ->addindexColumn()->make('true');
    }

    public function cloud_acc(Request $request, $id){
        Admin_cloud::where('id',$id)->update(['status'=>'acc','updated_at' => Carbon::now()]);
        return response()->json(['status'=>'berhasil di acc']);
    }

    public function coment($id)
    {
        return view('admin.komen.tambah');
    }
}