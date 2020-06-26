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
                    @if($status==true)
                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Your Expertise
                                </h3>
                            </div>
                        </div>
                    </div>
                    @endif
                        @if($status==false)
                            <div class="kt-portlet kt-portlet--mobile">
                                <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <td style="width: 2%!important;"><img
                                                    src="{{asset('/profile-pictures')}}/{{$profileTable->profile_photo}}"
                                                    style="width: 100px; height: 100px;border-radius: 50%"></td>
                                        <td style="text-align: left!important;width: 90%!important;">
                                            <h3>Add your areas of expertise</h3>
                                            <p>Add expertise listings to your profile to make it easier for others to find
                                                you.</p>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    <div class="kt-portlet__body">
                        @if($status==true)
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <td style="width: 10%!important;"><img src="{{asset('/img/cover/')}}/{{$expertListing->cover_image ?? ''}}" style="width: 150px; height: 100px;object-fit: contain!important;"></td>
                                <td style="text-align: left!important;width: 50%!important;"><h3>{{$expertListing->title ?? ''}}</h3><p>{{$expertListing->description ?? ''}}</p></td>
                                <td style="width: 20%!important;"><a type="button" class="btn btn-primary" style="width: 200px!important;margin-top: 40px!important;color: white"href="{{ url ('') }}/expertise-edit/{{$expertListing->id ?? ''}}">Edit</a></td>
                            </tr>
                            </tbody>
                        </table>
                            @endif
                    </div>
                    <div class="kt-portlet__body">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                @if($status==false)
                                <td style="width: 61%!important;" class="text-center"><h2>No expertise listings</h2><p>Create a listing to be found in search</p><a type="button" class="btn btn-primary" style="width: 300px!important;margin-top: 40px!important;color: white"href="{{ url ('') }}/expertise/listing">New Area of Expertise</a></td>
                            @endif
                            @if($clarityUsing==true && $status==true)
                                <td style="width: 20%!important;"><a type="button" class="btn btn-warning" style="width: 200px!important;margin-top: 40px!important;color: white"href="{{ url ('') }}/clarity-using/{{$expertListing->id ?? ''}}">Start using Clarity</a>
                                </td>
                                @endif
                            </tr>
                            </tbody>
                        </table>
                        <div style="margin-top: 5px!important;">
                            @if ($errors->any())
                                <div class="alert alert-warning">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
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
