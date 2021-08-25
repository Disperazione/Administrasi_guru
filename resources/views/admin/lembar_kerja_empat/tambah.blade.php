@extends('layout.master')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('title', 'SIFOS | Add Data LK 4')
@section('judul','Add Data Lembar Kerja 4')
@section('breadcrump')
{{-- breadcrump here --}}
<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
<div class="breadcrumb-item">LK 4</div>
@endsection
@section('main')

<form id="form" action="{{ route('admin.Lembar-kerja-4.store') }}" method="POST">
    @csrf
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
                        <h4 class="card-title" style="padding-top: 30px;">Data Tenaga Pendidik</h4>
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
                                        {{ (old('id_guru', $items->id)) ? 'selected' : '' }}>
                                        {{ $items->name }}</option>
                                    @endforeach
                                    @else
                                    <option value="{{  Auth::user()->guru->id  }}" selected>
                                        {{ Auth::user()->guru->name }}</option>
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
                                <input type="text" class="form-control" name="lembar_kerja" id="bidang_studi"
                                    placeholder="Default : TEHNOLOGI INFORMASI DAN KOMUKNIKASI">
                                <div class="invalid-feedback" c>
                                    Bidang Studi tidak boleh koosng
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mapel</label>
                            <div class="input-group">
                                {{-- <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-left"></i>
                                    </div>
                                </div> --}}
                                <select class="form-control" name="mapel" id="mapel">
                                    <option value="">Lihat Lebih Lanjut</option>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->id }}">{{ $item->mapel }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Mapel tidak boleh koosng
                                </div>
                            </div>
                        </div>
                          <div class="form-group">
                            <label>Jurusan</label>
                            <div class="input-group">
                                {{-- <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-left"></i>
                                    </div>
                                </div> --}}
                                <select class="form-control" name="id_jurusan" id="jurusan" multiple="multiple" disabled >
                                    <option >Lihat Lebih Lanjut</option>
                                    @foreach ($jurusan as $item)
                                    <option value="{{ $item->id }}">{{ $item->singkatan_jurusan }}</option>
                                    @endforeach

                                </select>
                                <div class="invalid-feedback">
                                    Jurusan tidak boleh koosng
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
                        {{-- <div class="form-group">
                            <label>Kompetensi Keahlian</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-justify"></i>
                                    </div>
                                </div>
                                <input type="text" id="kompetensi" class="form-control" disabled>
                            </div>
                        </div> --}}
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
                        <div class="form-group">
                            <label>Total Jam Pelajaran (JP)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-justify"></i>
                                    </div>
                                </div>
                                <input type="text" id="total_jp" class="form-control" disabled>
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
                        <h4>Indikator Ketercapaian Mata Pelajaran</h4>
                        {{-- <h4>Kompetensi Dasar :</h4>
                        <select id="" class="form-select form-control ml-2" style="width: 130px;">
                            <option>Ganjil</option>
                            <option>Genap</option>
                        </select> --}}
                    </div>
                    {{-- <div class="card-body">
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
                                    <textarea type="text" id="" class="form-control" name="" id=""
                                        style="height: 90px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-sm-5">
                                <label>Modul</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <textarea type="text" id="" class="form-control" name="" id=""
                                        style="height: 90px;"></textarea>
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
                                    <textarea type="text" id="" class="form-control" name="" id=""
                                        style="height: 90px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-sm-5">
                                <label>Video Pembelajaran</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <textarea type="text" id="" class="form-control" name="" id=""
                                        style="height: 90px;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-2">
                                <div class="" style="margin-top: 32px;">
                                    <button class="btn btn-success addbtn_indikmapel">Fields <i class="fas fa-plus"></i></button>
                                    <button class="btn btn-danger removebtn_indikmapel"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="form-group col-sm-5">
                                <label>Deskripsi Bahan Ajar</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <textarea type="text" id="" class="form-control" name="" id=""
                                        style="height: 90px;"></textarea>
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
                                    <textarea type="text" id="" class="form-control" name="" id=""
                                        style="height: 90px;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            {{-- card --}}


            {{-- buttonsubmit --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="modal-footer">
                            <button class="btn btn-success addbtn_indikmapel">Fields <i
                                    class="fas fa-plus"></i></button>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        multiple_input_form();
        $('#mapel').select2();
        $('#jurusan').select2();
        id_jurusan = $('#jurusan').data('id');
        $('#jurusan').val(id_jurusan).trigger('change');
        // auto complete mapel
        // $('#jurusan').change(function () {
        //     id = $(this).val(); // mengambil value
        //     //console.log(id);
        //     $('#mapel').empty();
        //     $('#mapel').append('<option value="">mencari..</option>');
        //     $('.fields_multiple_semester_ganjil').empty(); // koosngin tabless
        //     $('.fields_multiple_semester_genap').empty();
        //     // call ajax untuk get / mendapatkan data
        //     if (!id) {
        //         $('#mapel').empty();
        //         $('#mapel').append('<option value="">Mata pelajaran kosong</option>');
        //     }
        //     $.ajax({
        //         url: '/admin/lk4/option/jurusan/' + id, // url
        //         type: 'get', // method
        //         success: function (response) {
        //             console.log(response.mapel);
        //             $('#mapel').empty();
        //             if (!response.mapel.length) {
        //                 $('#mapel').append(
        //                     '<option value="">Mata pelajaran kosong</option>');
        //             } else {
        //                 $('#mapel').append('<option value="">Lihat lebih lanjut</option>');
        //                 response.mapel.forEach(element => {
        //                     $('#mapel').append('<option value="' + element.id +
        //                         '">' + element.mapel + '</option>')
        //                 });
        //             }
        //         },
        //         fail: function (rsponse) {
        //             console.log(response);
        //         }
        //     });
        // });


        // bidang + status
        $('#mapel').change(function () {
            id = $(this).val(); // mengambil value
            $('#total_jp').val('')
            $('#jp').val('');
            $('#kelas').val('');
            $('#jurusan').val('').trigger("change");
            $.ajax({
                url: '/admin/lk4/option/mapel/' + id, // url
                type: 'get', // method
                success: function (response) {
                    $('.fields_multiple_semester_ganjil').empty();
                    $('.fields_multiple_semester_genap').empty();
                    console.log(response.mapel);
                    $('#total_jp').val(response.mapel.total_waktu_jam_pelajaran)
                    $('#jp').val(response.mapel.jam_pelajaran);
                    $('#kelas').val(response.mapel.kelas);
                    $('.fields_indikmapel').empty();
                    $('#jurusan').val(response.id_jurusan).trigger("change");
                    console.log(response.kd);

                    count = 0;
                    $(".addbtn_indikmapel").click(function (params) {
                        // for (let i = 0; i < count; i++) {
                            $('.fields_indikmapel').append(
                                '<input value="'+ response.kd[count].id +'" name="id_kd[]" hidden>'+
                                '<div class="card">' +
                                '<div class="card-header">' +
                                '<h4>Indikator Ketercapaian Mata Pelajaran #</h4>' +
                                '</div>' +
                                '<div class="card-body">' +
                                '<div class="row">' +
                                '<div class="form-group col-sm-2">' +
                                '<label>No KD.</label>' +
                                '<div class="input-group">' +
                                '<div class="input-group-prepend">' +
                                '<div class="input-group-text">' +
                                '<i class="far fa-sticky-note"></i>' +
                                '</div>' +
                                '</div>' +
                                '<input type="text" id="" class="form-control" disabled value="' +
                                response.kd[count].kd_pengetahuan + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="form-group col-sm-5">' +
                                '<label>Kompetensi Dasar</label>' +
                                '<div class="input-group">' +
                                '<div class="input-group-prepend">' +
                                '<div class="input-group-text">' +
                                '<i class="far fa-sticky-note"></i>' +
                                '</div>' +
                                '</div>' +
                                '<input type="text" id="" class="form-control" name="" id="" disabled value="'+  response.kd[count].keterangan_pengetahuan +'">' +
                                '</div>' +
                                '</div>' +
                                '<div class="form-group col-sm-5">' +
                                '<label>Modul</label>' +
                                '<div class="input-group">' +
                                '<div class="input-group-prepend">' +
                                '<div class="input-group-text">' +
                                '<i class="far fa-sticky-note"></i>' +
                                '</div>' +
                                '</div>' +
                                '<textarea type="text" id="" class="form-control" name="modul[]" id="" style="height: 90px;"></textarea>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '<div class="row">' +
                                '<div class="form-group col-sm-2">' +
                                '<label>No KD.</label>' +
                                '<div class="input-group">' +
                                '<div class="input-group-prepend">' +
                                '<div class="input-group-text">' +
                                '<i class="far fa-sticky-note"></i>' +
                                '</div>' +
                                '</div>' +
                                '<input type="text" id="" class="form-control" disabled value="' +
                                response.kd[count].kd_ketrampilan + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="form-group col-sm-5">' +
                                '<label>Kompetensi Dasar</label>' +
                                '<div class="input-group">' +
                                '<div class="input-group-prepend">' +
                                '<div class="input-group-text">' +
                                '<i class="far fa-sticky-note"></i>' +
                                '</div>' +
                                '</div>' +
                                '<input type="text" id="" class="form-control" name="" id="" disabled value="'+  response.kd[count].keterangan_ketrampilan +'">' +
                                '</div>' +
                                '</div>' +
                                '<div class="form-group col-sm-5">' +
                                '<label>Video Pembelajaran</label>' +
                                '<div class="input-group">' +
                                '<div class="input-group-prepend">' +
                                '<div class="input-group-text">' +
                                '<i class="far fa-sticky-note"></i>' +
                                '</div>' +
                                '</div>' +
                                '<textarea type="text" id="" class="form-control" name="vidio_pel[]" id="" style="height: 90px;"></textarea>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '<div class="row">' +
                                '<div class="form-group col-sm-2">' +
                                '<div class="" style="margin-top: 32px;">' +
                                '<button class="btn btn-danger removebtn_indikmapel"><i class="fas fa-times"></i></button>' +
                                '</div>' +
                                '</div>' +
                                '<div class="form-group col-sm-5">' +
                                '<label>Deskripsi Bahan Ajar</label>' +
                                '<div class="input-group">' +
                                '<div class="input-group-prepend">' +
                                '<div class="input-group-text">' +
                                '<i class="far fa-sticky-note"></i>' +
                                '</div>' +
                                '</div>' +
                                '<textarea type="text" id="" class="form-control" name="deskripsi_bahan[]" id="" style="height: 90px;"></textarea>' +
                                '</div>' +
                                '</div>' +
                                '<div class="form-group col-sm-5">' +
                                '<label>Keterangan.</label>' +
                                '<div class="input-group">' +
                                '<div class="input-group-prepend">' +
                                '<div class="input-group-text">' +
                                '<i class="far fa-sticky-note"></i>' +
                                '</div>' +
                                '</div>' +
                                '<textarea type="text" id="" class="form-control" name="keterangan[]" id="" style="height: 90px;"></textarea>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>');
                        // }
                        count++
                    })

                    $('.fields_indikmapel').on("click", ".removebtn_indikmapel", function (
                        e) { //user click on remove text
                        e.preventDefault();
                        $(this).parent('div').parent('div').parent('div').parent(
                            'div').parent('div').remove();
                            count--; // 1 - i
                    })
                    // });

                },
                fail: function (rsponse) {

                }
            });
        });

        // autocomplete status
        // $('#bidang').change(function () {
        //     id = $(this).val(); // mengambil value
        //     $('#kompetensi').val('')
        //     $('#jp').val('');
        //     $('#kelas').val('');
        //     $.ajax({
        //         url: '/admin/lk4/option/bidang_studi/' + id, // url
        //         type: 'get', // method
        //         success: function (response) {
        //             console.log(response.bidang);
        //             $('#kompetensi').val(response.bidang.kompetensi_keahlian)
        //             $('#jp').val(response.bidang.jam_pelajaran);
        //             $('#kelas').val(response.bidang.kelas);

        //             response.bidang.kompetensi_dasar.forEach(function (element, key) {
        //                 if (element.semester == 'Ganjil') {
        //                     $('.tbody-ganjil').append(
        //                         '<tr><td rowspan="2"><input type="text" name="id_kd[]" value="' +
        //                         element.id + '" hidden>' + (key + 1) + '</td>' +
        //                         '<td>' + element.kd_pengetahuan + '</td>' +
        //                         '<td>' + element.keterangan_pengetahuan + '</td>' +
        //                         ' <td rowspan="2"><textarea name="modul[]" class="form-control"></textarea></td>' +
        //                         '<td rowspan="2"><textarea name="vidio_pel[]" class="form-control"></textarea></td>' +
        //                         ' <td rowspan="2"><textarea name="deskripsi_bahan[]" class="form-control"></textarea>' +
        //                         ' </td> <td rowspan="2"><textarea name="keterangan[]" class="form-control"></textarea>' +
        //                         '</td>' +
        //                         '</tr>' +
        //                         '<tr><td>' + element.kd_ketrampilan + '</td><td>' + element
        //                         .keterangan_ketrampilan + '</td></tr>');
        //                 } else if (element.semester == 'Genap') {
        //                     $('.tbody-genap').append(
        //                         '<tr><td rowspan="2"><input type="text" name="id_kd[]" value="' +
        //                         element.id + '" hidden>' + (key - 19) + '</td>' +
        //                         '<td>' + element.kd_pengetahuan + '</td>' +
        //                         '<td>' + element.keterangan_pengetahuan + '</td>' +
        //                         ' <td rowspan="2"><textarea name="modul[]" class="form-control"></textarea></td>' +
        //                         '<td rowspan="2"><textarea name="vidio_pel[]" class="form-control"></textarea></td>' +
        //                         ' <td rowspan="2"><textarea name="deskripsi_bahan[]" class="form-control"></textarea>' +
        //                         ' </td> <td rowspan="2"><textarea name="keterangan[]" class="form-control"></textarea>' +
        //                         '</td>' +
        //                         '</tr>' +
        //                         '<tr><td>' + element.kd_ketrampilan + '</td><td>' + element
        //                         .keterangan_ketrampilan + '</td></tr>');
        //                 }
        //             });
        //             // ajax table here
        //         },
        //         fail: function (rsponse) {}
        //     });
        // });

        $('#button').click(function (e) {
            e.preventDefault();
            jurusan = $('#jurusan').val();
            mapel = $('#mapel').val();
            // bidang = $('#bidang').val();
            console.log(!validated_mapel());

            if (!validated_jurusan()  && !validated_mapel()) {
                $('#form').submit();
            } else {
                validated_jurusan();
                // validated_bidang();
                validated_mapel();
            }

            function validated_jurusan() {
                arr = [];
                if (!jurusan) {
                    $('#jurusan').addClass('is-invalid');
                    $('#jurusan').closest('div').find('invalid-feedback').removeClass('d-none');
                    arr += 1
                } else {
                    $('#jurusan').removeClass('is-invalid');
                    $('#jurusan').closest('div').find('invalid-feedback').addClass('d-none');
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

            // function validated_bidang() {
            //     arr = [];
            //     if (!bidang) {
            //         $('#bidang').addClass('is-invalid');
            //         $('#bidang').closest('div').find('invalid-feedback').removeClass('d-none');
            //         arr += 1
            //     } else {
            //         $('#bidang').removeClass('is-invalid');
            //         $('#bidang').closest('div').find('invalid-feedback').addClass('d-none');
            //     }
            //     return arr.length;
            // }

        })

        // multiple
        function multiple_input_form(kd_pengetahuan = 1, kd_ketrampilan = 13) {
            var max_fields = 10;
            var wrapper = $(".fields_indikmapel");
            var add_button = $(".addbtn_indikmapel");

            var x = kd_pengetahuan;
            var y = kd_ketrampilan;
            i = 0;
            $(add_button).click(function (e) {
                e.preventDefault();
            });
            }
    });

</script>
@endpush
