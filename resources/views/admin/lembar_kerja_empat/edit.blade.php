@extends('layout.master')
@push('css')

@endpush
@section('title', 'SIFOS | Edit Data LK 4')
@section('judul','Edit Data Lembar Kerja 4')
@section('breadcrump')
{{-- breadcrump here --}}
<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
<div class="breadcrumb-item">Edit LK 4</div>
@endsection
@section('main')

<form id="form" action="{{ route('admin.Lembar-kerja-4.update', $bidang_main->id) }}" method="POST">
    @method('put')
    @csrf
    {{-- content here --}}
    <div class="card">
        <div class="card-header">
            <h4><i class="fas fa-align-justify"></i> Tambah Data Lembar Kerja 4</h4>
        </div>
        <div class="card-body">
            <div>
                <h6 class="card-title">Pada bagian ini, guru pengampu mata pelajaran rincian berkaitan materi bahan
                    ajar yang akan diterapkan disetiap kompetensi dasar serta
                    memberikan deskripsi dari setiap bahan ajar yang digunakan.</h6>
            </div>
            {{-- datatenagapendidik --}}
            <div class="row">
                <div class="col-sm-6">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Mata Pelajaran</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Tenaga Pendidik</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="far fa-address-card"></i>
                                    </div>
                                </div>
                                <select class="form-control" name="id_guru"
                                    {{ (Auth::user()->role == 'guru') ? 'disabled id=""' : 'id=id_guru' }} disabled>
                                    <option value="">Lihat Lebih Lanjut</option>
                                    @if (Auth::user()->role === 'admin')
                                    @foreach ($guru as $items)
                                    <option value="{{ $items->id }}"
                                        {{ (old('id_guru', $bidang_main->guru->id) == $items->id) ? 'selected' : '' }}>
                                        {{ $items->name }}</option>
                                    @endforeach
                                    @else
                                    <option value="{{  Auth::user()->guru->id  }}" selected>
                                        {{ Auth::user()->guru->name }}
                                    </option>
                                    @endif

                                </select>
                                <div class="invalid-feedback">
                                    Mapel tidak boleh koosng
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mapel</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-left"></i>
                                    </div>
                                </div>
                                <select class="form-control" name="id_mapel" id="mapel" disabled>
                                    <option value="">Lihat Lebih Lanjut</option>
                                    @if (Auth::user()->role == 'admin')
                                    @foreach ($mapel as $mapels)
                                    <option value="{{ $mapels->id }}"
                                        {{  (old('id_mapel', $bidang_main->mapel->id) == $mapels->id) ? 'selected' : ''  }}>
                                        {{ $mapels->nama_mapel }}</option>
                                    @endforeach
                                    @else
                                    @foreach (Auth::user()->guru->mapel as $mapels )
                                    <option value="{{ $mapels->id }}" {{ ($bidang_main->id == $mapels->id) ? 'selected' : '' }}>{{ $mapels->nama_mapel }}</option>
                                    @endforeach
                                    @endif

                                </select>
                                <div class="invalid-feedback">
                                    Mapel tidak boleh koosng
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Bidang Studi</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-left"></i>
                                    </div>
                                </div>
                                <select class="form-control" name="id_bidang_keahlian" id="bidang" disabled>
                                    <option value=" ">Lihat Lebih Lanjut</option>
                                    @foreach ($bidang_table as $bidangs)
                                    <option value="{{ $bidangs->id }}"
                                        {{ (old('id_bidang_keahlian', $bidang_main->id) == $bidangs->id) ? 'selected' : '' }}>
                                        {{ $bidangs->bidang_studi }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Bidang Studi tidak boleh koosng
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">.</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>kelas</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-justify"></i>
                                    </div>
                                </div>
                                <input type="text" id="kelas" class="form-control" value="{{ $bidang_main->kelas }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kompetensi Keahlian</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-justify"></i>
                                    </div>
                                </div>
                                <input type="text" id="kompetensi" class="form-control"
                                    value="{{ $bidang_main->kompetensi_keahlian }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jam Pelajaran (JP)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-justify"></i>
                                    </div>
                                </div>
                                <input type="text" id="jp" class="form-control"
                                    value="{{ $bidang_main->jam_pelajaran }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- datatenagapendidik --}}

            {{-- Kompetensi dasat ganjil --}}
            <div class="row">
                <div class="container-fluid">
                    <div class="card-header">
                        <h4 class="card-title">
                            Kompetensi Dasar ganji;
                        </h4>
                    </div>
                    <table class="table table-bordered ml-2 mr-2">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>kd</th>
                                <th>Kompetensi Dasar</th>
                                <th>Modul</th>
                                <th>vidio pembalajaran</th>
                                <th>deskripsi bahan ajar</th>
                                <th>keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="tbody-ganjil">
                            @foreach ($bidang_main->kompetensi_dasar()->where('semester','Ganjil')->get() as $key =>
                            $value)
                            <tr>
                                <td rowspan="2"><input type="text" name="id_kd[]" value="{{ $value->id }}" hidden>{{ $loop->iteration }}</td>
                                <td>{{ $value->kd_pengetahuan }}</td>
                                <td>{{ $value->keterangan_pengetahuan }}</td>
                                <td rowspan="2"><textarea name="modul[]" class="form-control" rows="10"cols="20">{{ $value->materi_bahan_ajar->modul }}</textarea></td>
                                <td rowspan="2"><textarea name="vidio_pel[]" class="form-control">{{ $value->materi_bahan_ajar->vidio_pembelajaran }}</textarea></td>
                                <td rowspan="2"><textarea name="deskripsi_bahan[]" class="form-control">{{ $value->materi_bahan_ajar->deskripsi_bahan_ajar }}</textarea></td>
                                <td rowspan="2"><textarea name="keterangan[]"class="form-control">{{ $value->materi_bahan_ajar->keterangan }}</textarea></td>
                            </tr>
                            <tr>
                                <td>{{ $value->kd_ketrampilan }}</td>
                                <td>{{ $value->keterangan_ketrampilan }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            {{--  --}}
            {{-- Kompetensi dasat Genap --}}
            <div class="row">
                <div class="container-fluid">
                    <div class="card-header">
                        <h4 class="card-title">
                            Kompetensi Dasar Genap;
                        </h4>
                    </div>
                    <table class="table table-bordered ml-2 mr-2">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>kd</th>
                                <th>Kompetensi Dasar</th>
                                <th>Modul</th>
                                <th>vidio pembalajaran</th>
                                <th>deskripsi bahan ajar</th>
                                <th>keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="tbody-genap">
                            @foreach ($bidang_main->kompetensi_dasar()->where('semester','Genap')->get() as $key =>
                            $value)
                            <tr>
                                <td rowspan="2"><input type="text" name="id_kd[]" value="{{ $value->id }}" hidden>{{ $loop->iteration }}</td>
                                <td>{{ $value->kd_pengetahuan }}</td>
                                <td>{{ $value->keterangan_pengetahuan }}</td>
                                <td rowspan="2"><textarea name="modul[]" class="form-control" rows="10"cols="20">{{ $value->materi_bahan_ajar->modul }}</textarea></td>
                                <td rowspan="2"><textarea name="vidio_pel[]" class="form-control">{{ $value->materi_bahan_ajar->vidio_pembelajaran }}</textarea></td>
                                <td rowspan="2"><textarea name="deskripsi_bahan[]" class="form-control">{{ $value->materi_bahan_ajar->deskripsi_bahan_ajar }}</textarea></td>
                                <td rowspan="2"><textarea name="keterangan[]"class="form-control">{{ $value->materi_bahan_ajar->keterangan }}</textarea></td>
                            </tr>
                            <tr>
                                <td>{{ $value->kd_ketrampilan }}</td>
                                <td>{{ $value->keterangan_ketrampilan }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            {{--  --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="modal-footer">
                            <button class="btn btn-primary" id="button">Submit</button>
                            <a href="{{ route('admin.Lembar-kerja-4.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            {{--  --}}
        </div>
    </div>
    {{-- end pages --}}
</form>

@endsection
@push('js')

@endpush
