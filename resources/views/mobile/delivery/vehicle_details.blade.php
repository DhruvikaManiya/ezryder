@extends('layouts.delivery_boy')


@section('content')
 <div class="main-container" id="selectVehicle">
      <article class="topNav">
        <h2><img src="{{ asset('asset/images/leftArrow.png') }}" /> Vehicle</h2>
        <img src="{{ asset('asset/images/notification.png') }}" alt="" />
      </article>
      <article class="content-container padding-lr">
        <h1 class="header2">Select your vehicle</h1>
        <form action="">
          <article>
            <input type="radio" name="vehicleType" checked id="bike" class="">
            <label class="label-type2" for="bike">Bike</label>
          </article>
          <article>
            <input type="radio" name="vehicleType" id="cycle" class="">
            <label class="label-type2" for="cycle">Cyle</label>
          </article>
          <article>
            <input type="radio" name="vehicleType" id="car" class="">
            <label class="label-type2" for="car">Car</label>
          </article>
          <article>
            <input type="radio" name="vehicleType" id="drone" class="">
            <label class="label-type2" for="drone">Drone</label>
          </article>
          <button class="btn-type2 btn-darkBlue btn-full">Save</button>
        </form>
      </article>
     
      @include('layouts.partials.delivery_boy_footer_nav')

    </div>
@endsection
