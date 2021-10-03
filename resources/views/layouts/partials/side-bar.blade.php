<!--begin::Aside Menu-->
<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu" data-menu-vertical="1" data-menu-scroll="1"
         data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            <li class="menu-item" aria-haspopup="true">
                <a href="{{ route('dashboard') }}" class="menu-link">
                    <i class="menu-icon fa fa-home"></i>
                    <span class="menu-text">داشبورد</span>
                </a>
            </li>

            @if(auth()->user()->isSuperAdmin())
                <li class="menu-section">
                    <h4 class="menu-text">کاربران</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
                <li class="menu-item " aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{ route('backoffice_user_index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-users"></i>
                        <span class="menu-text">لیست کاربران</span>
                    </a>
                </li>
                <li class="menu-item " aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{ route('backoffice.private_message.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-users"></i>
                        <span class="menu-text">پیام خصوصی کاربران</span>
                    </a>
                </li>
                <li class="menu-item " aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{ route('backoffice.request.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-users"></i>
                        <span class="menu-text">{{__('Requests list')}}</span>
                    </a>
                </li>
                <li class="menu-item " aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{ route('backoffice_user_index', ['userSuspend' => true]) }}"
                       class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-user"></i>
                        <span class="menu-text">
                            کاربران در انتظار تایید
                        </span>
                    </a>
                </li>
                <li class="menu-item " aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{ route('backoffice.announcement.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-alert"></i>
                        <span class="menu-text">اعلانات عمومی</span>
                    </a>
                </li>
                @else

                <li class="menu-item " aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{ route('website.web.user.profile.show') }}" class="menu-link menu-toggle">
                        <i class="menu-icon fa fa-user-edit"></i>
                        <span class="menu-text">ویرایش پروفایل</span>
                    </a>
                </li>
                <li class="menu-item " aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{ route('website.web.user.change_password.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon fa fa-key"></i>
                        <span class="menu-text">تغییر رمز عبور</span>
                    </a>
                </li>
                <li class="menu-item " aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{ route('website.web.user.request.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon2-left-arrow-1"></i>
                        <span class="menu-text">درخواست ها</span>
                    </a>
                </li>
                <li class="menu-item " aria-haspopup="true" data-menu-toggle="hover">
                    <a href="https://t.me/zteforex" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon2-quotation-mark"></i>
                        <span class="menu-text">ارسال تیکت</span>
                    </a>
                </li>
                <li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{ route('website.web.external_account.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon2-rectangular"></i>
                        <span class="menu-text">درخواست اکانت MetaTrader</span>
                    </a>
                </li>
                <li class="menu-item " aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{ route('website.web.user.request.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon2-arrow-down"></i>
                        <span class="menu-text">درخواست</span>
                    </a>
                </li>
                <li class="menu-item " aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{ route('website.web.user.document.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon2-rectangular"></i>
                        <span class="menu-text">مدارک</span>
                    </a>
                </li>
            @endif
            <li class="menu-item " aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="menu-link menu-toggle">
                    <i class="menu-icon fa fa-sign-out-alt"></i>
                    <span class="menu-text">خروج</span>
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>
<!--end::Aside Menu-->
