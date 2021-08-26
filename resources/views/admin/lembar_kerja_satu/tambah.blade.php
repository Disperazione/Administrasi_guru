@extends('layout.master')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('title', 'SIFOS | Add Data LK 1')
@section('judul','Add Data Lembar Kerja 1')
@section('breadcrump')
{{-- breadcrump here --}}
<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
<div class="breadcrumb-item">LK 1</div>
@endsection
@section('main')
{{-- content here --}}

<div class="card">
    <div class="card-header">
        <h4><i class="fas fa-align-justify"></i> Tambah Data Lembar Kerja 1</h4>
    </div>
    <div class="card-body">
        <div>
            <h6 class="card-title">Pada bagian ini, cantumkan data pribadi tenaga pendidik serta mencantumkan mata
                pelajaran yang di ampu.</h6>
        </div>
        <form id="form" class="form" action="{{ route('admin.Lembar-kerja-1.store') }}" method="POST">
            @csrf
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
                        {{-- <div class="form-group">
                            <label>Kompetensi Keahlian</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-justify"></i>
                                    </div>
                                </div>
                                <input type="text" id="kompetensi" class="form-control" disabled>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label>Jam Pelajaran (JP)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-justify"></i>
                                    </div>
                                </div>
                                <input type="text" id="jp" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Total Jam Pelajaran (JP)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-justify"></i>
                                    </div>
                                </div>
                                <input type="text" id="total_jp" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- datatenagapendidik --}}


            {{-- card kompetensidasar --}}
            <div class="fields_kompetensidasar">
                <div class="">
                    <div class="card-header">
                        <h4>Daftar Kompetensi Dasar Semester : </h4>
                        <select id="" class="form-select form-control ml-2" style="width: 130px;">
                            <option>Ganjil</option>
                            <option>Genap</option>
                        </select>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-2">
                                <label>No KD.</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="" class="form-control" disabled placeholder="3.17">
                                </div>
                            </div>
                            <div class="form-group col-sm-5">
                                <label>Kompetensi Dasar (Pengetahuan)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <textarea type="text" id="" class="form-control" name="" id="" style="height: 90px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-sm-5">
                                <label>Durasi</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="" class="form-control" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-2">
                                <label>No KD.</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="" class="form-control" disabled placeholder="4.17">
                                </div>
                            </div>
                            <div class="form-group col-sm-5">
                                <label>Kompetensi Dasar (Keterampilan)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <textarea type="text" id="" class="form-control" name="" id="" style="height: 90px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-sm-5">
                                <label>Pertemuan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="" class="form-control" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-2"></div>
                            <div class="form-group col-sm-5">
                                <label>Semester</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="" class="form-control" name="" id="">
                                </div>
                            </div>
                            <div class="form-group col-sm-5">
                                <label>Jumlah Jam</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="" class="form-control" name="" id="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-success addbtn_kompetensidasar" style="margin-top: -100px; margin-left: 29px;">Fields <i class="fas fa-plus"></i></button>
            {{-- card kompetensidasar --}}


            {{-- card kompetensiinti --}}
            <div class="mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Kompetensi Inti</h4>
                    </div>
                    <div class="card-body fields_multiple_kompetensi">
                        <div class="row">
                            <div class="form-group col-sm-2">
                                <label>No</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="" class="form-control" disabled placeholder="1.">
                                </div>
                            </div>
                            <div class="form-group col-sm-8">
                                <label>Kompetensi Inti</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <textarea type="text" id="" class="form-control input_kompetensi" name="kompetensi[]" style="height: 60px;"></textarea>
                                    <div class="invalid-feedback d-none invalid_kompetensi" style="margin-left: 41px;">
                                        Kompetensi inti tidak boleh kosong
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group col-sm-2">
                                <button class="btn btn-danger removebtn_multiple_kompetensi" style="margin-top: 45px;">X</button>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success addbtn_multiple_kompetensi" style="margin-top: -100px;">Fields <i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
            {{-- card kompetensiinti --}}


            {{-- card mapel&ket --}}
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <h4>Target Mata Pelajaran</h4>
                    </div>
                    <div class="fields_multiple_mapel">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-2">
                                    <label>No</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="far fa-sticky-note"></i>
                                            </div>
                                        </div>
                                        <input type="text" id="" class="form-control" disabled placeholder="1.">
                                    </div>
                                </div>
                                <div class="form-group col-sm-8">
                                    <label>Target Mapel</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="far fa-sticky-note"></i>
                                            </div>
                                        </div>
                                        <textarea type="text" class="form-control input_target_mapel" name="target_mapel[]" style="height: 60px;"></textarea>
                                        <div class="invalid-feedback d-none invalid_target_mapel">
                                            Target mapel tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-2">
                                    {{-- <button class="btn btn-danger removebtn_multiple_mapel" style="margin-top: 5px;">X</button> --}}
                                </div>
                                <div class="form-group col-sm-8">
                                    <label for="">Keterangan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="far fa-sticky-note"></i>
                                            </div>
                                        </div>
                                        <textarea type="text" class="form-control keterangan_target_mapel" name="keterangan_mapel[]" style="height: 60px;"></textarea>
                                        <div class="invalid-feedback d-none invalid_keterangan_target_mapel">
                                            Keteragan mapel tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success addbtn_multiple_mapel" style="margin-top: -100px;">Fields <i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
            {{-- card mapel&ket --}}


            {{-- card kkid&ket --}}
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <h4>Target Mata Pelajaran KKID</h4>
                    </div>
                    <div class="fields_multiple_kkid">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-2">
                                    <label>No</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="far fa-sticky-note"></i>
                                            </div>
                                        </div>
                                        <input type="text" id="" class="form-control" disabled placeholder="1.">
                                    </div>
                                </div>
                                <div class="form-group col-sm-8">
                                    <label>Target Mapel KKID</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="far fa-sticky-note"></i>
                                            </div>
                                        </div>
                                        <textarea type="text" class="form-control input_pencapaian_kkid" name="target_kkid[]" style="height: 60px;"></textarea>
                                        <div class="invalid-feedback d-none invalid_pencapaian_kkid">
                                            Target mapel KKID tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-2">
                                    {{-- <button class="btn btn-danger removebtn_multiple_kkid" style="margin-top: 5px;">X</button> --}}
                                </div>
                                <div class="form-group col-sm-8">
                                    <label for="">Keterangan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="far fa-sticky-note"></i>
                                            </div>
                                        </div>
                                        <textarea type="text" class="form-control keterangan_pencapaian_kkid" name="keterangan_kkid[]" style="height: 40px;"></textarea>
                                        <div class="invalid-feedback d-none invalid_keterangan_pencapaian_kkid">
                                            Keteragan KKID tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success addbtn_multiple_kkid" style="margin-top: -100px;">Fields <i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
            {{-- card kkid&ket --}}


            {{-- card buktisiswa --}}
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <h4>Rincian Bukti Siswa</h4>
                    </div>
                    <div class="fields_multiple_bukti">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-2">
                                    <label>No</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="far fa-sticky-note"></i>
                                            </div>
                                        </div>
                                        <input type="text" id="" class="form-control" disabled placeholder="1.">
                                    </div>
                                </div>
                                <div class="form-group col-sm-8">
                                    <label>Rincian Bukti</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="far fa-sticky-note"></i>
                                            </div>
                                        </div>
                                        <textarea type="text" class="form-control input_bukti" name="bukti[]" style="height: 60px;"></textarea>
                                        <div class="invalid-feedback d-none invalid_bukti" style="margin-left: 41px;">
                                            Rincian bukti tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-2">
                                    <button class="btn btn-danger removebtn_multiple_bukti" style="margin-top: 40px;">X</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success addbtn_multiple_bukti" style="margin-top: -100px;">Fields <i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
            {{-- card buktisiswa --}}


            {{-- button --}}
            <div class="col-sm-12">
                <div class="card-body">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary button" id="button">Submit</button>
                    <a href="{{ route('admin.Lembar-kerja-1.index') }}" class="btn btn-danger">Cancel</a>
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
    // multiple input mapel
    $(document).ready(function () {
        $('#mapel').select2();
        $('#jurusan').select2();

        multiple_card();
        multiple_select_kd_ganjil();
        multiple_select_kd_genap();
        multiple_input_mapel();
        multiple_input_kkid();
        multiple_input_bukti_siswa();
        multiple_input_kompetensi();



        function multiple_select_kd_ganjil() {
            $i = 1;

        }

        function multiple_select_kd_genap() {
            $i = 1;

        }

        // multiple kompetensi
        function multiple_card() {
            var max_fields      = 10;
            var wrapper   		= $(".fields_kompetensidasar");
            var add_button      = $(".addbtn_kompetensidasar");

            var x = 1;
            var y = 17;
            $(add_button).click(function(e){
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    y++;
                    $(wrapper).append('<div class="">'+
                            '<div class="card-header">'+
                                '<h4>'+x+'. Strategi Pembelajaran Semester : </h4>'+
                                '<select id="" class="form-select form-control ml-2" style="width: 130px;">'+
                                    '<option>Ganjil</option>'+
                                    '<option>Genap</option>'+
                                '</select>'+
                            '</div>'+
                            '<div class="card-body">'+
                                '<div class="row">'+
                                    '<div class="form-group col-sm-2">'+
                                        '<label>No KD.</label>'+
                                        '<div class="input-group">'+
                                            '<div class="input-group-prepend">'+
                                                '<div class="input-group-text">'+
                                                    '<i class="far fa-sticky-note"></i>'+
                                                '</div>'+
                                            '</div>'+
                                            '<input type="text" id="" class="form-control" disabled placeholder="3.'+y+'">'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="form-group col-sm-5">'+
                                        '<label>Kompetensi Dasar</label>'+
                                        '<div class="input-group">'+
                                            '<div class="input-group-prepend">'+
                                                '<div class="input-group-text">'+
                                                    '<i class="far fa-sticky-note"></i>'+
                                                '</div>'+
                                            '</div>'+
                                            '<textarea type="text" id="" class="form-control" name="" id="" style="height: 90px;"></textarea>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="form-group col-sm-5">'+
                                        '<label>Model Pembelajaran</label>'+
                                        '<div class="input-group">'+
                                            '<div class="input-group-prepend">'+
                                                '<div class="input-group-text">'+
                                                    '<i class="far fa-sticky-note"></i>'+
                                                '</div>'+
                                            '</div>'+
                                            '<textarea type="text" id="" class="form-control" name="" id="" style="height: 90px;"></textarea>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="row">'+
                                    '<div class="form-group col-sm-2">'+
                                        '<label>No KD.</label>'+
                                        '<div class="input-group">'+
                                            '<div class="input-group-prepend">'+
                                                '<div class="input-group-text">'+
                                                    '<i class="far fa-sticky-note"></i>'+
                                                '</div>'+
                                            '</div>'+
                                            '<input type="text" id="" class="form-control" disabled placeholder="4.'+y+'">'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="form-group col-sm-5">'+
                                        '<label>Kompetensi Dasar</label>'+
                                        '<div class="input-group">'+
                                            '<div class="input-group-prepend">'+
                                                '<div class="input-group-text">'+
                                                    '<i class="far fa-sticky-note"></i>'+
                                                '</div>'+
                                            '</div>'+
                                            '<textarea type="text" id="" class="form-control" name="" id="" style="height: 90px;"></textarea>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="form-group col-sm-5">'+
                                        '<label>Metode Pembelajaran</label>'+
                                        '<div class="input-group">'+
                                            '<div class="input-group-prepend">'+
                                                '<div class="input-group-text">'+
                                                    '<i class="far fa-sticky-note"></i>'+
                                                '</div>'+
                                            '</div>'+
                                            '<textarea type="text" id="" class="form-control" name="" id="" style="height: 90px;"></textarea>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="row">'+
                                    '<div class="form-group col-sm-2">'+
                                        '<div class="" style="margin-top: 32px;">'+
                                            '<button class="btn btn-danger removebtn_kompetensidasar"><i class="fas fa-times"></i></button>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="form-group col-sm-5">'+
                                        '<label>Deskripsi Kegiatan</label>'+
                                        '<div class="input-group">'+
                                            '<div class="input-group-prepend">'+
                                                '<div class="input-group-text">'+
                                                    '<i class="far fa-sticky-note"></i>'+
                                                '</div>'+
                                            '</div>'+
                                            '<textarea type="text" id="" class="form-control" name="" id="" style="height: 90px;"></textarea>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>');
                }
            });

            $(wrapper).on("click",".removebtn_kompetensidasar", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').parent('div').parent('div').parent('div').parent('div').remove(); x--;
            })
        }

        // multiple kompetensi inti
        function multiple_input_kompetensi() {
            var max_fields = 10;
            var wrapper = $(".fields_multiple_kompetensi");
            var add_button = $(".addbtn_multiple_kompetensi");

            var x = 1;
            $(add_button).click(function (e) {
                e.preventDefault();
                if (x < max_fields) {
                    x++;
                    $(wrapper).append('<div class="row">'+
                            '<div class="form-group col-sm-2">'+
                                '<label>No</label>'+
                                '<div class="input-group">'+
                                    '<div class="input-group-prepend">'+
                                        '<div class="input-group-text">'+
                                            '<i class="far fa-sticky-note"></i>'+
                                        '</div>'+
                                    '</div>'+
                                    '<input type="text" id="" class="form-control" disabled placeholder="'+x+'.">'+
                                '</div>'+
                            '</div>'+
                            '<div class="form-group col-sm-8">'+
                                '<label>Kompetensi Inti</label>'+
                                '<div class="input-group">'+
                                    '<div class="input-group-prepend">'+
                                        '<div class="input-group-text">'+
                                            '<i class="far fa-sticky-note"></i>'+
                                        '</div>'+
                                   '</div>'+
                                    '<textarea type="text" id="" class="form-control input_kompetensi" name="kompetensi[]" style="height: 60px;"></textarea>'+
                                    '<div class="invalid-feedback d-none invalid_kompetensi" style="margin-left: 41px;">'+
                                        'Kompetensi inti tidak boleh kosong'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="form-group col-sm-2">'+
                                '<button class="btn btn-danger removebtn_multiple_kompetensi" style="margin-top: 45px;">X</button>'+
                            '</div>'+
                        '</div>');

                        // '<tr>' +
                        // '<th scope="row">' + x + '</th>' +
                        // '<td>' +
                        // '<textarea type="text" class="form-control input_kompetensi" name="kompetensi[]" style="height: 40px;"></textarea>' +
                        // '<div class="invalid-feedback d-none invalid_kompetensi" style="margin-left: 41px;">' +
                        // 'Kompetensi inti tidak boleh kosong' +
                        // '</div>' +
                        // '</td>' +
                        // '<td class="text-center">' +
                        // '<button class="btn btn-danger ml-4 removebtn_multiple_kompetensi"><i class="fas fa-times"></i></button>' +
                        // '</td>' +
                        // '</tr>'

                    // '<div class="input-group mt-3">' +
                    // '<input type="text" class="form-control col-8 input_kompetensi" style="margin-left: 41px;" name="kompetensi[]">' +
                    // '<button class="btn btn-danger ml-4 removebtn_multiple_kompetensi"><i class="fas fa-times"></i></button>' +
                    // '<div class="invalid-feedback d-none invalid_kompetensi" style="margin-left: 41px;">' +
                    // 'Kompetensi inti boleh kosong' +
                    // '</div>' +
                    // '</div>'
                }
            });

            $(wrapper).on("click", ".removebtn_multiple_kompetensi", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').parent('div').remove();
                x--;
            });
        }

        // multiple target mapel
        function multiple_input_mapel() {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".fields_multiple_mapel"); //Fields wrapper
            var add_button = $(".addbtn_multiple_mapel"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="card-body" id="mapel ' + x + ' " data-id="mapel ' + x + ' ">'+
                            '<div class="row">'+
                                '<div class="form-group col-sm-2">'+
                                    '<label>No</label>'+
                                    '<div class="input-group">'+
                                        '<div class="input-group-prepend">'+
                                            '<div class="input-group-text">'+
                                                '<i class="far fa-sticky-note"></i>'+
                                            '</div>'+
                                        '</div>'+
                                        '<input type="text" id="" class="form-control" disabled placeholder="'+x+'.">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group col-sm-8">'+
                                    '<label>Target Mapel</label>'+
                                    '<div class="input-group">'+
                                        '<div class="input-group-prepend">'+
                                            '<div class="input-group-text">'+
                                                '<i class="far fa-sticky-note"></i>'+
                                            '</div>'+
                                        '</div>'+
                                        '<textarea type="text" class="form-control input_target_mapel" name="target_mapel[]" style="height: 60px;"></textarea>'+
                                        '<div class="invalid-feedback d-none invalid_target_mapel">'+
                                            'Target mapel tidak boleh kosong'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="row">'+
                                '<div class="form-group col-sm-2">'+
                                    '<button class="btn btn-danger removebtn_multiple_mapel" style="margin-top: 5px;">X</button>'+
                                '</div>'+
                                '<div class="form-group col-sm-8">'+
                                    '<div class="input-group">'+
                                        '<div class="input-group-prepend">'+
                                            '<div class="input-group-text">'+
                                                '<i class="far fa-sticky-note"></i>'+
                                            '</div>'+
                                        '</div>'+
                                        '<textarea type="text" class="form-control keterangan_target_mapel" name="keterangan_mapel[]" style="height: 60px;"></textarea>'+
                                        '<div class="invalid-feedback d-none invalid_keterangan_target_mapel">'+
                                            'Keteragan mapel tidak boleh kosong'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>');




                        // '<tr id="mapel ' + x + ' " data-id="mapel ' + x + ' ">' +
                        // '<th scope="row"> ' + x + ' </th>' +
                        // '<td>' +
                        // '<textarea type="text" class="form-control input_target_mapel" data-input=" ' +
                        // x + ' " name="target_mapel[]" style="height: 40px;"></textarea>' +
                        // '<div class="invalid-feedback d-none invalid_target_mapel">' +
                        // 'Target mapel tidak boleh kosong' +
                        // '</div>' +
                        // '</td>' +
                        // '<td>' +
                        // '<textarea type="text" class="form-control keterangan_target_mapel" name="keterangan_mapel[]" style="height: 40px;"></textarea>' +
                        // '<div class="invalid-feedback d-none invalid_keterangan_target_mapel">' +
                        // 'Keteragan mapel tidak boleh kosong' +
                        // '</div>' +
                        // '</td>' +
                        // '<td class="text-center">' +
                        // '<button class="btn btn-danger removebtn_multiple_maple"><i class="fas fa-times"></i></button>' +
                        // '</td>' +
                        // '</tr>'
                }
            });

            $(wrapper).on("click", ".removebtn_multiple_mapel", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').parent('div').parent('div').remove();
                x--;
            })
        }

        // multiple mapel kkid
        function multiple_input_kkid() {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".fields_multiple_kkid"); //Fields wrapper
            var add_button = $(".addbtn_multiple_kkid"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append(
                        '<div class="card-body" id="kkid ' + x + ' " data-id="kkid ' + x + ' ">'+
                            '<div class="row">'+
                                '<div class="form-group col-sm-2">'+
                                    '<label>No</label>'+
                                    '<div class="input-group">'+
                                        '<div class="input-group-prepend">'+
                                            '<div class="input-group-text">'+
                                                '<i class="far fa-sticky-note"></i>'+
                                            '</div>'+
                                        '</div>'+
                                        '<input type="text" id="" class="form-control" disabled placeholder="'+x+'.">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group col-sm-8">'+
                                    '<label>Target Mapel KKID</label>'+
                                    '<div class="input-group">'+
                                        '<div class="input-group-prepend">'+
                                            '<div class="input-group-text">'+
                                                '<i class="far fa-sticky-note"></i>'+
                                            '</div>'+
                                        '</div>'+
                                        '<textarea type="text" class="form-control input_pencapaian_kkid" name="target_kkid[]" style="height: 60px;"></textarea>'+
                                        '<div class="invalid-feedback d-none invalid_pencapaian_kkid">'+
                                            'Target mapel KKID tidak boleh kosong'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="row">'+
                                '<div class="form-group col-sm-2">'+
                                    '<button class="btn btn-danger removebtn_multiple_kkid" style="margin-top: 5px;">X</button>'+
                                '</div>'+
                                '<div class="form-group col-sm-8">'+
                                    '<label for="">Keterangan</label>'+
                                    '<div class="input-group">'+
                                        '<div class="input-group-prepend">'+
                                            '<div class="input-group-text">'+
                                                '<i class="far fa-sticky-note"></i>'+
                                            '</div>'+
                                        '</div>'+
                                        '<textarea type="text" class="form-control keterangan_pencapaian_kkid" name="keterangan_kkid[]" style="height: 60px;"></textarea>'+
                                        '<div class="invalid-feedback d-none invalid_keterangan_pencapaian_kkid">'+
                                            'Keteragan KKID tidak boleh kosong'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>');



                        // '<tr >' +
                        // '<th scope="row"> ' + x + ' </th>' +
                        // '<td>' +
                        // '<textarea type="text" class="form-control input_pencapaian_kkid" name="target_kkid[]" style="height: 40px;"></textarea>' +
                        // '<div class="invalid-feedback d-none invalid_pencapaian_kkid">' +
                        // 'Target mapel KKID tidak boleh kosong' +
                        // '</div>' +
                        // '</td>' +
                        // '<td>' +
                        // '<textarea type="text" class="form-control keterangan_pencapaian_kkid" name="keterangan_kkid[]" style="height: 40px;"></textarea>' +
                        // '<div class="invalid-feedback d-none invalid_keterangan_pencapaian_kkid">' +
                        // 'Keteragan KKID tidak boleh kosong' +
                        // '</div>' +
                        // '</td>' +'
                        // '<td class="text-center">' +
                        // '<button class="btn btn-danger removebtn_multiple_kkid"><i class="fas fa-times"></i></button>' +
                        // '</td>' +
                        // '</tr>'

                    // '<div id="kkid ' + x + '" data-id="kkid ' + x + '"">' +
                    // '<label class="mt-3">Pencapaian KKID ' + x + '</label>' +
                    // '<div class="input-group">' +
                    // '<div class="input-group">' +
                    // '<div class="input-group-prepend">' +
                    // '<div class="input-group-text">' +
                    // '<i class="fas fa-book"></i>' +
                    // '</div>' +
                    // '</div>' +
                    // '<input type="text" class="form-control input_pencapaian_kkid" name="target_kkid[]">' +
                    // '<div class="invalid-feedback  invalid_pencapaian_kkid">' +
                    // 'Pencapaian KKID tidak boleh kosong' +
                    // '</div>' +
                    // '</div>' +
                    // '  <label class="mt-3">Keterangan ' + x + '</label>' +
                    // '<div class="input-group">' +
                    // '<div class="input-group-prepend">' +
                    // '<div class="input-group-text">' +
                    // '<i class="fas fa-book"></i>' +
                    // '</div>' +
                    // '</div>' +
                    // '<input type="text" class="form-control col-10 keterangan_pencapaian_kkid" name="keterangan_kkid[]">' +
                    // '<button class="btn btn-danger ml-4 removebtn_multiple_kkid"><i class="fas fa-times"></i></button>' +
                    // '<div class="invalid-feedback d-none invalid_keterangan_pencapaian_kkid">' +
                    // 'Keterangan tidak boleh kosong' +
                    // '</div>' +
                    // '</div>' +
                    // '</div>'

                }
            });
            $(wrapper).on("click", ".removebtn_multiple_kkid", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').parent('div').parent('div').remove();
                x--;
            })
        }

        // multiple bukti siswa
        function multiple_input_bukti_siswa() {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".fields_multiple_bukti"); //Fields wrapper
            var add_button = $(".addbtn_multiple_bukti"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="card-body">'+
                            '<div class="row">'+
                                '<div class="form-group col-sm-2">'+
                                    '<label>No</label>'+
                                    '<div class="input-group">'+
                                        '<div class="input-group-prepend">'+
                                            '<div class="input-group-text">'+
                                                '<i class="far fa-sticky-note"></i>'+
                                            '</div>'+
                                        '</div>'+
                                        '<input type="text" id="" class="form-control" disabled placeholder="'+x+'.">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group col-sm-8">'+
                                    '<label>Rincian Bukti</label>'+
                                    '<div class="input-group">'+
                                        '<div class="input-group-prepend">'+
                                            '<div class="input-group-text">'+
                                                '<i class="far fa-sticky-note"></i>'+
                                            '</div>'+
                                        '</div>'+
                                        '<textarea type="text" class="form-control input_bukti" name="bukti[]" style="height: 60px;"></textarea>'+
                                        '<div class="invalid-feedback d-none invalid_bukti" style="margin-left: 41px;">'+
                                            'Rincian bukti tidak boleh kosong'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group col-sm-2">'+
                                    '<button class="btn btn-danger removebtn_multiple_bukti" style="margin-top: 40px;">X</button>'+
                                '</div>'+
                            '</div>'+
                        '</div>');



                        // '<tr>' +
                        // '<th scope="row">' + x + '</th>' +
                        // '<td>' +
                        // '<textarea type="text" class="form-control input_bukti" name="bukti[]" style="height: 40px;"></textarea>' +
                        // '<div class="invalid-feedback d-none invalid_bukti" style="margin-left: 41px;">' +
                        // 'Rincian bukti tidak boleh kosong' +
                        // '</div>' +
                        // '</td>' +
                        // '<td class="text-center">' +
                        // '<button class="btn btn-danger removebtn_multiple_bukti"><i class="fas fa-times"></i></button>' +
                        // '</td>' +
                        // '</tr>'
                    // '<div class="input-group mt-3">' +
                    // '<input type="text" class="form-control col-8 input_bukti" style="margin-left: 41px;" name="bukti[]">' +
                    // '<button class="btn btn-danger ml-4 removebtn_multiple_bukti"><i class="fas fa-times"></i></button>' +
                    // '<div class="invalid-feedback d-none invalid_bukti" style="margin-left: 41px;">' +
                    // 'Rincian bukti boleh kosong' +
                    // '</div>' +
                    // '</div>'
                }
            });

            $(wrapper).on("click", ".removebtn_multiple_bukti", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').parent('div').parent('div').remove();
                x--;
            });
        }







        // auto complete mapel
        // $('#jurusan').change(function () {
        //     id = $(this).val(); // mengambil value
        //     //console.log(id);
        //     $('#mapel').empty();
        //     $('#mapel').append('<option value="">mencari..</option>');
        //     $('.fields_multiple_semester_ganjil').empty(); // koosngin tabless
        //     $('.fields_multiple_semester_genap').empty();
        //     // call ajax untuk get / mendapatkan data
        //     if (!id) {
        //         $('#mapel').empty();
        //         $('#mapel').append('<option value="">Mata pelajaran kosong</option>');
        //     }
        //     $.ajax({
        //         url: '/admin/option/jurusan/' + id, // url
        //         type: 'get', // method
        //         success: function (response) {
        //             console.log(response.mapel);
        //             $('#mapel').empty();
        //             if (!response.mapel.length) {
        //                 $('#mapel').append(
        //                     '<option value="">Mata pelajaran kosong</option>');
        //             } else {
        //                 $('#mapel').append('<option value="">Lihat lebih lanjut</option>');
        //                 response.mapel.forEach(element => {
        //                     $('#mapel').append('<option value="' + element.id +
        //                         '">' + element.mapel + '</option>')
        //                 });
        //             }
        //         },
        //         fail: function (rsponse) {
        //             console.log(response);
        //         }
        //     });
        // });


        // mapel + status
        $('#mapel').change(function () {
            id = $(this).val(); // mengambil value
            $('#total_jp').val('')
            $('#jp').val('');
            $('#kelas').val('');
            $('#jurusan').val('').trigger('change');
            $.ajax({
                url: '/admin/option/mapel/' + id, // url
                type: 'get', // method
                success: function (response) {
                    $('.fields_multiple_semester_ganjil').empty();
                    $('.fields_multiple_semester_genap').empty();
                    console.log(response.mapel);
                    $('#total_jp').val(response.mapel.total_waktu_jam_pelajaran)
                    $('#jp').val(response.mapel.jam_pelajaran);
                    $('#kelas').val(response.mapel.kelas);
                    $('#jurusan').val(response.id_jurusan).trigger("change");
                    console.log(response.id_jurusan);
                    console.log(response.s_genap);
                    s_ganjil_multiple_input(); // table ganjil
                    s_genap_multiple_input(); // table genap

                function s_ganjil_multiple_input() {
                     counter = 0; // buat nentuin index aarray
                    for (let i = 0; i <= counter; i++) {
                        // append table
                        $('.fields_multiple_semester_ganjil').append(' <tr>' +
                            ' <td scope="row">#</td>' +
                            '<td>' +
                            '<select name="kd_ganjil[]" id="" style="width:100%;heigth:100%" class="form-control s_ganjil">' +
                            '</select>' +
                            '<div class="invalid-feedback d-none invalid_kompetensi" tyle="margin-left: 41px;">Kompetensi inti tidak boleh kosong</div>' +
                            '</td>' +
                            '<td class="text-center">' +
                            '<button class="btn btn-danger x_s_ganjil" id="x_s_ganjil">X</button>' +
                            '</td>' +
                            '</tr>')
                        select();
                        remove_tr();

                        $('.addbtn_multiple_semester_ganjil').click(function (e) {
                            e.preventDefault();
                            counter++;
                            $('.fields_multiple_semester_ganjil').append(' <tr>' +
                                ' <td scope="row">1</td>' +
                                '<td>' +
                                '<select name="kd_ganjil[]" id="" style="width:100%;heigth:100%" class="form-control s_ganjil">' +
                                '</select>' +
                                '<div class="invalid-feedback d-none invalid_kompetensi" tyle="margin-left: 41px;">Kompetensi inti tidak boleh kosong</div>' +
                                '</td>' +
                                '<td class="text-center">' +
                                '<button class="btn btn-danger x_s_ganjil" id="x_s_ganjil">X</button>' +
                                '</td>' +
                                '</tr>')
                            select();

                            //apus apeend dalem
                            $('.x_s_ganjil').click(function (e) {
                            e.preventDefault();
                            console.log('clicked');
                            $(this).parent('td').parent('tr').remove();
                            counter--;
                        })
                        })

                        // rmeove table
                        function remove_tr()
                        {
                            $('#x_s_ganjil').click(function (e) {
                            e.preventDefault();
                            $(this).parent('td').parent('tr').remove();
                            counter--;
                        })
                        }
                         // select
                        function select() {
                            response.s_ganjil.forEach(element => {
                                $('.s_ganjil').append('<option value="' + element
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
                     counter = 0; // buat nentuin index aarrayge
                    for (let i = 0; i <= counter; i++) {
                        // append table
                        $('.fields_multiple_semester_genap').append(' <tr>' +
                            ' <td scope="row">'+i+'</td>' +
                            '<td>' +
                            '<select name="kd_genap[]" id="" style="width:100%;heigth:100%" class="form-control s_genap">' +
                            '</select>' +
                            '<div class="invalid-feedback d-none invalid_kompetensi" tyle="margin-left: 41px;">Kompetensi inti tidak boleh kosong</div>' +
                            '</td>' +
                            '<td class="text-center">' +
                            '<button class="btn btn-danger x_s_genap" id="x_s_genap">X</button>' +
                            '</td>' +
                            '</tr>')
                        select();
                        remove_tr();

                        $('.addbtn_multiple_semester_genap').click(function (e) {
                            e.preventDefault();
                            counter++;
                            $('.fields_multiple_semester_genap').append(' <tr>' +
                                ' <td scope="row">#</td>' +
                                '<td>' +
                                '<select name="kd_genap[]" id="" style="width:100%;heigth:100%" class="form-control s_genap">' +
                                '</select>' +
                                '<div class="invalid-feedback d-none invalid_kompetensi" tyle="margin-left: 41px;">Kompetensi inti tidak boleh kosong</div>' +
                                '</td>' +
                                '<td class="text-center">' +
                                '<button class="btn btn-danger x_s_genap" id="x_s_genap">X</button>' +
                                '</td>' +
                                '</tr>')
                            select();

                            //apus apeend dalem
                            $('.x_s_genap').click(function (e) {
                            e.preventDefault();
                            console.log('clicked');
                            $(this).parent('td').parent('tr').remove();
                            counter--;
                        })
                        })

                        // rmeove table
                        function remove_tr()
                        {
                            $('#x_s_genap').click(function (e) {
                            e.preventDefault();
                            $(this).parent('td').parent('tr').remove();
                            counter--;
                        })
                        }
                         // select
                        function select() {
                            response.s_genap.forEach(element => {
                                $('.s_genap').append('<option value="' + element
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
            target_mapel = document.querySelectorAll(".input_target_mapel");
            invalid_target_mapel = document.querySelectorAll(".invalid_target_mapel"); // validasi
            keterangan_target_mapel = document.querySelectorAll(".keterangan_target_mapel");
            invalid_keterangan_target_mapel = document.querySelectorAll(
                ".invalid_keterangan_target_mapel"); // validasi
            pencapaian_kkid = document.querySelectorAll(".input_pencapaian_kkid");
            invalid_pencapaian_kkid = document.querySelectorAll(".invalid_pencapaian_kkid"); // validasi
            keterangan_pencapaian_kkid = document.querySelectorAll(".keterangan_pencapaian_kkid");
            invalid_keterangan_pencapaian_kkid = document.querySelectorAll(
                ".invalid_keterangan_pencapaian_kkid"); // validasi
            bukti = document.querySelectorAll(".input_bukti");
            invalid_bukti = document.querySelectorAll(".invalid_bukti"); // validasi
            kompetensi = document.querySelectorAll(".input_kompetensi");
            invalid_kompetensi = document.querySelectorAll(".invalid_kompetensi"); // validasi

            // jika function validasinya 0 atau undified maka akan ke submit dan jika tidak maka akan valdasi ( manggil fucntion nya )
            if (!validasi_jurusan() && !validasi_target_mapeL() && !
                validasi_keterangan_target_mapel() && !validasi_pencapaian_kkid() && !
                validasi_keteranga_pencapaian_kkid() && !validasi_rincian_butki() && !
                validasi_kompetensi() && !validasi_mapel()) {
                $('#form').submit();
            } else {
                validasi_jurusan()
                validasi_target_mapeL();
                validasi_keterangan_target_mapel();
                validasi_pencapaian_kkid();
                validasi_keteranga_pencapaian_kkid();
                validasi_rincian_butki();
                validasi_kompetensi();
                validasi_mapel();
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

            function validasi_target_mapeL() {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // loop target mapel untuk mencari isi dari collection nya
                // target mapel
                target_mapel.forEach(element => {
                    // jika elemnt nya koong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid'); // Ad class is-invalid
                        $(element).closest('div').find('.invalid_target_mapel').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid').removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_target_mapel').addClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu add class d-none
                    }
                });

                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_keterangan_target_mapel(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // keterangan mapel
                keterangan_target_mapel.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_keterangan_target_mapel')
                            .removeClass(
                                'd-none'
                            ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_keterangan_target_mapel')
                            .addClass(
                                'd-none'
                            ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_pencapaian_kkid(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // target kkid
                pencapaian_kkid.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_pencapaian_kkid').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_pencapaian_kkid').addClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_keteranga_pencapaian_kkid(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // keterangan kkid
                keterangan_pencapaian_kkid.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_keterangan_pencapaian_kkid')
                            .removeClass(
                                'd-none'
                            ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_keterangan_pencapaian_kkid')
                            .addClass(
                                'd-none'
                            ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_rincian_butki(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // bukti
                bukti.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_bukti').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_bukti').addClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_kompetensi(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // kompetensi
                kompetensi.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_kompetensi').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_kompetensi').addClass(
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
    });

</script>
@endpush
