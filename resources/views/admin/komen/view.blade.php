@extends('layout.master')
@push('css')

@endpush
@section('title', 'SIFOS | Komentar')
@section('judul','Komentar')
@section('breadcrump')
    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
    <div class="breadcrumb-item"> Seluruh komentar</div>
@endsection
@section('main')
{{-- <h1 class="text-center mt-5">404 Not Found</h1> --}}
<div class="col-12 col-sm-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Comments</h4>
      </div>
      <div class="card-body">
        <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
          <li class="media">
            <div class="media-body">
              <div class="media-right"><div class="text-danger">Ditolak</div></div>
              <div class="media-title mb-1">Admin (Rizal)</div>
              <div class="text-time">12 menit lalu</div>
              <div class="media-description text-muted">ini kurang bagus bagus</div>
              <div class="media-links">
                <div class="bullet"></div>
                <a href="#" class="text-danger">Hapus Komentar</a>
              </div>
            </div>
          </li>
          <li class="media">
            <div class="media-body">
              <div class="media-right"><div class="text-danger">Ditolak</div></div>
              <div class="media-title mb-1">Admin (Bambang)</div>
              <div class="text-time">1 jam  lalu</div>
              <div class="media-description text-muted">Sama ini jua jelek</div>
              <div class="media-links">
                <div class="bullet"></div>
                <a href="#" class="text-danger">Hapus Komentar</a>
              </div>
            </div>
          </li>
          
        </ul>
      </div>
    </div>
  </div>
@endsection
@push('js')

@endpush
