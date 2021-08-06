@extends('layout.master')
@push('css')

@endpush
@section('title', 'App')
@section('breadcrump')
    {{-- breadcrump here --}}
@endsection
@section('content')
    {{-- content here --}}

    {{-- harus make ini --}}
    <span data-role="{{ Auth::user()->role }}"></span>
@endsection
@push('js')

@endpush
