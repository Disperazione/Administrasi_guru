@extends('layout.master')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('title', 'SIFOS | Exit Data LK 1')
@section('judul','Exit Data Lembar Kerja 1')
@section('breadcrump')
{{-- breadcrump here --}}
<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
<div class="breadcrumb-item">LK 1</div>
@endsection
@section('main')
{{-- content here --}}

<div class="card">
    <div class="card-header">
        <h4><i class="fas fa-align-justify"></i> Tambah Data Lembar Kerja 1</h4>
    </div>
    <div class="card-body">
        <div>
            <h6 class="card-title">Pada bagian ini, cantumkan data pribadi tenaga pendidik serta mencantumkan mata
                pelajaran yang di ampu.</h6>
        </div>
        <form id="form" class="form" action="{{ route('admin.Lembar-kerja-1.update',$target->id) }}" method="POST">
            @csrf
            @method('put')
            {{-- datatenagapendidik --}}
            <div class="row">
                <div class="col-sm-6">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Data Tenaga Pendidik</h4>
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
                                    {{ (Auth::user()->role == 'guru') ? 'disabled id=""' : 'id=id_guru' }}>
                                    <option value="">Lihat Lebih Lanjut</option>
                                    @if (Auth::user()->role === 'admin')
                                    @foreach ($guru as $items)
                                    <option value="{{ $items->id }}"
                                        {{ (old('id_guru', $items->id)) ? 'selected' : '' }}>
                                        {{ $items->name }}</option>
                                    @endforeach
                                    @else
                                    <option value="{{  Auth::user()->guru->id  }}" selected>
                                        {{ Auth::user()->guru->name }}</option>
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
                                <input type="text" class="form-control" name="bidang_studi" id="bidang_studi"
                                    placeholder="Default : TEHNOLOGI INFORMASI DAN KOMUKNIKASI"
                                    value="{{ $target->lembar_kerja->Lk_1 }}">
                                <div class="invalid-feedback" c>
                                    Bidang Studi tidak boleh koosng
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mapel</label>
                            <div class="input-group">
                                {{-- <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-left"></i>
                                    </div>
                                </div> --}}
                                <select class="form-control" name="mapel" id="mapel" readonly>
                                    <option value="">Lihat Lebih Lanjut</option>
                                    {{-- @foreach(Auth::user()->guru->bidang_keahlian()->where('id_jurusan',$target->jurusan)->get()
                                    as $item)
                                    <option value="{{ $item->id }}" {{ ($item->id == $target->id) ? 'selected' : '' }}>
                                        {{ $item->mapel }}</option>
                                    @endforeach --}}
                                    <option value="{{ $target->id }}" selected>{{ $target->mapel }}</option>
                                </select>
                                <div class="invalid-feedback">
                                    Mapel tidak boleh koosng
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <div class="input-group">
                                {{-- <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-left"></i>
                                    </div>
                                </div> --}}
                                <select class="form-control" name="id_jurusan" id="jurusan" data-id="{{ $id_jurusan }}" multiple="multiple"   disabled>
                                    <option value="">Lihat Lebih Lanjut</option>
                                    @foreach ($jurusan as $item)
                                    <option value="{{ $item->id }}"
                                        {{ (old('id_jurusan',$target->id) == $item->id) ? 'selected' : '' }}>
                                        {{ $item->singkatan_jurusan }}</option>
                                    @endforeach

                                </select>
                                <div class="invalid-feedback">
                                    Jurusan tidak boleh koosng
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
                                <input type="text" id="kelas" class="form-control" disabled
                                    value="{{ $target->kelas }}">
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>Kompetensi Keahlian</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-justify"></i>
                                    </div>
                                </div>
                                <input type="text" id="kompetensi" class="form-control" disabled>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label>Jam Pelajaran (JP)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-justify"></i>
                                    </div>
                                </div>
                                <input type="text" id="jp" class="form-control" disabled
                                    value="{{ $target->total_jam_pelajaran }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Total Jam Pelajaran (JP)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-justify"></i>
                                    </div>
                                </div>
                                <input type="text" id="total_jp" class="form-control" disabled
                                    value="{{ $target->total_waktu_jam_pelajaran }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- datatenagapendidik --}}
            {{-- kompetensi dasar --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Kompetensi Dasar</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" style="width: 10px;">NO.</th>
                                    <th scope="col" style="width: 80%;">Semester Ganjil</th>
                                    <th scope="col" style="width: 10px;">
                                        <button class="btn btn-success addbtn_multiple_semester_ganjil"
                                            style="width: 80px;">Fields <i class="fas fa-plus"></i></button>
                                    </th>
                                </tr>
                                {{-- <tr>
                                    <th style="width: 20%">kd pengetahuan</th>
                                    <th>keterangan pengetahuan</th>
                                    <th>kd ketrampilan</th>
                                    <th>keterangan ketrampilan</th>
                                </tr> --}}
                            </thead>
                            <tbody class="fields_multiple_semester_ganjil" data-target="{{ $target->id }}">
                                @foreach ($s_ganjil as $key => $item)
                                <tr>
                                    <td scope="row" id="index_ganjil" class="index_ganjil" data-key="{{ $key + 1 }}">{{ $key + 1 }}</td>
                                    <td>
                                        <select name="kd_ganjil[]" id="" style="width:100%;heigth:100%"
                                            class="form-control s_ganjil">
                                            {{-- <option value="{{ $item->id }}">
                                                {{ $item->kd_pengetahuan .' '.$item->keterangan_pengetahuan.' & '.$item->kd_ketrampilan .' '.$item->keterangan_ketrampilan  }}
                                            </option> --}}
                                            @foreach ($s_ganjil->where('id_bidang_keahlian',$item->id_bidang_keahlian)->where('semester','Ganjil') as $items)
                                            <option value="{{ $items->id }}" {{ $item->id == $items->id ? 'selected' : '' }}>
                                                {{ $items->kd_pengetahuan .' '.$items->keterangan_pengetahuan.' & '.$items->kd_ketrampilan .' '.$items->keterangan_ketrampilan  }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-danger x_s_ganjil" id="x_s_ganjil">X</button>
                                    </td>
                                </tr>
                                @endforeach

                                {{-- </tr> --}}
                            </tbody>
                        </table>

                        <table class="table table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" style="width: 10px;">NO.</th>
                                    <th scope="col" style="width: 80%;">Semester Genap</th>
                                    <th scope="col" style="width: 10px;">
                                        <button class="btn btn-success addbtn_multiple_semester_genap"
                                            style="width: 80px;">Fields <i class="fas fa-plus"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="fields_multiple_semester_genap" data-target="{{ $target->id }}">
                                @foreach ($s_genap as $key => $item)
                                <tr>
                                    <td scope="row"  id="index_genap" data-key="{{ $key + 1 }}">{{ $key + 1 }}</td>
                                    <td>
                                        <select name="kd_genap[]" id="" style="width:100%;heigth:100%"
                                            class="form-control">
                                            {{-- <option value="{{ $item->id }}">
                                                {{ $item->kd_pengetahuan .' '.$item->keterangan_pengetahuan.' & '.$item->kd_ketrampilan .' '.$item->keterangan_ketrampilan  }}
                                            </option> --}}
                                            {{-- ngambil collection dari s_genap lalu menambgil data yang semester == genap --}}
                                            @foreach ($s_genap->where('id_bidang_keahlian',$item->id_bidang_keahlian)->where('semester','Genap') as $items)
                                            <option value="{{ $items->id }}" {{ $item->id == $items->id ? 'selected' : '' }}>
                                                {{ $items->kd_pengetahuan .' '.$items->keterangan_pengetahuan.' & '.$items->kd_ketrampilan .' '.$items->keterangan_ketrampilan  }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-danger x_s_genap" id="x_s_genap">X</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="form-group fields_multiple_kompetensi">
                            <label>Kompetensi Inti</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control col-10 input_kompetensi" name="kompetensi[]">
                                <button class="btn btn-success ml-4 addbtn_multiple_kompetensi">Fields <i
                                        class="fas fa-plus"></i></button>
                                <div class="invalid-feedback d-none invalid_kompetensi">
                                    Kompetensi inti boleh kosong
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            {{--  --}}
            {{-- kompetensi inti --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Kompetensi Inti</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" style="width: 10px;">NO.</th>
                                    <th scope="col" style="width: 80%;">Kompetensi Isi</th>
                                    <th scope="col" style="width: 10px;">
                                        <button class="btn btn-success addbtn_multiple_kompetensi"
                                            style="width: 80px;">Fields <i class="fas fa-plus"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="fields_multiple_kompetensi">
                                <div>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <textarea type="text" class="form-control input_kompetensi"
                                                name="kompetensi[]"
                                                style="height: 40px;">{{ $target->target_pembelajaran->kompetensi_inti[0]->konpetensi }}</textarea>
                                            <div class="invalid-feedback d-none invalid_kompetensi"
                                                style="margin-left: 41px;">
                                                Kompetensi inti tidak boleh kosong
                                            </div>
                                        </td>
                                        <td class="text-center">
                                        </td>
                                    </tr>
                                </div>

                                @if (count($target->target_pembelajaran->kompetensi_inti) < 1) @else <tr>
                                    @for ($i = 1 ; $i < count($target->target_pembelajaran->kompetensi_inti);$i++ )
                                        <th scope="row" id="row_konpetensi" data-id="{{ $i+1 }}"> {{ $i + 1 }} </th>
                                        <td>
                                            <textarea type="text" class="form-control input_kompetensi"
                                                name="kompetensi[]"
                                                style="height: 40px;">{{ $target->target_pembelajaran->kompetensi_inti[$i]->konpetensi}}</textarea>
                                            <div class="invalid-feedback d-none invalid_kompetensi"
                                                style="margin-left: 41px;">
                                                Kompetensi inti tidak boleh kosong
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger ml-4 removebtn_multiple_kompetensi"><i
                                                    class="fas fa-times"></i></button>
                                        </td>
                                        </tr>
                                        @endfor

                                        @endif

                            </tbody>
                        </table>

                        {{-- <div class="form-group fields_multiple_kompetensi">
                            <label>Kompetensi Inti</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control col-10 input_kompetensi" name="kompetensi[]">
                                <button class="btn btn-success ml-4 addbtn_multiple_kompetensi">Fields <i
                                        class="fas fa-plus"></i></button>
                                <div class="invalid-feedback d-none invalid_kompetensi">
                                    Kompetensi inti boleh kosong
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            {{-- kompetensi inti --}}

            {{-- mapel&kkid --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Target Mata Pelajaran</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" style="width: 10px;">NO.</th>
                                    <th scope="col" style="width: 55%;">Target Mata Pelajaran</th>
                                    <th scope="col" style="width: 20%;">Keterangan</th>
                                    <th scope="col" style="width: 10px;">
                                        <button class="btn btn-success addbtn_multiple_maple"
                                            style="width: 80px;">Fields <i class="fas fa-plus"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="fields_multiple_mapel">
                                <div>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <textarea type="text" class="form-control input_target_mapel"
                                                name="target_mapel[]"
                                                style="height: 40px;">{{ $target->target_pembelajaran->target_pencapaian_mapel[0]->target }}</textarea>
                                            {{-- validasi --}}
                                            <div class="invalid-feedback d-none invalid_target_mapel">
                                                Target mapel tidak boleh kosong
                                            </div>
                                        </td>
                                        <td>
                                            <textarea type="text" class="form-control keterangan_target_mapel"
                                                name="keterangan_mapel[]"
                                                style="height: 40px;">{{ $target->target_pembelajaran->target_pencapaian_mapel[0]->keterangan }}</textarea>
                                            {{-- validasi --}}
                                            <div class="invalid-feedback d-none invalid_keterangan_target_mapel">
                                                Keteragan mapel tidak boleh kosong
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                </div>
                                @if (count($target->target_pembelajaran->target_pencapaian_mapel) < 2) @else @for ($i=1;
                                    $i < count($target->target_pembelajaran->target_pencapaian_mapel); $i++)
                                    <tr id="row_pen_mapel" data-id="{{ $i + 1 }}">
                                        <th scope="row">{{ $i + 1 }}</th>
                                        <td>
                                            <textarea type="text" class="form-control input_target_mapel"
                                                name="target_mapel[]"
                                                style="height: 40px;">{{ $target->target_pembelajaran->target_pencapaian_mapel[$i]->target }}</textarea>
                                            <div class="invalid-feedback d-none invalid_target_mapel">
                                                Target mapel tidak boleh kosong
                                            </div>
                                        </td>
                                        <td>
                                            <textarea type="text" class="form-control keterangan_target_mapel"
                                                name="keterangan_mapel[]"
                                                style="height: 40px;">{{  $target->target_pembelajaran->target_pencapaian_mapel[$i]->keterangan }}</textarea>
                                            <div class="invalid-feedback d-none invalid_keterangan_target_mapel">
                                                Keteragan mapel tidak boleh kosong
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger removebtn_multiple_maple"><i
                                                    class="fas fa-times"></i></button>
                                        </td>
                                    </tr>
                                    @endfor
                                    @endif


                            </tbody>
                        </table>

                        {{-- <div class="form-group fields_multiple_mapel">
                            <label>Pencapaian Mapel</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control col-10 input_target_mapel" name="target_mapel[]">
                                <div class="invalid-feedback d-none invalid_target_mapel">
                                    Pencapaian mapel tidak boleh kosong
                                </div>
                            </div>
                            <label class="mt-3">Keterangan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control col-10 keterangan_target_mapel"
                                    name="keterangan_mapel[]">
                                <button class="btn btn-success ml-4 addbtn_multiple_maple">Fields <i
                                        class="fas fa-plus"></i></button>
                                <div class="invalid-feedback d-none invalid_keterangan_target_mapel">
                                    Keteragan mapel tidak boleh kosong
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Target Mata Pelajaran KKID</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" style="width: 10px;">NO.</th>
                                    <th scope="col" style="width: 55%;">Target Mata Pelajaran KKID</th>
                                    <th scope="col" style="width: 20%;">Keterangan</th>
                                    <th scope="col" style="width: 10px;">
                                        <button class="btn btn-success addbtn_multiple_kkid" style="width: 80px;">Fields
                                            <i class="fas fa-plus"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="fields_multiple_kkid">
                                <div>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <textarea type="text" class="form-control input_pencapaian_kkid"
                                                name="target_kkid[]"
                                                style="height: 40px;">{{ $target->target_pembelajaran->target_pencapaian_kkd[0]->target }}</textarea>
                                            {{-- validasi --}}
                                            <div class="invalid-feedback d-none invalid_pencapaian_kkid">
                                                Target mapel KKID tidak boleh kosong
                                            </div>
                                        </td>
                                        <td>
                                            <textarea type="text" class="form-control keterangan_pencapaian_kkid"
                                                name="keterangan_kkid[]"
                                                style="height: 40px;">{{ $target->target_pembelajaran->target_pencapaian_kkd[0]->keterangan }}</textarea>
                                            {{-- validasi --}}
                                            <div class="invalid-feedback d-none invalid_keterangan_pencapaian_kkid">
                                                Keteragan KKID tidak boleh kosong
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                </div>
                                @if (count($target->target_pembelajaran->target_pencapaian_kkd) < 2) @else @for ($i=1;$i
                                    < count($target->target_pembelajaran->target_pencapaian_kkd); $i++))
                                    <tr id="kkid" id="row_pen_kkid" data-id="{{ $i + 1 }}">
                                        <th scope="row"
                                            data-id="{{ count($target->target_pembelajaran->target_pencapaian_kkd)  }}">
                                        </th>
                                        <td>
                                            <textarea type="text" class="form-control input_pencapaian_kkid"
                                                name="target_kkid[]"
                                                style="height: 40px;">{{ $target->target_pembelajaran->target_pencapaian_kkd[$i]->target }}</textarea>
                                            <div class="invalid-feedback d-none invalid_pencapaian_kkid">
                                                Target mapel KKID tidak boleh kosong
                                            </div>
                                        </td>
                                        <td>
                                            <textarea type="text" class="form-control keterangan_pencapaian_kkid"
                                                name="keterangan_kkid[]"
                                                style="height: 40px;">{{ $target->target_pembelajaran->target_pencapaian_kkd[$i]->keterangan }}</textarea>
                                            <div class="invalid-feedback d-none invalid_keterangan_pencapaian_kkid">
                                                Keteragan KKID tidak boleh kosong
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger removebtn_multiple_kkid"><i
                                                    class="fas fa-times"></i></button>
                                        </td>
                                    </tr>
                                    @endfor
                                    @endif


                            </tbody>
                        </table>

                        {{-- <div class="form-group fields_multiple_kkid">
                            <label>Pencapaian KKID</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control col-10 input_pencapaian_kkid"
                                    name="target_kkid[]">
                                <div class="invalid-feedback  invalid_pencapaian_kkid">
                                    Pencapaian KKID tidak boleh kosong
                                </div>
                            </div>
                            <label>Keterangan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control col-10 keterangan_pencapaian_kkid"
                                    name="keterangan_kkid[]">
                                <button class="btn btn-success ml-4 addbtn_multiple_kkid"
                                    name="keterangan_kkid[]">Fields <i class="fas fa-plus"></i></button>
                                <div class="invalid-feedback d-none invalid_keterangan_pencapaian_kkid">
                                    Keterangan tidak boleh kosong
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            {{-- mapel&kkid --}}

            {{-- buktisiswa --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <h4 class="card-title" style="padding-top: 30px;">Rincian Bukti</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" style="width: 10px;">NO.</th>
                                    <th scope="col" style="width: 80%;">Rincian Bukti</th>
                                    <th scope="col" style="width: 10px;">
                                        <button class="btn btn-success addbtn_multiple_bukti"
                                            style="width: 80px;">Fields <i class="fas fa-plus"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="fields_multiple_bukti">
                                <div>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <textarea type="text" class="form-control input_bukti" name="bukti[]"
                                                style="height: 40px;">{{ $target->target_pembelajaran->rincian_bukti[0]->rincian_bukti }}</textarea>
                                            {{-- validasi --}}
                                            <div class="invalid-feedback d-none invalid_bukti"
                                                style="margin-left: 41px;">
                                                Rincian bukti tidak boleh kosong
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger removebtn_multiple_bukti"><i
                                                    class="fas fa-times"></i></button>
                                        </td>
                                    </tr>
                                </div>
                                @if (count($target->target_pembelajaran->rincian_bukti) < 2) @else <tr>
                                    @for ($i = 1 ; $i < count($target->target_pembelajaran->rincian_bukti);$i++ )
                                        <th scope="row" id="row_konpetensi" data-id="{{ $i+1 }}"> {{ $i + 1 }} </th>
                                        <td>
                                            <textarea type="text" class="form-control input_kompetensi"
                                                name="kompetensi[]"
                                                style="height: 40px;">{{ $target->target_pembelajaran->rincian_bukti[$i]->rincian_bukti}}</textarea>
                                            <div class="invalid-feedback d-none invalid_kompetensi"
                                                style="margin-left: 41px;">
                                                Kompetensi inti tidak boleh kosong
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger ml-4 removebtn_multiple_kompetensi"><i
                                                    class="fas fa-times"></i></button>
                                        </td>
                                        </tr>
                                        @endfor

                                        @endif
                            </tbody>
                        </table>

                        {{-- <div class="form-group fields_multiple_bukti">
                            <label>Rincian Bukti</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control col-10 input_bukti" name="bukti[]">
                                <button class="btn btn-success ml-4 addbtn_multiple_bukti">Fields <i
                                        class="fas fa-plus"></i></button>
                                <div class="invalid-feedback d-none invalid_bukti">
                                    Rincian bukti boleh kosong
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card-body">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary button" id="button">Submit</button>
                        <a href="{{ route('admin.Lembar-kerja-1.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
            {{-- buktisiswa --}}
        </form>
    </div>
</div>


@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // multiple input mapel
    $(document).ready(function () {

        $('#guru').select2();
        $('#jurusan').select2();
        id_jurusan = $('#jurusan').data('id');
        $('#jurusan').val(id_jurusan).trigger('change');

        // select();
        multiple_input_mapel();
        multiple_input_kkid();
        multiple_input_bukti_siswa();
        multiple_input_kompetensi();
        multiple_semester_ganjil();
        multiple_semester_genap();


        //  function select() {
        //         id = $('.fields_multiple_semester_ganjil').data('target');
        //         $.ajax({
        //             url: '/admin/option/mapel/' + id + '/edit', // url
        //             type: 'get', // method
        //             success: function (response) {
        //                 console.log(response);
        //                 response.s_ganjil.forEach(element => {
        //                     $('.s_ganjil').append('<option value="' + element.id +
        //                         '"> KD ' + element.kd_pengetahuan + ' ' + element
        //                         .keterangan_pengetahuan +
        //                         ' & KD ' +
        //                         element.kd_ketrampilan + ' ' +
        //                         element.keterangan_ketrampilan +
        //                         ' </option>')
        //                 });
        //             }
        //         });
        //     };

        function multiple_input_mapel() {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".fields_multiple_mapel"); //Fields wrapper
            var add_button = $(".addbtn_multiple_maple"); //Add button ID

            row = $('#row_pen_mapel').data('id');
            console.log(row);
            if (row > 1) {
                var x = row; //initlal text box count
            } else {
                var x = 1;
            }
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<tr id="mapel ' + x + ' " data-id="mapel ' + x + ' ">' +
                        '<th scope="row"> ' + x + ' </th>' +
                        '<td>' +
                        '<textarea type="text" class="form-control input_target_mapel" data-input=" ' +
                        x + ' " name="target_mapel[]" style="height: 40px;"></textarea>' +
                        '<div class="invalid-feedback d-none invalid_target_mapel">' +
                        'Target mapel tidak boleh kosong' +
                        '</div>' +
                        '</td>' +
                        '<td>' +
                        '<textarea type="text" class="form-control keterangan_target_mapel" name="keterangan_mapel[]" style="height: 40px;"></textarea>' +
                        '<div class="invalid-feedback d-none invalid_keterangan_target_mapel">' +
                        'Keteragan mapel tidak boleh kosong' +
                        '</div>' +
                        '</td>' +
                        '<td class="text-center">' +
                        '<button class="btn btn-danger removebtn_multiple_maple"><i class="fas fa-times"></i></button>' +
                        '</td>' +
                        '</tr>');
                }
            });

            $(wrapper).on("click", ".removebtn_multiple_maple", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('td').parent('tr').remove();
                x--;
            })
        }

        function multiple_input_kkid() {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".fields_multiple_kkid"); //Fields wrapper
            var add_button = $(".addbtn_multiple_kkid"); //Add button ID
            // row = $('#row_konpetensi').data('id');
            // console.log(row);
            // if (row > 1) {
            //      var x = row + 1; //initlal text box count
            // }else{
            //     var x = 1;
            // }
            row = $('#row_pen_kkid').data('id');
            console.log(row);
            if (row > 1) {
                var x = row; //initlal text box count
            } else {
                var x = 1;
            }

            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<tr id="kkid ' + x + ' " data-id="kkid ' + x + ' ">' +
                        '<th scope="row"> ' + x + ' </th>' +
                        '<td>' +
                        '<textarea type="text" class="form-control input_pencapaian_kkid" name="target_kkid[]" style="height: 40px;"></textarea>' +
                        '<div class="invalid-feedback d-none invalid_pencapaian_kkid">' +
                        'Target mapel KKID tidak boleh kosong' +
                        '</div>' +
                        '</td>' +
                        '<td>' +
                        '<textarea type="text" class="form-control keterangan_pencapaian_kkid" name="keterangan_kkid[]" style="height: 40px;"></textarea>' +
                        '<div class="invalid-feedback d-none invalid_keterangan_pencapaian_kkid">' +
                        'Keteragan KKID tidak boleh kosong' +
                        '</div>' +
                        '</td>' +
                        '<td class="text-center">' +
                        '<button class="btn btn-danger removebtn_multiple_kkid"><i class="fas fa-times"></i></button>' +
                        '</td>' +
                        '</tr>');
                }
            });
            $(wrapper).on("click", ".removebtn_multiple_kkid", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('td').parent('tr').remove();
                x--;
            })
        }

        function multiple_input_bukti_siswa() {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".fields_multiple_bukti"); //Fields wrapper
            var add_button = $(".addbtn_multiple_bukti"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<tr>' +
                        '<th scope="row">' + x + '</th>' +
                        '<td>' +
                        '<textarea type="text" class="form-control input_bukti" name="bukti[]" style="height: 40px;"></textarea>' +
                        '<div class="invalid-feedback d-none invalid_bukti" style="margin-left: 41px;">' +
                        'Rincian bukti tidak boleh kosong' +
                        '</div>' +
                        '</td>' +
                        '<td class="text-center">' +
                        '<button class="btn btn-danger removebtn_multiple_bukti"><i class="fas fa-times"></i></button>' +
                        '</td>' +
                        '</tr>');
                }
            });

            $(wrapper).on("click", ".removebtn_multiple_bukti", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('td').parent('tr').remove();
                x--;
            });
        }

        function multiple_input_kompetensi() {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".fields_multiple_kompetensi"); //Fields wrapper
            var add_button = $(".addbtn_multiple_kompetensi"); //Add button ID

            row = $('#row_konpetensi').data('id');
            console.log(row);
            if (row > 1) {
                var x = row; //initlal text box count
            } else {
                var x = 1;
            }


            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<tr>' +
                        '<th scope="row">' + x + '</th>' +
                        '<td>' +
                        '<textarea type="text" class="form-control input_kompetensi" name="kompetensi[]" style="height: 40px;"></textarea>' +
                        '<div class="invalid-feedback d-none invalid_kompetensi" style="margin-left: 41px;">' +
                        'Kompetensi inti tidak boleh kosong' +
                        '</div>' +
                        '</td>' +
                        '<td class="text-center">' +
                        '<button class="btn btn-danger ml-4 removebtn_multiple_kompetensi"><i class="fas fa-times"></i></button>' +
                        '</td>' +
                        '</tr>');
                    // '<div class="input-group mt-3">' +
                    // '<input type="text" class="form-control col-8 input_kompetensi" style="margin-left: 41px;" name="kompetensi[]">' +
                    // '<button class="btn btn-danger ml-4 removebtn_multiple_kompetensi"><i class="fas fa-times"></i></button>' +
                    // '<div class="invalid-feedback d-none invalid_kompetensi" style="margin-left: 41px;">' +
                    // 'Kompetensi inti boleh kosong' +
                    // '</div>' +
                    // '</div>'
                }
            });

            $(wrapper).on("click", ".removebtn_multiple_kompetensi", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('td').parent('tr').remove();
                x--;
            });
        }

        // bidang + status
        function multiple_semester_ganjil() {
            incrmeent = $('#index_ganjil').data('key'); // ngambil key dari loop foreach
            console.log(incrmeent);
            counter = incrmeent;
            $('.addbtn_multiple_semester_ganjil').click(function (e) {
                e.preventDefault();
                counter++;
                $('.fields_multiple_semester_ganjil').append(
                    ' <tr>' +
                    ' <td scope="row">'+counter+'</td>' +
                    '<td>' +
                    '<select name="kd_ganjil[]" id="" style="width:100%;heigth:100%" class="form-control s_ganjil">' +
                    '</select>' +
                    '<div class="invalid-feedback d-none invalid_kompetensi" tyle="margin-left: 41px;">Kompetensi inti tidak boleh kosong</div>' +
                    '</td>' +
                    '<td class="text-center">' +
                    '<button class="btn btn-danger x_s_ganjil" id="x_s_ganjil">X</button>' +
                    '</td>' +
                    '</tr>')
                select();
                //apus apeend dalem

            });

            $('.fields_multiple_semester_ganjil').on('click', '.x_s_ganjil', function (e) {
                e.preventDefault();
                console.log('clicked');
                $(this).parent('td').parent('tr').remove();
                counter--;
            })

            $('.x_s_ganjil').click(function (e) {
                e.preventDefault();
                console.log('clicked');
                $(this).parent('td').parent('tr').remove();
                counter--;
            })

            function select() {
                id = $('.fields_multiple_semester_ganjil').data('target');
                $.ajax({
                    url: '/admin/option/mapel/' + id + '/edit', // url
                    type: 'get', // method
                    success: function (response) {
                        console.log(response.mapel);
                        response.s_ganjil.forEach(element => {
                            $('.s_ganjil').last().append('<option value="' + element.id +
                                '"> KD ' + element.kd_pengetahuan + ' ' + element
                                .keterangan_pengetahuan +
                                ' & KD ' +
                                element.kd_ketrampilan + ' ' +
                                element.keterangan_ketrampilan +
                                ' </option>')
                        });
                    }
                });
            };
        }

        function multiple_semester_genap() {
            counter = 0;
            $('.addbtn_multiple_semester_genap').click(function (e) {
                e.preventDefault();
                counter++;
                $('.fields_multiple_semester_genap').append(
                    ' <tr>' +
                    ' <td scope="row">1</td>' +
                    '<td>' +
                    '<select name="kd_genap[]" id="" style="width:100%;heigth:100%" class="form-control s_genap">' +
                    '</select>' +
                    '<div class="invalid-feedback d-none invalid_kompetensi" tyle="margin-left: 41px;">Kompetensi inti tidak boleh kosong</div>' +
                    '</td>' +
                    '<td class="text-center">' +
                    '<button class="btn btn-danger x_s_genap" id="x_s_genap">X</button>' +
                    '</td>' +
                    '</tr>')
                select();
                //apus apeend dalem

            });

            $('.fields_multiple_semester_genap').on('click', '.x_s_genap', function (e) {
                e.preventDefault();
                console.log('clicked');
                $(this).parent('td').parent('tr').remove();
                counter--;
            })

            $('.x_s_genap').click(function (e) {
                e.preventDefault();
                console.log('clicked');
                $(this).parent('td').parent('tr').remove();
                counter--;
            })

            function select() {
                id = $('.fields_multiple_semester_genap').data('target');
                $.ajax({
                    url: '/admin/option/mapel/' + id + '/edit', // url
                    type: 'get', // method
                    success: function (response) {
                        console.log(response.mapel);
                        response.s_genap.forEach(element => {
                            $('.s_genap').last().append('<option value="' + element.id + '"> KD ' +
                                element.kd_pengetahuan + ' ' + element
                                .keterangan_pengetahuan +
                                ' & KD ' +
                                element.kd_ketrampilan + ' ' +
                                element.keterangan_ketrampilan +
                                ' </option>')
                        });
                    }
                });
            };
        }


        // button submit
        $('#button').click(function (e) {
            e.preventDefault();
            guru = $('#id_guru').val();
            jurusan = $('#jurusan').val();
            mapel = $('#mapel').val(); // ambil value dari mapel
            // ambil collection input by id ( hasilnya collection jadi tinggal di loop )
            target_mapel = document.querySelectorAll(".input_target_mapel");
            invalid_target_mapel = document.querySelectorAll(".invalid_target_mapel"); // validasi
            keterangan_target_mapel = document.querySelectorAll(".keterangan_target_mapel");
            invalid_keterangan_target_mapel = document.querySelectorAll(
                ".invalid_keterangan_target_mapel"); // validasi
            pencapaian_kkid = document.querySelectorAll(".input_pencapaian_kkid");
            invalid_pencapaian_kkid = document.querySelectorAll(".invalid_pencapaian_kkid"); // validasi
            keterangan_pencapaian_kkid = document.querySelectorAll(".keterangan_pencapaian_kkid");
            invalid_keterangan_pencapaian_kkid = document.querySelectorAll(
                ".invalid_keterangan_pencapaian_kkid"); // validasi
            bukti = document.querySelectorAll(".input_bukti");
            invalid_bukti = document.querySelectorAll(".invalid_bukti"); // validasi
            kompetensi = document.querySelectorAll(".input_kompetensi");
            invalid_kompetensi = document.querySelectorAll(".invalid_kompetensi"); // validasi

            // jika function validasinya 0 atau undified maka akan ke submit dan jika tidak maka akan valdasi ( manggil fucntion nya )
            if (!validasi_jurusan() && !validasi_target_mapeL() && !
                validasi_keterangan_target_mapel() && !validasi_pencapaian_kkid() && !
                validasi_keteranga_pencapaian_kkid() && !validasi_rincian_butki() && !
                validasi_kompetensi() && !validasi_mapel()) {
                $('#form').submit();
            } else {
                validasi_jurusan()
                validasi_target_mapeL();
                validasi_keterangan_target_mapel();
                validasi_pencapaian_kkid();
                validasi_keteranga_pencapaian_kkid();
                validasi_rincian_butki();
                validasi_kompetensi();
                validasi_mapel();
            };

            // function validasi_guru() {
            //     // buat ngidung ada berapa yang kena validasi
            //     count_erorr = [];
            //     if (!guru) {
            //         $('#id_guru').addClass('is-invalid'); // Ad class is-invalid
            //         $('#id_guru').closest('div').find('.invalid-feedback').removeClass(
            //             'd-none'
            //         ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
            //         count_erorr += 1
            //     } else {
            //         $('#id_guru').removeClass('is-invalid').removeClass('is-invalid');
            //         $('#id_guru').closest('div').find('.invalid-feedback').addClass(
            //             'd-none'
            //         ); // cari div terdekat dan cari class nya find = cari lalu add class d-none
            //     }
            //     // return panjang dari collection atau array
            //     return count_erorr.length;
            // }

            function validasi_mapel() {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                if (!mapel) {
                    $('#mapel').addClass('is-invalid'); // Ad class is-invalid
                    $('#mapel').closest('div').find('.invalid-feedback').removeClass(
                        'd-none'
                    ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    count_erorr += 1
                } else {
                    $('#mapel').removeClass('is-invalid').removeClass('is-invalid');
                    $('#mapel').closest('div').find('.invalid-feedback').addClass(
                        'd-none'
                    ); // cari div terdekat dan cari class nya find = cari lalu add class d-none
                }
                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_jurusan() {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                if (!jurusan) {
                    $('#jurusan').addClass('is-invalid'); // Ad class is-invalid
                    $('#jurusan').closest('div').find('.invalid-feedback').removeClass(
                        'd-none'
                    ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    count_erorr += 1
                } else {
                    $('#jurusan').removeClass('is-invalid').removeClass('is-invalid');
                    $('#jurusan').closest('div').find('.invalid-feedback').addClass(
                        'd-none'
                    ); // cari div terdekat dan cari class nya find = cari lalu add class d-none
                }
                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_target_mapeL() {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // loop target mapel untuk mencari isi dari collection nya
                // target mapel
                target_mapel.forEach(element => {
                    // jika elemnt nya koong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid'); // Ad class is-invalid
                        $(element).closest('div').find('.invalid_target_mapel').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid').removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_target_mapel').addClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu add class d-none
                    }
                });

                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_keterangan_target_mapel(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // keterangan mapel
                keterangan_target_mapel.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_keterangan_target_mapel')
                            .removeClass(
                                'd-none'
                            ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_keterangan_target_mapel')
                            .addClass(
                                'd-none'
                            ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_pencapaian_kkid(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // target kkid
                pencapaian_kkid.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_pencapaian_kkid').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_pencapaian_kkid').addClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_keteranga_pencapaian_kkid(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // keterangan kkid
                keterangan_pencapaian_kkid.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_keterangan_pencapaian_kkid')
                            .removeClass(
                                'd-none'
                            ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_keterangan_pencapaian_kkid')
                            .addClass(
                                'd-none'
                            ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_rincian_butki(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // bukti
                bukti.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_bukti').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_bukti').addClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }

            function validasi_kompetensi(params) {
                // buat ngidung ada berapa yang kena validasi
                count_erorr = [];
                // kompetensi
                kompetensi.forEach(element => {
                    // jika elemnt nya kosong
                    if (!element.value) {
                        // lalu add class
                        $(element).addClass('is-invalid');
                        $(element).closest('div').find('.invalid_kompetensi').removeClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                        // jika koosng maka masukin array nya 1 ( buat di itung panjang array nya )
                        count_erorr += 1
                    } else {
                        $(element).removeClass('is-invalid');
                        $(element).closest('div').find('.invalid_kompetensi').addClass(
                            'd-none'
                        ); // cari div terdekat dan cari class nya find = cari lalu REMOVE class d-none
                    }
                });
                // return panjang dari collection atau array
                return count_erorr.length;
            }



            // kalau gasuka make loop foreach bis amake for speerti ini
            // for ( i = 0; i < target_mapel.i; i++) {
            //     $(target_mapel[index]).addClass('is-invalid');
            // }
        });
    });

</script>
@endpush
