@extends('layout.master')
@push('css')

@endpush
@section('title', 'App')
@section('judul','Tambah Guru')
@section('breadcrump')
<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.guru.index') }}">Guru</a></div>
<div class="breadcrumb-item">Tambah Guru</div>
@endsection
@section('main')
<h2 class="section-title">Tambah Guru</h2>
<p class="section-lead">Masukan Data guru</p>
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.guru.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">NIK :</label>
                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                            value="{{ old('nik') }}">
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
                            value="{{ old('name') }}">
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
                            <option value="guru" {{ (old('jabatan') == 'guru') ? 'selected' : '' }}>Guru</option>
                            <option value="admin" {{ (old('jabatan') == 'admin') ? 'selected' : '' }}>Admin</option>
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
                        <select type="text" name="id_jurusan" id="" class="form-control @error('id_jurusan') is-invalid @endif">
                            <option value="">-- Pilih Jurusan --</option>
                            @foreach ($jurusan as $item)
                            <option value="{{ $item->id }}" {{ (old('id_jurusan') == $item->id) ? 'selected' : '' }}>
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
                    <div class="form-group">
                        <label for="">fax :</label>
                        <input type="text" name="fax" class="form-control @error('fax') is-invalid @enderror"
                            value="{{ old('fax') }}">
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
                            cols="30" rows="10">
                            {{ old('alamat') }}
                        </textarea>
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
                            value="{{ old('no_telp') }}">
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
                            value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message  }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">password :</label>
                        <input type="text" name="password" class="form-control @error('password') is-invalid @enderror"
                            value="{{ old('password') }}">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message  }}
                        </div>
                        @enderror
                    </div>
                </div>


                <button class="btn btn-success ml-auto mr-2 mt-5 mb-5" type="submit">Submit</button>
                <a href="{{ route('admin.guru.index') }}" class="btn btn-danger mr-4 mt-5 mb-5">Cansel</a>
            </div>


        </form>
    </div>

</div>
@endsection
@push('js')

@endpush
