<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ezryder</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,700;1,300;1,500;1,700;0,1000&display=swap"
      rel="stylesheet"
    />
     <link rel="stylesheet" href="{{ asset('bootstrap52/css/bootstrap.css') }}">
     <link rel="stylesheet" href="{{ asset('asset/css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/customStyling.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/ezryder.css') }}">
  </head>
  <body>
    <div class="main-container" id="homeScreen">
      <article id="top-nav">
        <p>Home</p>
        <p>
          <span>3</span>
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
          <a href="{{ url('user_app/products/food') }}">
            <img src="{{ asset('asset/images/orderFoodImage.png') }}" alt="" />
          <p>Order Food</p>
        </a>
        </div>
        <div class="service">
          <a href="{{ url('user_app/products/grocery') }}">
          <img src="{{ asset('asset/images/orderGroceryImage.png') }}" alt="" />
          <p>Order Grocery</p>
          </a>
        </div>
        <div class="service">
          <a href="{{ url('user_app/products/medicines') }}">
          <img src="{{ asset('asset/images/orderMedicinesImage.png') }}" alt="" />
          <p>Order Medicines</p>
        </a>
        </div>
        <div class="service">
          <img src="{{ asset('asset/images/packageDeliveryImage.png') }}" alt="" />
          <p>Package Delivery</p>
        </div>
      </article>
     
    </div>
     <section class="nav-wrapper">
        <div class="footer-conttainer">
          <article>
            <img src="{{ asset('asset/images/home.png') }}" alt="">
            <p>Home</p>
          </article>

          <article>
            <img src="{{ asset('asset/images/list.png') }}" alt="">
            <p>Orders</p>
          </article>

          <article class="selected">
            <img src="{{ asset('asset/images/wallet.svg') }}" alt="">
            <p>Earnings</p>
          </article>

          <article>
            <img src="{{ asset('asset/images/user.png') }}" alt="">
            <p>Account</p>
          </article>
        </div>
      </section>
  </body>
</html>
