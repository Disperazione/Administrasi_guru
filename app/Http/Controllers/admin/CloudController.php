<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin_cloud;
use App\Models\Bidang_keahlian;
use App\Models\Kompetensi_dasar;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Rencana_pelaksanaan_pembelajaran;

class CloudController extends Controller
{
    public function upload(Request $request)
    {
        $bid = Bidang_keahlian::has('target_pembelajaran')->where('id', $request->id_bidang)->first();

        if ($request->jenis == "LK1") {
            $url = "/pdf/$request->name $bid->mapel " . time() . ".pdf";
            $target = Bidang_keahlian::has('target_pembelajaran')->where('id', $request->id_bidang)->first();
            // nyari kompetensi dasar yang semesternya ganjil & bidnag keahlian nya id  = $id
            $s_ganjil = Kompetensi_dasar::where([['semester', 'ganjil'], ['id_bidang_keahlian', $request->id_bidang]])->has('kd_target_pemebelajaran')->get();
            $s_genap = Kompetensi_dasar::where([['semester', 'genap'], ['id_bidang_keahlian', $request->id_bidang]])->has('kd_target_pemebelajaran')->get();
            $id_jurusan = [];
            foreach ($target->jurusan as $key => $value) {
                $id_jurusan[] .= $value->singkatan_jurusan;
            }
            $jurusan =  implode(', ', $id_jurusan);
            $pdf = PDF::loadView('export.PDF.lk_1', compact('target', 's_ganjil', 's_genap', 'jurusan'));
            Storage::put($url,  $pdf->output("LK.01 Target Pembelajaran.PDF"));

        }else if($request->jenis == "LK2"){
            $url = "/pdf/$request->name $bid->mapel " . time() . ".pdf";
            $target = Bidang_keahlian::has('target_pembelajaran')->where('id', $request->id_bidang)->first();
            // nyari kompetensi dasar yang semesternya ganjil & bidnag keahlian nya id  = $id
            $s_ganjil = Kompetensi_dasar::where([['semester', 'ganjil'], ['id_bidang_keahlian', $request->id_bidang]])->has('strategi_pembelajaran')->get();
            $s_genap = Kompetensi_dasar::where([['semester', 'genap'], ['id_bidang_keahlian', $request->id_bidang]])->has('strategi_pembelajaran')->get();
            $id_jurusan = [];
            foreach ($target->jurusan as $key => $value) {
                $id_jurusan[] .= $value->singkatan_jurusan;
            }
            $jurusan =  implode(', ', $id_jurusan);
            $pdf = PDF::loadView('export.PDF.lk_2', compact('target', 's_ganjil', 's_genap', 'jurusan'));
            Storage::put($url,  $pdf->output("LK.01 Target Pembelajaran.PDF"));
            // tempat download lk 2 sepeti di atas
        } else if ($request->jenis == "LK3") {
            $url = "/pdf/$request->name $bid->mapel " . time() . ".pdf";
            $target = Bidang_keahlian::has('target_pembelajaran')->where('id', $request->id_bidang)->first();
            // nyari kompetensi dasar yang semesternya ganjil & bidnag keahlian nya id  = $id
            $s_ganjil = Kompetensi_dasar::where([['semester','ganjil'],['id_bidang_keahlian',$request->id_bidang]])->has('indikator_ketercapaian')->get();
            $s_genap = Kompetensi_dasar::where([['semester', 'genap'],['id_bidang_keahlian',$request->id_bidang]])->has('indikator_ketercapaian')->get();
            $id_jurusan = [];
            foreach ($target->jurusan as $key => $value) {
                $id_jurusan[] .= $value->singkatan_jurusan;
            }
            $jurusan =  implode(', ', $id_jurusan);
            $pdf = PDF::loadView('export.PDF.lk_3', compact('target','s_ganjil','s_genap','jurusan'));
            Storage::put($url,  $pdf->output("LK.01 Target Pembelajaran.PDF"));
            // ini buat lk 3
        } else if ($request->jenis == "LK4") {
            $url = "/pdf/$request->name $bid->mapel " . time() . ".pdf";
            $target = Bidang_keahlian::has('target_pembelajaran')->where('id', $request->id_bidang)->first();
            $s_ganjil = Kompetensi_dasar::where([['semester', 'ganjil'], ['id_bidang_keahlian', $target->id]])->has('materi_bahan_ajar')->get();
            $s_genap = Kompetensi_dasar::where([['semester', 'genap'], ['id_bidang_keahlian', $target->id]])->has('materi_bahan_ajar')->get();
            $m_bahan_ajar = Kompetensi_dasar::where('id_bidang_keahlian', $target->id)->has('materi_bahan_ajar')->get();
            $id_jurusan = [];
            foreach ($target->jurusan as $key => $value) {
                $id_jurusan[] .= $value->singkatan_jurusan;
            }
            $jurusan =  implode(', ', $id_jurusan);
            $pdf = PDF::loadView('export.PDF.lk_4', compact('target', 's_ganjil', 's_genap', 'm_bahan_ajar', 'jurusan'));
            Storage::put($url, $pdf->output('LK.04 Materi Bahan Ajar'));
        }else {
            $url = "/pdf/$request->jenis " . time() . ".pdf";
            $kompetensi_dasar = kompetensi_dasar::where('id',$request->id_kd)->first();
            $rpp = Rencana_pelaksanaan_pembelajaran::where('id_kompetensi_dasar',$request->id_kd)->first();
            $pdf = PDF::loadView('export.PDF.rpp', compact('rpp','kompetensi_dasar'));
            Storage::put($url, $pdf->output('RPP'));
        }
        // mencari cloud yaung sudah tersedia
        $admin = Admin_cloud::where('id_bidang_keahlian', $request->id_bidang)->where('jenis', $request->jenis)->first();
        if (!empty($admin)) { // jika sudah ada / tidak kosong
            if ($admin->status == "tolak") {
                $admin->update([ // update
                    "nama" => $request->name,
                    "status" => 'pending_2',
                    "jenis" => $request->jenis,
                    "path" => $url,
                    "id_guru" => Auth::user()->guru->id,
                ]);
            }else{
                $admin->update([ // update
                    "nama" => $request->name,
                    "status" => 'pending',
                    "jenis" => $request->jenis,
                    "path" => $url,
                    "id_guru" => Auth::user()->guru->id,
                ]);
            }
        }else{ // jika tidak membuat baru
            Admin_cloud::create([
                "nama" => $request->name,
                "jenis" => $request->jenis,
                "status" => 'pending',
                "path" => $url,
                "id_guru" => Auth::user()->guru->id,
                'id_bidang_keahlian' => $request->id_bidang
            ]);
        }
        return response()->json(['data' => 'berhasil']);
    }

