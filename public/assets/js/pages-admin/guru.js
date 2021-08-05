$(document).ready( function () {
    root = window.location.protocol + '//' + window.location.host;
    var filter = $('#search').val();
    console.log('filter');
    var table = $('#table1').DataTable({
        dom:
        "<'row'<'ol-sm-12 col-md-6 btn-table'><'col-sm-12 col-md-6  pdf-button'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        bLengthChange: false,
        ordering:false,
        info: true,
        filtering:false,
        searching: true,
        serverside: true,
        processing: true,
        serverSide: true,
        "responsive": true,
        "autoWidth": false,
        ajax:{
        url: root + "/admin/guru/index/",
        type: "get",
        },
        columns:[
        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
        { data: 'nik', name:'nik'},
        { data: 'name', name:'name'},
        { data: 'jabatan', name:'jabatan'},
        { data: 'jurusan',name:'jurusan'},
        { data: 'no_telp',name:'no_telp'},
        { data: 'action',name:'action'}
        ],
    });
    // $('.btn-table').append(
    //     '<a href="'+root+'/admin/guru/tambah"class="btn btn-primary "> Tambah Data <i class="fas fa-plus"></i></button></a>'
    // );
    // $('#table1_filter').prepend('<a href="'+root+'/admin/export/excel/guru"class="btn btn-success mr-3  ml-2"> Excel <i class="fas fa-cloud-download-alt"></i></button></a>'
    // );

// search engine
$("#search").keyup(function () {
    table.search( this.value ).draw();
})

    // hapus data
$('body').on('click','#hapus', function () {
// sweet alert
    Swal.fire({
    title: 'Apa anda yakin?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Hapus',
    cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
            id = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                    url: root+"/admin/guru/delete/"+ id,
                    type: "DELETE",
                    data:'',
                    success: function (data) {
                        console.log(data);
                        table.draw();
                        Swal.fire(
                            'success',
                            'Data anda berhasil di hapus.',
                            'success'
                        )
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {}
    })
});
});
