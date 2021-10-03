<!--begin::Header-->
<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch p-0" style="justify-content: flex-end">
        <!--begin::Topbar-->
        <div class="topbar ">
            <!--begin::User-->
            <div class="topbar-item">
                <div class="dropdown">
                @if(!auth()->user()->isSuperAdmin())
                    <!--begin::Toggle-->
                        <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px" aria-expanded="false">
                            <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                            <span class="svg-icon svg-icon-xl">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                     version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path
                                            d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path
                                            d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z"
                                            fill="#000000"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            </div>
                        </div>
                        <!--end::Toggle-->
                        <!--begin::Dropdown-->
                        <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg"
                             style="">
                            <!--begin:Header-->
                            <div class="d-flex flex-column flex-center py-10 bgi-size-cover bgi-no-repeat rounded-top"
                                 style="background:#212832">
                                <h4 class="font-weight-bold text-gold">{{__('View wallet inventory')}}</h4>
                                <a href="{{ route('website.web.user.request.create') }}"
                                   class="btn btn-gold btn-sm font-weight-bold font-size-sm mt-2">{{__('Deposit request to account')}}</a>
                            </div>
                            <!--end:Header-->
                            <!--begin:Nav-->
                            <div class="row row-paddingless">
                                <!--begin:Item-->
                                @foreach($wallets as $wallet)
                                    <div class="col-6">
                                        <a href="#" class="d-block py-10 px-5 text-center bg-hover-light border-right ">
                                            <span
                                                class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">{{__('Accounting')}}</span>
                                            <span class="d-block text-dark-50 font-size-lg">{{ number_format($wallet->getBalance()) }} ({{ $wallet->title }})</span>
                                        </a>
                                    </div>
                            @endforeach
                            <!--end:Item-->
                            </div>
                            <!--end:Nav-->
                        </div>
                        <!--end::Dropdown-->
                        <div class="dropdown">
                            <!--begin::Toggle-->
                            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px"
                                 aria-expanded="false">

                                <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary w-60px">
                                    <span class="label label-danger mr-8 mb-4 position-absolute">{{ $count }}</span>
                                    <span class="svg-icon svg-icon-xl ">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                     viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"></rect>
														<path
                                                            d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                                            fill="#000000" opacity="0.3"></path>
														<path
                                                            d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                                            fill="#000000"></path>
													</g>
												</svg>
                                        <!--end::Svg Icon-->
											</span>

                                    <span class="pulse-ring"></span>

                                </div>
                            </div>
                            <!--end::Toggle-->
                            <!--begin::Dropdown-->
                            <div
                                class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-xl"
                                id="modal">
                                <form>
                                    <!--begin::Header-->
                                    <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top"
                                         style="background:#212832">
                                        <!--begin::Title-->
                                        <h4 class="d-flex flex-center rounded-top">
                                            <span class="text-gold">پیام های کاربر</span>
                                        </h4>
                                        <!--end::Title-->
                                        <!--begin::Tabs-->
                                        <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8"
                                            role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show text-gold" data-toggle="tab"
                                                   href="#topbar_notifications_notifications">پیام ها</a>
                                            </li>
                                        </ul>
                                        <!--end::Tabs-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Content-->
                                    <div class="tab-content">
                                        <!--begin::Tabpane-->
                                        <div class="tab-pane active show p-8" id="topbar_notifications_notifications"
                                             role="tabpanel">
                                            <!--begin::Scroll-->
                                            <div class="scroll pr-7 mr-n7 ps ps__rtl ps--active-y" data-scroll="true"
                                                 data-height="300" data-mobile-height="200"
                                                 style="height: 300px; overflow: hidden;">
                                                <!--begin::Item-->
                                                @foreach($privateMessages as $privateMessage)
                                                    <div class="d-flex align-items-center mb-6">
                                                        <!--begin::Symbol-->
                                                        <span class="mr-3"><i
                                                                class="fas @if($privateMessage->isSeen()) fa-check-double @else fa-check @endif"></i></span>
                                                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                 height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                   fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path
                                                                        d="M21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L5,18 C3.34314575,18 2,16.6568542 2,15 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 Z M6.16794971,10.5547002 C7.67758127,12.8191475 9.64566871,14 12,14 C14.3543313,14 16.3224187,12.8191475 17.8320503,10.5547002 C18.1384028,10.0951715 18.0142289,9.47430216 17.5547002,9.16794971 C17.0951715,8.86159725 16.4743022,8.98577112 16.1679497,9.4452998 C15.0109146,11.1808525 13.6456687,12 12,12 C10.3543313,12 8.9890854,11.1808525 7.83205029,9.4452998 C7.52569784,8.98577112 6.90482849,8.86159725 6.4452998,9.16794971 C5.98577112,9.47430216 5.86159725,10.0951715 6.16794971,10.5547002 Z"
                                                                        fill="#000000"/>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        </div>
                                                        <!--end::Symbol-->
                                                        <!--begin::Text-->
                                                        <div class="d-flex flex-column font-weight-bold">
                                                            <a href="{{ route('website.web.user.private_message', $privateMessage->getUuid()) }}"
                                                               class="text-dark-75 text-hover-primary mb-1 font-size-lg">{{$privateMessage->getTitle()}}</a>
                                                            <span
                                                                class="text-muted">{{ $privateMessage->getTextLimited() }}</span>
                                                            <div class="d-inline-flex">
                                                                <span
                                                                    class="text-muted">{{$privateMessage->getJalaliCreatedAt()}}</span>
                                                            </div>

                                                        </div>
                                                        <!--end::Text-->
                                                    </div>
                                                    <!--end::Item-->
                                                @endforeach
                                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                    <div class="ps__thumb-x" tabindex="0"
                                                         style="left: 0px; width: 0px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Scroll-->
                                    </div>

                                    <!--end::Content-->
                                </form>
                            </div>
                            <!--end::Dropdown-->
                        </div>
                    @else
                        <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px" aria-expanded="false"
                             style="visibility: hidden">
                            <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                            <span class="svg-icon svg-icon-xl svg-icon-primary">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                     version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path
                                            d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path
                                            d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z"
                                            fill="#000000"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            </div>
                        </div>
                        <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px" aria-expanded="false"
                             style="visibility: hidden">
                            <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                            <span class="svg-icon svg-icon-xl svg-icon-primary">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                     version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path
                                            d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path
                                            d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z"
                                            fill="#000000"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            </div>
                        </div>
                    @endif
                </div>
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 mt-3 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg" style="">
                    <!--begin:Header-->
                    <div class="d-flex flex-column flex-center py-10 bgi-size-cover bgi-no-repeat rounded-top"
                         style="background-image: url(assets/media/misc/bg-1.jpg)">
                        <h4 class="font-weight-bold">{{__('View wallet inventory')}}</h4>
                        <a href="{{asset('user/user-profile/bank-account')}}"><span
                                class="btn btn-success btn-sm font-weight-bold font-size-sm mt-2">{{__('requests')}}</span></a>
                    </div>
                    <!--end:Header-->
                    <!--begin:Nav-->
                    <div class="row row-paddingless">
                        <!--begin:Item-->
                        <div class="col-6">
                            <a href="#" class="d-block py-10 px-5 text-center bg-hover-light border-right ">
                                <span
                                    class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">{{__('Accounting')}}</span>
                                <span class="d-block text-dark-50 font-size-lg">500000</span>
                            </a>
                        </div>
                        <!--end:Item-->
                        <!--begin:Item-->
                        <div class="col-6">
                            <a href="#" class="d-block py-10 px-5 text-center bg-hover-light ">
                                <span
                                    class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">{{__('pick accounts')}}</span>
                                <span class="d-block text-dark-50 font-size-lg">500000</span>
                            </a>
                        </div>
                        <!--end:Item-->

                    </div>
                    <!--end:Nav-->
                </div>
                <!--end::Dropdown-->
            </div>

            <div class="btn w-auto d-flex align-items-center pr-15"
                 id="kt_quick_user_toggle">
                <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-4">{{auth()->user()->email}}</span>
                <img class="h-50px w-50px rounded-circle" src="{{$user->profile->getAvatar()}}" alt=""/>
            </div>

        </div>
        <!--end::User-->
    </div>
    <!--end::Topbar-->
</div>
<!--end::Container-->
<!--end::Header-->
@push('styles')
    <link href="{{asset('assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.bundle.rtl.css" rel="stylesheet')}}" type="text/css">
@endpush

