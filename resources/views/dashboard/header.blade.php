<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <base href="">
    <meta charset="utf-8"/>
    <meta name="description" content="Updates and statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{asset('plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet">

    <!--end::Page Vendors Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{asset('plugins/global/plugins.bundle.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.bundle.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.custom.css')}}" rel="stylesheet">


    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{asset('css/skins/header/base/light.css')}}" rel="stylesheet">
    <link href="{{asset('css/skins/header/menu/light.css')}}" rel="stylesheet">
    <link href="{{asset('css/skins/brand/dark.css')}}" rel="stylesheet">
    <link href="{{asset('css/skins/aside/dark.css')}}" rel="stylesheet">


    <!--begin::Global Theme Bundle(used by all pages) -->
    <script type="text/javascript"
            src="{{ \Illuminate\Support\Facades\URL::asset('plugins/global/plugins.bundle.js')}}"></script>
    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('js/scripts.bundle.js')}}"></script>

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href=""/>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="index.html">
            <img alt="Logo" src="{{asset('media/logos/logo-light.png')}}"/>
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler">
            <span></span></button>
        <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
                class="flaticon-more"></i></button>
    </div>
</div>

<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

        <!-- begin:: Aside -->

        <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
             id="kt_aside">
            <!-- begin:: Aside -->
            <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                <div class="kt-aside__brand-logo">
                    <a href="#">
                        <h3 style="color: white!important;">Profile</h3>
                    </a>
                </div>
            </div>
            <!-- end:: Aside -->

            <!-- begin:: Aside Menu -->
            <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
                     data-ktmenu-dropdown-timeout="500">
                    <ul class="kt-menu__nav">
                        <li class="kt-menu__section ">
                            <h4 class="kt-menu__section-text">Menu</h4>
                            <i class="kt-menu__section-icon flaticon-more-v2"></i>
                        </li>
                        <li class="kt-menu__item {{ (Request::segment(1) == 'profile-dashboard') ? 'kt-menu__item--active' : '' }}"
                            aria-haspopup="true"><a href="{{env('APP_URL')}}/profile-dashboard"
                                                    class="kt-menu__link "><span
                                    class="kt-menu__link-icon"><i class="fas fa-user-circle"></i></span><span
                                    class="kt-menu__link-text">Profile</span></a></li>
                        <li class="kt-menu__item kt-menu__item--submenu {{ (Request::segment(1) == 'basic-information') ? 'kt-menu__item--open' : '' }} {{ (Request::segment(1) == 'profile-photo') ? 'kt-menu__item--open' : '' }} {{ (Request::segment(1) == 'outlet') ? 'kt-menu__item--open' : '' }}"
                            aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
                                                                                       class="kt-menu__link kt-menu__toggle"><span
                                    class="kt-menu__link-icon"><i class="fas fa-user"></i></span><span
                                    class="kt-menu__link-text">Edit Profile</span><i
                                    class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item {{ (Request::segment(1) == 'basic-information') ? 'kt-menu__item--active' : '' }}"
                                        aria-haspopup="true"><a href="{{env('APP_URL')}}/basic-information"
                                                                class="kt-menu__link "><i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                class="kt-menu__link-text">Basic Information</span></a></li>
                                    <li class="kt-menu__item {{ (Request::segment(1) == 'profile-photo') ? 'kt-menu__item--active' : '' }}"
                                        aria-haspopup="true"><a href="{{env('APP_URL')}}/profile-photo"
                                                                class="kt-menu__link "><i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                class="kt-menu__link-text">Profile Photo</span></a></li>
                                    <li class="kt-menu__item {{ (Request::segment(1) == 'outlet') ? 'kt-menu__item--active' : '' }}"
                                        aria-haspopup="true"><a href="{{env('APP_URL')}}/outlet" class="kt-menu__link "><i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                class="kt-menu__link-text">Outlet</span></a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="kt-menu__item {{ (Request::segment(1) == 'expert-info-page') ? 'kt-menu__item--active' : '' }}"
                            aria-haspopup="true"><a href="{{env('APP_URL')}}/expert-info-page"
                                                    class="kt-menu__link "><span
                                    class="kt-menu__link-icon"><i class="fas fa-user-graduate"></i></span><span
                                    class="kt-menu__link-text">Apply to be an expert</span></a></li>
                        <li class="kt-menu__item {{ (Request::segment(1) == 'calls') ? 'kt-menu__item--active' : '' }}"
                            aria-haspopup="true"><a href="{{env('APP_URL')}}/calls"
                                                    class="kt-menu__link "><span
                                    class="kt-menu__link-icon"><i class="fas fa-phone-alt"></i></span><span
                                    class="kt-menu__link-text">Calls</span></a></li>
                        <li class="kt-menu__item {{ (Request::segment(1) == 'call-request') ? 'kt-menu__item--active' : '' }}"
                            aria-haspopup="true"><a href="{{env('APP_URL')}}/call-request"
                                                    class="kt-menu__link "><span
                                    class="kt-menu__link-icon"><i class="fas fa-phone-alt"></i></span><span
                                    class="kt-menu__link-text">Calls Requests</span></a></li>
                        <li class="kt-menu__item {{ (Request::segment(1) == 'payment') ? 'kt-menu__item--active' : '' }}"
                            aria-haspopup="true"><a href="{{env('APP_URL')}}/payment" class="kt-menu__link "><span
                                    class="kt-menu__link-icon"><i class="fab fa-cc-mastercard"></i></span><span
                                    class="kt-menu__link-text">Payment</span></a></li>
                        <li class="kt-menu__item {{ (Request::segment(1) == 'money') ? 'kt-menu__item--active' : '' }}"
                            aria-haspopup="true"><a href="{{env('APP_URL')}}/money" class="kt-menu__link "><span
                                    class="kt-menu__link-icon"><i class="fas fa-hand-holding-usd"></i></span><span
                                    class="kt-menu__link-text">Money</span></a></li>
                    </ul>
                </div>
            </div>

            <!-- end:: Aside Menu -->
        </div>

        <!-- end:: Aside -->
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
            <!-- begin:: Header -->
            <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

                <!-- begin:: Header Menu -->

                <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                    <div class="mt-4">
                        <a class="dashboard-button ml-5" href="{{env('APP_URL')}}/dashboard">Dashboard</a>
                    </div>
                </div>
                <!-- end:: Header Menu -->

                <!-- begin:: Header Topbar -->
                <div class="kt-header__topbar">
                    <div class="kt-header__topbar-item kt-header__topbar-item--user">
                        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                            <div class="kt-header__topbar-user">
                                <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                                <span class="kt-header__topbar-username kt-hidden-mobile">Admin</span>
                                {{--                                <span--}}
                                {{--                                    class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">A</span>--}}
                            </div>
                        </div>
                        <div
                            class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                            <div class="kt-notification">
                                <div class="kt-notification__custom kt-space-between">
                                    <a class="btn btn-label btn-label-brand btn-sm btn-bold" onclick="signout()">Sign
                                        Out</a>
                                    <a href="#"
                                       class="btn btn-clean btn-sm btn-bold">Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                <script>
                    function signout() {
                        $.ajax({
                            url: `{{env('APP_URL')}}/signout`,
                            type: 'POST',
                            dataType: "JSON",
                            data: {"_token": "{{ csrf_token() }}"},
                            beforeSend: function () {
                                $('#main-form').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
                            },
                            success: function (result) {
                                window.location.href = `{{env('APP_URL')}}/dashboard`

                            },
                        });
                    }
                </script>
