@extends('layout.master')
@push('css')

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

    <div class="card">
        <div class="card-header">
            <h4><i class="fas fa-align-justify"></i> Tambah Data Lembar Kerja 2</h4>
        </div>
        <div class="card-body">
            <div>
                <h6 class="card-title">Pada bagian ini, guru pengampu mata pelajaran memberikan model pembelajaran dengan memilih
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
            <div class="row fields_strpembelajaran">
                <div class="col-sm-6">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Strategi Pembelajaran</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group fields_multiple_model">
                            <label>Model Pembelajaran</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-book"></i>
                                </div>
                              </div>
                              <textarea class="form-control col-10" style="height: 60px;"></textarea>
                              <button class="btn btn-success ml-4 addbtn_strpembelajaran" style="height: 35px;">Fields <i class="fas fa-plus"></i></button>
                            </div>
                            {{--  --}}
                        </div>
                        <div class="form-group fields_multiple_metode">
                            <label>Metode Pembelajaran</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-book"></i>
                                </div>
                              </div>
                              <textarea class="form-control col-8" style="height: 60px;"></textarea>
                            </div>
                            {{--  --}}
                        </div>
                        <div class="form-group fields_multiple_desk">
                            <label>Deskripsi Kegiatan</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-book"></i>
                                </div>
                              </div>
                              <textarea class="form-control col-8" style="height: 70px;"></textarea>
                            </div>
                            {{--  --}}
                        </div>
                    </div>
                </div>


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
    // multiple model
    $(document).ready(function() {
        var max_fields      = 10;
        var wrapper   		= $(".fields_strpembelajaran");
        var add_button      = $(".addbtn_strpembelajaran");

        var x = 1;
        $(add_button).click(function(e){
            e.preventDefault();
            if(x < max_fields){
                x++;
                $(wrapper).append('<div class="col-sm-6">'+
                    '<div class="card-header">'+
                        '<h4 class="card-title" style="padding-top: 30px;">.</h4>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<div class="form-group">'+
                            '<label>Model Pembelajaran' + x + '</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<div class="input-group-text">'+
                                  '<i class="fas fa-book"></i>'+
                                '</div>'+
                              '</div>'+
                              '<textarea class="form-control col-9" style="height: 60px;"></textarea>'+
                              '<button class="btn btn-danger ml-4 removebtn_strpembelajaran" style="height: 35px;">X</button>'+
                            '</div>'+
                            {{--  --}}
                        '</div>'+
                        '<div class="form-group">'+
                            '<label>Metode Pembelajaran' + x + '</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<div class="input-group-text">'+
                                  '<i class="fas fa-book"></i>'+
                                '</div>'+
                              '</div>'+
                              '<textarea class="form-control col-9" style="height: 60px;"></textarea>'+
                            '</div>'+
                            {{--  --}}
                        '</div>'+
                        '<div class="form-group">'+
                            '<label>Deskripsi Kegiatan' + x + '</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<div class="input-group-text">'+
                                  '<i class="fas fa-book"></i>'+
                                '</div>'+
                              '</div>'+
                              '<textarea class="form-control col-9" style="height: 60px;"></textarea>'+
                            '</div>'+
                            {{--  --}}
                        '</div>'+
                    '</div>'+
                '</div>');
            }
        });

        $(wrapper).on("click",".removebtn_strpembelajaran", function(e){
            e.preventDefault(); $(this).parent('div').parent('div').parent('div').parent('div').remove(); x--;
        })
    });
</script>
@endpush
