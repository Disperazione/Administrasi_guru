@extends('layout.master')
@push('css')

@endpush
@section('title', 'SIFOS | Lembar Kerja 1')
@section('judul','Detail LK-1')
@section('breadcrump')
    {{-- breadcrump here --}}
@endsection
@section('main')
    {{-- content here --}}

    <div class="col-12 col-md-6 ">
        <div class="card card-primary">
          <div class="card-header">
            <h4>Lembar Kerja 1</h4>
            <div class="card-header-action">
              <a data-collapse="#mycard-collapse" class="btn btn-icon btn-primary" href="#"><i class="fas fa-minus"></i></a>
            </div>
          </div>
    <div class="collapse show" id="mycard-collapse">
          <div class="card-body">
            <div class="form-group col-12">
              <label>Bidang Study</label>
              <input type="text" class="form-control" value="{{ $target->bidang_study }}" placeholder="32323" disabled>
            </div>
            <div class="form-group col-12">
              <label>Kompetensi Keahlian</label>
              <input type="text" class="form-control" value="{{ $target->kompetensi_keahlian }}" placeholder="32323" disabled>
            </div>
            <div class="form-group col-12">
              <label>Jam Pelajaran</label>
              <input type="text" class="form-control" value="{{ $target->jam_pelajaran }}" placeholder="32323" disabled>
            </div>
            <div class="form-group col-12">
              <label>Total Waktu</label>
              <input type="text" class="form-control" value="{{ $target->total_waktu_jam_pelajaran }}" placeholder="32323" disabled>
            </div>
          </div>
        </div>
      </div>
      </div>


    </div>

    <div class="col-12 col-md-12 ">
      <div class="card card-danger">
        <div class="card-header">
          <h4>Table Kompetensi Dasar</h4>
        </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-md">
                <tr class="text-center">
                  <th>KD</th>
                  <th>KD Pengetahuan</th>
                  <th>KD</th>
                  <th>KD Keterampilan</th>
                  <th>Materi Inti</th>
                  <th>Durasi</th>
                  <th>Pertemuan</th>
                  <th>Semester</th>
                  <th>Jumlah Jam</th>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Irwansyah Saputra</td>
                  <td>2017-01-09</td>
                  <td><div class="badge badge-success">Active</div></td>
                  <td>asdasdasda</td>
                  <td>asdasdasda</td>
                  <td>asdasdasda</td>
                  <td>asdasdasda</td>
                  <td>asdasdasda</td>
                </tr>
              </table>
            </div>
          </div>


      </div>
        </div>
      </div>
    </div>

@endsection
@push('js')
<script>
   $("[data-collapse]").each(function() {
    var me = $(this),
        target = me.data('collapse');

    me.click(function() {
      $(target).collapse('toggle');
      $(target).on('shown.bs.collapse', function(e) {
        e.stopPropagation();
        me.html('<i class="fas fa-minus"></i>');
      });
      $(target).on('hidden.bs.collapse', function(e) {
        e.stopPropagation();
        me.html('<i class="fas fa-plus"></i>');
      });
      return false;
    });
  });
</script>
@endpush
