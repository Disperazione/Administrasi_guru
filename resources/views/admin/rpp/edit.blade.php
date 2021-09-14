@extends('layout.master')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('title', 'SIFOS | Tambah RPP')
@section('judul','Tambah RPP')
@section('breadcrump')
{{-- breadcrump here --}}
<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.RPP.index') }}">RPP</a></div>
<div class="breadcrumb-item">Edit RPP</div>

@endsection
@section('main')
{{-- content here --}}

<div class="card">
    <div class="card-header mt-2">
        <h4 class="pt-2"><i class="fas fa-align-justify mr-2"></i>Edit Data RPP</h4>
    </div>
    <div class="card-body">
        <div class="col-lg-12">
            <form action="{{ route('admin.RPP.update', $rpp->id) }}" method="POST" id="form">
                @method('put')
                @csrf
                <div class="card card-primary shadow">
                    <div class="card-header " style="min-height: 10%">

                    </div>
                    <div class="card-body">
                        <div class="row mb-5">
                            {{-- card col 1 --}}
                            <div class="col-6">
                                <div class="mb-3 col-lg-10">
                                    <label>Mata Pelajaran</label>
                                    <select name="bidang_stu"
                                        class="form-control   @error('bidang_stu')  is-invalid  @enderror select2"
                                        id="mapel" name="mapel" disabled>
                                        <option value=" ">-- Mata pelajaran --</option>
                                        @foreach ( $bidang as $bidangs )
                                        <option value="{{ $bidangs->id }}"{{ ($bidang_kd->id == $bidangs->id) ? 'selected' : '' }}>{{ $bidangs->mapel }}</option>
                                        @endforeach
                                        </option>
                                    </select>
                                    <div id="invalid_siswa" class="invalid-feedback d-none"></div>
                                </div>
                                <div class="mb-3 col-lg-10">
                                    <label>Kompetensi Keahlian</label>
                                    <select class="form-control input_rp keahlian" name="keahlian" id="keahlian"
                                        multiple="multiple" disabled data-id_jurusan="{{ $id_jurusan }}">
                                        {{-- <option value="" selected>Kompetensi_keahlian</option> --}}
                                        @foreach ($jurusan as $item)
                                        <option value="{{ $item->id }}">{{ $item->singkatan_jurusan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- card col 2 --}}
                            <div class="col-6">
                                <div class="mb-3 col-lg-10">
                                    <label>Waktu Pembelajaran</label>
                                    <input type="text" class="form-control input_rp jam" id="total_waktu" value="{{ $bidang_kd->total_waktu_jam_pelajaran }}" disabled>
                                </div>
                                <div class="mb-3 col-lg-10">
                                    <label for="">Jam Pelajaran</label>
                                    <input type="text" class="form-control" id="_jam" value="{{ $bidang_kd->total_jam_pelajaran }}" disabled>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="rpp_flied card card-primary shadow">
                    <div class="card-header">
                        Kompetensi Dasar
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Kd pengetahuan</label>
                                <select id="" class="form-control kd_pengetahuan" id="kd_pengetahuan"
                                    name="id_kd_pengethuan">
                                    @foreach ($kompetensi_dasar as $kd)
                                    <option value="{{ $kd->id }}"
                                        {{ ($kd->id == $rpp->id_kompetensi_dasar) ? 'selected' : '' }}>KD
                                        {{ $kd->kd_pengetahuan .' '.$kd->keterangan_pengetahuan }}</option>
                                    @endforeach
                                </select>
                                <div class="card mt-3">
                                    <label for="">Ipk kd pengetahuan</label>
                                    <div class="row kd_pengetahuan_multiple" id="kd_pengetahuan_multiple">
                                        <span class="w-100">
                                            <input type="text" class="form-control w-75 ml-3 d-inline mr-2"
                                                name="ipk_pengetahuan[]"
                                                value="{{ $rpp->kompetensi_dasar->ipk_kompetensi_dasar[0]->ipk_kd_pengetahuan }}">
                                            <button type="button" class=" btn btn-success w-10 d-inline mr-2 "
                                                id="add_pengetahuan">+</button>
                                        </span>
                                        {{-- jika rpp lebih dari 1 (index [0] atau couunt([0]) == 1 )--}}
                                        @if (count($rpp->kompetensi_dasar->ipk_kompetensi_dasar) > 1)
                                        @for($i=1; $i < count($rpp->kompetensi_dasar->ipk_kompetensi_dasar); $i++)
                                            @if(empty($rpp->kompetensi_dasar->ipk_kompetensi_dasar[$i]->ipk_kd_pengetahuan))
                                            @else
                                            <span class="w-100">
                                                <input type="text" class="form-control w-75 ml-3 d-inline mr-2 mt-2"
                                                    name="ipk_pengetahuan[]"
                                                    value="{{ $rpp->kompetensi_dasar->ipk_kompetensi_dasar[$i]->ipk_kd_pengetahuan }}">
                                                <button type="button" class=" btn btn-success w-10 d-inline mr-2 "
                                                    id="add_pengetahuan">+</button>
                                                <button type="button" class=" btn btn-danger w-10 d-inline mr-2 "
                                                    id="remove_pengetahuan">x</button>
                                            </span>
                                            @endif

                                            @endfor
                                            @endif
                                            {{-- <button type="button" class=" btn btn-danger w-10 d-inline"
                                            id="remove_pengetahuan">x</button> --}}

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="">Kd ketrampilan</label>
                                <select id="" class="form-control d-block kd_ketrampilan" id="kd_ketrampilan"
                                    name="id_kd_ketrampilan">
                                    @foreach ($kompetensi_dasar as $kd)
                                    <option value="{{ $kd->id }}"
                                        {{ ($kd->id == $rpp->id_kompetensi_dasar) ? 'selected' : '' }}>KD
                                        {{ $kd->kd_ketrampilan .' '.$kd->keterangan_ketrampilan }}</option>
                                    @endforeach
                                </select>
                                <div class="card mt-3">
                                    <label for="">Ipk kd pengetahuan</label>
                                    <div class="row" id="kd_ketrampilan_multiple">
                                        <span class="w-100">
                                            <input type="text" class="form-control w-75 ml-3 d-inline mr-2"
                                                name="ipk_ketrampilan[]"
                                                value="{{ $rpp->kompetensi_dasar->ipk_kompetensi_dasar[0]->ipk_kd_ketrampilan }}">
                                            <button class=" btn btn-success w-10 d-inline mr-2"
                                                id="add_ketrampilan">+</button>
                                        </span>
                                        @if (count($rpp->kompetensi_dasar->ipk_kompetensi_dasar) > 1)
                                        @for ($i = 1 ; $i < count($rpp->kompetensi_dasar->ipk_kompetensi_dasar);$i++)
                                            {{-- jika kosong maka tidak di tampilkan --}}
                                            @if(empty($rpp->kompetensi_dasar->ipk_kompetensi_dasar[$i]->ipk_kd_ketrampilan))
                                            @else
                                            <span class="w-100 mt-2">
                                                <input type="text" class="form-control w-75 ml-3 d-inline mr-2"
                                                    name="ipk_ketrampilan[]"
                                                    value="{{ $rpp->kompetensi_dasar->ipk_kompetensi_dasar[$i]->ipk_kd_ketrampilan }}">
                                                <button class=" btn btn-success w-10 d-inline mr-2"
                                                    id="add_ketrampilan">+</button>
                                                <button class=" btn btn-danger w-10 d-inline mr-2"
                                                    id="add_ketrampilan">-</button>
                                            </span>
                                            @endif

                                            @endfor
                                            @endif
                                            {{-- <button class=" btn btn-danger w-10 d-inline" id="remove_ketrampilan">x</button> --}}


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card card-primary shadow">
                    <div class="card-header">
                        Pertemuan
                    </div>
                    <div class="card-body">
                        {{-- <label for="" class="ml-2">Pertemuan</label> --}}
                        <div class="row mb-4" id="field_pertemuan">
                            {{-- cara kedua selsain make loop --}}
                            @foreach ($rpp->pertemuan_rpp as $key => $item)
                            @if ($key < 1)
                            <span class="w-100 ml-3">
                                <input type="text" class="form-control d-inline" style="width: 85%" name="pertemuan[]" value="{{ $rpp->pertemuan_rpp[$key]->pertemuan }}">
                                <button type="button" class="btn btn-success w-10 d-inline ml-3"
                                    id="add_pertemuan">+</button>
                            </span>
                            @endif
                            @if ($key >= 1)
                            <span class="w-100 ml-3 mt-2">
                                <input type="text" class="form-control d-inline" style="width: 85%" name="pertemuan[]" value="{{ $rpp->pertemuan_rpp[$key]->pertemuan }}">
                                <button type="button" class="btn btn-success w-10 d-inline ml-3 mr-2"
                                    id="add_pertemuan">+</button>
                                <button type="button" class="btn btn-danger w-10 d-inline"
                                    id="remove_pertemuan">-</button>
                            </span>
                            @endif
                            @endforeach

                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {

        // select 2
        $('#keahlian').select2();
        id_jurusan = $('#keahlian').data('id_jurusan'); // mengambil id jurusan yang ada di data id jurusan
        $('#keahlian').val(id_jurusan).trigger('change'); // mengubah atau selected value sesuai id jurusan dalam bentuk array

        // memamnngil multiple input funtion
        kd_pengetahuan_multiple();
        kd_ketrampilan_multiple();
        mulitple_pertemuan();
        selected_option(); // untuk selectec yang pengetahuan === ketrampilan ex 3.04 == 4.04

        $('#mapel').change(function (e) {
            id = $(this).val(); // memngambil value mapel
            $('#keahlian').val('').trigger('change');
            $('#_jam').val('');
            $('#total_waktu').val('');
            // $('.kd_ketrampilan').empty();
            // $('.kd_pengetahuan').empty();
            $.ajax({
                url: '/admin/option_mapel_rpp/' + id,
                type: 'GET',
                success: function (response) {
                    $('#keahlian').val(response.id_jurusan).trigger(
                        'change'
                    ); // menjadi selected jika id yang di option == id yang di trigger
                    $('#_jam').val(response.bidang.total_jam_pelajaran);
                    $('#total_waktu').val(response.bidang.total_waktu_jam_pelajaran);
                    console.log(response.bidang);
                    // apeend kd
                    response.kd.forEach(element => {
                        $('.kd_pengetahuan').append('<option value="' + element.id +
                            '">KD ' + element.kd_pengetahuan + ' ' + element
                            .keterangan_pengetahuan + '</option>');
                    });

                    response.kd.forEach(element => {
                        $('.kd_ketrampilan').append('<option value="' + element.id +
                            '" >KD ' + element.kd_ketrampilan + ' ' + element
                            .keterangan_ketrampilan + '</option>');
                    });

                },
                fail: function (erorr) {

                }
            })
        })

        function selected_option(params) {
            $('.kd_pengetahuan').change(function () {
                let this_pen = $(this).val();
                $(".kd_ketrampilan option[value='" + this_pen + "']").attr("selected", "selected");;
            })

            $('.kd_ketrampilan').change(function () {
                let this_ket = $(this).val();
                $(".kd_pengetahuan option[value='" + this_ket + "']").attr("selected", "selected");;
            })

        }

        function kd_pengetahuan_multiple() {
            i = 0;
            $('body').on('click', '#add_pengetahuan', function (e) {
                e.preventDefault();
                i++;
                $('#kd_pengetahuan_multiple').append('<span class="w-100 mt-3">' +
                    '<input type="text" class="form-control w-75 ml-3 d-inline mr-2" name="ipk_pengetahuan[]">' +
                    '<button class=" btn btn-success w-10 d-inline mr-2 " id="add_pengetahuan">+</button>' +
                    '<button class=" btn btn-danger w-10 d-inline"  id="remove_pengetahuan">x</button>"' +
                    '</span>');
            })
            $('body').on('click', '#remove_pengetahuan', function (e) {
                console.log('click');
                e.preventDefault();
                $(this).parent('span').remove(); // mencari parent nya
                i--; // kurangi index nya
            })
        }

        function kd_ketrampilan_multiple() {
            i = 0;
            $('body').on('click', '#add_ketrampilan', function (e) {
                e.preventDefault();
                i++;
                $('#kd_ketrampilan_multiple').append('<span class="w-100 mt-3">' +
                    '<input type="text" class="form-control w-75 ml-3 d-inline mr-2" name="ipk_ketrampilan[]">' +
                    '<button class=" btn btn-success w-10 d-inline mr-2 " id="add_ketrampilan">+</button>' +
                    '<button class=" btn btn-danger w-10 d-inline"  id="remove_ketrampilan">x</button>"' +
                    '</span>');
            })
            $('body').on('click', '#remove_ketrampilan', function (e) {
                console.log('click');
                e.preventDefault();
                $(this).parent('span').remove(); // mencari parent nya
                i--; // kurangi index nya
            })
        }

        function mulitple_pertemuan() {
            i = 0;
            $('body').on('click', '#add_pertemuan', function (e) {
                e.preventDefault();
                i++;
                $('#field_pertemuan').append('<span class="w-100 ml-3 mt-2">' +
                    '  <input type="text" class="form-control d-inline" style="width: 85%" name="pertemuan[]">' +
                    ' <button class="btn btn-success w-10 d-inline ml-3 mr-2" id="add_pertemuan">+</button>' +
                    ' <button class="btn btn-danger w-10 d-inline" id="remove_pertemuan">-</button>' +
                    '</span>');

            });
            $('body').on('click', '#remove_pertemuan', function (e) {
                e.preventDefault();
                $(this).parent('span').remove();
                i--;
            });
        }
    })

</script>
@endpush
