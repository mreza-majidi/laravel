
<!-- begin::User Panel-->
<div id="kt_quick_user" class="offcanvas offcanvas-right p-10 bg-dark-custom-1">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0 text-lnk-hover text-gold">پروفایل کاربر</h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-dark" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5">
        <!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <div class="symbol-label rounded-circle" style="background-image:url({{$user->profile->getAvatar()}})"></div>
                <i class="symbol-badge @if($document)
                    @if($document->isVerified())  @endif bg-success @else bg-danger @endif"></i>
            </div>
            <div class="d-flex flex-column">
                <span>
                    <a href="#" class="font-weight-bold font-size-h5  text-lnk-hover text-white">{{ $user->getFullName() }}</a>
                </span>

                <div class="navi-link pb-2 text-white">
                    <i class="fa fa-mail-bulk mr-3  text-white"></i>
                   {{ $user->getEmail() }}
                </div>

                <div class="navi mt-2">
                    <a href="{{route('website.web.user.profile.show') }}" class="btn btn-gold font-weight-bold h-40px font-size-link">ویرایش پروفایل</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-light-dark font-weight-bold h-40px font-size-link">خروج</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!--end::Content-->
</div>
<!-- end::User Panel-->

@push('styles')
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css"/>
@endpush
