@extends('layout.master')
@push('css')

@endpush
@section('title', 'SIFOS | Komentar')
@section('judul','Komentar')
@section('breadcrump')
    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
    <div class="breadcrumb-item"></div>
@endsection
@section('main')
{{-- content here --}}



@endsection
@push('js')

<script src="{{ asset('assets/js/pages-admin/') }}"></script>
@endpush
