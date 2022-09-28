@extends('layouts.mobile-rider')


@section('css')
@endsection

@section('content')
    <header class="header">
        <div class="container">
        <a href="{{route('mobile.rider.driver_order')}}"><h1 class="header_title">Book Taxi</h1></a>
        </div>
    </header>

    <section class="address_content">
    <div class="container">
        <table>
            <div class="inputgroup">
            <h6 class="title title-2">Pickup Address</h6>
                <div class="input_inner dvr-booking">
                <p id="pickupContent ">D293, Laxmikdrupa, Arbadnagar, Odahv, Ahmedabad</p>
                    <img src="{{asset('asset/images/location-icon.svg')}}" alt="">
                </div>
            </div>
            <div class="inputgroup">
            <h6 class="title title-2">Drop Address</h6>
                <div class="input_inner dvr-booking">
                <p id="dropContent">A510, Titanium City Center, Anand Nagar, Road, Prahlad Nagar, Ahmedabad</p>
                    <img src="{{asset('asset/images/location-icon.svg')}}" alt="">
                </div>
            </div>
        </table>
    </div>
</section>
    <section class="address_content space-both mt-30">
        <!-- <div class="container">
            <div class="pickup_addr">
                <h6 class="title">Pickup Address</h6>
                <p id="pickupContent">D293, Laxmikdrupa, Arbadnagar, odahv, ahmedabad</p>
                <img src="{{asset('asset/images/location-icon.svg')}}" alt="">

                
                </div>
            </div>
            <div class="drop_addr">
                <h6 class="title">Drop Address</h6>
                <img src="{{asset('asset/images/location-icon.svg')}}" alt="">
                <p id="dropContent">A510, Titanium city center, Anand nagar, raod, Prahlad nagar, Ahmedabad</p>
            </div> -->
            <div class="tab_content_bx transparent bg-dvr box-space-tb mb-34">
                <div class="img">
                    <img src="{{ asset('asset/images/taxi-icon.svg') }}" alt="">
                </div>
                <div class="car_details mr-35">
                    <h4 class="car_name">Maruti Swift</h4>
                    <p class="stops">Multiple Stops</p>
                    <p class="num_person">4 Persons</p>
                </div>
                <div class="car_rate">
                    <p class="rent fw-700">$ 340</p>
                    <p class="rent_per_km">$ 3/10 Kms</p>
                </div>
            </div>

           
            <a href="{{route('mobile.rider.driver_bookdetails')}}" class="green_bg_btn ">Accept</a>
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
