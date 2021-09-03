@extends('layout.master')
@push('css')

@endpush
@section('title', 'SIFOS | Cloud')
@section('judul','Cloud Guru')
@section('breadcrump')
    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
    <div class="breadcrumb-item"></div>
@endsection
@section('main')
{{-- content here --}}
<div class="card pt-3">
    <div class="card-body">
     <table class="table table-striped table-hover " id="table-1">
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Mapel</th>
                <th>Kompetensi keahlian</th>
                <th>Status</th>
                <th>Persetujuan</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>hihi</td>
                <td>MTK</td>
                <td>mtk</td>
                <td><a href="#" class="badge badge-dark">Dark</a></td>
                <td>
                    <a href="{{ route('admin.komen.tambah') }}" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                    <a href="#" class="btn btn-icon btn-success"><i class="fas fa-check"></i></a>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
    </div>

</div>

<div class="card pt-3">
    <div class="card-body">
     <table class="table table-striped table-hover " id="table-1">
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Mapel</th>
                <th>Kompetensi keahlian</th>
                <th>Status</th>
                <th>Persetujuan</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>hihi</td>
                <td>MTK</td>
                <td>mtk</td>
                <td><a href="#" class="badge badge-dark">Dark</a></td>
                <td>
                    <a href="{{ route('admin.komen.tambah') }}" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                    <a href="#" class="btn btn-icon btn-success"><i class="fas fa-check"></i></a>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
    </div>

</div>



@endsection
@push('js')
<script>
    $('#Table-1').DataTable({
        serverside: true,
        processing: true,
        ajax : {
            url: '/admin/dashboard/admin_cloud/view',
            methods: 'get',
        },
        columns: [
        {name: 'DT_RowIndex',data:'DT_RowIndex'},
        {name: 'kategori',data:'kategori'},
        {name: 'mapel',data:'mapel'},
        {name:'kompetensi_keahlian', data:'kompetensi_keahlian'},
        {name: 'status',data:'status'},
        {name: 'persetujuan',data:'persetujuan'},
        {name: 'action',data:'action'},
        ]
    });
</script>
<script src="{{ asset('assets/js/pages-admin/') }}"></script>
@endpush
