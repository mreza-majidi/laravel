@extends('layouts.panel')

@section('title' , 'اعلانات')
@section('content')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div
            class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{__('Announcement')}}</h5>
                <!--end::Page Title-->

                <!--begin::Breadcrumb-->

                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->

        </div>
    </div>
    <!--end::Subheader-->
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <!--begin::Widget 15-->
                <div class="card card-custom card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 mt-5">
                        <h3 class="card-title align-items-start flex-column text-dark">
                            <span class="font-weight-bolder text-dark">نمایش اعلانات</span>
                            <span
                                class="text-muted mt-3 font-weight-bold font-size-md">{{count($announcements)}}</span>
                        </h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="{{route('backoffice.announcement.create')}}"
                                   class="btn btn-light-dark font-weight-bold h-40px font-size-link">ایجاد اعلان</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_2">
                                <thead>
                                <tr class="text-uppercase">
                                    <th>#</th>
                                    <th style="min-width: 150px" class="text-center">اولوین</th>
                                    <th style="min-width: 250px" class="text-center">متن</th>
                                    <th class="text-center" style="min-width: 160px">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($announcements as $announcement)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td class="text-center">

                                            {{__($announcement->priority)}}
                                        </td>
                                        <td class="text-center">
                                        <span
                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$announcement->text}}</span>
                                        </td>

                                        <td class="text-center d-flex justify-content-center">
                                            <a href="{{route('backoffice.announcement.edit',$announcement->getUuid())}}"
                                               class="btn border-secondary p-1">
                                                <i class="flaticon-edit text-dark" style="font-size:15px"></i></a>
                                            </span>
                                            <form
                                                action="{{ route('backoffice.announcement.delete', $announcement->getUuid()) }}"
                                                method="post" style="display: contents">
                                                @csrf
                                                @method('delete')
                                                <button class="btn border-secondary p-1 ml-3">
                                                    <i class="flaticon2-trash text-danger"
                                                       style="font-size:15px">
                                                    </i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <div class="card-footer">
                        {{$announcements->links('vendor.pagination.admin-pagination')}}

                    </div>

                    <!--end::Header-->

                </div>
                <!--end::Widget 15-->
            </div>
        </div>
    </div>
    </div>

@endsection
@push('styles')
    <link href="{{asset('assets/backoffice/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css')}}" rel="stylesheet"
          type="text/css"/>
@endpush
@push('scripts')
    <script src="{{asset('assets/backoffice/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
    <script src="{{asset('assets/backoffice/js/pages/widgets.js')}}"></script>
@endpush
