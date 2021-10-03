@extends('layouts.panel')

@section('title' , 'داشبورد')
@section('content')
    <div class="subheader py-2 py-lg-4 subheader-solid bg-dark-custom-1" id="kt_subheader">
        <div
            class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-gold">داشبورد</h5>
                <!--end::Page Title-->

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">صفحه اصلی</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->
            <a href="{{ route('website.web.user.request.create') }}"
               class="btn btn-gold font-weight-bold font-size-link">ایجاد درخواست</a>
        </div>
    </div>
    <div class="container">


        <input type="hidden" id="profileScore" value="{{$completedScore}}">
        @if(!auth()->user()->isSuperAdmin())
            <div class="row">

                <div class="col-lg-6 col-xxl-4">
                    <!--begin::List Widget 9-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b bg-gold">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5 bg-dark-custom-1">
                            <h3 class="card-title font-weight-bolder text-gold">درخواست واریز و برداشت</h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <!--begin::Chart-->
                            <div class="card-rounded-bottom bg-dark-custom-1"
                                 style="height: 200px; min-height: 200px"></div>
                            <!--end::Chart-->
                            <!--begin::Stats-->
                            <div class="card-spacer mt-n25">
                                <!--begin::Row-->
                                <div class="row m-0">
                                    <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
                                    <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path
                                                    d="M5.74714567,13.0425758 C4.09410362,11.9740356 3,10.1147886 3,8 C3,4.6862915 5.6862915,2 9,2 C11.7957591,2 14.1449096,3.91215918 14.8109738,6.5 L17.25,6.5 C19.3210678,6.5 21,8.17893219 21,10.25 C21,12.3210678 19.3210678,14 17.25,14 L8.25,14 C7.28817895,14 6.41093178,13.6378962 5.74714567,13.0425758 Z"
                                                    fill="#000000" opacity="0.3"/>
                                                <path
                                                    d="M11.1288761,15.7336977 L11.1288761,17.6901712 L9.12120481,17.6901712 C8.84506244,17.6901712 8.62120481,17.9140288 8.62120481,18.1901712 L8.62120481,19.2134699 C8.62120481,19.4896123 8.84506244,19.7134699 9.12120481,19.7134699 L11.1288761,19.7134699 L11.1288761,21.6699434 C11.1288761,21.9460858 11.3527337,22.1699434 11.6288761,22.1699434 C11.7471877,22.1699434 11.8616664,22.1279896 11.951961,22.0515402 L15.4576222,19.0834174 C15.6683723,18.9049825 15.6945689,18.5894857 15.5161341,18.3787356 C15.4982803,18.3576485 15.4787093,18.3380775 15.4576222,18.3202237 L11.951961,15.3521009 C11.7412109,15.173666 11.4257142,15.1998627 11.2472793,15.4106128 C11.1708299,15.5009075 11.1288761,15.6153861 11.1288761,15.7336977 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(11.959697, 18.661508) rotate(-90.000000) translate(-11.959697, -18.661508) "/>
                                            </g>
                                        </svg>
                                    </span>
                                        <a href="{{ route('website.web.user.request.create') }}"
                                           class="text-primary font-weight-bold font-size-h6">در خواست واریز</a>
                                    </div>
                                    <div class="col bg-light-success px-6 py-8 rounded-xl mb-7">
                                    <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path
                                                    d="M5.74714567,13.0425758 C4.09410362,11.9740356 3,10.1147886 3,8 C3,4.6862915 5.6862915,2 9,2 C11.7957591,2 14.1449096,3.91215918 14.8109738,6.5 L17.25,6.5 C19.3210678,6.5 21,8.17893219 21,10.25 C21,12.3210678 19.3210678,14 17.25,14 L8.25,14 C7.28817895,14 6.41093178,13.6378962 5.74714567,13.0425758 Z"
                                                    fill="#000000" opacity="0.3"/>
                                                <path
                                                    d="M11.1288761,15.7336977 L11.1288761,17.6901712 L9.12120481,17.6901712 C8.84506244,17.6901712 8.62120481,17.9140288 8.62120481,18.1901712 L8.62120481,19.2134699 C8.62120481,19.4896123 8.84506244,19.7134699 9.12120481,19.7134699 L11.1288761,19.7134699 L11.1288761,21.6699434 C11.1288761,21.9460858 11.3527337,22.1699434 11.6288761,22.1699434 C11.7471877,22.1699434 11.8616664,22.1279896 11.951961,22.0515402 L15.4576222,19.0834174 C15.6683723,18.9049825 15.6945689,18.5894857 15.5161341,18.3787356 C15.4982803,18.3576485 15.4787093,18.3380775 15.4576222,18.3202237 L11.951961,15.3521009 C11.7412109,15.173666 11.4257142,15.1998627 11.2472793,15.4106128 C11.1708299,15.5009075 11.1288761,15.6153861 11.1288761,15.7336977 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(11.959697, 18.661508) rotate(-270.000000) translate(-11.959697, -18.661508) "/>
                                            </g>
                                        </svg>
                                    </span>
                                        <a href="{{ route('website.web.user.request.create') }}"
                                           class="text-success font-weight-bold font-size-h6 mt-2">درخواست برداشت</a>
                                    </div>
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Stats-->
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 414px; height: 462px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end: List Widget 9-->
                </div>
                <div class="col-xxl-5">
                    <!--begin::Widget 15-->
                    <div class="card card-custom card-stretch gutter-b bg-dark-custom-1">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column text-dark">
                                <span class="font-weight-bolder text-gold">نمایش اعلانات</span>
                                <span
                                    class="text-muted mt-3 font-weight-bold font-size-md">+ {{ count($announcements) }}</span>
                            </h3>
                        </div>
                        <!--end::Header-->
                    @foreach($announcements as $announcement)
                        <!--begin::Body-->
                            <div class="card-body pt-2">
                                <!--begin::Item-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Section-->
                                    @if($announcement->priority==\App\Constants\AnnouncementConstants::PRIORITY_HIGH)
                                        <div class="d-flex flex-column flex-grow-1 p-5"
                                             style="background:#3a3d46;border-radius: 10px">
                                            <!--begin::Title-->
                                            <a href="#"
                                               class="text-gold font-weight-bolder font-size-lg text-hover-primary mb-1">اعلانات</a>
                                            <!--end::Title-->
                                            <!--begin::Desc-->
                                            <span
                                                class="text-white font-weight-normal font-size-sm">{{$announcement->text}}</span>
                                            <!--begin::Desc-->
                                        </div>
                                @endif
                                <!--end::Section-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Section-->
                                    @if($announcement->priority==\App\Constants\AnnouncementConstants::PRIORITY_MEDIUM)
                                        <div class="d-flex flex-column flex-grow-1 p-5"
                                             style="background:#3a3d46;border-radius:10px">
                                            <!--begin::Title-->
                                            <!--end::Title-->
                                            <a href="#"
                                               class="text-gold font-weight-bolder font-size-lg text-hover-primary mb-1">اعلانات</a>
                                            <!--begin::Desc-->
                                            <span
                                                class="text-white font-weight-normal font-size-sm">{{$announcement->text}}</span>
                                            <!--begin::Desc-->
                                        </div>
                                @endif
                                <!--end::Section-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Section-->
                                    @if($announcement->priority==\App\Constants\AnnouncementConstants::PRIORITY_LOW)
                                        <div class="d-flex flex-column flex-grow-1 p-5"
                                             style="background:#3a3d46;border-radius:10px">
                                            <!--begin::Title-->
                                            <!--end::Title-->
                                            <a href="#"
                                               class="text-gold font-weight-bolder font-size-lg text-hover-primary mb-1">اعلانات</a>
                                            <!--begin::Desc-->
                                            <span
                                                class="text-white font-weight-normal font-size-sm">{{$announcement->text}}</span>

                                            <!--begin::Desc-->
                                        </div>
                                @endif
                                <!--end::Section-->
                                </div>
                                <!--end::Item-->
                                {{--                            @endswitch--}}
                            </div>
                            <!--end::Body-->
                        @endforeach
                    </div>
                    <!--end::Widget 15-->
                </div>
                <div class="col-xxl-3">
                    <!--begin::Mixed Widget 14-->
                    <div class="card card-custom card-stretch gutter-b bg-dark-custom-1">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title font-weight-bolder text-gold">احراز هویت</h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column">
                            <div class="flex-grow-1">
                                <div id="kt_mixed_widget_14_chart" style="height: 200px"></div>
                            </div>
                            <div class="pt-5">
                                <a href="http://zteforex.com/auth-steps" class="btn btn-gold btn-shadow-hover font-weight-bolder w-100 py-3"
                                   style="color:#3a3d46">مراحل احراز هویت</a>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 14-->
                </div>
            </div>
        @endif

        {{--    user Dashboard    --}}
        <div class="row">
            <div class="col-lg-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b bg-dark-custom-1">
                    <!--begin::Header-->
                    <div class="card-header h-auto">
                        <!--begin::Title-->
                        <div class="card-title py-5">
                            <h3 class="card-label text-gold">نمودار واریز</h3>
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <div class="card-body">
                        <!--begin::Chart-->
                        <div id="chart_1"></div>
                        <!--end::Chart-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-lg-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b bg-dark-custom-1">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label text-gold">نمودار برداشت</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin::Chart-->
                        <div id="chart_2"></div>
                        <!--end::Chart-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
        @if(!auth()->user()->isSuperAdmin())

            <div class="row">
                <div class="col-xxl-6">
                    <div class="card card-custom gutter-b bg-dark-custom-1">
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label  font-weight-normal text-dark-50">واریز</span>
                            </h3>
                        </div>
                        <div class="card-body pt-0 pb-3">
                            <div class="table-responsive">
                                <table
                                    class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                    <thead>
                                    <tr class="text-uppercase">
                                        <th style="min-width: 100px" class="text-center">شناسه تراکنش</th>
                                        <th style="min-width: 100px" class="text-center">
                                            <span class="text-gold text-center">تاریخ</span>
                                            <span class="svg-icon svg-icon-sm svg-icon-gold">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                    <rect fill="#000000" opacity="0.3" x="11" y="4" width="2"
                                                          height="10" rx="1"></rect>
                                                    <path
                                                        d="M6.70710678,19.7071068 C6.31658249,20.0976311 5.68341751,20.0976311 5.29289322,19.7071068 C4.90236893,19.3165825 4.90236893,18.6834175 5.29289322,18.2928932 L11.2928932,12.2928932 C11.6714722,11.9143143 12.2810586,11.9010687 12.6757246,12.2628459 L18.6757246,17.7628459 C19.0828436,18.1360383 19.1103465,18.7686056 18.7371541,19.1757246 C18.3639617,19.5828436 17.7313944,19.6103465 17.3242754,19.2371541 L12.0300757,14.3841378 L6.70710678,19.7071068 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(12.000003, 15.999999) scale(1, -1) translate(-12.000003, -15.999999)"></path>
                                                </g>
                                            </svg>
                                        </span>
                                        </th>
                                        <th style="min-width: 100px" class="text-center">مبلغ</th>
                                        <th style="min-width: 100px" class="text-center">نوع</th>
                                        <th style="min-width: 100px" class="text-center">وضعیت</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($depositRequests as $depositRequest)
                                        <tr>
                                            <td class="text-center">
                                            <span
                                                class="text-dark-50 font-weight-bolder d-block font-size-lg">{{$depositRequest->getReferenceId()}}</span>
                                            </td>
                                            <td class="text-center">
                                            <span
                                                class="text-gold font-weight-bolder d-block font-size-lg">{{$depositRequest->getJalaliCreateAt()}}
                                            </span>
                                            </td>
                                            <td class="text-center">
                                            <span
                                                class="text-dark-50 font-weight-bolder d-block font-size-lg">{{number_format($depositRequest->getAmount())}} {{__('Rial')}}
                                            </span>
                                            </td>
                                            <td class="text-center">
                                            <span
                                                class="text-dark-50 font-weight-bolder d-block font-size-lg">
                                                @switch($depositRequest->getType())
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
                                                @switch($depositRequest->getStatus())
                                                    @case(\App\Constants\RequestConstants::REQUEST_STATUS_ACCEPTED)
                                                    <span class="label label-lg label-light-success label-inline "> تایید شده </span>
                                                    @break('case')
                                                    @case(\App\Constants\RequestConstants::REQUEST_STATUS_PENDING)
                                                    <span class="label label-lg label-light-warning label-inline"> در انتظار تایید </span>
                                                    @break('case')
                                                    @case(\App\Constants\RequestConstants::REQUEST_STATUS_REJECTED)
                                                    <span
                                                        class="label label-lg label-light-danger label-inline"> رد شده </span>
                                                    @break('case')
                                                @endswitch
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Body-->
                </div>
                <div class="col-xxl-6">
                    <div class="card card-custom gutter-b bg-dark-custom-1">
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label  font-weight-normal text-dark-50">برداشت</span>
                            </h3>
                        </div>
                        <div class="card-body pt-0 pb-3">
                            <div class="table-responsive">
                                <table
                                    class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                    <thead>
                                    <tr class="text-uppercase">
                                        <th style="min-width: 100px" class="text-center">شناسه تراکنش</th>
                                        <th style="min-width: 100px" class="text-center">
                                            <span class="text-gold text-center">تاریخ</span>
                                            <span class="svg-icon svg-icon-sm svg-icon-gold">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                    <rect fill="#000000" opacity="0.3" x="11" y="4" width="2"
                                                          height="10" rx="1"></rect>
                                                    <path
                                                        d="M6.70710678,19.7071068 C6.31658249,20.0976311 5.68341751,20.0976311 5.29289322,19.7071068 C4.90236893,19.3165825 4.90236893,18.6834175 5.29289322,18.2928932 L11.2928932,12.2928932 C11.6714722,11.9143143 12.2810586,11.9010687 12.6757246,12.2628459 L18.6757246,17.7628459 C19.0828436,18.1360383 19.1103465,18.7686056 18.7371541,19.1757246 C18.3639617,19.5828436 17.7313944,19.6103465 17.3242754,19.2371541 L12.0300757,14.3841378 L6.70710678,19.7071068 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(12.000003, 15.999999) scale(1, -1) translate(-12.000003, -15.999999)"></path>
                                                </g>
                                            </svg>
                                        </span>
                                        </th>
                                        <th style="min-width: 100px" class="text-center">مبلغ</th>
                                        <th style="min-width: 100px" class="text-center">نوع</th>
                                        <th style="min-width: 100px" class="text-center">وضعیت</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($withdrawRequests as $withdrawRequest)
                                        <tr>
                                            <td class="text-center">
                                            <span
                                                class="text-dark-50 font-weight-bolder d-block font-size-lg">{{$withdrawRequest->getReferenceId()}}</span>
                                            </td>
                                            <td class="text-center">
                                            <span class="text-gold font-weight-bolder d-block font-size-lg">{{$withdrawRequest->getJalaliCreateAt()}}
                                            </span>
                                            </td>
                                            <td class="text-center">
                                            <span
                                                class="text-dark-50 font-weight-bolder d-block font-size-lg">{{number_format($withdrawRequest->getAmount())}} {{__('Rial')}}
                                            </span>
                                            </td>
                                            <td class="text-center">
                                            <span
                                                class="text-dark-50 font-weight-bolder d-block font-size-lg">
                                                @switch($withdrawRequest->getType())
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
                                                @switch($withdrawRequest->getStatus())
                                                    @case(\App\Constants\RequestConstants::REQUEST_STATUS_ACCEPTED)
                                                    <span class="label label-lg label-light-success label-inline "> تایید شده </span>
                                                    @break('case')
                                                    @case(\App\Constants\RequestConstants::REQUEST_STATUS_PENDING)
                                                    <span class="label label-lg label-light-warning label-inline"> در انتظار تایید </span>
                                                    @break('case')
                                                    @case(\App\Constants\RequestConstants::REQUEST_STATUS_REJECTED)
                                                    <span
                                                        class="label label-lg label-light-danger label-inline"> رد شده </span>
                                                    @break('case')
                                                @endswitch
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Body-->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <!--begin::ترکیبی Widget 16-->
                    <div class="card card-custom card-stretch gutter-b bg-dark-custom-1">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <div class="card-title font-weight-bolder">
                                <div class="card-label text-gold">
                                    موجودی کیف پول
                                    <div class="font-size-sm text-muted mt-2">{{auth()->user()->wallets->count()}} کیف
                                        پول
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column" style="position: relative;">

                            <!--end::Chart-->

                            <!--begin::Items-->
                            <div class="mt-10 mb-5">
                                <div class="row row-paddingless mb-10">
                                @foreach(auth()->user()->wallets as $wallet)
                                    <!--begin::Item-->
                                        <div class="col-12">
                                            <div class="d-flex align-items-center mr-2 mb-4">
                                                <!--begin::سیمبل-->
                                                <div
                                                    class="symbol symbol-45 symbol-light-info mr-4 flex-shrink-0 btn-sm">
                                                    <div class="symbol-label">
                                <span class="svg-icon svg-icon-lg svg-icon-info"><!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"></rect>
        <path
            d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
        <path
            d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z"
            fill="#000000"></path>
    </g>
