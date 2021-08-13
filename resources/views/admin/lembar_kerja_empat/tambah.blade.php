@extends('layout.master')
@push('css')

@endpush
@section('title', 'SIFOS | Add Data LK 4')
@section('judul','Add Data Lembar Kerja 4')
@section('breadcrump')
    {{-- breadcrump here --}}
    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
    <div class="breadcrumb-item">LK 4</div>
@endsection
@section('main')
    {{-- content here --}}

    <div class="card">
        <div class="card-header">
            <h4><i class="fas fa-align-justify"></i> Tambah Data Lembar Kerja 4</h4>
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

            {{--  --}}
            <div class="row">
                <div class="col-sm-6">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Jenis Bahan Ajar</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group fields_multiple_mapel">
                            <label>Modul</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                              </div>
                              <input type="text" class="form-control col-10">
                              <button class="btn btn-success ml-4 addbtn_multiple_maple">Fields <i class="fas fa-plus"></i></button>
                            </div>
                            {{--  --}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">.</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group fields_multiple_kkid">
                          <label>Video Pembelajaran</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="far fa-file-video"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control col-10">
                            <button class="btn btn-success ml-4 addbtn_multiple_kkid">Fields <i class="fas fa-plus"></i></button>
                          </div>
                          {{--  --}}
                      </div>
                    </div>
                </div>
            </div>
            {{--  --}}

            {{--  --}}
            <div class="row">
                <div class="col-sm-6">
                    <div class="card-body">
                      <div class="form-group fields_multiple_bukti">
                        <label>Deskripsi Bahan Ajar</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-file-invoice"></i>
                            </div>
                          </div>
                          <input type="text" class="form-control col-10">
                          <button class="btn btn-success ml-4 addbtn_multiple_bukti">Fields <i class="fas fa-plus"></i></button>
                        </div>
                        {{--  --}}
                      </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-body">
                      <div class="form-group fields_multiple_bukti">
                        <label>Keterangan</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-file-invoice"></i>
                            </div>
                          </div>
                          <input type="text" class="form-control col-10">
                          <button class="btn btn-success ml-4 addbtn_multiple_bukti">Fields <i class="fas fa-plus"></i></button>
                        </div>
                        {{--  --}}
                      </div>
                    </div>
                </div>
                {{-- <div class="col-sm-6">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">.</h4>
                    </div>
                    <div class="card-body">
                        <div class="modal-footer mt-5">
                          <button class="btn btn-primary">Submit</button>
                          <a href="" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div> --}}
            </div>
            {{--  --}}

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
    // multiple input mapel
    $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper   		= $(".fields_multiple_mapel"); //Fields wrapper
        var add_button      = $(".addbtn_multiple_maple"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="input-group mt-3">'+
                                      '<input type="text" class="form-control col-8" style="margin-left: 41px;">'+
                                      '<button class="btn btn-danger ml-4 removebtn_multiple_maple"><i class="fas fa-times"></i></button>'+
                                   '</div>');
            }
        });

        $(wrapper).on("click",".removebtn_multiple_maple", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });

    // multiple input kkid
    $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper   		= $(".fields_multiple_kkid"); //Fields wrapper
        var add_button      = $(".addbtn_multiple_kkid"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="input-group mt-3">'+
                                      '<input type="text" class="form-control col-8" style="margin-left: 41px;">'+
                                      '<button class="btn btn-danger ml-4 removebtn_multiple_kkid"><i class="fas fa-times"></i></button>'+
                                   '</div>');
            }
        });

        $(wrapper).on("click",".removebtn_multiple_kkid", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });

    // multiple input bukti siswa
    $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper   		= $(".fields_multiple_bukti"); //Fields wrapper
        var add_button      = $(".addbtn_multiple_bukti"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="input-group mt-3">'+
                                      '<input type="text" class="form-control col-8" style="margin-left: 41px;">'+
                                      '<button class="btn btn-danger ml-4 removebtn_multiple_bukti"><i class="fas fa-times"></i></button>'+
                                   '</div>');
            }
        });

        $(wrapper).on("click",".removebtn_multiple_bukti", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
</script>
@endpush
