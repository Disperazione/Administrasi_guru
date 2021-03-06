@extends('layout.master')
@push('css')

@endpush
@section('title', 'SIFOS | Dashboard')
@section('judul', __('Dashboard'))
@section('breadcrump')
{{-- breadcrump here --}}
@endsection
@section('main')
{{-- content here --}}
@if (Auth::user()->role == 'admin')
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-stats">
                <div class="card-stats-items mt-4">
                    <div class="card-stats-item col-6">
                        <a href="/admin/guru" class="text-decoration-none">
                            <div class="card-stats-item-count">{{ $user->where('role','admin')->count() }}</div>
                            <div class="card-stats-item-label">Admin</div>
                        </a>
                    </div>
                    <div class="card-stats-item col-6">
                        <a href="/admin/guru" class="text-decoration-none">
                            <div class="card-stats-item-count">{{ $user->where('role','guru')->count() }}</div>
                            <div class="card-stats-item-label">Guru</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
                <a href="/admin/guru" class="text-decoration-none">
                    <div class="card-header">
                        <h4>Total Users</h4>
                    </div>
                    <div class="card-body">
                        {{ $user->count() }}
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <a href="/admin/jurusan" class="text-decoration-none">
            <div class="card card-hero">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h4>{{ $jurusan }}</h4>
                    <div class="card-description">Jurusan</div>
                </div>
            </div>
        </a>
    </div>
     <div class="col-md-4">
        <a href="/admin/cloud_admin" class="text-decoration-none">
            <div class="card card-hero">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h4>{{ $cloud }}</h4>
                    <div class="card-description">Cloud</div>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h4>Last Uploded File</h3>
                </div>
            <table class="table table-bordered" id="Table-1">
            <thead>
                <th>#</th>
                <th>judul</th>
                <th>mapel</th>
                <th>bidang studi</th>
                <th>Tanggal dibuat</th>
                <th>Action</th>
            </thead>
            <tbody>

            </tbody>
        </table>
            </div>
        </div>
    </div>
</div>
@endif



@if (Auth::user()->role == 'guru')
<div class="row">
    <div class="col-md-4">
        <div class="card card-statistic-2">
            <div class="card-stats">
                <div class="card-stats-items mt-4">
                    <div class="card-stats-item col-3">
                        <a href="/admin/Lembar-kerja-1" class="text-decoration-none">
                            <div class="card-stats-item-count">{{ $lk_1 }}</div>    
                            <div class="card-stats-item-label">LK 1</div>
                        </a>
                    </div>
                    <div class="card-stats-item col-3">
                        <a href="/admin/Lembar-kerja-2" class="text-decoration-none">
                            <div class="card-stats-item-count">{{ $lk_2 }}</div>
                            <div class="card-stats-item-label">LK 2</div>
                        </a>
                    </div>
                    <div class="card-stats-item col-3">
                        <a href="/admin/Lembar-kerja-3" class="text-decoration-none">
                            <div class="card-stats-item-count">{{ $lk_3 }}</div>
                            <div class="card-stats-item-label">LK 3</div>
                        </a>
                    </div>
                    <div class="card-stats-item col-3">
                        <a href="/admin/Lembar-kerja-4" class="text-decoration-none">
                            <div class="card-stats-item-count">{{ $lk_4 }}</div>
                            <div class="card-stats-item-label">LK 4</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-icon shadow-primary bg-primary">
                <i class="far fa-address-book"></i>
            </div>
            <div class="card-wrap">
                <a href="/admin/Lembar-kerja-1" class="text-decoration-none">
                    <div class="card-header">
                        <h4>Total Lembar Kerja</h4>
                    </div>
                    <div class="card-body">
                        {{ $total }}
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <a href="/admin/RPP" class="text-decoration-none">
            <div class="card card-hero">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-book-reader"></i>
                    </div>
                    <h4>{{ $rpp }}</h4>
                    <div class="card-description">RPP</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="/admin/kompetensi_dasar" class="text-decoration-none">
            <div class="card card-hero">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="far fa-id-badge"></i>
                    </div>
                    <h4>{{ $kd }}</h4>
                    <div class="card-description">KD</div>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h4>Last Uploded File</h3>
                </div>
            <table class="table table-bordered" id="Table-1">
            <thead>
                <th>#</th>
                <th>judul</th>
                <th>mapel</th>
                <th>bidang studi</th>
                <th>Tanggal dibuat</th>
                <th>Action</th>
            </thead>
            <tbody>

            </tbody>
        </table>
            </div>
        </div>
    </div>
</div>
@endif

{{-- harus make ini --}}
<span data-role="{{ Auth::user()->role }}"></span>
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
        {name: 'judul',data:'judul'},
        {name: 'mapel',data:'mapel'},
        {name:'kompetensi_keahlian', data:'kompetensi_keahlian'},
        {name: 'tanggal_dibuat',data:'tanggal_dibuat'},
        {name: 'action',data:'action'},
        ]
    });
</script>
@endpush
