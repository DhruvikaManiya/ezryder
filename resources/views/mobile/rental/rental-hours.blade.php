@extends('layouts.mobile-rider')


@section('css')
@endsection

@section('content')

<header class="header">
    <div class="container">
   <h1 class="header_title_2">Rentals Hours</h1>
        
    </div>
</header>

<!-- <header class="header">
    <div class="container">
        <h1 class="header_title">Rentals Hours</h1>
    </div>
</header> -->

<section class="driver_sec">
    <div class="container">
        <form action="/action_page.php">
          <label class="rental_title mt-42 mb-46 w-100" for="hrs">How much  time do you  need ?</label>
          <select name="hrs" id="hrs" class="w-100 select_hours">
            <option default>select Hours</option>
            <option value="1">1 Hour</option>
            <option value="2">2 Hours</option>
            <option value="3">3 Hours</option>
            <option value="4">4 Hours</option>
            <option value="5">5 Hours</option>
          </select>
          <div class="btns jus-cont-left">
            <a href="#" class="btn w-117">Leave Now</a>
            <a href="#" class="btn w-117">Leave Later</a>
          </div>
          <div class="rent_starting">
            <p class="starting_at">Starting at</p>
            <div class="rent_cont">
                <p class="rent">$150</p>
                <p class="rent_per_hrs">$15 /hours</p>
            </div>
          </div>
          <a href="{{route('mobile.rental.rentalplans')}}" class="green_bg_btn">Choose a Ride</a>
        </form>
    </div>
</section>








@endsection