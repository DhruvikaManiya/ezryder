@extends('layouts.mobile-taxi-rider')
@section('header_title', 'Home')

@section('content')
    <div class="main-container" id="confirmBooking3">
        <div class="topNavbar">
            <article class="topNav">
                <h2><img src="{{ url('asset/rider/assets/leftArrow.png')}}"/>Select Car</h2>
                <img src="{{ url('asset/rider/assets/notification.png')}}" alt=""/>
            </article>
            <form action="" id="dropLocationSearch" class="padding-lr">
                <div class="inputContainer">
                    <img src="{{ url('asset/rider/assets/compass.png') }}" alt=""/>
                    <input type="text" name="" id="" class="address" value="D513, Pushp complex, Vastral char rasta">
                </div>
                <div class="inputContainer">
                    <img src="{{ url('asset/rider/assets/search.png') }}" alt=""/>
                    <input type="text" class="search" name="" placeholder="Select your drop location">
                </div>
            </form>
        </div>
        <img src="{{ url('asset/rider/assets/location4.png') }}" alt="" height="337px;"/>
        <article class="bottomContent padding-lr">
            <p class="carRideDesc">Driver has accepted your request and is on the way to your location</p>
            <div class="btn-option">
                <button class="call">Pay By Cash</button>
                <button class="chat">Pay Online</button>
            </div>
        </article>
    </div>
@endsection