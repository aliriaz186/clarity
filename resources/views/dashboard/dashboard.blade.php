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
                                    <p>{{$profileTable->short_bio}}</p>
                                    <p style="font-size: 17px!important;">{{$profileTable->mini_resume}}</p></td>
                                <td style="width: 20%!important;">
                                    <h1>${{$profileTable->hourly_rate}}</h1>
                                    <p>per hour</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
