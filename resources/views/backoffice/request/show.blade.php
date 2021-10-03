@extends('layouts.panel')

@section('title', 'صفحه مشاهده درخواست ها')
@section('content')

    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div
            class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{__('Requests')}}</h5>
                <!--end::Page Title-->

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">{{__('Requests list')}}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">مشاهده درخواست</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->

        </div>
    </div>
    <!--end::Subheader-->

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row bg-white rounded">
                <div class="col-xl-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Body-->
                        <div class="card-body pt-4 d-flex flex-column justify-content-between">

                            <div class="d-flex align-items-center mb-7">
                                <!--begin::Pic-->
                                <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                                    <div class="symbol symbol-lg-75 symbol-primary d-none">
                                        <span class="font-size-h3 font-weight-boldest">JM</span>
                                    </div>
                                </div>
                                <!--end::Pic-->
                                <!--begin::Title-->
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">کاربر
                                        : {{$request->user->getFullName()}}</a>
                                </div>
                                <!--end::Title-->
                            </div>

                            <div class="mb-7">
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="text-dark-75 font-weight-bolder mr-2">آدرس ایمیل:</span>
                                    <a href="#" class="text-muted text-hover-primary">{{$request->user->email}}</a>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="text-dark-75 font-weight-bolder mr-2">مبلغ:</span>
                                    <span class="text-muted font-weight-bold">{{number_format($request->amount)}}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-cente my-1 mt-3">
                                    <span class="text-dark-75 font-weight-bolder mr-2">کیف پول:</span>
                                    <a href="#" class="text-muted text-hover-primary"
                                       dir="ltr">{{$request->wallet->walletType->title}}</a>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="text-dark-75 font-weight-bolder mr-2">وضعیت درخواست:</span>
                                    @php($bgColor = '')
                                    @switch($request->getStatus())
                                        @case(\App\Constants\RequestConstants::REQUEST_STATUS_ACCEPTED)
                                        @php($bgColor = 'label-success')
                                        @break
                                        @case(\App\Constants\RequestConstants::REQUEST_STATUS_REJECTED)
                                        @php($bgColor = 'label-danger')
                                        @break
                                        @case(\App\Constants\RequestConstants::REQUEST_STATUS_PENDING)
                                        @php($bgColor = 'label-warning')
                                        @break
                                    @endswitch
                                    <span
                                        class="label label-lg label-light-success label-inline {{$bgColor}}">
                                                        {{__($request->getStatus())}}</span>

                                </div>
                                <div class="   mt-3">
                                    <span class="text-dark-75 font-weight-bolder mr-2">توضیحات:</span>
                                    <p></p>
                                </div>

                                <div>
                                    <form
                                        action="{{route("backoffice.change_status.acceptAction",$request)}}"
                                        method="post">
                                        @csrf
                                        <div class="col-md-12">
                                            <textarea name="description" id="" class="form-control form-control-lg form-control-solid" cols="30" rows="10">
{{$request->description}}</textarea>
                                        </div>
                                       <div class="d-flex">
                                           @if($request->status!=\App\Constants\RequestConstants::REQUEST_STATUS_ACCEPTED)
                                               <div class=" mt-3">
                                                   <button type="submit"
                                                           class="btn btn-success hidden">{{__('Submit')}}</button>
                                               </div>
                                           @endif
                                           @if($request->status!=\App\Constants\RequestConstants::REQUEST_STATUS_REJECTED)
                                              <div class=" mt-3">
                                                  <button type="submit" formaction="{{route("backoffice.change_status.rejectAction",$request)}}"
                                                          class="btn btn-danger  mr-2 ml-2 ">{{__('Cancel')}}</button>
                                              </div>
                                           @endif
                                       </div>
                                    </form>


                                </div>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
@push('styles')
    <link href="{{asset('assets/css/pages/backoffice/user-request.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@push('scripts')
    <script src="{{asset('assets/js/pages/crud/cancel/cancel.js')}}"></script>
    <script src="{{asset('assets/js/pages/crud/success/approve.js')}}"></script>
@endpush



