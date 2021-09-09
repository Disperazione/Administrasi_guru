<?php

namespace App\Http\Controllers;

use App\Models\Admin_cloud;
use App\Models\Komentar_cloud;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class komentarController extends Controller
{

    public function store(Request $request, $id)
    {
        $cloud = Admin_cloud::find($id);
        Komentar_cloud::create([
            'comment' => $request->komen,
            'id_admin_cloud' => $id,
            'id_guru' => Auth::user()->guru->id,
        ]);
        Admin_cloud::where('id', $cloud->id)->update([
            'status' => 'tolak',
            'updated_at' => Carbon::now()
        ]);
        // return redirect()->route('admin.cloud.table',$cloud->id_guru);
        return response()->json(['status'=>'berhasil']);
    }

    public function view($id)
    {
        $comment = Komentar_cloud::where('id_admin_cloud', $id)->with('guru')->orderby('created_at','DESC')->get();
        $difforhumans = [];
        foreach ($comment as $key => $value) {
            $difforhumans[] .= ($value->created_at) ? $value->created_at->diffForHumans() : '';
        }
        return response()->json(['komentar'=>$comment,'waktu'=>collect($difforhumans)]);
    }
}
