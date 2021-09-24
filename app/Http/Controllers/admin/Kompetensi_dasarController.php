<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
	use App\Models\Bidang_keahlian;
use App\Models\Kompetensi_dasar;
use App\Models\Guru;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class Kompetensi_dasarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Bidang_keahlian::where('id_guru',Auth::user()->id)->has('kompetensi_dasar')->get()->toArray();
            // dd($data[0]);
        // $singkatan_badge = [];
        // foreach ($data->jurusan as $jurusan) {
        //     dd($jurusan);
        //     $singkatan_badge[] = $jurusan->jurusan;
        // }
        // dd($singkatan_badge);
        // if (empty($singkatan_badge)) {
        //     return 'Jurusan koosng';
        // }
        // $data = Bidang_keahlian::where('id_guru',Auth::user()->id)->has('kompetensi_dasar')->get();
                // dd($data);

        if ($request->ajax()) {
            if (Auth::user()->role == 'guru') {
                $data = Bidang_keahlian::where('id_guru',Auth::user()->id)->has('kompetensi_dasar')->get();
            }else if(Auth::user()->role == 'admin'){
                $data = Bidang_keahlian::has('kompetensi_dasar')->get();
            }

            return datatables()->of($data)
                ->addColumn('guru', function ($data) {
                    return $data->guru->name;
                })
                ->addColumn('kompetensi_keahlian', function ($data) {
                    $singkatan_badge = [];
                    foreach ($data->jurusan as $jurusan) {
                        $singkatan_badge[] .= "<span class='badge badge-pill badge-primary'>$jurusan->singkatan_jurusan</span>";
                    }
                         if (empty($singkatan_badge)) {
                        return 'Jurusan koosng';
                        }
                 
                    return implode(' ', $singkatan_badge);
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . $data->id . '"   id="' . $data->id . '" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a  href="/admin/kompetensi_dasar/' . $data->id . '/edit" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action', 'kompetensi_keahlian'])
                ->addIndexColumn()->make(true);
        }
        return view('admin.kompetensi_dasar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all();
        $jurusan = Jurusan::all();
        // dd($guru);
        return view('admin.kompetensi_dasar.tambah',compact('guru','jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);
        // $jurusan = Jurusan::where($request->jurusan)->get(); 
        // $jurusan = Jurusan::select('*')
        // ->whereIn('id', $request->jurusan)
        // ->get()->toArray();
            $total_jam_pelajaran = array_sum($request->jam_pelajaran);
            $total_waktu_jam_pelajaran = array_sum($request->durasi);
        // dd($total_waktu_jam_pelajaran);
          $bidang_keahlianStore = Bidang_keahlian::create([
            'mapel' =>  $request->mapel,
            'kelas' =>  $request->kelas,
            // 'jam_pelajaran' =>  $request->jam_pelajaran,
            'total_jam_pelajaran' =>  (string)$total_jam_pelajaran,
            'total_waktu_jam_pelajaran' =>  (string)$total_waktu_jam_pelajaran,
            'id_guru' =>  Auth::user()->guru->id,
        ]);

        $bidang_keahlianStore->jurusan()->attach($request->jurusan);
          
        //   $guru = Guru::create([
        //     'nik' => $request->nik,
        //     'name' => $request->name,
        //     'jabatan' => $request->jabatan,
        //     'alamat' => $request->alamat,
        //     'fax' => $request->fax,
        //     'no_telp' => $request->no_telp,
        //     'id_user' => $user->id
        // ]);

        // $guru->jurusan()->attach($request->id_jurusan);
        // ]);

        $data = $request->all();
        // dd($data['kd_pengetahuan']);

        for ($i=0; $i < count($data['kd_pengetahuan']); $i++) { 
                //   dd($data['kd_pengetahuan']);
                     $dataStore = new Kompetensi_dasar();
                  // $dataStore = array(
                     $dataStore->kd_pengetahuan =  $data['kd_pengetahuan'][$i];
                     $dataStore->keterangan_pengetahuan =  $data['keterangan_pengetahuan'][$i];
                     $dataStore->kd_ketrampilan =  $data['kd_keterampilan'][$i];
                     $dataStore->keterangan_ketrampilan =  $data['keterangan_keterampilan'][$i];
                     $dataStore->materi_inti =  $data['materi_inti'][$i];
                     $dataStore->durasi =  $data['durasi'][$i];
                     $dataStore->pertemuan =  $data['pertemuan'][$i];
                     $dataStore->jam_pertemuan =  $data['jam_pelajaran'][$i];
                     $dataStore->semester =  $data['semester'][$i];
                     $dataStore->semester_kd =  $data['semester_kd'][$i];
                     $dataStore->id_bidang_keahlian =  $bidang_keahlianStore->id;
      
                     $dataStore->save();
        }
      

        return redirect()->route('admin.kompetensi_dasar.index')->with('berhasil', 'Data berhasil di tambahkan');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bidang = Bidang_keahlian::find($id)->first();
        return view('admin.kompetensi_dasar.detail', compact('bidang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $bidang = Bidang_keahlian::where('id',$id)->first();
        // dd($bidang);
        $kompetensi_dasar = Kompetensi_dasar::has('bidang_keahlian')->where('id_bidang_keahlian',$bidang->id)->get();
        // dd($kompetensi_dasar);
        $id_jurusan = [];
        
        foreach ($bidang->jurusan as $value) { // loop many to many jurusan
           $id_jurusan[] = $value->id; // masukin ke array masukin id dari morph / id jurusan nya
        }
        $id_jurusan = collect($id_jurusan);
        // dd($id_jurusan);
        $jurusanAll = Jurusan::all();

        return view('admin.kompetensi_dasar.edit', compact('bidang','kompetensi_dasar','jurusanAll','id_jurusan'));
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
        
        // NOTE!!!!!!! $oldKD sama saja dengan $kompentensi_dasar yang di ambil dari has table bidang_keahlian \\

// ----> apapun yang berubah update bidang_keahlian terlbih dahulu <----
$bidang_keahlian = Bidang_keahlian::where('id',$id)->first();

$total_jam_pelajaran = array_sum($request->jam_pelajaran);
$total_waktu_jam_pelajaran = array_sum($request->durasi);
                
Bidang_keahlian::where('id',$id)->update([
    'mapel' =>  $request->mapel,
    'kelas' =>  $request->kelas,
    // 'jam_pelajaran' =>  $request->jam_pelajaran,
    'total_jam_pelajaran' =>  $total_jam_pelajaran,
    'total_waktu_jam_pelajaran' =>  $total_waktu_jam_pelajaran,
    'id_guru' =>  Auth::user()->guru->id,
]);


$bidang_keahlian->jurusan()->sync($request->jurusan);
    
        $jml_kd = Kompetensi_dasar::has('bidang_keahlian')->where('id_bidang_keahlian',$id)->get()->toArray();
        // dd(count($request->semester_kd)); 


        
            if (count($request->semester_kd) > count($jml_kd)) { // jika semester_kd/id_kd nya di tambah lebih besar dari id_kd sebelum nya 
                // lakukan update pada seluruh id_kd yang lama terlebih dahulu
                $oldKD = Kompetensi_dasar::has('bidang_keahlian')->where('id_bidang_keahlian',$id)->get()->toArray();

                // dd($oldKD);
                for ($i=0; $i < count($oldKD); $i++) { 
                    $id_kd[] = $oldKD[$i];
                }
                    
                $data = $request->all();
                for ($x=0; $x < count($oldKD); $x++) { 
                    Kompetensi_dasar::where('id',$id_kd[$x])->update([
                        'kd_pengetahuan' =>  $data['kd_pengetahuan'][$x],
                        'keterangan_pengetahuan' =>  $data['keterangan_pengetahuan'][$x],
                        'kd_ketrampilan' =>  $data['kd_keterampilan'][$x],
                        'keterangan_ketrampilan' =>  $data['keterangan_keterampilan'][$x],
                        'materi_inti' =>  $data['materi_inti'][$x],
                        'durasi' =>  $data['durasi'][$x],
                        'jam_pertemuan' =>  $data['jam_pelajaran'][$x],
                        'pertemuan' =>  $data['pertemuan'][$x],
                        'semester' =>  $data['semester'][$x],
                        'semester_kd' =>  $data['semester_kd'][$x],
                        'id_bidang_keahlian' =>  $id,
                    ]);
                 }
                
                // ---->jika sudah ter update maka buat array dimana akan membanding kan isi kd yang baru dan yang lama<----
                // ---->isi kd yang baru di ambil dari request<----
                // newkd
                for ($new=0; $new < count($request['semester_kd']); $new++) { 
                    $kd_new[] = 
                    [
                        $data['kd_pengetahuan'][$new],
                        $data['keterangan_pengetahuan'][$new],
                        $data['kd_keterampilan'][$new],
                        $data['keterangan_keterampilan'][$new],
                        $data['materi_inti'][$new],
                        $data['durasi'][$new],
                        $data['jam_pelajaran'][$new],
                        $data['pertemuan'][$new],
                        $data['semester'][$new],
                        (string)$data['semester_kd'][$new],
                        // $data['id_bidang_keahlian'][$new],
                    ];
                }
                // dd($kd_new[0]);
       
                // --->jika sudah ter update maka buat array dimana akan membanding kan isi kd yang baru dan yang lama<---
                // --->isi kd yang lama di ambil dari table kompetensidasar<---
                // old kd
                $kompetensi_dasar = Kompetensi_dasar::has('bidang_keahlian')->where('id_bidang_keahlian',$id)->get()->toArray();
                for ($old=0; $old < count($kompetensi_dasar) ; $old++) { 
                    // dd($kompetensi_dasar[0]);
                    $kd_old[] = 
                    [
                        $kompetensi_dasar[$old]['kd_pengetahuan'],
                        $kompetensi_dasar[$old]['keterangan_pengetahuan'],
                        $kompetensi_dasar[$old]['kd_ketrampilan'],
                        $kompetensi_dasar[$old]['keterangan_ketrampilan'],
                        $kompetensi_dasar[$old]['materi_inti'],
                        $kompetensi_dasar[$old]['durasi'],
                        $kompetensi_dasar[$old]['jam_pertemuan'],
                        $kompetensi_dasar[$old]['pertemuan'],
                        $kompetensi_dasar[$old]['semester'],
                        (string)$kompetensi_dasar[$old]['semester_kd'],
                    ];
                }   
                
                    // ---->lakukan perbandingan supaya dapat newkd dari array request<----
                    $kdNew = check_diff_multi($kd_new,$kd_old);
                    // dd($kdNew);


                    // ---->setelah dapat filter array yang tidak kosong<----
                    // $getDifferent = array_diff($kdNew,);
                    for ($i=0; $i < count($kdNew) ; $i++) { 
                        if (!empty($kdNew[$i])) {
                          $getNewKD[] =    $kdNew[$i];
                        }
                       
                    }
                    // dd($getNewKD);
                   
                    // ---->lalu buat store data / tambahkan dari array request yang terbaru<----
                     $dataNewKD = $getNewKD;
                    
                    for ($i=0; $i < count($getNewKD); $i++) { 
                            //   dd($dataNewKD[0]);
                                 $dataStore = new Kompetensi_dasar();
                              // $dataStore = array(
                                 $dataStore->kd_pengetahuan =  $dataNewKD[$i][0];
                                 $dataStore->keterangan_pengetahuan =  $dataNewKD[$i][1];
                                 $dataStore->kd_ketrampilan =  $dataNewKD[$i][2];
                                 $dataStore->keterangan_ketrampilan =  $dataNewKD[$i][3];
                                 $dataStore->materi_inti =  $dataNewKD[$i][4];
                                 $dataStore->durasi =  $dataNewKD[$i][5];
                                 $dataStore->jam_pertemuan =  $dataNewKD[$i][6];
                                 $dataStore->pertemuan =  $dataNewKD[$i][7];
                                 $dataStore->semester =  $dataNewKD[$i][8];
                                 $dataStore->semester_kd =  $dataNewKD[$i][9];
                                 $dataStore->id_bidang_keahlian =  $id;
                  
                                 $dataStore->save();
                    }
            return redirect()->route('admin.kompetensi_dasar.index')->with('berhasil', 'Data berhasil Update Kompetensi dasar');

       
        
              

            }else if( count($request->semester_kd) < count($jml_kd)){ // jika semester_kd/id_kd nya di hapus  maka  akan menghapus id_kd yang di hapus  
           

                //
                $oldKD = $request->oldKD;
                for ($i=0; $i < count($oldKD); $i++) { 
                    $id_kd[] = $oldKD[$i];
                }
                // dd($id_kd);
                    
                $data = $request->all();
                    
                    
                for ($x=0; $x < count($oldKD); $x++) { 
                    Kompetensi_dasar::where('id',$id_kd[$x])->update([
                        'kd_pengetahuan' =>  $data['kd_pengetahuan'][$x],
                        'keterangan_pengetahuan' =>  $data['keterangan_pengetahuan'][$x],
                        'kd_ketrampilan' =>  $data['kd_keterampilan'][$x],
                        'keterangan_ketrampilan' =>  $data['keterangan_keterampilan'][$x],
                        'materi_inti' =>  $data['materi_inti'][$x],
                        'durasi' =>  $data['durasi'][$x],
                        'pertemuan' =>  $data['pertemuan'][$x],
                        'semester' =>  $data['semester'][$x],
                        'semester_kd' =>  $data['semester_kd'][$x],
                        'id_bidang_keahlian' =>  $id,
                    ]);
                
                
                 }
                 $jml_kd = Kompetensi_dasar::has('bidang_keahlian')->where('id_bidang_keahlian',$id)->get()->toArray();

                for ($i=0; $i < count($jml_kd); $i++) { 
                    $old_id[] = $jml_kd[$i]['id'];
                }   
                    // dd($oldKD,$old_id);



                  $idNew = array_diff($old_id,$oldKD);
                for ($d=0; $d < count($idNew); $d++) { 
                  $kompetensi_dasar =    Kompetensi_dasar::has('bidang_keahlian')->where('id',$idNew)->delete();
                }
           
            return redirect()->route('admin.kompetensi_dasar.index')->with('berhasil', 'Data berhasil Update Kompetensi dasar');
            
            
            
            }else{ // jika semester_kd/id_kd nya sama / tidak ada yang berubah lakukan update pada bidang_keahlian dan  semua id_kd yang di edit
               
                
               $jml_kd = Kompetensi_dasar::has('bidang_keahlian')->where('id_bidang_keahlian',$id)->get()->toArray();
                       // dd($jml_kd);
                       for ($i=0; $i < count($jml_kd); $i++) { 
                           $id_kd[] = $jml_kd[$i]['id'];
                       }
                    
                   $data = $request->all();
                   
               
                for ($x=0; $x < count($jml_kd); $x++) { 

                    
                    Kompetensi_dasar::where('id',$id_kd[$x])->update([
                        'kd_pengetahuan' =>  $data['kd_pengetahuan'][$x],
                        'keterangan_pengetahuan' =>  $data['keterangan_pengetahuan'][$x],
                        'kd_ketrampilan' =>  $data['kd_keterampilan'][$x],
                        'keterangan_ketrampilan' =>  $data['keterangan_keterampilan'][$x],
                        'materi_inti' =>  $data['materi_inti'][$x],
                        'durasi' =>  $data['durasi'][$x],
                        'pertemuan' =>  $data['pertemuan'][$x],
                        'semester' =>  $data['semester'][$x],
                        'semester_kd' =>  $data['semester_kd'][$x],

                    ]);

     
                 }
            return redirect()->route('admin.kompetensi_dasar.index')->with('berhasil', 'Data berhasil Update Kompetensi dasar');


                
            }





        // $beasiswa = Kompetensi_dasar::where('nama','Beasiswa Pertamina')->first();
        
        // if () {
        //     # code...
        // }

        // $dosen->beasiswas()->detach($beasiswa);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bidang_keahlian::find($id)->delete();
        return response()->json($data = 'berhasil');
    }
}
