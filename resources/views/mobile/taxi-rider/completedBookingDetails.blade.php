@extends('layouts.mobile-taxi-rider')
@section('header_title', 'Home')

@section('content')
    <div class="main-container" id="completedBookingDetails">
        <div class="topNavbar">
            <article class="topNav">
                <h2><img src="{{ url('asset/rider/assets/leftArrow.png')}}"/>Booking Details</h2>
                <img src="{{ url('asset/rider/assets/notification.png')}}" alt=""/>
            </article>
        </div>
        <div class="contentContainer padding-lr">
            <div class="box1 details">
                <article class="leftSide">
                    <h2>ID: #123452</h2>
                    <p>Distance: 12 kms</p>
                    <p>Booking Date: 12-02-2022</p>
                    <p>Type: Taxi Booking</p>
                </article>
                <article class="rightSide">
                    <p>Completed</p>
                    <p class="value">$20.50</p>
                </article>
            </div>
            <div class="box1">
                <h2>Pickup Location</h2>
                <p>Arbudanagar odhav, Ahmedabad</p>
            </div>
            <div class="box1">
                <h2>Drop Location</h2>
                <p>Prahladnagar, Anandnagar Road, Ahmedabad</p>
            </div>
            <div class="box1">
                <h2>Driver</h2>
                <p>Brijesh Mishra</p>
            </div>
        </div>
        @include('mobile.taxi-rider.inc.footer')
    </div>
@endsection