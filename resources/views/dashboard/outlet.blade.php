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
                                    Add Multiple Outlets
                                </h3>
                            </div>
                        </div>

                        <div class="kt-portlet__body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%"><span
                                                class="input-group-text" style="width: 100%">Outlet Name</span>
                                        </div>
                                        <input type="text" name="outlet" id="outlet"
                                               class="form-control"
                                               placeholder="Press Enter to Add Multiple Outlets"
                                               onkeypress="addMultipleOutlets(event)">
                                    </div>
                                </div>
                                <div class="mt-2 col-lg-12">
                                    @foreach($outletList as $outlet)
                                        <span class="small my-2">
                                             <span
                                                 style="background-color: #f8f8f8;padding: 5px 13px;border: 1px solid #d0d0d0;border-radius: 4px;color: black;">{{$outlet->name}}<span
                                                     class="remove-recipient-button cursor-pointer"
                                                     style="color: red;margin-left: 10px;cursor: pointer"
                                                     onclick="deleteOutlet({{$outlet->id}})"><i
                                                         class="fas fa-times"></i></span></span></span>
                                    @endforeach
                                </div>
                            </div>
                            <label class="text-muted mt-4">Type and Press Enter to Add Multiple Outlets</label>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

    <!-- end:: Content -->
    <script>

        function addMultipleOutlets(event) {
            if (event.keyCode === 13) {
                // Initialize form validation.
                $(".listing_form").validate({
                    // Specify validation rules
                    rules: {
                        outlet: {required: true},
                    },
                    // Specify validation error messages
                    messages: {
                        outlet: "Outlet name is required",
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
                            url: "{{env('APP_URL')}}/outlet/save",
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
                                                window.location.href = `{{env('APP_URL')}}/outlet`
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

            }
        }

        function deleteOutlet(outletId) {
            KTApp.blockPage({
                baseZ: 2000,
                overlayColor: '#000000',
                type: 'v1',
                state: 'danger',
                opacity: 0.15,
                message: 'Processing...'
            });
            var formData = new FormData();
            formData.append("outletId", outletId);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax
            ({
                type:'POST',
                url: `{{env('APP_URL')}}/outlet/delete`,
                dataType: "JSON",
                data: formData,
                contentType: false,
                cache: false,
                processData:false,
                success: function (result) {
                    if (result['status']) {
                        // Disable Page Loading and show confirmation
                        setTimeout(function () {
                            KTApp.unblockPage();
                        }, 1000);
                        setTimeout(function () {
                            swal.fire({
                                "title": "",
                                "text": "Deleted Successfully",
                                "type": "success",
                                "showConfirmButton": false,
                                "timer": 1500,
                                "onClose": function (e) {
                                    window.location.href = `{{env('APP_URL')}}/outlet`
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

    </script>
@endsection
