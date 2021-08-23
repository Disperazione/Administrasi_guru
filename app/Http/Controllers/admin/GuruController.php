<?php

namespace App\Http\Controllers\admin;

use App\Exports\GuruExport;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\GuruRequest;
use App\Models\Jurusan;
use App\Models\Mapel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Excel;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        // $a =User::wherenotin('id', [4])->where('email', '21e12e21e')->first();
        // dd(empty($a));
        if ($request->ajax()) {
            $guru = guru::all();
            // yajra data table
            return datatables()->of($guru)
                ->editColumn('jurusan', function ($data) {
                    if (!empty($data->jurusan->singkatan_jurusan)) {
                        return $data->jurusan->singkatan_jurusan;
                    } else {
                        return "Jurusan Kosong";
                    }
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/guru/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/guru/' . $data->id . '/edit" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()->make(true);
        }
        return view('admin.guru.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.guru.create',['jurusan'=>Jurusan::alL()]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // validated email
    public function validated_email($email)
    {
        if (!empty($email)) {
            $user = User::where('email', $email)->first();
            if (!empty($user)) { // jika nik / usernme nya sudah ada atau tidak koosng
                return response()->json(['validate_email' => 'Email sudah tersedia']);  // retun valicasi
            } else {
                return response()->json(['validate_email' => '']);  // rertun kosong atau berhasil
            }
        } else {
            return response()->json(['validate_email' => 'Email tidak boleh kosong']); // return erorr ( tidak boleh kosong )
        }
    }

    // validate nik
    public function validated_nik($nik){
        if (!empty($nik)) {
            $user = User::where('name',$nik)->first();
            if (!empty($user)) { // jika nik / usernme nya sudah ada atau tidak koosng
                return response()->json(['validate_nik' => 'Nik sudah tersedia']);  // retun valicasi
            }else{
                return response()->json(['validate_nik' => '']);  // rertun kosong atau berhasil
            }
        }else{
            return response()->json(['validate_nik' => 'Nik tidak boleh kosong']); // return erorr ( tidak boleh kosong )
        }
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validated();
        $user = User::create([
            'name' => $request->nik,
            'email' => $request->email,
            'role' => $request->jabatan,
            'password' => Hash::make($request->pasword)
        ]);


        $guru = Guru::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'fax' => $request->fax,
            'no_telp' => $request->no_telp,
            'id_user' => $user->id
        ]);

        $guru->jurusan()->attach($request->id_jurusan);
        return redirect()->route('admin.guru.index')->with('berhasil','data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = Guru::where('id', $id)->first();
        return view('admin.guru.detail', compact('guru'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::where('id', $id)->first();
        $id_jurusan = [];
        foreach ($guru->jurusan as $value) { // loop many to many jurusan
           $id_jurusan[] = $value->pivot->id_jurusan; // masukin ke array isis dari pivot table nya
        }
        $jurusan = Jurusan::all();
        return view('admin.guru.edit',['guru' => $guru,'jurusan' => $jurusan,'id_jurusan'=> collect($id_jurusan)]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // validated email
    public function validated_email_edit($id,$email)
    {
        if (!empty($email)) {
            $user = User::wherenotin('id', [$id])->where('email', $email)->first();
            if (!empty($user)) { // jika nik / usernme nya sudah ada atau tidak koosng
                return response()->json(['validate_email' => 'Email sudah tersedia']);  // retun valicasi
            } else {
                return response()->json(['validate_email' => '']);  // rertun kosong atau berhasil
            }

        } else {
            return response()->json(['validate_email' => 'Email tidak boleh kosong']); // return erorr ( tidak boleh kosong )
        }
    }

    // validate nik
    public function validated_nik_edit($id, $nik)
    {
        if (!empty($nik)) {
            $user = User::wherenotin('id',[$id])->where('nik', $nik)->first();
            if (!empty($user)) { // jika nik / usernme nya sudah ada atau tidak koosng
                return response()->json(['validate_nik' => 'Nik sudah tersedia']);  // retun valicasi
            } else {
                return response()->json(['validate_nik' => '']);  // rertun kosong atau berhasil
            }
        } else {
            return response()->json(['validate_nik' => 'Nik tidak boleh kosong']); // return erorr ( tidak boleh kosong )
        }
    }
    public function update(Request $request, $id)
    {
        //$guru->update($request->all());
        // $request->validated();
        $guru = Guru::where('id', $id)->first();
        $user = User::where('id', $guru->id)->first(); // 2x cek guru
        // jika usernnya kosong
        if (!empty($guru->user)) {
            // update
            $user = User::where('id', $guru->id_user)->update([
                'name' => $request->nik,
                'email' => $request->email,
                'password' => Hash::make($request->pasword),
                'role' => $request->jabatan
            ]);
        }else{
            // jika tidak buar user baru
            $user = User::create([
                'name' => $request->nik,
                'email' => $request->email,
                'password' => Hash::make($request->pasword),
                'role' => $request->jabatan
            ]);
        }
        $g_a = Guru::where('id', $id)->first();
        $guru = Guru::where('id', $id)->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'fax' => $request->fax,
            'no_telp' => $request->no_telp,
        ]);

        $g_a->jurusan()->sync($request->id_jurusan);

        return redirect()->route('admin.guru.index')->with('berhasil','Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::where('id', $id)->first();
        $guru->user->delete;
        $guru->delete();
        return response()->json(['data' => 'data anda berhasil di hapus']);
    }

    // export excel
    public function export(Excel $excel)
    {
        // kalau yang belom tau ini make model bidiing
        // sebenernya di excel cuman make static method \ mmethod seperti ini
        // Excel::download(new ClassExport,'nama.xlsx');
        $guru = Guru::all();
        return $excel->download(new GuruExport($guru), 'data-guru.xlsx');
        return 'export';
    }
}
