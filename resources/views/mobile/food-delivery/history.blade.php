@extends('layouts.food-delivery')

@section('header_title', 'History')

@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/vendor.css') }}">
    <style>

        .order-heading {
            font-weight: 500;
            font-size: 18px !important;
            color: #3A3A3A !important;
            margin-bottom: 0 !important;
        }

        .location img {
            width: 20px !important;
            height: 20px !important;

        }

        .location span {
            font-size: 15px !important;
        }

        .btn1 {
            color: #fff !important;
        }
    </style>
@endsection

@section('content')
    @include('mobile.food-delivery.inc.back-header')

    <!---order end--->
    <!---start amount--->

    <section class="current-order bottom-space30">

        <div class="container-max p-both">
            <div class="rw">
                <div class="col-12 pad-00 pb-3">

                    <div class="frt-price-box justi-s-b top-space30">
                        <div class="frt-b-data ml-11-m ml-3">
                            <p class="order-heading">#1234 </p>
                            <p class="order-heading font-weight-bold">Burger King </p>
                            <p class="pt-2">Order Time : 02/10/2022 11:00AM</p>

                            <div class="d-flex justi-s-b mt-2">
                                <p class="pt-1 ml-0">Payable Amt: $5</p>
                                <p class="pt-1 ml-0">Payment Type : UPI</p>
                            </div>
                            <p class="order-heading font-weight-bold">Delivered</p>
                            <div class="location  ml-0 d-flex mt-1"><img
                                src="{{asset('asset/images/clarity_map-marker-line.svg')}}" class="mt-1 mr-2">
                            <p>D293, Laxmikrup,
                                Arbudanagar, odhav, ahmedabad</p>
                        </div>
                        </div>
                    </div>

                    <div class="frt-price-box justi-s-b top-space30">
                        <div class="frt-b-data ml-11-m ml-3">
                            <p class="order-heading">#1234 </p>
                            <p class="order-heading font-weight-bold">KFC </p>
                            <p class="pt-2">Order Time : 22/11/2022 11:00AM</p>

                            <div class="d-flex justi-s-b mt-2">
                                <p class="pt-1 ml-0">Payable Amt: $15</p>
                                <p class="pt-1 ml-0">Payment Type : Cash</p>
                            </div>
                            <p class="order-heading font-weight-bold">Canceled</p>
                            <div class="location  ml-0 d-flex mt-1"><img
                                src="{{asset('asset/images/clarity_map-marker-line.svg')}}" class="mt-1 mr-2">
                            <p>D293, Laxmikrup,
                                Arbudanagar, odhav, ahmedabad</p>
                        </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </section>

    <section class="past-order" style="display: none">




    </section>
@endsection

@section('js')
    <script type="text/javascript">
        $('#current-btn').click(function(e) {
            e.preventDefault();
            $('.current-order').show();
            $('.past-order').hide();

            $('.order1 p').css('color', '#858585');
            $(this).css('color', '#008080');
        });
        $('#past-btn').click(function(e) {
            e.preventDefault();
            $('.current-order').hide();
            $('.past-order').show();
            $('.order1 p').css('color', '#858585');
            $(this).css('color', '#008080');
        });
    </script>
@endsection
