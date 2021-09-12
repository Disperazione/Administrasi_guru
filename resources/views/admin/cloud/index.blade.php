@extends('layout.master')
@push('css')

@endpush
@section('title', 'SIFOS | Cloud')
@section('judul','Semua Cloud ')
@section('breadcrump')
    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
    <div class="breadcrumb-item">Cloud</div>
@endsection
@section('main')
{{-- content here --}}
{{-- RPL --}}
<div class="card">
    <div class="card-header">
        <h4>Cloud RPL</h4>
    </div>

    <div class="card-body">
        <div class="row">
            @foreach ($guru->where('pokja','RPL') as $item)
                <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card card-statistic-2 card-primary" style="box-shadow: 0 4px 15px 0 rgba(0,0,0,0.2);">
                    <div class="card-stats">
                        <div class="card-stats-items mt-4">
                            <div class="card-stats-item col-12 ml-2 text-left">
                                <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                                    <div class="card-stats-item-label">Guru</div>
                                    <div class="card-stats-item-count w-100">{{ $item->name }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary" >
                        <i class="fas fa-cloud"></i>
                    </div>
                    <div class="card-wrap">
                        <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                            <div class="card-header">
                                <h4>Total Cloud</h4>
                            </div>
                            <div class="card-body">
                                {{ $item->admin_cloud()->where('status','!=','kosong')->where('status','!=','tolak')->count(); }}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach






        </div>
    </div>
</div>

{{-- MM --}}
<div class="card">
    <div class="card-header">
        <h4>Cloud MM</h4>
    </div>

    <div class="card-body">
        <div class="row">
            @foreach ($guru->where('pokja','MM') as $item)
                <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card card-statistic-2 card-primary" style="box-shadow: 0 4px 15px 0 rgba(0,0,0,0.2);">
                    <div class="card-stats">
                        <div class="card-stats-items mt-4">
                            <div class="card-stats-item col-12 ml-2 text-left">
                                <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                                    <div class="card-stats-item-label">Guru</div>
                                    <div class="card-stats-item-count w-100">{{ $item->name }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary" >
                        <i class="fas fa-cloud"></i>
                    </div>
                    <div class="card-wrap">
                        <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                            <div class="card-header">
                                <h4>Total Cloud</h4>
                            </div>
                            <div class="card-body">
                                {{ $item->admin_cloud()->where('status','!=','kosong')->where('status','!=','tolak')->count(); }}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach






        </div>
    </div>
</div>

{{-- bc --}}
<div class="card">
    <div class="card-header">
        <h4>Cloud BC</h4>
    </div>

    <div class="card-body">
        <div class="row">
            @foreach ($guru->where('pokja','BC') as $item)
                <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card card-statistic-2 card-primary" style="box-shadow: 0 4px 15px 0 rgba(0,0,0,0.2);">
                    <div class="card-stats">
                        <div class="card-stats-items mt-4">
                            <div class="card-stats-item col-12 ml-2 text-left">
                                <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                                    <div class="card-stats-item-label">Guru</div>
                                    <div class="card-stats-item-count w-100">{{ $item->name }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary" >
                        <i class="fas fa-cloud"></i>
                    </div>
                    <div class="card-wrap">
                        <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                            <div class="card-header">
                                <h4>Total Cloud</h4>
                            </div>
                            <div class="card-body">
                                {{ $item->admin_cloud()->where('status','!=','kosong')->where('status','!=','tolak')->count(); }}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- TEI --}}
<div class="card">
    <div class="card-header">
        <h4>Cloud TEI</h4>
    </div>

    <div class="card-body">
        <div class="row">
            @foreach ($guru->where('pokja','TEI') as $item)
                <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card card-statistic-2 card-primary" style="box-shadow: 0 4px 15px 0 rgba(0,0,0,0.2);">
                    <div class="card-stats">
                        <div class="card-stats-items mt-4">
                            <div class="card-stats-item col-12 ml-2 text-left">
                                <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                                    <div class="card-stats-item-label">Guru</div>
                                    <div class="card-stats-item-count w-100">{{ $item->name }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary" >
                        <i class="fas fa-cloud"></i>
                    </div>
                    <div class="card-wrap">
                        <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                            <div class="card-header">
                                <h4>Total Cloud</h4>
                            </div>
                            <div class="card-body">
                                {{ $item->admin_cloud()->where('status','!=','kosong')->where('status','!=','tolak')->count(); }}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- B indo --}}
