@extends('dashboard.layout')
<!-- begin:: Content -->
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--Begin::Dashboard 1-->

        <!--Begin::Row-->
        <div class="form-horizontal listing_form">
            <div class="row">
                {{--<input type="hidden" name="userId" id="userId"--}}
                {{--class="form-control" value="{{$basicInfo['userId'] ?? ''}}">--}}
                <div class="col-xl-12 order-lg-12 order-xl-12">
                    <div class="kt-portlet__body">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <td style="width: 10%!important;"><img
                                            src="{{asset('/profile-pictures')}}/{{$profileTable->profile_photo}}"
                                            style="width: 150px; height: 100px;object-fit: contain!important;"></td>
                                <td style="text-align: left!important;width: 50%!important;">
                                    <h3>{{$profileTable->user_name}}</h3>
                                    <p>{{$profileTable->short_bio}}</p><p style="font-size: 17px!important;">{{$profileTable->mini_resume}}</p></td>
                                <td style="width: 20%!important;">
                                    <h1>${{$profileTable->hourly_rate}}</h1>
                                    <p>per hour</p>
                                    {{--<button type="button" class="btn btn-primary"--}}
                                            {{--style="width: 200px!important;margin-top: 40px!important;">Edit--}}
                                    {{--</button>--}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Content -->
    <script>
        function uploadImage() {
            document.getElementById("photo").click();
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    document.getElementById('photopreview').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function updateInfo() {
            let title = document.getElementById('title').value;
            let category = document.getElementById('category').value;
            let description = document.getElementById('description').value;
            let tags = document.getElementById('tags').value;
            let userId = document.getElementById('userId').value;
            let photo = document.getElementById('photo').files[0];
            if (title === "" || title === null) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Title cannot be empty!',
                });
                return false;
            }
            if (category === "" || category === null) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Category Rate cannot be empty!',
                });
                return false;
            }
            if (tags === "" || tags === null) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Topic Tags cannot be empty!',
                });
                return false;
            }
            var formData = new FormData();
            formData.append("cover_image", photo);
            formData.append("title", title);
            formData.append("category", category);
            formData.append("description", description);
            formData.append("tags", tags);
            formData.append("userId", userId);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: `{{env('APP_URL')}}/api/expertise/save`,
                type: 'POST',
                dataType: "JSON",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('#main-form').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
                },
                success: function (result) {
                    // document.getElementById('user_password').value = '';
                    if (result) {
                        alert("expertise saved successfully");
                        {{--window.location.href = `{{env('APP_URL')}}/expertise/listing`--}}
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
