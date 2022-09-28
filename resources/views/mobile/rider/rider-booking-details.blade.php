@extends('layouts.mobile-rider')


@section('header_title', 'My Bookings Details')

@section('css')
@endsection

@section('content')

    @include('mobile.rider.inc.back-header')

    <section class="my_booking_sec">
        <div class="container">
            <div class="my_booking mb-10">
                <p id="bookingId">#B0012</p>
                <p class="my_km">15 Kms</p>
                <p class="rate">$100</p>
                <p class="status active">Active</p>
            </div>
        </div>
    </section>

    <section class="address_content mt-0">
        <div class="container">
            <div class="my_booking_details">
                <p class="date_time">
                    <span id="date">09-03-2022</span>
                    <span id="time">9.30 AM</span>
                </p>
            </div>
            <div class="pickup_addr">
                <h6 class="title">Pickup Address</h6>
                <p id="pickupContent">D293, Laxmikdrupa, Arbadnagar, odahv, ahmedabad</p>
            </div>
            <div class="drop_addr">
                <h6 class="title">Drop Address</h6>
                <p id="dropContent">A510, Titanium city center, Anand nagar, raod, Prahlad nagar, Ahmedabad</p>
            </div>
            <div class="tab_content_bx transparent">
                <div class="img">
                    <img src="{{ asset('asset/images/taxi-icon.svg') }}" alt="">
                </div>
                <div class="car_details">
                    <h4 class="car_name">Luxury</h4>
                    <p class="stops">Multiple Stops</p>
                    <p class="num_person">4 Persons</p>
                </div>
                <div class="car_rate">
                    <p class="rent">$ 340</p>
                    <p class="rent_per_km">$ 3/10 Kms</p>
                </div>
            </div>
        </div>
    </section>

    <section class="driver_sec">
        <div class="container">
            <h4 class="driver">Driver: <span class="driver_name">Ramesh</span></h4>
            <div class="btns">
                <a href="#" class="btn">Call</a>
                <a href="#" class="btn">Chat</a>
                <a href="#" class="btn">Cancel</a>
            </div>
        </div>
    </section>

    <div class="map h-200">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235013.70771382237!2d72.43931569817332!3d23.02049746312321!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1660549221826!5m2!1sen!2sin"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>





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
