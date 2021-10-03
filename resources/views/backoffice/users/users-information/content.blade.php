<div class="col-xl-12">
    <!--begin::Card-->
    <div class="card card-custom gutter-b card-stretch">
        <!--begin::Body-->
        <div class="card-body pt-4 d-flex flex-column justify-content-between">

            <div class="d-flex align-items-center mb-7">
                <!--begin::Pic-->
                <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                    <div class="symbol symbol-lg-75">
                        <img alt="Pic" src="{{ asset($profile->getAvatar()) }}">
                    </div>
                    <div class="symbol symbol-lg-75 symbol-primary d-none">
                        <span class="font-size-h3 font-weight-boldest">JM</span>
                    </div>
                </div>
                <!--end::Pic-->
                <!--begin::Title-->
                <div class="d-flex flex-column">
                    <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{ $user->getFullName() }}</a>
                </div>
                <!--end::Title-->
            </div>

            <div class="mb-7">
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <span class="text-dark-75 font-weight-bolder mr-2">آدرس ایمیل:</span>
                    <a href="#" class="text-muted text-hover-primary">{{ $user->getEmail() }}</a>
                </div>
                <div class="d-flex justify-content-between align-items-cente my-1 mt-3">
                    <span class="text-dark-75 font-weight-bolder mr-2">شماره تماس:</span>
                    <a href="#" class="text-muted text-hover-primary" dir="ltr">{{ $profile->getMobileNumber() }}</a>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <span class="text-dark-75 font-weight-bolder mr-2">آدرس:</span>
                    <span class="text-muted font-weight-bold">{{ $profile->getAddress() }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <span class="text-dark-75 font-weight-bolder mr-2">وضعیت کاربر:</span>

                        @switch($user->getStatus())
                            @case(\App\Constants\UserConstants::STATUS_ACTIVE)
                                <span class="label label-lg label-light-success label-inline"> تایید شده </span>
                            @break('case')
                            @case(\App\Constants\UserConstants::STATUS_SUSPEND)

                        <span class="label label-lg label-light-primary label-inline"> منتظر تایید </span>
                            @break('case')
                            @endswitch
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <span class="text-dark-75 font-weight-bolder mr-2">تاریخ ثبت نام:</span>
                    <span class="text-muted font-weight-bold" dir="ltr">{{ $user->getCreatedAt() }}</span>
                </div>
            </div>
            <!--end::Info-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Card-->
</div>
