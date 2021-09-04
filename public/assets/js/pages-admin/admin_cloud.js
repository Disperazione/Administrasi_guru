$(document).ready(function (params) {
id = $('#id_guru').data('id');
root = window.location.protocol + '//' + window.location.host;
var table = $('#table-1').DataTable({
    serverside: true,
    processing: true,
    ajax: {
        url: root+'/admin/cloud_admin/'+id,
        type: 'get'
    },
    columns: [
        {name: 'DT_RowIndex',data:'DT_RowIndex'},
        {name: 'judul',data:'judul'},
        {name: 'mapel',data:'mapel'},
        {name:'kompetensi_keahlian', data:'kompetensi_keahlian'},
        {name: 'status',data:'status'},
        {name: 'persejutuan',data:'persejutuan'},
        {name: 'action',data:'action'},
    ],
});

$('body').on('click','#acc',function() {
    Swal.fire({
    title: 'Apa anda yakin?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Ya',
    cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.value) {
            id = $(this).data('id');
            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/admin/cloud_admin/"+ id,
                    type: "put",
                    data:'',
                    success: function (data) {
                        table.ajax.reload(); // w make ajax reload soalnya table draw nya erorr atau make parameter
                        Swal.fire(
                            'success',
                            'Berhasil di acc.',
                            'success'
                        )
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {}
    })
})
})

