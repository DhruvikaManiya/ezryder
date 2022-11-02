@extends('layouts.mobile-taxi-rider')
@section('header_title', 'Home')

@section('content')

  <div class="main-container" id="dropLocation2">

      <div class="topNavbar">

        <form  id="dropLocationSearch" class="padding-lr" method="post" action="{{route('mobile.homenow_store',$requests->id)}}">
        <article class="topNav">
          <h2><img src="{{ url('asset/rider/assets/leftArrow.png') }}" />Select Car</h2>
          <img src="{{ url('asset/rider/assets/notification.png') }}" alt="" />
        </article>

          @csrf
          @method('PUT')
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
              placeholder="Select your drop location"
            />
          </div>

      </div>

      <img src="{{ url('asset/rider/assets/location3.png') }}" alt="" height="337px;" />

      <div class="carService-btn">
        <button style="background: #a3c7c7">Standard</button>
        <button>Economy</button>
        <button>Premium</button>
      </div>

      <article class="carSpecification padding-lr">

        @foreach($details as $item)
{{--          @if($item->vehicle_type_id==1)--}}

        <div class="car1">
          <img src="{{ url('asset/rider/assets//car.png') }}" alt="" />
          <p>{{ $item->vehicle_name }}</p>
          <p>$7.40</p>
          <p>45 mins</p>
          <button class="btn btn-outline-secondary float-right" name="vehicle_id"
                  value="{{ $item->id }}">Book
          </button>

        </div>
{{--        <div class="car1">--}}
{{--          <img src="{{ url('asset/rider/assets//car.png') }}" alt="" />--}}
{{--          <p>Faster</p>--}}
{{--          <p>$7.40</p>--}}
{{--          <p>45 mins</p>--}}
{{--        </div>--}}
{{--          @endif--}}

        @endforeach
      </article>
    </form>

    </div>
@endsection
