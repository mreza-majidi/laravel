<!--begin::Login forgot password form-->
<div class="login-forgot">
    <div class="mb-20">
        <h3 class="opacity-40 font-weight-normal">{{__('Forget Password ?')}}</h3>
        <p class="opacity-40">{{__('Enter your email')}}</p>
    </div>
    <form class="form" id="kt_login_forgot_form" action="{{ route('website.web.auth.send_forgot_password_link') }}" method="post">
        @csrf
        <div class="fv-plugins-message-container  mb-6">
            <div class="fv-help-block text-success">
                @if(session()->has('message'))
                    {{ session()->get('message') }}
                @endif
            </div>
        </div>
        <div class="form-group mb-10">
            <input
                class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8"
                type="text" placeholder="{{__('Email')}}" name="email" autocomplete="off"/>
        </div>
        <div class="form-group">
            <input type='hidden' name='recaptcha_token' class="recaptcha-input">
            {{-- Show the user the recaptcha_token error. --}}
            @if($errors->has('recaptcha_token'))
                <div class="fv-plugins-message-container alert-top">
                    <div class="fv-help-block">{{$errors->first('recaptcha_token')}}</div>
                </div>
            @endif
        </div>
        <div class="form-group">
            <button id="kt_login_forgot_submit"
                    class="btn btn-pill btn-primary opacity-90 px-15 py-3 m-2">{{__('Request')}}
            </button>
            <button id="kt_login_forgot_cancel"
                    class="btn btn-pill btn-outline-white opacity-70 px-15 py-3 m-2">{{__('Cancel')}}
            </button>
        </div>
    </form>
</div>
<!--end::Login forgot password form-->
