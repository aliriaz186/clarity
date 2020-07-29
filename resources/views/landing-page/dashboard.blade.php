@extends('landing-page.layout')
<!-- begin:: Content -->
@section('content')
    <style>
        .apply-hover:hover{
            text-decoration: underline!important;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style="padding: 30px">

        <!--Begin::Dashboard 1-->

        <!--Begin::Row-->
        <div class="container">
            <div class="d-flex flex-wrap">
                <p style="font-weight: bold!important;" class="ml-5 p-2">Showing:</p>
                <p style="background: #61bed9;color:#fff;position: relative;border-radius: 4px" class="ml-3 p-2">Featured</p>
                <a href="#" style="color:#52a1b8;position: relative;border-radius: 4px;font-weight: 500" class="ml-3 p-2 apply-hover">Popular</a>
                <a href="#" style="color:#52a1b8;position: relative;border-radius: 4px;font-weight: 500" class="ml-3 p-2 apply-hover">New</a>
            </div>
        </div>
        <div class="form-horizontal listing_form">
            <div class="row">
                <div class="col-xl-12 order-lg-12 order-xl-12 text-center">
                    <div class="kt-portlet__body">
                        <table class="table table-borderless">
                            <tbody>
                            @if(count($experts) == 0)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><h1>No Expert Found</h1></td>
                                    <td><img src="{{asset('img/undraw_no_data_qbuo.svg')}}"></td>
                                    <td></td>
                                </tr>
                            @endif
                            @foreach($experts as $expert)
                                <tr>
                                    <td></td>
                                    <td class="border-top"
                                        style="width: 10%!important;padding-top: 50px;padding-bottom: 50px"><img
                                            src="{{asset('/img/cover')}}/{{$expert['expert']->cover_image}}"
                                            style="width: 90px; height: 100px;object-fit: contain!important;border-radius: 5px">
                                    </td>
                                    <td class="border-top"
                                        style="text-align: left!important;width: 36%!important;;padding-top: 50px;padding-bottom: 50px">
                                        <h3>{{$expert['expert']->title}}</h3>
                                        <p>{{$expert['expert']->category}}</p>
                                        <p style="font-size: 17px!important;">{{$expert['expert']->description}}</p>
                                    </td>
                                    <td class="border-top"
                                        style="width: 20%!important;;padding-top: 50px;padding-bottom: 50px">
                                        <h3>${{$expert['profile']->hourly_rate}}</h3>
                                        <p>per hour</p>
                                        <a href="{{env('APP_URL')}}/request-a-call/{{$expert['expert']->id}}"
                                           type="button" class="btn"
                                           style="border: none;background-color: rgba(0, 18, 255, 1);color: #fff;box-shadow: 0 1px 2px rgba(0,0,0,0.25), inset 0 1px 0 rgba(255,255,255,0.35), inset 0 -3px 10px rgba(255,255,255,0.3);text-shadow: 0 1px 0 rgba(0,0,0,0.3);width: 100%">
                                            Request a call >
                                        </a>
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $.ajax({
            url: `{{env('APP_URL')}}/user/paid/money/save`,
            type: 'POST',
            dataType: "JSON",
            data: {"_token": "{{ csrf_token() }}"},
            success: function (result) {
                if (result) {
                } else {
                    setTimeout(function () {
                    }, 3000);
                }
            },
        });
    </script>
@endsection

