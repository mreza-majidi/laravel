@extends('layouts.panel')

@section('title', 'صفحه مشاهده درخواست ها')
@section('content')

    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div
            class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{__('Request Page')}}</h5>
                <!--end::Page Title-->

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">{{__('Users')}}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">{{__('Request of harvest and harvest')}}</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->

        </div>
    </div>
    <!--end::Subheader-->

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row bg-white rounded">
                <div class="col-xl-12 order-2 order-xxl-1">
                        @include('backoffice.users.request.search-form')
                        <div class="card-header border-0 pt-5">
                            <div class="card-toolbar">
                                <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4 active" data-toggle="tab" href="#kt_tab_pane_11_3">{{__('day')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_11_2">{{__('week')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_11_1">{{__('mounth')}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    <div class="card-body pt-2 pb-0 mt-n3">
                        <div class="tab-content mt-5" id="myTabTables11">
                            <!--begin::Tap pane-->
                            <div class="tab-pane fade" id="kt_tab_pane_11_1" role="tabpanel" aria-labelledby="kt_tab_pane_11_1">
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                        <thead>
                                        <tr class="text-uppercase">
                                            <th style="min-width: 200px" class="text-center">{{__('User name')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('Code')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('date')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('Email')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('situation')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('Action')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                    {{__('User name')}}
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-dark-75 font-weight-bold d-block text-muted font-size-lg">31684616874584</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-muted font-weight-bold">1399/9/23</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-muted font-weight-bold">user@gmail.com</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="label label-lg label-light-success label-inline">{{__('dispose')}}</span>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-light-dark font-weight-bold h-40px w-100px font-size-link success">{{__('Submit')}}</button>
                                                <button type="button" class="btn btn-secondary h-40px w-100px cancel">{{__('Cancel')}}</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Tap pane-->
                            <!--begin::Tap pane-->
                            <div class="tab-pane fade" id="kt_tab_pane_11_2" role="tabpanel" aria-labelledby="kt_tab_pane_11_2">
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                        <thead>
                                        <tr class="text-uppercase">
                                            <th style="min-width: 200px" class="text-center">{{__('User name')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('Code')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('date')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('Email')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('situation')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('Action')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                    {{__('User name')}}
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-dark-75 font-weight-bold d-block text-muted font-size-lg">31684616874584</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-muted font-weight-bold">1399/9/23</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-muted font-weight-bold">user@gmail.com</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="label label-lg label-light-success label-inline">{{__('dispose')}}</span>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-light-dark font-weight-bold h-40px w-100px font-size-link success">{{__('Submit')}}</button>
                                                <button type="button" class="btn btn-secondary h-40px w-100px cancel">{{__('Cancel')}}</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Tap pane-->
                            <!--begin::Tap pane-->
                            <div class="tab-pane fade active show" id="kt_tab_pane_11_3" role="tabpanel" aria-labelledby="kt_tab_pane_11_3">
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                        <thead>
                                        <tr class="text-uppercase">
                                            <th style="min-width: 200px" class="text-center">{{__('User name')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('Code')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('date')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('Email')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('situation')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('Action')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                    {{__('User name')}}
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-dark-75 font-weight-bold d-block text-muted font-size-lg">31684616874584</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-muted font-weight-bold">1399/9/23</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-muted font-weight-bold">user@gmail.com</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="label label-lg label-light-danger label-inline">{{__('harvest')}}</span>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-light-dark font-weight-bold h-40px w-100px font-size-link success">{{__('Submit')}}</button>
                                                <button type="button" class="btn btn-secondary h-40px w-100px cancel">{{__('Cancel')}}</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Tap pane-->
                        </div>
                    </div>
                        <!--end::Body-->
                    </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
@push('styles')
    <link href="{{asset('assets/css/pages/backoffice/user-request.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
    <script src="{{asset('assets/js/pages/crud/cancel/cancel.js')}}"></script>
    <script src="{{asset('assets/js/pages/crud/success/approve.js')}}"></script>
@endpush



