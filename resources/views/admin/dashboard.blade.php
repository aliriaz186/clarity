@extends('admin.layout')
<!-- begin:: Content -->
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--Begin::Dashboard 1-->

        <!--Begin::Row-->
        <div class="form-horizontal listing_form">
            <div class="row">
                <div class="col-xl-12 order-lg-12 order-xl-12">
                    <div class="kt-portlet__body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Username</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            @foreach($allUsers as $key=>$users)
                            <tbody>
                            <tr>
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>{{$users->name}}</td>
                                <td>{{$users->email}}</td>
                            </tr>
                            </tbody>
                                @endforeach
                        </table>
                        {{--<div class="ml-5">--}}
                            {{--<a href="{{env('APP_URL')}}/basic-information"--}}
                               {{--type="button" class="btn"--}}
                               {{--style="border: none;background-color: rgba(0, 18, 255, 1);color: #fff;box-shadow: 0 1px 2px rgba(0,0,0,0.25), inset 0 1px 0 rgba(255,255,255,0.35), inset 0 -3px 10px rgba(255,255,255,0.3);text-shadow: 0 1px 0 rgba(0,0,0,0.3);width: 25%">--}}
                                {{--Edit Profile--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
