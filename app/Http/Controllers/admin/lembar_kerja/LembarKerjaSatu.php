<?php

namespace App\Http\Controllers\admin\lembar_kerja;

use App\Http\Controllers\Controller;
use App\Models\Bidang_keahlian;
use App\Models\Guru;
use App\Models\Kompetensi_inti;
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
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-danger text-white btn-sm"><i class="fas fa-file-pdf"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a href="/admin/Lembar-kerja-1/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/Lembar-kerja-1/' . $data->id . '/edit" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
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
        $bidang = Bidang_keahlian::doesnthave('target_pembelajaran')->get();
        return view('admin.lembar_kerja_satu.tambah', compact('guru','bidang'));
    }

    public function option_bidang($id){
        $bidang = Bidang_keahlian::where('id',$id)->first();
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
        // target pembelajaran
        $target = Target_pembelajaran::create(['id_bidang_keahlian' => $request->id_bidang_keahlian]);

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
        // nyari bidang keahlian yang tidak mempunyai target pembelajaran atau mempunyai target_pembalajran.id_bidang_keahlian = id _bidang keahlian ( masih dalam perbaikan )
        // $bidang = Bidang_keahlian::whereHas('target_pembelajaran', function (Builder $query) use($id) {
        //     $query->where('id_bidang_keahlian', $id);
        // })->get();
        $bidang = Bidang_keahlian::doesnthave('target_pembelajaran')->get();
        if (Auth::user()->role == 'guru') {
            $target = Bidang_keahlian::has('target_pembelajaran')->with('target_pembelajaran')->where([['id_guru',Auth()->id()],['id', $id]])->first();
        } else if (Auth::user()->role == 'admin') {
            $target = Bidang_keahlian::has('target_pembelajaran')->where('id', $id)->first();
        }
        return view('admin.lembar_kerja_satu.edit', compact('target','guru','bidang'));
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
        // update target pemeblajaran
        $setTarget = Target_pembelajaran::where('id_bidang_keahlian',$id)->update(['id_bidang_keahlian'=> $request->id_bidang_keahlian]);
        $target = Target_pembelajaran::where('id_bidang_keahlian', $request->id_bidang_keahlian)->first();

        // hapus column yang lama
        Target_pencapaian_mapel::where('id_target_pembelajaran',$target->id)->delete();
        Target_pencapaian_kkd::where('id_target_pembelajaran', $target->id)->delete();
        Rincian_bukti::where('id_target_pembelajaran', $target->id)->delete();
        Kompetensi_inti::where('id_target_pembelajaran', $target->id)->delete();

        // setelah itu menambkahkan column yang batu
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
        return response()->json($data = 'berhasil');
    }
}
