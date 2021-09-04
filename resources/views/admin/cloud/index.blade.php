@extends('layout.master')
@push('css')

@endpush
@section('title', 'SIFOS | Cloud')
@section('judul','Cloud ')
@section('breadcrump')
    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
    <div class="breadcrumb-item"></div>
@endsection
@section('main')
{{-- content here --}}
<div class="card">
    <div class="card-header">
        <h4>Daftar Cloud Guru</h4>
    </div>

    <div class="card-body">
        <div class="row">
            @foreach ($guru as $item)
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
                                {{ $item->admin_cloud()->count(); }}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

            {{-- <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card card-statistic-2 card-primary" style="box-shadow: 0 4px 15px 0 rgba(0,0,0,0.2);">
                    <div class="card-stats">
                        <div class="card-stats-items mt-4">
                            <div class="card-stats-item col-6">
                                <a href="" class="text-decoration-none">
                                    <div class="card-stats-item-label">Guru</div>
                                    <div class="card-stats-item-count">Asuka</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <div class="card-wrap">
                        <a href="" class="text-decoration-none">
                            <div class="card-header">
                                <h4>Total Cloud</h4>
                            </div>
                            <div class="card-body">
                                12
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card card-statistic-2 card-primary" style="box-shadow: 0 4px 15px 0 rgba(0,0,0,0.2);">
                    <div class="card-stats">
                        <div class="card-stats-items mt-4">
                            <div class="card-stats-item col-6">
                                <a href="" class="text-decoration-none">
                                    <div class="card-stats-item-label">Guru</div>
                                    <div class="card-stats-item-count">Asuka</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <div class="card-wrap">
                        <a href="" class="text-decoration-none">
                            <div class="card-header">
                                <h4>Total Cloud</h4>
                            </div>
                            <div class="card-body">
                                12
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card card-statistic-2 card-primary" style="box-shadow: 0 4px 15px 0 rgba(0,0,0,0.2);">
                    <div class="card-stats">
                        <div class="card-stats-items mt-4">
                            <div class="card-stats-item col-6">
                                <a href="" class="text-decoration-none">
                                    <div class="card-stats-item-label">Guru</div>
                                    <div class="card-stats-item-count">Asuka</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <div class="card-wrap">
                        <a href="" class="text-decoration-none">
                            <div class="card-header">
                                <h4>Total Cloud</h4>
                            </div>
                            <div class="card-body">
                                12
                            </div>
                        </a>
                    </div>
                </div>
            </div> --}}





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
    //         methods: 'get',
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
