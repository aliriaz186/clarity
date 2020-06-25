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
                <input type="hidden" name="userId" id="expertise-id"
                       class="form-control" value="{{$expertListing->id}}">
                <div class="col-xl-12 order-lg-12 order-xl-12">

                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="kt-font-brand fas fa-user"></i>
                            </span>
                                <h3 class="kt-portlet__head-title">
                                    Add your areas of expertise
                                </h3>
                            </div>
                        </div>
                        <br>
                        <div>
                            <p class="ml-4">Add expertise listings to your profile to make it easier for others to find
                                you.
                            </p>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%"><span
                                                    class="input-group-text" style="width: 100%">Title</span>
                                        </div>
                                        <input type="text" name="title" id="title"
                                               class="form-control"
                                               placeholder="I will give you advice on..." value="{{$expertListing->title}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="">
                                        <img src="{{ URL::to('/') }}/img/cover/{{$expertListing->cover_image}}"
                                             style="width: 150px!important;cursor: pointer" onclick="uploadImage()"
                                             class="rounded picture-src" id="photopreview" accept="image/*">
                                        <input type="file" name="image" id="photo" onchange="readURL(this)"
                                               style="display: none">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%"><span
                                                    class="input-group-text" style="width: 100%">Enter Category</span>
                                        </div>
                                        <input type="text" name="category" id="category"
                                               class="form-control"
                                               placeholder="Enter your category" value="{{$expertListing->category}}">
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
                                                <span>Description</span>
                                            </div>
                                        </div>
                                        <textarea name="miniResume" id="description"
                                                  class="form-control"
                                                  rows="5"
                                                  placeholder="Describe your experience, training, etc that demonstrate your skills & passion. Also, describes the benefits they'll receive.">{{$expertListing->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%"><span
                                                    class="input-group-text" style="width: 100%">Add Topics</span>
                                        </div>
                                        <input type="text" name="tags" id="tags"
                                               class="form-control"
                                               placeholder="Tags related to your listing..." style="width: 100px!important;" value="{{$expertListing->expertise_tags}}">
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
                                        <button type="button" class="btn btn-primary" onclick="updateInfo()">Update
                                            Expertise
                                        </button>
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
            let expertiseId = document.getElementById('expertise-id').value;
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
            formData.append("expertiseId", expertiseId);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: `{{env('APP_URL')}}/api/expertise/update`,
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
                        window.location.href = `{{env('APP_URL')}}/expertise/listing/view`
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
