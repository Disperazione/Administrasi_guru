
@extends('layout.master')
@push('css')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endpush
@section('title', 'SIFOS | Add Data LK 2')
@section('judul','Add Data Lembar Kerja 2')
@section('breadcrump')
{{-- breadcrump here --}}
<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
<div class="breadcrumb-item">LK 2</div>
@endsection
@section('main')
{{-- content here --}}

<form id="form" action="{{ route('admin.Lembar-kerja-2.update',$bidangkeahlian->id) }}" method="POST">
    @csrf
    @method('put')

    {{-- content here --}}
    <div class="card">
        <div class="card-header">
            <h4><i class="fas fa-align-justify"></i> Edit Data Lembar Kerja 2</h4>
        </div>
        <div class="card-body">
            <div>
                <h6 class="card-title">Pada bagian ini, guru pengampu mata pelajaran rincian berkaitan materi bahan
                    ajar yang akan diterapkan disetiap kompetensi dasar serta
                    memberikan deskripsi dari setiap bahan ajar yang digunakan.</h6>
            </div>
            {{-- datatenagapendidik --}}
            <div class="row">
                <div class="col-sm-6">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Data Tenaga Pendidik</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Tenaga Pendidik</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="far fa-address-card"></i>
                                    </div>
                                </div>
                                <select class="form-control" name="id_guru"
                                    {{ (Auth::user()->role == 'guru') ? 'disabled id=""' : 'id=id_guru' }}>
                                    <option value="">Lihat Lebih Lanjut</option>
                                    @if (Auth::user()->role === 'admin')
                                    @foreach ($guru as $items)
                                    <option value="{{ $items->id }}"
                                        {{ (old('id_guru', $items->id)) ? 'selected' : '' }}>
                                        {{ $items->name }}</option>
                                    @endforeach
                                    @else
                                    <option value="{{  Auth::user()->guru->id  }}" selected>
                                        {{ Auth::user()->guru->name }}</option>
                                    @endif

                                </select>
                                <div class="invalid-feedback">
                                    Mapel tidak boleh koosng
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Bidang Studi</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-left"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="bidang_studi" id="bidang_studi"
                                    placeholder="Default : TEHNOLOGI INFORMASI DAN KOMUKNIKASI"
                                    value="{{ $bidangkeahlian->lembar_kerja->Lk_2 }}">

                                <div class="invalid-feedback" c>
                                    Bidang Studi tidak boleh koosng
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Mapel</label>
                            <div class="input-group">
                                {{-- <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-left"></i>
                                    </div>
                                </div> --}}
                                <select class="form-control" name="mapel" id="mapel" readonly disabled>
                                    <option value="">Lihat Lebih Lanjut</option>
                                    {{-- @foreach( as $item) --}}
                                    <option value="{{Auth::user()->guru->bidang_keahlian()->first()->id}}" selected> {{ Auth::user()->guru->bidang_keahlian()->first()->mapel }}</option>
                                    {{-- @endforeach --}}
                                </select>
                                <div class="invalid-feedback">
                                    Mapel tidak boleh koosng
                                </div>
                            </div>
                        </div>
                          <div class="form-group">
                            <label>Jurusan</label>
                            <div class="input-group">
                                {{-- <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-left"></i>
                                    </div>
                                </div> --}}
                                <select class="form-control" name="id_jurusan" id="jurusan" data-id="{{ $id_jurusan }}" multiple="multiple"   disabled>
                                    <option value="">Lihat Lebih Lanjut</option>
                                    @foreach ($jurusan as $item)
                                    {{-- {{dd($jurusan)}} --}}
                                    <option value="{{ $item->id }}"
                                        {{ (old('id_jurusan',$bidangkeahlian->id) == $item->id) ? 'selected' : '' }}>
                                        {{ $item->singkatan_jurusan }}</option>
                                    @endforeach

                                </select>
                                <div class="invalid-feedback">
                                    Jurusan tidak boleh koosng
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">.</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>kelas</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-justify"></i>
                                    </div>
                                </div>
                                <input type="text" id="kelas" class="form-control" disabled
                                value="{{ $bidangkeahlian->kelas }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kompetensi Keahlian</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-justify"></i>
                                    </div>
                                </div>
                                <input type="text" id="kompetensi" class="form-control" disabled
                                value="{{ $bidangkeahlian->jurusan[0]->nama_jurusan }}">

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jam Pelajaran (JP)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-justify"></i>
                                    </div>
                                </div>
                                <input type="text" id="jp" class="form-control" disabled
                                value="{{ $bidangkeahlian->jam_pelajaran }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- datatenagapendidik --}}

                 {{-- kompetensi dasar --}}
                 <div class="row">
                    <div class="col-sm-12">
                        <div class="card-header">
                            <h4 class="card-title" style="padding-top: 30px;">Kompetensi Dasar</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col" style="width: 10px;">NO.</th>
                                        <th scope="col" style="width: 80%;">Semester Ganjil</th>
                                        <th scope="col" style="width: 10px;">
                                            <button class="btn btn-success addbtn_multiple_semester_ganjil"
                                                style="width: 80px;">Fields <i class="fas fa-plus"></i></button>
                                        </th>
                                    </tr>
                                  
                                </thead>
                                <input type="hidden" name="" id="jml_s_ganjil" value="{{count($s_ganjil)}}">
                                <tbody class="fields_multiple_semester_ganjil">
                                
                                         @for ($i = 0; $i < count($s_ganjil); $i++)    
                                            {{-- {{dd($s_ganjil[$i]->strategi_pembelajaran)}} --}}
                                                     <tr>
                                                        <tr>
                                                             <td scope="row" rowspan="1">{{$i+1}}</td>
                                                                <td rowspan="2">
                                                                    <select name="kd_ganjil[]"  style="width:100%;heigth:100%" class="form-control s_ganjili{{$i}}" id="s_ganjil{{$i}}" >
                                                                        {{-- <option value="{{$s_ganjil[$i]->id}}"></option> --}}
                                                                        <option value="{{$s_ganjil[$i]->id}}" selected> KD  {{$s_ganjil[$i]->kd_pengetahuan}}   {{$s_ganjil[$i]->keterangan_pengetahuan}}  KD {{$s_ganjil[$i]->kd_ketrampilan}} {{$s_ganjil[$i]->keterangan_ketrampilan}} </option>
                                                                        @foreach ($isi_komptensi_dasar_ganjil as $item)
                                                                            @if ($item->id == $s_ganjil[$i]->id)

                                                                            @else
                                                                                
                                                                                <option value="{{$item->id}}" > KD  {{$item->kd_pengetahuan}}   {{$item->keterangan_pengetahuan}}  KD {{$item->kd_ketrampilan}} {{$item->keterangan_ketrampilan}} </option>


                                                                            @endif
                                                                            
                                                                        @endforeach
                                                                        {{-- <option value=""></option> --}}
                                                                    </select>
                                                                    {{-- //      <div class="invalid-feedback d-none invalid_modelPembelajaran" tyle="margin-left: 41px;">Kompetensi inti tidak boleh kosong</div> --}}
                                                                            <div class="row mt-4 mb-4">
                                                                            <div class="form-group col-sm-4">
                                                                               <label>Metode Pembelajaran</label>
                                                                                   <button class="btn btn-sm btn-success ml-5 mb-2 mt-2" id="more_metodeGanjil{{$i}}">add more</button>
                                                                               <div class="row metode_fieldGanjil{{$i}}"  >
                                                                                {{-- {{dd($s_ganjil[$i]->strategi_pembelajaran->metode_pembelajaran)}} --}}
                                                                                @for ($x = 0; $x < count($s_ganjil[$i]->strategi_pembelajaran->metode_pembelajaran); $x++)
                                                                                        <div class="col-6 mb-1">
                                                                                            <div class="input-group">
                                                                                                <input type="text"  class="form-control input_metode_pembelajaran " name="metodePembalajaran[]" value="{{$s_ganjil[$i]->strategi_pembelajaran->metode_pembelajaran[$x]->metode}}">
                                                                                                <input type="hidden"  class="form-control input_metode_pembelajaran id_kdGanjil{{$i}}" name="id_kd[]" value="{{$s_ganjil[$i]->id}}">
                                                                                            
                                                                                                <div class="invalid-feedback d-none invalid_metode_pembelajaran" tyle="margin-left: 41px;">Metode Pembelajaran tidak boleh kosong</div>
                                                                                            
                                                                                                    @if ($x == 0)

                                                                                                    @else 
                                                                                                     <button class="btn btn-sm btn-danger removebtn_metode" >X</button>
                                                                                           

                                                                                                    @endif
                                                                                            </div>
                                                                                        </div>
                                                                                    
                                                                                    
                                                                            @endfor
                                                                               </div>
                                                                                
                                                                                
                                                                            </div>
                                                                            <div class="form-group col-sm-4">
                                                                               <label>Deskripsi Kegiatan</label>
                                                                                <div class="input-group">
                                                                                
                                                                                    <textarea type="text" id="" class="form-control input_deskripsi_kegiatan" name="deskripsiKegiatan[]" id="" style="height: 90px;">{{$s_ganjil[$i]->strategi_pembelajaran->deskripsi_kegiatan}}</textarea>
                                                                               <div class="invalid-feedback d-none invalid_deskripsi_kegiatan" tyle="margin-left: 41px;">Deskripsi Kegiatan tidak boleh kosong</div>
                                                                                

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-sm-4">
                                                                               <label>Model Pembelajaran</label>
                                                                                <div class="input-group">
                                                                                    <select class="form-control model_pembelajaran" name="modelPembelajaran[]">
                                                                                        {{-- {{dd($s_ganjil[$i]->strategi_pembelajaran->model_pembelajaran)}} --}}
                                                                                             <option  value="" >--Pilih model--</option>
                                                                                             <option value="Problem Based Learning (PBL)" {{ $s_ganjil[$i]->strategi_pembelajaran->model_pembelajaran == 'Problem Based Learning (PBL)' ? 'selected' : '' }}>Problem Based Learning (PBL)</option>
                                                                                             <option value="Project Based Learning (PjBL)" {{ $s_ganjil[$i]->strategi_pembelajaran->model_pembelajaran == 'Project Based Learning (PjBL)' ? 'selected' : '' }}>Project Based Learning (PjBL)</option>
                                                                                          
                                                                                 
                                                                                    </select>
                                                                               <div class="invalid-feedback d-none invalid_model_pembelajaran" tyle="margin-left: 41px;">Model Pembelajaran tidak boleh kosong</div>
                                                                                    
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center" rowspan="1">
                                                                    @if ($i === 0)
                                                                    
                                                                    @else

                                                                    <button class="btn btn-danger x_s_ganjil" id="x_s_ganjil">X</button>
                                                                    @endif
                                                                
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                        
                                                        
                                                        
                                                        </tr>
                                                </tr>
                                         @endfor
                             
                                </tbody>
                            </table>
    
                            <table class="table table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col" style="width: 10px;">NO.</th>
                                        <th scope="col" style="width: 80%;">Semester Genap</th>
                                        <th scope="col" style="width: 10px;">
                                            <button class="btn btn-success addbtn_multiple_semester_genap"
                                                style="width: 80px;">Fields <i class="fas fa-plus"></i></button>
                                        </th>
                                    </tr>
                                </thead>
                                <input type="hidden" name="" id="jml_s_genap" value="{{count($s_genap)}}">

                                <tbody class="fields_multiple_semester_genap">
                                    @for ($i = 0; $i < count($s_genap); $i++)    
                                    {{-- {{dd($s_genap[$i]->strategi_pembelajaran)}} --}}
                                             <tr>
                                                <tr>
                                                     <td scope="row" rowspan="1">{{$i+1}}</td>
                                                        <td rowspan="2">
                                                            <select name="kd_genap[]"  style="width:100%;heigth:100%" class="form-control s_genap{{$i}}" id="s_genap{{$i}}" >
                                                                {{-- <option value="{{$s_genap[$i]->id}}"></option> --}}
                                                                <option value="{{$s_genap[$i]->id}}" selected> KD  {{$s_genap[$i]->kd_pengetahuan}}   {{$s_genap[$i]->keterangan_pengetahuan}}  KD {{$s_genap[$i]->kd_ketrampilan}} {{$s_genap[$i]->keterangan_ketrampilan}} </option>
                    
                                                                {{-- <option value=""></option> --}}
                                                            </select>
                                                            {{-- //      <div class="invalid-feedback d-none invalid_modelPembelajaran" tyle="margin-left: 41px;">Kompetensi inti tidak boleh kosong</div> --}}
                                                                    <div class="row mt-4 mb-4">
                                                                    <div class="form-group col-sm-4">
                                                                       <label>Metode Pembelajaran</label>
                                                                           <button class="btn btn-sm btn-success ml-5 mb-2 mt-2" id="more_metodeGenap{{$i}}">add more</button>
                                                                       <div class="row metode_fieldGenap{{$i}}"  >
                                                                        @for ($x = 0; $x < count($s_genap[$i]->strategi_pembelajaran->metode_pembelajaran); $x++)
                                                                        {{-- {{dd($s_genap[$i]->strategi_pembelajaran->metode_pembelajaran)}} --}}
                                                                                <div class="col-6 mb-1">
                                                                                    <div class="input-group">
                                                                                        <input type="text"  class="form-control input_metode_pembelajaran " name="metodePembalajaran[]" value="{{$s_genap[$i]->strategi_pembelajaran->metode_pembelajaran[$x]->metode}}">
                                                                                        <input type="hidden"  class="form-control input_metode_pembelajaran id_kdGenap{{$i}}" name="id_kd[]" value="{{$s_genap[$i]->id}}">
                                                                                    
                                                                                        <div class="invalid-feedback d-none invalid_metode_pembelajaran" tyle="margin-left: 41px;">Metode Pembelajaran tidak boleh kosong</div>
                                                                                    
                                                                                            @if ($x == 0)

                                                                                            @else 
                                                                                             <button class="btn btn-sm btn-danger removebtn_metode" >X</button>
                                                                                   

                                                                                            @endif
                                                                                    </div>
                                                                                </div>
                                                                            
                                                                            
                                                                    @endfor
                                                                       </div>
                                                                        
                                                                        
                                                                    </div>
                                                                    <div class="form-group col-sm-4">
                                                                       <label>Deskripsi Kegiatan</label>
                                                                        <div class="input-group">
                                                                        
                                                                            <textarea type="text" id="" class="form-control input_deskripsi_kegiatan" name="deskripsiKegiatan[]" id="" style="height: 90px;">{{$s_genap[$i]->strategi_pembelajaran->deskripsi_kegiatan}}</textarea>
                                                                       <div class="invalid-feedback d-none invalid_deskripsi_kegiatan" tyle="margin-left: 41px;">Deskripsi Kegiatan tidak boleh kosong</div>
                                                                        

                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-sm-4">
                                                                       <label>Model Pembelajaran</label>
                                                                        <div class="input-group">
                                                                            <select class="form-control model_pembelajaran" name="modelPembelajaran[]">
                                                                                {{-- {{dd($s_genap[$i]->strategi_pembelajaran->model_pembelajaran)}} --}}
                                                                                     <option  value="" >--Pilih model--</option>
                                                                                     <option value="Problem Based Learning (PBL)" {{ $s_genap[$i]->strategi_pembelajaran->model_pembelajaran == 'Problem Based Learning (PBL)' ? 'selected' : '' }}>Problem Based Learning (PBL)</option>
                                                                                     <option value="Project Based Learning (PjBL)" {{ $s_genap[$i]->strategi_pembelajaran->model_pembelajaran == 'Project Based Learning (PjBL)' ? 'selected' : '' }}>Project Based Learning (PjBL)</option>
                                                                                  
                                                                         
                                                                            </select>
                                                                       <div class="invalid-feedback d-none invalid_model_pembelajaran" tyle="margin-left: 41px;">Model Pembelajaran tidak boleh kosong</div>
                                                                            
                                                                            
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center" rowspan="1">
                                                            @if ($i === 0)
                                                            
                                                            @else

                                                            <button class="btn btn-danger x_s_genap" id="x_s_genap">X</button>
                                                            @endif
                                                        
                                                        </td>
                                                </tr>
                                                <tr>
                                                
                                                
                                                
                                                </tr>
                                        </tr>
                                 @endfor
                                </tbody>
                            </table>
                          
                        </div>
                    </div>
                </div>
                {{--  --}}

            {{-- card --}}
            <div class="fields_strpembelajaran">
                <div class="card">
                    <div class="card-header">
                        <h4>Strategi Pembelajaran Semester : </h4>
                        <select id="" class="form-select form-control ml-2" style="width: 130px;">
                            <option>Ganjil</option>
                            <option>Genap</option>
                        </select>
                    </div>
                    <div class="card-body">
                        <div class="row">
                         

                        </div>
                       
                        <div class="row">
                           
                        </div>
                    </div>
                </div>
            </div>
            {{-- card --}}


            {{-- buttonsubmit --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="modal-footer">
                            <button class="btn btn-success addbtn_strpembelajaran">Fields <i class="fas fa-plus"></i></button>
                            <button class="btn btn-primary" id="button">Submit</button>
                            <a href="{{ route('admin.Lembar-kerja-2.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- buttonsubmit --}}
        </div>
    </div>
    {{-- end pages --}}
</form>


@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    // multiple
   

    // auto complete mapel
    
$(document).ready(function () {
         $('#mapel').select2();
        $('#jurusan').select2();
    // autocompete bidang keahlian
    // $('#mapel').change(function () {
            id = $('#mapel').val(); // mengambil value
    //         $('#kompetensi').val('')
    //         $('#jp').val('');
    //         $('#kelas').val('');
    //         $('#jurusan').val('').trigger('change');
            $.ajax({
                // url: '/admin/lk2/option/mapel/' + id, // url
                url: '/admin/lk2/option/mapel/' + id +'/edit', // url
                type: 'get', // method
                success: function (response) {
          
                    s_ganjil_multiple_input(); // table ganjil
                    s_genap_multiple_input(); // table genap

                function s_ganjil_multiple_input() {
                    var jml_s_ganjil = $("#jml_s_ganjil").val();
                    Ganjilcounter = jml_s_ganjil; // buat nentuin index aarray
                     console.log(Ganjilcounter+"Ganjilcounter")

                    for (let j = 0; j < jml_s_ganjil; j++) {
                        var x = 0;
                            $('#more_metodeGanjil'+j+'').click(function(e){
                                e.preventDefault();
                                // if(x < max_fields){
                                    // console.log(x)
                                    x++; //text box increment
                                    $('.metode_fieldGanjil'+j+'').append(
                                                    '<div class="col-6">'+
                                                     '<div class="input-group mb-1">'+
                                                         '<input type="text"  class="form-control input_metode_pembelajaran " name="metodePembalajaran[]" value="" >'+
                                                         '<input type="hidden"  class="form-control input_metode_pembelajaran id_kdGanjil'+j+'" name="id_kd[]" value="'+response.s_ganjil[0].id+'">'+
                                                         '<button class="btn btn-sm btn-danger removebtn_metode">X</button>'+
                                                         '<div class="invalid-feedback d-none invalid_metode_pembelajaran" tyle="margin-left: 41px;">Metode Pembelajaran tidak boleh kosong</div>' +
                                                     '</div>'+
                                                    '</div>'
                                        );
                                                    console.log(j);
                            });      

                            $(".s_ganjil"+j+'').on('change', function(){  
                            var val = $(".s_ganjil"+j+'').val();
                                $(".id_kdGanjil"+j+'').val(val);
                                console.log(val)
                            });


                              $('.metode_fieldGanjil'+j+'').on("click",".removebtn_metode", function(e){ //user click on remove text
                                e.preventDefault(); $(this).parent('div').parent('div').remove(); --x;
                              });

                       
                        select();
                        remove_tr();
                         // select
                        function select() {
                            response.s_ganjil.forEach(element => {
                                // $('#id_kd').parent()
                                $('.s_ganjil'+j+"").append(
                                    '<option value="' + element
                                    .id + '"> KD ' + element.kd_pengetahuan +
                                    ' ' + element.keterangan_pengetahuan +
                                    ' & KD ' +
                                    element.kd_ketrampilan + ' ' + element
                                    .keterangan_ketrampilan + ' </option>')
                            });
                        }
                        function remove_tr(){
                                $('#x_s_ganjil').click(function (e) {
                                e.preventDefault();
                                $(this).parent('td').parent('tr').remove();
                                jml_s_ganjil--;
                            })
                        }
                        
                    }
               
                    for (let i = Ganjilcounter; i <= Ganjilcounter; i++) {
                        var no = 0;
                        $('.addbtn_multiple_semester_ganjil').click(function (e) {
                            e.preventDefault();
                            Ganjilcounter++;
                            no++;
                            console.log(Ganjilcounter+"Ganjilcounter");
                            // console.log(no+"no");
                            $('.fields_multiple_semester_ganjil').append(
                                '<tr>'+
                                    ' <tr>' +
                                    ' <td scope="row">'+Ganjilcounter+'</td>' +
                                        '<td rowspan="2">' +
                                                '<select name="kd_ganjil[]" id="" style="width:100%;heigth:100%" class="form-control s_ganjil'+Ganjilcounter+'" id="s_ganjil'+Ganjilcounter+'">' +
                                            
                                                '</select>' +
                                            '<div class="invalid-feedback d-none invalid_modelPembelajaran" tyle="margin-left: 41px;">Kompetensi inti tidak boleh kosong</div>' +

                                            '<div class="row mb-4 mt-4">'+
                                                    '<div class="form-group col-sm-4">'+
                                                       '<label>Metode Pembelajaran</label>'+
                                                       '<button class="btn btn-sm btn-success ml-5 mb-2 mt-2" id="more_metodeGanjil'+Ganjilcounter+'">add more</button>'+    
                                                       '<div class="row metode_fieldGanjil'+Ganjilcounter+'"  >'+
                                                        '<div class="col-6 mb-1">'+
                                                         '<div class="input-group">'+
                                                            '<input type="text" id="" class="form-control input_metode_pembelajaran " name="metodePembalajaran[]" id="" value="">'+
                                                            '<input type="hidden"  class="form-control input_metode_pembelajaran id_kdGanjil'+Ganjilcounter+'" name="id_kd[]" value="'+response.s_ganjil[0].id+'">'+

                                                                 '<div class="invalid-feedback d-none invalid_metode_pembelajaran" tyle="margin-left: 41px;">Metode Pembelajaran tidak boleh kosong</div>' +
                                                         '</div>'+
                                                        '</div>'+
                                                       '</div>'+
                                                       
                                                        
                                                    '</div>'+
                                                    '<div class="form-group col-sm-4">'+
                                                       '<label>Deskripsi Kegiatan</label>'+
                                                        '<div class="input-group">'+
                                                        
                                                            '<textarea type="text" id="" class="form-control input_deskripsi_kegiatan" name="deskripsiKegiatan[]" id="" style="height: 90px;"></textarea>'+
                                                           '<div class="invalid-feedback d-none invalid_deskripsi_kegiatan" tyle="margin-left: 41px;">Deskripsi Kegiatan tidak boleh kosong</div>' +

                                                        '</div>'+
                                                    '</div>'+
                                                    '<div class="form-group col-sm-4">'+
                                                       '<label>Model Pembelajaran</label>'+
                                                        '<div class="input-group">'+
                                                            '<select class="form-control model_pembelajaran" name="modelPembelajaran[]">'+
                                                                        ' <option  value="" selected>--Pilih model--</option>'+
                                                                        ' <option>Problem Based Learning (PBL)</option>'+
                                                                       ' <option>Project Based Learning (PjBL)</option>'+
                                                                '</select>'+
                                                           '<div class="invalid-feedback d-none invalid_model_pembelajaran" tyle="margin-left: 41px;">Model Pembelajaran tidak boleh kosong</div>' +

                                                        '</div>'+
                                                    '</div>'+
                                            '</div>'+
                                        '</td>' +
                                        '<td class="text-center">' +
                                            '<button class="btn btn-danger x_s_ganjil" id="x_s_ganjil">X</button>' +
                                        '</td>' +
                                    '</tr>' +
                                    '<tr>'+
                                    
                               
                      
                                    '</tr>'+
                                '</tr>'

                                )
                                var x = 0;

                            $('#more_metodeGanjil'+Ganjilcounter+'').click(function(e){
                                e.preventDefault();
                                // if(x < max_fields){
                                    console.log(Ganjilcounter)
                                    x++;
                                    $('.metode_fieldGanjil'+Ganjilcounter+'').append(
                                                    '<div class="col-6">'+
                                                     '<div class="input-group mb-1">'+
                                                        '<input type="text"  class="form-control input_metode_pembelajaran " name="metodePembalajaran[]" id="">'+
                                                        '<input type="hidden"  class="form-control input_metode_pembelajaran id_kdGanjil'+Ganjilcounter+'" name="id_kd[]" value="'+response.s_ganjil[0].id+'">'+

                                                         '<button class="btn btn-sm btn-danger removebtn_metode">X</button>'+
                                                         '<div class="invalid-feedback d-none invalid_metode_pembelajaran" tyle="margin-left: 41px;">Metode Pembelajaran tidak boleh kosong</div>' +

                                                     '</div>'+
                                                    '</div>'
                                                    );
                              });      
                                                    // console.log(response.s_ganjil[i].id);

                              $('.metode_fieldGanjil'+Ganjilcounter+'').on("click",".removebtn_metode", function(e){ //user click on remove text
                                e.preventDefault(); $(this).parent('div').parent('div').remove(); --x; 
                            });
                            
                            $(".s_ganjil"+Ganjilcounter+'').on('change', function(){ 
                                // console.log(Ganjilcounter) 
                            var val = $(".s_ganjil"+Ganjilcounter+'').val();
                                $(".id_kdGanjil"+Ganjilcounter+'').val(val);
                                console.log(Ganjilcounter)
                              });

                            select_m();

                            //apus apeend dalem
                                $('.x_s_ganjil').click(function (e) {
                                e.preventDefault();
                                // console.log('clicked');
                                $(this).parent('td').parent('tr').remove(); 
                                Ganjilcounter--;
                                })
                        })

                        // rmeove table
                        function remove_tr()
                        {
                            $('#x_s_ganjil').click(function (e) {
                            e.preventDefault();
                            $(this).parent('td').parent('tr').remove();
                            Ganjilcounter--;
                        })
                        }
                         // select
                        function select() {
                            response.s_ganjil.forEach(element => {
                                // $('#id_kd').parent()
                                $('.s_ganjil'+i+"").append(
                                    '<option value="' + element
                                    .id + '"> KD ' + element.kd_pengetahuan +
                                    ' ' + element.keterangan_pengetahuan +
                                    ' & KD ' +
                                    element.kd_ketrampilan + ' ' + element
                                    .keterangan_ketrampilan + ' </option>')
                            });
                        }
                        function select_m() {
                            response.s_ganjil.forEach(element => {
                                // $('#id_kd').parent()
                                $('.s_ganjil'+Ganjilcounter+"").append(
                                    '<option value="' + element
                                    .id + '"> KD ' + element.kd_pengetahuan +
                                    ' ' + element.keterangan_pengetahuan +
                                    ' & KD ' +
                                    element.kd_ketrampilan + ' ' + element
                                    .keterangan_ketrampilan + ' </option>')
                            });
                        }
                      
                    }
                }

                function s_genap_multiple_input() {
                    var jml_s_genap = $("#jml_s_genap").val();
                    Genapcounter = jml_s_genap; // buat nentuin index aarray
                     console.log(Genapcounter+"Genapcounter")

                    for (let j = 0; j < jml_s_genap; j++) {
                        var x = 0;
                            $('#more_metodeGenap'+j+'').click(function(e){
                                e.preventDefault();

                                // if(x < max_fields){
                                    // console.log(x)
                                    x++; //text box increment
                                    $('.metode_fieldGenap'+j+'').append(
                                        
                                                    '<div class="col-6">'+
                                                     '<div class="input-group mb-1">'+
                                                         '<input type="text"  class="form-control input_metode_pembelajaran " name="metodePembalajaran[]" value="" >'+
                                                         '<input type="hidden"  class="form-control input_metode_pembelajaran id_kdGenap'+j+'" name="id_kd[]" value="'+response.s_genap[0].id+'">'+

                                                         '<button class="btn btn-sm btn-danger removebtn_metode">X</button>'+
                                                         '<div class="invalid-feedback d-none invalid_metode_pembelajaran" tyle="margin-left: 41px;">Metode Pembelajaran tidak boleh kosong</div>' +

                                                     '</div>'+
                                                    '</div>'
                                        );
                                                    console.log(i);
                            });      

                            $(".s_genap"+j+'').on('change', function(){  
                            var val = $(".s_genap"+j+'').val();
                                $(".id_kdGenap"+j+'').val(val);
                                console.log(val)
                            });


                              $('.metode_fieldGenap'+j+'').on("click",".removebtn_metode", function(e){ //user click on remove text
                                e.preventDefault(); $(this).parent('div').parent('div').remove(); --x;
                              });

                              
                   

                       
                        select();
                        remove_tr();
                     


                         // select
                        function select() {
                            response.s_genap.forEach(element => {
                                // $('#id_kd').parent()
                                $('.s_genap'+j+"").append(
                                    '<option value="' + element
                                    .id + '"> KD ' + element.kd_pengetahuan +
                                    ' ' + element.keterangan_pengetahuan +
                                    ' & KD ' +
                                    element.kd_ketrampilan + ' ' + element
                                    .keterangan_ketrampilan + ' </option>')
                            });
                        }
                        function remove_tr(){
                                $('#x_s_genap').click(function (e) {
                                e.preventDefault();
                                $(this).parent('td').parent('tr').remove();
                                jml_s_genap--;
                            })
                        }
                        
                    }
               
                    for (let i = Genapcounter; i <= Genapcounter; i++) {
                        var no = 0;
                        $('.addbtn_multiple_semester_genap').click(function (e) {
                            e.preventDefault();
                            Genapcounter++;
                            no++;
                            // console.log(Genapcounter+"Genapcounter");
                            // console.log(no+"no");
                            $('.fields_multiple_semester_genap').append(
                                '<tr>'+
                                    ' <tr>' +
                                    ' <td scope="row">'+Genapcounter+'</td>' +
                                        '<td rowspan="2">' +
                                                '<select name="kd_genap[]" id="" style="width:100%;heigth:100%" class="form-control s_genap'+Genapcounter+'" id="s_genap'+Genapcounter+'">' +
                                            
                                                '</select>' +
                                            '<div class="invalid-feedback d-none invalid_modelPembelajaran" tyle="margin-left: 41px;">Kompetensi inti tidak boleh kosong</div>' +

                                            '<div class="row mb-4 mt-4">'+
                                                    '<div class="form-group col-sm-4">'+
                                                       '<label>Metode Pembelajaran</label>'+
                                                       '<button class="btn btn-sm btn-success ml-5 mb-2 mt-2" id="more_metodeGenap'+Genapcounter+'">add more</button>'+    
                                                       '<div class="row metode_fieldGenap'+Genapcounter+'"  >'+
                                                        '<div class="col-6 mb-1">'+
                                                         '<div class="input-group">'+
                                                            '<input type="text" id="" class="form-control input_metode_pembelajaran " name="metodePembalajaran[]" id="" value="">'+
                                                            '<input type="hidden"  class="form-control input_metode_pembelajaran id_kdGenap'+Genapcounter+'" name="id_kd[]" value="'+response.s_genap[0].id+'">'+

                                                                 '<div class="invalid-feedback d-none invalid_metode_pembelajaran" tyle="margin-left: 41px;">Metode Pembelajaran tidak boleh kosong</div>' +
                                                         '</div>'+
                                                        '</div>'+
                                                       '</div>'+
                                                       
                                                        
                                                    '</div>'+
                                                    '<div class="form-group col-sm-4">'+
                                                       '<label>Deskripsi Kegiatan</label>'+
                                                        '<div class="input-group">'+
                                                        
                                                            '<textarea type="text" id="" class="form-control input_deskripsi_kegiatan" name="deskripsiKegiatan[]" id="" style="height: 90px;"></textarea>'+
                                                           '<div class="invalid-feedback d-none invalid_deskripsi_kegiatan" tyle="margin-left: 41px;">Deskripsi Kegiatan tidak boleh kosong</div>' +

                                                        '</div>'+
                                                    '</div>'+
                                                    '<div class="form-group col-sm-4">'+
                                                       '<label>Model Pembelajaran</label>'+
                                                        '<div class="input-group">'+
                                                            '<select class="form-control model_pembelajaran" name="modelPembelajaran[]">'+
                                                                        ' <option  value="" selected>--Pilih model--</option>'+
                                                                        ' <option>Problem Based Learning (PBL)</option>'+
                                                                       ' <option>Project Based Learning (PjBL)</option>'+
                                                                '</select>'+
                                                           '<div class="invalid-feedback d-none invalid_model_pembelajaran" tyle="margin-left: 41px;">Model Pembelajaran tidak boleh kosong</div>' +

                                                        '</div>'+
                                                    '</div>'+
                                            '</div>'+
                                        '</td>' +
                                        '<td class="text-center">' +
                                            '<button class="btn btn-danger x_s_genap" id="x_s_genap">X</button>' +
                                        '</td>' +
                                    '</tr>' +
                                    '<tr>'+
                                    
                               
                      
                                    '</tr>'+
                                '</tr>'

                                )
                                var x = 1;

                            $('#more_metodeGenap'+Genapcounter+'').click(function(e){
                                e.preventDefault();
                                // if(x < max_fields){
                                    console.log(Genapcounter)
                                    x++;
                                    $('.metode_fieldGenap'+Genapcounter+'').append(
                                                    '<div class="col-6">'+
                                                     '<div class="input-group mb-1">'+
                                                        '<input type="text"  class="form-control input_metode_pembelajaran " name="metodePembalajaran[]" id="">'+
                                                        '<input type="hidden"  class="form-control input_metode_pembelajaran id_kdGenap'+Genapcounter+'" name="id_kd[]" value="'+response.s_genap[0].id+'">'+

                                                         '<button class="btn btn-sm btn-danger removebtn_metode">X</button>'+
                                                         '<div class="invalid-feedback d-none invalid_metode_pembelajaran" tyle="margin-left: 41px;">Metode Pembelajaran tidak boleh kosong</div>' +

                                                     '</div>'+
                                                    '</div>'
                                                    );
                              });      
                                                    // console.log(response.s_genap[i].id);

                              $('.metode_fieldGenap'+Genapcounter+'').on("click",".removebtn_metode", function(e){ //user click on remove text
                                e.preventDefault(); $(this).parent('div').parent('div').remove(); --x; 
                            });
                            
                            $(".s_genap"+Genapcounter+'').on('change', function(){ 
                                // console.log(Genapcounter) 
                            var val = $(".s_genap"+Genapcounter+'').val();
                                $(".id_kdGenap"+Genapcounter+'').val(val);
                                console.log(Genapcounter)
                              });

                            select_m();

                            //apus apeend dalem
                                $('.x_s_genap').click(function (e) {
                                e.preventDefault();
                                // console.log('clicked');
                                $(this).parent('td').parent('tr').remove(); 
                                Genapcounter--;
                                })
                        })

                        // rmeove table
                        function remove_tr()
                        {
                            $('#x_s_genap').click(function (e) {
                            e.preventDefault();
                            $(this).parent('td').parent('tr').remove();
                            Genapcounter--;
                        })


                        }
                         // select
                        function select() {
                            response.s_genap.forEach(element => {
                                // $('#id_kd').parent()
                                $('.s_genap'+i+"").append(
                                    '<option value="' + element
                                    .id + '"> KD ' + element.kd_pengetahuan +
                                    ' ' + element.keterangan_pengetahuan +
                                    ' & KD ' +
                                    element.kd_ketrampilan + ' ' + element
                                    .keterangan_ketrampilan + ' </option>')
                            });
                        }
                        function select_m() {
                            response.s_genap.forEach(element => {
                                // $('#id_kd').parent()
                                $('.s_genap'+Genapcounter+"").append(
                                    '<option value="' + element
                                    .id + '"> KD ' + element.kd_pengetahuan +
                                    ' ' + element.keterangan_pengetahuan +
                                    ' & KD ' +
                                    element.kd_ketrampilan + ' ' + element
                                    .keterangan_ketrampilan + ' </option>')
                            });
                        }
                      
                    }
                }
                },
                fail: function (rsponse) {

                }
            });
        });

         


            $('.addbtn_multiple_semester_ganjil').click(function (e) {
                            e.preventDefault();
            })

            $('.addbtn_multiple_semester_genap').click(function (e) {
                            e.preventDefault();
            })

        // button submit
        $('#button').click(function (e) {
            e.preventDefault();
            guru = $('#id_guru').val();
            jurusan = $('#jurusan').val();
            mapel = $('#mapel').val(); // ambil value dari mapel
            // ambil collection input by id ( hasilnya collection jadi tinggal di loop )
            deskripsi_kegiatan = document.querySelectorAll(".input_deskripsi_kegiatan");
            invalid_deskripsi_kegiatan = document.querySelectorAll(".invalid_deskripsi_kegiatan"); // validasi
            model_pembelajaran = document.querySelectorAll(".model_pembelajaran");
            invalid_model_pembelajaran = document.querySelectorAll(".invalid_model_pembelajaran"); // validasi
            metode_pembelajaran = document.querySelectorAll(".input_metode_pembelajaran");
            invalid_metode_pembelajaran = document.querySelectorAll(".invalid_metode_pembelajaran"); // validasi
            // keterangan_model_pembelajaran = document.querySelectorAll(".keterangan_model_pembelajaran");
            // invalid_keterangan_model_pembelajaran = document.querySelectorAll(
            //     ".invalid_keterangan_model_pembelajaran"); // validasi
            // bukti = document.querySelectorAll(".input_bukti");
            // invalid_bukti = document.querySelectorAll(".invalid_bukti"); // validasi
            // kompetensi = document.querySelectorAll(".input_modelPembelajaran");
            //mapel invalid_modelPembelajaran = document.querySelectorAll(".invalid_modelPembelajaran"); // validasi

            // jika function validasinya 0 atau undified maka akan ke submit dan jika tidak maka akan valdasi ( manggil fucntion nya )
            if (!validasi_jurusan()  && !validasi_deskripsi_kegiatan() && !validasi_model_pembelajaran() && !validasi_metode_pembelajaran() && !validasi_mapel()) {
                $('#form').submit();
            } else {
                validasi_jurusan()
                validasi_deskripsi_kegiatan();
                validasi_model_pembelajaran();
                validasi_metode_pembelajaran();
                validasi_mapel();
            };

           

            function validasi_mapel() {
                // buat ngitung ada berapa yang kena validasi
                count_erorr = [];
                if (!mapel) {
                    $('#mapel').addClass('is-invalid'); // Ad class is-invalid
                    $('#mapel').closest('div').find('.invalid-feedback').removeClass(
                        'd-none'
                    ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    count_erorr += 1
                } else {
                    $('#mapel').removeClass('is-invalid').removeClass('is-invalid');
                    $('#mapel').closest('div').find('.invalid-feedback').addClass(
                        'd-none'
                    ); // cari div terdekat dan cari class nya find = cari lalu add class d-none
                }
                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_jurusan() {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                if (!jurusan) {
                    $('#jurusan').addClass('is-invalid'); // Ad class is-invalid
                    $('#jurusan').closest('div').find('.invalid-feedback').removeClass(
                        'd-none'
                    ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    count_erorr += 1
                } else {
                    $('#jurusan').removeClass('is-invalid').removeClass('is-invalid');
                    $('#jurusan').closest('div').find('.invalid-feedback').addClass(
                        'd-none'
                    ); // cari div terdekat dan cari class nya find = cari lalu add class d-none
                }
                // return panjang dari collection atau array
                return count_erorr.length;
            }

            // function validasi_target_mapeL() {
            //     // buat ngidung ada berapa yang kena validasi
            //     count_erorr = [];
            //     // loop target mapel untuk mencari isi dari collection nya
            //     // target mapel
            //     target_mapel.forEach(element => {
            //         // jika elemnt nya koong
            //         if (!element.value) {
            //             // lalu add class
            //             $(element).addClass('is-invalid'); // Ad class is-invalid
            //             $(element).closest('div').find('.invalid_target_mapel').removeClass(
            //                 'd-none'
            //             ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
            //             // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
            //             count_erorr += 1
            //         } else {
            //             $(element).removeClass('is-invalid').removeClass('is-invalid');
            //             $(element).closest('div').find('.invalid_target_mapel').addClass(
            //                 'd-none'
            //             ); // cari div terdekat dan cari class nya find = cari lalu add class d-none
            //         }
            //     });

            //     // return panjang dari collection atau array
            //     return count_erorr.length;
            // }

            function validasi_deskripsi_kegiatan(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // keterangan de
                deskripsi_kegiatan.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_deskripsi_kegiatan')
                            .removeClass(
                                'd-none'
                            ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_deskripsi_kegiatan')
                            .addClass(
                                'd-none'
                            ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_model_pembelajaran(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // target kkid
                model_pembelajaran.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_model_pembelajaran').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_model_pembelajaran').addClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }


            function validasi_metode_pembelajaran(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // bukti
                metode_pembelajaran.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_metode_pembelajaran').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_metode_pembelajaran').addClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }

       

        // var max_fields  = 10;



});












































    // $('#button').click(function (e) {
    //     e.preventDefault();


    //         for (let j = 0; j < 40; j++) {
            
    //             if ($w = $("#metode_pembelajaran"+j+'').parent('td').attr("data-id")) {
    //                 $("td.metode_field"+j+'> input' ).val(+$w) ;
    //                  $("td.metode_field"+j+'> div > input' ).val(+$w) ;
                
    //             }
            
    //         }


    //         // });

    //     guru = $('#id_guru').val();
    //     mapel = $('#mapel').val();
    //     bidang = $('#bidang').val();
    //     console.log(!validated_mapel());

    //     if (!validated_guru() && !validated_bidang() && !validated_mapel()) {
    //         $('#form').submit();
    //     }else{
    //         validated_guru();
    //         validated_bidang();
    //         validated_mapel();
    //     }

    //     function validated_guru() {
    //         arr = [];
    //         if (!guru) {
    //             $('#id_guru').addClass('is-invalid');
    //             $('#id_guru').closest('div').find('invalid-feedback').removeClass('d-none');
    //             arr += 1
    //         } else {
    //             $('#id_guru').removeClass('is-invalid');
    //             $('#id_guru').closest('div').find('invalid-feedback').addClass('d-none');
    //         }
    //         return arr.length;
    //     }
    //     function validated_mapel() {
    //         arr = [];
    //         if (!mapel) {
    //             $('#mapel').addClass('is-invalid');
    //             $('#mapel').closest('div').find('invalid-feedback').removeClass('d-none');
    //             arr += 1
    //         } else {
    //             $('#mapel').removeClass('is-invalid');
    //             $('#mapel').closest('div').find('invalid-feedback').addClass('d-none');
    //         }
    //         return arr.length;
    //     }
    //     function validated_bidang() {
    //         arr = [];
    //         if (!bidang) {
    //             $('#bidang').addClass('is-invalid');
    //             $('#bidang').closest('div').find('invalid-feedback').removeClass('d-none');
    //             arr += 1
    //         } else {
    //             $('#bidang').removeClass('is-invalid');
    //             $('#bidang').closest('div').find('invalid-feedback').addClass('d-none');
    //         }
    //         return arr.length;
    //     }

    // });


    // $(document).ready(function(){

    // });

</script>
@endpush
