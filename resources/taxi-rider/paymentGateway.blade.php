@extends('layouts.mobile-taxi-rider')
@section('header_title', 'Home')

@section('content')
    <div class="main-container" id="paymentGateway">
        <div class="topNavbar">
            <article class="topNav">
                <h2><img src="{{ url('asset/rider/assets/leftArrow.png')}}"/>Select Car</h2>
                <img src="{{ url('asset/rider/assets/notification.png')}}" alt=""/>
            </article>
            <div class="main padding-lr">
                <h2>Payment Gateway</h2>
                <div class="imgContainer">
                    <img src="{{ url('asset/rider/assets/payInvoice.png')}}" alt=""/>
                </div>
            </div>
        </div>
    </div>
@endsection
