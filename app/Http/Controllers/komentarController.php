<?php

namespace App\Http\Controllers;

use App\Models\Admin_cloud;
use App\Models\Komentar_cloud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class komentarController extends Controller
{
    //
    public function coment($id)
    {
        $cloud = Admin_cloud::find($id);
        return view('admin.komen.tambah', compact('cloud'));
    }

    public function store(Request $request, $id)
    {
        $cloud = Admin_cloud::find($id);
        Komentar_cloud::create([
            'comment' => $request->komen,
            'id_admin_cloud' => $id,
            'id_guru' => Auth::user()->guru->id,
        ]);
        Admin_cloud::where('id', $cloud->id)->update([
            'status' => 'tolak'
        ]);
        return redirect()->route('admin.cloud.table',$cloud->id_guru);
    }

    public function view($id)
    {
        return view('admin.komen.view');
    }
}
