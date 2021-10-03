<div class="form-group row">

    <label
        class="col-form-label text-right col-lg-3 col-sm-12 ">{{__('Priority')}}</label>
    <div class="col-lg-6 col-md-9 col-sm-12">
        <select
            class="form-control form-control form-control-lg form-control-solid pb-2" name="priority">
            <optgroup label="{{__('Priority')}}">
                @php($comparableValue = isset($announcement) ? $announcement->priority : old('priority'))
                @foreach(\App\Constants\AnnouncementConstants::PRIORITIES as $priority)
                    <option
                        {{$comparableValue == $priority ? 'selected' : ''}} value="{{$priority}}">{{__($priority)}}</option>
                @endforeach
            </optgroup>
        </select>
    </div>
    @include('backoffice.partials.form-error',['field'=>'priority'])
</div>

<div class="form-group row">

    <label
        class="col-form-label text-right col-lg-3 col-sm-12 ">{{__('Announcement Status')}}</label>
    <div class="col-lg-6 col-md-9 col-sm-12">
        @php($comparableValue = isset($announcement) ? $announcement->is_active : old('is_active'))
        <select
            class="form-control form-control form-control-lg form-control-solid pb-2" name="is_active">
            <optgroup label="وضعیت">
                <option
                    {{$comparableValue == 1 ? 'selected' : ''}}
                    value="1" name="is_active">{{__('active')}}</option>
                <option
                    {{$comparableValue == 0 ? 'selected' : ''}}
                    value="0" name="is_active">{{__('Deactivate')}}</option>
            </optgroup>
        </select>
    </div>
    @include('backoffice.partials.form-error',['field'=>'is_active'])
</div>

<div class="form-group row">
    <label
        class="col-lg-3 col-sm-12 text-right col-form-label my-auto">{{__('from date')}}</label>
    <div class="col-lg-6 col-md-9 col-sm-12">
        <div
            class="input-group input-group-lg input-group-solid range-from-example pwt-datepicker-input-element datepicker-font">
            <div class="input-group-prepend datepicker-font">
                                                <span class="input-group-text datepicker-font">
                                                    <i class="la la-calendar"></i>
                                                </span>
            </div>
            <input name="begin" type="text"
                   @if(isset($announcement))
                   value="{{convertDateTimeToJalali($announcement->begin)}}"
                   @else
                   value="{{old('begin')}}"
                   @endif
                   class="form-control form-control form-control-lg bb-date-picker pwt-datepicker-input-element"
                   placeholder="تاریخ">
        </div>
    </div>
    @include('backoffice.partials.form-error',['field'=>'begin'])
</div>

<div class="form-group row">
    <label
        class="col-lg-3 col-sm-12 text-right col-form-label my-auto">{{__('to date')}}</label>
    <div class="col-lg-6 col-md-9 col-sm-12">
        <div
            class="input-group input-group-lg input-group-solid range-from-example pwt-datepicker-input-element datepicker-font">
            <div class="input-group-prepend datepicker-font">
                                                <span class="input-group-text datepicker-font">
                                                    <i class="la la-calendar"></i>
                                                </span>
            </div>
            <input name="end" type="text"
                   @if(isset($announcement))
                   value="{{convertDateTimeToJalali($announcement->end)}}"
                   @else
                   value="{{old('end')}}"
                   @endif
                   class="form-control form-control form-control-lg bb-date-picker pwt-datepicker-input-element"
                   placeholder="تاریخ">
        </div>
    </div>
    @include('backoffice.partials.form-error',['field'=>'end'])
</div>

<div class="form-group row ">
    <label
        class="col-form-label text-right col-lg-3 col-sm-12 ">{{__('message')}}</label>
    <div class="col-lg-6 col-md-9 col-sm-12">
                                                <textarea name="description" type="text"
                                                          class="form-control form-control-lg form-control-solid"
                                                          placeholder="{{__('Descriptions')}}">@if(isset($announcement)){{$announcement->text}}@else{{old('text')}}@endif</textarea>
    </div>
    @include('backoffice.partials.form-error',['field'=>'description'])
</div>
