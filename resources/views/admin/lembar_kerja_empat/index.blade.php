@extends('layout.master')
@push('css')

@endpush
@section('title', 'SIFOS | Table LK 4')
@section('judul','Lembar Kerja 4')
@section('breadcrump')
    {{-- breadcrump here --}}
     <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
<div class="breadcrumb-item">LK 3</div>
@endsection
@section('main')
    {{-- content here --}}
    @if (session('berhasil'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('berhasil') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
<div class="card pt-3">
    <div class="card-body">
     <table class="table table-striped table-hover text-center" id="table-1">
        <thead>
            <tr>
                <th>#</th>
                <th>Mapel</th>
                <th>Bidang Studi</th>
                <th>Kompetensi Keahlian</th>
                <th>Kelas</th>
                <th>Jam Pelajaran</th>
                <th>Total Jam</th>
                <th style="width: 130px;">Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    </div>

</div>

    {{-- harus make ini --}}
    <span  id="data" data-role="{{ Auth::user()->role }}"></span>
@endsection
@push('js')
<script src="{{ asset('assets/js/pages-admin/LembarKerjaEmpat.js') }}"></script>
@endpush
