$(document).ready(function () {
    // logout
    $('#logout').click(function (e) {
        e.preventDefault();
        Swal.fire({
            icon: 'warning',
            title: 'Apakah anda ingin logout?',
            showCancelButton: true,
            confirmButtonText: `Ya`,
            cancelButtonText: `Tidak`,
            timer: 1500,
        }).then((result) => {
            if (result.isConfirmed) {
                //window.location.href = '/logout';
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/logout',
                    type: 'POST',
                    data: '',
                    success : function(){
                        window.location.href = '/';
                    },
                    fail : function (param) {
                        console.log(param);
                    }
                })
            } else if (result.isDenied) {

            }
        })
    });

})
