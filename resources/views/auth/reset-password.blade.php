<!--begin::Login reset password form-->
<div class="login-reset">
    <div class="fv-plugins-message-container  mb-6">
        <div class="fv-help-block text-success">
            @if(session()->has('message'))
                {{ session()->get('message') }}
            @endif
        </div>
    </div>
    <form class="form" id="kt_login_reset_form" action="" method="post">
        @csrf
        <input type="hidden" name="email" value="{{ $email ?? '' }}">
        <div class="form-group">
            <input
                class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8"
                type="password" placeholder="{{__('New Password')}}" name="password"/>
        </div>
        <div class="form-group">
            <input
                class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8"
                type="password" placeholder="{{__('Confirm Password')}}" name="password_confirmation"/>
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
            <button id="kt_login_reset_submit"
                    class="btn btn-pill btn-primary opacity-90 px-15 py-3 m-2">{{__('Request')}}
            </button>
            <button id="kt_login_reset_cancel"
                    class="btn btn-pill btn-outline-white opacity-70 px-15 py-3 m-2">{{__('Cancel')}}
            </button>
        </div>
    </form>

</div>
<!--end::Login reset password form-->
