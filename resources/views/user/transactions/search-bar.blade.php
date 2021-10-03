<div class="row justify-content-center">
    <div class="col-lg-11 d-flex p-0">
        <div class="p-2 my-2 my-md-0">
            <div class="input-group input-group-lg input-group-solid">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="la la-user-alt"></i>
                    </span>
                </div>
                <input type="text" class="form-control form-control-lg form-control-solid" placeholder="{{__('User name')}}">
            </div>
        </div>
        <div class="p-2 my-2 my-md-0">
            <div class="input-group input-group-lg input-group-solid">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="la la-sort-numeric-asc"></i>
                    </span>
                </div>
                <input type="text" class="form-control form-control-lg form-control-solid" placeholder="{{__('transaction code')}}">
            </div>
        </div>
        <div class="p-2 my-2 my-md-0">
            <div class="input-group input-group-lg input-group-solid range-to-example">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="la la-calendar"></i>
                    </span>
                </div>
                <input name="paidAt" type="text" class="form-control form-control form-control-lg pay-date pwt-datepicker-input-element range-from-example" placeholder="از تاریخ">
            </div>
        </div>
        <div class="p-2 my-2 my-md-0">
            <div class="input-group input-group-lg input-group-solid range-from-example">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="la la-calendar"></i>
                    </span>
                </div>
                <input name="paidAt" type="text" class="form-control form-control form-control-lg pay-date pwt-datepicker-input-element range-from-example"  placeholder="تا تاریخ">
            </div>
        </div>

        <div class="p-2 my-2 my-md-0">
            <div class="input-group input-group-lg input-group-solid">
                <div class="input-group-prepend">
            <select class="form-control form-control-lg form-control-solid p-0 input-width" id="kt_datatable_search_type">
                <option value=""></option>
                <option value="1">{{__('dispose')}}</option>
                <option value="2">{{__('harvest')}}</option>
            </select>
                </div>
            </div>
        </div>
        <div class="p-2">
            <button type="button" class="btn btn-light-dark font-weight-bold h-40px w-100px font-size-link">{{__('search')}}</button>
        </div>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
@endpush
