@extends('layouts.mobile-taxi-rider')
@section('header_title', 'Home')

@section('content')
    <div class="main-container" id="dropLocation2">
      <div class="topNavbar">
        <article class="topNav">
          <h2><img src="{{ url('asset/rider/assets/leftArrow.png')}}" />Select Car</h2>
          <img src="{{ url('asset/rider/assets/notification.png')}}" alt="" />
        </article>
        <form method="post" action="{{ route('mobile.car.accept_waiting') }}" id="dropLocationSearch" class="padding-lr">
          <div class="inputContainer">
            <img src="{{ url('asset/rider/assets/compass.png') }}" alt="" />
            <input
                    type="text"
                    id=""
                    class="address"
                    name="pick_address"
                    value="{{ (isset($requests) and $requests->pick_address)?$requests->pick_address:''}}"
            />
          </div>
          <div class="inputContainer">
            <img src="{{ url('asset/rider/assets/search.png') }}" alt="" />
            <input
                    type="text"
                    class="search"
                    name="drop_address"
                    value="{{  (isset($requests) and $requests->drop_address)?$requests->drop_address:''}}"
                    placeholder="Select your drop location">
          </div>

      </div>
      <img src="{{ url('asset/rider/assets/location4.png') }}" alt=""  height="337px;" />
      <article class="carSpecification padding-lr">
        <div class="rideType">
          <h4>Ezyder<span>Standard</span></h4>
          <img src="{{ url('asset/rider/assets/car.png') }}" alt="" />
          <h4>Ride Type<span>Shared</span></h4>
        </div>
        <button class="price">$5.45</button>
        </form>

        <p class="carRideDesc">
          Distance 12Kms andApproximate travel time is 50 mins
        </p>
      </article>
    </div>
@endsection
