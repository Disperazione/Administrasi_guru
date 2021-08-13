$(document).ready(function () {
    root = window.location.protocol + '//' + window.location.host;
    var filter = $('#search').val();
    role = $('#data').data('role');

    // untuk column nya
    function column(role)
    {
        switch (role) {
        case 'guru':
            return [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    { data: 'bidang_studi', name:'bidang_studi'},
                    { data: 'kompetensi_keahlian', name:'kompetensi_keahlian'},
                    { data: 'kelas', name:'kelas'},
                    { data: 'jam_pelajaran', name:'jam_pelajaran'},
                    { data: 'mapel',name:'mapel'},
                    { data: 'total_waktu_jam_pelajaran',name:'total_waktu_jam_pelajaran'},
                    { data: 'action',name:'action'}
                ];
            break;
        case 'admin':
                return [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data:'guru', name: 'guru'},
                        { data: 'bidang_studi', name:'bidang_studi'},
                        { data: 'kompetensi_keahlian', name:'kompetensi_keahlian'},
                        { data: 'kelas', name:'kelas'},
                        { data: 'jam_pelajaran', name:'jam_pelajaran'},
                        { data: 'mapel',name:'mapel'},
                        { data: 'total_waktu_jam_pelajaran',name:'total_waktu_jam_pelajaran'},
                        { data: 'action',name:'action'}
                    ];
                break;
        }
    }

    var table = $('#table-1').DataTable({
        dom:
       "<'row'<'col-sm-12 col-md-6 btn-table'><'col-sm-12 col-md-6  pdf-button'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-3'l><'col-sm-4'p>>",
        bLengthChange: true,
        ordering:false,
        info: true,
        filtering:true,
        searching: true,
        serverside: true,
        processing: true,
        serverSide: true,
        "responsive": true,
        "autoWidth": false,
        ajax:{
        url: root + "/admin/Lembar-kerja-1",
        type: "get",
        },
        columns:column(role),
    });
$('.btn-table').append('<a href="'+root+'/admin/Lembar-kerja-1/create" class="btn btn-primary">Tambah Data +</a>');
  $('#table-1_filter').prepend('<a href="'+root+'/admin/export/excel/kompetensi_dasar"class="btn btn-success mr-3  ml-2"> Excel <i class="fas fa-cloud-download-alt"></i></button></a>'
    );
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
                    url: root+"/admin/Lembar-kerja-1/"+ id,
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
})
