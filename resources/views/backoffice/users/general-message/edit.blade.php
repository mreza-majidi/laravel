@extends('layouts.panel')

@section('title', 'پیام عمومی')

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
                                <h3 class="card-title">{{__('Announcement')}}</h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" method="post"
                                  action="{{route('backoffice.announcement.update',$announcement)}}">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    @include('backoffice.users.general-message.form-fields')
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-8 ml-lg-auto ">
                                            <button type="submit"
                                                    class="btn btn-primary mr-1 w-100px">{{__('Submit')}}</button>
                                            <button type="reset"
                                                    class="btn btn-secondary w-100px">{{__('Cancel')}}</button>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection

@push('styles')
    <link href="{{asset('assets/css/pages/profile/request.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link href="{{asset('assets/css/persian-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush

@push('scripts')
    <script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-touchspin.js')}}"></script>
    <script src="{{asset('assets/js/persian-date.min.js')}}"></script>
    <script src="{{asset('assets/js/persian-datepicker.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.bb-date-picker').pDatepicker({
                initialValue: false,
                format: 'L',
                timePicker: {
                    enabled: false
                },
                autoClose: true,
            });
        });
    </script>
@endpush
