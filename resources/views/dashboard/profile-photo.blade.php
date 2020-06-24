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
                                    Upload a New Profile Photo
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="row">
                                <div class="col-lg-4 center"
                                     style="padding: 20px;border: 1px solid #d9d9d9;background: #f7f7f7;border-radius: 2%">
                                    <div style="text-align: center">
                                        <input type="file" id="file-open" style="display: none" onchange="saveFile()">
                                        @if(empty($profilePhoto))
                                            <img onclick="OpenCompanyLogoSelection()" src="{{asset('img/default.svg')}}"
                                                 style="width: 100px; height: 100px; cursor: pointer">
                                        @else
                                            <img onclick="OpenCompanyLogoSelection()"
                                                 src="{{asset('profile-pictures')}}/{{$profilePhoto}}"
                                                 style="width: 100px; height: 100px; cursor: pointer;border-radius: 50%;object-fit: contain">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-4 center"
                                     style="padding: 10px;border: 1px solid #d9d9d9;background: #f7f7f7;border-radius: 2%">
                                    <div style="text-align: center">
                                        <input type="file" id="file-open" onchange="saveFile()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 mt-3 text-right">
                                <label class="">Or</label></div>
                            <label class="text-muted mt-1 ml-5 px-1">Click on Photo Icon to Upload Photo</label>
                        </div>

                    </div>
                </div>
        </form>
    </div>

    <!-- end:: Content -->
    <script>

        function OpenCompanyLogoSelection() {
            document.getElementById('file-open').click();
        }

        function saveFile() {
            let files = document.getElementById('file-open').files;
            if (files.length <= 0) {
                return
            }
            let formData = new FormData();
            for (let i = 0; i < files.length; i++) {
                formData.append('files[]', files[i]);
            }
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: `{{env('APP_URL')}}/profile/update`,
                type: 'POST',
                dataType: "JSON",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (result) {
                    swal.fire({
                        "title": "",
                        "text": "Saved Successfully",
                        "type": "success",
                        "showConfirmButton": false,
                        "timer": 1500,
                        "onClose": function (e) {
                            window.location.reload();
                        }
                    });
                },
                error: function (data) {
                    swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "server Error",
                    });
                }
            });
        }

    </script>
@endsection
