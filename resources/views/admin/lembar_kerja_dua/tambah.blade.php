tambah lembar kerja 2
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

<form id="form" action="{{ route('admin.Lembar-kerja-2.store') }}" method="POST">
    @csrf
    {{-- content here --}}
    <div class="card">
        <div class="card-header">
            <h4><i class="fas fa-align-justify"></i> Tambah Data Lembar Kerja 2</h4>
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
                            <label>Nama Tenaga Pendidik</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="far fa-address-card"></i>
                                    </div>
                                </div>
                                <select class="form-control" name="id_guru"
                                    {{ (Auth::user()->role == 'guru') ? 'disabled id=""' : 'id=id_guru' }}>
                                    <option value="">Lihat Lebih Lanjut</option>
                                    @if (Auth::user()->role === 'admin')
                                    @foreach ($guru as $items)
                                    <option value="{{ $items->id }}"
                                        {{ (old('id_guru') == $items->id) ? 'selected' : '' }}>
                                        {{ $items->name }}</option>
                                    @endforeach
                                    @else
                                    <option value="{{  Auth::user()->guru->id  }}" selected>
                                        {{ Auth::user()->guru->name }}
                                    </option>
                                    @endif

                                </select>
                                <div class="invalid-feedback">
                                    Mapel tidak boleh koosng
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mapel</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-left"></i>
                                    </div>
                                </div>
                                <select class="form-control" name="id_mapel" id="mapel">
                                    <option value="">Lihat Lebih Lanjut</option>
                                    @if (Auth::user()->role == 'admin')
                                    {{-- @foreach ($mapel as $mapel)
                                    <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                                    @endforeach --}}
                                    @else
                                    @foreach (Auth::user()->guru->mapel as $mapels )
                                    <option value="{{ $mapels->id }}">{{ $mapels->nama_mapel }}</option>
                                    @endforeach
                                    @endif

                                </select>
                                <div class="invalid-feedback">
                                    Mapel tidak boleh koosng
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Bidang Studi</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-left"></i>
                                    </div>
                                </div>
                                <select class="form-control" name="id_bidang_keahlian" id="bidang">
                                    <option value=" ">Lihat Lebih Lanjut</option>
                                    {{-- @foreach ($bidang as $bidangs)
                                    <option value="{{ $bidangs->id }}">{{ $bidangs->bidang_studi }}</option>
                                    @endforeach --}}
                                </select>
                                <div class="invalid-feedback">
                                    Bidang Studi tidak boleh koosng
                                </div>
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
                            <label>kelas</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-justify"></i>
                                    </div>
                                </div>
                                <input type="text" id="kelas" class="form-control" disabled>
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
                                <input type="text" id="kompetensi" class="form-control" disabled>
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
                                <input type="text" id="jp" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <span  id="cmore_metode" class="btn btn-success">add </span>

                <table>
                    <tr>
                        <td id="cmetode_field">
                            <input type="text">
                        </td>
                    </tr>
                </table> --}}
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


            {{-- buttonsubmit --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="modal-footer">
                            <button class="btn btn-success addbtn_strpembelajaran">Fields <i class="fas fa-plus"></i></button>
                            <button class="btn btn-primary" id="button">Submit</button>
                            <a href="{{ route('admin.Lembar-kerja-4.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- buttonsubmit --}}
        </div>
    </div>
    {{-- end pages --}}
</form>


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
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                y++;
                $(wrapper).append('<div class="card">'+
                        '<div class="card-header">'+
                            '<h4>'+x+'. Strategi Pembelajaran Semester : </h4>'+
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
                                    '<label>Model Pembelajaran</label>'+
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
                                    '<label>Metode Pembelajaran</label>'+
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
                                        '<button class="btn btn-danger removebtn_strpembelajaran"><i class="fas fa-times"></i></button>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group col-sm-5">'+
                                    '<label>Deskripsi Kegiatan</label>'+
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

        $(wrapper).on("click",".removebtn_strpembelajaran", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').parent('div').parent('div').parent('div').parent('div').remove(); x--;
        })
    });

    // auto complete mapel
    $('#id_guru').change(function () {
        id = $(this).val();
        $('#mapel').empty();
        $('#mapel').append('<option value="">mencari..</option>');
        if (!id) {
            $('#mapel').empty();
            $('#mapel').append('<option value="">Mata pelajaran kosong</option>');
        }
        $.ajax({
            url: '/admin/lk4/option/guru/' + id, // url
            type: 'get', // method
            success: function (response) {
                console.log(response.mapel);
                $('#mapel').empty();
                if (!response.mapel.length) {
                    $('#mapel').append(
                        '<option value="">Mata pelajaran kosong</option>');
                } else {
                    $('#mapel').append('<option value="">Lihat lebih lanjut</option>');
                    response.mapel.forEach(element => {
                        $('#mapel').append('<option value="' + element.id +
                            '">' +
                            element.nama_mapel + '</option>')
                    });
                }
            },
            fail: function (rsponse) {
                console.log(response);
            }
        });
    });

    // autocompete bidang keahlian
    $('#mapel').change(function () {
        id = $(this).val();
        $('#bidang').empty();
        $('#bidang').append('<option value="">mencari..</option>');
        if (!id) {
            $('#bidang').empty();
            $('#bidang').append('<option value="">Bidang Studi kosong</option>');
        }
        $.ajax({
            url: '/admin/lk4/option/mapel/' + id, // url
            type: 'get', // method
            success: function (response) {
                console.log(response.mapel);
                $('#bidang').empty();
                if (!response.mapel.length) {
                    $('#bidang').append(
                        '<option value="">Bidang Studi kosong</option>');
                } else {
                    $('#bidang').append('<option value="">Lihat lebih lanjut</option>');
                    response.mapel.forEach(element => {
                        $('#bidang').append('<option value="' + element.id +
                            '">' +
                            element.bidang_studi + '</option>')
                    });
                }


            },
            fail: function (rsponse) {

            }
        });
    });

    // autocomplete status
    $('#bidang').change(function () {
        id = $(this).val(); // mengambil value
        $('#kompetensi').val('')
        $('#jp').val('');
        $('#kelas').val('');
        $.ajax({
            url: '/admin/lk4/option/bidang_studi/' + id, // url
            type: 'get', // method
            success: function (response) {
                console.log(response.bidang);
                $('#kompetensi').val(response.bidang.kompetensi_keahlian)
                $('#jp').val(response.bidang.jam_pelajaran);
                $('#kelas').val(response.bidang.kelas);

                response.bidang.kompetensi_dasar.forEach(function (element, key) {
                     console.log(key)
                    if (element.semester == 'Ganjil') {
                        $('.tbody-ganjil').append(
                            '<tr><td rowspan="2"><input type="text" name="id_kd[]" value="' +
                            element.id + '" hidden>' + (key + 1) + '</td>' +
                            '<td>' + element.kd_pengetahuan + '</td>' +
                            '<td>' + element.keterangan_pengetahuan + '</td>' +
                            ' <td rowspan="2"><select class="form-control"> '+
                                    '<option value="" selected>--Model Pembelajaran--</option>'+
                                    '<option>Project Based Learning (PjBL)</option>'+
                                    '<option>Problem Based Learning (PBL)</option>'+
                               '</select></td>' +
                         // ' <td rowspan="2"><textarea name="model_pembelajaran[]" class="form-control"></textarea></td>' +
                            '<td rowspan="2" class="metode_field'+key+'" data-id="'+element.id+'">'+
                                '<span class="btn btn-success mb-2 " id="more_metode'+key+'" >  More Metode</span>'+
                                '<input name="metode_pembelajaran[]" id="metode_pembelajaran'+key+'" class="form-control" value="'+element.id+')"/>'+
                            '</td>' +
                            ' <td rowspan="2"><textarea name="deskripsi_kegiatan[]" class="form-control"></textarea>' +
                            '</tr>' +
                            '<tr><td>' + element.kd_ketrampilan + '</td><td>' + element
                            .keterangan_ketrampilan + '</td></tr>');

                    } else if (element.semester == 'Genap') {
                        $('.tbody-genap').append(
                            '<tr><td rowspan="2"><input type="text" name="id_kd[]" value="' +
                            element.id + '" hidden>' + (key - 19) + '</td>' +
                            '<td>' + element.kd_pengetahuan + '</td>' +
                            '<td>' + element.keterangan_pengetahuan + '</td>' +
                            ' <td rowspan="2"><select class="form-control"> '+
                                    '<option value="" selected>--Model Pembelajaran--</option>'+
                                    '<option>Project Based Learning (PjBL)</option>'+
                                    '<option>Problem Based Learning (PBL)</option>'+
                               '</select></td>' +
                         // ' <td rowspan="2"><textarea name="model_pembelajaran[]" class="form-control"></textarea></td>' +
                            '<td rowspan="2" class="metode_field'+key+'" data-id="'+element.id+'">'+
                                '<span class="btn btn-success mb-2 " id="more_metode'+key+'" >  More Metode</span>'+
                                '<input name="metode_pembelajaran[]" id="metode_pembelajaran'+key+'" class="form-control" value="'+element.id+')" />'+
                            '</td>' +
                            ' <td rowspan="2"><textarea name="deskripsi_kegiatan[]" class="form-control"></textarea>' +

                            '</tr>' +
                            '<tr><td>' + element.kd_ketrampilan + '</td><td>' + element
                            .keterangan_ketrampilan + '</td></tr>');
                    }
                    var x = 1;
                            $('#more_metode'+key+'').click(function(e){
                                e.preventDefault();
                                // if(x < max_fields){
                                    console.log(x)
                                    x++; //text box increment
                                    $('.metode_field'+key+'').append(
                                        '<div>'+
                                            '<input name="metode_pembelajaran[]" " class="form-control" value="'+element.id+')"/>'+
                                            '<button  class="btn btn-danger removebtn_metode">X</button>'+
                                        '</div>');
                              });

                              $('.metode_field'+key+'').on("click",".removebtn_metode", function(e){ //user click on remove text
                                e.preventDefault(); $(this).parent('div').remove(); --x;
                            });
                });
                // ajax table here
            },
            fail: function (rsponse) {}
        });


        // var max_fields  = 10;



    });

    $('#button').click(function (e) {
        e.preventDefault();


for (let j = 0; j < 40; j++) {

    if ($w = $("#metode_pembelajaran"+j+'').parent('td').attr("data-id")) {
        $("td.metode_field"+j+'> input' ).val(+$w) ;
         $("td.metode_field"+j+'> div > input' ).val(+$w) ;

    }

}


            // });

        guru = $('#id_guru').val();
        mapel = $('#mapel').val();
        bidang = $('#bidang').val();
        console.log(!validated_mapel());

        if (!validated_guru() && !validated_bidang() && !validated_mapel()) {
            $('#form').submit();
        }else{
            validated_guru();
            validated_bidang();
            validated_mapel();
        }

        function validated_guru() {
            arr = [];
            if (!guru) {
                $('#id_guru').addClass('is-invalid');
                $('#id_guru').closest('div').find('invalid-feedback').removeClass('d-none');
                arr += 1
            } else {
                $('#id_guru').removeClass('is-invalid');
                $('#id_guru').closest('div').find('invalid-feedback').addClass('d-none');
            }
            return arr.length;
        }
        function validated_mapel() {
            arr = [];
            if (!mapel) {
                $('#mapel').addClass('is-invalid');
                $('#mapel').closest('div').find('invalid-feedback').removeClass('d-none');
                arr += 1
            } else {
                $('#mapel').removeClass('is-invalid');
                $('#mapel').closest('div').find('invalid-feedback').addClass('d-none');
            }
            return arr.length;
        }
        function validated_bidang() {
            arr = [];
            if (!bidang) {
                $('#bidang').addClass('is-invalid');
                $('#bidang').closest('div').find('invalid-feedback').removeClass('d-none');
                arr += 1
            } else {
                $('#bidang').removeClass('is-invalid');
                $('#bidang').closest('div').find('invalid-feedback').addClass('d-none');
            }
            return arr.length;
        }

    });


    // $(document).ready(function(){

    // });

</script>
@endpush
