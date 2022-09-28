@extends('layouts.vendor-food')
@section('header_title','Reviews')
@section('css')
<link rel="stylesheet" href="{{asset('asset/css/account.css')}}">
@endsection
@section('content')
@include('mobile.vendor-food.inc.back-header')

<section class="account">
    <div class="container-max p-both">
        <div class="rw">
            <div class="col-12 pad-00 pb-3">
                <div class="frt-price-box d-flex justi-s-b top-space30">
                    <div>
                        <img src="{{ asset('asset/images/food4.jpg') }}" alt="">
                    </div>
                    <div class="frt-b-data ml-11-m ml-3" >
                        <p>pastry </p>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <p>4.1 average based on 254 reviews.</p>
                    </div>
                </div>
                <div class="col-12 pad-00 pb-3">
                    <div class="frt-price-box d-flex justi-s-b top-space30">
                        <div>
                            <img src="{{ asset('asset/images/food2.jpg') }}" alt="">
                        </div>
                        <div class="frt-b-data ml-11-m ml-3" >
                            <p>Burger </p>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <p>4.1 average based on 254 reviews.</p>
                        </div>
                    </div>
                    <div class="col-12 pad-00 pb-3">
                        <div class="frt-price-box d-flex justi-s-b top-space30">
                            <div>
                                <img src="{{ asset('asset/images/food5.jpg') }}" alt="">
                            </div>
                            <div class="frt-b-data ml-11-m ml-3" >
                                <p>Cookie </p>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <p>4.1 average based on 254 reviews.</p>
                            </div>
                        </div>
                        <div class="col-12 pad-00 pb-3">
                            <div class="frt-price-box d-flex justi-s-b top-space30">
                                <div>
                                    <img src="{{ asset('asset/images/food3.jpg') }}" alt="" >
                                </div>
                                <div class="frt-b-data ml-11-m ml-3" >
                                    <p>Pizza</p>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <p>4.1 average based on 254 reviews.</p>
                                </div>
                            </div>



            </div>
        </div>
    </div>
</section>


@endsection