</svg><!--end::Svg Icon--></span></div>
                                                </div>
                                                <!--end::سیمبل-->

                                                <!--begin::Title-->
                                                <div>
                                                    <div
                                                        class="font-size-h4 text-dark-75 font-weight-bolder">{{number_format($wallet->balance)}}</div>
                                                    <div
                                                        class="font-size-sm text-muted font-weight-bold mt-1">{{$wallet->walletType->title}}</div>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                @endforeach
                                <!--begin::Item-->
                                    <!--end::Item-->
                                </div>

                            </div>
                            <!--end::Items-->
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 414px; height: 447px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::ترکیبی Widget 16-->
                </div>
            </div>
        @endif
    </div>
    {{--    @dd($chartDataDepositAction)--}}
@endsection
@push('styles')
    <link href="{{asset('assets/backoffice/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css')}}" rel="stylesheet"
          type="text/css"/>
@endpush
@push('scripts')
    <script src="{{asset('assets/js/pages/widgets.js')}}"></script>
    <script>
        var chartDataDeposit = "{{ $chartDataDepositAction }}";
        var chartDataWithdraw = "{{ $chartDataWithdrawAction }}";
        chartDataDeposit = JSON.parse(chartDataDeposit.replace(/&quot;/g, '"'))
        chartDataWithdraw = JSON.parse(chartDataWithdraw.replace(/&quot;/g, '"'))
    </script>
    <script src="{{asset('assets/js/pages/features/charts/apexcharts.js')}}"></script>
@endpush
