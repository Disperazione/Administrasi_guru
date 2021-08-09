@extends('layout.master')
@push('css')

@endpush
@section('title', 'App')
@section('judul','Table Guru')
@section('breadcrump')
    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
    <div class="breadcrumb-item">Table Guru</div>
@endsection
@section('main')
 @if (session('berhasil'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('berhasil') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
{{-- content here --}}
<div class="card pt-3">
    <div class="card-body">
     <table class="table table-striped table-hover " id="table-1">
        <thead>
            <tr>
                <th>#</th>
                <th>nik</th>
                <th>Nama</th>
                <th>jabatan</th>
                <th>jurusan</th>
                <th>No telp </th>
                  <th>action</th>
            </tr>
        </thead>
        <tbody>
               <tr>
                <td>#</td>
                <td>nik</td>
                <td>Nama</td>
                <td>jabatan</td>
                <td>kelas</td>
                <td>jurusan</td>
            </tr>
        </tbody>
    </table>
    </div>

</div>


@endsection
@push('js')
<script src="{{ asset('assets/js/pages-admin/guru.js') }}"></script>
@endpush
