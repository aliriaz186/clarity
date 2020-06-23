@extends('dashboard.layout')
<!-- begin:: Content -->
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--Begin::Dashboard 1-->

        <!--Begin::Row-->
        <form action="#" method="POST" id="listing_form" class="form-horizontal listing_form">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xl-12 order-lg-12 order-xl-12">
                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="kt-font-brand fas fa-user"></i>
                            </span>
                                <h3 class="kt-portlet__head-title">
                                    Basic information
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%"><span
                                                class="input-group-text" style="width: 100%">Your Name</span>
                                        </div>
                                        <input type="text" name="email" id="email"
                                               class="form-control"
                                               placeholder="John Doe">
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%"><span
                                                class="input-group-text" style="width: 100%">Username</span>
                                        </div>
                                        <input type="text" name="user-name" id="user-name"
                                               class="form-control"
                                               placeholder="Enter Your Username">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%"><span
                                                class="input-group-text" style="width: 100%">Short Bio</span>
                                        </div>
                                        <input type="text" name="short-bio" id="short-bio"
                                               class="form-control"
                                               placeholder="Your Short Bio">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="kt-font-brand"></i>
                            </span>
                                <h3 class="kt-portlet__head-title">
                                    Optional -- 50 Characters
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%">
                                            <div
                                                class="input-group-text" style="width: 100%"><span>Mini-Resume</span>
                                            </div>
                                        </div>
                                        <textarea name="short-bio" id="short-bio"
                                                  class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%"><span
                                                class="input-group-text" style="width: 100%">Email</span>
                                        </div>
                                        <input disabled type="text" name="email" id="email"
                                               class="form-control"
                                               placeholder="Example@abc.com">
                                    </div>
                                    <label class="text-muted mt-2">Please contact support to change your email
                                        adress.</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="kt-font-brand"></i>
                            </span>
                                <h3 class="kt-portlet__head-title">
                                    More Info
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%"><span
                                                class="input-group-text" style="width: 100%">Cell Phone</span>
                                        </div>
                                        <input type="tel" name="phone" id="phone"
                                               class="form-control"
                                               placeholder="xxx-xxx-xxx">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%"><span
                                                class="input-group-text" style="width: 100%">Your Location</span>
                                        </div>
                                        <input type="text" name="location" id="location"
                                               class="form-control"
                                               placeholder="San Francisco, CA">
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%"><span
                                                class="input-group-text" style="width: 100%">Your Timezone</span>
                                        </div>
                                        <select name="time-zone" id="time-zone"
                                                class="form-control">
                                            <option>Select Timezone</option>
                                            <option value="Etc/GMT+12">(GMT-12:00) International Date Line West</option>
                                            <option value="Pacific/Midway">(GMT-11:00) Midway Island, Samoa</option>
                                            <option value="Pacific/Honolulu">(GMT-10:00) Hawaii</option>
                                            <option value="US/Alaska">(GMT-09:00) Alaska</option>
                                            <option value="America/Los_Angeles">(GMT-08:00) Pacific Time (US & Canada)
                                            </option>
                                            <option value="America/Tijuana">(GMT-08:00) Tijuana, Baja California
                                            </option>
                                            <option value="US/Arizona">(GMT-07:00) Arizona</option>
                                            <option value="America/Chihuahua">(GMT-07:00) Chihuahua, La Paz, Mazatlan
                                            </option>
                                            <option value="US/Mountain">(GMT-07:00) Mountain Time (US & Canada)</option>
                                            <option value="America/Managua">(GMT-06:00) Central America</option>
                                            <option value="US/Central">(GMT-06:00) Central Time (US & Canada)</option>
                                            <option value="America/Mexico_City">(GMT-06:00) Guadalajara, Mexico City,
                                                Monterrey
                                            </option>
                                            <option value="Canada/Saskatchewan">(GMT-06:00) Saskatchewan</option>
                                            <option value="America/Bogota">(GMT-05:00) Bogota, Lima, Quito, Rio Branco
                                            </option>
                                            <option value="US/Eastern">(GMT-05:00) Eastern Time (US & Canada)</option>
                                            <option value="US/East-Indiana">(GMT-05:00) Indiana (East)</option>
                                            <option value="Canada/Atlantic">(GMT-04:00) Atlantic Time (Canada)</option>
                                            <option value="America/Caracas">(GMT-04:00) Caracas, La Paz</option>
                                            <option value="America/Manaus">(GMT-04:00) Manaus</option>
                                            <option value="America/Santiago">(GMT-04:00) Santiago</option>
                                            <option value="Canada/Newfoundland">(GMT-03:30) Newfoundland</option>
                                            <option value="America/Sao_Paulo">(GMT-03:00) Brasilia</option>
                                            <option value="America/Argentina/Buenos_Aires">(GMT-03:00) Buenos Aires,
                                                Georgetown
                                            </option>
                                            <option value="America/Godthab">(GMT-03:00) Greenland</option>
                                            <option value="America/Montevideo">(GMT-03:00) Montevideo</option>
                                            <option value="America/Noronha">(GMT-02:00) Mid-Atlantic</option>
                                            <option value="Atlantic/Cape_Verde">(GMT-01:00) Cape Verde Is.</option>
                                            <option value="Atlantic/Azores">(GMT-01:00) Azores</option>
                                            <option value="Africa/Casablanca">(GMT+00:00) Casablanca, Monrovia,
                                                Reykjavik
                                            </option>
                                            <option value="Etc/Greenwich">(GMT+00:00) Greenwich Mean Time : Dublin,
                                                Edinburgh, Lisbon, London
                                            </option>
                                            <option value="Europe/Amsterdam">(GMT+01:00) Amsterdam, Berlin, Bern, Rome,
                                                Stockholm, Vienna
                                            </option>
                                            <option value="Europe/Belgrade">(GMT+01:00) Belgrade, Bratislava, Budapest,
                                                Ljubljana, Prague
                                            </option>
                                            <option value="Europe/Brussels">(GMT+01:00) Brussels, Copenhagen, Madrid,
                                                Paris
                                            </option>
                                            <option value="Europe/Sarajevo">(GMT+01:00) Sarajevo, Skopje, Warsaw,
                                                Zagreb
                                            </option>
                                            <option value="Africa/Lagos">(GMT+01:00) West Central Africa</option>
                                            <option value="Asia/Amman">(GMT+02:00) Amman</option>
                                            <option value="Europe/Athens">(GMT+02:00) Athens, Bucharest, Istanbul
                                            </option>
                                            <option value="Asia/Beirut">(GMT+02:00) Beirut</option>
                                            <option value="Africa/Cairo">(GMT+02:00) Cairo</option>
                                            <option value="Africa/Harare">(GMT+02:00) Harare, Pretoria</option>
                                            <option value="Europe/Helsinki">(GMT+02:00) Helsinki, Kyiv, Riga, Sofia,
                                                Tallinn, Vilnius
                                            </option>
                                            <option value="Asia/Jerusalem">(GMT+02:00) Jerusalem</option>
                                            <option value="Europe/Minsk">(GMT+02:00) Minsk</option>
                                            <option value="Africa/Windhoek">(GMT+02:00) Windhoek</option>
                                            <option value="Asia/Kuwait">(GMT+03:00) Kuwait, Riyadh, Baghdad</option>
                                            <option value="Europe/Moscow">(GMT+03:00) Moscow, St. Petersburg,
                                                Volgograd
                                            </option>
                                            <option value="Africa/Nairobi">(GMT+03:00) Nairobi</option>
                                            <option value="Asia/Tbilisi">(GMT+03:00) Tbilisi</option>
                                            <option value="Asia/Tehran">(GMT+03:30) Tehran</option>
                                            <option value="Asia/Muscat">(GMT+04:00) Abu Dhabi, Muscat</option>
                                            <option value="Asia/Baku">(GMT+04:00) Baku</option>
                                            <option value="Asia/Yerevan">(GMT+04:00) Yerevan</option>
                                            <option value="Asia/Kabul">(GMT+04:30) Kabul</option>
                                            <option value="Asia/Yekaterinburg">(GMT+05:00) Yekaterinburg</option>
                                            <option value="Asia/Karachi">(GMT+05:00) Islamabad, Karachi, Tashkent
                                            </option>
                                            <option value="Asia/Calcutta">(GMT+05:30) Chennai, Kolkata, Mumbai, New
                                                Delhi
                                            </option>
                                            <option value="Asia/Calcutta">(GMT+05:30) Sri Jayawardenapura</option>
                                            <option value="Asia/Katmandu">(GMT+05:45) Kathmandu</option>
                                            <option value="Asia/Almaty">(GMT+06:00) Almaty, Novosibirsk</option>
                                            <option value="Asia/Dhaka">(GMT+06:00) Astana, Dhaka</option>
                                            <option value="Asia/Rangoon">(GMT+06:30) Yangon (Rangoon)</option>
                                            <option value="Asia/Bangkok">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                                            <option value="Asia/Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                                            <option value="Asia/Hong_Kong">(GMT+08:00) Beijing, Chongqing, Hong Kong,
                                                Urumqi
                                            </option>
                                            <option value="Asia/Kuala_Lumpur">(GMT+08:00) Kuala Lumpur, Singapore
                                            </option>
                                            <option value="Asia/Irkutsk">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                            <option value="Australia/Perth">(GMT+08:00) Perth</option>
                                            <option value="Asia/Taipei">(GMT+08:00) Taipei</option>
                                            <option value="Asia/Tokyo">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                            <option value="Asia/Seoul">(GMT+09:00) Seoul</option>
                                            <option value="Asia/Yakutsk">(GMT+09:00) Yakutsk</option>
                                            <option value="Australia/Adelaide">(GMT+09:30) Adelaide</option>
                                            <option value="Australia/Darwin">(GMT+09:30) Darwin</option>
                                            <option value="Australia/Brisbane">(GMT+10:00) Brisbane</option>
                                            <option value="Australia/Canberra">(GMT+10:00) Canberra, Melbourne, Sydney
                                            </option>
                                            <option value="Australia/Hobart">(GMT+10:00) Hobart</option>
                                            <option value="Pacific/Guam">(GMT+10:00) Guam, Port Moresby</option>
                                            <option value="Asia/Vladivostok">(GMT+10:00) Vladivostok</option>
                                            <option value="Asia/Magadan">(GMT+11:00) Magadan, Solomon Is., New
                                                Caledonia
                                            </option>
                                            <option value="Pacific/Auckland">(GMT+12:00) Auckland, Wellington</option>
                                            <option value="Pacific/Fiji">(GMT+12:00) Fiji, Kamchatka, Marshall Is.
                                            </option>
                                            <option value="Pacific/Tongatapu">(GMT+13:00) Nuku'alofa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        |
                                        <a href="{{env('APP_URL')}}/technicians" class="btn btn-warning">Go Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

    <!-- end:: Content -->
    <script>

        $(document).ready(function () {
            KTApp.blockPage({
                baseZ: 2000,
                overlayColor: '#000000',
                type: 'v1',
                state: 'danger',
                opacity: 0.15,
                message: 'Loading Please Wait...'
            });
            setTimeout(function () {
                KTApp.unblockPage();
            }, 3000);

            $(function () {
                // Initialize form validation.
                $(".listing_form").validate({
                    // Specify validation rules
                    rules: {
                        name: {required: true},
                        email: {email: true, required: true},
                        phone: {required: true, minlength: 10},
                        address: {required: true},
                        website: {required: true},

                    },
                    // Specify validation error messages
                    messages: {
                        name: "Please enter name",
                        email: "Please enter email address",
                        phone: {
                            required: "Please provide a phone number",
                            minlength: "Your phone number must be 10 characters long"
                        },
                        address: "Please enter address",
                        website: "Please enter address",
                    },
                    // Invalid Handler message
                    invalidHandler: function (event, validator) {
                        swal.fire({
                            "title": "",
                            "text": "There are some errors in your submission. Please correct them.",
                            "type": "error",
                            "confirmButtonClass": "btn btn-secondary",
                            "onClose": function (e) {
                                console.log('on close event fired!');
                            }
                        })
                    },
                    // Here we submit the completed form to database
                    submitHandler: function (form, e) {
                        // Enable Page Loading
                        KTApp.blockPage({
                            baseZ: 2000,
                            overlayColor: '#000000',
                            type: 'v1',
                            state: 'danger',
                            opacity: 0.15,
                            message: 'Processing...'
                        });
                        var form = $('.listing_form');
                        var data = form.serializeArray();
                        e.preventDefault();
                        e.stopImmediatePropagation();
                        $.ajax({
                            url: "{{env('APP_URL')}}/technician/save",
                            type: 'POST',
                            dataType: "JSON",
                            data: data,
                            success: function (result) {
                                if (result['status']) {
                                    // Disable Page Loading and show confirmation
                                    setTimeout(function () {
                                        KTApp.unblockPage();
                                    }, 1000);
                                    setTimeout(function () {
                                        swal.fire({
                                            "title": "",
                                            "text": "Saved Successfully",
                                            "type": "success",
                                            "showConfirmButton": false,
                                            "timer": 1500,
                                            "onClose": function (e) {
                                                window.location.href = `{{env('APP_URL')}}/technicians`
                                            }
                                        })
                                    }, 2000);
                                } else {
                                    setTimeout(function () {
                                        KTApp.unblockPage();
                                    }, 1000);
                                    setTimeout(function () {
                                        swal.fire({
                                            "title": "",
                                            "text": result['message'],
                                            "type": "error",
                                            "confirmButtonClass": "btn btn-secondary",
                                            "onClose": function (e) {
                                                console.log('on close event fired!');
                                            }
                                        })
                                    }, 2000);
                                }
                            }
                        });
                    }
                });
            });

        });

    </script>
@endsection
