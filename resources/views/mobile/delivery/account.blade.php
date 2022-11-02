@extends('layouts.delivery_boy')


@section('content')
    <div class="main-container" id="account">

      <img src="{{ asset('asset/images/profile1.png') }}" id="profileImg" alt="">
      <article class="topNav">
        <h2></h2>
        <img src="{{ asset('asset/images/bell2.png') }}" alt="" />
      </article>
      <article class="content-container padding-lr">
        <h2 class="header2">Reza Blazer</h2>
        <div class="btn-container">
        <a href="/delivery/profile">
          <button class="btn">
            <p>Profile</p>
            <img src="{{ asset('asset/images/rightArrow.svg') }}" alt="" />
          </button>
        </a>
        <a href="/delivery/document">
          <button class="btn">
            <p>Documents</p>
            <img src="{{ asset('asset/images/rightArrow.svg') }}" alt="" />
          </button>
          </a>
        <a href="/delivery/vehicle_details">
          <button class="btn">
            <p>Vehicle Details</p>
            <img src="{{ asset('asset/images/rightArrow.svg') }}" alt="" />
          </button>
          </a>
        <a href="#">
          <button class="btn">
            <p>Bank Details</p>
            <img src="{{ asset('asset/images/rightArrow.svg') }}" alt="" />
          </button>
          </a>
        <a href="/delivery/review">
          <button class="btn">
            <p>Reviews</p>
            <img src="{{ asset('asset/images/rightArrow.svg') }}" alt="" />
          </button>
          </a>
        <a href="/delivery/logout">
          <button class="btn">
            <p>Logout</p>
            <img src="{{ asset('asset/images/off.png') }}" alt="" />
          </button>
        </a>
        </div>
      </article>
       @include('layouts.partials.delivery_boy_footer_nav')
    </div>
@endsection