    public function dashboard_view()
    {
        if (Auth::user()->role == 'admin') {
                $admin = Admin_cloud::where('status', '!=', 'kosong')->where('updated_at', '>', '1')->orderBy('updated_at', 'DESC')->get();
        }else{
                $admin = Admin_cloud::where('id_guru', Auth::user()->guru->id)->where('status', '!=', 'kosong')->where('updated_at', '>', '1')->orderBy('updated_at', 'DESC')->get();
        }
        return datatables()->of($admin)
        ->addColumn('judul', function ($admin) {
            return $admin->nama;
        })
        ->addColumn('mapel', function($admin){
            return $admin->bidang_keahlian->mapel;
        })
        ->addColumn('bidang_studi', function ($admin) {
            return $admin->bidang_keahlian->bidang_studi;
        })
        ->addColumn('tanggal_dibuat', function ($admin) {
            return $admin->updated_at->format('d M Y');
        })
        ->addColumn('action', function ($admin) {
            $button = '<a href="/admin/cloud/download/' . $admin->id . '/pdf" class="edit btn btn-danger text-white btn-sm"><i class="fas fa-file-pdf"></i></a>';
            $button .= '&nbsp';
            $button .= '<a href="/admin/cloud/view/' . $admin->id . '/pdf"   id="' . $admin->id . '" class="edit btn btn-primary btn-sm "><i class="fas fa-search"></i></a>';
            return $button;
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
        ->rawColumns(['action', 'kompetensi_keahlian'])
        ->addindexColumn()->make('true');
    }

    public function dashboard_download_file($id)
    {
        $admin = Admin_cloud::find($id);
        $headers = ["Content-type:application/pdf"];
        return Storage::download($admin->path, $admin->name, $headers);
    }

    public function dashboard_view_file($id)
    {
        $admin = Admin_cloud::find($id);
        $headers = ["Content-type:application/pdf"];
        return response()->file(storage_path('app/'.$admin->path), $headers);
    }
}
