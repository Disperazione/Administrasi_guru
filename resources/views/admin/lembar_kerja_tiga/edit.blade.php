@extends('layout.master')
@push('css')

@endpush
@section('title', 'SIFOS | Edit Data LK 3')
@section('judul','Edit Data Lembar Kerja 3')
@section('breadcrump')
    {{-- breadcrump here --}}
    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
    <div class="breadcrumb-item">Edit LK 3</div>
@endsection
@section('main')
    {{-- content here --}}

    <div class="card">
        <div class="card-header">
            <h4><i class="fas fa-align-justify"></i> Edit Data Lembar Kerja 3</h4>
        </div>
        <div class="card-body">
            <div>
                <h6 class="card-title">Pada bagian ini, guru pengampu mata pelajaran memberikan indikator ketercapaian pada setiap kompetensi dasar
                                        dari mapel yang diampu</h6>
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
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">.</h4>
                    </div>
                    <div class="card-body">
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
            </div>
            {{-- datatenagapendidik --}}


            {{-- card --}}
            <div class="fields_indikmapel">
                <div class="card">
                    <div class="card-header">
                        <h4>Indikator Ketercapaian Mata Pelajaran Semester : </h4>
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
                                <label>Bukti / Assesment Valid / Tidak Valid</label>
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
                                <label>Ketuntasan</label>
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
                            <div class="form-group col-sm-2">
                                <label>Jumlah Pertemuan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="" class="form-control" name="" id="">
                                </div>
                            </div>
                            <div class="form-group col-sm-3"></div>
                            <div class="form-group col-sm-5">
                                <label>Alat dan Bahan</label>
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
                                <label>Sumber Belajar</label>
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
                                <label>Keterangan.</label>
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
        var wrapper = $(".fields_buktiass");
        var add_button = $(".addbtn_buktiass");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<tr>'+
                                    '<th>'+x+'</th>'+
                                    '<td>'+
                                        '<textarea type="text" class="form-control input_buktiass" name="buktiass[]" style="height: 40px;"></textarea>'+
                                        '<div class="invalid-feedback d-none invalid_buktiass" style="margin-left: 41px;">'+
                                            'Bukti Assesment tidak boleh kosong'+
                                        '</div>'+
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<button class="btn btn-danger removebtn_buktiass" style="width: 40px;">X</button>'+
                                    '</td>'+
                                '</tr>');
            }
        });

        // remove parent jiika button di click
        $(wrapper).on("click", ".removebtn_buktiass", function (e) {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove();
            x--;
        })
    });

    $(document).ready(function () {
        var max_fields = 10;
        var wrapper = $(".fields_ketuntasan");
        var add_button = $(".addbtn_ketuntasan");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<tr>'+
                                    '<th>'+x+'</th>'+
                                    '<td>'+
                                        '<textarea type="text" class="form-control input_ketuntasan" name="ketuntasan[]" style="height: 40px;"></textarea>'+
                                        '<div class="invalid-feedback d-none invalid_ketuntasan" style="margin-left: 41px;">'+
                                            'Ketuntasan tidak boleh kosong'+
                                        '</div>'+
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<button class="btn btn-danger removebtn_ketuntasan" style="width: 40px;">X</button>'+
                                    '</td>'+
                                '</tr>');
            }
        });

        // remove parent jiika button di click
        $(wrapper).on("click", ".removebtn_ketuntasan", function (e) {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove();
            x--;
        })
    });

    $(document).ready(function () {
        var max_fields = 10;
        var wrapper = $(".fields_jumlahpertemuan");
        var add_button = $(".addbtn_jumlahpertemuan");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<tr>'+
                                    '<th>'+x+'</th>'+
                                    '<td>'+
                                        '<input type="text" class="form-control input_jumlahpertemuan" name="jumlahpertemuan[]">'+
                                        '<div class="invalid-feedback d-none invalid_jumlahpertemuan" style="margin-left: 41px;">'+
                                            'Jumlah Pertemuan tidak boleh kosong'+
                                        '</div>'+
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<button class="btn btn-danger removebtn_jumlahpertemuan" style="width: 40px;">X</button>'+
                                    '</td>'+
                                '</tr>');
            }
        });

        // remove parent jiika button di click
        $(wrapper).on("click", ".removebtn_jumlahpertemuan", function (e) {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove();
            x--;
        })
    });

    $(document).ready(function () {
        var max_fields = 10;
        var wrapper = $(".fields_alatbahan");
        var add_button = $(".addbtn_alatbahan");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<tr>'+
                                    '<th>'+x+'</th>'+
                                    '<td>'+
                                        '<textarea type="text" class="form-control input_alatbahan" name="alatbahan[]" style="height: 40px;"></textarea>'+
                                        '<div class="invalid-feedback d-none invalid_alatbahan" style="margin-left: 41px;">'+
                                            'Kompetensi dasar tidak boleh kosong'+
                                        '</div>'+
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<button class="btn btn-danger removebtn_alatbahan" style="width: 40px;">X</button>'+
                                    '</td>'+
                                '</tr>');
            }
        });

        // remove parent jiika button di click
        $(wrapper).on("click", ".removebtn_alatbahan", function (e) {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove();
            x--;
        })
    });

    $(document).ready(function () {
        var max_fields = 10;
        var wrapper = $(".fields_sumberbelajar");
        var add_button = $(".addbtn_sumberbelajar");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<tr>'+
                                    '<th>'+x+'</th>'+
                                    '<td>'+
                                        '<textarea type="text" class="form-control input_sumberbelajar" name="sumberbelajar[]" style="height: 40px;"></textarea>'+
                                        '<div class="invalid-feedback d-none invalid_sumberbelajar" style="margin-left: 41px;">'+
                                            'Sumber Belajar tidak boleh kosong'+
                                        '</div>'+
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<button class="btn btn-danger removebtn_sumberbelajar" style="width: 40px;">X</button>'+
                                    '</td>'+
                                '</tr>');
            }
        });

        // remove parent jiika button di click
        $(wrapper).on("click", ".removebtn_sumberbelajar", function (e) {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove();
            x--;
        })
    });

    $(document).ready(function () {
        var max_fields = 10;
        var wrapper = $(".fields_keterangan");
        var add_button = $(".addbtn_keterangan");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<tr>'+
                                    '<th>'+x+'</th>'+
                                    '<td>'+
                                        '<textarea type="text" class="form-control input_keterangan" name="keterangan[]" style="height: 40px;"></textarea>'+
                                        '<div class="invalid-feedback d-none invalid_keterangan" style="margin-left: 41px;">'+
                                            'Keterangan tidak boleh kosong'+
                                        '</div>'+
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<button class="btn btn-danger removebtn_keterangan" style="width: 40px;">X</button>'+
                                    '</td>'+
                                '</tr>');
            }
        });

        // remove parent jiika button di click
        $(wrapper).on("click", ".removebtn_keterangan", function (e) {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove();
            x--;
        })
    });
</script>
@endpush
