@extends('layouts.mobile-rider')

@section('header_title', 'My Bookings')

@section('css')
@endsection

@section('content')

    @include('mobile.rider.inc.back-header')
    <section class="my_booking_sec">
        <div class="container">
            <div class="my_booking">
                <p id="bookingId">#B0012</p>
                <p class="my_km">15 Kms</p>
                <p class="rate">$100</p>
                <p class="status active">Active</p>
            </div>
            <div class="my_booking">
                <p id="bookingId">#B0012</p>
                <p class="my_km">15 Kms</p>
                <p class="rate">$100</p>
                <p class="status active">Completed</p>
            </div>
            <div class="my_booking">
                <p id="bookingId">#B0012</p>
                <p class="my_km">15 Kms</p>
                <p class="rate">$100</p>
                <p class="status active">Completed</p>
            </div>
            <div class="my_booking">
                <p id="bookingId">#B0012</p>
                <p class="my_km">15 Kms</p>
                <p class="rate">$100</p>
                <p class="status active">Completed</p>
            </div>
            <div class="my_booking">
                <p id="bookingId">#B0012</p>
                <p class="my_km">15 Kms</p>
                <p class="rate">$100</p>
                <p class="status active">Completed</p>
            </div>
        </div>
    </section>





    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
@endsection
