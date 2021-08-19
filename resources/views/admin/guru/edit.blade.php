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
                            value="{{ old('nik', $guru->nik) }}">
                        @error('nik')
                        <div class="invalid-feedback">
                            {{ $message  }}
                        </div>
                        @enderror
                    </div>


                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nama :</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $guru->name) }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message  }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Jabatan :</label>
                        <select name="jabatan" class="form-control @error('jabatan') is-invalid @enderror">
                            <option value="">-- Pilih Jabatan --</option>
                            <option value="guru" {{ (old('jabatan', $guru->jabatan) === 'guru') ? 'selected' : '' }}>Guru
                            </option>
                            <option value="admin" {{ (old('jabatan', $guru->jabatan) === 'admin') ? 'selected' : '' }}>
                                Admin</option>
                        </select>
                        @error('jabatan')
                        <div class="invalid-feedback">
                            {{ $message  }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Jurusan :</label>
                        <select type="text" name="id_jurusan" id=""
                            class="form-control @error('id_jurusan') is-invalid @endif">
                            <option value="">-- Pilih Jurusan --</option>
                            @foreach ($jurusan as $item)
                            <option value="{{ $item->id }}"
                                {{ (old('id_jurusan', $guru->jurusan->id) == $item->id) ? 'selected' : '' }}>
                                {{ $item->singkatan_jurusan }}</option>
                            @endforeach
                        </select>

                        @error('id_jurusan')
                        <div class="invalid-feedback">
                            {{ $message  }}
                        </div>
                        @enderror
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
                            value="{{ old('fax', $guru->fax) }}">
                        @error('fax')
                        <div class="invalid-feedback">
                            {{ $message  }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">alamat :</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id=""
                            cols="30" rows="10">{{ old('alamat', $guru->alamat) }}</textarea>
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message  }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">No_telp :</label>
                        <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror"
                            value="{{ old('no_telp', $guru->no_telp) }}">
                        @error('no_telp')
                        <div class="invalid-feedback">
                            {{ $message  }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Email :</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $guru->user->email) }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message  }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">new password :</label>
                        <input type="text" name="password" class="form-control @error('password') is-invalid @enderror"
                            value="{{ old('password') }}">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message  }}
                        </div>
                        @enderror
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

            // apus input baru
            $('.removeInput').click(function (e) {
                e.preventDefault(); // prevent button
                $(this).parent('div').remove(); // hapus parent
                --x;
            })
        })

        // apus input yang lama
        $('.removeInput').click(function (e) {
            e.preventDefault(); // prevent button
            $(this).parent('div').remove(); // hapus parent
            --x;
        })

        $('#buttonSubmit').click(function (e) {
            e.preventDefault();
            // jika return fungtion nya mkaa akan menampilan validasi
            if (!validate_mapel()) {
                $('#form').submit();
            }
        })

        function validate_mapel() {
            count_erorr = [];
            mapel = document.querySelectorAll('.mapel');
            mapel.forEach(element => {
                if (!element.value) {
                    $(element).addClass('is-invalid');
                    $(element).closest('div').find('.mapel_err').removeClass('d-none');
                    console.log('test');
                    count_erorr += 1
                } else {
                    $(element).removeClass('is-invalid');
                    $(element).closest('div').find('.mapel_err').addClass('d-none');
                }
            });
            // console.log(count_erorr.length);
            return count_erorr.length;
        }
    })

</script>
@endpush
