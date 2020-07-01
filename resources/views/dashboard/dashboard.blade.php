@extends('dashboard.layout')
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
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <td style="width: 10%!important;">
                                    @if(empty($profileTable->profile_photo))
                                        <img src="{{asset('img/default.svg')}}"
                                             style="width: 150px; height: 100px;object-fit: contain!important;">
                                    @else
                                        <img src="{{asset('/profile-pictures')}}/{{$profileTable->profile_photo}}"
                                             style="width: 150px; height: 100px;object-fit: contain!important;">
                                    @endif
                                </td>
                                <td style="text-align: left!important;width: 50%!important;">
                                    @if(empty($profileTable->user_name))
                                        <h3>Username</h3>
                                    @else
                                        <h3>{{$profileTable->user_name}}</h3>
                                    @endif
                                    @if(empty($profileTable->short_bio))
                                        <p>Short Bio</p>
                                    @else
                                        <p>{{$profileTable->short_bio}}</p>
                                    @endif
                                    @if(empty($profileTable->mini_resume))
                                        <p style="font-size: 17px!important;">Mini Resume</p>
                                    @else
                                        <p style="font-size: 17px!important;">{{$profileTable->mini_resume}}</p>
                                    @endif
                                </td>
                                <td style="width: 20%!important;">
                                    @if(empty($profileTable->hourly_rate))
                                        <h1>$0</h1>
                                    @else
                                        <h1>${{$profileTable->hourly_rate}}</h1>
                                    @endif
                                    <p class="ml-1">per hour</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="ml-5">
                            <a href="{{env('APP_URL')}}/basic-information"
                               type="button" class="btn"
                               style="border: 1px solid #239d4a;background-color: #41ca6d;color: #fff;box-shadow: 0 1px 2px rgba(0,0,0,0.25), inset 0 1px 0 rgba(255,255,255,0.35), inset 0 -3px 10px rgba(255,255,255,0.3);text-shadow: 0 1px 0 rgba(0,0,0,0.3);width: 25%">
                                Edit Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
