@extends('layouts.delivery_boy')


@section('content')
    <div class="main-container" id="deliveryBoyHome">
      <article class="topNav">
        <h2><img src="{{ asset('asset/images/leftArrow.png') }}" />Home</h2>
        <a href="{{ route('delivery.notifications') }}">
          <img src="{{ asset('asset/images/notification.png') }}" alt="" />
        </a>
      </article>
      <article class="header1">
        <div>
          <h1 class="h1-type1 padding-lr">Welcome</h1>
          <h1 class="h1-type1 padding-lr">Brijesh</h1>
        </div>
        <button class="btn-type2 btn-offline">You are offline</button>
      </article>
      @if($order_id)
      <article class="notif-type1 padding-lr">
        <a class="btn-type1 btn-color-lightGreen" href="/delivery/order-detail/{{ $order_id }}">
          <p>You have a new order #{{ $order_id }}</p>
          <img src="{{ asset('asset/images/rightArrow.png') }}" alt="" />
        </a>
        
      </article>
      @endif

      <article class="contentContainer">
        <div class="box-type1">
          <h2 class="header2 padding-lr">Last Delivery</h2>
          <article class="margin-lr">
            <a href="#">
            <div>
              <p>Earnings</p>
              <p class="value">$50</p>
            </div>
          </a>
          <a href="#">
            <div>
              <p>Total Trips</p>
              <p class="value">1</p>
            </div>
            </a>
          <a href="#">
            <div>
              <p>Kms Travelled</p>
              <p class="value">6</p>
            </div>
          </a>
          </article>
        </div>

        <div class="box-type1">
          <h2 class="header2 padding-lr">Today</h2>
          <article class="margin-lr">
            <a href="#">
            <div>
              <p>Earnings</p>
              <p class="value">$500</p>
            </div>
          </a>
          <a href="#">
            <div>
              <p>Total Trips</p>
              <p class="value">12</p>
            </div>
            </a>
            <a href="#">
            <div>
              <p>Kms Travelled</p>
              <p class="value">6</p>
            </div>
            </a>
          </article>
        </div>

        <div class="box-type1">
          <h2 class="header2 padding-lr">All Time</h2>
          <article class="margin-lr">
            <a href="#">
            <div>
              <p>Earnings</p>
              <p class="value">$500</p>
            </div>
            </a>
            <a href="#">
            <div>
              <p>Total Trips</p>
              <p class="value">12</p>
            </div>
            </a>
            <a href="#">
            <div>
              <p>Kms Travelled</p>
              <p class="value">40</p>
            </div>
            </a>
          </article>
        </div>
      </article>
      @include('layouts.partials.delivery_boy_footer_nav')
    </div>
@endsection
