@extends('layout.master')
@push('css')

@endpush
@section('title', 'SIFOS | Tambah RPP')
@section('judul','Tambah RPP')
@section('breadcrump')
    {{-- breadcrump here --}}
    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="{{ route('admin.RPP.index') }}">RPP</a></div>
    <div class="breadcrumb-item">Tambah RPP</div>
    
@endsection
@section('main')
    {{-- content here --}}

    <div class="card">
        <div class="card-header mt-2">
            <h4 class="pt-2"><i class="fas fa-align-justify mr-2"></i>Tambah Data RPP</h4>
        </div>
        <div class="card-body">
            <div class="col-lg-12">
                <form action="{{ route('admin.RPP.store') }}" method="POST" id="form">
                    @csrf
                    <div class="row mb-5">
                        {{-- card col 1 --}}
                        <div class="col-6">
                            <div class="mb-3 col-lg-10">
                                <label>Bidang Study</label>
                                <select name="bidang_stu"
                                    class="form-control   @error('bidang_stu')  is-invalid  @enderror select2"
                                    id="bidang_stu">
                                    <option value="">--Cari Bidang Study--</option>
                                    
                                    
                                    </option>
                                    
                                </select>
                                <div id="invalid_siswa" class="invalid-feedback d-none"></div>
                            </div>
                            <div class="mb-3 col-lg-10">
                                <label>Kompetensi Keahlian</label>
                                <input type="text" name="keahlian" class="form-control input_rp keahlian" disabled>
                            </div>
                            <div class="mb-3 col-lg-10">
                                <label>Mata Pelajaran</label>
                                <input type="text" name="mapel" class="form-control input_rp mapel" disabled>
                            </div>
                            <div class="mb-3 col-lg-10">
                                <label>Jam Pembelajaran</label>
                                <input type="text" name="jam" class="form-control input_rp jam" disabled>
                            </div>
                            <div class="mb-3 col-lg-10">
                                <label>KD Keterampilan</label>
                                <input type="text" name="keterampilan" class="form-control input_rp keterampilan" disabled>
                            </div>
                            <div class="mb-3 col-lg-10">
                                <label>KD Pengetahuan</label>
                                <input type="text" name="pengetahuan" class="form-control input_rp pengetahuan" disabled>
                            </div>
                            
                        </div>
    
                        {{-- card col 2 --}}
                        <div class="col-6">
                            {{-- bekerja --}}
                            <div class="mb-3 col-lg-10" id="namaperusahaan" >
                                <label>Nama Perusahaan</label>
                                <div class="mb-3">
                                    <input type="text" name="nama_perusahaan" id="valid_namaperusahaan"
                                        class="form-control @error('valid_namaperusahaan')  is-invalid  @enderror form-control"
                                        value="">
                                    <div id="invalid_namaperusahaan" class="invalid-feedback d-none"></div>
                                </div>
                            </div>
                            <div class="mb-3 col-lg-10" id="alamatperusahaan" >
                                <label>Alamat Perusahaan</label>
                                <div class="mb-3">
                                    <input type="text" name="alamat_perusahaan" id="valid_alamatperusahaan"
                                        class="form-control @error('valid_alamatperusahaan')  is-invalid  @enderror form-control"
                                        value="">
                                    <div id="invalid_alamatperusahaan" class="invalid-feedback d-none"></div>
                                </div>
                            </div>
                            <div class="mb-3 col-lg-10" id="tahunkuliah" >
                                <label>Tahun Masuk Kuliah</label>
                                <div class="mb-3">
                                    <input type="text" name="tahun_kuliah" id="valid_tahunkuliah"
                                        class="form-control @error('valid_tahunkuliah')  is-invalid  @enderror form-control"
                                        value="">
                                    <div id="invalid_tahunkuliah" class="invalid-feedback d-none"></div>
                                </div>
                            </div>
                            {{-- tutup --}}
    
                    <div class="row">
                        <a class="btn btn-danger ml-auto mr-3 text-white mt-3 mb-3" id="kembali">kembali
                        </a>
                        <button type="submit" id="cek_submit" class="text-white mr-3 btn btn-success mt-3 mb-3">
                            <i class="fas fa-check"></i> Submit
                        </button>
                    </div>
            </div>
        </div>
        </form>
    </div>
    </div>
    </div>
@endsection
@push('js')

