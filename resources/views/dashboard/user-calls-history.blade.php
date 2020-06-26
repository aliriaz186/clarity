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
                                <th scope="col">Journalist Name</th>
                                <th scope="col">Call Total Cost</th>
                                <th scope="col">Call Payment</th>
                                <th scope="col">Approval Status</th>
                                <th scope="col">Validity Status</th>
                                <th scope="col">Journalist Phone Number</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($callRequests as $key=>$call)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$journalistName}}</td>
                                    <td><b>$</b>{{$call->call_total_Costs}}</td>
                                    <td>{{$call->payment}}</td>
                                    <td>
                                       @if($call->approval_status=='pending') {{$call->approval_status}}
                                           @endif
                                        @if($call->approval_status=='approved')
                                            <p>Call Scheduled at <b>{{$call->scheduled_date_time}}</b></p>
                                            @endif
                                    </td>
                                    <td>{{$call->status}}</td>
                                    <td style="width: 15%!important;">
                                        @if($call->approval_status=='approved')<a type="button" class="btn btn-primary btn-sm"
                                                                         style="color: white" data-toggle="modal" data-target="#myModal" onclick="showNumber('{{$journalistPhoneNumber}}')">Click for Journalist No.</a>
                                            @endif
                                        @if($call->approval_status=='pending')
                                            <p>Pending</p>
                                            @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Journalist Phone Number</h4>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h3 id="phone-number" class="text-center">phone number</h3>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <script>
        function showNumber(phoneNumber) {
        document.getElementById('phone-number').innerText=phoneNumber;
        }
    </script>
@endsection
