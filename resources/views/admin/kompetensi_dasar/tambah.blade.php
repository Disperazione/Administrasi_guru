@extends('layout.master')
@push('css')

@endpush
@section('title', 'SIFOS | Add Kompetensi Dasar')
@section('judul','Add Data Kompetensi Dasar')
@section('breadcrump')
    {{-- breadcrump here --}}
    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
    <div class="breadcrumb-item">Kompetensi Dasar</div>
@endsection
@section('main')
    {{-- content here --}}

    <div class="card">
        <div class="card-header">
            <h4><i class="fas fa-align-justify"></i> Tambah Data Kompetensi Dasar</h4>
        </div>
        <div class="card-body">
            <div>
               
            </div>
            {{-- datatenagapendidik --}}
            <div class="row">
                <div class="col-sm-6">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Mata Pelajaran</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Bidang Keahlian</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-align-justify"></i>
                            </div>
                          </div>
                          <input type="text" class="form-control" >
                        </div>
                    </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-align-justify"></i>
                                </div>
                              </div>
                              <input type="text" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jam Pelajaran</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-align-justify"></i>
                                </div>
                              </div>
                              <input type="text" class="form-control" >
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
                            <label>Mata Pelajaran</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-align-justify"></i>
                                </div>
                              </div>
                              <input type="text" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Total Waktu</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-align-justify"></i>
                                </div>
                              </div>
                              <input type="text" class="form-control" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- datatenagapendidik --}}

            {{-- card --}}
            <div class="fields_komda">
                <div class="card">
                    <div class="card-header">
                        <h4>KD</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label>KD Pengetahuan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                              <label>KD Keterampilan</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <div class="input-group-text">
                                          <i class="far fa-sticky-note"></i>
                                      </div>
                                  </div>
                                  <input type="text" id="" class="form-control" >
                              </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Materi Inti</label>
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
                            <div class="form-group col-sm-4">
                                <label>keterangan Pengetahuan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                              <label>Keterangan Keterampilan</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <div class="input-group-text">
                                          <i class="far fa-sticky-note"></i>
                                      </div>
                                  </div>
                                  <input type="text" id="" class="form-control" >
                              </div>
                            </div>
                            <div class="form-group col-sm-4">
                              <label>Durasi</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <div class="input-group-text">
                                          <i class="far fa-sticky-note"></i>
                                      </div>
                                  </div>
                                  <input type="text" id="" class="form-control" >
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
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
                            <div class="form-group col-sm-4">
                              <label>Semester</label>
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
                            <div class="form-group col-sm-4">
                            <label>Semester KD</label>
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
                            
                        </div>
                        


                    </div>
                </div>
            </div>
            {{-- card --}}
            {{-- field --}}
            <div class="row">
              <button class="btn btn-success btn-block addbtn_komda" >Fields <i class="fas fa-plus"></i></button>
              </div>
          </div>

            {{-- button --}}
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
            {{-- button --}}
        </div>
    </div>


