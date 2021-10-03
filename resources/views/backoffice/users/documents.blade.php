@extends('layouts.panel')

@section('title' , 'مدارک ارسالی کاربر')

@section('content')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div
            class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">مشاهده کاربران</h5>
                <!--end::Page Title-->

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">کاربران</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">مدارک کاربران</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->
            <div class="d-flex align-items-center">
                <!--begin::Button-->
                <a href="{{ route('backoffice_user_index') }}"
                   class="btn btn-secondary w-100px h-40px font-size-link">بازگشت</a>
                <!--end::Button-->
            @if($user->getStatus() == \App\Constants\UserConstants::STATUS_SUSPEND)
                <!--begin::Dropdown-->
                    <div class="btn-group ml-2">
                        <button type="submit" id="success" data-value="{{ $user->getUuid() }}"
                                class="btn btn-light-dark font-weight-bold h-40px font-size-link w-100px">
                            تایید
                        </button>
                    </div>
                    <!--end::Dropdown-->
                @endif
            </div>
        </div>
    </div>
    <!--end::Subheader-->

    <div class="container">
        <div class="row bg-white">
            @foreach($documents as $document)
                <div class="col-xl-6">
                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Top-->
                            <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40 symbol-light-success mr-5">
                                <span class="symbol-label">
                                    <img src="{{ asset($user->profile->getAvatar()) }}"
                                         class="h-75 align-self-end" alt="">
                                </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="#"
                                       class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{ $user->getFullName() }}</a>
                                    <span
                                        class="text-muted font-weight-bold">ارسال شده {{ $document->documentType->getCreatedAt() }}</span>
                                </div>
                            </div>
                            <!--end::Top-->
                            <!--begin::Bottom-->
                            <div class="pt-4">
                                <!--begin::Image-->
                                <div class="bgi-no-repeat bgi-size-cover rounded min-h-265px"
                                     style="background-image:url('{{ $document->media->first()->getAbsoluteUrl() }}')"></div>
                                <h3 class="text-dark-75 font-size-lg font-weight-normal pt-5 mb-2">{{ $document->documentType->title }}</h3>
                            </div>
                            <div class="separator separator-solid mt-2 mb-4"></div>
                            <div class="row justify-content-center">
                                <button type="button" class="btn btn-outline-info w-25" data-toggle="modal"
                                        data-target=".bd-example-modal-lg">مشاهده
                                </button>
                            </div>

                        </div>
                        <!--end::Body-->
                    </div>
                </div>
            @endforeach
        </div>

        @foreach($documents as $document)
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <img src="{{ asset($document->media->first()->getAbsoluteUrl()) }}" alt="">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $("#success").click(function () {
                value = $(this).data('value');
                Swal.fire({
                    title: "آیا مطمئنید",
                    icon: "warning",
                    showCancelButton: true,
                    cancelButtonText: 'لغو',
                    confirmButtonText: "بلی"
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            url: '{{ route('backoffice_user_verification', $user->getUuid()) }}',
                            CORS: true,
                            method: 'patch',
                            data: {_token: '{{csrf_token()}}', id: value},
                            success: function (data) {
                                $(this).remove();
                                Swal.fire(
                                    "",
                                    "حساب با موفقیت تایید شد",
                                    "success"
                                )
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
