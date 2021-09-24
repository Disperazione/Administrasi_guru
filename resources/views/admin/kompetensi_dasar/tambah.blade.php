@extends('layout.master')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .card-bawah{
        
    }
</style>
@endpush
@section('title', 'SIFOS | Add Kompetensi Dasar')
@section('judul','Add Data Kompetensi Dasar')
@section('breadcrump')
    {{-- breadcrump here --}}
    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
    <div class="breadcrumb-item">Kompetensi Dasar</div>
@endsection
@section('main')
    {{-- content here --}}

    <div class="card">
        <div class="card-header">
            <h4><i class="fas fa-align-justify"></i> Tambah Data Kompetensi Dasar</h4>
        </div>
        <div class="card-body">
            <div>
               
            </div>
            <form id="form" action="{{route('admin.kompetensi_dasar.store')}}" method="POST">
                @csrf
                 {{-- datatenagapendidik --}}
            <div class="row">
                <div class="col-sm-6">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Mata Pelajaran</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Bidang Keahlian</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-align-justify"></i>
                            </div>
                          </div>
                          <input id="mapel" name="mapel" type="text" class="form-control" value="">
                             <div class="invalid-feedback">
                                Bidang Keahlian tidak boleh koosng
                             </div>
                        </div>

                    </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-align-justify"></i>
                                </div>
                              </div>
                              <input id="kelas" name="kelas" type="text" class="form-control" value="">
                              <div class="invalid-feedback">
                                Kelas tidak boleh koosng
                             </div>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>Jam Pelajaran</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-align-justify"></i>
                                </div>
                              </div>
                              <input id="jam_pelajaran" name="jam_pelajaran" type="text" class="form-control" value="">
                              <div class="invalid-feedback">
                                Jam Pelajaran tidak boleh koosng
                             </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">.</h4>
                    </div>
                    <div class="card-body">
                        {{-- <div class="form-group">
                            <label>Mata Pelajaran</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-align-justify"></i>
                                </div>
                              </div>
                              <input name="mapel" type="text" class="form-control" value="">
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label>Total Waktu</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-align-justify"></i>
                                </div>
                              </div>
                              <input disabled id="total_waktu_jam_pelajaran" name="total_waktu_jam_pelajaran" type="text" class="form-control" value="">
                              <div class="invalid-feedback">
                                Total waktu tidak boleh koosng
                             </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-align-justify"></i>
                                </div>
                              </div>
                              <select type="text" name="jurusan[]" id="jurusan" class="form-control @error('id_jurusan') is-invalid @endif" multiple="multiple" data-id="">
                                    {{-- <option value="">-- Pilih Jurusan --</option> --}}
                                    @foreach ($jurusan as $key => $item)
                                    <option value="{{ $item->id }}" >
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
            </div>
            {{-- datatenagapendidik --}}

            {{-- card --}}
            <div class="fields_komda">
                <div class="card card-primary" style="box-shadow: 0 4px 15px 0 rgba(0,0,0,0.2);">
                    <div class="card-header">
                        <h4>KD</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label>KD Pengetahuan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <input id="kd_pengetahuan" name="kd_pengetahuan[]" type="text"  class="form-control input_kd_pengetahuan" value="" >
                                    <div class="invalid-feedback d-none invalid_kd_pengetahuan"> 
                                        KD Pengetajuan tidak boleh kosong  
                                    </div>   
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                            <label>KD Keterampilan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="far fa-sticky-note"></i>
                                    </div>
                                </div>
                                <input id="kd_keterampilan" name="kd_keterampilan[]" type="text"  class="form-control input_kd_keterampilan" value="">
                                <div class="invalid-feedback d-none invalid_kd_keterampilan"> 
                                    KD Keterampilan tidak boleh kosong  
                                </div>  
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Materi Inti</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <textarea id="materi_inti" name="materi_inti[]" type="text"  class="form-control input_materi_inti"  style="height: 90px;"></textarea>
                                    <div class="invalid-feedback d-none invalid_materi_inti"> 
                                        Materi Inti tidak boleh kosong  
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label>keterangan Pengetahuan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <input id="keterangan_pengetahuan" name="keterangan_pengetahuan[]" type="text" class="form-control input_keterangan_pengetahuan" value="" >
                                    <div class="invalid-feedback d-none invalid_keterangan_pengetahuan"> 
                                        Keterangan Pengetahuan  tidak boleh kosong  
                                    </div>  
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                            <label>Keterangan Keterampilan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="far fa-sticky-note"></i>
                                    </div>
                                </div>
                                <input id="keterangan_keterampilan" name="keterangan_keterampilan[]" type="text"  class="form-control input_keterangan_keterampilan" value="" >
                                <div class="invalid-feedback d-none invalid_keterangan_keterampilan"> 
                                    Keterangan Keterampilan  tidak boleh kosong  
                                </div>  
                            </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <div class="row">
                                        <div class="col-md-6">
                                            <label>Durasi</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="far fa-sticky-note"></i>
                                                    </div>
                                                </div>
                                                <input id="durasi" name="durasi[]" type="text"  class="form-control input_durasi" value="" >
                                                <div class="invalid-feedback d-none invalid_durasi"> 
                                                     Durasi  tidak boleh kosong  
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Jam Pelajaran</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="far fa-sticky-note"></i>
                                                    </div>
                                                </div>
                                                <input id="jam_pelajaran" name="jam_pelajaran[]" type="text"  class="form-control jam_pelajaran" value="" >
                                                <div class="invalid-feedback d-none invalid_jam_pelajaran"> 
                                                    Jam Pelajaran   tidak boleh kosong  
                                                </div>  
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label>Pertemuan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <input id="pertemuan" name="pertemuan[]" type="text"  class="form-control input_pertemuan"   value="">
                                    <div class="invalid-feedback d-none invalid_pertemuan"> 
                                        Keterangan Pertemuan  tidak boleh kosong  
                                    </div>  

                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                            <label>Semester</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-align-left"></i>
                                </div>
                                </div>
                                <select id="semester" name="semester[]" class="form-control input_semester">
                                    <option selected>Lihat Lebih Lanjut</option>
                                    <option value="Ganjil" >Ganjil</option>
                                    <option value="Genap" >Genap</option>
                                </select>
                                <div class="invalid-feedback d-none invalid_semester"> 
                                    Keterangan Semester  tidak boleh kosong  
                                </div>  

                            </div>
                            </div>
                            <div class="form-group col-sm-4">
                            <label>Semester KD</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="far fa-sticky-note"></i>
                                    </div>
                                </div>
                                <input  id="semester_kd" name="semester_kd[]" type="text"  class="form-control input_semester_kd"  value="" >
                                <div class="invalid-feedback d-none invalid_semester_kd"> 
                                    Keterangan Semester KD    tidak boleh kosong  
                                </div> 
                            </div>
                            </div>
                        </div>

                        <div class="row">

                        </div>



                    </div>
                </div>
                
            </div>
            {{-- card --}}
            {{-- field --}}
            <div class="row">
              <button class="btn btn-success btn-block addbtn_komda" >Fields <i class="fas fa-plus"></i></button>
              </div>
          </div>

            {{-- button --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="modal-footer">
                            <button id="button" class="btn btn-primary">Submit</button>
                            <a href="{{route('admin.kompetensi_dasar.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- button --}}
            </form>
        </div>
    </div>


@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    // multiple
    $(document).ready(function() {
        $('#jurusan').select2();
        var id_jurusan = $('#jurusan').data('id'); // ambil data id dari jurusan
        $('#jurusan').val(id_jurusan).trigger("change");
      
        // var max_fields      = 10;
        var max_fields      = 10;
        var wrapper   		= $(".fields_komda");
        var add_button      = $(".addbtn_komda");

        var x = 1;
        var y = 17;
        $(add_button).click(function(e){
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                y++;
               

                $(wrapper).append('<div class="card card-primary" style="box-shadow: 0 4px 15px 0 rgba(0,0,0,0.2);">'+
                    '<div class="card-header">'+
                        '<h4>KD</h4>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<div class="row">'+
                            '<div class="form-group col-sm-4">'+
                                '<label>KD Pengetahuan</label>'+
                                '<div class="input-group">'+
                                    '<div class="input-group-prepend">'+
                                        '<div class="input-group-text">'+
                                            '<i class="far fa-sticky-note"></i>'+
                                        '</div>'+
                                    '</div>'+
                                    '<input id="kd_pengetahuan" name="kd_pengetahuan[]" type="text"  class="form-control input_kd_pengetahuan"  >'+
                                    
                                    '<div class="invalid-feedback d-none invalid_kd_pengetahuan">' +
                                     'KD Pengetajuan tidak boleh kosong'+  
                                     '</div>'+     
                                '</div>'+
                            '</div>'+
                            '<div class="form-group col-sm-4">'+
                              '<label>KD Keterampilan</label>'+
                              '<div class="input-group">'+
                                 ' <div class="input-group-prepend">'+
                                      '<div class="input-group-text">'+
                                          '<i class="far fa-sticky-note"></i>'+
                                      '</div>'+
                                  '</div>'+
                                  '<input id="kd_keterampilan" name="kd_keterampilan[]" type="text"  class="form-control input_kd_keterampilan"  >'+
                                  
                                  '<div class="invalid-feedback d-none invalid_kd_keterampilan">' +
                                 'KD Keterampilan tidak boleh kosong'+  
                                 '</div>'+ 
                              '</div>'+
                            '</div>'+
                            '<div class="form-group col-sm-4">'+
                                '<label>Materi Inti</label>'+
                                '<div class="input-group">'+
                                    '<div class="input-group-prepend">'+
                                        '<div class="input-group-text">'+
                                            '<i class="far fa-sticky-note"></i>'+
                                        '</div>'+
                                    '</div>'+
                                   ' <textarea id="materi_inti" name="materi_inti[]" type="text"  class="form-control input_materi_inti" style="height: 90px;"></textarea>'+
                                  
                                   '<div class="invalid-feedback d-none invalid_materi_inti">' +
                                 'Materi inti tidak boleh kosong'+  
                                 '</div>'+ 
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="form-group col-sm-4">'+
                                '<label>keterangan Pengetahuan</label>'+
                                '<div class="input-group">'+
                                    '<div class="input-group-prepend">'+
                                        '<div class="input-group-text">'+
                                            '<i class="far fa-sticky-note"></i>'+
                                        '</div>'+
                                    '</div>'+
                                    '<input id="keterangan_pengetahuan" name="keterangan_pengetahuan[]" type="text" class="form-control input_keterangan_pengetahuan" >'+
                                  
                                    '<div class="invalid-feedback d-none invalid_keterangan_pengetahuan">' +
                                     'Keterangan Pengetahuan tidak boleh kosong'+  
                                     '</div>'+ 
                                '</div>'+
                            '</div>'+
                            '<div class="form-group col-sm-4">'+
                              '<label>Keterangan Keterampilan</label>'+
                             ' <div class="input-group">'+
                                  '<div class="input-group-prepend">'+
                                      '<div class="input-group-text">'+
                                          '<i class="far fa-sticky-note"></i>'+
                                      '</div>'+
                                  '</div>'+
                                  '<input id="keterangan_keterampilan" name="keterangan_keterampilan[]" type="text" class="form-control input_keterangan_keterampilan" >'+
                                  
                                  '<div class="invalid-feedback d-none invalid_keterangan_keterampilan">' +
                                 'Keterangan Keterampilan tidak boleh kosong'+  
                                 '</div>'+ 
                              '</div>'+
                            '</div>'+
                            '<div class="form-group col-sm-4">'+
                                '<div class="row">'+ 
                                        '<div class="col-md-6">'+
                                            '<label>Durasi</label>'+
                                            '<div class="input-group">'+
                                                '<div class="input-group-prepend">'+
                                                    '<div class="input-group-text">'+
                                                        '<i class="far fa-sticky-note"></i>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<input id="durasi" name="durasi[]" type="text"  class="form-control input_durasi" value="">'+
                                                '<div class="invalid-feedback d-none invalid_durasi">'+ 
                                                    'Durasi  tidak boleh kosong  '+
                                                '</div>'+  
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                            '<label>Jam Pelajaran</label>'+
                                            '<div class="input-group">'+
                                                '<div class="input-group-prepend">'+
                                                    '<div class="input-group-text">'+
                                                        '<i class="far fa-sticky-note"></i>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<input id="jam_pelajaran" name="jam_pelajaran[]" type="text"  class="form-control jam_pelajaran" value="" >'+
                                                '<div class="invalid-feedback d-none invalid_jam_pelajaran"> '+
                                                    'Jam Pelajaran   tidak boleh kosong  '+
                                                '</div>'+  
                                            '</div>'+
                                        '</div>'+
                                '</div>'+
                            '</div>'+
                       ' </div>'+
                        '<div class="row">'+
                          '<div class="form-group col-sm-2">'+
                                    '<div class="" style="margin-top: 32px;">'+
                                        '<button class="btn btn-danger removebtn_komda"><i class="fas fa-times"></i></button>'+
                                    '</div>'+
                                '</div>'+
                            '<div class="form-group col-sm-2">'+
                               ' <label>Pertemuan</label>'+
                                '<div class="input-group">'+
                                   ' <div class="input-group-prepend">'+
                                       ' <div class="input-group-text">'+
                                            '<i class="far fa-sticky-note"></i>'+
                                       ' </div>'+
                                    '</div>'+
                                    '<input id="pertemuan" name="pertemuan[]" type="text"  class="form-control input_pertemuan" >'+
                                 
                                    '<div class="invalid-feedback d-none invalid_pertemuan">' +
                                     'Pertemuan tidak boleh kosong'+  
                                     '</div>'+ 
                                '</div>'+
                            '</div>'+
                            '<div class="form-group col-sm-4">'+
                              '<label>Semester</label>'+
                              '<div class="input-group">'+
                               ' <div class="input-group-prepend">'+
                                  '<div class="input-group-text">'+
                                     ' <i class="fas fa-align-left"></i>'+
                                  '</div>'+
                               ' </div>'+
                               '<select id="semester" name="semester[]" class="form-control input_semester">'+
                                  '<option selected>Lihat Lebih Lanjut</option>'+
                                  '<option value="Ganjil">Ganjil</option>'+
                                  '<option value="Genap">Genap</option>'+
                                '</select>'+
                                
                                '<div class="invalid-feedback d-none invalid_semester">' +
                                 ' Semester tidak boleh kosong'+  
                                 '</div>'+ 
                             ' </div>'+
                          '</div>'+
                          '<div class="form-group col-sm-4">'+
                            '<label>Semester KD</label>'+
                            '<div class="input-group">'+
                                '<div class="input-group-prepend">'+
                                    '<div class="input-group-text">'+
                                        '<i class="far fa-sticky-note"></i>'+
                                    '</div>'+
                                '</div>'+
                                '<input id="semester_kd" name="semester_kd[]" type="text"  class="form-control input_semester_kd"  >'+
                                
                                '<div class="invalid-feedback d-none semester_kd">' +
                                 'Semester KD tidak boleh kosong'+  
                                 '</div>'+ 
                            '</div>'+
                        '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>');
            }
        });

        $(wrapper).on("click",".removebtn_komda", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').parent('div').parent('div').parent('div').parent('div').remove(); x--;
        })
    });



    $('#button').click(function (e) {
            e.preventDefault();
            jurusan = $('#jurusan').val();
            kelas = $('#kelas').val();
            mapel = $('#mapel').val(); // ambil value dari mapel
            jamPelajaran = $('#jam_pelajaran').val();
            // totalJamPelajaran = $('#total_waktu_jam_pelajaran').val(); // ambil value dari mapel
            // ambil collection input by id ( hasilnya collection jadi tinggal di loop )
            kd_pengetahuan = document.querySelectorAll(".input_kd_pengetahuan");
            invalid_kd_pengetahuan = document.querySelectorAll(".invalid_kd_pengetahuan"); // validasi

            kd_keterampilan = document.querySelectorAll(".input_kd_keterampilan");
            invalid_kd_keterampilan = document.querySelectorAll(".invalid_kd_keterampilan"); // validasi

            materi_inti = document.querySelectorAll(".input_materi_inti");
            invalid_materi_inti = document.querySelectorAll(".invalid_materi_inti"); // validasi
            
            keterangan_pengetahuan = document.querySelectorAll(".input_keterangan_pengetahuan");
            invalid_keterangan_pengetahuan = document.querySelectorAll(".invalid_keterangan_pengetahuan"); // validasi

            keterangan_keterampilan = document.querySelectorAll(".input_keterangan_keterampilan");
            invalid_keterangan_keterampilan = document.querySelectorAll(".invalid_keterangan_keterampilan"); // validasi
            
            durasi = document.querySelectorAll(".input_durasi");
            invalid_durasi = document.querySelectorAll(".invalid_durasi"); // validasi

            jam_pelajaran = document.querySelectorAll(".jam_pelajaran");
            invalid_jam_pelajaran = document.querySelectorAll(".invalid_jam_pelajaran"); // validasi



            pertemuan = document.querySelectorAll(".input_pertemuan");
            invalid_pertemuan = document.querySelectorAll(".invalid_pertemuan"); // validasi

            semester = document.querySelectorAll(".input_semester");
            invalid_semester = document.querySelectorAll(".invalid_semester"); // validasi

            semester_kd = document.querySelectorAll(".input_semester_kd");
            invalid_semester_kd = document.querySelectorAll(".invalid_semester_kd"); // validasi

            // jika function validasinya 0 atau undified maka akan ke submit dan jika tidak maka akan valdasi ( manggil fucntion nya )
            if (!validasi_jurusan() && !validasi_kelas() && !
                validasi_jam_pelajaran() 
                && !validasi_mapel() && !validasi_kd_pengetahuan() && !validasi_kd_keterampilan() && !validasi_materi_inti() && !validasi_keterangan_pengetahuan() && !validasi_keterangan_keterampilan() && !validasi_durasi() && !validasi_pertemuan() && !validasi_semester() && !validasi_semester_kd()
                
                ) 
                {
                $('#form').submit();
            } else {
                validasi_jurusan()
                validasi_mapel();
                validasi_kelas();
                validasi_jam_pelajaran();
                validasi_kd_pengetahuan();
                validasi_kd_keterampilan();
                validasi_materi_inti();
                validasi_keterangan_pengetahuan();
                validasi_keterangan_keterampilan();
                validasi_durasi();
                validasi_pertemuan();
                validasi_semester();
                validasi_semester_kd();
            };

            // function validasi_guru() {
            //     // buat ngidung ada berapa yang kena validasi
            //     count_erorr = [];
            //     if (!guru) {
            //         $('#id_guru').addClass('is-invalid'); // Ad class is-invalid
            //         $('#id_guru').closest('div').find('.invalid-feedback').removeClass(
            //             'd-none'
            //         ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
            //         count_erorr += 1
            //     } else {
            //         $('#id_guru').removeClass('is-invalid').removeClass('is-invalid');
            //         $('#id_guru').closest('div').find('.invalid-feedback').addClass(
            //             'd-none'
            //         ); // cari div terdekat dan cari class nya find = cari lalu add class d-none
            //     }
            //     // return panjang dari collection atau array
            //     return count_erorr.length;
            // }
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
            function validasi_kelas() {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                if (!kelas) {
                    $('#kelas').addClass('is-invalid'); // Ad class is-invalid
                    $('#kelas').closest('div').find('.invalid-feedback').removeClass(
                        'd-none'
                    ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    count_erorr += 1
                } else {
                    $('#kelas').removeClass('is-invalid').removeClass('is-invalid');
                    $('#kelas').closest('div').find('.invalid-feedback').addClass(
                        'd-none'
                    ); // cari div terdekat dan cari class nya find = cari lalu add class d-none
                }
                // return panjang dari collection atau array
                return count_erorr.length;
            }
            function validasi_mapel() {
                // buat ngidung ada berapa yang kena validasi
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
          
            // function validasi_total_waktu_jam_pelajaran() {
            //     // buat ngidung ada berapa yang kena validasi
            //     count_erorr = [];
            //     if (!totalJamPelajaran) {
            //         $('#total_waktu_jam_pelajaran').addClass('is-invalid'); // Ad class is-invalid
            //         $('#total_waktu_jam_pelajaran').closest('div').find('.invalid-feedback').removeClass(
            //             'd-none'
            //         ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
            //         count_erorr += 1
            //     } else {
            //         $('#total_waktu_jam_pelajaran').removeClass('is-invalid').removeClass('is-invalid');
            //         $('#total_waktu_jam_pelajaran').closest('div').find('.invalid-feedback').addClass(
            //             'd-none'
            //         ); // cari div terdekat dan cari class nya find = cari lalu add class d-none
            //     }
            //     // return panjang dari collection atau array
            //     return count_erorr.length;
            // }


      
            function validasi_kd_pengetahuan() {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // loop target mapel untuk mencari isi dari collection nya
                // target mapel
                kd_pengetahuan.forEach(element => {
                    // jika elemnt nya koong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid'); // Ad class is-invalid
                        $(element).closest('div').find('.invalid_kd_pengetahuan').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid').removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_kd_pengetahuan').addClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu add class d-none
                    }
                });

                // return panjang dari collection atau array
                return count_erorr.length;
            }
            function validasi_kd_keterampilan() {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // loop target mapel untuk mencari isi dari collection nya
                // target mapel
                kd_keterampilan.forEach(element => {
                    // jika elemnt nya koong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid'); // Ad class is-invalid
                        $(element).closest('div').find('.invalid_kd_keterampilan').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid').removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_kd_keterampilan').addClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu add class d-none
                    }
                });

                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_materi_inti(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // keterangan mapel
                materi_inti.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_materi_inti')
                            .removeClass(
                                'd-none'
                            ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_materi_inti')
                            .addClass(
                                'd-none'
                            ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_keterangan_pengetahuan(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // target kkid
                keterangan_pengetahuan.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_keterangan_pengetahuan').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_keterangan_pengetahuan').addClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }
            function validasi_keterangan_keterampilan(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // target kkid
                keterangan_keterampilan.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_keterangan_keterampilan').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_keterangan_keterampilan').addClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_durasi(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // keterangan kkid
                durasi.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_durasi')
                            .removeClass(
                                'd-none'
                            ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_durasi')
                            .addClass(
                                'd-none'
                            ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }
            function validasi_jam_pelajaran(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // keterangan kkid
                jam_pelajaran.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_jam_pelajaran')
                            .removeClass(
                                'd-none'
                            ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_jam_pelajaran')
                            .addClass(
                                'd-none'
                            ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_pertemuan(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // bukti
                pertemuan.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_pertemuan').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_pertemuan').addClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_semester(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // semester
                semester.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_semester').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_semester').addClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }
            function validasi_semester_kd(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // semester_kd
                semester_kd.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_semester_kd').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_semester_kd').addClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }



            // kalau gasuka make loop foreach bis amake for speerti ini
            // for ( i = 0; i < target_mapel.i; i++) {
            //     $(target_mapel[index]).addClass('is-invalid');
            // }
        });
</script>
@endpush
