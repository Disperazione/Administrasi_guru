<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\GuruRequest;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $guru = guru::all();
            return datatables()->of($guru)
                ->editColumn('jurusan', function ($data) {
                    if (!empty($data->jurusan->singkatan_jurusan)) {
                        return $data->jurusan->singkatan_jurusan;
                    } else {
                        return "Jurusan Kosong";
                    }
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/guru/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/guru/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
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
        return view('admin.guru.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuruRequest $request)
    {
        $request->validated();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->pasword)
        ]);
        $request->reuqest->add(['id_user', $user->id]);
        Guru::create($request->all());
        return redirect()->route('guru.index')->with('berhasil','data berhasil di tambahkan');
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
        return view('admin.guru.detail', compact($guru));
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
        return view('admin.guru.edit', compact($guru));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuruRequest $request, $id)
    {
        //$guru->update($request->all());
        $request->validated();
        $guru = Guru::where('id', $id)->first();
        $user = User::where('id', $guru->id)->first();
        // jika usernnya kosong
        if (!empty($user)) {
            // update
            $user = User::where('id', $guru->id_user)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->pasword)
            ]);
        }else{
            // jika tidak buar user baru
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->pasword)
            ]);
        }
        // nambah reuqeuest baru namanya id_user
        $request->reuqest->add(['id_user',$user->id]);
        // update
        Guru::where('id',$guru->id)->update($request->all());
        return redirect()->route('guru.index')->with('Berhasil','Data berhasil di update');
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
}
