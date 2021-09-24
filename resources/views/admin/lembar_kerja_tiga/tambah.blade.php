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

<form id="form" action="{{ route('admin.Lembar-kerja-3.store') }}" method="POST">
    @csrf
    {{-- content here --}}
    <div class="card">
        <div class="card-header">
            <h4><i class="fas fa-align-justify"></i> Tambah Data Lembar Kerja 2</h4>
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
                                    placeholder="Default : TEHNOLOGI INFORMASI DAN KOMUKNIKASI">
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
                                <select class="form-control" name="mapel" id="mapel">
                                    <option value="">Lihat Lebih Lanjut</option>
                                    @foreach ($mapel as $item)
                                        <option value="{{ $item->id }}">{{ $item->mapel }}</option>
                                    @endforeach
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
                                <select class="form-control" name="id_jurusan" id="jurusan" multiple="multiple" disabled>
                                    <option >Lihat Lebih Lanjut</option>
                                    @foreach ($jurusan as $item)
                                    <option value="{{ $item->id }}">{{ $item->singkatan_jurusan }}</option>
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
                                <input type="text" id="kelas" class="form-control" disabled>
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
                                <input type="text" id="kompetensi" class="form-control" disabled>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>Jam Pelajaran (JP)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-justify"></i>
                                    </div>
                                </div>
                                <input type="text" id="jp" class="form-control" disabled>
                            </div>
                        </div> --}}
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
                                    {{-- <tr>
                                        <th style="width: 20%">kd pengetahuan</th>
                                        <th>keterangan pengetahuan</th>
                                        <th>kd ketrampilan</th>
                                        <th>keterangan ketrampilan</th>
                                    </tr> --}}
                                </thead>
                                <tbody class="fields_multiple_semester_ganjil">
                                       
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
                                <tbody class="fields_multiple_semester_genap">
                                    {{-- <tr>
                                        <td scope="row">1</td>
                                        <td>
                                            <select name="id_kd[]" id="" style="width:100%;heigth:100%">
                                                <option value=""> kd 3.0 kompetensi dasar 1 kd 4.0 kompetensi dasar 2
                                                </option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger" id="x_s_genap">X</button>
                                        </td>
                                    </tr> --}}
                                    {{-- </tr> --}}
                                </tbody>
                            </table>
                            {{-- <div class="form-group fields_multiple_kompetensi">
                                <label>Kompetensi Inti</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-book"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control col-10 input_kompetensi" name="kompetensi[]">
                                    <button class="btn btn-success ml-4 addbtn_multiple_kompetensi">Fields <i
                                            class="fas fa-plus"></i></button>
                                    <div class="invalid-feedback d-none invalid_kompetensi">
                                        Kompetensi inti boleh kosong
                                    </div>
                                </div>
                            </div> --}}
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
                            <a href="{{ route('admin.Lembar-kerja-4.index') }}" class="btn btn-danger">Cancel</a>
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
    $('#mapel').change(function () {
            id = $(this).val(); // mengambil value
            $('#kompetensi').val('')
            $('#jp').val('');
            $('#kelas').val('');
            $('#jurusan').val('').trigger('change');
            $.ajax({
                url: '/admin/lk3/option/mapel/' + id, // url
                type: 'get', // method
                success: function (response) {
                    $('.fields_multiple_semester_ganjil').empty();
                    $('.fields_multiple_semester_genap').empty();
                    console.log(response.mapel);
                    $('#kompetensi').val(response.mapel.jurusan[0].singkatan_jurusan)
                    $('#jp').val(response.mapel.jam_pelajaran);
                    $('#kelas').val(response.mapel.kelas);
                    $('#jurusan').val(response.id_jurusan).trigger("change");
                    // console.log(response.id_jurusan);
                    // console.log(response.s_genap);
                    s_ganjil_multiple_input(); // table ganjil
                    s_genap_multiple_input(); // table genap

                function s_ganjil_multiple_input() {
                     Ganjilcounter = 0; // buat nentuin index aarray
                     console.log(Ganjilcounter+"Ganjilcounter");
                    for (let i = 0; i <= Ganjilcounter; i++) {
                        // append table
                        $('.fields_multiple_semester_ganjil').append(
                            '<tr>'+
                                               '<tr>'+
                                                     '<td scope="row" rowspan="1">#</td>'+
                                                        '<td rowspan="2">'+
                                                                '<select name="kd_ganjil[]"  style="width:100%;heigth:100%" class="form-control s_ganjil'+i+'" id="s_ganjil'+i+'">'+
                                                                
                                                                '</select>'+
                                                            // {{-- // <div class="invalid-feedback d-none invalid_modelPembelajaran" tyle="margin-left: 41px;">Kompetensi inti tidak boleh kosong</div>' + --}}
                                                            '<div class="row mt-4 mb-4">'+
                                                                '<div class="form-group col-sm-4">'+
                                                                    '<label>Bukti</label>'+
                                                                     '<div class="input-group">'+
                                                                     
                                                                         '<textarea type="text" id="" class="form-control input_bukti" name="bukti[]" id="" style="height: 70px;"></textarea>'+
                                                                    '<div class="invalid-feedback d-none invalid_bukti" tyle="margin-left: 41px;">Bukti  tidak boleh kosong</div>'+
                                                                    
                                                                     '</div>'+
                                                                 '</div>'+
                                                                    '<div class="form-group col-sm-4">'+
                                                                       '<label>Ketuntasan</label>'+
                                                                        '<div class="input-group">'+
                                                                            '<textarea type="text" id="" class="form-control input_ketuntasan" name="ketuntasan[]" id="" style="height: 70px;"></textarea>'+
                                                                       '<div class="invalid-feedback d-none invalid_ketuntasan" tyle="margin-left: 41px;">Ketuntasan  tidak boleh kosong</div>'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                    '<div class="form-group col-sm-4">'+
                                                                       '<label>Jumlah Pertemuan</label>'+
                                                                         '<div class="input-group">'+
                                                                            '<input type="text" id="" class="form-control input_jumlah_pertemuan " name="jumlah_pertemuan[]" id="" style="height: 30px; width:  70px;">'+
                                                                             '<div class="invalid-feedback d-none invalid_jumlah_pertemuan" tyle="margin-left: 41px;">Jumlah Pertemuan tidak boleh kosong</div>'+
                                                                        '</div>'+ 
                                                                    '</div>'+
                                                            '</div>'+

                                                            '<div class="row mt-4 mb-4">'+
                                                                               '<div class="form-group col-sm-4">'+
                                                                                  '<label>Alat & Bahan</label>'+
                                                                                  '<button class="btn btn-sm btn-success ml-5 mb-2 mt-2" id="more_AlatBahanGanjil'+i+'">add more</button>'+
                                                                            
                                                                                  '<div class="row AlatBahan_fieldGanjil'+i+'">'+
                                                                                   '<div class="col-6 mb-1">'+
                                                                                    '<div class="input-group">'+
                                                                                        '<input type="text"  class="form-control input_alat_bahan " name="AlatBahanGanjil[]" value="">'+
                                                                                        '<input type="hidden"  class="form-control  id_kdGanjil'+i+'" name="id_AlatBahanGanjil[]" value="'+response.s_ganjil[0].id+'">'+
                                                                                        '<div class="invalid-feedback d-none invalid_alat_bahan" tyle="margin-left: 41px;">A&B tidak boleh kosong</div>'+
                                                                                    
                                                                                    
                                                                                     //  <button class="btn btn-sm btn-danger">X</button>'+
                                                                                    '</div>'+
                                                                                   '</div>'+
                                                                                 '</div>'+
                                                                               '</div>'+
                                                                               '<div class="form-group col-sm-4">'+
                                                                                '<label>Sumber Belajar</label>'+
                                                                                '<button class="btn btn-sm btn-success ml-5 mb-2 mt-2" id="more_SumberBelajarGanjil'+i+'">add more</button>'+
                                                                                '<div class="row SumberBelajar_fieldGanjil'+i+'">'+
                                                                                 '<div class="col-6 mb-1">'+
                                                                                  '<div class="input-group">'+
                                                                                      '<input type="text"  class="form-control input_sumber_belajar " name="SumberBelajarGanjil[]" value="">'+
                                                                                      '<input type="hidden"  class="form-control  id_kdGanjil'+i+'" name="id_SumberBelajarGanjil[]" value="'+response.s_ganjil[0].id+'">'+
                                                                                      '<div class="invalid-feedback d-none invalid_sumber_belajar" tyle="margin-left: 41px;">Sumber Belajar tidak boleh kosong</div>'+
                                                                                      //  <button class="btn btn-sm btn-danger">X</button>'+
                                                                                  '</div>'+
                                                                                 '</div>'+
                                                                                '</div>'+
                                                                             '</div>'+

                                                                               '<div class="form-group col-sm-4">'+ 
                                                                                '<label>Keterangan</label>'+
                                                                                 '<div class="input-group">'+
                                                                                 
                                                                                     '<textarea type="text" id="" class="form-control input_keterangan" name="keterangan[]" id="" style="height: 70px;"></textarea>'+
                                                                                '<div class="invalid-feedback d-none invalid_keterangan" tyle="margin-left: 41px;">Keterangan  tidak boleh kosong</div>'+            
                                                                                '</div>'+
                                                                             '</div>'+
                                                            '</div>'+
                                                        '</td>'+
                                                        '<td class="text-center" rowspan="1">'+
                                                             // <button class="btn btn-danger x_s_ganjil" id="x_s_ganjil">X</button>' + 
                                                        
                                                        '</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                '</tr>'+
                                          '</tr>'
                                      )

                                        var ab = 1;
                            $('#more_AlatBahanGanjil'+i+'').click(function(e){
                                e.preventDefault();

                                // if(x < max_fields){
                                    // console.log(x)
                                    ab++; //text box increment
                                    $('.AlatBahan_fieldGanjil'+i+'').append(
                                        
                                                    '<div class="col-6">'+
                                                     '<div class="input-group mb-1">'+
                                                         '<input type="text"  class="form-control input_AlatBahan " name="AlatBahanGanjil[]" value="" >'+
                                                         '<input type="hidden"  class="form-control input_AlatBahan id_kdGanjil'+i+'" name="id_AlatBahanGanjil[]" value="'+response.s_ganjil[0].id+'">'+

                                                         '<button class="btn btn-sm btn-danger removebtn_AlatBahan">X</button>'+
                                                        //  '<div class="invalid-feedback d-none invalid_metode_pembelajaran" tyle="margin-left: 41px;">Metode Pembelajaran tidak boleh kosong</div>' +

                                                     '</div>'+
                                                    '</div>'
                                        );
                                        console.log(ab+'AlatBahan');

                            });    
                            $('.AlatBahan_fieldGanjil'+i+'').on("click",".removebtn_AlatBahan", function(e){ //user click on remove text
                                e.preventDefault(); $(this).parent('div').parent('div').remove(); --ab;
                              });
                              
                              var sb = 1;
                            $('#more_SumberBelajarGanjil'+i+'').click(function(e){
                                e.preventDefault();

                                // if(x < max_fields){
                                    // console.log(x)
                                    sb++; //text box increment
                                    $('.SumberBelajar_fieldGanjil'+i+'').append(
                                        
                                                    '<div class="col-6">'+
                                                     '<div class="input-group mb-1">'+
                                                         '<input type="text"  class="form-control input_SumberBelajar " name="SumberBelajarGanjil[]" value="" >'+
                                                         '<input type="hidden"  class="form-control input_SumberBelajar id_kdGanjil'+i+'" name="id_SumberBelajarGanjil[]" value="'+response.s_ganjil[0].id+'">'+

                                                         '<button class="btn btn-sm btn-danger removebtn_SumberBelajar">X</button>'+
                                                        //  '<div class="invalid-feedback d-none invalid_metode_pembelajaran" tyle="margin-left: 41px;">Metode Pembelajaran tidak boleh kosong</div>' +

                                                     '</div>'+
                                                    '</div>'
                                        );
                                                    console.log(sb+'SumberBelajar');
                            });    
                            $('.SumberBelajar_fieldGanjil'+i+'').on("click",".removebtn_SumberBelajar", function(e){ //user click on remove text
                                e.preventDefault(); $(this).parent('div').parent('div').remove(); --sb;
                              });
                            
                            
                            



                            $(".s_ganjil"+i+'').on('change', function(){  
                            var val = $(".s_ganjil"+i+'').val();
                                $(".id_kdGanjil"+i+'').val(val);
                                // console.log(x)
                            });


                 
                   

                       
                        select();
                        remove_tr();

                        var no = 0;
                        $('.addbtn_multiple_semester_ganjil').click(function (e) {
                            e.preventDefault();
                            Ganjilcounter++;
                            no++;
                            console.log(Ganjilcounter+"Ganjilcounter");
                            // console.log(no+"no");
                            $('.fields_multiple_semester_ganjil').append(
                                '<tr>'+
                                               '<tr>'+
                                                     '<td scope="row" rowspan="1">#</td>'+
                                                        '<td rowspan="2">'+
                                                                '<select name="kd_ganjil[]"  style="width:100%;heigth:100%" class="form-control s_ganjil'+Ganjilcounter+'" id="s_ganjil'+Ganjilcounter+'">'+
                                                                
                                                                '</select>'+
                                                            // {{-- // <div class="invalid-feedback d-none invalid_modelPembelajaran" tyle="margin-left: 41px;">Kompetensi inti tidak boleh kosong</div>' + --}}
                                                            '<div class="row mt-4 mb-4">'+
                                                                '<div class="form-group col-sm-4">'+
                                                                    '<label>Bukti</label>'+
                                                                     '<div class="input-group">'+
                                                                     
                                                                         '<textarea type="text" id="" class="form-control input_bukti" name="bukti[]" id="" style="height: 70px;"></textarea>'+
                                                                    '<div class="invalid-feedback d-none invalid_bukti" tyle="margin-left: 41px;">Bukti  tidak boleh kosong</div>'+
                                                                    
                                                                     '</div>'+
                                                                 '</div>'+
                                                                    '<div class="form-group col-sm-4">'+
                                                                       '<label>Ketuntasan</label>'+
                                                                        '<div class="input-group">'+
                                                                        
                                                                            '<textarea type="text" id="" class="form-control input_ketuntasan" name="ketuntasan[]" id="" style="height: 70px;"></textarea>'+
                                                                       '<div class="invalid-feedback d-none invalid_ketuntasan" tyle="margin-left: 41px;">Ketuntasan  tidak boleh kosong</div>'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                    '<div class="form-group col-sm-4">'+
                                                                       '<label>Jumlah Pertemuan</label>'+
                                                                         '<div class="input-group">'+
                                                                            '<input type="text" id="" class="form-control input_jumlah_pertemuan " name="jumlah_pertemuan[]" id="" style="height: 30px; width:  70px;">'+
                                                                             '<div class="invalid-feedback d-none invalid_jumlah_pertemuan" tyle="margin-left: 41px;">Jumlah Pertemuan tidak boleh kosong</div>'+
                                                                        '</div>'+ 
                                                                    '</div>'+
                                                            '</div>'+

                                                            '<div class="row mt-4 mb-4">'+
                                                                               '<div class="form-group col-sm-4">'+
                                                                                  '<label>Alat & Bahan</label>'+
                                                                                  '<button class="btn btn-sm btn-success ml-5 mb-2 mt-2" id="more_AlatBahanGanjil'+Ganjilcounter+'">add more</button>'+
                                                                            
                                                                                  '<div class="row AlatBahan_fieldGanjil'+Ganjilcounter+'">'+
                                                                                   '<div class="col-6 mb-1">'+
                                                                                    '<div class="input-group">'+
                                                                                        '<input type="text"  class="form-control input_alat_bahan " name="AlatBahanGanjil[]" value="">'+
                                                                                        '<input type="hidden"  class="form-control  id_kdGanjil'+Ganjilcounter+'" name="id_AlatBahanGanjil[]" value="'+response.s_ganjil[0].id+'">'+
                                                                                    
                                                                                        '<div class="invalid-feedback d-none invalid_alat_bahan" tyle="margin-left: 41px;">A&B tidak boleh kosong</div>'+
                                                                                    
                                                                                     //  <button class="btn btn-sm btn-danger">X</button>'+
                                                                                    '</div>'+
                                                                                   '</div>'+
                                                                                 '</div>'+
                                                                               '</div>'+
                                                                               '<div class="form-group col-sm-4">'+
                                                                                '<label>Sumber Belajar</label>'+
                                                                                '<button class="btn btn-sm btn-success ml-5 mb-2 mt-2" id="more_SumberBelajarGanjil'+Ganjilcounter+'">add more</button>'+
                                                                                '<div class="row SumberBelajar_fieldGanjil'+Ganjilcounter+'">'+
                                                                                 '<div class="col-6 mb-1">'+
                                                                                  '<div class="input-group">'+
                                                                                      '<input type="text"  class="form-control input_sumber_belajar " name="SumberBelajarGanjil[]" value="">'+
                                                                                      '<input type="hidden"  class="form-control  id_kdGanjil'+Ganjilcounter+'" name="id_SumberBelajarGanjil[]" value="'+response.s_ganjil[0].id+'">'+
                                                                                      '<div class="invalid-feedback d-none invalid_sumber_belajar" tyle="margin-left: 41px;">Sumber Belajar tidak boleh kosong</div>'+
                                                                                      //  <button class="btn btn-sm btn-danger">X</button>'+
                                                                                  '</div>'+
                                                                                 '</div>'+
                                                                                '</div>'+
                                                                             '</div>'+
                                                                             '<div class="form-group col-sm-4">'+ 
                                                                                '<label>Keterangan</label>'+
                                                                                 '<div class="input-group">'+
                                                                                 
                                                                                     '<textarea type="text" id="" class="form-control input_keterangan" name="keterangan[]" id="" style="height: 70px;"></textarea>'+
                                                                                '<div class="invalid-feedback d-none invalid_keterangan" tyle="margin-left: 41px;">Keterangan  tidak boleh kosong</div>'+            
                                                                                '</div>'+
                                                                             '</div>'+
                                                            '</div>'+
                                                        '</td>'+
                                                        '<td class="text-center" rowspan="1">'+
                                                             // <button class="btn btn-danger x_s_ganjil" id="x_s_ganjil">X</button>' + 
                                                        
                                                        '</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                '</tr>'+
                                          '</tr>'

                                )
                                var ab = 1;
                            $('#more_AlatBahanGanjil'+Ganjilcounter+'').click(function(e){
                                e.preventDefault();

                                // if(x < max_fields){
                                    // console.log(x)
                                    ab++; //text box increment
                                    $('.AlatBahan_fieldGanjil'+Ganjilcounter+'').append(
                                        
                                                    '<div class="col-6">'+
                                                     '<div class="input-group mb-1">'+
                                                         '<input type="text"  class="form-control input_alat_bahan " name="AlatBahanGanjil[]" value="" >'+
                                                         '<input type="hidden"  class="form-control  id_kdGanjil'+Ganjilcounter+'" name="id_AlatBahanGanjil[]" value="'+response.s_ganjil[0].id+'">'+

                                                         '<button class="btn btn-sm btn-danger removebtn_AlatBahan">X</button>'+
                                                         '<div class="invalid-feedback d-none invalid_alat_bahan" tyle="margin-left: 41px;">Metode Pembelajaran tidak boleh kosong</div>' +

                                                     '</div>'+
                                                    '</div>'
                                        );
                                        console.log(ab+'AlatBahan');

                            });    
                            $('.AlatBahan_fieldGanjil'+Ganjilcounter+'').on("click",".removebtn_AlatBahan", function(e){ //user click on remove text
                                e.preventDefault(); $(this).parent('div').parent('div').remove(); --ab;
                              });
                              
                              var sb = 1;
                            $('#more_SumberBelajarGanjil'+Ganjilcounter+'').click(function(e){
                                e.preventDefault();

                                // if(x < max_fields){
                                    // console.log(x)
                                    sb++; //text box increment
                                    $('.SumberBelajar_fieldGanjil'+Ganjilcounter+'').append(
                                        
                                                    '<div class="col-6">'+
                                                     '<div class="input-group mb-1">'+
                                                         '<input type="text"  class="form-control input_sumber_belajar " name="SumberBelajarGanjil[]" value="" >'+
                                                         '<input type="hidden"  class="form-control  id_kdGanjil'+Ganjilcounter+'" name="id_SumberBelajarGanjil[]" value="'+response.s_ganjil[0].id+'">'+

                                                         '<button class="btn btn-sm btn-danger removebtn_SumberBelajar">X</button>'+
                                                         '<div class="invalid-feedback d-none invalid_sumber_belajar" tyle="margin-left: 41px;">Metode Pembelajaran tidak boleh kosong</div>' +

                                                     '</div>'+
                                                    '</div>'
                                        );
                                                    console.log(sb+'SumberBelajar');
                            });    
                            $('.SumberBelajar_fieldGanjil'+Ganjilcounter+'').on("click",".removebtn_SumberBelajar", function(e){ //user click on remove text
                                e.preventDefault(); $(this).parent('div').parent('div').remove(); --sb;
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
                     Genapcounter = 0; // buat nentuin index aarray
                     console.log(Genapcounter+"Genapcounter");
                    for (let i = 0; i <= Genapcounter; i++) {
                        // append table
                        $('.fields_multiple_semester_genap').append(
                            '<tr>'+
                                               '<tr>'+
                                                     '<td scope="row" rowspan="1">#</td>'+
                                                        '<td rowspan="2">'+
                                                                '<select name="kd_genap[]"  style="width:100%;heigth:100%" class="form-control s_genap'+i+'" id="s_genap'+i+'">'+
                                                                
                                                                '</select>'+
                                                            // {{-- // <div class="invalid-feedback d-none invalid_modelPembelajaran" tyle="margin-left: 41px;">Kompetensi inti tidak boleh kosong</div>' + --}}
                                                            '<div class="row mt-4 mb-4">'+
                                                                '<div class="form-group col-sm-4">'+
                                                                    '<label>Bukti</label>'+
                                                                     '<div class="input-group">'+
                                                                     
                                                                         '<textarea type="text" id="" class="form-control input_bukti" name="bukti[]" id="" style="height: 70px;"></textarea>'+
                                                                    '<div class="invalid-feedback d-none invalid_bukti" tyle="margin-left: 41px;">Bukti  tidak boleh kosong</div>'+
                                                                    
                                                                     '</div>'+
                                                                 '</div>'+
                                                                    '<div class="form-group col-sm-4">'+
                                                                       '<label>Ketuntasan</label>'+
                                                                        '<div class="input-group">'+
                                                                        
                                                                            '<textarea type="text" id="" class="form-control input_ketuntasan" name="ketuntasan[]" id="" style="height: 70px;"></textarea>'+
                                                                       '<div class="invalid-feedback d-none invalid_ketuntasan" tyle="margin-left: 41px;">Ketuntasan  tidak boleh kosong</div>'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                    '<div class="form-group col-sm-4">'+
                                                                       '<label>Jumlah Pertemuan</label>'+
                                                                         '<div class="input-group">'+
                                                                            '<input type="text" id="" class="form-control input_jumlah_pertemuan " name="jumlah_pertemuan[]" id="" style="height: 30px; width:  70px;">'+
                                                                             '<div class="invalid-feedback d-none invalid_jumlah_pertemuan" tyle="margin-left: 41px;">Jumlah Pertemuan tidak boleh kosong</div>'+
                                                                        '</div>'+ 
                                                                    '</div>'+
                                                            '</div>'+

                                                            '<div class="row mt-4 mb-4">'+
                                                                               '<div class="form-group col-sm-4">'+
                                                                                  '<label>Alat & Bahan</label>'+
                                                                                  '<button class="btn btn-sm btn-success ml-5 mb-2 mt-2" id="more_AlatBahanGenap'+i+'">add more</button>'+
                                                                            
                                                                                  '<div class="row AlatBahan_fieldGenap'+i+'">'+
                                                                                   '<div class="col-6 mb-1">'+
                                                                                    '<div class="input-group">'+
                                                                                        '<input type="text"  class="form-control input_alat_bahan " name="AlatBahanGenap[]" value="">'+
                                                                                        '<input type="hidden"  class="form-control  id_kdGenap'+i+'" name="id_AlatBahanGenap[]" value="'+response.s_genap[0].id+'">'+
                                                                                        '<div class="invalid-feedback d-none invalid_alat_bahan" tyle="margin-left: 41px;">A&B tidak boleh kosong</div>'+
                                                                                    
                                                                                    
                                                                                     //  <button class="btn btn-sm btn-danger">X</button>'+
                                                                                    '</div>'+
                                                                                   '</div>'+
                                                                                 '</div>'+
                                                                               '</div>'+
                                                                               '<div class="form-group col-sm-4">'+
                                                                                '<label>Sumber Belajar</label>'+
                                                                                '<button class="btn btn-sm btn-success ml-5 mb-2 mt-2" id="more_SumberBelajarGenap'+i+'">add more</button>'+
                                                                                '<div class="row SumberBelajar_fieldGenap'+i+'">'+
                                                                                 '<div class="col-6 mb-1">'+
                                                                                  '<div class="input-group">'+
                                                                                      '<input type="text"  class="form-control input_sumber_belajar " name="SumberBelajarGenap[]" value="">'+
                                                                                      '<input type="hidden"  class="form-control  id_kdGenap'+i+'" name="id_SumberBelajarGenap[]" value="'+response.s_genap[0].id+'">'+
                                                                                      '<div class="invalid-feedback d-none invalid_sumber_belajar" tyle="margin-left: 41px;">Sumber Belajar tidak boleh kosong</div>'+
                                                                                      //  <button class="btn btn-sm btn-danger">X</button>'+
                                                                                  '</div>'+
                                                                                 '</div>'+
                                                                                '</div>'+
                                                                             '</div>'+

                                                                               '<div class="form-group col-sm-4">'+ 
                                                                                '<label>Keterangan</label>'+
                                                                                 '<div class="input-group">'+
                                                                                 
                                                                                     '<textarea type="text" id="" class="form-control input_keterangan" name="keterangan[]" id="" style="height: 70px;"></textarea>'+
                                                                                '<div class="invalid-feedback d-none invalid_keterangan" tyle="margin-left: 41px;">Keterangan  tidak boleh kosong</div>'+            
                                                                                '</div>'+
                                                                             '</div>'+
                                                            '</div>'+
                                                        '</td>'+
                                                        '<td class="text-center" rowspan="1">'+
                                                             // <button class="btn btn-danger x_s_ganjil" id="x_s_ganjil">X</button>' + 
                                                        
                                                        '</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                '</tr>'+
                                          '</tr>'
                                      )

                                        var ab = 1;
                            $('#more_AlatBahanGenap'+i+'').click(function(e){
                                e.preventDefault();

                                // if(x < max_fields){
                                    // console.log(x)
                                    ab++; //text box increment
                                    $('.AlatBahan_fieldGenap'+i+'').append(
                                        
                                                    '<div class="col-6">'+
                                                     '<div class="input-group mb-1">'+
                                                         '<input type="text"  class="form-control input_AlatBahan " name="AlatBahanGenap[]" value="" >'+
                                                         '<input type="hidden"  class="form-control input_AlatBahan id_kdGenap'+i+'" name="id_AlatBahanGenap[]" value="'+response.s_genap[0].id+'">'+

                                                         '<button class="btn btn-sm btn-danger removebtn_AlatBahan">X</button>'+
                                                        //  '<div class="invalid-feedback d-none invalid_metode_pembelajaran" tyle="margin-left: 41px;">Metode Pembelajaran tidak boleh kosong</div>' +

                                                     '</div>'+
                                                    '</div>'
                                        );
                                        console.log(ab+'AlatBahan');

                            });    
                            $('.AlatBahan_fieldGenap'+i+'').on("click",".removebtn_AlatBahan", function(e){ //user click on remove text
                                e.preventDefault(); $(this).parent('div').parent('div').remove(); --ab;
                              });
                              
                              var sb = 1;
                            $('#more_SumberBelajarGenap'+i+'').click(function(e){
                                e.preventDefault();

                                // if(x < max_fields){
                                    // console.log(x)
                                    sb++; //text box increment
                                    $('.SumberBelajar_fieldGenap'+i+'').append(
                                        
                                                    '<div class="col-6">'+
                                                     '<div class="input-group mb-1">'+
                                                         '<input type="text"  class="form-control input_SumberBelajar " name="SumberBelajarGenap[]" value="" >'+
                                                         '<input type="hidden"  class="form-control input_SumberBelajar id_kdGanjil'+i+'" name="id_SumberBelajarGenap[]" value="'+response.s_genap[0].id+'">'+

                                                         '<button class="btn btn-sm btn-danger removebtn_SumberBelajar">X</button>'+
                                                        //  '<div class="invalid-feedback d-none invalid_metode_pembelajaran" tyle="margin-left: 41px;">Metode Pembelajaran tidak boleh kosong</div>' +

                                                     '</div>'+
                                                    '</div>'
                                        );
                                                    console.log(sb+'SumberBelajar');
                            });    
                            $('.SumberBelajar_fieldGenap'+i+'').on("click",".removebtn_SumberBelajar", function(e){ //user click on remove text
                                e.preventDefault(); $(this).parent('div').parent('div').remove(); --sb;
                              });
                            
                            
                            



                            $(".s_genap"+i+'').on('change', function(){  
                            var val = $(".s_genap"+i+'').val();
                                $(".id_kdGenap"+i+'').val(val);
                                // console.log(x)
                            });


                 
                   

                       
                        select();
                        remove_tr();

                        var no = 0;
                        $('.addbtn_multiple_semester_genap').click(function (e) {
                            e.preventDefault();
                            Genapcounter++;
                            no++;
                            console.log(Genapcounter+"Genapcounter");
                            // console.log(no+"no");
                            $('.fields_multiple_semester_genap').append(
                                '<tr>'+
                                               '<tr>'+
                                                     '<td scope="row" rowspan="1">#</td>'+
                                                        '<td rowspan="2">'+
                                                                '<select name="kd_genap[]"  style="width:100%;heigth:100%" class="form-control s_genap'+Genapcounter+'" id="s_genap'+Genapcounter+'">'+
                                                                
                                                                '</select>'+
                                                            // {{-- // <div class="invalid-feedback d-none invalid_modelPembelajaran" tyle="margin-left: 41px;">Kompetensi inti tidak boleh kosong</div>' + --}}
                                                            '<div class="row mt-4 mb-4">'+
                                                                '<div class="form-group col-sm-4">'+
                                                                    '<label>Bukti</label>'+
                                                                     '<div class="input-group">'+
                                                                     
                                                                         '<textarea type="text" id="" class="form-control input_bukti" name="bukti[]" id="" style="height: 70px;"></textarea>'+
                                                                    '<div class="invalid-feedback d-none invalid_bukti" tyle="margin-left: 41px;">Bukti  tidak boleh kosong</div>'+
                                                                    
                                                                     '</div>'+
                                                                 '</div>'+
                                                                    '<div class="form-group col-sm-4">'+
                                                                       '<label>Ketuntasan</label>'+
                                                                        '<div class="input-group">'+
                                                                        
                                                                            '<textarea type="text" id="" class="form-control input_ketuntasan" name="ketuntasan[]" id="" style="height: 70px;"></textarea>'+
                                                                       '<div class="invalid-feedback d-none invalid_ketuntasan" tyle="margin-left: 41px;">Ketuntasan  tidak boleh kosong</div>'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                    '<div class="form-group col-sm-4">'+
                                                                       '<label>Jumlah Pertemuan</label>'+
                                                                         '<div class="input-group">'+
                                                                            '<input type="text" id="" class="form-control input_jumlah_pertemuan " name="jumlah_pertemuan[]" id="" style="height: 30px; width:  70px;">'+
                                                                             '<div class="invalid-feedback d-none invalid_jumlah_pertemuan" tyle="margin-left: 41px;">Jumlah Pertemuan tidak boleh kosong</div>'+
                                                                        '</div>'+ 
                                                                    '</div>'+
                                                            '</div>'+

                                                            '<div class="row mt-4 mb-4">'+
                                                                               '<div class="form-group col-sm-4">'+
                                                                                  '<label>Alat & Bahan</label>'+
                                                                                  '<button class="btn btn-sm btn-success ml-5 mb-2 mt-2" id="more_AlatBahanGenap'+Genapcounter+'">add more</button>'+
                                                                            
                                                                                  '<div class="row AlatBahan_fieldGenap'+Genapcounter+'">'+
                                                                                   '<div class="col-6 mb-1">'+
                                                                                    '<div class="input-group">'+
                                                                                        '<input type="text"  class="form-control input_alat_bahan " name="AlatBahanGenap[]" value="">'+
                                                                                        '<input type="hidden"  class="form-control  id_kdGenap'+Genapcounter+'" name="id_AlatBahanGenap[]" value="'+response.s_genap[0].id+'">'+
                                                                                    
                                                                                        '<div class="invalid-feedback d-none invalid_alat_bahan" tyle="margin-left: 41px;">A&B tidak boleh kosong</div>'+
                                                                                    
                                                                                     //  <button class="btn btn-sm btn-danger">X</button>'+
                                                                                    '</div>'+
                                                                                   '</div>'+
                                                                                 '</div>'+
                                                                               '</div>'+
                                                                               '<div class="form-group col-sm-4">'+
                                                                                '<label>Sumber Belajar</label>'+
                                                                                '<button class="btn btn-sm btn-success ml-5 mb-2 mt-2" id="more_SumberBelajarGenap'+Genapcounter+'">add more</button>'+
                                                                                '<div class="row SumberBelajar_fieldGenap'+Genapcounter+'">'+
                                                                                 '<div class="col-6 mb-1">'+
                                                                                  '<div class="input-group">'+
                                                                                      '<input type="text"  class="form-control input_sumber_belajar " name="SumberBelajarGenap[]" value="">'+
                                                                                      '<input type="hidden"  class="form-control  id_kdGenap'+Genapcounter+'" name="id_SumberBelajarGenap[]" value="'+response.s_genap[0].id+'">'+
                                                                                      '<div class="invalid-feedback d-none invalid_sumber_belajar" tyle="margin-left: 41px;">Sumber Belajar tidak boleh kosong</div>'+
                                                                                      //  <button class="btn btn-sm btn-danger">X</button>'+
                                                                                  '</div>'+
                                                                                 '</div>'+
                                                                                '</div>'+
                                                                             '</div>'+
                                                                             '<div class="form-group col-sm-4">'+ 
                                                                                '<label>Keterangan</label>'+
                                                                                 '<div class="input-group">'+
                                                                                 
                                                                                     '<textarea type="text" id="" class="form-control input_keterangan" name="keterangan[]" id="" style="height: 70px;"></textarea>'+
                                                                                '<div class="invalid-feedback d-none invalid_keterangan" tyle="margin-left: 41px;">Keterangan  tidak boleh kosong</div>'+            
                                                                                '</div>'+
                                                                             '</div>'+
                                                            '</div>'+
                                                        '</td>'+
                                                        '<td class="text-center" rowspan="1">'+
                                                             // <button class="btn btn-danger x_s_ganjil" id="x_s_ganjil">X</button>' + 
                                                        
                                                        '</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                '</tr>'+
                                          '</tr>'

                                )
                                var ab = 1;
                            $('#more_AlatBahanGenap'+Genapcounter+'').click(function(e){
                                e.preventDefault();

                                // if(x < max_fields){
                                    // console.log(x)
                                    ab++; //text box increment
                                    $('.AlatBahan_fieldGenap'+Genapcounter+'').append(
                                        
                                                    '<div class="col-6">'+
                                                     '<div class="input-group mb-1">'+
                                                         '<input type="text"  class="form-control input_alat_bahan " name="AlatBahanGenap[]" value="" >'+
                                                         '<input type="hidden"  class="form-control  id_kdGenap'+Genapcounter+'" name="id_AlatBahanGenap[]" value="'+response.s_genap[0].id+'">'+

                                                         '<button class="btn btn-sm btn-danger removebtn_AlatBahan">X</button>'+
                                                         '<div class="invalid-feedback d-none invalid_alat_bahan" tyle="margin-left: 41px;">Metode Pembelajaran tidak boleh kosong</div>' +

                                                     '</div>'+
                                                    '</div>'
                                        );
                                        console.log(ab+'AlatBahan');

                            });    
                            $('.AlatBahan_fieldGenap'+Genapcounter+'').on("click",".removebtn_AlatBahan", function(e){ //user click on remove text
                                e.preventDefault(); $(this).parent('div').parent('div').remove(); --ab;
                              });
                              
                              var sb = 1;
                            $('#more_SumberBelajarGenap'+Genapcounter+'').click(function(e){
                                e.preventDefault();

                                // if(x < max_fields){
                                    // console.log(x)
                                    sb++; //text box increment
                                    $('.SumberBelajar_fieldGenap'+Genapcounter+'').append(
                                        
                                                    '<div class="col-6">'+
                                                     '<div class="input-group mb-1">'+
                                                         '<input type="text"  class="form-control input_sumber_belajar " name="SumberBelajarGenap[]" value="" >'+
                                                         '<input type="hidden"  class="form-control  id_kdGenap'+Genapcounter+'" name="id_SumberBelajarGenap[]" value="'+response.s_ganjil[0].id+'">'+

                                                         '<button class="btn btn-sm btn-danger removebtn_SumberBelajar">X</button>'+
                                                         '<div class="invalid-feedback d-none invalid_sumber_belajar" tyle="margin-left: 41px;">Metode Pembelajaran tidak boleh kosong</div>' +

                                                     '</div>'+
                                                    '</div>'
                                        );
                                                    console.log(sb+'SumberBelajar');
                            });    
                            $('.SumberBelajar_fieldGenap'+Genapcounter+'').on("click",".removebtn_SumberBelajar", function(e){ //user click on remove text
                                e.preventDefault(); $(this).parent('div').parent('div').remove(); --sb;
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
            input_bukti = document.querySelectorAll(".input_bukti");
            invalid_bukti = document.querySelectorAll(".invalid_bukti"); // validasi

            input_ketuntasan = document.querySelectorAll(".input_ketuntasan");
            invalid_ketuntasan = document.querySelectorAll(".invalid_ketuntasan"); // validasi

            input_jumlah_pertemuan = document.querySelectorAll(".input_jumlah_pertemuan");
            invalid_jumlah_pertemuan = document.querySelectorAll(".invalid_jumlah_pertemuan"); // validasi
            

            input_alat_bahan = document.querySelectorAll(".input_alat_bahan");
            invalid_alat_bahan = document.querySelectorAll(".invalid_alat_bahan"); // validasi

            input_sumber_belajar = document.querySelectorAll(".input_sumber_belajar");
            invalid_sumber_belajar = document.querySelectorAll(".invalid_sumber_belajar"); // validasi

            // input_keterangan = document.querySelectorAll(".input_keterangan");
            // invalid_keterangan = document.querySelectorAll(".invalid_keterangan"); // validasi
            // keterangan_model_pembelajaran = document.querySelectorAll(".keterangan_model_pembelajaran");
            // invalid_keterangan_model_pembelajaran = document.querySelectorAll(
            //     ".invalid_keterangan_model_pembelajaran"); // validasi
            // bukti = document.querySelectorAll(".input_bukti");
            // invalid_bukti = document.querySelectorAll(".invalid_bukti"); // validasi
            // kompetensi = document.querySelectorAll(".input_modelPembelajaran");
            //mapel invalid_modelPembelajaran = document.querySelectorAll(".invalid_modelPembelajaran"); // validasi

            // jika function validasinya 0 atau undified maka akan ke submit dan jika tidak maka akan valdasi ( manggil fucntion nya )
            if (!validasi_jurusan()   && !validasi_bukti()  && !validasi_ketuntasan()  && !validasi_jumlah_pertemuan()  && !validasi_mapel()  && !validasi_alat_bahan() && !validasi_sumber_belajar()) 
            {
                $('#form').submit();
            } else {
                validasi_jurusan()
                validasi_bukti();
                validasi_ketuntasan();
                validasi_jumlah_pertemuan();
                validasi_mapel();
                validasi_alat_bahan();
                validasi_sumber_belajar();
                // validasi_keterangan();
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

            function validasi_bukti(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // keterangan de
                input_bukti.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_bukti')
                            .removeClass(
                                'd-none'
                            ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_bukti')
                            .addClass(
                                'd-none'
                            ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_ketuntasan(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // target kkid
                input_ketuntasan.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_ketuntasan').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_ketuntasan').addClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }


            function validasi_jumlah_pertemuan(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // bukti
                input_jumlah_pertemuan.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_jumlah_pertemuan').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_jumlah_pertemuan').addClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }
            function validasi_alat_bahan(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // bukti
                input_alat_bahan.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_alat_bahan').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_alat_bahan').addClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }
            function validasi_sumber_belajar(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // bukti
                input_sumber_belajar.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_sumber_belajar').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_sumber_belajar').addClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }
            // function validasi_keterangan(params) {
            //     // buat ngidung ada berapa yang kena validasi
            //     count_erorr = [];
            //     // bukti
            //     input_keterangan.forEach(element => {
            //         // jika elemnt nya kosong
            //         if (!element.value) {
            //             // lalu add class
            //             $(element).addClass('is-invalid');
            //             $(element).closest('div').find('.invalid_keterangan').removeClass(
            //                 'd-none'
            //             ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
            //             // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
            //             count_erorr += 1
            //         } else {
            //             $(element).removeClass('is-invalid');
            //             $(element).closest('div').find('.invalid_keterangan').addClass(
            //                 'd-none'
            //             ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
            //         }
            //     });
            //     // return panjang dari collection atau array
            //     return count_erorr.length;
            // }

       

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
