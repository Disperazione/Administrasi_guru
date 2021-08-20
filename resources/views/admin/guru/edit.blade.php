@extends('layout.master')
@push('css')

@endpush
@section('title', 'App')
@section('judul','Edit Guru')
@section('breadcrump')
<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.guru.index') }}">Guru</a></div>
<div class="breadcrumb-item">Edit Guru</div>
@endsection
@section('main')
<h2 class="section-title">Edit Guru</h2>
<p class="section-lead">Masukan Data guru</p>
<div class="card">
    <div class="card-body">
        <form id="form" action="{{ route('admin.guru.update',$guru) }}" method="POST">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">NIK :</label>
                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                            value="{{ old('nik', $guru->nik) }}" id="nik" data-id="{{ $guru->user->id }}">
                        {{-- @error('nik') --}}
                        <div class="invalid-feedback">
                            Nama tidak boleh kosong
                        </div>
                        {{-- @enderror --}}
                    </div>


                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nama :</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $guru->name) }}" id="name">
                        {{-- @error('name') --}}
                        <div class="invalid-feedback">
                            Nama tidak boleh kosong
                        </div>
                        {{-- @enderror --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Jabatan :</label>
                        <select name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan">
                            <option value="">-- Pilih Jabatan --</option>
                            <option value="guru" {{ (old('jabatan', $guru->jabatan) === 'guru') ? 'selected' : '' }}>Guru
                            </option>
                            <option value="admin" {{ (old('jabatan', $guru->jabatan) === 'admin') ? 'selected' : '' }}>
                                Admin</option>
                        </select>
                        {{-- @error('jabatan') --}}
                        <div class="invalid-feedback">
                            Jabatan tidak boleh kosong
                        </div>
                        {{-- @enderror --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Jurusan :</label>
                        <select type="text" name="id_jurusan" id="jurusan"
                            class="form-control @error('id_jurusan') is-invalid @endif">
                            <option value="">-- Pilih Jurusan --</option>
                            @foreach ($jurusan as $item)
                            <option value="{{ $item->id }}"
                                {{ (old('id_jurusan', $guru->jurusan->id) == $item->id) ? 'selected' : '' }}>
                                {{ $item->singkatan_jurusan }}</option>
                            @endforeach
                        </select>
{{--
                        @error('id_jurusan') --}}
                        <div class="invalid-feedback">
                             Jurusan tidak boleh kosong
                        </div>
                        {{-- @enderror --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group addMapelInput">
                        <label for="">Mata pelajran :</label>
                        <div class="row ml-1">
                            <input type="text" name="mapel[]" class="form-control mapel col-md-10 " id="mapel"
                                value="{{(empty($guru->mapel[0]->nama_mapel)) ? '' : $guru->mapel[0]->nama_mapel }}">
                            <button class="btn btn-success d-inline ml-3" id="addInput">+</button>
                            {{-- @error('id_mapel') --}}
                            <div class="invalid-feedback d-none mapel_err" id="mapel_err">
                                Mapel tidak boleh kosong
                            </div>
                            {{-- @enderror --}}
                        </div>
                        @for ($i = 1 ; $i < count($guru->mapel); $i++)
                            <div class="row ml-1">
                                <input type="text" name="mapel[]" class="form-control mapel mt-2 col-md-10 " id="mapel"
                                    value="{{ $guru->mapel[$i]->nama_mapel }}">
                                <button class="btn btn-danger d-inline ml-3 removeInput mt-2 mb-2">x</button>
                                {{-- @error('id_mapel') --}}
                                <div class="invalid-feedback d-none mapel_err" id="mapel_err">
                                    Mapel tidak boleh kosong
                                </div>
                                {{-- @enderror --}}
                            </div>
                            @endfor


                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">fax :</label>
                        <input type="text" name="fax" class="form-control @error('fax') is-invalid @enderror"
                            value="{{ old('fax', $guru->fax) }}" id="fax">
                        {{-- @error('fax') --}}
                        <div class="invalid-feedback">
                                Fax tidak boleh koosng
                        </div>
                        {{-- @enderror --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">alamat :</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                            cols="30" rows="10" >{{ old('alamat', $guru->alamat) }}</textarea>
                        {{-- @error('alamat') --}}
                        <div class="invalid-feedback">
                              Alamat tidak boleh kosong
                        </div>
                        {{-- @enderror --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">No_telp :</label>
                        <input type="text" name="no_telp" id="no_telp" class="form-control @error('no_telp') is-invalid @enderror"
                            value="{{ old('no_telp', $guru->no_telp) }}">
                        {{-- @error('no_telp') --}}
                        <div class="invalid-feedback">
                            No telepon tidak boleh koosng
                        </div>
                       {{--  @enderror --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Email :</label>
                        <input type="text" name="email" data-id="{{ $guru->user->id }}" id="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $guru->user->email) }}">
                        {{-- @error('email') --}}
                        <div class="invalid-feedback">
                          Email tidak boleh kosong
                        </div>
                        {{-- @enderror --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">new password :</label>
                        <input type="text" name="password" class="form-control @error('password') is-invalid @enderror"
                            value="{{ old('password') }}" id="password">
                        {{-- @error('password') --}}
                        <div class="invalid-feedback">
                           Password tidak boleh kosong
                        </div>
                        {{-- @enderror --}}
                    </div>
                </div>


                <button class="btn btn-success ml-auto mr-2 mt-5 mb-5" id="buttonSubmit" type="submit">Submit</button>
                <a href="{{ route('admin.guru.index') }}" class="btn btn-danger mr-4 mt-5 mb-5">Cansel</a>
            </div>


        </form>
    </div>

</div>
@endsection
@push('js')
<script>
    $(document).ready(function () {
        x = 1;
        $('#addInput').click(function (e) {
            e.preventDefault();
            console.log('clicked');
            x++
            $('.addMapelInput').append(' <div class="row ml-1">' +
                '<input type="text" name="mapel[]" class="form-control mapel mt-2 col-md-10 " id="mapel">' +
                '<button class="btn btn-danger d-inline ml-3 removeInput mt-2 mb-2" >x</button>' +
                '<div class="invalid-feedback mapel_err" id="mapel_err">' +
                'mapel tidak boleh kosong' +
                '</div>' +
                '</div>');
            $('.removeInput').click(function (e) {
                e.preventDefault(); // prevent button
                $(this).parent('div').remove(); // hapus parent
                --x;
            })
        })


        $('#buttonSubmit').click(function (e) {
            e.preventDefault();
            // jika return fungtion nya mkaa akan menampilan validasi
            // jika funtion validation nya tidak kosong maka akan submit form nya
            if (!validate_mapel() && !validate_nik() && !validate_name() && !validate_jabatan() && !
                validate_jurusan() && !validate_fax() && !validate_alamat() && !validate_no_telp() && !validate_password() && !validate_email()) {
                $('#form').submit();
            } else { // jika kosoong ambil erornya
                validate_mapel();
                validate_nik();
                validate_name();
                validate_jabatan();
                validate_jurusan();
                validate_fax();
                validate_alamat();
                validate_no_telp();
                validate_password();
                validate_email();
            }
        })

        function validate_name() {
            count_erorr = [];
            name = $('#name').val();
            //console.log(name);
            if (!name) {
                $('#name').addClass('is-invalid');
                $('#name').closest('div').find('.invalid-feedback').removeClass('d-none');
                //console.log('test');
                count_erorr += 1
            } else {
                $('#name').removeClass('is-invalid');
                $('#name').closest('div').find('.invalid-feedback').addClass('d-none');
            }
            // console.log(count_erorr.length);
            return count_erorr.length;
        }

        function validate_jabatan() {
            count_erorr = [];
            jabatan = $('#jabatan').val();
            if (!jabatan) {
                $('#jabatan').addClass('is-invalid');
                $('#jabatan').closest('div').find('.invalid-feedback').removeClass('d-none');
                //console.log('test');
                count_erorr += 1
            } else {
                $('#jabatan').removeClass('is-invalid');
                $('#jabatan').closest('div').find('.invalid-feedback').addClass('d-none');
            }
            // console.log(count_erorr.length);
            return count_erorr.length;
        }

        function validate_jurusan() {
            count_erorr = [];
            jurusan = $('#jurusan').val();
            if (!jurusan) {
                $('#jurusan').addClass('is-invalid');
                $('#jurusan').closest('div').find('.invalid-feedback').removeClass('d-none');
                //console.log('test');
                count_erorr += 1
            } else {
                $('#jurusan').removeClass('is-invalid');
                $('#jurusan').closest('div').find('.invalid-feedback').addClass('d-none');
            }
            // console.log(count_erorr.length);
            return count_erorr.length;
        }

        function validate_fax() {
            count_erorr = [];
            fax = $('#fax').val();
            if (!fax) {
                $('#fax').addClass('is-invalid');
                $('#fax').closest('div').find('.invalid-feedback').removeClass('d-none');
                //console.log('test');
                count_erorr += 1
            } else {
                $('#fax').removeClass('is-invalid');
                $('#fax').closest('div').find('.invalid-feedback').addClass('d-none');
            }
            // console.log(count_erorr.length);
            return count_erorr.length;
        }

         function validate_alamat() {
            count_erorr = [];
            alamat = $('#alamat').val();
            if (alamat < 1) {
                $('#alamat').addClass('is-invalid');
                $('#alamat').closest('div').find('.invalid-feedback').removeClass('d-none');
                //console.log('test');
                count_erorr += 1
            } else {
                $('#alamat').removeClass('is-invalid');
                $('#alamat').closest('div').find('.invalid-feedback').addClass('d-none');
            }
            // console.log(count_erorr.length);
            return count_erorr.length;
        }

          function validate_no_telp() {
            count_erorr = [];
            no_telp = $('#no_telp').val();
            if (no_telp < 1) {
                $('#no_telp').addClass('is-invalid');
                $('#no_telp').closest('div').find('.invalid-feedback').removeClass('d-none');
                //console.log('test');
                count_erorr += 1
            } else {
                $('#no_telp').removeClass('is-invalid');
                $('#no_telp').closest('div').find('.invalid-feedback').addClass('d-none');
            }
            // console.log(count_erorr.length);
            return count_erorr.length;
        }

          function validate_password() {
            count_erorr = [];
            password = $('#password').val();
            if (password < 1) {
                $('#password').addClass('is-invalid');
                $('#password').closest('div').find('.invalid-feedback').removeClass('d-none');
                //console.log('test');
                count_erorr += 1
            } else {
                $('#password').removeClass('is-invalid');
                $('#password').closest('div').find('.invalid-feedback').addClass('d-none');
            }
            // console.log(count_erorr.length);
            return count_erorr.length;
        }

        function validate_mapel() {
            count_erorr = [];
            mapel = document.querySelectorAll('.mapel');
            mapel.forEach(element => {
                if (!element.value) {
                    $(element).addClass('is-invalid');
                    $(element).closest('div').find('.mapel_err').removeClass('d-none');
                    //console.log('test');
                    count_erorr += 1
                } else {
                    $(element).removeClass('is-invalid');
                    $(element).closest('div').find('.mapel_err').addClass('d-none');
                }
            });
            // console.log(count_erorr.length);
            return count_erorr.length;
        }

        function validate_nik() {
            arr_validated = []; // unutk mengimpan nomor jadi erorrnya
            nik = $('#nik').val();
               id = $('#nik').data('id');
            //    console.log(!id);
            if (!id) {
                id = "kosong";
            }else{
                id =  $('#nik').data('id');
                console.log(id);
            }
            if (!nik) {
                nik = $('#nik');
                nik.addClass('is-invalid');
                nik.closest('div').find('.invalid-feedback').removeClass('d-none');
                nik.closest('div').find('.invalid-feedback').html('Nik tidak boleh kosong');
            } else {
                nik = $('#nik').val();
                $.ajax({
                    url: '/admin/guru/validdate/nik/'+ id + '/s/' + nik + '/edit',
                    type: 'get',
                    success: function (response) {
                        // console.log(!response.validate_nik);
                        // $('#nik').closest('div').find('.invalid-feedback').val('');
                        if (response.validate_nik) { // jika jika ada erorrnya maka tampilkan eror
                            $('#nik').addClass('is-invalid');
                            $('#nik').closest('div').find('.invalid-feedback').removeClass(
                                'd-none');
                            $('#nik').closest('div').find('.invalid-feedback').html(response
                                .validate_nik)
                            arr_validated += 1 // nambah iden array jadi 1
                        } else {
                            $('#nik').removeClass('is-invalid');
                            $('#nik').closest('div').find('.mapel_err').addClass('d-none');
                        }
                    },
                    fail: function (rsponse) {
                        console.log('fail');
                    }
                });
            }
            return arr_validated.length // return panjang dari array nya
        }

        function validate_email() {
            arr_validated = []; // unutk mengimpan nomor jadi erorrnya
            email = $('#email').val();
            id = $('#email').data('id');
            if (!id) {
                id = "kosong";
            }else{
                id =  $('#email').data('id');
            }
            if (!email) {
                email = $('#email');
                email.addClass('is-invalid');
                email.closest('div').find('.invalid-feedback').removeClass('d-none');
                email.closest('div').find('.invalid-feedback').html('Email tidak boleh kosong');
            } else {
                email = $('#email').val();
                $.ajax({
                    url: '/admin/guru/validdate/email/'+ id + '/s/' + email +'/edit',
                    type: 'get',
                    success: function (response) {
                        // console.log(response.validate_email);
                        // $('#email').closest('div').find('.invalid-feedback').val('');
                        if (response.validate_email) { // jika jika ada erorrnya maka tampilkan eror
                            $('#email').addClass('is-invalid');
                            $('#email').closest('div').find('.invalid-feedback').removeClass(
                                'd-none');
                            $('#email').closest('div').find('.invalid-feedback').html(response
                                .validate_email)
                            arr_validated += 1 // nambah iden array jadi 1
                        } else {
                            $('#email').removeClass('is-invalid');
                            $('#email').closest('div').find('.mapel_err').addClass('d-none');
                        }
                    },
                    fail: function (rsponse) {
                        console.log('fail');
                    }
                });
            }
            return arr_validated.length // return panjang dari array nya
        }
    })

</script>
@endpush
