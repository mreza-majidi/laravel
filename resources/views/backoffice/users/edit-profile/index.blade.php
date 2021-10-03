@extends('layouts.panel')

@section('title' , 'ویرایش کاربران')

@section('content')
    <!--begin::Subheader-->
    @include('backoffice.users.edit-profile.subheader')
    <!--end::Subheader-->
    <div class="container">
            <div class="row bg-white">
                <div class="card-body">
                    <div class="tab-content pt-5">
                        <!--begin::Tab Content-->
                        <div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
                            <form class="form">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label my-auto">عکس کاربر</label>
                                    <div class="col-9">
                                        <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url(http://127.0.0.1:8000/assets/user/media/users/blank.png)">
                                            <div class="image-input-wrapper"></div>
                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="آواتار">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg">
                                                <input type="hidden" name="profile_avatar_remove">
                                            </label>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                         </span>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label my-auto">{{__('User name')}}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-user"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg form-control-solid" placeholder="{{__('User name')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label my-auto">{{__('User_Family')}}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-user"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg form-control-solid" placeholder="{{__('User_Family')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label my-auto">{{__('upload code')}}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-bank"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg form-control-solid" placeholder="{{__('upload code')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label my-auto">{{__('Phone Number')}}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-phone"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg form-control-solid" placeholder="{{__('Phone Number')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label my-auto">{{__('Register Date')}}</label>
                                    <div class="col-lg-9 col-xl-6">            
                                        <div class="input-group input-group-lg input-group-solid range-from-example pwt-datepicker-input-element datepicker-font">
                                            <div class="input-group-prepend datepicker-font">
                                                <span class="input-group-text datepicker-font">
                                                    <i class="la la-calendar"></i>
                                                </span>
                                            </div>
                                            <input name="paidAt" type="text" class="form-control form-control form-control-lg pay-date pwt-datepicker-input-element range-from-example" placeholder="تاریخ">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label my-auto">{{__('make Situation Userprofile')}}</label>
                                    <div class="col-lg-9 col-xl-6">            
                                            <select class="form-control form-control-lg form-control-solid p-0 input-width" id="kt_datatable_search_type">
                                                <option value="" ></option>
                                                <option value="1">{{__('Active')}}</option>
                                                <option value="2">{{__('Block')}}</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label my-auto">{{__('Address')}}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">                                       
                                            <textarea name="address" type="text"
                                                   class="form-control form-control-lg form-control-solid"
                                                   placeholder="{{__('Address')}}" ></textarea>
                                        </div>
                                    </div>
                                </div>
                        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('scripts')
    <script src="{{asset('assets/js/pages/custom/user/add-user.js')}}"></script>
    <script src="{{asset('assets/js/persian-date.min.js')}}"></script>
    <script src="{{asset('assets/js/persian-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/custom/user/edit-user.js')}}"></script>
    <script src="{{asset('assets/js/Calendar.js')}}"></script>
@endpush
@push('styles')
    <link href="{{asset('assets/css/persian-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
@endpush