<script type='text/javascript'>
    $(document).ready(function () {
        $('#id_alumni').on('change', function () {
            let id = $(this).val();
            $('.input_KJ').empty();
            $('.input_KJ').val('Mencari...').show('slow');
            $.ajax({
                type: 'GET',
                url: '/admin/fetch/alumni/' + id,
                success: function (response) {
                    $('.kelas').val(response.alumni.kelas);
                    $('.jurusan').val(response.alumni.jurusan);
                    $('.tahun_lulus').val(response.alumni.tahun_lulus);
                }
            });
        });

        $("#status").change(function () {
            // console.log($("#status option:selected").val());
            if ($("#status option:selected").val() == 'bekerja') {
                $('#namaperusahaan').prop('hidden', false);
                $('#alamatperusahaan').prop('hidden', false);
                $('#tahunkuliah').prop('hidden', false);

                $('#namakampus').prop('hidden', 'true');
                $('#alamatkampus').prop('hidden', 'true');
                $('#tahunmasuk').prop('hidden', 'true');

                $('#namabrand').prop('hidden', 'true');
                $('#namausaha').prop('hidden', 'true');

                // remove form
                $('#invalid_namaperusahaan').addClass('d-none').val('');
                $('#valid_namaperusahaan').removeClass('is-invalid').val('');
                $('#invalid_alamatperusahaan').addClass('d-none').val('');
                $('#valid_alamatperusahaan').removeClass('is-invalid').val('');
                $('#invalid_tahunkuliah').addClass('d-none').val('');
                $('#valid_tahunkuliah').removeClass('is-invalid').val('');
            }else if ($("#status option:selected").val() == 'Wirausaha') {

                $('#namaperusahaan').prop('hidden', false);
                $('#alamatperusahaan').prop('hidden', false);
                $('#tahunkuliah').prop('hidden', false);

                $('#namakampus').prop('hidden', 'true');
                $('#alamatkampus').prop('hidden', 'true');
                $('#tahunmasuk').prop('hidden', 'true');

                $('#namabrand').prop('hidden', 'true');
                $('#namausaha').prop('hidden', 'true');

                // remove form
                $('#invalid_namaperusahaan').addClass('d-none').val('');
                $('#valid_namaperusahaan').removeClass('is-invalid').val('');
                $('#invalid_alamatperusahaan').addClass('d-none').val('');
                $('#valid_alamatperusahaan').removeClass('is-invalid').val('');
                $('#invalid_tahunkuliah').addClass('d-none').val('');
                $('#valid_tahunkuliah').removeClass('is-invalid').val('');
             }
             else if ($("#status option:selected").val() == 'kuliah') {

                $('#namaperusahaan').prop('hidden', false);
                $('#alamatperusahaan').prop('hidden', false);
                $('#tahunkuliah').prop('hidden', false);

                $('#namakampus').prop('hidden', 'true');
                $('#alamatkampus').prop('hidden', 'true');
                $('#tahunmasuk').prop('hidden', 'true');

                $('#namabrand').prop('hidden', 'true');
                $('#namausaha').prop('hidden', 'true');

                // remove form
                $('#invalid_namaperusahaan').addClass('d-none').val('');
                $('#valid_namaperusahaan').removeClass('is-invalid').val('');
                $('#invalid_alamatperusahaan').addClass('d-none').val('');
                $('#valid_alamatperusahaan').removeClass('is-invalid').val('');
                $('#invalid_tahunkuliah').addClass('d-none').val('');
                $('#valid_tahunkuliah').removeClass('is-invalid').val('');
             }else{
                $('#namaperusahaan').prop('hidden', false);
                $('#alamatperusahaan').prop('hidden', false);
                $('#tahunkuliah').prop('hidden', false);


$('#namakampus').prop('hidden', 'true');
                $('#alamatkampus').prop('hidden', 'true');
                $('#tahunmasuk').prop('hidden', 'true');

                $('#namabrand').prop('hidden', 'true');
                $('#namausaha').prop('hidden', 'true');

                // remove form
                $('#invalid_namaperusahaan').addClass('d-none').val('');
                $('#valid_namaperusahaan').removeClass('is-invalid').val('');
                $('#invalid_alamatperusahaan').addClass('d-none').val('');
                $('#valid_alamatperusahaan').removeClass('is-invalid').val('');
                $('#invalid_tahunkuliah').addClass('d-none').val('');
                $('#valid_tahunkuliah').removeClass('is-invalid').val('');
             }

        });

        form = $("#status").val();
        console.log(form);
        $('#cek_submit').on('click', function (e) {
            e.preventDefault();

            var status = $('#status').val();
            console.log(validation_form(status));
            if(validation_form(status)){
                $('#form').submit();

            }
        });


        function validation_form(status = null) {
            var nama = $('#id_alumni').val();
            var namaperusahaan = $('#valid_namaperusahaan').val();
            var alamatperusahaan = $('#valid_alamatperusahaan').val();
            var tahunkuliah = $('#valid_tahunkuliah').val();

            var namakampus = $('#valid_namakampus').val();
            var alamatkampus = $('#valid_alamatkampus').val();
            var tahunmasuk = $('#valid_tahunmasuk').val();

            var namabrand = $('#valid_namabrand').val();
            var namausaha = $('#valid_namausaha').val();

            if (nama == '') {
                    $('#id_alumni').addClass('is-invalid');
                    $('#invalid_siswa').html('nama siswa alumni tidak boleh kosong').removeClass('d-none');
            } else {
                    $('#invalid_siswa').addClass('d-none');
                    $('#id_alumni').removeClass('is-invalid');
            }


            if (status == '') {
                    $('#status').addClass('is-invalid');
                    $('#invalid_status').html('status siswa alumni tidak boleh kosong').removeClass('d-none');
            } else {
                    $('#invalid_status').addClass('d-none');
                    $('#status').removeClass('is-invalid');
            }
            switch (status) {
                case 'bekerja':
                    if (namaperusahaan == '') {
                        $('#valid_namaperusahaan').addClass('is-invalid');
                        $('#invalid_namaperusahaan').html('nama perusahaan tidak boleh kosong').removeClass(
                            'd-none');
                    } else {
                        $('#invalid_namaperusahaan').addClass('d-none');
                        $('#valid_namaperusahaan').removeClass('is-invalid');
                    }
                    if (alamatperusahaan == '') {
                        $('#valid_alamatperusahaan').addClass('is-invalid');
                        $('#invalid_alamatperusahaan').html('alamat perusahaan tidak boleh kosong').removeClass(
                            'd-none');
                    } else {
                        $('#invalid_alamatperusahaan').addClass('d-none');
                        $('#valid_alamatperusahaan').removeClass('is-invalid');
                    }
                    if (tahunkuliah == '') {
                        $('#valid_tahunkuliah').addClass('is-invalid');
                        $('#invalid_tahunkuliah').html('tahun kuliah tidak boleh kosong').removeClass('d-none');
                    } else {
                        $('#invalid_tahunkuliah').addClass('d-none');
                        $('#valid_tahunkuliah').removeClass('is-invalid');
                    }


if (namaperusahaan && alamatperusahaan && tahunkuliah && nama && status ) {
                        return 'submit';
                    }
                    break;
                case 'kuliah':
                    if (namakampus == '') {
                        $('#valid_namakampus').addClass('is-invalid');
                        $('#invalid_namakampus').html('nama kampus tidak boleh kosong').removeClass('d-none');
                    } else {
                        $('#invalid_namakampus').addClass('d-none');
                        $('#valid_namakampus').removeClass('is-invalid');
                    }
                    if (alamatkampus == '') {
                        $('#valid_alamatkampus').addClass('is-invalid');
                        $('#invalid_alamatkampus').html('alamat kampus tidak boleh kosong').removeClass(
                            'd-none');
                    } else {
                        $('#invalid_alamatkampus').addClass('d-none');
                        $('#valid_alamatkampus').removeClass('is-invalid');
                    }
                    if (tahunmasuk == '') {
                        $('#valid_tahunmasuk').addClass('is-invalid');
                        $('#invalid_tahunmasuk').html('tahun masuk tidak boleh kosong').removeClass('d-none');
                    } else {
                        $('#invalid_tahunmasuk').addClass('d-none');
                        $('#valid_tahunmasuk').removeClass('is-invalid');
                    }
                    if (namakampus && alamatkampus && tahunmasuk && nama && status ) {
                        return 'submit';
                    }
                    break;
                case 'Wirausaha':
                    if (namausaha == '') {
                        $('#valid_namausaha').addClass('is-invalid');
                        $('#invalid_namausaha').html('nama usaha tidak boleh kosong').removeClass('d-none');
                    } else {
                        $('#invalid_namausaha').addClass('d-none');
                        $('#valid_namausaha').removeClass('is-invalid');
                    }
                    if (namausaha && nama && status ) {
                        return 'submit';
                    }
                    break;
                case 'Bekerja dan Kuliah':
                    if (namaperusahaan == '') {
                        $('#valid_namaperusahaan').addClass('is-invalid');
                        $('#invalid_namaperusahaan').html('nama perusahaan tidak boleh kosong').removeClass(
                            'd-none');
                    } else {
                        $('#invalid_namaperusahaan').addClass('d-none');
                        $('#valid_namaperusahaan').removeClass('is-invalid');
                    }
                    if (alamatperusahaan == '') {
                        $('#valid_alamatperusahaan').addClass('is-invalid');
                        $('#invalid_alamatperusahaan').html('alamat perusahaan tidak boleh kosong').removeClass(
                            'd-none');
                    } else {
                        $('#invalid_alamatperusahaan').addClass('d-none');
                        $('#valid_alamatperusahaan').removeClass('is-invalid');
                    }
                    if (tahunkuliah == '') {
                        $('#valid_tahunkuliah').addClass('is-invalid');
                        $('#invalid_tahunkuliah').html('tahun kuliah tidak boleh kosong').removeClass('d-none');
                    } else {
                        $('#invalid_tahunkuliah').addClass('d-none');
                        $('#valid_tahunkuliah').removeClass('is-invalid');
                    }
                    if (namakampus == '') {
                        $('#valid_namakampus').addClass('is-invalid');
                        $('#invalid_namakampus').html('nama kampus tidak boleh kosong').removeClass('d-none');
                    } else {
                        $('#invalid_namakampus').addClass('d-none');

Nur Rpl 1, [11.08.21 19:53]
$('#valid_namakampus').removeClass('is-invalid');
                    }
                    if (alamatkampus == '') {
                        $('#valid_alamatkampus').addClass('is-invalid');
                        $('#invalid_alamatkampus').html('alamat kampus tidak boleh kosong').removeClass(
                            'd-none');
                    } else {
                        $('#invalid_alamatkampus').addClass('d-none');
                        $('#valid_alamatkampus').removeClass('is-invalid');
                    }
                    if (tahunmasuk == '') {
                        $('#valid_tahunmasuk').addClass('is-invalid');
                        $('#invalid_tahunmasuk').html('tahun masuk tidak boleh kosong').removeClass('d-none');
                    } else {
                        $('#invalid_tahunmasuk').addClass('d-none');
                        $('#valid_tahunmasuk').removeClass('is-invalid');
                    }
                    if (namakampus && alamatkampus && tahunmasuk && namaperusahaan && alamatperusahaan && tahunkuliah && nama && status ) {
                        return 'submit';
                    }
                    break;
                case 'Wirausaha dan Kuliah':
                    if (namausaha == '') {
                        $('#valid_namausaha').addClass('is-invalid');
                        $('#invalid_namausaha').html('nama usaha tidak boleh kosong').removeClass('d-none');
                    } else {
                        $('#invalid_namausaha').addClass('d-none');
                        $('#valid_namausaha').removeClass('is-invalid');
                    }
                    if (namakampus == '') {
                        $('#valid_namakampus').addClass('is-invalid');
                        $('#invalid_namakampus').html('nama kampus tidak boleh kosong').removeClass('d-none');
                    } else {
                        $('#invalid_namakampus').addClass('d-none');
                        $('#valid_namakampus').removeClass('is-invalid');
                    }
                    if (alamatkampus == '') {
                        $('#valid_alamatkampus').addClass('is-invalid');
                        $('#invalid_alamatkampus').html('alamat kampus tidak boleh kosong').removeClass(
                            'd-none');
                    } else {
                        $('#invalid_alamatkampus').addClass('d-none');
                        $('#valid_alamatkampus').removeClass('is-invalid');
                    }
                    if (tahunmasuk == '') {
                        $('#valid_tahunmasuk').addClass('is-invalid');
                        $('#invalid_tahunmasuk').html('tahun masuk tidak boleh kosong').removeClass('d-none');
                    } else {
                        $('#invalid_tahunmasuk').addClass('d-none');
                        $('#valid_tahunmasuk').removeClass('is-invalid');
                    }

                    if (namakampus && alamatkampus && tahunmasuk && namausaha && nama && status ) {
                        return 'submit';
                    }
                    break;
                default:
                    break;
            }
        }
    });

</script>
@endpush
