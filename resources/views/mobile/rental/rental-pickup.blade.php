@extends('layouts.mobile-rider')


@section('css')
@endsection

@section('content')

<header class="header">
    <div class="container">
    <a href="{{route('mobile.rental.rentalplans')}}"> <h1 class="header_title">Pickup</h1></a>
    </div>
</header>

<div class="map h-200 mt-20">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235013.70771382237!2d72.43931569817332!3d23.02049746312321!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1660549221826!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>


<div class="container">
    <div class="pickup_addr mt-30">
        <h6 class="title">Pickup Address</h6>
        <p id="pickupContent">D293, Laxmikdrupa, Arbadnagar, odahv, ahmedabad</p>
    </div>

    <a href="{{route('mobile.rental.rentalpayment')}}" class="green_bg_btn mt-50">Confirm Pickup</a>
</div>








@endsection