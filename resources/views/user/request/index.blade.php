@extends('layouts.panel')

@section('title' , 'درخواست ها')

@section('content')
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid bg-dark-custom-1" id="kt_subheader">
            <div
                class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap ">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Page Title-->
                    <h5 class="text-gold font-weight-bold mt-2 mb-2 mr-5">کاربران</h5>
                    <!--end::Page Title-->

                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">درخواست ها</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">صفحه اصلی</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Info-->

                <div class="">
                    <a href="{{ route('website.web.user.request.create') }}"  class="btn btn-gold font-weight-bold font-size-link">ایجاد درخواست</a>
                </div>
            </div>
        </div>

        <!--end::Subheader-->
    	<div class="container">
            @if(session()->has('message'))
                <div>
                    <div class="alert alert-dismissible fade show text-white" role="alert" style="border-color:#ffd36a">
                        {{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-custom gutter-b bg-dark-custom-1">
                        <!--begin::Header-->

                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-gold">لیست درخواست های کاربر</span>
                            </h3>
                        </div>
                        <div class="card-body py-0">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="kt_advance_table_widget_4">
                                    <thead>
                                    <tr class="text-left">
                                        <th class="text-center" style="min-width: 120px">شناسه تراکنش</th>
                                        <th class="text-center" style="min-width: 120px">تاریخ</th>
                                        <th class="text-center" style="min-width: 120px">مبلغ</th>
                                        <th class="text-center" style="min-width: 120px">نوع</th>
                                        <th class="text-center" style="min-width: 120px">وضعیت</th>
                                        <th class="text-center" style="min-width: 120px">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($requests as $request)
                                        <tr data-value="{{ $request->getUuid() }}" id="request_{{ $request->getUuid() }}">
                                            <td class="text-center">
                                                <span class="text-dark-50 font-weight-bolder text-hover-primary font-size-lg">{{$request->getReferenceId()}}</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-dark-50 font-weight-bolder d-block font-size-lg">{{$request->getJalaliCreateAt()}}</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-dark-50 font-weight-bolder d-block font-size-lg">{{number_format($request->getAmount())}} {{__('Rial')}}</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="label label-lg label-light-primary label-inline">
                                                    @switch($request->getType())
                                                        @case(\App\Constants\RequestConstants::TYPE_DEPOSIT)
                                                            واریز
                                                        @break('case')
                                                        @case(\App\Constants\RequestConstants::TYPE_WITHDRAW)
                                                            برداشت
                                                        @break('case')
                                                    @endswitch
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                @switch($request->getStatus())
                                                    @case(\App\Constants\RequestConstants::REQUEST_STATUS_ACCEPTED)
                                                    <span class="label label-lg label-light-success label-inline"> تایید شده </span>
                                                    @break('case')
                                                    @case(\App\Constants\RequestConstants::REQUEST_STATUS_PENDING)
                                                        <span class="label label-lg label-light-warning label-inline"> در انتظار تایید </span>
                                                    @break('case')
                                                    @case(\App\Constants\RequestConstants::REQUEST_STATUS_REJECTED)
                                                        <span class="label label-lg label-light-danger label-inline"> رد شده </span>
                                                    @break('case')
                                                @endswitch
                                            </td>
                                            <td class="justify-content-center d-flex">
                                                @if($request->status == \App\Constants\RequestConstants::REQUEST_STATUS_PENDING)
                                                <a href="{{ route('website.web.user.request.edit', $request->getUuid()) }}" class="btn btn-outline-secondary mr-3 btn-sm w-70px text-white hover-gold">ویرایش</a>
                                                @endif
                                                <button class="btn btn-outline-secondary btn-sm w-70px request_view_information text-white hover-gold">مشاهده</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <div class="card-footer">
                            {{$requests->links('vendor.pagination.admin-pagination')}}
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                @include('user.request.view.modal-view')
            </div>
        </div>
@endsection
@push('scripts')
    <script src="{{asset('assets/js/pages/crud/delete/delete-ajax.js')}}"></script>
@endpush
