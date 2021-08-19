@extends('layout.master')

@push('css')

@endpush
@section('title', 'SIFOS | Data guru')
@section('judul','Detail Guru')
@section('breadcrump')
{{-- breadcrump here --}}
<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.guru.index') }}">Guru</a></div>
<div class="breadcrumb-item">Detail Guru</div>
@endsection
@section('main')
{{-- content here --}}
<div class="col-12 col-md-12 ">
    <div class="card card-primary">
        <div class="card-header">
            <h4>Informasi Guru</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-6">
                    <label>NIK</label>
                    <input type="text" class="form-control" placeholder="32323" value="{{$guru->nik}}" disabled>
                </div>
                <div class="form-group col-6">
                    <label>Nama Guru</label>
                    <input type="text" class="form-control" placeholder="329304897" value="{{$guru->name}}" disabled>
                </div>
                <div class="form-group col-6">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" placeholder="329304897" value="{{$guru->jabatan}}" disabled>
                </div>

                <div class="form-group col-6">
                    <label>Jurusan</label>
                    <input type="text" class="form-control" placeholder="329304897"
                        value="{{$guru->jurusan->singkatan_jurusan}}" disabled>
                </div>
                <div class="form-group col-6">
                    <label>No Telp</label>
                    <input type="text" class="form-control" placeholder="329304897" value="{{$guru->no_telp}}" disabled>
                </div>

                <div class="form-group col-6">
                    <label>Mata pelajaran</label>
                    @foreach ($guru->mapel as $item)
                    <input type="text" class="form-control mt-2" placeholder="329304897" value="{{$item->nama_mapel}}"
                        disabled>
                    @endforeach
                </div>

                <div class="form-group col-6" style="margin-top: 30px">
                    <a href="{{route('admin.guru.index')}}" type="button" class="btn btn-danger "> Kembali</a>
                </div>

            </div>
            {{-- <div class="btn btn-danger"  >
                <a href="" type="button" class="btn btn-danger "><i class="fas fa-backspace"></i>   Kembali</a>
            </div> --}}
        </div>
    </div>
</div>

@endsection
@push('js')

@endpush
