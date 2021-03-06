<?php

namespace App\Http\Controllers\admin;

use App\Exports\JurusanExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\JurusanRequest;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $jurusan = Jurusan::all();
            return datatables()->of($jurusan)
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/jurusan/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/jurusan/' . $data->id . '/edit" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()->make(true);
        }
        return view('admin.jurusan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jurusan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JurusanRequest $request)
    {
        $request->validated();
        Jurusan::create($request->all());
        return redirect()->route('admin.jurusan.index')->with('berhasil', 'Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jurusan = jurusan::where('id', $id)->first();
        return view('admin.jurusan.detail', compact('jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = jurusan::where('id', $id)->first();
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JurusanRequest $request, $id)
    {
        $request->validated();
        $data = $request->all();
        unset($data['_token'], $data['_method']);
        Jurusan::where('id',$id)->update($data);
        return redirect()->route('admin.jurusan.index')->with('berhasil','Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jurusan::find($id)->delete();
        return response()->json($data = 'berhasil');
    }

     public function export(Excel $excel)
    {
        $jurusan = Jurusan::all();
        return $excel->download(new JurusanExport($jurusan),'data-jurusan.xlsx');
    }
}
