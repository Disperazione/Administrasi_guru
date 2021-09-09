@extends('layout.master')
@push('css')
<style>
    .modal-backdrop{
        z-index: 0;
    }
    .modal-backdrop.show{
        opacity: 0;
    }
</style>
@endpush
@section('title','SIFOS | Table LK 3')
@section('judul','Lembar Kerja 3')
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
                <th>status</th>
                {{-- <th>Upload Cloud</th> --}}
                <th style="width: 200px;">Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    </div>

</div>

{{-- modal --}}
<div class="modal fade" id="komen" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Comments</h5>
            </div>
            <div class="modal-body">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card">
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
            </div>
            <div class="modal-footer">
                <button id="modalBtnClick" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
{{-- closemodal --}}


    {{-- harus make ini --}}
    <span  id="data" data-role="{{ Auth::user()->role }}"></span>
@endsection
@push('js')
<script src="{{ asset('assets/js/pages-admin/LembarKerjaTiga.js') }}"></script>
@endpush
