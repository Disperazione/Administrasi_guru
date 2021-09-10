$(document).ready(function () {
    root = window.location.protocol + '//' + window.location.host;
    var filter = $('#search').val();
    role = $('#data').data('role');

    // untuk column nya
    function column(role) {
        switch (role) {
            case 'guru':
                return [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'mapel',
                        name: 'mapel'
                    },
                    {
                        data: 'bidang_studi',
                        name: 'bidang_studi'
                    },
                    {
                        data: 'kompetensi_keahlian',
                        name: 'kompetensi_keahlian'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    // {data: 'btn_upload', name:'btn_upload'},
                    // { data: 'kelas', name:'kelas'},
                    // { data: 'jam_pelajaran', name:'jam_pelajaran'},
                    // { data: 'total_waktu_jam_pelajaran',name:'total_waktu_jam_pelajaran'},
                    {
                        data: 'action',
                        name: 'action'
                    }
                ];
                break;
        }
    }

    var table = $('#table-1').DataTable({
        dom: "<'row'<'col-sm-12 col-md-6 btn-table'><'col-sm-12 col-md-6  pdf-button'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-3'l><'col-sm-4'p>>",
        bLengthChange: true,
        ordering: false,
        info: true,
        filtering: true,
        searching: true,
        serverside: true,
        processing: true,
        serverSide: true,
        "responsive": true,
        "autoWidth": false,
        ajax: {
            url: root + "/admin/Lembar-kerja-1",
            type: "get",
        },
        columns: column(role),
    });
    $('.btn-table').append('<a href="' + root + '/admin/Lembar-kerja-1/create" class="btn btn-primary">Tambah Data +</a>');
    $('#table-1_filter').prepend('<a href="' + root + '/admin/export/excel/kompetensi_dasar"class="btn btn-success mr-3  ml-2"> Excel <i class="fas fa-cloud-download-alt"></i></button></a>');
    $('body').on('click', '#hapus', function () {
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
                    url: root + "/admin/Lembar-kerja-1/" + id,
                    type: "DELETE",
                    data: '',
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
    // upload file
    $('body').on('click', '#upload', function (e) {
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
                    url: root + "/admin/upload/cloud",
                    type: "POST",
                    data: {
                        name: 'LK.01 Target Pembelajaran',
                        id_bidang: id,
                        jenis: 'LK1',
                        url: '/admin/lk_1/' + id + '/pdf'
                    },
                    success: function (response) {
                            table.draw();
                            Swal.fire(
                                'success',
                                'Data anda berhasil di upload.',
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

    // view komentar
    $('body').on('click', '.badge-tolak', function () {
        id = $(this).data('id');
        $('.id_cloud').val(id);

        $.ajax({
            url: '/admin/komentar/view/' + id,
            type: 'GET',
            success: function (response) {
                var komen = response.komentar;
                $('.field-lk-1').empty();
                for (let i = 0; i < komen.length; i++) {
                    $('.field-lk-1').append('<li class="media">' +
                        '<div class="media-body">' +
                        '<div class="media-right"><div class="text-danger">Ditolak</div></div>' +
                        '<div class="media-title mb-1">Admin (' + komen[i].guru.name + ')</div>' +
                        '<div class="text-time">' + response.waktu[i] + '</div>' +
                        '<div class="media-description text-muted">' + komen[i].comment + '</div>' +
                        '<div class="media-links">' +
                        ' </div>' +
                        '</li>');
                }

            },
            fail: function (response) {
                console.log(response);
            }
        });
    });

})
