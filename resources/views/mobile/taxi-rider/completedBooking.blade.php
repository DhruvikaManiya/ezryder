@extends('layouts.mobile-taxi-rider')
@section('header_title', 'Home')

@section('content')
    <div class="main-container" id="completedBookingDetails">
        <div class="topNavbar">
            <article class="topNav">
                <h2><img src="{{ url('asset/rider/assets/leftArrow.png')}}"/>My Booking</h2>
                <img src="{{ url('asset/rider/assets/notification.png')}}" alt=""/>
            </article>
        </div>
        <div class="contentContainer padding-lr">
            <div class="btnContainer2">
                <button>Orders</button>
                <button class="highlight">Bookings</button>
            </div>
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
        </div>
        @include('mobile.taxi-rider.inc.footer')
    </div>
@endsection