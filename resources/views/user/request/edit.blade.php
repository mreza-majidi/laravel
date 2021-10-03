@extends('layouts.panel')

@section('title' , 'ویرایش درخواست')

@section('content')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid bg-dark-custom-1" id="kt_subheader">
        <div
            class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-gold font-weight-bold mt-2 mb-2 mr-5">کاربران</h5>
                <!--end::Page Title-->

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">درخواست ها</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">ویرایش</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->

        </div>
    </div>
    <!--end::Subheader-->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact bg-dark-custom-1">
                    <div class="card-header">
                        <h3 class="card-title text-gold">
                            درخواست واریز و برداشت
                        </h3>
                    </div>
                    <!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Entry-->
                        <div class="">
                            <!--begin::Container-->
                            <div>
                                <!--begin::Row-->
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 ">
                                        <!--begin::Card-->
                                        <div class="gutter-b example example-compact">
                                            <form class="form" method="post">
                                                @csrf
                                                @method('patch')
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-form-label col-lg-2 label-dir text-white">مبلغ</label>

                                                        <div class=" col-md-9 col-sm-12">
                                                            <input name="amount" type="text"
                                                                   class="form-control form-control-lg form-control-solid"
                                                                   value="{{ $request->getAmount() }}" dir="ltr">
                                                        </div>

                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-2 label-dir text-white">نوع
                                                            درخواست</label>
                                                        <div class=" col-md-9 col-sm-12">
                                                            <select
                                                                class="form-control form-control-lg form-control-solid"
                                                                name="type">
                                                                <optgroup label="نوع درخواست">
                                                                    @switch($request->getType())
                                                                        @case(\App\Constants\RequestConstants::TYPE_WITHDRAW)
                                                                        <option value="withdraw" selected>برداشت از
                                                                            حساب
                                                                        </option>
                                                                        <option value="deposit">واریز به حساب</option>
                                                                        @break('case')
                                                                        @case(\App\Constants\RequestConstants::TYPE_DEPOSIT)
                                                                        <option value="withdraw">برداشت از حساب</option>
                                                                        <option value="deposit" selected>واریز به حساب
                                                                        </option>
                                                                        @break('case')
                                                                    @endswitch
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-form-label col-lg-2 label-dir text-white">{{__('wallet type')}}</label>
                                                        <div class=" col-md-9 col-sm-12">
                                                            <select name="wallet_id"
                                                                    class="form-control form-control form-control-lg form-control-solid pb-2">
                                                                <optgroup label="کیف پول های شما">
                                                                    @foreach($walletTypes as $walletType)
                                                                        <option
                                                                            value="{{$walletType->uuid}}">{{$walletType->title}}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                            @error('wallet_id')
                                                            <div class="fv-plugins-message-container alert-top">
                                                                <div class="fv-help-block">{{ $message }} </div>
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row ">
                                                        <label class="col-form-label col-lg-2 label-dir text-white">توضیحات</label>
                                                        <div class=" col-md-9 col-sm-12">
                                                            <textarea name="description" type="text"
                                                                      class="form-control form-control-lg form-control-solid"
                                                                      placeholder="توضیحات">{{ $request->getDescription() }}</textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="card-footer bg-dark-custom-1">
                                                    <div class="row">
                                                        <div class="col-lg-8 ml-lg-auto ">
                                                            <button type="submit"
                                                                    class="btn btn-gold font-weight-bold w-100px">تایید
                                                            </button>
                                                            <button type="reset" class="btn btn-secondary w-100px"
                                                                    onclick="window.history.back();">لغو
                                                            </button>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
