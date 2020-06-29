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
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;padding: 1.28rem 1rem!important;">
    <a class="navbar-brand font-weight-bold" href="{{env('APP_URL')}}/dashboard">Clarity</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{env('APP_URL')}}/dashboard">Dashboard <span class="sr-only">(current)</span></a>
                        </li>
            {{--            <li class="nav-item">--}}
            {{--                <a class="nav-link" href="#">Link</a>--}}
            {{--            </li>--}}
            {{--            <li class="nav-item dropdown">--}}
            {{--                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
            {{--                    Dropdown--}}
            {{--                </a>--}}
            {{--                <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
            {{--                    <a class="dropdown-item" href="#">Action</a>--}}
            {{--                    <a class="dropdown-item" href="#">Another action</a>--}}
            {{--                    <div class="dropdown-divider"></div>--}}
            {{--                    <a class="dropdown-item" href="#">Something else here</a>--}}
            {{--                </div>--}}
            {{--            </li>--}}
            {{--            <li class="nav-item">--}}
            {{--                <a class="nav-link disabled" href="#">Disabled</a>--}}
            {{--            </li>--}}
        </ul>
        <form class="form-inline my-2 my-lg-0">
            {{--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
            <div class="nav-item dropdown mr-4">
                @if(empty(\Illuminate\Support\Facades\Session::get('userId')))
                    <a class="btn login-button" href="{{env('APP_URL')}}/login" role="button">
                        Login
                    </a>
                @else
                    <a class="nav-link dropdown-toggle" role="button" id="navbarDropdown" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Me
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown"
                         style="width: 20px!important;right: 0; left: auto;">
                        <a class="dropdown-item" href="{{env('APP_URL')}}/profile-dashboard">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" onclick="signout()">Logout</a>
                    </div>
                @endif
            </div>
        </form>
    </div>
</nav>
</body>
</html>
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
