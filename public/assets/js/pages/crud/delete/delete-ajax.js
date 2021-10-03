$(document).ready(function (){
    $('button.user_view_information').on('click', function (){
        value = $(this).parents('tr').data('value');
        $('#user_information').modal().show();
        $.ajax({
            url: 'http://localhost:8080',
            CORS: true,
            method: 'get',
            data:{id: value},
            success:function (data){
                $('#user_information_content').html(data);

            }
        });
    });

    $('button.delete').on('click', function (e) {
        var url = 'http://localhost:8080';
        var parent = $(this).parents('tr');
        var value = parent.data('value');
        var csrf_token = '{{csrf_token()}}';

        Swal.fire({
            title: 'می خواهید پاک کنید',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'تایید',
            cancelButtonText: 'لغو',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    method: 'delete',
                    CORS: true,
                    data: {_token: csrf_token, id: value},
                    success: function (data) {
                        parent.remove();
                        Swal.fire('عملیات حذف!!!', 'حذف با موفقیت انجام شد', 'success');
                    },
                    fail: function (data) {
                    },

                });
            } else {
                swal('لغو عملیات!!!', 'پاک نشد', 'error')
            }
        });
    });
});
