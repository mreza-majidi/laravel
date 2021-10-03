@extends('layouts.panel')

@section('title' , 'ویرایش کاربران')

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
                        <a href="" class="text-muted">ویرایش</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->
            <div class="d-flex align-items-center">
                <!--begin::Button-->
                <a href="javascript:history.back();" class="btn btn-light-dark font-weight-bold h-40px font-size-link">بازگشت</a>
                <!--end::Button-->
                <!--begin::Dropdown-->
                <div class="btn-group ml-2">
                    <button type="submit" id="success" data-value="21321322" class="btn btn-light-dark font-weight-bold h-40px font-size-link w-100px">
                        تایید
                    </button>
                </div>
                <!--end::Dropdown-->
            </div>
        </div>
    </div>

    <!--end::Subheader-->

    <div class="container">
            <div class="row bg-white">
                <div class="card-body">
                    <div class="tab-content pt-5">
                        <!--begin::Tab Content-->
                        <div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
                            <form class="form" id="update_user" action="{{ route('backoffice_user_update', $user->getUuid()) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <input name="user" type="hidden" value="{{ $user->getUuid() }}">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label my-auto">عکس کاربر</label>
                                    <div class="col-9">
                                        <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url({{ asset($profile->getAvatar()) }})">
                                            <div class="image-input-wrapper"></div>
                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="آواتار">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                                <input type="hidden" name="profile_avatar_remove">
                                            </label>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                         </span>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                        </div>
                                        @error('avatar')
                                        <div class="fv-plugins-message-container alert-top">
                                            <div class="fv-help-block">{{ $message }} </div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label my-auto">{{__('First Name')}}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-user"></i>
                                                </span>
                                            </div>
                                            <input name="first_name" type="text" class="form-control form-control-lg form-control-solid" value="{{ old('first_name', $profile->getFirstName()) }}" placeholder="{{__('First Name')}}">
                                            @error('first_name')
                                            <div class="fv-plugins-message-container alert-top">
                                                <div class="fv-help-block">{{ $message }} </div>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label my-auto">{{__('Last Name')}}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-user"></i>
                                                </span>
                                            </div>
                                            <input name="last_name" type="text" class="form-control form-control-lg form-control-solid" value="{{ old('last_name', $profile->getLastName()) }}" placeholder="{{__('Last Name')}}">
                                            @error('last_name')
                                            <div class="fv-plugins-message-container alert-top">
                                                <div class="fv-help-block">{{ $message }} </div>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label my-auto">{{__('National Number')}}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-bank"></i>
                                                </span>
                                            </div>
                                            <input name="national_number" type="text" class="form-control form-control-lg form-control-solid" value="{{ old('national_number', $profile->getNationalNumber()) }}" placeholder="{{__('National Number')}}">
                                            @error('national_number')
                                            <div class="fv-plugins-message-container alert-top">
                                                <div class="fv-help-block">{{ $message }} </div>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">{{__('Phone Number')}}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-phone"></i>
                                                </span>
                                            </div>
                                            <input name="mobile_number" type="text" class="form-control form-control-lg form-control-solid" value="{{ old('mobile_number', $profile->getMobileNumber()) }}" placeholder="{{__('Phone Number')}}">
                                            @error('mobile_number')
                                            <div class="fv-plugins-message-container alert-top">
                                                <div class="fv-help-block">{{ $message }} </div>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">{{__('Address')}}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-map-marked"></i>
                                                </span>
                                            </div>
                                            <input name="address" type="text" class="form-control form-control-lg form-control-solid" value="{{ old('address', $profile->getAddress()) }}" placeholder="{{__('Address')}}">
                                            @error('address')
                                            <div class="fv-plugins-message-container alert-top">
                                                <div class="fv-help-block">{{ $message }} </div>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label my-auto">تعیین وضعیت کاربر</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select name="status" class="form-control form-control-lg form-control-solid p-0 input-width" id="kt_datatable_search_type">
                                            <option value="{{\App\Constants\UserConstants::STATUS_ACTIVE}}" @if($user->isActive()) selected @endif>فعال</option>
                                            <option value="{{\App\Constants\UserConstants::STATUS_SUSPEND}}" @if(!$user->isActive()) selected @endif>مسدود</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-right col-form-label">{{__('Birth Date')}}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-birthday-cake"></i>
                                                </span>
                                            </div>
                                            <input name="birth_date" type="text" class="form-control pay-date pwt-datepicker-input-element" value="{{ old('birth_date', $profile->getBirthDate()) }}" placeholder="{{__('Birth Date')}}">
                                            @error('birth_date')
                                                <div class="fv-plugins-message-container alert-top">
                                                    <div class="fv-help-block">{{ $message }} </div>
                                                </div>
                                            @enderror
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
    <script src="{{asset('assets/js/pages/custom/user/a
dd-user.js')}}"></script>
0    <script src="{{asset('assets/js/persian-date.min.js')}}"></script>
    <script src="{{asset('assets/js/persian-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/custom/user/edit-user.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#success').on('click', function () {
                $('form#update_user').submit();
            });
            $('.pay-date').pDatepicker({
                initialValue: false,
                format: 'L',
                timePicker: {
                    enabled: false
                },
                autoClose: true,
                gregorian:true,
                responsive:true,
            });
        });
    </script>
@endpush
@push('styles')
    <style>
        .datepicker-plot-area {
            font-family: IRANSans !important;
        }
        .header{
            background:#ffffff;
        }
    </style>
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/persian-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush
