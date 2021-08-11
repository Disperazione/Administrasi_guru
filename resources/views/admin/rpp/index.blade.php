@extends('layout.master')
@push('css')

@endpush
@section('title', 'SIFOS | RPP')
@section('judul','RPP')
@section('breadcrump')
    {{-- breadcrump here --}}
     <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
<div class="breadcrumb-item">RPP</div>
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
     <table class="table table-striped table-hover " id="table-1">
        <thead>
            <tr>
                <th>#</th>
                 @if (Auth::user()->role == 'admin')
                    <th>Nama guru</th>
                @endif
                <th>Bidang Studi</th>
                <th>mapel</th>
                 <th>kd pengetahuan</th>
                <th>kd krampilan</th>
                <th>action</th>
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
<script src="{{ asset('assets/js/pages-admin/rpp.js') }}"></script>
@endpush
