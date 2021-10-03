@extends('layouts.panel')

@section('title' , 'مدارک ارسالی کاربر')

@section('content')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid bg-dark-custom-1" id="kt_subheader">
        <div
            class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-gold font-weight-bold mt-2 mb-2 mr-5">مشاهده کاربران</h5>
                <!--end::Page Title-->

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}" class="text-muted">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">مدارک</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->
            <div class="d-flex align-items-center">
                <!--begin::Button-->
                <div class="">
                    <a href="{{ route('website.web.user.document.index') }}"  class="btn btn-gold font-weight-bold  font-size-link">بارگذاری مدارک</a>
                </div>
                <!--end::Button-->
            @if($user->getStatus() == \App\Constants\UserConstants::STATUS_SUSPEND)
                <!--begin::Dropdown-->
                    <div class="btn-group ml-2">
                        <button type="submit" id="success" data-value="{{ $user->getUuid() }}"
                                class="btn btn-success font-weight-bold btn-sm px-3 font-size-base w-80px">
                            تایید
                        </button>
                    </div>
                    <!--end::Dropdown-->
                @endif
            </div>
        </div>
    </div>
    <!--end::Subheader-->

    <div class="container">
        <div class="row bg-dark-custom-1">
            @foreach($documents as $document)
                <div class="col-xl-6">
                    <div class="card card-custom gutter-b bg-dark-custom-1">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Top-->
                            <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol rounded-circle mr-5">
                                <span class="symbol-label rounded-circle">
                                    <img src="{{ asset($user->profile->getAvatar()) }}"
                                         class="h-75 align-self-end" alt="">
                                </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column flex-grow-1">
                                    <a href="#"
                                       class="text-dark-25 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{ $user->getFullName() }}</a>
                                    <span
                                        class="text-muted font-weight-bold">ارسال شده {{ $document->documentType->getCreatedAt() }}</span>
                                </div>
                            </div>
                            <!--end::Top-->
                            <!--begin::Bottom-->
                            <div class="pt-4">
                                <!--begin::Image-->
                                <div class="bgi-no-repeat bgi-size-cover rounded min-h-350px"
                                     style="background-image:url('{{ $document->media->first()->getAbsoluteUrl() }}');background-position: center"></div>
                                <h3 class="text-dark-25 font-size-lg font-weight-normal pt-5 mb-2">{{ $document->documentType->title }}</h3>
                            </div>
                            <div class="separator separator-solid mt-2 mb-4"></div>
                            <div class="row justify-content-center">
                                <button type="button" class="btn btn-gold w-25" data-toggle="modal"
                                        data-target=".bd-example-modal-lg{{$loop->index}}">مشاهده
                                </button>
                            </div>

                        </div>
                        <!--end::Body-->
                    </div>
                </div>
            @endforeach
        </div>

        @foreach($documents as $document)
            <div class="modal fade bd-example-modal-lg{{$loop->index}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <img src="{{ asset($document->media->first()->getAbsoluteUrl()) }}" style="" alt="">
                        <div class="row justify-content-center">
                            <button type="button" class="btn btn-gold w-100px mt-5" data-dismiss="modal">بستن</button>
                        </div>
                    </div>

                </div>

            </div>
        @endforeach
    </div>
@endsection
@push('scripts')
    <script>

    </script>
@endpush