<div class="card">
    <div class="card-header">
        <h4>Cloud TKJ</h4>
    </div>

    <div class="card-body">
        <div class="row">
            @foreach ($guru->where('pokja','TKJ') as $item)
                <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card card-statistic-2 card-primary" style="box-shadow: 0 4px 15px 0 rgba(0,0,0,0.2);">
                    <div class="card-stats">
                        <div class="card-stats-items mt-4">
                            <div class="card-stats-item col-12 ml-2 text-left">
                                <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                                    <div class="card-stats-item-label">Guru</div>
                                    <div class="card-stats-item-count w-100">{{ $item->name }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary" >
                        <i class="fas fa-cloud"></i>
                    </div>
                    <div class="card-wrap">
                        <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                            <div class="card-header">
                                <h4>Total Cloud</h4>
                            </div>
                            <div class="card-body">
                                {{ $item->admin_cloud()->where('status','!=','kosong')->where('status','!=','tolak')->count(); }}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


<div class="card">
    <div class="card-header">
        <h4>Cloud Bahasa Indonesia</h4>
    </div>

    <div class="card-body">
        <div class="row">
        @foreach ($guru->where('pokja','b.indo') as $item)
                <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card card-statistic-2 card-primary" style="box-shadow: 0 4px 15px 0 rgba(0,0,0,0.2);">
                    <div class="card-stats">
                        <div class="card-stats-items mt-4">
                            <div class="card-stats-item col-12 ml-2 text-left">
                                <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                                    <div class="card-stats-item-label">Guru</div>
                                    <div class="card-stats-item-count w-100">{{ $item->name }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary" >
                        <i class="fas fa-cloud"></i>
                    </div>
                    <div class="card-wrap">
                        <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                            <div class="card-header">
                                <h4>Total Cloud</h4>
                            </div>
                            <div class="card-body">
                                {{ $item->admin_cloud()->where('status','!=','kosong')->where('status','!=','tolak')->count(); }}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4>Cloud Matematika</h4>
    </div>

    <div class="card-body">
        <div class="row">
            @foreach ($guru->where('pokja','MTK') as $item)
                <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card card-statistic-2 card-primary" style="box-shadow: 0 4px 15px 0 rgba(0,0,0,0.2);">
                    <div class="card-stats">
                        <div class="card-stats-items mt-4">
                            <div class="card-stats-item col-12 ml-2 text-left">
                                <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                                    <div class="card-stats-item-label">Guru</div>
                                    <div class="card-stats-item-count w-100">{{ $item->name }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary" >
                        <i class="fas fa-cloud"></i>
                    </div>
                    <div class="card-wrap">
                        <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                            <div class="card-header">
                                <h4>Total Cloud</h4>
                            </div>
                            <div class="card-body">
                                {{ $item->admin_cloud()->where('status','!=','kosong')->where('status','!=','tolak')->count(); }}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- PKN --}}
<div class="card">
    <div class="card-header">
        <h4>Cloud PKN</h4>
    </div>

    <div class="card-body">
        <div class="row">
            @foreach ($guru->where('pokja','PPKN') as $item)
                <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card card-statistic-2 card-primary" style="box-shadow: 0 4px 15px 0 rgba(0,0,0,0.2);">
                    <div class="card-stats">
                        <div class="card-stats-items mt-4">
                            <div class="card-stats-item col-12 ml-2 text-left">
                                <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                                    <div class="card-stats-item-label">Guru</div>
                                    <div class="card-stats-item-count w-100">{{ $item->name }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary" >
                        <i class="fas fa-cloud"></i>
                    </div>
                    <div class="card-wrap">
                        <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                            <div class="card-header">
                                <h4>Total Cloud</h4>
                            </div>
                            <div class="card-body">
                                {{ $item->admin_cloud()->where('status','!=','kosong')->where('status','!=','tolak')->count(); }}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Agama --}}
<div class="card">
    <div class="card-header">
        <h4>Cloud Agama</h4>
    </div>

    <div class="card-body">
        <div class="row">
            @foreach ($guru->where('pokja','Agama') as $item)
                <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card card-statistic-2 card-primary" style="box-shadow: 0 4px 15px 0 rgba(0,0,0,0.2);">
                    <div class="card-stats">
                        <div class="card-stats-items mt-4">
                            <div class="card-stats-item col-12 ml-2 text-left">
                                <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                                    <div class="card-stats-item-label">Guru</div>
                                    <div class="card-stats-item-count w-100">{{ $item->name }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary" >
                        <i class="fas fa-cloud"></i>
                    </div>
                    <div class="card-wrap">
                        <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                            <div class="card-header">
                                <h4>Total Cloud</h4>
                            </div>
                            <div class="card-body">
                                {{ $item->admin_cloud()->where('status','!=','kosong')->where('status','!=','tolak')->count(); }}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- sindo --}}
