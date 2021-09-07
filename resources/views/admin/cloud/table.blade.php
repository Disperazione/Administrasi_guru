@extends('layout.master')
@push('css')
<style>
    .modal-backdrop{
        z-index: 0;
    }
    .modal-backdrop.show{
        opacity: 0;
    }
</style>
@endpush
@section('title', 'SIFOS | Cloud')
@section('judul','Cloud Guru')
@section('breadcrump')
<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
<div class="breadcrumb-item">Cloud {{ Auth::user()->guru->name }}</div>
@endsection
@section('main')
<span id="id_guru" data-id="{{ $guru->id }}"></span>
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
                    <th>action</th>
                    <th>Persetujuan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                {{-- <tr>
                <td>1</td>
                <td>hihi</td>
                <td>MTK</td>
                <td>mtk</td>
                <td><a href="#" class="badge badge-dark">Dark</a></td>
                <td>
                    <a href="{{ route('admin.komen.tambah') }}" class="btn btn-icon btn-danger"><i
                    class="fas fa-times"></i></a>
                <a href="#" class="btn btn-icon btn-success"><i class="fas fa-check"></i></a>
                </td>
                <td></td>
                </tr> --}}
            </tbody>
        </table>
    </div>

</div>

<div class="card pt-3">
    <div class="card-body">
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Mapel</th>
                    <th>Kompetensi keahlian</th>
                    <th>action</th>
                    <th>Persetujuan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                {{-- <tr>
                <td>1</td>
                <td>hihi</td>
                <td>MTK</td>
                <td>mtk</td>
                <td><a href="#" class="badge badge-dark">Dark</a></td>
                <td>
                    <a href="" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                    <a href="#" class="btn btn-icon btn-success"><i class="fas fa-check"></i></a>
                </td>
                <td></td>
            </tr> --}}
            </tbody>
        </table>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="tolak" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Berikan Komentar</h5>
            <input type="text" class="d-none" id="id_cloud" name="id_cloud">
            </div>
            <div class="modal-body">
                <form id="form" method="POST">
                    @method('patch')
                    @csrf
                    <div class="card-body">
                    <textarea id="basic-example" id="komen" name="komen">
                    </textarea>
                    </div>
            </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="buttom" id="btn-submit-komen" class="btn btn-primary">Save changes</button>
            </div>

        </div>
    </div>
</div>


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
            'bold italic backcolor |     alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
    $(document).ready(function () {
        $('body').on('click','.tolak-button',function () { // mengclick .tolak-button yang di element body
            id_cloud = $(this).data('id_cloud');
            console.log(id_cloud);
            $('#id_cloud').val(id_cloud);
        })

        $('#btn-submit-komen').click(function (e) {
            console.log('clicked');
            id_cloud =   $('#id_cloud').val();
            console.log(id_cloud);
            tinyMCE.triggerSave();
            form = tinyMCE.activeEditor.getContent(); // mengambil value text editor
            console.log(form);
            $.ajax({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/admin/komentar/'+id_cloud,
                type: 'PATCH',
                data: {"komen":form},
                success: function (response) {
                if (response.status) {
                    window.location.reload();
                    Swal.fire(
                            'success',
                            'Berhasil memasukan komentar.',
                            'success'
                        )
                }
                },
                fail: function (fail) {

                }
            });
        })
    })
</script>
<script src="{{ asset('assets/js/pages-admin/admin_cloud.js') }}"></script>
@endpush
