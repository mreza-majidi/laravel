<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div
        class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">مشاهده کاربران</h5>
            <!--end::Page Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                    <a href="" class="text-muted">کاربران</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="" class="text-muted">ویرایش</a>
                </li>
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Info-->
      <!--begin::Toolbar-->
      <div class="d-flex align-items-center">
        <!--begin::Button-->
        <a href="javascript:history.back();" class="btn btn-default font-weight-bold btn-sm px-3 font-size-base">{{__('Back')}}</a>
        <!--end::Button-->
        <!--begin::Dropdown-->
        <div class="btn-group ml-2">
            <button type="button" onclick="$('#kt_form').submit();" class="btn btn-light-dark font-weight-bold h-40px w-100px font-size-link">
                {{__('Save Changes')}}
            </button>
            <button type="button"
                    class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base dropdown-toggle dropdown-toggle-split"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu dropdown-menu-sm p-0 m-0 dropdown-menu-right">
                <ul class="navi py-5">
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-writing"></i>
                                            </span>
                            <span class="navi-text">{{__('Save continue')}} </span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-medical-records"></i>
                                            </span>
                            <span class="navi-text">{{__('Save add new')}}</span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-hourglass-1"></i>
                                            </span>
                            <span class="navi-text">{{__('Save exit')}}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--end::Dropdown-->
    </div>
    <!--end::Toolbar-->
    </div>
</div>
