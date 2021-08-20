@extends('layout.master')
@push('css')

@endpush
@section('title', 'SIFOS | Edit Data LK 4')
@section('judul','Edit Data Lembar Kerja 4')
@section('breadcrump')
    {{-- breadcrump here --}}
    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
    <div class="breadcrumb-item">Edit LK 4</div>
@endsection
@section('main')
    {{-- content here --}}

    <div class="card">
        <div class="card-header">
            <h4><i class="fas fa-align-justify"></i> Edit Data Lembar Kerja 4</h4>
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
                        <h4 class="card-title" style="padding-top: 30px;">Mata Pelajaran</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Bidang Studi</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-align-left"></i>
                                </div>
                              </div>
                              <select class="form-control">
                                <option selected>Lihat Lebih Lanjut</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kompetensi Dasar Keterampilan</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-align-justify"></i>
                                </div>
                              </div>
                              <input type="text" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kompetensi Dasar Pengetahuan</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-align-justify"></i>
                                </div>
                              </div>
                              <input type="text" class="form-control" disabled>
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
                              <input type="text" class="form-control" disabled>
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
                              <input type="text" class="form-control" disabled>
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
                              <input type="text" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- datatenagapendidik --}}

            {{-- kompetensidasar --}}
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
                                    <th scope="col" style="width: 80%;">Kompetensi Dasar</th>
                                    <th scope="col" style="width: 10px;">
                                        <button class="btn btn-success addbtn_kompetensidasar"
                                            style="width: 80px;">Fields <i class="fas fa-plus"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="fields_kompetensidasar">
                                <div>
                                    <tr>
                                        <th>1</th>
                                        <td>
                                            <textarea type="text" class="form-control input_kompetensidasar"
                                                name="kompetensidasar[]" style="height: 40px;"></textarea>
                                            <div class="invalid-feedback d-none invalid_kompetensidasar"
                                                style="margin-left: 41px;">
                                                Kompetensi dasar tidak boleh kosong
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger removebtn_kompetensidasar" style="width: 40px;">X</button>
                                        </td>
                                    </tr>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- kompetensidasar --}}

            {{-- jenisbahanajar modul --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Jenis Bahan Ajar</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" style="width: 10px;">NO.</th>
                                    <th scope="col" style="width: 80%;">Modul</th>
                                    <th scope="col" style="width: 10px;">
                                        <button class="btn btn-success addbtn_modul"
                                            style="width: 80px;">Fields <i class="fas fa-plus"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="fields_modul">
                                <div>
                                    <tr>
                                        <th>1</th>
                                        <td>
                                            <textarea type="text" class="form-control input_modul"
                                                name="modul[]" style="height: 40px;"></textarea>
                                            <div class="invalid-feedback d-none invalid_modul"
                                                style="margin-left: 41px;">
                                                Modul tidak boleh kosong
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger removebtn_modul" style="width: 40px;">X</button>
                                        </td>
                                    </tr>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- jenisbahanajar modul --}}

            {{-- jenisbahanajar videopembelajaran --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" style="width: 10px;">NO.</th>
                                    <th scope="col" style="width: 80%;">Video Pembelajaran</th>
                                    <th scope="col" style="width: 10px;">
                                        <button class="btn btn-success addbtn_videobelajar"
                                            style="width: 80px;">Fields <i class="fas fa-plus"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="fields_videobelajar">
                                <div>
                                    <tr>
                                        <th>1</th>
                                        <td>
                                            <textarea type="text" class="form-control input_videobelajar"
                                                name="videobelajar[]" style="height: 40px;"></textarea>
                                            <div class="invalid-feedback d-none invalid_videobelajar"
                                                style="margin-left: 41px;">
                                                Video Pembelajaran tidak boleh kosong
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger removebtn_videobelajar" style="width: 40px;">X</button>
                                        </td>
                                    </tr>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- jenisbahanajar vidiopembelajaran --}}

            {{-- deskripsibahanajar --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Deskripsi Bahan Ajar</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" style="width: 10px;">NO.</th>
                                    <th scope="col" style="width: 80%;">Deskripsi Bahan Ajar</th>
                                    <th scope="col" style="width: 10px;">
                                        <button class="btn btn-success addbtn_deskbahanajar"
                                            style="width: 80px;">Fields <i class="fas fa-plus"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="fields_deskbahanajar">
                                <div>
                                    <tr>
                                        <th>1</th>
                                        <td>
                                            <textarea type="text" class="form-control input_deskbahanajar"
                                                name="deskbahanajar[]" style="height: 40px;"></textarea>
                                            <div class="invalid-feedback d-none invalid_kompetensidasar"
                                                style="margin-left: 41px;">
                                                Deskripsi Bahan Ajar tidak boleh kosong
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger removebtn_deskbahanajar" style="width: 40px;">X</button>
                                        </td>
                                    </tr>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- deskripsibahanajar --}}

            {{-- keterangan --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Keterangan</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" style="width: 10px;">NO.</th>
                                    <th scope="col" style="width: 80%;">Keterangan</th>
                                    <th scope="col" style="width: 10px;">
                                        <button class="btn btn-success addbtn_ket"
                                            style="width: 80px;">Fields <i class="fas fa-plus"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="fields_ket">
                                <div>
                                    <tr>
                                        <th>1</th>
                                        <td>
                                            <textarea type="text" class="form-control input_ket"
                                                name="ket[]" style="height: 40px;"></textarea>
                                            <div class="invalid-feedback d-none invalid_ket"
                                                style="margin-left: 41px;">
                                                Keterangan tidak boleh kosong
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger removebtn_ket" style="width: 40px;">X</button>
                                        </td>
                                    </tr>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- keterangan --}}

            {{--  --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="modal-footer">
                          <button class="btn btn-primary">Submit</button>
                          <a href="" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            {{--  --}}
        </div>
    </div>


@endsection
@push('js')
<script>
    // multiple
    $(document).ready(function () {
        var max_fields = 10;
        var wrapper = $(".fields_kompetensidasar");
        var add_button = $(".addbtn_kompetensidasar");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<tr>'+
                                    '<th>'+x+'</th>'+
                                    '<td>'+
                                        '<textarea type="text" class="form-control input_kompetensidasar" name="kompetensidasar[]" style="height: 40px;"></textarea>'+
                                        '<div class="invalid-feedback d-none invalid_kompetensidasar" style="margin-left: 41px;">'+
                                            'Kompetensi dasar tidak boleh kosong'+
                                        '</div>'+
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<button class="btn btn-danger removebtn_kompetensidasar" style="width: 40px;">X</button>'+
                                    '</td>'+
                                '</tr>');
            }
        });

        // remove parent jiika button di click
        $(wrapper).on("click", ".removebtn_kompetensidasar", function (e) {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove();
            x--;
        })
    });

    $(document).ready(function () {
        var max_fields = 10;
        var wrapper = $(".fields_modul");
        var add_button = $(".addbtn_modul");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<tr>'+
                                    '<th>'+x+'</th>'+
                                    '<td>'+
                                        '<textarea type="text" class="form-control input_modul" name="modul[]" style="height: 40px;"></textarea>'+
                                        '<div class="invalid-feedback d-none invalid_modul" style="margin-left: 41px;">'+
                                            'Modul tidak boleh kosong'+
                                        '</div>'+
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<button class="btn btn-danger removebtn_modul" style="width: 40px;">X</button>'+
                                    '</td>'+
                                '</tr>');
            }
        });

        // remove parent jiika button di click
        $(wrapper).on("click", ".removebtn_modul", function (e) {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove();
            x--;
        })
    });

    $(document).ready(function () {
        var max_fields = 10;
        var wrapper = $(".fields_videobelajar");
        var add_button = $(".addbtn_videobelajar");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<tr>'+
                                    '<th>'+x+'</th>'+
                                    '<td>'+
                                        '<textarea type="text" class="form-control input_kompetensidasar" name="videobelajar[]" style="height: 40px;"></textarea>'+
                                        '<div class="invalid-feedback d-none invalid_videobelajar" style="margin-left: 41px;">'+
                                            'Link Video Belajar tidak boleh kosong'+
                                        '</div>'+
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<button class="btn btn-danger removebtn_videobelajar" style="width: 40px;">X</button>'+
                                    '</td>'+
                                '</tr>');
            }
        });

        // remove parent jiika button di click
        $(wrapper).on("click", ".removebtn_videobelajar", function (e) {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove();
            x--;
        })
    });

    $(document).ready(function () {
        var max_fields = 10;
        var wrapper = $(".fields_deskbahanajar");
        var add_button = $(".addbtn_deskbahanajar");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<tr>'+
                                    '<th>'+x+'</th>'+
                                    '<td>'+
                                        '<textarea type="text" class="form-control input_deskbahanajar" name="deskbahanajar[]" style="height: 40px;"></textarea>'+
                                        '<div class="invalid-feedback d-none invalid_deskbahanaajar" style="margin-left: 41px;">'+
                                            'Deskripsi Bahan Ajar tidak boleh kosong'+
                                        '</div>'+
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<button class="btn btn-danger removebtn_deskbahanajar" style="width: 40px;">X</button>'+
                                    '</td>'+
                                '</tr>');
            }
        });

        // remove parent jiika button di click
        $(wrapper).on("click", ".removebtn_deskbahanajar", function (e) {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove();
            x--;
        })
    });

    $(document).ready(function () {
        var max_fields = 10;
        var wrapper = $(".fields_ket");
        var add_button = $(".addbtn_ket");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<tr>'+
                                    '<th>'+x+'</th>'+
                                    '<td>'+
                                        '<textarea type="text" class="form-control input_ket" name="ket[]" style="height: 40px;"></textarea>'+
                                        '<div class="invalid-feedback d-none invalid_ket" style="margin-left: 41px;">'+
                                            'Keterangan tidak boleh kosong'+
                                        '</div>'+
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<button class="btn btn-danger removebtn_ket" style="width: 40px;">X</button>'+
                                    '</td>'+
                                '</tr>');
            }
        });

        // remove parent jiika button di click
        $(wrapper).on("click", ".removebtn_ket", function (e) {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove();
            x--;
        })
    });
</script>
@endpush
