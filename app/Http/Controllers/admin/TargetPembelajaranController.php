<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bidang_keahlian;
use App\Models\Target_pembelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TargetPembelajaranController extends Controller
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
                $data = Bidang_keahlian::has('target_pembelajaran')->where('id_guru', Auth()->id())->first();
            }else if(Auth::user()->role == 'admin'){
                $data = Bidang_keahlian::has('target_pembelajaran')->where('id_guru', Auth()->id())->first();
            }
            return datatables()->of($data)
                ->addColumns('guru', function($data){
                    return $data->guru->name;
                })
                ->addColumns('action', function ($data) {
                    $button = '<a href="/admin/target_pembelajaran/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/target_pembelajaran/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndex()->make(true);
        }
        return view('admin.target_pembelajaran.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.target_pembelajaran.tambah');
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
            $target = Bidang_keahlian::has('target_pembelajaran')->where(['id_guru', Auth()->id()],['id',$id])->first();
        } else if (Auth::user()->role == 'admin') {
            $target = Bidang_keahlian::has('target_pembelajaran')->where('id',$id)->first();
        }
        return view('admin.target_pembelajaran.detail', compact('target'));
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
            $target = Bidang_keahlian::has('target_pembelajaran')->where(['id_guru', Auth()->id()], ['id', $id])->first();
        } else if (Auth::user()->role == 'admin') {
            $target = Bidang_keahlian::has('target_pembelajaran')->where('id', $id)->first();
        }
        return view('admin.target_pembelajaran.edit', compact('target'));
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
        Target_pembelajaran::where('id_bidang_keahlian',$id)->delete();
        return response()->json($data = 'berhasil');
    }
}
