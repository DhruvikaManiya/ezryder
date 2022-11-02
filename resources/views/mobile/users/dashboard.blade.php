@extends('layouts.ecommerce')


@section('content')
    <div class="main-container" id="homeScreen">
      <article id="top-nav">
        <p>Home</p>
        <p>
          <span>{{ cartCount() }}</span>
          <img src="{{ asset('asset/images/shoppingBag.png') }}" alt="" />
        </p>
      </article>
      <h2>Taxi & stores near you</h2>
      <article id="service-types">
        <div class="service">
          <a href="{{ route('mobile.rider') }}" class="item">
          <img src="{{ asset('asset/images/taxiBookingImage.png') }}" alt="" />
          <p>Taxi Booking</p>
          </a>
        </div>
        <div class="service">
          <img src="{{ asset('asset/images/intercityRidesImage.png') }}" alt="" />
          <p>Intercity Rides</p>
        </div>
        <div class="service">
          <img src="{{ asset('asset/images/carRentalsImage.png') }}" alt="" />
          <p>Car Rentals</p>
        </div>
        <div class="service">
          <img src="{{ asset('asset/images/carReservationImage.png') }}" alt="" />
          <p>Car Reservation</p>
        </div>
        <div class="service">
          <a href="{{ route('ecommerce.home',1) }}">
            <img src="{{ asset('asset/images/orderFoodImage.png') }}" alt="" />
          <p>Order Food</p>
        </a>
        </div>
        <div class="service">
          <a href="{{ route('ecommerce.home',2) }}">
          <img src="{{ asset('asset/images/orderGroceryImage.png') }}" alt="" />
          <p>Order Grocery</p>
          </a>
        </div>
        <div class="service">
          <a href="{{ route('ecommerce.home',3) }}">
          <img src="{{ asset('asset/images/orderMedicinesImage.png') }}" alt="" />
          <p>Order Medicines</p>
        </a>
        </div>
        <div class="service">
          <img src="{{ asset('asset/images/packageDeliveryImage.png') }}" alt="" />
          <p>Package Delivery</p>
        </div>
      </article>
     @include('layouts.partials.user_footer_nav')
    </div>
     
@endsection