@endsection
@push('js')
<script>
    // multiple
    $(document).ready(function() {
        var max_fields      = 10;
        var wrapper   		= $(".fields_komda");
        var add_button      = $(".addbtn_komda");

        var x = 1;
        var y = 17;
        $(add_button).click(function(e){
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                y++;
                $(wrapper).append('<div class="card">'+
                    '<div class="card-header">'+
                        '<h4>KD</h4>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<div class="row">'+
                            '<div class="form-group col-sm-4">'+
                                '<label>KD Pengetahuan</label>'+
                                '<div class="input-group">'+
                                    '<div class="input-group-prepend">'+
                                        '<div class="input-group-text">'+
                                            '<i class="far fa-sticky-note"></i>'+
                                        '</div>'+
                                    '</div>'+
                                    '<input type="text" id="" class="form-control" >'+
                                '</div>'+
                            '</div>'+
                            '<div class="form-group col-sm-4">'+
                              '<label>KD Keterampilan</label>'+
                              '<div class="input-group">'+
                                 ' <div class="input-group-prepend">'+
                                      '<div class="input-group-text">'+
                                          '<i class="far fa-sticky-note"></i>'+
                                      '</div>'+
                                  '</div>'+
                                  '<input type="text" id="" class="form-control" >'+
                              '</div>'+
                            '</div>'+
                            '<div class="form-group col-sm-4">'+
                                '<label>Materi Inti</label>'+
                                '<div class="input-group">'+
                                    '<div class="input-group-prepend">'+
                                        '<div class="input-group-text">'+
                                            '<i class="far fa-sticky-note"></i>'+
                                        '</div>'+
                                    '</div>'+
                                   ' <textarea type="text" id="" class="form-control" name="" id="" style="height: 90px;"></textarea>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                            '<div class="form-group col-sm-4">'+
                                '<label>keterangan Pengetahuan</label>'+
                                '<div class="input-group">'+
                                    '<div class="input-group-prepend">'+
                                        '<div class="input-group-text">'+
                                            '<i class="far fa-sticky-note"></i>'+
                                        '</div>'+
                                    '</div>'+
                                    '<input type="text" id="" class="form-control" >'+
                                '</div>'+
                            '</div>'+
                            '<div class="form-group col-sm-4">'+
                              '<label>Keterangan Keterampilan</label>'+
                             ' <div class="input-group">'+
                                  '<div class="input-group-prepend">'+
                                      '<div class="input-group-text">'+
                                          '<i class="far fa-sticky-note"></i>'+
                                      '</div>'+
                                  '</div>'+
                                  '<input type="text" id="" class="form-control" >'+
                              '</div>'+
                            '</div>'+
                            '<div class="form-group col-sm-4">'+
                              '<label>Durasi</label>'+
                              '<div class="input-group">'+
                                 ' <div class="input-group-prepend">'+
                                      '<div class="input-group-text">'+
                                         ' <i class="far fa-sticky-note"></i>'+
                                      '</div>'+
                                  '</div>'+
                                 '<input type="text" id="" class="form-control" >'+
                             ' </div>'+
                            '</div>'+
                       ' </div>'+
                        '<div class="row">'+
                          '<div class="form-group col-sm-2">'+
                                    '<div class="" style="margin-top: 32px;">'+
                                        '<button class="btn btn-danger removebtn_komda"><i class="fas fa-times"></i></button>'+
                                    '</div>'+
                                '</div>'+
                            '<div class="form-group col-sm-2">'+
                               ' <label>Pertemuan</label>'+
                                '<div class="input-group">'+
                                   ' <div class="input-group-prepend">'+
                                       ' <div class="input-group-text">'+
                                            '<i class="far fa-sticky-note"></i>'+
                                       ' </div>'+
                                    '</div>'+
                                    '<input type="text" id="" class="form-control" name="" id="">'+
                                '</div>'+
                            '</div>'+
                            '<div class="form-group col-sm-4">'+
                              '<label>Semester</label>'+
                              '<div class="input-group">'+
                               ' <div class="input-group-prepend">'+
                                  '<div class="input-group-text">'+
                                     ' <i class="fas fa-align-left"></i>'+
                                  '</div>'+
                               ' </div>'+
                                '<select class="form-control">'+
                                  '<option selected>Lihat Lebih Lanjut</option>'+
                                  '<option value="1">One</option>'+
                                  '<option value="2">Two</option>'+
                                  '<option value="3">Three</option>'+
                                '</select>'+
                             ' </div>'+
                          '</div>'+
                          '<div class="form-group col-sm-4">'+
                            '<label>Semester KD</label>'+
                            '<div class="input-group">'+
                                '<div class="input-group-prepend">'+
                                    '<div class="input-group-text">'+
                                        '<i class="far fa-sticky-note"></i>'+
                                    '</div>'+
                                '</div>'+
                                '<input type="text" id="" class="form-control" name="" id="">'+
                            '</div>'+
                        '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>');
            }
        });

        $(wrapper).on("click",".removebtn_komda", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').parent('div').parent('div').parent('div').parent('div').remove(); x--;
        })
    });
</script>
@endpush
