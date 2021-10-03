
$('button.success').on('click', function (e) {

    var parent = $(this).parents('tr');
    var value = parent.data('value');
    var csrf_token = '{{csrf_token()}}';

    Swal.fire({
        title: 'آیا مطمئن هستید؟',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'تایید',
        cancelButtonText: 'لغو',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                method: 'post',
                CORS: true,
                data: {_token: csrf_token, id: value},
                success: function (data) {
                    parent.remove();
                    Swal.fire('عملیات تایید!!!', 'عملیات با موفقیت انجام شد', 'success');
                },
                fail: function (data) {
                },
            });
        } else {
            swal('لغو عملیات!!!', 'عملیات با موفقیت انجام نشد', 'error')
        }
    });
});


