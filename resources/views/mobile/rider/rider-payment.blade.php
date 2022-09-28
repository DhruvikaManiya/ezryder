@extends('layouts.mobile-rider')


@section('header_title', 'Payment')

@section('css')
@endsection

@section('content')

    @include('mobile.rider.inc.back-header')

    <section class="address_content">
        <div class="container">
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

            <form action="" class="payment_form">
                <p class="payment_title">Select Payment Type</p>
                <div class="d_flex mb-38">
                    <label class="label" for="cash">Cash on Delivery</label><br>
                    <input type="radio" id="cash" name="payment" value="CASH">
                </div>
                <div class="d_flex mb-48">
                    <label class="label" for="online">Online</label><br>
                    <input type="radio" id="online" name="payment" value="ONLINE">
                </div>

            </form>

            <a href="{{ route('mobile.rider.booking') }}" class="green_bg_btn">Next</a>
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
