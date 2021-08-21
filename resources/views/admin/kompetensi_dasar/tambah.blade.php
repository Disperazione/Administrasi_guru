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
            <div class="card-title"></div>
        </div>

        {{-- data kiri --}}
        <div class="row">
            <div class="col-sm-6">
                <div class="card-header">
                    <h4>Mata Pelajaran</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>bidang Study</label>
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
                        <label>jam pelajaran</label>
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
                    <h4>.</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Mata pelajaran</label>
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

{{-- bawah --}}
        <div class="row fields_komda">
            <div class="col-sm-6">
                <div class="card-header">
                    <h4>KD</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>KD Pengetahuan</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="far fa-file-alt"></i>
                            </div>
                          </div>
                          <input type="text" class="form-control">
                          <button class="btn btn-success ml-4 addbtn_komda" style="height: 35px">Fields <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan Pengetahuan</label>
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
                        <label>KD Keterampilan</label>
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
                        <label>Keterangan keterampilan</label>
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
                        <label>Materi Inti</label>
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
                        <label>Durasi</label>
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
                        <label>Pertemuan</label>
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
                    <div class="form-group">
                        <label>Semester KD</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="far fa-file-alt"></i>
                            </div>
                          </div>
                          <input type="text" class="form-control">
                        </div>
                    </div>
                    
                </div>
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
    </div>
    


</div>
@endsection
@push('js')
<script>
    // multiple input

    $(document).ready(function(){
        var max_fields  = 10;
        var wrapper     =$(".fields_komda");
        var add_button  =$(".addbtn_komda");

        var x = 1;
        $(add_button).click(function(e){
            e.preventDefault();
            if(x < max_fields){
                x++; //text box increment
                $(wrapper).append('<div class="col-sm-6">'+
                '<div class="card-header">'+
                    '<h4>.</h4>'+
                '</div>'+
                '<div class="card-body">'+
                    '<div class="form-group">'+
                        '<label>KD Pengetahuan</label>'+
                        '<div class="input-group">'+
                          '<div class="input-group-prepend">'+
                            '<div class="input-group-text">'+
                                '<i class="far fa-file-alt"></i>'+
                            '</div>'+
                          '</div>'+
                          '<input type="text" class="form-control">'+
                          '<button class="btn btn-danger ml-4 removebtn_komda" style="height: 35px">X</button>'+
                        '</div>'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<label>Keterangan Pengetahuan</label>'+
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
                        '<label>KD Keterampilan</label>'+
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
                        '<label>Keterangan keterampilan</label>'+
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
                        '<label>Materi Inti</label>'+
                        '<div class="input-group">'+
                         ' <div class="input-group-prepend">'+
                            '<div class="input-group-text">'+
                                '<i class="far fa-file-alt"></i>'+
                            '</div>'+
                          '</div>'+
                          '<textarea type="text" class="form-control" name="" style="height: 70px;"></textarea>'+
                        '</div>'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<label>Durasi</label>'+
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
                        '<label>Pertemuan</label>'+
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
                        '<label>Semester</label>'+
                        '<div class="input-group">'+
                          '<div class="input-group-prepend">'+
                            '<div class="input-group-text">'+
                                '<i class="fas fa-align-left"></i>'+
                            '</div>'+
                          '</div>'+
                          '<select class="form-control">'+
                            '<option selected>Lihat Lebih Lanjut</option>'+
                            '<option value="1">One</option>'+
                            '<option value="2">Two</option>'+
                            '<option value="3">Three</option>'+
                          '</select>'+
                        '</div>'+
                    '</div>'+
                   
                    '<div class="form-group">'+
                        '<label>Semester KD</label>'+
                        '<div class="input-group">'+
                          '<div class="input-group-prepend">'+
                            '<div class="input-group-text">'+
                                '<i class="far fa-file-alt"></i>'+
                            '</div>'+
                          '</div>'+
                          '<input type="text" class="form-control">'+
                        '</div>'+
                    '</div>'+
                  '</div>'+      
            '</div>')
            }       
          });      
           
          $(wrapper).on("click",".removebtn_komda", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').parent('div').parent('div').parent('div').remove(); x--;
        });
    });

</script>

@endpush
