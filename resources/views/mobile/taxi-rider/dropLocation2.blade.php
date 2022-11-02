@extends('layouts.mobile-taxi-rider')
@section('header_title', 'Home')

@section('content')

  <div class="main-container" id="dropLocation2">
    <div class="topNavbar">
      <article class="topNav">
        <h2><img src="{{ url('asset/images/leftArrow.png') }}" />Select Car</h2>
        <img src="{{ url('asset/images/notification.png') }}" alt="" />
      </article>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif


      <form method="post" action="" id="dropLocationSearch" class="padding-lr">
      @csrf
      <div class="inputContainer">
          <img src="{{ url('asset/images/compass.png') }}" alt="" />
          <input
                  type="text"
                  name="pick_address" id="pick_address"
                  class="address"
                  placeholder="Enter your pickup Address"
          />
        </div>
        <div class="inputContainer">
          <img src="{{ url('asset/images/search.png') }}" alt="" />
          <input
                  type="text"
                  class="search"
                  name="drop_address"
                  placeholder="Select your drop location"
          />
        </div>

        <img src="{{ url('asset/images/location2.png') }}" alt="" height="555px;" />

        <button class="btn-darkBlue">Select car</button>
      </form>
    </div>


  </div>

@endsection




