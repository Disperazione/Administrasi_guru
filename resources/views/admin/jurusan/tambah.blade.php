@extends('layout.master')
@push('css')

@endpush
@section('title', 'App')
@section('judul','Tambah Jurusan')
@section('breadcrump')
<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.jurusan.index') }}">Jurusan</a></div>
<div class="breadcrumb-item">Tambah Jurusan</div>
@endsection
@section('main')
<h2 class="section-title">Tambah Jurusan</h2>
<p class="section-lead">Masukan Data Jurusan</p>
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.jurusan.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nama jurusan :</label>
                        <input type="text" name="nama_jurusan" class="form-control @error('nama_jurusan') is-invalid @enderror"
                            value="{{ old('nama_jurusan') }}">
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
                            value="{{ old('singkatan_jurusan') }}">
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
