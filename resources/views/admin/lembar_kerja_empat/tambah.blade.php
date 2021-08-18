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
            <div class="row fields_jenisbahan">
                <div class="col-sm-6">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Jenis Bahan Ajar</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kompetensi Dasar 3.17</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                              </div>
                              <textarea class="form-control col-10" style="height: 80px;"></textarea>
                              <button class="btn btn-success ml-4 addbtn_jenisbahan" style="height: 35px;">Fields <i class="fas fa-plus"></i></button>
                            </div>
                            {{--  --}}
                        </div>
                        <div class="form-group">
                            <label>Kompetensi Dasar 4.17</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                              </div>
                              <textarea class="form-control col-10" style="height: 80px;"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Modul</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                              </div>
                              <textarea class="form-control col-10" style="height: 80px;"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Video Pembelajaran</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="far fa-file-video"></i>
                                </div>
                              </div>
                              <textarea class="form-control col-10" style="height: 80px;"></textarea>
                            </div>
                            {{--  --}}
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Bahan Ajar</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-file-invoice"></i>
                                </div>
                              </div>
                              <textarea class="form-control col-10" style="height: 80px;"></textarea>
                            </div>
                            {{--  --}}
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-file-invoice"></i>
                                </div>
                              </div>
                              <textarea class="form-control col-10" style="height: 80px;"></textarea>
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
    // multiple input bukti siswa
    $(document).ready(function() {
        var max_fields      = 10;
        var wrapper   		= $(".fields_jenisbahan");
        var add_button      = $(".addbtn_jenisbahan");

        var x = 1;
        var y = 17;
        $(add_button).click(function(e){
            e.preventDefault();
            if(x < max_fields){
                x++;
                y++;
                $(wrapper).append('<div class="col-sm-6 ">'+
                '<div class="card-header">'+
                    '<h4 class="card-title" style="padding-top: 30px;">.</h4>'+
                '</div>'+
                '<div class="card-body">'+
                    '<div class="form-group">'+
                            '<label>Kompetensi Dasar 3.'+y+'</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<div class="input-group-text">'+
                                    '<i class="fas fa-file-alt"></i>'+
                                '</div>'+
                              '</div>'+
                              '<textarea class="form-control col-10" style="height: 80px;"></textarea>'+
                              '<button class="btn btn-success ml-4 addbtn_jenisbahan" style="height: 35px;">Fields <i class="fas fa-plus"></i></button>'+
                            '</div>'+
                        '</div>'+
                        '<div class="form-group">'+
                            '<label>Kompetensi Dasar 4.'+y+'</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<div class="input-group-text">'+
                                    '<i class="fas fa-file-alt"></i>'+
                                '</div>'+
                              '</div>'+
                              '<textarea class="form-control col-10" style="height: 80px;"></textarea>'+
                            '</div>'+
                        '</div>'+
                        '<div class="form-group">'+
                            '<label>Modul</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<div class="input-group-text">'+
                                    '<i class="fas fa-file-alt"></i>'+
                                '</div>'+
                              '</div>'+
                              '<textarea class="form-control col-10" style="height: 80px;"></textarea>'+
                            '</div>'+
                        '</div>'+
                        '<div class="form-group">'+
                            '<label>Video Pembelajaran' + x + '</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<div class="input-group-text">'+
                                  '<i class="far fa-file-video"></i>'+
                                '</div>'+
                              '</div>'+
                              '<textarea class="form-control col-9" style="height: 80px;"></textarea>'+
                            '</div>'+
                        '</div>'+
                        '<div class="form-group">'+
                            '<label>Deskripsi Bahan Ajar' + x + '</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<div class="input-group-text">'+
                                    '<i class="fas fa-file-invoice"></i>'+
                                '</div>'+
                              '</div>'+
                              '<textarea class="form-control col-9" style="height: 80px;"></textarea>'+
                            '</div>'+
                        '</div>'+
                        '<div class="form-group">'+
                            '<label>Keterangan' + x + '</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<div class="input-group-text">'+
                                    '<i class="fas fa-file-invoice"></i>'+
                                '</div>'+
                              '</div>'+
                              '<textarea class="form-control col-9" style="height: 80px;"></textarea>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>');
            }
        });

        $(wrapper).on("click",".removebtn_jenisbahan", function(e){
            e.preventDefault(); $(this).parent('div').parent('div').parent('div').parent('div').remove(); x--;
        })
    });
</script>
@endpush
