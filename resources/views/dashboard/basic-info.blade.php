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
                                        <input type="text" name="yourName" id="yourName"
                                               class="form-control"
                                               placeholder="John Doe" value="{{$basicInfo['yourName'] ?? ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%"><span
                                                class="input-group-text" style="width: 100%">Username</span>
                                        </div>
                                        <input type="text" name="username" id="username"
                                               class="form-control"
                                               placeholder="Enter Your Username"
                                               value="{{$basicInfo['username'] ?? ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%"><span
                                                class="input-group-text" style="width: 100%">Short Bio</span>
                                        </div>
                                        <input type="text" name="shortBio" id="shortBio"
                                               class="form-control"
                                               placeholder="Your Short Bio" value="{{$basicInfo['shortBio'] ?? ''}}">
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
                                        <textarea name="miniResume" id="miniResume"
                                                  class="form-control"
                                                  rows="5">{{$basicInfo['miniResume'] ?? ''}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%"><span
                                                class="input-group-text" style="width: 100%">Email</span>
                                        </div>
                                        <input readonly type="email" name="email" id="email"
                                               class="form-control"
                                               placeholder="Example@abc.com" value="{{$basicInfo['email'] ?? ''}}">
                                    </div>
                                    <label class="text-muted mt-2">Please contact support to change your email
                                        address.</label>
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
                                               placeholder="xxx-xxx-xxx" value="{{$basicInfo['cellPhone'] ?? ''}}">
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
                                               placeholder="San Francisco, CA"
                                               value="{{$basicInfo['yourLocation'] ?? ''}}">
                                    </div>

                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%"><span
                                                class="input-group-text" style="width: 100%">Your Timezone</span>
                                        </div>
                                        <select name="timeZone" id="timeZone"
                                                class="form-control" value="{{$basicInfo['yourTimezone'] ?? ''}}">
                                            <option>Select Timezone</option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Etc/GMT+12" ? 'selected' : ''}} value="Etc/GMT+12">
                                                (GMT-12:00) International Date Line West
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Pacific/Midway" ? 'selected' : ''}} value="Pacific/Midway">
                                                (GMT-11:00) Midway Island, Samoa
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Pacific/Honolulu" ? 'selected' : ''}} value="Pacific/Honolulu">
                                                (GMT-10:00) Hawaii
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "US/Alaska" ? 'selected' : ''}} value="US/Alaska">
                                                (GMT-09:00) Alaska
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "America/Los_Angeles" ? 'selected' : ''}} value="America/Los_Angeles">
                                                (GMT-08:00) Pacific Time (US & Canada)
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "America/Tijuana" ? 'selected' : ''}} value="America/Tijuana">
                                                (GMT-08:00) Tijuana, Baja California
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "US/Arizona" ? 'selected' : ''}} value="US/Arizona">
                                                (GMT-07:00) Arizona
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "America/Chihuahua" ? 'selected' : ''}} value="America/Chihuahua">
                                                (GMT-07:00) Chihuahua, La Paz, Mazatlan
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "US/Mountain" ? 'selected' : ''}} value="US/Mountain">
                                                (GMT-07:00) Mountain Time (US & Canada)
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "America/Managua" ? 'selected' : ''}} value="America/Managua">
                                                (GMT-06:00) Central America
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "US/Central" ? 'selected' : ''}} value="US/Central">
                                                (GMT-06:00) Central Time (US & Canada)
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "America/Mexico_City" ? 'selected' : ''}} value="America/Mexico_City">
                                                (GMT-06:00) Guadalajara, Mexico City,
                                                Monterrey
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Canada/Saskatchewan" ? 'selected' : ''}} value="Canada/Saskatchewan">
                                                (GMT-06:00) Saskatchewan
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "America/Bogota" ? 'selected' : ''}} value="America/Bogota">
                                                (GMT-05:00) Bogota, Lima, Quito, Rio Branco
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "US/Eastern" ? 'selected' : ''}} value="US/Eastern">
                                                (GMT-05:00) Eastern Time (US & Canada)
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "US/East-Indiana" ? 'selected' : ''}} value="US/East-Indiana">
                                                (GMT-05:00) Indiana (East)
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Canada/Atlantic" ? 'selected' : ''}} value="Canada/Atlantic">
                                                (GMT-04:00) Atlantic Time (Canada)
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "America/Caracas" ? 'selected' : ''}} value="America/Caracas">
                                                (GMT-04:00) Caracas, La Paz
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "America/Manaus" ? 'selected' : ''}} value="America/Manaus">
                                                (GMT-04:00) Manaus
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "America/Santiago" ? 'selected' : ''}} value="America/Santiago">
                                                (GMT-04:00) Santiago
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Canada/Newfoundland" ? 'selected' : ''}} value="Canada/Newfoundland">
                                                (GMT-03:30) Newfoundland
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "America/Sao_Paulo" ? 'selected' : ''}} value="America/Sao_Paulo">
                                                (GMT-03:00) Brasilia
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "America/Argentina/Buenos_Aires" ? 'selected' : ''}} value="America/Argentina/Buenos_Aires">
                                                (GMT-03:00) Buenos Aires,
                                                Georgetown
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "America/Godthab" ? 'selected' : ''}} value="America/Godthab">
                                                (GMT-03:00) Greenland
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "America/Montevideo" ? 'selected' : ''}} value="America/Montevideo">
                                                (GMT-03:00) Montevideo
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "America/Noronha" ? 'selected' : ''}} value="America/Noronha">
                                                (GMT-02:00) Mid-Atlantic
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Atlantic/Cape_Verde" ? 'selected' : ''}} value="Atlantic/Cape_Verde">
                                                (GMT-01:00) Cape Verde Is.
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Atlantic/Azores" ? 'selected' : ''}} value="Atlantic/Azores">
                                                (GMT-01:00) Azores
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Africa/Casablanca" ? 'selected' : ''}} value="Africa/Casablanca">
                                                (GMT+00:00) Casablanca, Monrovia,
                                                Reykjavik
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Etc/Greenwich" ? 'selected' : ''}} value="Etc/Greenwich">
                                                (GMT+00:00) Greenwich Mean Time : Dublin,
                                                Edinburgh, Lisbon, London
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Europe/Amsterdam" ? 'selected' : ''}} value="Europe/Amsterdam">
                                                (GMT+01:00) Amsterdam, Berlin, Bern, Rome,
                                                Stockholm, Vienna
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Europe/Belgrade" ? 'selected' : ''}} value="Europe/Belgrade">
                                                (GMT+01:00) Belgrade, Bratislava, Budapest,
                                                Ljubljana, Prague
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Europe/Brussels" ? 'selected' : ''}} value="Europe/Brussels">
                                                (GMT+01:00) Brussels, Copenhagen, Madrid,
                                                Paris
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Europe/Sarajevo" ? 'selected' : ''}} value="Europe/Sarajevo">
                                                (GMT+01:00) Sarajevo, Skopje, Warsaw,
                                                Zagreb
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Africa/Lagos" ? 'selected' : ''}} value="Africa/Lagos">
                                                (GMT+01:00) West Central Africa
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Amman" ? 'selected' : ''}} value="Asia/Amman">
                                                (GMT+02:00) Amman
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Europe/Athens" ? 'selected' : ''}} value="Europe/Athens">
                                                (GMT+02:00) Athens, Bucharest, Istanbul
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Beirut" ? 'selected' : ''}} value="Asia/Beirut">
                                                (GMT+02:00) Beirut
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Africa/Cairo" ? 'selected' : ''}} value="Africa/Cairo">
                                                (GMT+02:00) Cairo
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Africa/Harare" ? 'selected' : ''}} value="Africa/Harare">
                                                (GMT+02:00) Harare, Pretoria
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Europe/Helsinki" ? 'selected' : ''}} value="Europe/Helsinki">
                                                (GMT+02:00) Helsinki, Kyiv, Riga, Sofia,
                                                Tallinn, Vilnius
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Jerusalem" ? 'selected' : ''}} value="Asia/Jerusalem">
                                                (GMT+02:00) Jerusalem
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Europe/Minsk" ? 'selected' : ''}} value="Europe/Minsk">
                                                (GMT+02:00) Minsk
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Africa/Windhoek" ? 'selected' : ''}} value="Africa/Windhoek">
                                                (GMT+02:00) Windhoek
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Kuwait" ? 'selected' : ''}} value="Asia/Kuwait">
                                                (GMT+03:00) Kuwait, Riyadh, Baghdad
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Europe/Moscow" ? 'selected' : ''}} value="Europe/Moscow">
                                                (GMT+03:00) Moscow, St. Petersburg,
                                                Volgograd
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Africa/Nairobi" ? 'selected' : ''}} value="Africa/Nairobi">
                                                (GMT+03:00) Nairobi
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Tbilisi" ? 'selected' : ''}} value="Asia/Tbilisi">
                                                (GMT+03:00) Tbilisi
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Tehran" ? 'selected' : ''}} value="Asia/Tehran">
                                                (GMT+03:30) Tehran
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Muscat" ? 'selected' : ''}} value="Asia/Muscat">
                                                (GMT+04:00) Abu Dhabi, Muscat
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Baku" ? 'selected' : ''}} value="Asia/Baku">
                                                (GMT+04:00) Baku
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Yerevan" ? 'selected' : ''}} value="Asia/Yerevan">
                                                (GMT+04:00) Yerevan
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Kabul" ? 'selected' : ''}} value="Asia/Kabul">
                                                (GMT+04:30) Kabul
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Yekaterinburg" ? 'selected' : ''}} value="Asia/Yekaterinburg">
                                                (GMT+05:00) Yekaterinburg
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Karachi" ? 'selected' : ''}} value="Asia/Karachi">
                                                (GMT+05:00) Islamabad, Karachi, Tashkent
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Calcutta" ? 'selected' : ''}} value="Asia/Calcutta">
                                                (GMT+05:30) Chennai, Kolkata, Mumbai, New
                                                Delhi
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Calcutta" ? 'selected' : ''}} value="Asia/Calcutta">
                                                (GMT+05:30) Sri Jayawardenapura
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Katmandu" ? 'selected' : ''}} value="Asia/Katmandu">
                                                (GMT+05:45) Kathmandu
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Almaty" ? 'selected' : ''}} value="Asia/Almaty">
                                                (GMT+06:00) Almaty, Novosibirsk
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Dhaka" ? 'selected' : ''}} value="Asia/Dhaka">
                                                (GMT+06:00) Astana, Dhaka
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Rangoon" ? 'selected' : ''}} value="Asia/Rangoon">
                                                (GMT+06:30) Yangon (Rangoon)
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Bangkok" ? 'selected' : ''}} value="Asia/Bangkok">
                                                (GMT+07:00) Bangkok, Hanoi, Jakarta
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Krasnoyarsk" ? 'selected' : ''}} value="Asia/Krasnoyarsk">
                                                (GMT+07:00) Krasnoyarsk
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Hong_Kong" ? 'selected' : ''}} value="Asia/Hong_Kong">
                                                (GMT+08:00) Beijing, Chongqing, Hong Kong,
                                                Urumqi
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Kuala_Lumpur" ? 'selected' : ''}} value="Asia/Kuala_Lumpur">
                                                (GMT+08:00) Kuala Lumpur, Singapore
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Irkutsk" ? 'selected' : ''}} value="Asia/Irkutsk">
                                                (GMT+08:00) Irkutsk, Ulaan Bataar
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Australia/Perth" ? 'selected' : ''}} value="Australia/Perth">
                                                (GMT+08:00) Perth
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Taipei" ? 'selected' : ''}} value="Asia/Taipei">
                                                (GMT+08:00) Taipei
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Tokyo" ? 'selected' : ''}} value="Asia/Tokyo">
                                                (GMT+09:00) Osaka, Sapporo, Tokyo
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Seoul" ? 'selected' : ''}} value="Asia/Seoul">
                                                (GMT+09:00) Seoul
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Yakutsk" ? 'selected' : ''}} value="Asia/Yakutsk">
                                                (GMT+09:00) Yakutsk
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Australia/Adelaide" ? 'selected' : ''}} value="Australia/Adelaide">
                                                (GMT+09:30) Adelaide
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Australia/Darwin" ? 'selected' : ''}} value="Australia/Darwin">
                                                (GMT+09:30) Darwin
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Australia/Brisbane" ? 'selected' : ''}} value="Australia/Brisbane">
                                                (GMT+10:00) Brisbane
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Australia/Canberra" ? 'selected' : ''}} value="Australia/Canberra">
                                                (GMT+10:00) Canberra, Melbourne, Sydney
                                            </option>
                                            <option value="Australia/Hobart">(GMT+10:00) Hobart</option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Pacific/Guam" ? 'selected' : ''}} value="Pacific/Guam">
                                                (GMT+10:00) Guam, Port Moresby
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Vladivostok" ? 'selected' : ''}} value="Asia/Vladivostok">
                                                (GMT+10:00) Vladivostok
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Asia/Magadan" ? 'selected' : ''}} value="Asia/Magadan">
                                                (GMT+11:00) Magadan, Solomon Is., New
                                                Caledonia
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Pacific/Auckland" ? 'selected' : ''}} value="Pacific/Auckland">
                                                (GMT+12:00) Auckland, Wellington
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Pacific/Fiji" ? 'selected' : ''}} value="Pacific/Fiji">
                                                (GMT+12:00) Fiji, Kamchatka, Marshall Is.
                                            </option>
                                            <option
                                                {{$basicInfo['yourTimezone'] == "Pacific/Tongatapu" ? 'selected' : ''}} value="Pacific/Tongatapu">
                                                (GMT+13:00) Nuku'alofa
                                            </option>
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
                        yourName: {required: true},
                        username: {required: true},
                        phone: {required: true, minlength: 10},
                    },
                    // Specify validation error messages
                    messages: {
                        yourName: "Name is required",
                        username: "Username is required",
                        phone: {
                            required: "Please provide a phone number",
                            minlength: "Your phone number must be 10 characters long"
                        },
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
                            url: "{{env('APP_URL')}}/basic-info/save",
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
                                                {{--window.location.href = `{{env('APP_URL')}}/technicians`--}}
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
