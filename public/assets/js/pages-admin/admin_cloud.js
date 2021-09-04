$(document).ready(function (params) {
id = $('#id_guru').data('id');

var table = $('#table-1').DataTable({
    serverside: true,
    processing: true,
    ajax: {
        url: '/admin/cloud_admin/'+id,
        methods: 'get'
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

$('body').on('click','#acc',function(e) {
    e.preventDefault();
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
})
})

