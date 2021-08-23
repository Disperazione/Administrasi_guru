@extends('layout.master')
@push('css')

@endpush
@section('title', 'SIFOS | Edit Data LK 2')
@section('judul','Edit Data Lembar Kerja 2')
@section('breadcrump')
{{-- breadcrump here --}}
<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
<div class="breadcrumb-item">Edit LK 2</div>
@endsection
@section('main')
{{-- content here --}}

<div class="card">
    <div class="card-header">
        <h4><i class="fas fa-align-justify"></i> Edit Data Lembar Kerja 2</h4>
    </div>
    <div class="card-body">
        <div>
            <h6 class="card-title">Pada bagian ini, guru pengampu mata pelajaran memberikan model pembelajaran dengan
                memilih
                dua jenis model pembelajaran yaitu Project Based Learning (PBL) atau Problem Based Learning
                (PBL) serta memberikan deskripsi dari strategi yang dilakukan.</h6>
        </div>
        {{-- datatenagapendidik --}}
        <div class="row">
            <div class="col-sm-6">
                <div class="card-header">
                    <h4 class="card-title" style="padding-top: 30px;">Mata Pelajaran</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Mata pelajaran</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-align-left"></i>
                                </div>
                            </div>
                            <select class="form-control">
                                <option selected>Lihat Lebih Lanjut</option>
                                {{-- <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option> --}}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kompetensi keahlian</label>
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
                        <label>Bidang usaha</label>
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
                        <label>Jam pelajaran</label>
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
                        <label>Total jam pelajaran</label>
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
                            <label>Kompetensi Dasar</label>
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
                            <label>Model Pembelajaran</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="far fa-sticky-note"></i>
                                    </div>
                                </div>
                                <textarea type="text" id="" class="form-control" name="" id="" style="height: 90px;"></textarea>
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
                                <input type="text" id="" class="form-control" disabled placeholder="3.17">
                            </div>
                        </div>
                        <div class="form-group col-sm-5">
                            <label>Kompetensi Dasar</label>
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
                            <label>Metode Pembelajaran</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="far fa-sticky-note"></i>
                                    </div>
                                </div>
                                <textarea type="text" id="" class="form-control" name="" id="" style="height: 90px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-2"></div>
                        <div class="form-group col-sm-5">
                            <label>Deskripsi Kegiatan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="far fa-sticky-note"></i>
                                    </div>
                                </div>
                                <textarea type="text" id="" class="form-control" name="" id="" style="height: 90px;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- card --}}


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
        var wrapper = $(".fields_modelpembelajaran");
        var add_button = $(".addbtn_modelpembelajaran");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<tr>'+
                                    '<th>'+x+'</th>'+
                                    '<td>'+
                                        '<textarea type="text" class="form-control input_modelpembelajaran" name="modelpembelajaran[]" style="height: 40px;"></textarea>'+
                                        '<div class="invalid-feedback d-none invalid_modelpembelajaran" style="margin-left: 41px;">'+
                                            'Model Pembelajaran tidak boleh kosong'+
                                        '</div>'+
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<button class="btn btn-danger removebtn_modelpembelajaran" style="width: 40px;">X</button>'+
                                    '</td>'+
                                '</tr>');
            }
        });

        // remove parent jiika button di click
        $(wrapper).on("click", ".removebtn_modelpembelajaran", function (e) {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove();
            x--;
        })
    });

    $(document).ready(function () {
        var max_fields = 10;
        var wrapper = $(".fields_metodepembelajaran");
        var add_button = $(".addbtn_metodepembelajaran");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<tr>'+
                                    '<th>'+x+'</th>'+
                                    '<td>'+
                                        '<textarea type="text" class="form-control input_metodepembelajaran" name="metodepembelajaran[]" style="height: 40px;"></textarea>'+
                                        '<div class="invalid-feedback d-none invalid_metodepembelajaran" style="margin-left: 41px;">'+
                                            'Metode Pembelajaran tidak boleh kosong'+
                                        '</div>'+
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<button class="btn btn-danger removebtn_metodepembelajaran" style="width: 40px;">X</button>'+
                                    '</td>'+
                                '</tr>');
            }
        });

        // remove parent jiika button di click
        $(wrapper).on("click", ".removebtn_metodepembelajaran", function (e) {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove();
            x--;
        })
    });

    $(document).ready(function () {
        var max_fields = 10;
        var wrapper = $(".fields_deskripsikegiatan");
        var add_button = $(".addbtn_deskripsikegiatan");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<tr>'+
                                    '<th>'+x+'</th>'+
                                    '<td>'+
                                        '<textarea type="text" class="form-control input_deskripsikegiatan" name="deskripsikegiatan[]" style="height: 40px;"></textarea>'+
                                        '<div class="invalid-feedback d-none invalid_deskripsikegiatan" style="margin-left: 41px;">'+
                                            'Deskripsi Kegiatan tidak boleh kosong'+
                                        '</div>'+
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<button class="btn btn-danger removebtn_deskripsikegiatan" style="width: 40px;">X</button>'+
                                    '</td>'+
                                '</tr>');
            }
        });

        // remove parent jiika button di click
        $(wrapper).on("click", ".removebtn_deskripsikegiatan", function (e) {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove();
            x--;
        })
    });

</script>
@endpush
