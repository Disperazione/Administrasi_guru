$(document).ready( function () {
    console.log('test');
    root = window.location.protocol + '//' + window.location.host;
    var filter = $('#search').val();
    console.log('filter');
    var table = $('#table-1').DataTable({
        dom:
        "<'row'<'ol-sm-12 col-md-6 btn-table'><'col-sm-12 col-md-6  pdf-button'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-3'l><'col-sm-4'p>>",
        bLengthChange: true,
        ordering:true,
        info: true,
        filtering:true,
        searching: true,
        serverside: true,
        processing: true,
        serverSide: true,
        "responsive": true,
        "autoWidth": false,
        ajax:{
        url: root + "/admin/guru/",
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
    $('.btn-table').append(
        '<a href="'+root+'/admin/guru/create"class="btn btn-primary "> Tambah Data <i class="fas fa-plus"></i></button></a>'
    );
    $('#table-1_filter').prepend('<a href="'+root+'/admin/guru/excel"class="btn btn-success mr-3  ml-2"> Excel <i class="fas fa-cloud-download-alt"></i></button></a>'
    );

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
                    url: root+"/admin/guru/"+ id,
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
