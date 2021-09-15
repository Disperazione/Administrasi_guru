@extends('layout.master')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('title', 'SIFOS | Tambah RPP')
@section('judul','Tambah RPP')
@section('breadcrump')
{{-- breadcrump here --}}
<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.RPP.index') }}">RPP</a></div>
<div class="breadcrumb-item">Tambah RPP</div>

@endsection
@section('main')
{{-- content here --}}

<div class="card">
    <div class="card-header mt-2">
        <h4 class="pt-2"><i class="fas fa-align-justify mr-2"></i>Tambah Data RPP</h4>
    </div>
    <div class="card-body">
        <div class="col-lg-12">
            <form id="form" class="form" action="{{ route('admin.RPP.store') }}" method="POST" >
                @csrf
                <div class="card card-primary shadow">
                    <div class="card-header " style="min-height: 10%">

                    </div>
                    <div class="card-body">
                        <div class="row mb-5">
                            {{-- card col 1 --}}
                            <div class="col-6">
                                <div class="mb-3 col-lg-10">
                                    <label>Mata Pelajaran</label>
                                    <select name="bidang_stu"
                                        class="form-control   @error('bidang_stu')  is-invalid  @enderror"
                                        id="mapel" name="mapel">
                                        <option value="">--Cari Bidang Study--</option>
                                        @foreach ( $bidang as $bidangs )
                                            <option value="{{ $bidangs->id }}">{{ $bidangs->mapel }}</option>
                                        @endforeach
                                        </option>
                                    </select>
                                    <div class="invalid-feedback d-none">Mapel Tidak boleh kosong</div>
                                </div>
                                <div class="mb-3 col-lg-10">
                                    <label>Kompetensi Keahlian</label>
                                    <select value="" class="form-control input_rp keahlian"  name="keahlian"  id="keahlian" multiple="multiple" disabled>
                                        {{-- <option value="" selected>Kompetensi_keahlian</option> --}}
                                        @foreach ($jurusan as $item)
                                            <option value="{{ $item->id }}">{{ $item->singkatan_jurusan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- card col 2 --}}
                            <div class="col-6">
                            <div class="mb-3 col-lg-10">
                                <label>Waktu Pembelajaran</label>
                                <input type="text" class="form-control input_rp jam" id="total_waktu" disabled>
                            </div>
                            <div class="mb-3 col-lg-10">
                                <label for="">Jam Pelajaran</label>
                                <input type="text" class="form-control" id="_jam" disabled>
                            </div>
                            
                            </div>
                        </div>
                    </div>
                </div>


                <div class="rpp_flied card card-primary shadow">
                    <div class="card-header">
                        Kompetensi Dasar
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Kd pengetahuan</label>
                                <select id="kd_pengetahuan" class="form-control kd_pengetahuan" name="id_kd_pengethuan">
                                    <option value="">Kosong</option>
                                </select>
                                <div class="invalid-feedback d-none">Kd pengetahuan tidak boleh kosong</div>
                                <div class="card mt-3">
                                    <label for="">Ipk kd pengetahuan</label>
                                    <div class="row kd_pengetahuan_multiple" id="kd_pengetahuan_multiple">
                                        <span class="w-100">
                                            <input type="text" class="form-control w-75 ml-3 d-inline mr-2 ipk_pengetahuan " name="ipk_pengetahuan[]">
                                            <button type="button" class=" btn btn-success w-10 d-inline mr-2 "
                                                id="add_pengetahuan">+</button>
                                            {{-- <button type="button" class=" btn btn-danger w-10 d-inline"
                                            id="remove_pengetahuan">x</button> --}}
                                             <div  class="invalid-feedback d-none ml-3">Ipk pengetahuan tidak boleh kosong</div>
                                        </span>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="">Kd ketrampilan</label>
                                <select id="kd_ketrampilan" class="form-control d-block kd_ketrampilan"  name="id_kd_ketrampilan">
                                    <option value="">Kosong</option>
                                </select>
                                <div class="invalid-feedback d-none">Kd ketrampilan tidak boleh kosong</div>
                                <div class="card mt-3">
                                    <label for="">Ipk kd ketrampilan</label>
                                    <div class="row" id="kd_ketrampilan_multiple">
                                        <span class="w-100">
                                            <input type="text" class="form-control w-75 ml-3 d-inline mr-2 ipk_ketrampilan" name="ipk_ketrampilan[]">
                                            <button class=" btn btn-success w-10 d-inline mr-2"
                                                id="add_ketrampilan">+</button>
                                            <div  class="invalid-feedback d-none ml-3">Ipk ketrampilan tidak boleh kosong</div>
                                            {{-- <button class=" btn btn-danger w-10 d-inline" id="remove_ketrampilan">x</button> --}}
                                        </span>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card card-primary shadow">
                    <div class="card-header">
                        Pertemuan
                    </div>
                    <div class="card-body">
                        <label for="" class="ml-2">Pertemuan</label>
                        <div class="row mb-4" id="field_pertemuan">
                            <span class="w-100 ml-3">
                                <input type="text" class="form-control d-inline pertemuan" style="width: 85%" name="pertemuan[]" placeholder="Pertemuan ke-1 : Lorem ipsum..">
                                <button type="button" class="btn btn-success w-10 d-inline ml-3"
                                    id="add_pertemuan">+</button>
                                <div class="invalid-feedback d-none">Pertemuan tidak boleh kosong</div>
                            </span>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <div class="modal-footer">
                                <button id="button" class="btn btn-primary">Submit</button>
                                <a href="" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {

        // select 2
        $('#keahlian').select2();
        
        // multiple input funtion
        kd_pengetahuan_multiple();
        kd_ketrampilan_multiple();
        mulitple_pertemuan();
        selected_option(); // untuk selectec yang pengetahuan === ketrampilan ex 3.04 == 4.04

        // mapel selec dynamic
        $('#mapel').change(function(e){
            id = $(this).val(); // memngambil value mapel 
                $('#keahlian').val('').trigger('change'); 
                $('#_jam').val('');
                $('#total_waktu').val('');
                $('.kd_ketrampilan').empty();
                $('.kd_pengetahuan').empty();
            $.ajax({
                url: '/admin/option_mapel_rpp/'+id,
                type: 'GET',
                success: function (response) {
                    $('#keahlian').val(response.id_jurusan).trigger('change'); // menjadi selected jika id yang di option == id yang di trigger
                    $('#_jam').val(response.bidang.total_jam_pelajaran);
                    $('#total_waktu').val(response.bidang.total_waktu_jam_pelajaran);
                    console.log(response.bidang);
                    // apeend kd
                    response.kd.forEach(element =>{
                        $('.kd_pengetahuan').append('<option value="'+element.id+'">KD '+element.kd_pengetahuan+' '+element.keterangan_pengetahuan+'</option>');
                    });
                    
                    response.kd.forEach(element =>{
                        $('.kd_ketrampilan').append('<option value="'+element.id+'" >KD '+element.kd_ketrampilan+' '+element.keterangan_ketrampilan+'</option>');
                    });

                },
                fail: function (erorr) {
                    
                }
            })
        })

        // untuk selected valud
        function selected_option(params) {
            // jika pengetahuan berubah
            $('.kd_pengetahuan').change(function () {
                let this_pen = $(this).val(); 
                // selec option ketrampilan sesuai sama id dari pengetahuan
                $(".kd_ketrampilan option[value='"+this_pen+"']").attr("selected","selected");;
            })

            $('.kd_ketrampilan').change(function () {
                let this_ket = $(this).val();
                $(".kd_pengetahuan option[value='"+this_ket+"']").attr("selected","selected");;
            })

        }

        function kd_pengetahuan_multiple() {
            i = 0;
            $('body').on('click', '#add_pengetahuan', function (e) {
                e.preventDefault();
                i++;
                $('#kd_pengetahuan_multiple').append('<span class="w-100 mt-3">' +
                    '<input type="text" class="form-control w-75 ml-3 d-inline mr-2 ipk_pengetahuan" name="ipk_pengetahuan[]">' +
                    '<button class=" btn btn-success w-10 d-inline mr-2 " id="add_pengetahuan">+</button>' +
                    '<button class=" btn btn-danger w-10 d-inline"  id="remove_pengetahuan">x</button>"' +
                    '<div class="invalid-feedback ml-3 d-none">Ipk pengetahuan tidak boleh kosong</div>'+
                    '</span>');
            })
            $('body').on('click', '#remove_pengetahuan', function (e) {
                console.log('click');
                e.preventDefault();
                $(this).parent('span').remove(); // mencari parent nya
                i--; // kurangi index nya
            })
        }

        function kd_ketrampilan_multiple() {
            i = 0;
            $('body').on('click', '#add_ketrampilan', function (e) {
                e.preventDefault();
                i++;
                $('#kd_ketrampilan_multiple').append('<span class="w-100 mt-3">' +
                    '<input type="text" class="form-control w-75 ml-3 d-inline mr-2 ipk_ketrampilan" name="ipk_ketrampilan[]">' +
                    '<button class=" btn btn-success w-10 d-inline mr-2 " id="add_ketrampilan">+</button>' +
                    '<button class=" btn btn-danger w-10 d-inline"  id="remove_ketrampilan">x</button>"' +
                    '<div class="invalid-feedback ml-3 d-none">Ipk ketrampilan tidak boleh kosong</div>'+
                    '</span>');
            })
            $('body').on('click', '#remove_ketrampilan', function (e) {
                console.log('click');
                e.preventDefault();
                $(this).parent('span').remove(); // mencari parent nya
                i--; // kurangi index nya
            })
        }

        function mulitple_pertemuan() {
            i = 0;
            $('body').on('click', '#add_pertemuan', function (e) {
                e.preventDefault();
                i++;
                $('#field_pertemuan').append('<span class="w-100 ml-3 mt-2">' +
                    '  <input type="text" class="form-control d-inline pertemuan" style="width: 85%" name="pertemuan[]" placeholder="Pertemuan ke-1 : Lorem ipsum..">' +
                    ' <button class="btn btn-success w-10 d-inline ml-2" id="add_pertemuan">+</button>' +
                    ' <button class="btn btn-danger w-10 d-inline ml-3" id="remove_pertemuan">-</button>' +
                      '<div class="invalid-feedback d-none">Pertemuan tidak boleh kosong</div>'+
                    '</span>');

            });
            $('body').on('click', '#remove_pertemuan', function (e) {
                e.preventDefault();
                $(this).parent('span').remove();
                i--;
            });
        }

        // validation list here
        $('#button').click(function (e) {
            console.log('clicked');
            e.preventDefault();
            if (!validate_mapel() && !validate_select_ketrampilan() && !validate_select_pengetahuan() && !validate_ipk_pengetahuan() && !validate_ipk_ketrampilan() && !validate_pertemuan()) {
                $('.form').submit();
            }else{
                validate_mapel();   
                validate_select_pengetahuan();
                validate_select_ketrampilan();
                validate_ipk_pengetahuan();
                validate_ipk_ketrampilan();
                validate_pertemuan();
            }
        })

        // validasi mapel 
        function validate_mapel() {
            mapel = $('#mapel').val();
            console.log(mapel);
            arr_returned = [];
            if (!mapel) {
                $('#mapel').addClass('is-invalid');
                $('#mapel').closest('div').find('.invalid-feedback').removeClass('d-none');
                arr_returned += 1;
            }else{
                $('#mapel').removeClass('is-invalid');
                $('#mapel').closest('div').find('.invalid-feedback').addClass('d-none');
            }
            return arr_returned.length
        }

        function validate_select_pengetahuan(){
             mapel = $('#kd_pengetahuan ').val();
            arr_returned = [];
            if (!mapel) {
                $('#kd_pengetahuan ').addClass('is-invalid');
                $('#kd_pengetahuan ').closest('div').find('.invalid-feedback').removeClass('d-none');
                arr_returned += 1;
            }else{
                $('#kd_pengetahuan ').removeClass('is-invalid');
                $('#kd_pengetahuan ').closest('div').find('.invalid-feedback').addClass('d-none');
            }
            return arr_returned.length
        }

         function validate_select_ketrampilan(){
             mapel = $('#kd_ketrampilan').val();
            arr_returned = [];
            if (!mapel) {
                $('#kd_ketrampilan').addClass('is-invalid');
                $('#kd_ketrampilan').closest('div').find('.invalid-feedback').removeClass('d-none');
                arr_returned += 1;
            }else{
                $('#kd_ketrampilan').removeClass('is-invalid');
                $('#kd_ketrampilan').closest('div').find('.invalid-feedback').addClass('d-none');
            }
            return arr_returned.length
        }
        
        function validate_ipk_pengetahuan() {
            ipk = document.querySelectorAll('.ipk_pengetahuan');
            arr_returned = [];
            ipk.forEach(element => { // loop nodelist / collection
               if (!element.value) { // element itu elemnt dari node list nya
                    $(element).addClass('is-invalid');
                    $(element).closest('div').find('.invalid-feedback').removeClass('d-none');
                    arr_returned = [];
               } else{
                    $(element).removeClass('is-invalid');
                      $(element).closest('.invalid-feedback').addClass('d-none');
               }
            });
              return arr_returned.length
        }

        
        function validate_ipk_ketrampilan() {
            ipk = document.querySelectorAll('.ipk_ketrampilan');
            arr_returned = [];
            ipk.forEach(element => {
               if (!element.value) {
                    $(element).addClass('is-invalid');
                    $(element).closest('div').find('.invalid-feedback').removeClass('d-none');
                    arr_returned = [];
               } else{
                    $(element).removeClass('is-invalid');
                      $(element).closest('.invalid-feedback').addClass('d-none');
               }
            });
              return arr_returned.length
        }

        function validate_pertemuan() {
            pertemuan = document.querySelectorAll('.pertemuan');
            arr_returned = [];
            pertemuan.forEach(element => {
               if (!element.value) {
                    $(element).addClass('is-invalid');
                    $(element).closest('div').find('.invalid-feedback').removeClass('d-none');
                    arr_returned = [];
               } else{
                    $(element).removeClass('is-invalid');
                      $(element).closest('.invalid-feedback').addClass('d-none');
               }
            });
              return arr_returned.length
        }
    })

</script>
@endpush
