@extends('layouts.panel')

@section('title' , 'پیام ها')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card card-custom gutter-b w-100">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Container-->
                    <div>
                        <!--begin::Header-->
                        <div class="d-flex align-items-center">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-40 symbol-light-success mr-5">
															<span class="symbol-label rounded-circle">
																<img src="{{ asset('assets/media/svg/avatars/009-boy-4.svg') }}"
                                                                     class="h-75 align-self-end" alt="">
															</span>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="d-flex flex-column flex-grow-1">
                                <a href="#"
                                   class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">ادمین</a>
                                <div class="d-inline-flex">
                                    <span class="text-muted font-weight-bold" dir="ltr"> {{ $privateMessage->getJalaliCreatedAt() }}  </span>
                                </div>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div>
                            <!--begin::Text-->
                            <p class="text-dark-75 font-size-lg font-weight-normal pt-5 mb-2">{{ $privateMessage->getText() }}</p>
                            <!--end::Text-->
                            <!--begin::Action-->
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <!--end::Body-->
            </div>
        </div>
    </div>
@endsection