<div class="card">
    <div class="card-header">
        <h4>Cloud Sindo</h4>
    </div>

    <div class="card-body">
        <div class="row">
            @foreach ($guru->where('pokja','Sindo') as $item)
                <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card card-statistic-2 card-primary" style="box-shadow: 0 4px 15px 0 rgba(0,0,0,0.2);">
                    <div class="card-stats">
                        <div class="card-stats-items mt-4">
                            <div class="card-stats-item col-12 ml-2 text-left">
                                <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                                    <div class="card-stats-item-label">Guru</div>
                                    <div class="card-stats-item-count w-100">{{ $item->name }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary" >
                        <i class="fas fa-cloud"></i>
                    </div>
                    <div class="card-wrap">
                        <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                            <div class="card-header">
                                <h4>Total Cloud</h4>
                            </div>
                            <div class="card-body">
                                {{ $item->admin_cloud()->where('status','!=','kosong')->where('status','!=','tolak')->count(); }}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


<div class="card">
    <div class="card-header">
        <h4>Cloud SBK</h4>
    </div>

    <div class="card-body">
        <div class="row">
            @foreach ($guru->where('pokja','SBK') as $item)
                <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card card-statistic-2 card-primary" style="box-shadow: 0 4px 15px 0 rgba(0,0,0,0.2);">
                    <div class="card-stats">
                        <div class="card-stats-items mt-4">
                            <div class="card-stats-item col-12 ml-2 text-left">
                                <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                                    <div class="card-stats-item-label">Guru</div>
                                    <div class="card-stats-item-count w-100">{{ $item->name }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary" >
                        <i class="fas fa-cloud"></i>
                    </div>
                    <div class="card-wrap">
                        <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                            <div class="card-header">
                                <h4>Total Cloud</h4>
                            </div>
                            <div class="card-body">
                                {{ $item->admin_cloud()->where('status','!=','kosong')->where('status','!=','tolak')->count(); }}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- inggris --}}
<div class="card">
    <div class="card-header">
        <h4>Cloud Bahasa Inggris</h4>
    </div>


    <div class="card-body">
        <div class="row">
            @foreach ($guru->where('pokja','B.inggris') as $item)
                <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card card-statistic-2 card-primary" style="box-shadow: 0 4px 15px 0 rgba(0,0,0,0.2);">
                    <div class="card-stats">
                        <div class="card-stats-items mt-4">
                            <div class="card-stats-item col-12 ml-2 text-left">
                                <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                                    <div class="card-stats-item-label">Guru</div>
                                    <div class="card-stats-item-count w-100">{{ $item->name }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary" >
                        <i class="fas fa-cloud"></i>
                    </div>
                    <div class="card-wrap">
                        <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                            <div class="card-header">
                                <h4>Total Cloud</h4>
                            </div>
                            <div class="card-body">
                                {{ $item->admin_cloud()->where('status','!=','kosong')->where('status','!=','tolak')->count(); }}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


{{-- bk --}}
<div class="card">
    <div class="card-header">
        <h4>Cloud BK</h4>
    </div>

    <div class="card-body">
        <div class="row">
            @foreach ($guru->where('pokja','BK') as $item)
                <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card card-statistic-2 card-primary" style="box-shadow: 0 4px 15px 0 rgba(0,0,0,0.2);">
                    <div class="card-stats">
                        <div class="card-stats-items mt-4">
                            <div class="card-stats-item col-12 ml-2 text-left">
                                <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                                    <div class="card-stats-item-label">Guru</div>
                                    <div class="card-stats-item-count w-100">{{ $item->name }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary" >
                        <i class="fas fa-cloud"></i>
                    </div>
                    <div class="card-wrap">
                        <a href="{{ route('admin.cloud.table', $item->id) }}" class="text-decoration-none">
                            <div class="card-header">
                                <h4>Total Cloud</h4>
                            </div>
                            <div class="card-body">
                                {{ $item->admin_cloud()->where('status','!=','kosong')->where('status','!=','tolak')->count(); }}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>



@endsection
@push('js')
<script>
    // $('#Table-1').DataTable({
    //     serverside: true,
    //     processing: true,
    //     ajax : {
    //         url: '/admin/dashboard/admin_cloud/view',
    //         methods: '->where('status','!=','tolak')get',
    //     },
    //     columns: [
    //     {name: 'DT_RowIndex',data:'DT_RowIndex'},
    //     {name: 'kategori',data:'kategori'},
    //     {name: 'mapel',data:'mapel'},
    //     {name:'kompetensi_keahlian', data:'kompetensi_keahlian'},
    //     {name: 'status',data:'status'},
    //     {name: 'persetujuan',data:'persetujuan'},
    //     {name: 'action',data:'action'},
    //     ]
    // });
</script>

@endpush
