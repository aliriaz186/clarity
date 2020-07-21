<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->
<head>
    <base href="../../../">
    <meta charset="utf-8"/>
    <title>PRESS CHAT</title>
    <link rel="icon" href="https://cdn.landen.co/defaults/favicon.ico">
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{asset('css/pages/login/login-1.css')}}" rel="stylesheet">

    <!--end::Page Custom Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{asset('plugins/global/plugins.bundle.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.bundle.css')}}" rel="stylesheet">


    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{asset('css/skins/header/base/light.css')}}" rel="stylesheet">
    <link href="{{asset('css/skins/header/menu/light.css')}}" rel="stylesheet">
    <link href="{{asset('css/skins/brand/dark.css')}}" rel="stylesheet">
    <link href="{{asset('css/skins/aside/dark.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!--end::Layout Skins -->
    {{--    <link rel="shortcut icon" href=""/>--}}
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
        <div
            class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">

            <!--begin::Aside-->
            <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside"
                 style="background-color: #646fff">
                <div class="kt-grid__item">
                    <a href="#" class="kt-login__logo">
                        {{--                    <img src="{{asset('media/logos/logo-4.png')}}">--}}
                    </a>
                </div>
                <div class="zigzagItem zigzagItem--right">
                    <div class="zigzagItem__content"><span class="zigzagItem__number"></span>
                        <h3 class="zigzagItem__title color-1 weight-text-m" style="color: white!important;">Sign Up for Press Chat</h3><br>
                        <div class="zigzagItem__text" ><h5 style="color: white!important;">Join Press Chat now — it's free!</h5></div>
                    </div>
                    <div class="zigzagItem__graphic" style="margin-top: 41px!important"><img src="https://assets.landen.co/1/calling_kpbp.svg"
                                                                                                       class="media media--image"
                                                                                                       srcset="https://assets.landen.co/1/calling_kpbp.svg 2x"></div>
                </div>
                <div class="kt-grid__item">
                    <div class="kt-login__info">
                        {{--                        <div class="kt-login__copyright">--}}
                        {{--                            &copy 2018 Metronic--}}
                        {{--                        </div>--}}
                        <div class="kt-login__menu">
                            {{--                            <a href="#" class="kt-link">Privacy</a>--}}
                            {{--                            <a href="#" class="kt-link">Legal</a>--}}
                            {{--                            <a href="#" class="kt-link">Contact</a>--}}
                        </div>
                    </div>
                </div>
            </div>

            <!--begin::Aside-->

            <!--begin::Content-->
            <div
                class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

                <!--begin::Head-->
                <div class="kt-login__head">
                    <span class="kt-login__signup-label" style="font-size: medium">SignUp as</span>&nbsp;&nbsp;
                    <a href="{{URL::to('journalist/signup')}}"
                       style="font-size:medium;text-decoration: underline;color: #0a6aa1">Journalist</a>
                </div>

                <!--end::Head-->

                <!--begin::Body-->
                <div class="kt-login__body">

                    <!--begin::Signin-->
                    <div class="kt-login__form">
                        <div class="kt-login__title">
                            <h3 style="color: black;font-weight: bold   ">Sign Up</h3>
                        </div>

                        <!--begin::Form-->
                        <div class="kt-form" novalidate="novalidate" id="kt_login_form">
                            <div class="form-group">
                                <input class="form-control" type="text" id="user_username" placeholder="Username"
                                       name="user_username">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="email" id="email" placeholder="Email"
                                       name="user_username">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" id="user_password" placeholder="Password"
                                       name="user_password" autocomplete="off">
                            </div>
                            <div class="kt-login__actions">
                                <button onclick="register()" id="kt_login_signin_submit"
                                        class="btn btn-primary btn-elevate kt-login__btn-primary"  style="color:#fff;background-color:rgba(0, 18, 255, 1)!important;border: none!important;">Sign Up
                                </button>
                            </div>
                            <div>
                                <p style="color: black!important;">Already have an account? <a
                                        href="{{URL::to('login')}}" style="font-size: 17px!important;">Login here</a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": [
                    "#c5cbe3",
                    "#a1a8c3",
                    "#3d4465",
                    "#3e4466"
                ],
                "shape": [
                    "#f0f3ff",
                    "#d9dffa",
                    "#afb4d4",
                    "#646c9a"
                ]
            }
        }
    };
</script>

<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script type="text/javascript"
        src="{{ \Illuminate\Support\Facades\URL::asset('plugins/global/plugins.bundle.js')}}"></script>
<script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('js/scripts.bundle.js')}}"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Scripts(used by this page) -->

<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script>
    function register() {
        let userName = document.getElementById('user_username').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('user_password').value;
        if (userName === "" || userName === null) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'User Name cannot be empty!',
            });
            return false;
        }
        if (email === "" || email === null) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Email cannot be empty!',
            });
            return false;
        }
        if (password === "" || password === null) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Password cannot be empty!',
            });
            return false;
        }
        $.ajax({
            url: `{{env('APP_URL')}}/register`,
            type: 'POST',
            dataType: "JSON",
            data: {userName: userName, email: email, password: password, "_token": "{{ csrf_token() }}"},
            beforeSend: function () {
                $('#main-form').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
            },
            success: function (result) {
                document.getElementById('user_password').value = '';
                if (result['status']) {
                    window.location.href = `{{env('APP_URL')}}/dashboard`
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Email already exists!',
                    });
                }
            },
        });
    }

</script>

<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
