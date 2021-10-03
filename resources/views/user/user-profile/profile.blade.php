@extends('layouts.panel')

@section('title', 'پروفایل')

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        @include('user.user-profile.subheader')
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom mb-3">
                   <div class="card-body rounded bg-dark-custom-1">
                       <p class="text-gold">
                           <i class="fa fa-info-circle"></i>
                           @if(!$user->getIsCompleted())
                               لطفا پروفایل خود را تکمیل کنید
                           @else
                               پرفایل شما با موفقیت تکمیل شد.
                           @endif
                       </p>
                       <div class="progress">
                           <div class="progress-bar" role="progressbar" style="width: @if($user->getIsCompleted()) 100% @else 50% @endif;" aria-valuenow="@if($user->getIsCompleted()) 100 @else 50 @endif " aria-valuemin="0" aria-valuemax="100">@if($user->getIsCompleted()) 100% @else 50% @endif</div>
                       </div>
                   </div>
                </div>
                <div class="card card-custom">

                    <!--begin::Card header-->
                        <div class="card-header card-header-tabs-line nav-tabs-line-3x bg-dark-custom-1">
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                                    <!--begin::Item-->
                                    <li class="nav-item mr-3">
                                        <a class="nav-link @if(session()->has('previous-route') && session()->get('previous-route')) @else active @endif" data-toggle="tab" href="#kt_user_edit_tab_1">

                                            <span class="nav-text font-size-lg text-gold">{{__('Profile')}}</span>
                                        </a>
                                    </li>
                                    <!--end::Item-->

                                </ul>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                    <!--end::Card header-->


                    <!--begin::Tab-->
                       <div class="tab-pane show active px-7 bg-dark-custom-1" id="kt_user_edit_tab_1" role="tabpanel">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-7 my-2">
                                <!--begin::Row-->
                                <div class="row">
                                    <label class="col-3"></label>
                                    <div class="col-9">
                                        <h6 class=" font-weight-bold mb-10 text-white">{{__('Customer Info:')}}</h6>
                                    </div>
                                </div>
                                <!--end::Row-->
                                <!--begin::Group-->
                                <form method="post" action="{{ route('website.web.user.profile.update', $profile->getUuid()) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group row">
                                        <label
                                            class="col-form-label col-3 text-lg-right text-left text-white">{{__('Avatar')}}</label>
                                        <div class="col-9">
                                            <div class="image-input image-input-empty image-input-outline"
                                                 id="kt_user_edit_avatar"
                                                 style="background-image: url({{asset($profile->getAvatar())}})">
                                                <div class="image-input-wrapper"></div>
                                                <label
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow text-white"
                                                    data-action="change" data-toggle="tooltip" title="آواتار"
                                                    data-original-title="تغییر آواتار">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="avatar"
                                                           accept=".png, .jpg, .jpeg"/>
                                                    <input type="hidden" name="profile_avatar_remove"/>
                                                </label>
                                                <span
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="cancel" data-toggle="tooltip"
                                                    title="Cancel avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                             </span>
                                                <span
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="remove" data-toggle="tooltip"
                                                    title="Remove avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                            </div>
                                        </div>
                                        @error('avatar')
                                        <div class="fv-plugins-message-container alert-top">
                                            <div class="fv-help-block">{{ $message }} </div>
                                        </div>
                                        @enderror
                                    </div>
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left text-white text-white">{{__('First Name')}}</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-lg form-control-solid"
                                                   type="text" placeholder="{{__('First Name')}}" value="{{ $profile->getFirstName() }}" name="first_name"/>
                                        </div>
                                        @error('first_name')
                                        <div class="fv-plugins-message-container alert-top">
                                            <div class="fv-help-block">{{ $message }} </div>
                                        </div>
                                        @enderror
                                    </div>
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left text-white">{{__('Last Name')}}</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-lg form-control-solid"
                                                   type="text" placeholder="{{__('Last Name')}}" value="{{ $profile->getLastName() }}" name="last_name" />
                                        </div>
                                        @error('last_name')
                                        <div class="fv-plugins-message-container alert-top">
                                            <div class="fv-help-block">{{ $message }} </div>
                                        </div>
                                        @enderror
                                    </div>
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left text-white">{{__('National Number')}}</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-lg form-control-solid"
                                                   type="text" placeholder="{{__('Code')}}" value="{{ $profile->getNationalNumber() }}" name="national_number"/>
                                        </div>
                                        @error('national_number')
                                        <div class="fv-plugins-message-container alert-top">
                                            <div class="fv-help-block">{{ $message }} </div>
                                        </div>
                                        @enderror
                                    </div>
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left text-white">{{__('Contact Phone')}}</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-phone"></i>
                                                </span>
                                                </div>
                                                <input type="text"
                                                       class="form-control form-control-lg form-control-solid"
                                                       placeholder="{{__('Contact Phone')}}" value="{{ $profile->getMobileNumber() }}" name="mobile_number"/>

                                            </div>
                                        </div>
                                        @error('mobile_number')
                                        <div class="fv-plugins-message-container alert-top">
                                            <div class="fv-help-block">{{ $message }} </div>
                                        </div>
                                        @enderror
                                    </div>
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left text-white">{{__('Birth date')}}</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-birthday-cake"></i>
                                                </span>
                                                </div>
                                                <input name="birth_date" type="text" class="form-control pay-date pwt-datepicker-input-element" value="{{ old('birth_date', jdate($profile->getBirthDate())->format('Y/m/d')) }}" placeholder="{{__('Birth Date')}}">
                                                @error('birth_date')
                                                <div class="fv-plugins-message-container alert-top">
                                                    <div class="fv-help-block">{{ $message }} </div>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left text-white">{{__('Address')}}</label>
                                        <div class="col-9">
                                            <div class="input-group input-group-lg input-group-solid">
                                                {{-- <textarea name="comment" form="usrform">Enter text here...</textarea> --}}
                                                <textarea name="address" type="text"
                                                          class="form-control form-control-lg form-control-solid"
                                                          placeholder="{{__('Address')}}" >{{ $profile->getAddress() }}</textarea>
                                            </div>
                                        </div>
                                        @error('address')
                                        <div class="fv-plugins-message-container alert-top">
                                            <div class="fv-help-block">{{ $message }} </div>
                                        </div>
                                        @enderror
                                    </div>
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <div class="col-xl-12 text-center">
                                            <button class="btn btn-gold font-weight-bold w-100px" type="submit">تایید</button>
                                        </div>
                                    </div>
                                    <!--end::Group-->
                                </form>
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Tab-->


                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection

@push('styles')
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/pages/wizard/wizard-4.rtl.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/persian-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Page Custom Styles-->
@endpush
@push('scripts')
    <script>
        $(document).ready(function () {
            $('.pay-date').pDatepicker({
                initialValue: true,
                initialValueType: 'persian',
                format: 'L',
                timePicker: {
                    enabled: false
                },
                autoClose: true,
                responsive:true,
            });
        });
    </script>
    <script src="{{asset('assets/js/pages/custom/user/add-user.js')}}"></script>
    <script src="{{asset('assets/js/persian-date.min.js')}}"></script>
    <script src="{{asset('assets/js/persian-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/custom/user/edit-user.js')}}"></script>
@endpush
