<!--begin::Tab-->
<div class="tab-pane px-7" id="kt_user_edit_tab_5" role="tabpanel">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">
            <div class="my-2">
            </div>
            <div class="row">
                <label class="col-form-label col-3 text-lg-right text-left"></label>
                <div class="col-9">
                    <h6 class="text-dark font-weight-bold mb-7">{{__('Admin messages')}}</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="separator separator-dashed mb-10"></div>
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">
            <div class="example mb-10">
                <div class="example-preview">
                    <div class="card alert alert-custom alert-outline-danger fade show mb-5" role="alert">
                            <span class="svg-icon svg-icon-danger mr-5 card-header">
                                <i class="icon-xl far fa-comments"></i>
                                <button type="button" class="close" data-value="2">
                                <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                </span>
                                </button>
						    </span>
                        <div class="alert-text card-body">باکس پیغام با اولویت بالا</div>
                        <div class="alert-close">

                            <div class="card-footer">
                                <small class="text-muted">۱۱ دقیقه قبل</small>
                            </div>
                        </div>
                    </div>

                    <div class="card alert alert-custom alert-outline-warning fade show mb-5" role="alert">
                            <span class="svg-icon svg-icon-danger mr-5 card-header">
                                <i class="icon-xl far fa-comments"></i>
                                <button type="button" class="close" data-value="2">
                                <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                </span>
                                </button>
						    </span>
                        <div class="alert-text card-body">باکس پیغام با اولویت متوسط</div>
                        <div class="alert-close">

                            <div class="card-footer">
                                <small class="text-muted">۱۱ دقیقه قبل</small>
                            </div>
                        </div>
                    </div>

                    <div class="card alert alert-custom alert-outline-primary fade show mb-5" role="alert">
                            <span class="svg-icon svg-icon-danger mr-5 card-header">
                                <i class="icon-xl far fa-comments"></i>
                                <button type="button" class="close" data-value="2">
                                <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                </span>
                                </button>
						    </span>
                        <div class="alert-text card-body">باکس پیغام با اولویت پایین</div>
                        <div class="alert-close">

                            <div class="card-footer">
                                <small class="text-muted">۱۱ دقیقه قبل</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Tab-->
@push('scripts')
    <script>
        $(document).ready(function () {
            $('button.close').on('click', function () {
                close_button = $(this);
                value = close_button.data('value');
                $.ajax({
                    url: '{{ route('welcome') }}',
                    CORS: true,
                    method: 'get',
                    data: {_token: '', id: value},
                    success: function (data) {
                        close_button.parents('div.alert').remove();
                    }
                });
            });
        });
    </script>
    <script src="{{asset('assets/js/pages/crud/close/close.js')}}"></script>
@endpush
