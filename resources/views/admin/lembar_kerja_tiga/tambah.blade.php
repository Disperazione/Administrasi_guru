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

            {{-- buttonsubmit --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="modal-footer">
                            <button class="btn btn-success addbtn_indikmapel">Fields <i class="fas fa-plus"></i></button>
                            <button class="btn btn-primary">Submit</button>
                            <a href="" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- buttonsubmit --}}
        </div>
    </div>


@endsection
@push('js')
<script>
    // multiple
    $(document).ready(function() {
        var max_fields      = 10;
        var wrapper   		= $(".fields_indikmapel");
        var add_button      = $(".addbtn_indikmapel");

        var x = 1;
        var y = 17;
        $(add_button).click(function(e){
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                y++;
                $(wrapper).append('<div class="card">'+
                        '<div class="card-header">'+
                            '<h4>'+x+'. Indikator Ketercapaian Mata Pelajaran Semester : </h4>'+
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
                                    '<label>Bukti / Assesment Valid / Tidak Valid</label>'+
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
                                    '<label>Ketuntasan</label>'+
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
                                '<div class="form-group col-sm-2"></div>'+
                                '<div class="form-group col-sm-2">'+
                                    '<label>Jumlah Pertemuan</label>'+
                                    '<div class="input-group">'+
                                        '<div class="input-group-prepend">'+
                                            '<div class="input-group-text">'+
                                                '<i class="far fa-sticky-note"></i>'+
                                            '</div>'+
                                        '</div>'+
                                        '<input type="text" id="" class="form-control" name="" id="">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group col-sm-3"></div>'+
                                '<div class="form-group col-sm-5">'+
                                    '<label>Alat dan Bahan</label>'+
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
                                        '<button class="btn btn-danger removebtn_indikmapel"><i class="fas fa-times"></i></button>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group col-sm-5">'+
                                    '<label>Sumber Belajar</label>'+
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
                                    '<label>Keterangan.</label>'+
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

        $(wrapper).on("click",".removebtn_indikmapel", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').parent('div').parent('div').parent('div').parent('div').remove(); x--;
        })
    });
</script>
@endpush
