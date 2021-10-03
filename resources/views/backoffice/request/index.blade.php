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
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{__('Requests')}}</h5>
                <!--end::Page Title-->

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">{{__('Users')}}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">{{__('Requests list')}}</a>
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

                    <div class="card-body pt-2 pb-0 mt-n3">
                        <div class="tab-content mt-5" id="myTabTables11">
                            <!--begin::Table-->
                            <div class="tab table-responsive">
                                <table
                                    class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                    <thead>
                                    <tr class="text-uppercase">
                                        <th class="text-center">{{__('User name')}}</th>
                                        <th class="text-center">{{__('Reference ID')}}</th>
                                        <th class="text-center">{{__('Request date')}}</th>
                                        <th class="text-center">{{__('Amount')}}</th>
                                        <th class="text-center">{{__('wallet type')}}</th>
                                        <th class="text-center">{{__('Status')}}</th>
                                        <th class="text-center">{{__('Type')}}</th>
                                        <th class="text-center">{{__('Action')}}</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($requestModel as $request)
                                        <tr>
                                            <td class="text-center">
                                                <a href="#"
                                                   class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                    {{$request->user->getFullName()}}
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                        <span
                                                            class="text-dark-75 font-weight-bold d-block text-muted font-size-lg">
                                                                {{$request->getReferenceId()}}</span>
                                            </td>
                                            <td class="text-center">
                                                    <span
                                                        class="text-muted font-weight-bold">
                                                            {{convertDateTimeToJalali($request->created_at)}}
                                                    </span>
                                            </td>
                                            <td class="text-center">
                                                    <span
                                                        class="text-muted font-weight-bold">{{number_format($request->getAmount())}}</span>
                                            </td>
                                            <td class="text-center">
                                                    <span
                                                        class="text-muted font-weight-bold">
                                                        @isset($request->wallet->walletType)
                                                            {{$request->wallet->walletType->title}}
                                                        @endisset
                                                    </span>
                                            </td>
                                            <td class="text-center">
                                                @php($bgColor = '')
                                                @switch($request->getStatus())
                                                    @case(\App\Constants\RequestConstants::REQUEST_STATUS_ACCEPTED)
                                                    @php($bgColor = 'label-success')
                                                    @break
                                                    @case(\App\Constants\RequestConstants::REQUEST_STATUS_REJECTED)
                                                    @php($bgColor = 'label-danger')
                                                    @break
                                                    @case(\App\Constants\RequestConstants::REQUEST_STATUS_PENDING)
                                                    @php($bgColor = 'label-warning')
                                                    @break
                                                @endswitch
                                                <span
                                                    class="label label-lg label-light-success label-inline {{$bgColor}}">
                                                        {{__($request->getStatus())}}</span>
                                            </td>
                                            <td class="text-center">
                                                    <span
                                                        class="text-muted font-weight-bold">
                                                            {{__($request->type)}}
                                                    </span>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">

                                                    <a href="{{route('backoffice.request.show',$request)}}"
                                                       class="btn btn-outline-dark btn-sm  mr-2 ml-2">{{__('show')}}</a>
                                                </div>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                            <!--end::Tap pane-->
                        </div>
                    </div>
                    <!--end::Body-->
                    <div class="card-footer">
                        {{$requestModel->links('vendor.pagination.admin-pagination',[
    'request_type'=>request()->get('request_type')
])}}

                    </div>
                </div>

            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
@push('styles')
    <link href="{{asset('assets/css/pages/backoffice/user-request.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@push('scripts')
    <script src="{{asset('assets/js/pages/crud/cancel/cancel.js')}}"></script>
    <script src="{{asset('assets/js/pages/crud/success/approve.js')}}"></script>
@endpush



