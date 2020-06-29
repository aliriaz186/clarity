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
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Caller Name</th>
                                <th scope="col">Message</th>
                                <th scope="col">Call Total Time</th>
                                <th scope="col">Call Total Cost</th>
                                <th scope="col">Suggested Time One</th>
                                <th scope="col">Suggested Time Two</th>
                                <th scope="col">Suggested Time Three</th>
                                <th scope="col">Validity Status</th>
                                <th scope="col">Approval Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($callRequests as $key=>$call)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$call->caller_name ?? ''}}</td>
                                    <td>{{$call->message ?? ''}}</td>
                                    <td>{{$call->call_total_time ?? ''}}</td>
                                    <td>{{$call->call_total_Costs ?? ''}}</td>
                                    <td>{{$call->suggested_time_one ?? ''}}</td>
                                    <td>{{$call->suggested_time_two ?? ''}}</td>
                                    <td>{{$call->suggested_time_three ?? ''}}</td>
                                    <td>{{$call->status}}</td>
                                    <td>{{$call->approval_status}}</td>
                                    <td style="width: 15%!important;">@if($call->approval_status=='pending' ?? '')<a type="button" class="btn btn-primary btn-sm"
                                                                         onclick="acceptRequest('{{$call->id}}','{{$call->suggested_time_one ?? ''}}','{{$call->suggested_time_two ?? ''}}','{{$call->suggested_time_three ?? ''}}')"
                                                                         data-toggle="modal" data-target="#myModal"
                                                                         style="color: white">Accept</a><a type="button"
                                                                                                           class="btn btn-warning ml-3 btn-sm"
                                                                                                           style="color: white" onclick="rejectRequest('{{$call->id ?? ''}}')">Reject</a>
                                                                          @endif
                                        @if($call->approval_status=='approved')
                                            <p>Scheduled at {{$call->scheduled_date_time ?? ''}}</p>
                                            @endif
                                        @if($call->approval_status=='Rejected' ?? '')
                                            <p>Request Rejected</p>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Please select your desire time for call</h4>
                                        <button type="button" class="close" data-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">

                                        <div class="container">
                                            <form action="/action_page.php">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" id="call-id">
                                                        <div class="form-check">
                                                            <label class="form-check-label" for="radio1">
                                                                <input type="radio" class="form-check-input"
                                                                       id="desire-time" name="optradio" checked><span
                                                                        class="mt-3" id="desire-time-span"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label" for="radio2">
                                                                <input type="radio" class="form-check-input"
                                                                       id="desire-time-2" name="optradio"><span
                                                                        class="mt-3" id="desire-time-span-2"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label" for="radio2">
                                                                <input type="radio" class="form-check-input"
                                                                       id="desire-time-3"
                                                                       name="optradio"><span
                                                                        style="margin-top: 5px!important;"
                                                                        id="desire-time-span-3"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br>
                                                <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="scheduledTime()">Accept
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">
                                            Close
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function acceptRequest(callId, timeOne, timeTwo, timeThree) {
                document.getElementById("desire-time-span").innerText = timeOne;
                document.getElementById("desire-time-span-2").innerText = timeTwo;
                document.getElementById("desire-time-span-3").innerText = timeThree;
                document.getElementById("call-id").value = callId;
            }

            function scheduledTime() {
                let callId = document.getElementById('call-id').value;
                let desireTimeOne = document.getElementById('desire-time-span').innerText;
                let desireTimeTwo = document.getElementById('desire-time-span-2').innerText;
                let desireTimeThree = document.getElementById('desire-time-span-3').innerText;
                let firstRadio = document.getElementById('desire-time').checked;
                let secondRadio = document.getElementById('desire-time-2').checked;
                let thirdRadio = document.getElementById('desire-time-3').checked;
                let selectedTime = "";
                if (firstRadio) {
                    selectedTime = desireTimeOne;
                    alert(selectedTime);
                }
                if (secondRadio) {
                    selectedTime = desireTimeTwo;
                }
                if (thirdRadio) {
                    selectedTime = desireTimeThree;
                }
                $.ajax({
                    url: `{{env('APP_URL')}}/api/accept/call/request`,
                    type: 'POST',
                    dataType: "JSON",
                    data: {
                        callId: callId,
                        selectedTime: selectedTime,
                        "_token": "{{ csrf_token() }}"
                    },
                    beforeSend: function () {
                        $('#main-form').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
                    },
                    success: function (result) {
                        // document.getElementById('user_password').value = '';
                        if (result) {
                            swal.fire({
                                "title": "",
                                "text": "Call Request Accept Successfully",
                                "type": "success",
                                "showConfirmButton": false,
                                "timer": 2000,
                                "onClose": function (e) {
                                    window.location.reload();
                                }
                            });
                        } else {
                            setTimeout(function () {
                                alert("server error")
                            }, 3000);
                        }
                    },
                });
            }
            function rejectRequest(callId) {
                let confirmation=confirm("Are you sure you want to reject the request")
                if (confirmation){
                 let callid=callId;
                    $.ajax({
                        url: `{{env('APP_URL')}}/api/reject/call/request`,
                        type: 'POST',
                        dataType: "JSON",
                        data: {
                            callId: callId,
                            "_token": "{{ csrf_token() }}"
                        },
                        beforeSend: function () {
                            $('#main-form').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
                        },
                        success: function (result) {
                            // document.getElementById('user_password').value = '';
                            if (result) {
                                swal.fire({
                                    "title": "",
                                    "text": "Call Request Reject Successfully",
                                    "type": "success",
                                    "showConfirmButton": false,
                                    "timer": 2000,
                                    "onClose": function (e) {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                setTimeout(function () {
                                    alert("server error")
                                }, 3000);
                            }
                        },
                    });
                }

            }
        </script>
@endsection
