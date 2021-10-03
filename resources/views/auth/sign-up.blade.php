<!--begin::Login Sign up form-->
<div class="login-signup">
    <div class="mb-20">
        <h3 class="opacity-40 font-weight-normal">{{__('Sign Up')}}</h3>
        <p class="opacity-40">{{__('Enter your details to your account:')}}</p>
    </div>
    <form class="form text-center" id="kt_login_signup_form" action="{{ route('website.web.auth.register') }}" method="post">
        @csrf
        <div class="form-group">
            <input
                class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8"
                type="text" placeholder="{{__('Email')}}" name="email" autocomplete="off"/>
            @error('email')
            <div class="fv-plugins-message-container alert-top">
                <div class="fv-help-block">{{ $message }}</div>
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
            <input
                class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8"
                type="password" placeholder="{{__('Confirm Password')}}" name="password_confirmation"/>
            @error('password_confirmation')
            <div class="fv-plugins-message-container alert-top">
                <div class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror
        </div>
        <div class="form-group text-left px-8">
            <div class="checkbox-inline">
                <label class="checkbox checkbox-outline checkbox-white opacity-60 text-white m-0">
                    <input type="checkbox" name="agree"/>
                    <span></span>{{__('terms and conditions')}}
                    <a href="#" class="text-white font-weight-bold ml-1">
                        {{__('I Agree the')}}
                    </a></label>
            </div>
            <div class="form-text text-muted text-center"></div>
            <div class="form-group">
                <input type="hidden" name="recaptcha_token" class="recaptcha-input">
                {{-- Show the user the recaptcha_token error. --}}
                @if($errors->has('recaptcha_token'))
                    <div class="fv-plugins-message-container alert-top">
                        <div class="fv-help-block">{{$errors->first('recaptcha_token')}}</div>
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <button id="kt_login_signup_submit" type="submit"
                    class="btn btn-pill btn-primary opacity-90 px-15 py-3 m-2">{{__('Sign Up')}}
            </button>
            <button id="kt_login_signup_cancel"
                    class="btn btn-pill btn-outline-white opacity-70 px-15 py-3 m-2">{{__('Cancel')}}
            </button>
        </div>
    </form>
</div>
<!--end::Login Sign up form-->
