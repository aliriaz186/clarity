@extends('dashboard.layout')
<!-- begin:: Content -->
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--Begin::Dashboard 1-->

        <!--Begin::Row-->
        <form class="form-horizontal listing_form">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-xl-12 order-lg-12 order-xl-12">

                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-title"
                                      style="padding: 10px; border-radius: 6px;border: none!important">
                                    Earned
                                </span>
                            </div>
                        </div>

                        <div class="kt-portlet__body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <h5>Account Balance</h5>
                                    </div>
                                </div>
                                <div class="col-lg-5" style="margin-left: 27px">
                                    <div class="input-group">
                                        <h5>Transactions</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-lg-4 ml-2"
                                     style="background-color: #e4e3e387;padding: 9px;border-radius: 3px;border: 1px solid #80808033;box-shadow: 0 1px 5px rgba(0,0,0,0.1)">
                                    <div class="input-group">
                                        <span class="dollar"
                                              style="display: block;position: relative;font-weight: 500;font-size: 35px;width: 100%;">
                                        <input readonly
                                               style="width:100%;text-align: right;font-size: 29px;padding: 2px 15px 2px 30px;border-radius: 4px;box-shadow: inset 0 1px 3px rgba(0,0,0,0.04);"
                                               type="text" name="money" id="money"
                                               class=""
                                               placeholder="$0.00" value="{{$money}}"></span>
                                    </div>
                                    <div class="input-group" style="margin-top: 20px">
                                        @if($money == 0)
                                            <a disabled
                                               type="button" class="btn"
                                               style="cursor: not-allowed!important;opacity:0.6;border: 1px solid #239d4a;background-color: #41ca6d;color: #fff;box-shadow: 0 1px 2px rgba(0,0,0,0.25), inset 0 1px 0 rgba(255,255,255,0.35), inset 0 -3px 10px rgba(255,255,255,0.3);text-shadow: 0 1px 0 rgba(0,0,0,0.3);width: 100%">
                                                Request Withdrawal >
                                            </a>
                                        @elseif($money > 0)
                                            <a data-toggle="modal" data-target="#myModal"
                                               type="button" class="btn"
                                               style="border: 1px solid #239d4a;background-color: #41ca6d;color: #fff;box-shadow: 0 1px 2px rgba(0,0,0,0.25), inset 0 1px 0 rgba(255,255,255,0.35), inset 0 -3px 10px rgba(255,255,255,0.3);text-shadow: 0 1px 0 rgba(0,0,0,0.3);width: 100%">
                                                Request Withdrawal >
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-5 ml-4">
                                    <div
                                        style="padding: 65px 20px;border: 1px solid #d9d9d9;background: #e4e3e35c;color: #9c9c9c;text-align: center;border-radius: 4px;;box-shadow: 0 1px 5px rgba(0,0,0,0.1)">
                                        There are no transactions yet.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal" id="myModal" style="margin-top: 10%">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-body">
                            <form action="#" method="POST" id="listing_form" class="form-horizontal listing_form">
                                <div class="kt-portlet kt-portlet--mobile">
                                    <div class="kt-portlet__head kt-portlet__head--lg">
                                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="kt-font-brand far fa-credit-card"></i>
                            </span>
                                            <h3 class="kt-portlet__head-title">
                                                Payment Details
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h5 style="text-decoration: underline">Withdraw ${{$money}}</h5>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend" style="width: 32%"><span
                                                            class="input-group-text"
                                                            style="width: 100%">Credit Card</span>
                                                    </div>
                                                    <input type="text" name="cardNumber" id="cardNumber"
                                                           style="width: 46%"
                                                           class="form-control"
                                                           placeholder="Card number">
                                                    <input type="text" name="cvv" id="cvv" style="width: 21%"
                                                           class="form-control"
                                                           placeholder="CVV">
                                                    <div class="errorTxt">
                                                        <span id="errorCardNumberText"></span><br>
                                                        <span id="errorCVVText"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend" style="width: 32%"><span
                                                            class="input-group-text"
                                                            style="width: 100%">Expiration</span>
                                                    </div>
                                                    <select type="text" name="month" id="month" style="width: 35%"
                                                            class="form-control"
                                                            value="{{$paymentTableData['expiry_month'] ?? ''}}">
                                                        <option selected value=''>Month</option>
                                                        @for($i=0;$i<count($paymentTableData['monthArray']);$i++)
                                                            <option
                                                                value='{{$paymentTableData['monthArray'][$i]}}'>{{$paymentTableData['monthArray'][$i]}}</option>
                                                        @endfor
                                                    </select>
                                                    <select style="width: 11%" type="text" name="year" id="year"
                                                            class="form-control">
                                                        <option selected value=''>Year</option>
                                                        <option value="2030">
                                                            2030
                                                        </option>
                                                        <option value="2029">
                                                            2029
                                                        </option>
                                                        <option value="2028">
                                                            2028
                                                        </option>
                                                        <option value="2027">
                                                            2027
                                                        </option>
                                                        <option value="2026">
                                                            2026
                                                        </option>
                                                        <option value="2025">
                                                            2025
                                                        </option>
                                                        <option value="2024">
                                                            2024
                                                        </option>
                                                        <option value="2023">
                                                            2023
                                                        </option>
                                                        <option value="2022">
                                                            2022
                                                        </option>
                                                        <option value="2021">
                                                            2021
                                                        </option>
                                                        <option value="2020">
                                                            2020
                                                        </option>
                                                        <option value="2019">
                                                            2019
                                                        </option>
                                                        <option value="2018">
                                                            2018
                                                        </option>
                                                        <option value="2017">
                                                            2017
                                                        </option>
                                                        <option value="2016">
                                                            2016
                                                        </option>
                                                        <option value="2015">
                                                            2015
                                                        </option>
                                                        <option value="2014">
                                                            2014
                                                        </option>
                                                        <option value="2013">
                                                            2013
                                                        </option>
                                                        <option value="2012">
                                                            2012
                                                        </option>
                                                        <option value="2011">
                                                            2011
                                                        </option>
                                                        <option value="2010">
                                                            2010
                                                        </option>
                                                        <option value="2009">
                                                            2009
                                                        </option>
                                                        <option value="2008">
                                                            2008
                                                        </option>
                                                        <option value="2007">
                                                            2007
                                                        </option>
                                                        <option value="2006">
                                                            2006
                                                        </option>
                                                        <option value="2005">
                                                            2005
                                                        </option>
                                                        <option value="2004">
                                                            2004
                                                        </option>
                                                        <option value="2003">
                                                            2003
                                                        </option>
                                                        <option value="2002">
                                                            2002
                                                        </option>
                                                        <option value="2001">
                                                            2001
                                                        </option>
                                                        <option value="2000">
                                                            2000
                                                        </option>
                                                        <option value="1999">
                                                            1999
                                                        </option>
                                                        <option value="1998">
                                                            1998
                                                        </option>
                                                        <option value="1997">
                                                            1997
                                                        </option>
                                                        <option value="1996">
                                                            1996
                                                        </option>
                                                        <option value="1995">
                                                            1995
                                                        </option>
                                                        <option value="1994">
                                                            1994
                                                        </option>
                                                        <option value="1993">
                                                            1993
                                                        </option>
                                                        <option value="1992">
                                                            1992
                                                        </option>
                                                        <option value="1991">
                                                            1991
                                                        </option>
                                                        <option value="1990">
                                                            1990
                                                        </option>
                                                    </select>
                                                    <div>
                                                        <span id="errorMonthText"></span><br>
                                                        <span id="errorYearText"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-6">
                                                <button type="submit" id="paidButton" class="btn btn-primary">Get Paid
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

    <!-- end:: Content -->
    <script>

        $('#paidButton').on('click', function () {
            $(".listing_form").valid();
        });

        $(function () {
            // Initialize form validation.
            $(".listing_form").validate({
                // Specify validation rules
                rules: {
                    cardNumber: {
                        required: true,
                        pattern: /^3(?:[47]\d([ -]?)\d{4}(?:\1\d{4}){2}|0[0-5]\d{11}|[68]\d{12})$|^4(?:\d\d\d)?([ -]?)\d{4}(?:\2\d{4}){2}$|^6011([ -]?)\d{4}(?:\3\d{4}){2}$|^5[1-5]\d\d([ -]?)\d{4}(?:\4\d{4}){2}$|^2014\d{11}$|^2149\d{11}$|^2131\d{11}$|^1800\d{11}$|^3\d{15}$/
                    },
                    cvv: {required: true, pattern: /^[0-9]{3,4}$/},
                    month: {required: true},
                    year: {required: true},
                },
                // Specify validation error messages
                messages: {
                    cardNumber: {
                        required: "Please provide a card number",
                        pattern: "Invalid Card Number"
                    },
                    cvv: {
                        required: "Please provide a cvv",
                        pattern: "Invalid CVV"
                    },
                    month: "Month is required",
                    year: "Year is required",
                },
                errorPlacement: function (error, element) {
                    if (element.attr("name") === "cardNumber") {
                        $("#errorCardNumberText").text($(error).text());
                    } else if (element.attr("name") === "cvv") {
                        $("#errorCVVText").text($(error).text());
                    } else if (element.attr("name") === "month") {
                        $("#errorMonthText").text($(error).text());
                    } else if (element.attr("name") === "year") {
                        $("#errorYearText").text($(error).text());
                    } else {
                        error.append($('.errorTxt span'));
                    }
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
                    alert('hi');
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
                        url: "{{env('APP_URL')}}/user/get/paid",
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
                                            // window.location.reload();
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
        });

    </script>
@endsection
