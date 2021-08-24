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
                                    value="{{ $bidang_main->lembar_kerja->Lk_1 }}">
                                <div class="invalid-feedback" c>
                                    Bidang Studi tidak boleh koosng
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-left"></i>
                                    </div>
                                </div>
                                <select class="form-control" name="id_jurusan" id="jurusan" readonly>
                                    <option value="">Lihat Lebih Lanjut</option>
                                    @foreach (Auth::user()->guru->jurusan as $item)
                                    <option value="{{ $item->id }}"
                                        {{ (old('id_jurusan',$bidang_main->jurusan->id) == $item->id) ? 'selected' : '' }}>
                                        {{ $item->singkatan_jurusan }}</option>
                                    @endforeach

                                </select>
                                <div class="invalid-feedback">
                                    Jurusan tidak boleh koosng
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
                                <select class="form-control" name="mapel" id="mapel" readonly>
                                    <option value="">Lihat Lebih Lanjut</option>
                                    @foreach(Auth::user()->guru->bidang_keahlian()->where('id_jurusan',$bidang_main->id_jurusan)->get()
                                    as $item)
                                    <option value="{{ $item->id }}" {{ ($item->id == $bidang_main->id) ? 'selected' : '' }}>
                                        {{ $item->mapel }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Mapel tidak boleh koosng
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
                                    value="{{ $bidang_main->kelas }}">
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
                                    value="{{ $bidang_main->jam_pelajaran }}">
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
                                    value="{{ $bidang_main->total_waktu_jam_pelajaran }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- datatenagapendidik --}}


            {{-- card --}}
            <div class="fields_indikmapel">
                <div class="card">
                    <div class="card-header">
                        <h4>Indikator Ketercapaian Mata Pelajaran</h4>
                        {{-- <h4>Kompetensi Dasar :</h4>
                        <select id="" class="form-select form-control ml-2" style="width: 130px;">
                            <option>Ganjil</option>
                            <option>Genap</option>
                        </select> --}}
                    </div>
                    @for ($i = 0 ; $i < count($bidang_table); $i++)

                      <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                                <input type="text" value="{{ $bidang_table[$i]->id }}" name="id_kd[]" hidden>
                            <div class="form-group col-sm-2">
                                <label>No KD.</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="" class="form-control" disabled value="{{ $bidang_table[$i]->kd_pengetahuan }}">
                                </div>
                            </div>
                            <div class="form-group col-sm-5">
                                <label>Kompetensi Dasar</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="" class="form-control" name="" id="" disabled value="{{ $bidang_table[$i]->keterangan_pengetahuan }}">
                                </div>
                            </div>
                            <div class="form-group col-sm-5">
                                <label>Modul</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <textarea type="text" id="" class="form-control" name="modul[]" id=""
                                        style="height: 90px;">{{ $bidang_table[$i]->materi_bahan_ajar->modul }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-2">
                                <label>No KD.</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="" class="form-control" disabled value="{{ $bidang_table[$i]->kd_ketrampilan }}">
                                </div>
                            </div>
                            <div class="form-group col-sm-5">
                                <label>Kompetensi Dasar</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                       <input type="text" id="" class="form-control" name="" id="" disabled value="{{ $bidang_table[$i]->keterangan_ketrampilan }}">
                                </div>
                            </div>
                            <div class="form-group col-sm-5">
                                <label>Video Pembelajaran</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <textarea type="text" id="" class="form-control" name="vidio_pel[]" id=""
                                        style="height: 90px;">{{ $bidang_table[$i]->materi_bahan_ajar->vidio_pembelajaran }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-2">
                                <div class="" style="margin-top: 32px;">

                                    <button class="btn btn-danger removebtn_indikmapel"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="form-group col-sm-5">
                                <label>Deskripsi Bahan Ajar</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <textarea type="text" id="" class="form-control" name="deskripsi_bahan[]" id=""
                                        style="height: 90px;">{{ $bidang_table[$i]->materi_bahan_ajar->deskripsi_bahan_ajar }}</textarea>
                                </div>
                            </div>
                            <div class="form-group col-sm-5">
                                <label>Keterangan.</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-sticky-note"></i>
                                        </div>
                                    </div>
                                    <textarea type="text" id="" class="form-control" name="keterangan[]" id=""
                                        style="height: 90px;">{{ $bidang_table[$i]->materi_bahan_ajar->keterangan }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    @endfor

                </div>
            </div>
            {{-- card --}}


            {{--  --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="modal-footer">
                            <button class="btn btn-success addbtn_indikmapel">Fields <i class="fas fa-plus"></i></button>
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
<script>
    $(document).ready(function () {
          // bidang + status
        // $('#mapel').change(function () {
            id = $('#mapel').val(); // mengambil value
            $('#total_jp').val('')
            $('#jp').val('');
            $('#kelas').val('');
            $.ajax({
                url: '/admin/lk4/option/mapel/' + id , // url
                type: 'get', // method
                success: function (response) {
                    // $('.fields_multiple_semester_ganjil').empty();
                    // $('.fields_multiple_semester_genap').empty();
                    console.log(response.mapel);
                    $('#total_jp').val(response.mapel.total_waktu_jam_pelajaran)
                    $('#jp').val(response.mapel.jam_pelajaran);
                    $('#kelas').val(response.mapel.kelas);
                    console.log(response.kd);

                    count = 0;
                    $(".addbtn_indikmapel").click(function (e) {
                        e.preventDefault();
                        // for (let i = 0; i < count; i++) {
                            $('.fields_indikmapel').append(
                                '<div class="card">' +
                                '<input value="'+ response.kd[count].id +'" name="id_kd[]" hidden>'+
                                '<div class="card-header">' +
                                '<h4>Indikator Ketercapaian Mata Pelajaran #</h4>' +
                                '</div>' +
                                '<div class="card-body">' +
                                '<div class="row">' +
                                '<div class="form-group col-sm-2">' +
                                '<label>No KD.</label>' +
                                '<div class="input-group">' +
                                '<div class="input-group-prepend">' +
                                '<div class="input-group-text">' +
                                '<i class="far fa-sticky-note"></i>' +
                                '</div>' +
                                '</div>' +
                                '<input type="text" id="" class="form-control" disabled value="' +
                                response.kd[count].kd_pengetahuan + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="form-group col-sm-5">' +
                                '<label>Kompetensi Dasar</label>' +
                                '<div class="input-group">' +
                                '<div class="input-group-prepend">' +
                                '<div class="input-group-text">' +
                                '<i class="far fa-sticky-note"></i>' +
                                '</div>' +
                                '</div>' +
                                '<input type="text" id="" class="form-control" name="" id="" disabled value="'+  response.kd[count].keterangan_pengetahuan +'">' +
                                '</div>' +
                                '</div>' +
                                '<div class="form-group col-sm-5">' +
                                '<label>Modul</label>' +
                                '<div class="input-group">' +
                                '<div class="input-group-prepend">' +
                                '<div class="input-group-text">' +
                                '<i class="far fa-sticky-note"></i>' +
                                '</div>' +
                                '</div>' +
                                '<textarea type="text" id="" class="form-control" name="modul[]" id="" style="height: 90px;"></textarea>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '<div class="row">' +
                                '<div class="form-group col-sm-2">' +
                                '<label>No KD.</label>' +
                                '<div class="input-group">' +
                                '<div class="input-group-prepend">' +
                                '<div class="input-group-text">' +
                                '<i class="far fa-sticky-note"></i>' +
                                '</div>' +
                                '</div>' +
                                '<input type="text" id="" class="form-control" disabled value="' +
                                response.kd[count].kd_ketrampilan + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="form-group col-sm-5">' +
                                '<label>Kompetensi Dasar</label>' +
                                '<div class="input-group">' +
                                '<div class="input-group-prepend">' +
                                '<div class="input-group-text">' +
                                '<i class="far fa-sticky-note"></i>' +
                                '</div>' +
                                '</div>' +
                                '<input type="text" id="" class="form-control" name="" id="" disabled value="'+  response.kd[count].keterangan_ketrampilan +'">' +
                                '</div>' +
                                '</div>' +
                                '<div class="form-group col-sm-5">' +
                                '<label>Video Pembelajaran</label>' +
                                '<div class="input-group">' +
                                '<div class="input-group-prepend">' +
                                '<div class="input-group-text">' +
                                '<i class="far fa-sticky-note"></i>' +
                                '</div>' +
                                '</div>' +
                                '<textarea type="text" id="" class="form-control" name="vidio_pel[]" id="" style="height: 90px;"></textarea>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '<div class="row">' +
                                '<div class="form-group col-sm-2">' +
                                '<div class="" style="margin-top: 32px;">' +
                                '<button class="btn btn-danger removebtn_indikmapel"><i class="fas fa-times"></i></button>' +
                                '</div>' +
                                '</div>' +
                                '<div class="form-group col-sm-5">' +
                                '<label>Deskripsi Bahan Ajar</label>' +
                                '<div class="input-group">' +
                                '<div class="input-group-prepend">' +
                                '<div class="input-group-text">' +
                                '<i class="far fa-sticky-note"></i>' +
                                '</div>' +
                                '</div>' +
                                '<textarea type="text" id="" class="form-control" name="deskripsi_bahan[]" id="" style="height: 90px;"></textarea>' +
                                '</div>' +
                                '</div>' +
                                '<div class="form-group col-sm-5">' +
                                '<label>Keterangan.</label>' +
                                '<div class="input-group">' +
                                '<div class="input-group-prepend">' +
                                '<div class="input-group-text">' +
                                '<i class="far fa-sticky-note"></i>' +
                                '</div>' +
                                '</div>' +
                                '<textarea type="text" id="" class="form-control" name="keterangan[]" id="" style="height: 90px;"></textarea>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>');
                        // }
                        count++
                    })

                    $('.fields_indikmapel').on("click", ".removebtn_indikmapel", function (
                        e) { //user click on remove text
                        e.preventDefault();
                        $(this).parent('div').parent('div').parent('div').parent(
                            'div').parent('div').remove();
                            count--; // 1 - i
                    })
                    // });

                },
                fail: function (rsponse) {

                }
            // });
        });
    })
</script>
@endpush
