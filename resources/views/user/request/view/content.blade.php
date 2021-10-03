<div class="col-xl-12">
    <!--begin::Card-->
    <div class="card card-custom gutter-b card-stretch" style="background: #1e1e2d">
        <!--begin::Body-->
        <div class="card-body pt-4 d-flex flex-column justify-content-between">


            <div class="mb-7">
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <span class="text-gold font-weight-bolder mr-2">شناسه تراکنش:</span>
                    <span class="text-white font-weight-bold"> {{ $request->getReferenceId() }} </span>
                </div>
                <div class="d-flex justify-content-between align-items-cente my-1 mt-3">
                    <span class="text-gold font-weight-bolder mr-2">مبلغ:</span>
                    <span class="text-white font-weight-bold"> {{ $request->getAmount() }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-cente my-1 mt-3">
                    <span class="text-gold font-weight-bolder mr-2">کیف پول:</span>
                    <span class="text-white font-weight-bold"> {{ $request->wallet->walletType->getTitle() }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <span class="text-gold font-weight-bolder mr-2">نوع:</span>
                    <span class="text-white font-weight-bold">
                        @switch($request->getType())
                            @case(\App\Constants\RequestConstants::TYPE_DEPOSIT)
                            واریز
                            @break('case')
                            @case(\App\Constants\RequestConstants::TYPE_WITHDRAW)
                            برداشت
                            @break('case')
                        @endswitch
                    </span>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <span class="text-gold font-weight-bolder mr-2">وضعیت:</span>
                    <span class="text-white font-weight-bold">@switch($request->getStatus())
                            @case(\App\Constants\RequestConstants::REQUEST_STATUS_ACCEPTED)
                            تایید شده
                            @break('case')
                            @case(\App\Constants\RequestConstants::REQUEST_STATUS_PENDING)
                            در انتظار تایید
                            @break('case')
                            @case(\App\Constants\RequestConstants::REQUEST_STATUS_REJECTED)
                            رد شده
                            @break('case')
                        @endswitch
                    </span>
                </div>
                @if($request->getPaidAt())
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="text-gold font-weight-bolder mr-2">تاریخ پرداخت:</span>
                        <span class="text-white font-weight-bold">{{ $request->getJalaliPaidAt() }}</span>
                    </div>
                @endif
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <span class="text-gold font-weight-bolder mr-2">تاریخ ثبت درخواست:</span>
                    <span class="text-white font-weight-bold">{{ $request->getJalaliCreateAt() }}</span>
                </div>
                <hr/>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="border-1">
                        <span class="text-gold font-weight-bolder mr-2 d-block"> توضیحات:</span>
                        <span class="text-white font-weight-bold mt-4">{{ $request->getDescription() }}</span>
                    </div>
                </div>
            </div>
            <!--end::Info-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Card-->
</div>
