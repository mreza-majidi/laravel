@extends('layouts.panel')

@section('title' , 'نتایج تراکنش ها')

@section('content')
    <!--begin::Subheader-->
    @include('user.transactions.subheader')
    <!--end::Subheader-->
    <div class="container">
        <div class="row bg-white rounded">
            <div class="col-xl-12 order-2 order-xxl-1">
                @include('user.transactions.search-bar')
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
                                            <th style="min-width: 200px" class="text-center">{{__('transaction code')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('date')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('clock')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('Amount')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('situation')}}</th>
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
                                                <span class="text-muted font-weight-bold">20:20</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-muted font-weight-bold">2000000ریال</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="label label-lg label-light-success label-inline">{{__('dispose')}}</span>
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
                                            <th style="min-width: 200px" class="text-center">{{__('transaction code')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('date')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('clock')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('Amount')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('situation')}}</th>
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
                                                <span class="text-muted font-weight-bold">20:20</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-muted font-weight-bold">2000000ریال</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="label label-lg label-light-success label-inline">{{__('dispose')}}</span>
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
                                            <th style="min-width: 200px" class="text-center">{{__('transaction code')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('date')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('clock')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('Amount')}}</th>
                                            <th style="min-width: 200px" class="text-center">{{__('situation')}}</th>
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
                                                <span class="text-muted font-weight-bold">20:20</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-muted font-weight-bold">2000000ریال</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="label label-lg label-light-danger label-inline">{{__('harvest')}}</span>
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
                <!--end::Advance Table Widget 2-->
    </div>
@endsection
@push('styles')
    <link href="{{asset('assets/css/persian-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@push('scripts')
    <script src="{{asset('assets/js/Calendar.js')}}"></script>
    <script src="{{asset('assets/js/persian-date.min.js')}}"></script>
    <script src="{{asset('assets/js/persian-datepicker.min.js')}}"></script>
@endpush
