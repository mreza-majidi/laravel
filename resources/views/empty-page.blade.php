@extends('layouts.panel')

@section('title', ' صفحه خالی')
@section('content')

    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div
            class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Empty Page</h5>
                <!--end::Page Title-->

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">General</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">Empty Page</a>
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
                        <div class="row justify-content-center">
                                    <div class="col-lg-11 d-flex p-0">
                                        <div class="p-2 my-2 my-md-0">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-user-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control form-control-lg form-control-solid" placeholder="نام کاربر">
                                            </div>
                                        </div>
                                        <div class="p-2 my-2 my-md-0">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-sort-numeric-asc"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control form-control-lg form-control-solid" placeholder="شناسه تراکنش">
                                            </div>
                                        </div>
                                        <div class="p-2 my-2 my-md-0">
                                            <div class="input-group input-group-lg input-group-solid range-to-example pwt-datepicker-input-element">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-calendar"></i>
                                                    </span>
                                                </div>
                                                <input name="paidAt" type="text" class="form-control form-control form-control-lg pay-date pwt-datepicker-input-element range-from-example" placeholder="از تاریخ">
                                            </div>
                                        </div>
                                        <div class="p-2 my-2 my-md-0">
                                            <div class="input-group input-group-lg input-group-solid range-from-example pwt-datepicker-input-element">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-calendar"></i>
                                                    </span>
                                                </div>
                                                <input name="paidAt" type="text" class="form-control form-control form-control-lg pay-date pwt-datepicker-input-element range-from-example" placeholder="تا تاریخ">
                                            </div>
                                        </div>
                                        <div class="p-2 my-2 my-md-0 input-group-solid">
                                            <select class="form-control form-control-lg form-control-solid p-0" id="kt_datatable_search_type">
                                                <option value=""></option>
                                                <option value="1">واریز</option>
                                                <option value="2">برداشت</option>
                                            </select>
                                        </div>
                                        <div class="p-2">
                                            <button type="button" class="btn btn-outline-primary form-control form-control-lg">جستجو....</button>
                                        </div>
                                    </div>
                                    </div>
    
                        <div class="card-header border-0 pt-5">
                            <div class="card-toolbar">
                                <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4 active" data-toggle="tab" href="#kt_tab_pane_11_3">روز</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_11_2">هفته</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_11_1">ماه</a>
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
                                                <th style="min-width: 200px" class="text-center">نام کاربر</th>
                                                <th style="min-width: 200px" class="text-center">شناسه تراکنش</th>
                                                <th style="min-width: 200px" class="text-center">تاریخ</th>
                                                <th style="min-width: 200px" class="text-center">مبلغ</th>
                                                <th style="min-width: 200px" class="text-center">وضعیت</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="text-center">
                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                        نام کاربر
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-dark-75 font-weight-bold d-block text-muted font-size-lg">31684616874584</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-muted font-weight-bold">1399/9/23</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-muted font-weight-bold">2000000ریال</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="label label-lg label-light-success label-inline">واریز</span>
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
                                                <th style="min-width: 200px" class="text-center">نام کاربر</th>
                                                <th style="min-width: 200px" class="text-center">شناسه تراکنش</th>
                                                <th style="min-width: 200px" class="text-center">تاریخ</th>
                                                <th style="min-width: 200px" class="text-center">مبلغ</th>
                                                <th style="min-width: 200px" class="text-center">وضعیت</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="text-center">
                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                        نام کاربر
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-dark-75 font-weight-bold d-block text-muted font-size-lg">31684616874584</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-muted font-weight-bold">1399/9/23</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-muted font-weight-bold">2000000ریال</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="label label-lg label-light-success label-inline">واریز</span>
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
                                                <th style="min-width: 200px" class="text-center">نام کاربر</th>
                                                <th style="min-width: 200px" class="text-center">شناسه تراکنش</th>
                                                <th style="min-width: 200px" class="text-center">تاریخ</th>
                                                <th style="min-width: 200px" class="text-center">مبلغ</th>
                                                <th style="min-width: 200px" class="text-center">وضعیت</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="text-center">
                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                        نام کاربر
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-dark-75 font-weight-bold d-block text-muted font-size-lg">31684616874584</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-muted font-weight-bold">1399/9/23</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-muted font-weight-bold">2000000ریال</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="label label-lg label-light-danger label-inline">برداشت</span>
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

@endpush
@push('scripts')

@endpush
