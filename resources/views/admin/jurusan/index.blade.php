@extends('layout.master')
@push('css')

@endpush
@section('title', 'App')
@section('judul','Table Jurusan')
@section('breadcrump')
<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
<div class="breadcrumb-item">Table Guru</div>
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
        <table class="table table-striped table-hover " id="table1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>jurusan</th>
                    <th>singkatan jurusan</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('assets/js/pages-admin/jurusan.js') }}"></script>
@endpush
