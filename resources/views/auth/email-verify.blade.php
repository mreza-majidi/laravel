@extends('layouts.panel')

@section('title' , 'تایید ایمیل')

@section('content')
    <style>
        .digit-group {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
        }

        .digit-group input {
            width: 50px;
            height: 50px;
            background-color: transparent;
            border: none;
            border-bottom: 1px solid black;
            line-height: 50px;
            text-align: center;
            font-size: 24px;
            font-family: "Raleway", sans-serif;
            font-weight: 200;
            margin: 0 2px;
        }

        .digit-group .splitter {
            padding: 0 5px;
            font-size: 24px;
        }

    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 rounded bg-white p-5">
                <form action="{{ route('website.web.auth.verification.check') }}" method="post" id="verificationForm"
                      onsubmit="onFormSubmit(this)">
                    @csrf
                    <div class="form-group row">
                        <label class="col-xl-12 col-lg-3 text-center font-weight-bold col-form-label">تایید
                            ایمیل</label>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-xl-8">
                            <div class="digit-group text-center">
                                <input type="text" class="digits" id="digit-1" name="digit-1" tabindex="0"
                                       @if(strpos(($_SERVER['HTTP_USER_AGENT']), 'Chrome'))
                                       onkeyup="changeFocus(this);"
                                       @else
                                       onkeypress="changeFocus(this);"
                                       @endif
                                       maxlength="1"/>
                                <input type="text" class="digits" id="digit-2" name="digit-2" tabindex="1"
                                       @if(strpos(($_SERVER['HTTP_USER_AGENT']), 'Chrome'))
                                       onkeyup="changeFocus(this)"
                                       @else
                                       onkeypress="changeFocus(this)"
                                       @endif
                                       maxlength="1"/>
                                <input type="text" class="digits" id="digit-3" name="digit-3" tabindex="2"
                                       @if(strpos(($_SERVER['HTTP_USER_AGENT']), 'Chrome'))
                                       onkeyup="changeFocus(this)"
                                       @else
                                       onkeypress="changeFocus(this)"
                                       @endif
                                       maxlength="1"/>
                                <input type="text" class="digits" id="digit-4" name="digit-4" tabindex="3"
                                       @if(strpos(($_SERVER['HTTP_USER_AGENT']), 'Chrome'))
                                       onkeyup="changeFocus(this)"
                                       @else
                                       onkeypress="changeFocus(this)"
                                       @endif
                                       maxlength="1"/>
                                <input type="text" class="digits" id="digit-5" name="digit-5" tabindex="4"
                                       @if(strpos(($_SERVER['HTTP_USER_AGENT']), 'Chrome'))
                                       onkeyup="changeFocus(this)"
                                       @else
                                       onkeypress="changeFocus(this)"
                                       @endif
                                       maxlength="1"/>
                            </div>
                            <div class="input-group input-group-lg input-group-solid">
                                <input type="hidden" id="code"
                                       name="code" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-dark w-25 mt-8">تایید</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function changeFocus(element) {
            let currentTabIndex = element.tabIndex, elements;
            if (currentTabIndex < 5) {
                elements = $('.digits');
                currentTabIndex++;
                for (let i = 0; i < elements.length; i++) {
                    if (elements[i].tabIndex === currentTabIndex) {
                        elements[i].focus();
                    }
                }
            }
        }
        function onFormSubmit() {
            var digits = $('.digits');
            var code = '';
            for (var i = 0; i < digits.length; i++) {
                code = code + $(digits[i]).val();
            }

            $('#code').val(code);
        }

    </script>
@endpush
