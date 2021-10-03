<div class="modal fade" id="modal-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-dark-custom-1">
            <div class="modal-header">
                <h5 class="modal-title text-gold" id="exampleModalLongTitle">اطلاعات درخواست</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal_content">
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-gold w-25 " data-dismiss="modal">بستن</button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function (){
            $('.request_view_information').on('click', function (){
                value = $(this) .parents('tr[id^="request_"]').data('value');
                $.ajax({
                    url: '{{ route('website.web.user.request.show', false) }}/' + value,
                    method: 'get',
                    success: function (data){
                        $('#modal_content').html(data);
                        $('#modal-1').modal().show();
                    }
                });
            });
        });
    </script>
@endpush
