@extends('layout.master')
@push('css')

@endpush
@section('title', 'SIFOS | Dashboard')
@section('judul','Dashboard')
@section('breadcrump')
    {{-- breadcrump here --}}
@endsection
@section('main')
    {{-- content here --}}
    <h1>ini dashboard ye</h1>
    {{-- harus make ini --}}
    <span data-role="{{ Auth::user()->role }}"></span>
@endsection
@push('js')

@endpush
