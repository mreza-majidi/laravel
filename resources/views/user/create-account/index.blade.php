@extends('layouts.panel')

@section('title'  , 'لیست حساب ها')

@section('content')
    <div class="subheader py-2 py-lg-4 subheader-solid bg-dark-custom-1" id="kt_subheader">
        <div
            class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap ">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="font-weight-bold mt-2 mb-2 mr-5 text-gold">کاربران</h5>
                <!--end::Page Title-->

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">حساب ها</a>
                    </li>
                </ul>

                <!--end::Breadcrumb-->
            </div>
            <div class="d-flex align-items-center flex-wrap mr-2">
                <a class="mx-2" href="{{route('website.web.external_account.demo_create')}}">
                    <div class="btn btn-gold">ساخت اکانت دمو</div>
                </a>
                <a class="mx-2" href="{{route('website.web.external_account.real_create')}}">
                    <div class="btn btn-primary">ساخت اکانت real</div>
                </a>
            </div>
            <!--end::Info-->

        </div>
    </div>
    <div class="container">
        <div class="card card-custom gutter-b bg-dark-custom-1">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-gold">لیست حساب ها</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-0">
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="kt_advance_table_widget_2">
                        <thead>
                        <tr class="text-uppercase">
                            <th class="text-center">لورج</th>
                            <th class="text-center">موچودی اولیه</th>
                            <th class="text-center">نام کاربری</th>
                            <th class="text-center">رمز عبور</th>
                            <th class="text-center">نوع حساب</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($accounts as $account)
                            <tr id="item_{{$loop->index}}" data-value="{{$loop->index}}">
                                <td class="text-center">
                                    <a href="#"
                                       class="font-weight-bolder text-hover-primary font-size-lg text-white">
                                        {{\App\Constants\ExternalAccountConstants::LEVERAGES_DEMO[json_decode($account->extra_data)->user->leverage]}}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="#"
                                       class="font-weight-bolder text-hover-primary font-size-lg text-white">
                                        {{json_decode($account->extra_data)->ticket->amount}}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="#"
                                       class="font-weight-bolder text-hover-primary font-size-lg text-white">{{$account->username}}</a>
                                </td>
                                <td class="text-center">
                                    <span
                                        class="font-weight-bolder d-block font-size-lg text-white">{{$account->password}}</span>
                                </td>
                                <td class="text-center">
                                    <span
                                        class="font-weight-bolder d-block font-size-lg text-white">{{$account->type}}</span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!--end::Table-->
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">اطلاعات حساب</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-7">
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="text-dark-75 font-weight-bolder mr-2">نام:</span>
                                    <a href="#" class="text-muted text-hover-primary">لورم</a>
                                </div>
                                <div class="d-flex justify-content-between align-items-cente my-1 mt-3">
                                    <span class="text-dark-75 font-weight-bolder mr-2">شماره تماس:</span>
                                    <a href="#" class="text-muted text-hover-primary">لورم</a>

                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="text-dark-75 font-weight-bolder mr-2">آدرس:</span>
                                    <a href="#" class="text-muted text-hover-primary">لورم</a>

                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="text-dark-75 font-weight-bolder mr-2">ایمیل:</span>
                                    <a href="#" class="text-muted text-hover-primary">لورم</a>

                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="text-dark-75 font-weight-bolder mr-2">کشور:</span>
                                    <a href="#" class="text-muted text-hover-primary">لورم</a>

                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="text-dark-75 font-weight-bolder mr-2">استان:</span>
                                    <a href="#" class="text-muted text-hover-primary">لورم</a>

                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="text-dark-75 font-weight-bolder mr-2">شهر:</span>
                                    <a href="#" class="text-muted text-hover-primary">لورم</a>

                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="text-dark-75 font-weight-bolder mr-2">رمز:</span>
                                    <a href="#" class="text-muted text-hover-primary">لورم</a>

                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="text-dark-75 font-weight-bolder mr-2">کد پستی:</span>
                                    <a href="#" class="text-muted text-hover-primary">لورم</a>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary w-100px" data-dismiss="modal">بستن</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @endsection
            @push('scripts')
                <script src="{{asset('assets/js/pages/crud/delete/delete-ajax.js')}}"></script>
    @endpush
