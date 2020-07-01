@extends('landing-page.layout')
<!-- begin:: Content -->
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style="padding: 30px">

        <!--Begin::Dashboard 1-->

        <!--Begin::Row-->
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
                                    <td></td>
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
                                           style="border: 1px solid #239d4a;background-color: #41ca6d;color: #fff;box-shadow: 0 1px 2px rgba(0,0,0,0.25), inset 0 1px 0 rgba(255,255,255,0.35), inset 0 -3px 10px rgba(255,255,255,0.3);text-shadow: 0 1px 0 rgba(0,0,0,0.3);width: 100%">
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

