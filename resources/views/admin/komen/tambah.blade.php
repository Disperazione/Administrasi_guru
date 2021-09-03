@extends('layout.master')
@push('css')

@endpush
@section('title', 'SIFOS | Komentar')
@section('judul','Komentar')
@section('breadcrump')
    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
    <div class="breadcrumb-item"></div>
@endsection
@section('main')
{{-- content here --}}
<div class="card">
    <div class="card-header">
        <h4>Berikan komentar</h4>
    </div>

    <form id="form" action="{{ route('admin.Lembar-kerja-2.store') }}" method="POST">
    <div class="card-body">
        <textarea id="basic-example">
   
        </textarea>

    </div>  
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
</div>

</form>

@endsection
@push('js')
<script>
    tinymce.init({
  selector: 'textarea#basic-example',
  height: 300,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
</script>
<script src="{{ asset('assets/js/pages-admin/') }}"></script>
@endpush
