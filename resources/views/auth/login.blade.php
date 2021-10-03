@extends('layouts.main')
@section('title', 'فرم ورود')
@section('body')
{{--@dd(session()->get('previous-route'))--}}
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div
            class="login login-5 @if (session()->has('previous-route') && session()->get('previous-route') ==  'website.web.auth.register') login-signup-on @elseif(request()->is('auth/forgot-password/*'))  login-reset-on @elseif(session()->get('uri') == 'forgot-password') login-forgot-on @endif login-signin-on d-flex flex-row-fluid"
            id="kt_login">
            <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid"
                 style="background-image: url({{asset('assets/media/bg/bg-2.jpg')}});">
                <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                    <!--begin::Login Header-->
                    <div class="d-flex flex-center mb-15">
                        <a href="#" class=" font-weight-bolder" style="color:#f1c40f;font-size:50px">
                            <img src="{{asset('assets/img/LOGO/LOGO.png')}}" alt="">
                        </a>
                    </div>
                    <!--end::Login Header-->
                    @include('auth.sign-in')
                    @include('auth.sign-up')
                    @include('auth.forget-password')
                    @include('auth.reset-password')
                </div>
            </div>
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->

@endsection
@push('styles')
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{asset('assets/css/pages/login/classic/login-5.rtl.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Page Custom Styles-->
@endpush
@push('scripts')
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets/js/pages/custom/login/login-general.js')}}"></script>
    <!--end::Page Scripts-->
    <script src="https://www.google.com/recaptcha/api.js?render={{ env('GOOGLE_CAPTCHA_PUBLIC_KEY') }}"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('{{env('GOOGLE_CAPTCHA_PUBLIC_KEY')}}').then(function (token) {
                var recaptchaInputs = document.getElementsByClassName("recaptcha-input");
                foreach(recaptchaInputs, function (element) {
                    element.value = token;
                });
            });
        });
    </script>
@endpush
