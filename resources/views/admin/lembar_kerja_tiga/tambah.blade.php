@extends('layout.master')
@push('css')

@endpush
@section('title', 'SIFOS | Add Data LK 3')
@section('judul','Add Data Lembar Kerja 3')
@section('breadcrump')
    {{-- breadcrump here --}}
    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
    <div class="breadcrumb-item">LK 3</div>
@endsection
@section('main')
    {{-- content here --}}

    <div class="card">
        <div class="card-header">
            <h4><i class="fas fa-align-justify"></i> Tambah Data Lembar Kerja 3</h4>
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

            {{--  --}}
            <div class="row fields_ketercapaianmapel">
                <div class="col-sm-6">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Ketercapaian Mata Pelajaran</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kompetensi Dasar 3.17</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="far fa-file-alt"></i>
                                    </div>
                                </div>
                                <textarea type="text" class="form-control" name="" style="height: 70px;"></textarea>
                                <button class="btn btn-success ml-4 addbtn_ketercapaianmapel" style="height: 35px">Fields <i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kompetensi Dasar 4.17</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="far fa-file-alt"></i>
                                </div>
                                </div>
                                <textarea type="text" class="form-control" name="" style="height: 70px;"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Bukti Assesment</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="far fa-file-alt"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                            <label>Ketuntasan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-clipboard-list"></i>
                                    </div>
                                </div>
                                <textarea class="form-control" style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Pertemuan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-book-reader"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alat & Bahan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-cubes"></i>
                                    </div>
                                </div>
                                <textarea type="text" class="form-control" name="" style="height: 70px;"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Sumber Belajar</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fab fa-dropbox"></i>
                                </div>
                            </div>
                            <textarea type="text" class="form-control" name="" style="height: 70px;"></textarea>
                        </div>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-clipboard-list"></i>
                                    </div>
                                </div>
                                <textarea class="form-control" style="height: 100px;"></textarea>
                            </div>
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
    // multiple
    $(document).ready(function() {
        var max_fields      = 10;
        var wrapper   		= $(".fields_ketercapaianmapel");
        var add_button      = $(".addbtn_ketercapaianmapel");

        var x = 1;
        var y = 17;
        $(add_button).click(function(e){
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                y++;
                $(wrapper).append('<div class="col-sm-6">'+
                    '<div class="card-header">'+
                        '<h4 class="card-title" style="padding-top: 30px;">.</h4>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<div class="form-group">'+
                            '<label>Kompetensi Dasar 3.'+y+'</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<div class="input-group-text">'+
                                    '<i class="far fa-file-alt"></i>'+
                                '</div>'+
                              '</div>'+
                              '<textarea type="text" class="form-control" name="" style="height: 70px;"></textarea>'+
                              '<button class="btn btn-danger ml-4 removebtn_ketercapaianmapel" style="height: 35px">X</button>'+
                            '</div>'+
                        '</div>'+
                        '<div class="form-group">'+
                            '<label>Kompetensi Dasar 4.'+y+'</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<div class="input-group-text">'+
                                    '<i class="far fa-file-alt"></i>'+
                                '</div>'+
                              '</div>'+
                              '<textarea type="text" class="form-control" name="" style="height: 70px;"></textarea>'+
                            '</div>'+
                        '</div>'+
                        '<div class="form-group">'+
                            '<label>Bukti Assesment</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<div class="input-group-text">'+
                                    '<i class="far fa-file-alt"></i>'+
                                '</div>'+
                              '</div>'+
                              '<input type="text" class="form-control">'+
                            '</div>'+
                        '</div>'+
                        '<div class="form-group">'+
                            '<label>Ketuntasan</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<div class="input-group-text">'+
                                    '<i class="fas fa-clipboard-list"></i>'+
                                '</div>'+
                              '</div>'+
                              '<textarea class="form-control" style="height: 100px;"></textarea>'+
                            '</div>'+
                        '</div>'+
                        '<div class="form-group">'+
                            '<label>Jumlah Pertemuan</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<div class="input-group-text">'+
                                    '<i class="fas fa-book-reader"></i>'+
                                '</div>'+
                              '</div>'+
                              '<input type="text" class="form-control">'+
                            '</div>'+
                        '</div>'+
                        '<div class="form-group">'+
                            '<label>Alat & Bahan</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<div class="input-group-text">'+
                                    '<i class="fas fa-cubes"></i>'+
                                '</div>'+
                              '</div>'+
                              '<textarea type="text" class="form-control" name="" style="height: 70px;"></textarea>'+
                            '</div>'+
                        '</div>'+
                        '<div class="form-group">'+
                            '<label>Sumber Belajar</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<div class="input-group-text">'+
                                  '<i class="fab fa-dropbox"></i>'+
                                '</div>'+
                              '</div>'+
                              '<textarea type="text" class="form-control" name="" style="height: 70px;"></textarea>'+
                            '</div>'+
                        '</div>'+
                        '<div class="form-group">'+
                            '<label>Keterangan</label>'+
                            '<div class="input-group">'+
                              '<div class="input-group-prepend">'+
                                '<div class="input-group-text">'+
                                    '<i class="fas fa-clipboard-list"></i>'+
                                '</div>'+
                              '</div>'+
                              '<textarea class="form-control" style="height: 100px;"></textarea>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>');
            }
        });

        $(wrapper).on("click",".removebtn_ketercapaianmapel", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').parent('div').parent('div').parent('div').remove(); x--;
        })
    });
</script>
@endpush
