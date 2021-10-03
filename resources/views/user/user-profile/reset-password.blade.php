@extends('layouts.panel')

@section('title' , 'تغییر رمز عبور')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4 subheader-solid bg-dark-custom-1" id="kt_subheader">
            <div
                class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Page Title-->
                    <h5 class="text-gold font-weight-bold mt-2 mb-2 mr-5">تغییر رمز عبور</h5>
                    <!--end::Page Title-->
                </div>

            </div>
        </div>
        <!--begin::Subheader-->
    <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-body bg-dark-custom-1 p-0">
                        <form class="form" id="kt_form" action="{{ route('website.web.user.change_password') }}" method="post">
                            @csrf
                            <div class="tab-content">
                                <!--begin::Tab-->
                                <div class="tab-pane  active" id="kt_user_edit_tab_3" role="tabpanel">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <div class="col-xl-2"></div>
                                            <div class="col-xl-7">
                                                <!--begin::Row-->
                                                <div class="row">
                                                    <label class="col-3"></label>
                                                    <div class="col-9">
                                                        <h4 class="font-weight-bolder mb-10 text-gold">رمز عبور خود را تغییر دهید:</h4>
                                                    </div>
                                                </div>
                                                <!--end::Row-->
                                                <!--begin::Group-->
                                                <div class="form-group row">
                                                    <label class="col-form-label col-3 text-lg-right text-left text-white" >{{__('Current Password')}}</label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-lg form-control-solid" type="text" name="old_password"  placeholder="{{__('Current Password')}}">
                                                        @error('new_password_confirmation')
                                                        <div class="fv-plugins-message-container alert-top">
                                                            <div class="fv-help-block"></div>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!--end::Group-->
                                                <!--begin::Group-->
                                                <div class="form-group row">
                                                    <label class="col-form-label col-3 text-lg-right text-left text-white">{{__('New Password')}}</label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-lg form-control-solid" type="text" name="new_password" placeholder="{{__('New Password')}}">
                                                        @error('new_password_confirmation')
                                                        <div class="fv-plugins-message-container alert-top">
                                                            <div class="fv-help-block"></div>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!--end::Group-->
                                                <!--begin::Group-->
                                                <div class="form-group row">
                                                    <label class="col-form-label col-3 text-lg-right text-left text-white">{{__('Verify Password')}}</label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-lg form-control-solid" type="text" name="new_password_confirmation" placeholder="{{__('Verify Password')}}">
                                                        @error('new_password_confirmation')
                                                        <div class="fv-plugins-message-container alert-top">
                                                            <div class="fv-help-block"></div>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!--end::Group-->
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Body-->
                                    <!--begin::Footer-->
                                    <div class="card-footer pb-0 bg-dark-custom-1">
                                        <div class="row">
                                            <div class="col-xl-2"></div>
                                            <div class="col-xl-7">
                                                <div class="row">
                                                    <div class="col-3"></div>
                                                    <div class="col-9 mb-5">
                                                        <button type="submit" class="btn btn-gold font-weight-bold w-100px">{{__('Submit Button')}}</button>
                                                        <button type="reset" class="btn btn-light-dark font-weight-bold w-100px">{{__('Cancel')}}</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Footer-->
                                </div>
                                <!--end::Tab-->
                            </div>
                        </form>
                    </div>
                    </div>
                    <!--end::Group-->

                </div>

                <!--end::Row-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Tab-->



@endsection
