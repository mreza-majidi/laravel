<!--begin::Login Sign in form-->
<div class="login-signin">
    <div class="mb-20">

        <p class="opacity-40">{{__('Enter your details to your account:')}}</p>
    </div>
    <form class="form" id="kt_login_signin_form" action="{{ route('website.web.auth.login') }}" method="POST">
        @csrf
        <div class="fv-plugins-message-container  mb-6">
            <div class="fv-help-block text-success">
                @if(session()->has('message'))
                    {{ session()->get('message') }}
                @endif
            </div>
        </div>
        <div class="form-group">
            <input
                class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8"
                type="text" placeholder="{{__('Email')}}" name="email" autocomplete="off"/>
            @error('email')
            <div class="fv-plugins-message-container alert-top">
                <div class="fv-help-block">{{ $message }} </div>
            </div>
            @enderror
        </div>

        <div class="form-group">
            <input
                class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8"
                type="password" placeholder="{{__('Password')}}" name="password"/>
            @error('password')
            <div class="fv-plugins-message-container alert-top">
                <div class="fv-help-block">{{ $message }} </div>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <input type="hidden" name="recaptcha_token" class="recaptcha-input">
            {{-- Show the user the recaptcha_token error. --}}
            @if($errors->has('recaptcha_token'))
                <div class="fv-plugins-message-container alert-top">
                    <div class="fv-help-block">{{$errors->first('recaptcha_token')}}</div>
                </div>
            @endif
        </div>
        <div
            class="form-group d-flex flex-wrap justify-content-between align-items-center px-8 opacity-60">
            <div class="checkbox-inline">
                <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                    <input type="checkbox" name="remember"/>
                    <span></span>{{__('Remember me')}}</label>
            </div>
            <a href="javascript:;" id="kt_login_forgot"
               class="text-white font-weight-bold">{{__('Forget Password ?')}}</a>
        </div>
        <div class="form-group text-center mt-10">
            <button id="kt_login_signin_submit" type="submit"
                    class="btn btn-pill btn-primary opacity-90 px-15 py-3">{{__('Sign In')}}
            </button>
        </div>
    </form>
    <div class="mt-10">
        <span class="opacity-40 mr-4">{{__("Don't have an account yet?")}}</span>
        <a href="javascript:;" id="kt_login_signup"
           class="text-white opacity-30 font-weight-normal">{{__('Sign Up')}}</a>
    </div>
</div>
<!--end::Login Sign in form-->
