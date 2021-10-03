@extends('layouts.panel')

@section('title' , 'ساخت اکانت')

@section('content')
    <div class="subheader py-2 py-lg-4 subheader-solid bg-dark-custom-1" id="kt_subheader">
        <div
            class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-gold">کاربران</h5>
                <!--end::Page Title-->

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">حساب ها</a>
                    </li>
                </ul>

                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->

        </div>
    </div>
    <div class="container">
        <div class="card card-custom bg-dark-custom-1">

            <!--begin::Card header-->
            <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link  active " data-toggle="tab" href="#kt_user_edit_tab_1">
                                <span class="nav-text font-size-lg text-gold">ساخت اکانت</span>
                            </a>
                        </li>
                        <!--end::Item-->

                    </ul>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card header-->


            <!--begin::Tab-->
            <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                <!--begin::Row-->
                <div class="row">

                    <div class="col-xl-9 my-2 mx-auto">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-gold font-weight-bolder mt-7 mb-10">اطلاعات را برای ساخت حساب وارد
                                    کنید</h3>
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Group-->
                        <form method="post" action="{{$formAction}}"
                              enctype="multipart/form-data">
                        @csrf
                        <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-center text-white">شهر:</label>
                                <div class="col-7">
                                    <input class="form-control form-control-lg form-control-solid" type="text"
                                           placeholder="Tehran" value="{{old('city')}}" name="city">
                                    @error('city')
                                    <div class="fv-plugins-message-container alert-top">
                                        <div class="fv-help-block">{{ $message }} </div>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-center text-white">استان:</label>
                                <div class="col-7">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <input type="text" class="form-control form-control-lg form-control-solid"
                                               placeholder="Tehran" value="{{old('state')}}" name="state">
                                    </div>
                                    @error('state')
                                    <div class="fv-plugins-message-container alert-top">
                                        <div class="fv-help-block">{{ $message }} </div>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-center text-white">گروه:</label>
                                <div class="col-7">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <select class="form-control form-control-lg form-control-solid" name="group"
                                                id="exampleSelectd">
                                            <option value=""></option>
                                            @foreach($groups as $group)
                                                <option @if(old('group') == $group) selected
                                                        @endif value="{{$group}}">{{$group}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('group')
                                    <div class="fv-plugins-message-container alert-top">
                                        <div class="fv-help-block">{{ $message }} </div>
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-center text-white">کد
                                    پستی:</label>
                                <div class="col-7">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <input type="number" class="form-control form-control-lg form-control-solid"
                                               placeholder="xxxxxxxxxx" value="{{old('zip_code')}}" name="zip_code">
                                    </div>
                                    @error('zip_code')
                                    <div class="fv-plugins-message-container alert-top">
                                        <div class="fv-help-block">{{ $message }} </div>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-center text-white">لوریج:</label>
                                <div class="col-7">
                                    <select class="form-control form-control form-control-lg form-control-solid"
                                            name="leverage"
                                            id="exampleSelectd">
                                        <option value=""></option>
                                        @foreach($leverages as $leverage => $value)
                                            <option @if(old('leverage') == $leverage) selected
                                                    @endif value="{{$leverage}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    @error('leverage')
                                    <div class="fv-plugins-message-container alert-top">
                                        <div class="fv-help-block">{{ $message }} </div>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-center text-white">کشور:</label>
                                <div class="col-7">
                                    <input class="form-control form-control-lg form-control-solid" type="text"
                                           placeholder="Iran" value="{{old('country')}}" name="country">
                                    @error('country')
                                    <div class="fv-plugins-message-container alert-top">
                                        <div class="fv-help-block">{{ $message }} </div>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-center text-white">موجودی
                                    اولیه:</label>
                                <div class="col-7">
                                    @if($formAction == route('website.web.external_account.demo_store'))
                                        <select class="form-control form-control form-control-lg form-control-solid"
                                                name="deposit"
                                                id="exampleSelectd">
                                            <option value=""></option>
                                            @foreach($deposits as $deposit)
                                                <option @if(old('deposit') == $deposit) selected
                                                        @endif value="{{$deposit}}">{{$deposit}}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input class="form-control form-control form-control-lg form-control-solid"
                                                name="deposit">
                                        <div class="fv-plugins-message-container alert-top mt-3">
                                            <div class="fv-help-block">
                                                <a class="text-muted mt-3" href="{{route('website.web.user.request.index')}}">جهت شارژ حساب Real، از گزینه درخواست واریز استفاده نمایید.</a>
                                            </div>
                                        </div>
                                    @endif
                                    @error('deposit')
                                    <div class="fv-plugins-message-container alert-top">
                                        <div class="fv-help-block">{{ $message }} </div>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            {{--                            <div class="form-group row">--}}
                            {{--                                <label class="col-form-label col-2 text-lg-right text-center">رمز عبور</label>--}}
                            {{--                                <div class="col-4">--}}
                            {{--                                    <div class="input-group input-group-lg input-group-solid">--}}
                            {{--                                        <input type="password" class="form-control form-control-lg form-control-solid"--}}
                            {{--                                               placeholder="رمز عبور خود را وارد کنید" rows="3" value=""--}}
                            {{--                                               name="mobile_number">--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="form-group row">--}}
                            {{--                                <label class="col-form-label col-2 text-lg-right text-center">آدرس</label>--}}
                            {{--                                <div class="col-10">--}}
                            {{--                                    <div class="input-group input-group-lg input-group-solid">--}}
                            {{--                                        <textarea type="text" class="form-control form-control-lg form-control-solid"--}}
                            {{--                                                  placeholder="شماره تماس" rows="3" value="" name="mobile_number">--}}
                            {{--                                        </textarea>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="form-group row">
                                <div class="col-xl-12 text-center">
                                    <button class="btn btn-gold w-100px" type="submit">تایید</button>
                                    <button class="btn btn-secondary w-100px" type="reset">بازنشانی</button>
                                </div>
                            </div>
                            <!--end::Group-->
                        </form>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Tab-->


        </div>

    </div>

@endsection
