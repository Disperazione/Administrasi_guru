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
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Strategi Pembelajaran</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="text-center">
                              <tr>
                                <th scope="col" style="width: ;">NO.</th>
                                <th scope="col" style="width: ;">Kompetensi Dasar</th>
                                <th scope="col" style="width: ;">Model Pembelajaran</th>
                                <th scope="col" style="width: ;">Metode Pembelajaran</th>
                                <th scope="col" style="width: ;">Deskripsi Kegiatan</th>
                                <th scope="col" style="width: ;">
                                    <button class="btn btn-success addbtn_strpembelajaran" style="width: 80px;">Fields <i class="fas fa-plus"></i></button>
                                </th>
                              </tr>
                            </thead>
                            <tbody class="fields_strpembelajaran">
                                <tr>
                                    <th scope="row">3.17 <br><br> 4.17</th>
                                    <td>
                                        <textarea type="text" class="form-control mb-2 mt-1 input_" name="[]" style="height: 40px;"></textarea>
                                        <textarea type="text" class="form-control input_" name="[]" style="height: 40px;"></textarea>
                                    </td>
                                    <td class="text-center">
                                        <textarea type="text" class="form-control input_" name="[]" style="height: 80px;"></textarea>
                                    </td>
                                    <td class="text-center">
                                        <textarea type="text" class="form-control input_" name="[]" style="height: 80px;"></textarea>
                                    </td>
                                    <td class="text-center">
                                        <textarea type="text" class="form-control input_" name="[]" style="height: 80px;"></textarea>
                                    </td>
                                    <td class="text-center">
                                        {{-- <button class="btn btn-danger removebtn_strpembelajaran" style="width: 40px;">X</button> --}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
        var wrapper   		= $(".fields_strpembelajaran");
        var add_button      = $(".addbtn_strpembelajaran");

        var x = 1;
        var y = 17;
        $(add_button).click(function(e){
            e.preventDefault();
            if(x < max_fields){
                x++;
                y++;
                $(wrapper).append('<tr>'+
                                    '<th scope="row">3.'+y+' <br><br> 4.'+y+'</th>'+
                                    '<td>'+
                                        '<textarea type="text" class="form-control mb-2 mt-1 input_" name="[]" style="height: 40px;"></textarea>'+
                                        '<textarea type="text" class="form-control input_" name="[]" style="height: 40px;"></textarea>'+
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<textarea type="text" class="form-control input_" name="[]" style="height: 80px;"></textarea>'+
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<textarea type="text" class="form-control input_" name="[]" style="height: 80px;"></textarea>'+
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<textarea type="text" class="form-control input_" name="[]" style="height: 80px;"></textarea>'+
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<button class="btn btn-danger removebtn_strpembelajaran" style="width: 40px;">X</button>'+
                                    '</td>'+
                                '</tr>');
            }
        });

        $(wrapper).on("click",".removebtn_strpembelajaran", function(e){
            e.preventDefault(); $(this).parent('td').parent('tr').remove(); x--;
        })
    });
</script>
@endpush
