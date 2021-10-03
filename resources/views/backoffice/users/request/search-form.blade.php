<form action="#">
    <div class="row justify-content-center">
        <div class="col-lg-11 d-flex p-0">
            <div class="p-2 my-2 my-md-0">
                <div class="input-group input-group-lg input-group-solid">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="la flaticon-email"></i>
                    </span>
                    </div>
                    <input type="text" class="form-control form-control-lg form-control-solid"
                           placeholder="{{__('Email')}}"
                           name="email"
                    value="{{request('email')}}">
                </div>
            </div>
            <div class="p-2 my-2 my-md-0">
                <div class="input-group input-group-lg input-group-solid">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="la fa-id-card"></i>
                    </span>
                    </div>
                    <input type="text" class="form-control form-control-lg form-control-solid"
                           value="{{request('reference_id')}}"
                           placeholder="{{__('Reference ID')}}" name="reference_id">
                </div>
            </div>
            <div class="p-2 my-2 my-md-0">
                <div
                    class="input-group input-group-lg input-group-solid range-from-example pwt-datepicker-input-element datepicker-font">
                    <div class="input-group-prepend datepicker-font">
                    <span class="input-group-text datepicker-font">
                        <i class="la la-calendar"></i>
                    </span>
                    </div>
                    <input name="paid_at" type="text"
                           class="form-control form-control form-control-lg pay-date pwt-datepicker-input-element range-from-example"
                           value="{{request('paid_at')}}"
                           placeholder="تاریخ">
                </div>
            </div>
            <div class="p-2 my-2 my-md-0">
                <select class="form-control form-control-lg form-control-solid p-0 input-width" name="request_type"
                        id="kt_datatable_search_type">
                    <option value="">{{__('Request type')}} </option>
                    @foreach(\App\Constants\RequestConstants::$type as $type)
                        <option
                            @if(request('request_type') == $type) selected @endif
                            value="{{$type}}">{{__($type)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="p-2">
                <button class="btn btn-light-dark font-weight-bold h-40px font-size-link">جستجو....</button>
            </div>
        </div>
    </div>
</form>
@push('styles')
    <link href="{{asset('assets/css/persian-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@push('scripts')
    <script src="{{asset('assets/js/Calendar.js')}}"></script>
    <script src="{{asset('assets/js/persian-date.min.js')}}"></script>
    <script src="{{asset('assets/js/persian-datepicker.min.js')}}"></script>
@endpush
