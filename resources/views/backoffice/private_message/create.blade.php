@extends('layouts.panel')

@section('title', 'پیام خصوصی')

@section('content')

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
        @include('backoffice.users.general-message.subheader')
        <!--begin::Container-->
            <div class="container">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-8 offset-2">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b example example-compact">
                            <div class="card-header">
                                <h3 class="card-title">ایجاد پیام خصوصی</h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" method="post"
                                  action="{{route('backoffice.private_message.store')}}">
                                @csrf
                                <div class="form-group row pt-10 mb-4">
                                    <label
                                        class="col-form-label text-right col-lg-3 col-sm-12">کاربر</label>
                                    <div class="col-lg-6 col-md-9 col-sm-12">
                                        <select class="form-control form-control-lg form-control-solid" name="user">
                                            @foreach($users as $user)
                                                <option value="{{$user->uuid}}">{{$user->getFullName()}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row pt-3">
                                    <label
                                        class="col-form-label text-right col-lg-3 col-sm-12 ">موضوع</label>
                                    <div class="col-lg-6 col-md-9 col-sm-12">
                                        <input name="title" type="text"
                                               class="form-control form-control-lg form-control-solid"
                                               placeholder="موضوع">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label
                                        class="col-form-label text-right col-lg-3 col-sm-12 ">{{__('message')}}</label>
                                    <div class="col-lg-6 col-md-9 col-sm-12">
                                        <textarea name="text" type="text"
                                                  class="form-control form-control-lg form-control-solid"
                                                  placeholder="متن">
                                        </textarea>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-8 ml-lg-auto ">
                                            <button type="submit"
                                                    class="btn btn-light-dark font-weight-bold h-40px w-100px font-size-link">{{__('Submit')}}</button>
                                            <button type="reset"
                                                    class="btn btn-secondary h-40px w-100px">{{__('Cancel')}}</button>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Card-->
                </div>
                @endsection

                @push('styles')
                    <link href="{{asset('assets/css/pages/profile/request.css')}}" rel="stylesheet" type="text/css"/>
                    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
                    <link href="{{asset('assets/css/persian-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
                    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
                          rel="stylesheet"/>

                @endpush

                @push('scripts')
                    <script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-touchspin.js')}}"></script>
                    <script src="{{asset('assets/js/persian-date.min.js')}}"></script>
                    <script src="{{asset('assets/js/persian-datepicker.min.js')}}"></script>
                    <script src="{{asset('assets/js/date-hour/calender-date-hour.js')}}"></script>
                    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

                    <script>
                        // In your Javascript (external .js resource or <script> tag)
                        $('#kt_select2_1').select2({
                            placeholder: 'select user ...'
                        });
                    </script>
                @endpush

