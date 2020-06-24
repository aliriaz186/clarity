@extends('dashboard.layout')
<!-- begin:: Content -->
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--Begin::Dashboard 1-->

        <!--Begin::Row-->
        <div class="form-horizontal listing_form">
            <div class="row">
                <input type="hidden" name="userId" id="userId"
                       class="form-control" value="{{$basicInfo['userId'] ?? ''}}">
                <div class="col-xl-12 order-lg-12 order-xl-12">

                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="kt-font-brand fas fa-user"></i>
                            </span>
                                <h3 class="kt-portlet__head-title">
                                    Personalize your profile page
                                </h3>
                            </div>
                        </div>
                        <br>
                        <div>
                            <p class="ml-4">Your profile page is where others can learn more about you when making
                                calls.
                            </p>
                        </div>
                        <div class="kt-portlet__body">
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
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%">
                                            <div
                                                    class="input-group-text" style="width: 100%">
                                                <span>Mini-Resume</span><a class="ml-2"
                                                                           href="{{env('APP_URL')}}/resumes-example"
                                                                           style="color: #67afc8!important;">(Examples)</a>
                                            </div>
                                        </div>
                                        <textarea name="miniResume" id="mini-resume"
                                                  class="form-control"
                                                  rows="5">{{$basicInfo['miniResume'] ?? ''}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%"><span
                                                    class="input-group-text" style="width: 100%;">Hourly Rate</span>
                                        </div>
                                        <select name="hourlyRate" id="hourly-rate"
                                                class="form-control" value="{{$basicInfo['hourlyRate'] ?? ''}}">
                                            <option selected="selected" value="">Select an hourly rate</option>


                                            <option value="60">$60</option>


                                            <option value="100">$100</option>


                                            <option value="120">$120</option>


                                            <option value="150">$150</option>


                                            <option value="175">$175</option>


                                            <option value="200">$200</option>


                                            <option value="250">$250</option>


                                            <option value="300">$300</option>


                                            <option value="350">$350</option>


                                            <option value="400">$400</option>


                                            <option value="450">$450</option>


                                            <option value="500">$500</option>


                                            <option value="600">$600</option>


                                            <option value="1000">$1,000</option>
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
                                        <button type="button" class="btn btn-primary" onclick="updateInfo()">Save
                                        </button>
                                        |
                                        <a href="{{env('APP_URL')}}/technicians" class="btn btn-warning">Go Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- end:: Content -->
    <script>
        function updateInfo() {
            let shortBio = document.getElementById('shortBio').value;
            let resume = document.getElementById('mini-resume').value;
            let hourlyRate = document.getElementById('hourly-rate').value;
            let userId = document.getElementById('userId').value;
            if (resume === "" || resume === null) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Short Resume cannot be empty!',
                });
                return false;
            }
            if (hourlyRate === "" || hourlyRate === null) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Hourly Rate cannot be empty!',
                });
                return false;
            }
            $.ajax({
                url: `{{env('APP_URL')}}/api/update/next/info`,
                type: 'POST',
                dataType: "JSON",
                data: {
                    shortBio: shortBio,
                    resume: resume,
                    hourlyRate: hourlyRate,
                    idUser: userId,
                    "_token": "{{ csrf_token() }}"
                },
                beforeSend: function () {
                    $('#main-form').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
                },
                success: function (result) {
                    // document.getElementById('user_password').value = '';
                    if (result) {
                        window.location.href = `{{env('APP_URL')}}/expertise/listing`
                    } else {
                        setTimeout(function () {
                            alert("server error")
                        }, 3000);
                    }
                },
            });
        }

    </script>
@endsection
