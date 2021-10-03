@extends('layouts.panel')

@section('title', 'درخواست واریز وبرداشت')

@section('content')

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="subheader py-2 py-lg-4 subheader-solid bg-dark-custom-1" id="kt_subheader">
            <div
                class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap ">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Page Title-->
                    <h5 class="text-gold font-weight-bold mt-2 mb-2 mr-5">درخواست واریز و برداشت</h5>
                    <!--end::Page Title-->

                </div>
                <!--end::Info-->

            </div>
        </div>
        <!--begin::Container-->
            <div class="container">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b example example-compact bg-dark-custom-1">
                            <div class="card-header">
                                <h3 class="card-title text-gold">
                                    {{__('Deposit request to account')}}
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
                                                    <!--begin::Form-->
                                                    <form class="form"
                                                          action="{{ route('website.web.user.request.store') }}"
                                                          method="post" id="request-form">
                                                        @csrf
                                                        <div class="card-body">
                                                            <div class="form-group row label-dir">
                                                                <label
                                                                    class="col-form-label text-lg-right col-lg-2 col-sm-12 text-white">{{__('Amount')}}</label>
                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                    <input name="amount" style="direction: initial" type="text"
                                                                           class="form-control bootstrap-touchspin-vertical-btn input-dir form-control form-control-lg form-control-solid"
                                                                           placeholder="1,000"
                                                                           id="input-amout"
                                                                           onkeyup="num(this.value);moneyCommaSep(this);"
                                                                    />

                                                                    @error('amount')
                                                                    <div class="fv-plugins-message-container alert-top">
                                                                        <div class="fv-help-block">{{ $message }} </div>
                                                                    </div>
                                                                    @enderror
                                                                </div>

                                                            </div>

                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-form-label text-lg-right col-lg-2 col-sm-12 text-white">نوع درخواست</label>
                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                                    <select name="type"
                                                                            class="form-control form-control form-control-lg form-control-solid pb-2">
                                                                        <optgroup label="نوع درخواست">
                                                                            <option
                                                                                value="withdraw">{{__('withdraw from bank account')}}</option>
                                                                            <option
                                                                                value="deposit">{{__('Deposit to account')}}</option>
                                                                        </optgroup>
                                                                    </select>
                                                                    @error('type')
                                                                    <div class="fv-plugins-message-container alert-top">
                                                                        <div class="fv-help-block">{{ $message }} </div>
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-form-label  col-lg-2 col-sm-12 text-white">{{__('wallet type')}}</label>
                                                                <div class="col-lg-9 col-md-9 col-sm-12">
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

                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-form-label  col-lg-2 col-sm-12 text-white">{{__('Descriptions')}}</label>
                                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                <textarea name="description" type="text"
                                                          class="form-control form-control-lg form-control-solid"
                                                          placeholder="{{__('Descriptions')}}"></textarea>
                                                                </div>
                                                                @error('description')
                                                                <div class="fv-plugins-message-container alert-top">
                                                                    <div class="fv-help-block">{{ $message }} </div>
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="card-footer bg-dark-custom-1">
                                                            <div class="row">
                                                                <div class="col-lg-8 ml-lg-auto ">
                                                                    <button type="submit"
                                                                            class="btn  font-weight-bold w-100px btn-gold">{{__('Submit')}}</button>
                                                                    <button type="reset"
                                                                            class="btn btn-secondary w-100px" id="cancel-request" onclick="window.history.back();">{{__('Cancel')}}</button>
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
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Container-->
                                </div>
                                <!--end::Entry-->
                            </div>
                            <!--end::Content-->
                            @endsection

                            @push('styles')
                                <link href="{{asset('assets/css/pages/profile/request.css')}}" rel="stylesheet"
                                      type="text/css"/>
                            @endpush

                            @push('scripts')
                                <script
                                    src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-touchspin.js')}}"></script>
                                <script src="{{asset('assets/js/amounts/CommaSep.js')}}"
                                        type="text/javascript"></script>
                                <script src="{{asset('assets/js/amounts/num2str.js')}}" type="text/javascript"></script>
    @endpush

