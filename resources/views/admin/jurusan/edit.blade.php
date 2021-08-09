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
        <form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nama jurusan :</label>
                        <input type="text" name="nama_jurusan" class="form-control @error('nama_jurusan') is-invalid @enderror"
                            value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}">
                        @error('nama_jurusan')
                        <div class="invalid-feedback">
                            {{ $message  }}
                        </div>
                        @enderror
                    </div>
                </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Singkatan jurusan :</label>
                        <input type="text" name="singkatan_jurusan" class="form-control @error('singkatan_jurusan') is-invalid @enderror"
                            value="{{ old('singkatan_jurusan',$jurusan->singkatan_jurusan) }}">
                        @error('singkatan_jurusan')
                        <div class="invalid-feedback">
                            {{ $message  }}
                        </div>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-success ml-auto mr-2" type="submit">Submit</button>
                <a href="{{ route('admin.jurusan.index') }}" class="btn btn-danger mr-4">Cansel</a>
            </div>


        </form>
    </div>

</div>
@endsection
@push('js')

@endpush
