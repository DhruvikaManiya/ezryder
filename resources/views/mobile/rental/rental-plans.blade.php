@extends('layouts.mobile-rider')


@section('css')
@endsection

@section('content')


<header class="header">
    <div class="container">
        <a href="{{route('mobile.rental.rentalhours')}}">
            <h1 class="header_title">Rentals plan and price</h1>
        </a>
    </div>
</header>

<section class="driver_sec">
    <div class="container">
        <h4 class="rental_title mt-42 mb-46 w-100">Economy</h4>

        <a href="{{route('mobile.rental.rentalpickup')}}">
            <div class="tab_content_bx">
                <div class="img">
                    <img src="{{asset('asset/images/taxi-icon.svg')}}" alt="">
                </div>
                <div class="car_details w-50">
                    <h4 class="car_name">Sendan Rentals</h4>
                    <p class="stops">3: 05 pm pickup</p>
                    <p class="num_person">20km include</p>
                </div>
                <div class="car_rate">
                    <p class="rent">$ 340</p>
                    <p class="rent_per_km">$ 3/10 Kms</p>
                </div>
            </div>
        </a>
        <a href="{{route('mobile.rental.rentalpickup')}}">
            <div class="tab_content_bx">
                <div class="img">
                    <img src="{{asset('asset/images/taxi-icon.svg')}}" alt="">
                </div>
                <div class="car_details w-50">
                    <h4 class="car_name">XL Rentals</h4>
                    <p class="stops">3: 05 pm pickup</p>
                    <p class="num_person">sendan multipal stop</p>
                </div>
                <div class="car_rate">
                    <p class="rent">$ 340</p>
                    <p class="rent_per_km">$ 3/10 Kms</p>
                </div>
            </div>
        </a>
        <a href="{{route('mobile.rental.rentalpickup')}}">

            <div class="tab_content_bx">
                <div class="img">
                    <img src="{{asset('asset/images/taxi-icon.svg')}}" alt="">
                </div>
                <div class="car_details w-50">
                    <h4 class="car_name">Go Rentals</h4>
                    <p class="stops">3: 05 pm pickup</p>
                    <p class="num_person">one caar for mutiapl stops</p>
                </div>
                <div class="car_rate">
                    <p class="rent">$ 340</p>
                    <p class="rent_per_km">$ 3/10 Kms</p>
                </div>
            </div>
        </a>
    </div>
</section>








@endsection