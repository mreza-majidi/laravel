$(document).ready(function (){
    $('button.close').on('click', function (){
        close_button = $(this);
        value = close_button.data('value');
        $.ajax({
            url: '{{ route(welcome) }}',
            CORS: true,
            method: 'get',
            data: {_token: '', id: value},
            success: function (data){
                close_button.parents('div.alert').remove();
            }
        });
    });
});
