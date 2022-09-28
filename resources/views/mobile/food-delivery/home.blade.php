@extends('layouts.food-delivery')

@section('header_title', 'Available Delivery')

@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/vendor.css') }}">
    <style>
        .head-left.d-flex.align-items-center.justify-content-center img{
            display: none;
        }
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
        .ord-title{
            color: #008080 !important;
            font-size: 19px !important;
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
                            <p class="order-heading font-weight-bold ord-title" onclick="window.location='{{route('food.delivery.order-detail')}}'">Burger King </p>
                            <p class="pt-2">Date : 02/09/2022 11:00AM</p>

                            <p class="pt-2">Delivery Address :</p>
                            <div class="location  ml-0 d-flex mt-1"><img
                                    src="{{asset('asset/images/clarity_map-marker-line.svg')}}" class="mt-1 mr-2">
                                <p>D293, Laxmikrup,
                                    Arbudanagar, odhav, ahmedabad</p>
                            </div>
                            <div class="d-flex justi-s-b mt-2">
                                <p class="pt-1 ml-0">$ <b>5</b></p>

                                <a class="btn1 mt-1 mr-2"> Accept </a>
                            </div>
                        </div>
                    </div>

                    <div class="frt-price-box justi-s-b top-space30 bottom-space30">
                        <div class="frt-b-data ml-11-m ml-3">
                            <p class="order-heading">#1235 </p>
                            <p class="order-heading font-weight-bold ord-title" onclick="window.location='{{route('food.delivery.order-detail')}}'">KFC </p>
                            <p class="pt-2">Date : 02/09/2022 11:00AM</p>

                            <p class="pt-2">Delivery Address :</p>
                            <div class="location  ml-0 d-flex mt-1"><img
                                    src="{{asset('asset/images/clarity_map-marker-line.svg')}}" class="mt-1 mr-2">
                                <p>D293, Laxmikrup,
                                    Arbudanagar, odhav, ahmedabad</p>
                            </div>
                            <div class="d-flex justi-s-b mt-2">
                                <p class="pt-1 ml-0">$ <b>5</b></p>

                                <a class="btn1 mt-1 mr-2"> Accept </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
