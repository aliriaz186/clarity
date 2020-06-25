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
                                <th scope="col">Approval Status</th>
                                <th scope="col">Validity Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($callRequests as $key=>$call)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$call->caller_name}}</td>
                                    <td>{{$call->message}}</td>
                                    <td>{{$call->call_total_time}}</td>
                                    <td>{{$call->call_total_Costs}}</td>
                                    <td>{{$call->suggested_time_one}}</td>
                                    <td>{{$call->suggested_time_two}}</td>
                                    <td>{{$call->suggested_time_three}}</td>
                                    <td>{{$call->approval_status}}</td>
                                    <td>{{$call->status}}</td>
                                    <td style="width: 15%!important;"><a type="button" class="btn btn-primary"
                                           style="color: white"
                                           href="{{ url ('') }}/expertise/listing">Accept</a><a type="button"
                                                                                                   class="btn btn-warning ml-3"
                                                                                                   style="color: white"
                                                                                                   href="{{ url ('') }}/expertise/listing">Reject</a>
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
@endsection
