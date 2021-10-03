@extends('layouts.panel')

@section('title' , 'کاربران')

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
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->

        </div>
    </div>
    <!--end::Subheader-->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Advance Table Widget 3-->
                <div class="card card-custom card-stretch gutter-b">
                @include('backoffice.users.search-form')
                <!--begin::Body-->
                    <div class="card-body pt-0 pb-3">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                <thead>
                                <tr class="text-uppercase">
                                    <th>
                                        <span class="text-dark-75">نام و نام خانوادگی</span>
                                    </th>
                                    <th class="text-center">ایمیل</th>
                                    <th class="text-center">شماره تماس</th>
                                    <th class="text-center">تاریخ ثبت نام</th>
                                    <th class="text-center">وضعیت</th>
                                    <th class="text-center">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="pl-0 py-8 text-center">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                    <div class="symbol-label"
                                                         style="background-image: url({{ asset($user->profile->getAvatar()) }})"></div>
                                                </div>
                                                <div>
                                                    <h4 class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                        {{ $user->getFullName() }}
                                                    </h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center ltr">
                                            <span
                                                class="text-dark-75 d-block font-size-lg">{{ $user->getEmail() }}</span>
                                        </td>
                                        <td class="text-center ltr">
                                            <span
                                                class="text-dark-75  d-block font-size-lg">{{ $user->profile->getMobileNumber() }}</span>
                                        </td>
                                        <td class="text-center ltr">
                                            <span
                                                class="text-dark-75 d-block font-size-lg">{{ Morilog\Jalali\Jalalian::fromDateTime($user->getCreatedAt()) }}</span>
                                        </td>
                                        <td class="text-center">
                                            @switch($user->getStatus())
                                                @case(\App\Constants\UserConstants::STATUS_ACTIVE)
                                                <span class="label label-lg label-light-success label-inline">تایید شده</span>
                                                @break('case')
                                                @case(\App\Constants\UserConstants::STATUS_SUSPEND)
                                                <span class="label label-lg label-light-primary label-inline">درحال بررسی</span>
                                                @break('case')
                                            @endswitch
                                        </td>
                                        <td class="text-center pr-0">
                                            <a href="{{ route('backoffice_user_documents', $user->getUuid()) }}" class="btn btn-outline-secondary btn-sm w-70px">مدارک</a>
                                            <a href="{{ route('backoffice_user_edit_page', $user->getUuid()) }}" class="btn btn-outline-secondary btn-sm w-70px">ویرایش</a>
                                            <button
                                                class="btn btn-outline-secondary btn-sm w-70px user_view_information"
                                                data-value="{{ $user->getUuid() }}">مشاهده
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Body-->
                    <div class="card-footer">
                        {{$users->links('vendor.pagination.admin-pagination')}}

                    </div>

                </div>

            </div>
        </div>
    </div>
    @include('backoffice.users.users-information.modal-view-user')
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('button.user_view_information').on('click', function () {
                value = $(this).data('value');
                $.ajax({
                    url: '{{ route('backoffice_user_show_information', false) }}/' + value,
                    CORS: true,
                    method: 'get',
                    success: function (data) {
                        $('#user_information_content').html(data);
                        $('#user_information').modal().show();
                    }
                });
            });
        });
    </script>
@endpush

