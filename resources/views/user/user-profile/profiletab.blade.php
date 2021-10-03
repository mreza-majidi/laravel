
                <!--begin::Tab-->
                <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-7 my-2">
                            <!--begin::Row-->
                            @if(session()->has('message'))
                                <div>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session()->get('message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <label class="col-3"></label>
                                <div class="col-9">
                                    <h6 class="text-dark font-weight-bold mb-10">{{__('Customer Info:')}}</h6>
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Group-->
                            <form method="post" action="{{ route('website.web.user.profile.update', $profile->getUuid()) }}" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group row">
                                    <label
                                        class="col-form-label col-3 text-lg-right text-left">{{__('Avatar')}}</label>
                                    <div class="col-9">
                                        <div class="image-input image-input-empty image-input-outline"
                                             id="kt_user_edit_avatar"
                                             style="background-image: url({{asset($profile->getAvatar())}})">
                                            <div class="image-input-wrapper"></div>
                                            <label
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="change" data-toggle="tooltip" title="آواتار"
                                                data-original-title="تغییر آواتار">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="avatar"
                                                       accept=".png, .jpg, .jpeg" @if($profile->getFirstName() && $profile->getLastName() && $profile->getAddress() && $profile->getBirthDate() && $profile->getMobileNumber()) disabled @endif />
                                                <input type="hidden" name="profile_avatar_remove" @if($profile->getFirstName() && $profile->getLastName() && $profile->getAddress() && $profile->getBirthDate() && $profile->getMobileNumber()) disabled @endif />
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
                                    <label class="col-form-label col-3 text-lg-right text-left">{{__('First Name')}}</label>
                                    <div class="col-9">
                                        <input class="form-control form-control-lg form-control-solid"
                                               type="text" placeholder="{{__('First Name')}}" value="{{ old('first_name', $profile->getFirstName()) }}" @if($profile->getFirstName()) disabled @endif name="first_name"/>
                                        @error('first_name')
                                            <div class="fv-plugins-message-container alert-top">
                                                <div class="fv-help-block">{{ $message }} </div>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">{{__('Last Name')}}</label>
                                    <div class="col-9">
                                        <input class="form-control form-control-lg form-control-solid"
                                               type="text" placeholder="{{__('Last Name')}}" value="{{ old('last_name', $profile->getLastName()) }}" @if($profile->getLastName()) disabled @endif name="last_name" />
                                        @error('last_name')
                                            <div class="fv-plugins-message-container alert-top">
                                                <div class="fv-help-block">{{ $message }} </div>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">{{__('Code')}}</label>
                                    <div class="col-9">
                                        <input class="form-control form-control-lg form-control-solid"
                                               type="text" placeholder="{{__('Code')}}" value="{{ old('national_number',$profile->getNationalNumber()) }}" @if($profile->getNationalNumber()) disabled @endif name="national_number"/>
                                        @error('national_number')
                                            <div class="fv-plugins-message-container alert-top">
                                                <div class="fv-help-block">{{ $message }} </div>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">{{__('Contact Phone')}}</label>
                                    <div class="col-9">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-phone"></i>
                                                </span>
                                            </div>
                                            <input type="text"
                                                   class="form-control form-control-lg form-control-solid"
                                                   placeholder="{{__('Contact Phone')}}" value="{{ old('mobile_number', $profile->getMobileNumber()) }}" @if($profile->getMobileNumber()) disabled @endif name="mobile_number"/>

                                        </div>
                                        @error('mobile_number')
                                        <div class="fv-plugins-message-container alert-top">
                                            <div class="fv-help-block">{{ $message }} </div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">{{__('Birth Date')}}</label>
                                    <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-birthday-cake"></i>
                                                </span>
                                        </div>
                                        <input name="birth_date" type="text" class="form-control pay-date pwt-datepicker-input-element" @if($profile->getBirthDate()) disabled @endif value="{{ old('birth_date', jdate($profile->getBirthDate())->format('Y/m/d')) }}" placeholder="{{__('Birth Date')}}">
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
                                    <label class="col-form-label col-3 text-lg-right text-left">{{__('Address')}}</label>
                                    <div class="col-9">
                                        <div class="input-group input-group-lg input-group-solid">
                                            {{-- <textarea name="comment" form="usrform">Enter text here...</textarea> --}}
                                            <textarea name="address" type="text"
                                                   class="form-control form-control-lg form-control-solid"
                                                   placeholder="{{__('Address')}}" @if($profile->getAddress()) disabled @endif>{{ old('address', $profile->getAddress()) }}</textarea>
                                        </div>
                                        @error('address')
                                        <div class="fv-plugins-message-container alert-top">
                                            <div class="fv-help-block">{{ $message }} </div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <div class="col-xl-12 text-center">
                                            <button class="btn btn-primary w-00px" @if($profile->getFirstName() && $profile->getLastName() && $profile->getAddress() && $profile->getBirthDate() && $profile->getMobileNumber()) disabled @endif type="submit">تایید</button>
                                    </div>
                                </div>
                                <!--end::Group-->
                            </form>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Tab-->
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

