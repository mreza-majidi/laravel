@extends('layouts.panel')

@section('title', 'آپلود مدارک')

@section('content')

    <!--begin::Content-->
    <div class="subheader py-2 py-lg-4 subheader-solid bg-dark-custom-1" id="kt_subheader">
        <div
            class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-gold font-weight-bold mt-2 mb-2 mr-5">بارگذاری مدارک</h5>
                <!--end::Page Title-->
            </div>

            <div class="d-flex align-items-center">
                <!--begin::Button-->
                <div class="">
                    <a href="{{ route('website.web.user.document.show') }}"  class="btn btn-gold font-weight-bold  font-size-link">مشاهده مدارک</a>
                </div>
            </div>
        </div>
    </div>
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">

        <!--begin::Container-->
            <div class="container">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12 ">
                        @if(session()->has('message'))
                            <div class="alert alert-dismissible fade show text-white" role="alert" style="border-color:#ffd36a">
                                {{ session()->get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @error('file')
                            <div class="alert alert-dismissible fade show text-white" role="alert" style="border-color:#ffd36a">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                            <!--begin::Card-->
                            <div class="card card-custom example example-compact bg-dark-custom-1">
                                <div class="card-header">
                                    <h4 class="card-title text-gold">{{__('upload documents')}}</h4>
                                </div>
                                <!--begin::Form-->
                                <div class="form" >
                                        <div class="card-body">
                                            @foreach($documentTypes as $documentType)
                                                <form action="{{ route('website.web.user.document.upload') }}" method="post" id="form_{{$loop->index}}" data-value="{{$loop->index}}"  enctype="multipart/form-data">
                                                    @csrf
                                                    @if ($loop->index == 0)
                                                        <div class="row">
                                                            <div class="col-lg-5 text-center">
                                                                <h6 class="card-title align-items-start flex-column">
                                                                    <span class="card-label font-weight-normal text-gold">احراز هویت شخصی</span>
                                                                </h6>
                                                            </div>
                                                        </div>

                                                    @elseif($loop->index == 3)
                                                        <div class="row">
                                                            <div class="col-lg-5 text-center">
                                                                <h6 class="card-title align-items-start flex-column">
                                                                    <span class="card-label font-weight-normal text-gold">احراز هویت محل سکونت</span>
                                                                </h6>
                                                            </div>
                                                        </div>

                                                    @endif
                                                        <div class="form-group">
                                                            <div class="row ">
                                                                <div class="col-xl-4 text-center">
                                                                    <label class="text-white">{{ $documentType->getTitle() }}</label>

                                                                </div>
                                                            </div>
                                                        <div class="row justify-content-center">
                                                            <div class="col-xl-6">
                                                                <input type="hidden" value="{{$documentType->uuid}}" name="document_type">
                                                                <input type="file" name="file" class="custom-file-input"  id="customFile_{{$loop->index}}">
                                                                <label class="custom-file-label selected " for="customFile_{{$loop->index}}"></label>
                                                            </div>
                                                                <div class="col-xl-2 text-center">
                                                                    <button type="submit" class="btn font-weight-bold btn-gold w-100px mt-3 mt-lg-0">{{__('Bargozari')}}</button>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            @endforeach
                                        </div>
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

        <!--end::Content-->


@endsection
