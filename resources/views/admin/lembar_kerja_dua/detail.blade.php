@extends('layout.master')
@push('css')

@endpush
@section('title', 'SIFOS | Lembar Kerja 2')
@section('judul','Detail LK-2')
@section('breadcrump')
    {{-- breadcrump here --}}
@endsection
@section('main')
    {{-- content here --}}
    <div class="row">
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="card card-primary">
            <div class="card-header">
              <h4>Lembar Kerja 2</h4>
            </div>
              <div class="card-body">
                <div class="form-group col-12">
                    <label>Bidang Study</label>
                    <input type="text" class="form-control" value="" placeholder="32323" disabled>
                  </div>
                  <div class="form-group col-12">
                    <label>Kompetensi Keahlian</label>
                    <input type="text" class="form-control" value="" placeholder="32323" disabled>
                  </div>
                  <div class="form-group col-12">
                    <label>Jam Pelajaran</label>
                    <input type="text" class="form-control" value="" placeholder="32323" disabled>
                  </div>
                  <div class="form-group col-12">
                    <label>Total Waktu</label>
                    <input type="text" class="form-control" value="" placeholder="32323" disabled>
                  </div>
              </div>
          </div>
          
        </div>
        <div class="col-12 col-sm-6 col-lg-8">
          <div class="card card-info">
            <div class="card-header">
              <h4>Table Kompetensi Dasar</h4>
              <div class="card-header-action">
                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
              </div>
            </div>
        <div class="collapse show" id="mycard-collapse">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                      <tr class="text-center">
                        <th>NO</th>
                        <th>Kompetensi Dasar</th>
                        <th>Model pembelajaran</th>
                        <th>Metode Pembelajaran</th>
                        <th>Deskripsi Kegiatan</th>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Irwansyah Saputra</td>
                        <td>2017-01-09</td>
                        <td><div class="badge badge-success">Active</div></td>
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
