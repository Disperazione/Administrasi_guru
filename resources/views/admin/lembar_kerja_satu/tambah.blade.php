@extends('layout.master')
@push('css')

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
                                    {{ (Auth::user()->role == 'guru') ? 'disabled' : '' }} id="id_guru">
                                    <option value="">Lihat Lebih Lanjut</option>
                                    @foreach ($guru as $items)
                                    <option value="{{ $items->id }}"
                                        {{ (Auth::user()->role == 'guru' && Auth::user()->id == $items->id) ? 'selected' : '' }}>
                                        {{ $items->name }}</option>
                                    @endforeach
                                </select>
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
                                <select class="form-control" name="id_bidang_keahlian" id="bidang">
                                    <option value="">Lihat Lebih Lanjut</option>
                                    @foreach ($bidang as $bidangs)
                                    <option value="{{ $bidangs->id }}">{{ $bidangs->bidang_studi }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Bidang Studi tidak boleh koosng
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
                        <div class="form-group">
                            <label>Mata Pelajaran</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-justify"></i>
                                    </div>
                                </div>
                                <input type="text" id="mapel" class="form-control" disabled>
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
                                <input type="text" id="jp" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- datatenagapendidik --}}

            {{-- kompetensi inti --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Kompetensi Inti</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="text-center">
                              <tr>
                                <th scope="col" style="width: 10px;">NO.</th>
                                <th scope="col" style="width: 80%;">Kompetensi Isi</th>
                                <th scope="col" style="width: 10px;">
                                    <button class="btn btn-success addbtn_multiple_kompetensi" style="width: 80px;">Fields <i class="fas fa-plus"></i></button>
                                </th>
                              </tr>
                            </thead>
                            <tbody class="fields_multiple_kompetensi">
                              <div>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <textarea type="text" class="form-control input_kompetensi" name="kompetensi[]" style="height: 40px;"></textarea>
                                        <div class="invalid-feedback d-none invalid_kompetensi" style="margin-left: 41px;">
                                            Kompetensi inti tidak boleh kosong
                                        </div>
                                    </td>
                                    <td class="text-center">
                                    </td>
                                </tr>
                              </div>
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
            {{-- kompetensi inti --}}

            {{-- mapel&kkid --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Target Mata Pelajaran</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="text-center">
                              <tr>
                                <th scope="col" style="width: 10px;">NO.</th>
                                <th scope="col" style="width: 55%;">Target Mata Pelajaran</th>
                                <th scope="col" style="width: 20%;">Keterangan</th>
                                <th scope="col" style="width: 10px;">
                                    <button class="btn btn-success addbtn_multiple_maple" style="width: 80px;">Fields <i class="fas fa-plus"></i></button>
                                </th>
                              </tr>
                            </thead>
                            <tbody class="fields_multiple_mapel">
                              <div>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <textarea type="text" class="form-control input_target_mapel" name="target_mapel[]" style="height: 40px;"></textarea>
                                        {{-- validasi --}}
                                        <div class="invalid-feedback d-none invalid_target_mapel">
                                            Target mapel tidak boleh kosong
                                        </div>
                                    </td>
                                    <td>
                                        <textarea type="text" class="form-control keterangan_target_mapel" name="keterangan_mapel[]" style="height: 40px;"></textarea>
                                        {{-- validasi --}}
                                        <div class="invalid-feedback d-none invalid_keterangan_target_mapel">
                                            Keteragan mapel tidak boleh kosong
                                        </div>
                                    </td>
                                    <td>
                                    </td>
                                  </tr>
                              </div>
                            </tbody>
                        </table>

                        {{-- <div class="form-group fields_multiple_mapel">
                            <label>Pencapaian Mapel</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control col-10 input_target_mapel" name="target_mapel[]">
                                <div class="invalid-feedback d-none invalid_target_mapel">
                                    Pencapaian mapel tidak boleh kosong
                                </div>
                            </div>
                            <label class="mt-3">Keterangan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control col-10 keterangan_target_mapel"
                                    name="keterangan_mapel[]">
                                <button class="btn btn-success ml-4 addbtn_multiple_maple">Fields <i
                                        class="fas fa-plus"></i></button>
                                <div class="invalid-feedback d-none invalid_keterangan_target_mapel">
                                    Keteragan mapel tidak boleh kosong
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Target Mata Pelajaran KKID</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="text-center">
                              <tr>
                                <th scope="col" style="width: 10px;">NO.</th>
                                <th scope="col" style="width: 55%;">Target Mata Pelajaran KKID</th>
                                <th scope="col" style="width: 20%;">Keterangan</th>
                                <th scope="col" style="width: 10px;">
                                    <button class="btn btn-success addbtn_multiple_kkid" style="width: 80px;">Fields <i class="fas fa-plus"></i></button>
                                </th>
                              </tr>
                            </thead>
                            <tbody class="fields_multiple_kkid">
                              <div>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <textarea type="text" class="form-control input_pencapaian_kkid" name="target_kkid[]" style="height: 40px;"></textarea>
                                        {{-- validasi --}}
                                        <div class="invalid-feedback d-none invalid_pencapaian_kkid">
                                            Target mapel KKID tidak boleh kosong
                                        </div>
                                    </td>
                                    <td>
                                        <textarea type="text" class="form-control keterangan_pencapaian_kkid" name="keterangan_kkid[]" style="height: 40px;"></textarea>
                                        {{-- validasi --}}
                                        <div class="invalid-feedback d-none invalid_keterangan_pencapaian_kkid">
                                            Keteragan KKID tidak boleh kosong
                                        </div>
                                    </td>
                                    <td>
                                    </td>
                                  </tr>
                              </div>
                            </tbody>
                        </table>

                        {{-- <div class="form-group fields_multiple_kkid">
                            <label>Pencapaian KKID</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control col-10 input_pencapaian_kkid"
                                    name="target_kkid[]">
                                <div class="invalid-feedback  invalid_pencapaian_kkid">
                                    Pencapaian KKID tidak boleh kosong
                                </div>
                            </div>
                            <label>Keterangan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control col-10 keterangan_pencapaian_kkid"
                                    name="keterangan_kkid[]">
                                <button class="btn btn-success ml-4 addbtn_multiple_kkid"
                                    name="keterangan_kkid[]">Fields <i class="fas fa-plus"></i></button>
                                <div class="invalid-feedback d-none invalid_keterangan_pencapaian_kkid">
                                    Keterangan tidak boleh kosong
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            {{-- mapel&kkid --}}

            {{-- buktisiswa --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Rincian Bukti</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="text-center">
                              <tr>
                                <th scope="col" style="width: 10px;">NO.</th>
                                <th scope="col" style="width: 80%;">Rincian Bukti</th>
                                <th scope="col" style="width: 10px;">
                                    <button class="btn btn-success addbtn_multiple_bukti" style="width: 80px;">Fields <i class="fas fa-plus"></i></button>
                                </th>
                              </tr>
                            </thead>
                            <tbody class="fields_multiple_bukti">
                              <div>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <textarea type="text" class="form-control input_bukti" name="bukti[]" style="height: 40px;"></textarea>
                                        {{-- validasi --}}
                                        <div class="invalid-feedback d-none invalid_bukti" style="margin-left: 41px;">
                                            Rincian bukti tidak boleh kosong
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-danger removebtn_multiple_bukti"><i class="fas fa-times"></i></button>
                                    </td>
                                  </tr>
                              </div>
                            </tbody>
                        </table>

                        {{-- <div class="form-group fields_multiple_bukti">
                            <label>Rincian Bukti</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control col-10 input_bukti" name="bukti[]">
                                <button class="btn btn-success ml-4 addbtn_multiple_bukti">Fields <i
                                        class="fas fa-plus"></i></button>
                                <div class="invalid-feedback d-none invalid_bukti">
                                    Rincian bukti boleh kosong
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card-body">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary button" id="button">Submit</button>
                        <a href="{{ route('admin.Lembar-kerja-1.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
            {{-- buktisiswa --}}
        </form>
    </div>
</div>


@endsection
@push('js')
<script>
    // multiple input mapel
    $(document).ready(function () {

        multiple_input_mapel();
        multiple_input_kkid();
        multiple_input_bukti_siswa();
        multiple_input_kompetensi();

        function multiple_input_mapel()
        {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".fields_multiple_mapel"); //Fields wrapper
            var add_button = $(".addbtn_multiple_maple"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<tr id="mapel ' + x + ' " data-id="mapel ' + x + ' ">'+
                            '<th scope="row"> ' + x + ' </th>'+
                            '<td>'+
                                '<textarea type="text" class="form-control input_target_mapel" data-input=" ' + x + ' " name="target_mapel[]" style="height: 40px;"></textarea>'+
                                '<div class="invalid-feedback d-none invalid_target_mapel">'+
                                    'Target mapel tidak boleh kosong'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<textarea type="text" class="form-control keterangan_target_mapel" name="keterangan_mapel[]" style="height: 40px;"></textarea>'+
                                '<div class="invalid-feedback d-none invalid_keterangan_target_mapel">'+
                                    'Keteragan mapel tidak boleh kosong'+
                                '</div>'+
                            '</td>'+
                            '<td class="text-center">'+
                                '<button class="btn btn-danger removebtn_multiple_maple"><i class="fas fa-times"></i></button>'+
                            '</td>'+
                        '</tr>');

                        // <div id="mapel ' + x + ' " data-id="mapel ' + x + '"">' +
                        // '<label class="mt-3">Pencapaian Mapel ' + x + '</label>' +
                        // '<div class="input-group">' +
                        // '<div class="input-group">' +
                        // '<div class="input-group-prepend">' +
                        // '<div class="input-group-text">' +
                        // '<i class="fas fa-book"></i>' +
                        // '</div>' +
                        // '</div>' +
                        // '<input type="text" class="form-control input_target_mapel" data-input="' + x +
                        // '" name="target_mapel[]">' +
                        // ' <div class="invalid-feedback d-none invalid_target_mapel">' +
                        // 'Pencapaian mapel tidak boleh kosong' +
                        // '</div>' +
                        // '</div>' +
                        // '  <label class="mt-3">Keterangan ' + x + '</label>' +
                        // '<div class="input-group">' +
                        // '<div class="input-group-prepend">' +
                        // '<div class="input-group-text">' +
                        // '<i class="fas fa-book"></i>' +
                        // '</div>' +
                        // '</div>' +
                        // '<input type="text" class="form-control col-10 keterangan_target_mapel" name="keterangan_mapel[]">' +
                        // '<button class="btn btn-danger ml-4 removebtn_multiple_maple"><i class="fas fa-times"></i></button>' +
                        // '<div class="invalid-feedback d-none invalid_keterangan_target_mapel">' +
                        // 'Keteragan mapel tidak boleh kosong' +
                        // '</div>' +
                        // '</div>' +
                        // '</div>'

                }
            });

            $(wrapper).on("click", ".removebtn_multiple_maple", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('td').parent('tr').remove();
                x--;
            })
        }

        function multiple_input_kkid()
        {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".fields_multiple_kkid"); //Fields wrapper
            var add_button = $(".addbtn_multiple_kkid"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<tr id="kkid '+ x +' " data-id="kkid '+ x +' ">'+
                            '<th scope="row"> '+ x +' </th>'+
                            '<td>'+
                                '<textarea type="text" class="form-control input_pencapaian_kkid" name="target_kkid[]" style="height: 40px;"></textarea>'+
                                '<div class="invalid-feedback d-none invalid_pencapaian_kkid">'+
                                    'Target mapel KKID tidak boleh kosong'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<textarea type="text" class="form-control keterangan_pencapaian_kkid" name="keterangan_kkid[]" style="height: 40px;"></textarea>'+
                                '<div class="invalid-feedback d-none invalid_keterangan_pencapaian_kkid">'+
                                    'Keteragan KKID tidak boleh kosong'+
                                '</div>'+
                            '</td>'+
                            '<td class="text-center">'+
                                '<button class="btn btn-danger removebtn_multiple_kkid"><i class="fas fa-times"></i></button>'+
                            '</td>'+
                        '</tr>');

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
                $(this).parent('td').parent('tr').remove();
                x--;
            })
        }

        function multiple_input_bukti_siswa()
        {
             var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".fields_multiple_bukti"); //Fields wrapper
            var add_button = $(".addbtn_multiple_bukti"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<tr>'+
                            '<th scope="row">'+ x +'</th>'+
                            '<td>'+
                                '<textarea type="text" class="form-control input_bukti" name="bukti[]" style="height: 40px;"></textarea>'+
                                '<div class="invalid-feedback d-none invalid_bukti" style="margin-left: 41px;">'+
                                    'Rincian bukti tidak boleh kosong'+
                                '</div>'+
                            '</td>'+
                            '<td class="text-center">'+
                                '<button class="btn btn-danger removebtn_multiple_bukti"><i class="fas fa-times"></i></button>'+
                            '</td>'+
                        '</tr>');
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
                $(this).parent('td').parent('tr').remove();
                x--;
            });
        }

        function multiple_input_kompetensi()
        {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".fields_multiple_kompetensi"); //Fields wrapper
            var add_button = $(".addbtn_multiple_kompetensi"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<tr>'+
                        '<th scope="row">'+ x +'</th>'+
                        '<td>'+
                            '<textarea type="text" class="form-control input_kompetensi" name="kompetensi[]" style="height: 40px;"></textarea>'+
                            '<div class="invalid-feedback d-none invalid_kompetensi" style="margin-left: 41px;">'+
                                'Kompetensi inti tidak boleh kosong'+
                            '</div>'+
                        '</td>'+
                        '<td class="text-center">'+
                            '<button class="btn btn-danger ml-4 removebtn_multiple_kompetensi"><i class="fas fa-times"></i></button>'+
                        '</td>'+
                    '</tr>');
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
                $(this).parent('td').parent('tr').remove();
                x--;
            });
        }
        // option bidang studi
        $('#bidang').change(function () {
            id = $(this).val(); // mengambil value
            //console.log(id);

            // call ajax untuk get / mendapatkan data
            $.ajax({
                url: '/admin/option/bidang_studi/' + id, // url
                type: 'get', // method
                success: function (response) {
                    console.log(response.bidang);
                    $('#mapel').val(response.bidang.mapel); // masuk value
                    $('#kompetensi').val(response.bidang.kompetensi_keahlian)
                    $('#jp').val(response.bidang.jam_pelajaran);
                },
                fail: function (rsponse) {

                }
            });
        });

        // button submit
        $('#button').click(function (e) {
                e.preventDefault();
                guru = $('#id_guru').val();
                bidang = $('#bidang').val();
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
                if (!validasi_bidang_keahlian() && !validasi_target_mapeL() && !validasi_keterangan_target_mapel() && !validasi_pencapaian_kkid() && !validasi_keteranga_pencapaian_kkid() && !validasi_rincian_butki() && !validasi_kompetensi()) {
                    console.log('berhasil');
                    $('#form').submit();
                }else{
                    validasi_guru();
                    validasi_bidang_keahlian()
                    validasi_target_mapeL();
                    validasi_keterangan_target_mapel();
                    validasi_pencapaian_kkid();
                    validasi_keteranga_pencapaian_kkid();
                    validasi_rincian_butki();
                    validasi_kompetensi();
                };

            function validasi_guru()
            {
                 // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                if (!guru) {
                    $('#id_guru').addClass('is-invalid'); // Ad class is-invalid
                    $('#id_guru').closest('div').find('.invalid_target_mapel').removeClass('d-none'); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    count_erorr += 1
                }else{
                    $('#id_guru').removeClass('is-invalid').removeClass('is-invalid');
                    $('#id_guru').closest('div').find('.invalid_target_mapel').addClass('d-none'); // cari div terdekat dan cari class nya find = cari lalu add class d-none
                }
                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_bidang_keahlian()
            {
                 // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                if (!bidang) {
                    $('#bidang').addClass('is-invalid'); // Ad class is-invalid
                    $('#bidang').closest('div').find('.invalid_target_mapel').removeClass('d-none'); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    count_erorr += 1
                }else{
                    $('#bidang').removeClass('is-invalid').removeClass('is-invalid');
                    $('#bidang').closest('div').find('.invalid_target_mapel').addClass('d-none'); // cari div terdekat dan cari class nya find = cari lalu add class d-none
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
                        $(element).closest('div').find('.invalid_target_mapel').removeClass('d-none'); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid').removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_target_mapel').addClass('d-none'); // cari div terdekat dan cari class nya find = cari lalu add class d-none
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
                        $(element).closest('div').find('.invalid_keterangan_target_mapel').removeClass('d-none'); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_keterangan_target_mapel').addClass('d-none'); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
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
                        $(element).closest('div').find('.invalid_pencapaian_kkid').removeClass('d-none'); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                       // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_pencapaian_kkid').addClass('d-none'); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
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
                        $(element).closest('div').find('.invalid_keterangan_pencapaian_kkid').removeClass('d-none'); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                         // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_keterangan_pencapaian_kkid').addClass('d-none'); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
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
                        $(element).closest('div').find('.invalid_bukti').removeClass( 'd-none'); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_bukti').addClass('d-none'); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
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
                        $(element).closest('div').find('.invalid_kompetensi').removeClass('d-none'); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_kompetensi').addClass('d-none'); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
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
