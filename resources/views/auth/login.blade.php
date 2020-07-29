<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->
<head>
    <base href="../../../">
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="icon" href="https://cdn.landen.co/kr402kanl96f/assets/4r7y1qi3.png">    <meta name="description" content="Login page example">
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
                        <h3 class="zigzagItem__title color-1 weight-text-m" style="color: white!important;">Authentication</h3><br>
                        <div class="zigzagItem__text" ><h5 style="color: white!important;">Please Login To Connect With Verified Journalist from top tier Outlets </h5></div>
                        </div>
                    <div class="zigzagItem__graphic" style="margin-top: 41px!important;"><img src="{{asset('img/undraw_two_factor_authentication_namy (1).svg')}}"
                                                          class="media media--image"
                                                          srcset="https://assets.landen.co/1/calling_kpbp.svg 2x" style="width: 500px"></div>
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
            <div
                    class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
                <div class="kt-login__body">

                    <!--begin::Signin-->
                    <div class="kt-login__form">
                        <div class="kt-login__title">
                            <h3 style="font-weight: bold;color: black">Sign In</h3>
                        </div>

                        <!--begin::Form-->
                        <div class="kt-form" novalidate="novalidate" id="kt_login_form">
                            <input type="hidden" value="{{$source ?? ''}}" id="sourceUrl">
                            <div class="form-group">
                                <input class="form-control" type="text" id="user_username" placeholder="Username"
                                       name="user_username" autocomplete="off">
                            </div>
                           <div class="form-group">
                                <input class="form-control" type="password" id="user_password" placeholder="Password"
                                       name="user_password" autocomplete="off">
                            </div>
                            <div class="alert alert-warning mt-2" style="display: none; color: white!important;background:rgba(0, 18, 255, 1) "
                                 id="loginError">

                            </div>
                            <!--begin::Action-->
                            <div class="kt-login__actions">
                                {{--                                <a href="#" class="kt-link kt-login__link-forgot">--}}
                                {{--                                    Forgot Password ?--}}
                                {{--                                </a>--}}
                                <button onclick="login()" id="kt_login_signin_submit"
                                        class="btn btn-primary btn-elevate kt-login__btn-primary"
                                        style="color:#fff;background-color:rgba(0, 18, 255, 1)!important;border: none!important;">
                                    Sign In
                                </button>
                            </div>
                            <div>
                                <p style="color: black!important;">Don't have an account? <a
                                            href="{{URL::to('signup')}}" style="font-size: 17px!important;">Register
                                        Here</a> <span class="ml-5" style="font-size: 15px!important;cursor: pointer;" data-toggle="modal" data-target="#exampleModal">Forgot password?</span></p>
                            </div>

                            <!--end::Action-->
                        </div>
                    </div>

                    <!--end::Signin-->
                </div>

                <!--end::Body-->
            </div>

            <!--end::Content-->
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close-button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="forgot-email" placeholder="please enter your email">
                    <div>
                        <button id="send-email-btn" class="btn btn-success" style="margin-top: 15px;color:#fff;background-color:rgba(0, 18, 255, 1)!important;border: none!important;" onclick="sendMessage()">Send Email</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end:: Page -->

<!-- begin::Global Config(global config for global JS sciprts) -->
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
    function sendMessage() {
        var email = document.getElementById('forgot-email').value;
        if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid Email!',
            });
            return false;
        }
        let formData = new FormData();
        formData.append("email", email);
        formData.append("_token", "{{ csrf_token() }}");
        document.getElementById('send-email-btn').setAttribute('disabled', true);
        $.ajax
        ({
            type: 'POST',
            url: `{{env('APP_URL')}}/forgot-password-request`,
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                document.getElementById('send-email-btn').removeAttribute('disabled');
                document.getElementById('forgot-email').value = '';
                data = JSON.parse(data);
                if(data.status === true){
                    swal.fire({
                        "title": "",
                        "text": "Email sent to your inbox. Please check!",
                        "type": "success",
                        "showConfirmButton": true,
                        "onClose": function (e) {
                            document.getElementById('close-button').click();
                        }
                    })
                }else{
                    alert(data.message);
                }
            },
            error: function (data) {
                document.getElementById('send-email-btn').removeAttribute('disabled');
                alert(data.message);
                console.log("data", data);
            }
        });

    }
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
    function login() {
        document.getElementById('loginError').style.display = 'none';
        let email = document.getElementById('user_username').value;
        let password = document.getElementById('user_password').value;
        $.ajax({
            url: `{{env('APP_URL')}}/admin/login`,
            type: 'POST',
            dataType: "JSON",
            data: {email: email, password: password, "_token": "{{ csrf_token() }}"},
            beforeSend: function () {
                $('#main-form').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
            },
            success: function (result) {
                document.getElementById('user_password').value = '';
                if (result.status === true) {
                    if (document.getElementById('sourceUrl').value !== '' && document.getElementById('sourceUrl').value !== undefined) {
                        window.location.href = `{{env('APP_URL')}}/${document.getElementById('sourceUrl').value}`
                    } else {
                        if (result.journalist===true){
                            let userName=result.name;
                            if (!localStorage.hasOwnProperty('userName')) {
                                localStorage.setItem('userName', userName)
                            } else {
                                if (userName !== "" && userName !== null && userName !== undefined) {
                                    localStorage.removeItem('userName');
                                    localStorage.setItem('userName', userName)
                                }

                            }
                            window.location.href = `{{env('APP_URL')}}/profile-dashboard`
                        }
                        else {
                            let userName=result.name;
                            if (!localStorage.hasOwnProperty('userName')) {
                                localStorage.setItem('userName', userName)
                            } else {
                                if (userName !== "" && userName !== null && userName !== undefined) {
                                    localStorage.removeItem('userName');
                                    localStorage.setItem('userName', userName)
                                }

                            }
                            window.location.href = `{{env('APP_URL')}}/dashboard`
                        }

                    }
                } else {
                    document.getElementById('loginError').innerHTML = result['message'];
                    document.getElementById('loginError').style.display = 'block';
                    setTimeout(function () {
                        document.getElementById('loginError').style.display = 'none';
                    }, 5000);
                }
            },
        });
    }

    $(document).ready(function () {
        window.feed_category_auto_id = 0;
        $('.kt_login_form').on('submit', function (e) {
            var form = $('.kt_login_form');
            var data = form.serializeArray();
            e.preventDefault();
            e.stopImmediatePropagation();
            $.ajax({
                url: `{{env('APP_URL')}}/admin/login`,
                type: 'POST',
                dataType: "JSON",
                data: data,
                beforeSend: function () {
                    $('#main-form').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
                },
                success: function (result) {
                    if (result['status']) {
                        $(".status-message").html(result['message']);
                        $(".overlay").remove();
                    } else {
                        $(".status-message").html(result['message']);
                        $(".overlay").remove();
                    }
                }
            });
        });


    });
</script>

<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
