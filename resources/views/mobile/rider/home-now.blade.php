@extends('layouts.mobile-rider')

@section('header_title','Book Taxi')

@section('header_title','Plan')
@section('css')

<style>
    .tabcontent{
        display: block;
    }
</style>
@endsection

@section('content')


@include('mobile.rider.inc.back-header')

<section class="address_content">
    <div class="container">
        <table>
            <div class="inputgroup">
                <label for="email" class="label">Pickup Address</label>
                <div class="input_inner">
                    <input type="text" class="input" name="paddress" placeholder="Enter pickup address">
                    <img src="{{asset('asset/images/location-icon.svg')}}" alt="">
                </div>
            </div>
            <div class="inputgroup">
                <label for="email" class="label">Drop Address</label>
                <div class="input_inner">
                    <input type="text" class="input" name="daddress" placeholder="Enter drop address">
                    <img src="{{asset('asset/images/location-icon.svg')}}" alt="">
                </div>
            </div>
        </table>
    </div>
</section>

<section class="addr_tabs">
    <div class="container">
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'Economy')">Economy</button>
            <button class="tablinks" onclick="openCity(event, 'Sudan')">Sudan</button>
            <button class="tablinks" onclick="openCity(event, 'Luxury')">Luxury</button>
        </div>

        <div id="Economy" class="tabcontent">
          <div class="tab_content_bx">
                <div class="img">
                    <img src="{{asset('asset/images/taxi-icon.svg')}}" alt="">
                </div>
                <div class="car_details">
                    <h4 class="car_name">Maruti Swift</h4>
                    <p class="stops">Multiple Stops</p>
                    <p class="num_person">4 Persons</p>
                </div>
                <div class="car_rate">
                    <p class="rent">$ 340</p>
                    <p class="rent_per_km">$ 3/10 Kms</p>
                </div>
          </div>
          <div class="tab_content_bx">
                <div class="img">
                    <img src="{{asset('asset/images/taxi-icon.svg')}}" alt="">
                </div>
                <div class="car_details">
                    <h4 class="car_name">Maruti Swift</h4>
                    <p class="stops">Multiple Stops</p>
                    <p class="num_person">4 Persons</p>
                </div>
                <div class="car_rate">
                    <p class="rent">$ 340</p>
                    <p class="rent_per_km">$ 3/10 Kms</p>
                </div>
          </div>
          <div class="tab_content_bx">
                <div class="img">
                    <img src="{{asset('asset/images/taxi-icon.svg')}}" alt="">
                </div>
                <div class="car_details">
                    <h4 class="car_name">Maruti Swift</h4>
                    <p class="stops">Multiple Stops</p>
                    <p class="num_person">4 Persons</p>
                </div>
                <div class="car_rate">
                    <p class="rent">$ 340</p>
                    <p class="rent_per_km">$ 3/10 Kms</p>
                </div>
          </div>
        </div>

        <div id="Sudan" class="tabcontent"  style="display: none;">
          <div class="tab_content_bx">
                <div class="img">
                    <img src="{{asset('asset/images/taxi-icon.svg')}}" alt="">
                </div>
                <div class="car_details">
                    <h4 class="car_name">Sudan</h4>
                    <p class="stops">Multiple Stops</p>
                    <p class="num_person">4 Persons</p>
                </div>
                <div class="car_rate">
                    <p class="rent">$ 340</p>
                    <p class="rent_per_km">$ 3/10 Kms</p>
                </div>
          </div>
          <div class="tab_content_bx">
                <div class="img">
                    <img src="{{asset('asset/images/taxi-icon.svg')}}" alt="">
                </div>
                <div class="car_details">
                    <h4 class="car_name">Sudan</h4>
                    <p class="stops">Multiple Stops</p>
                    <p class="num_person">4 Persons</p>
                </div>
                <div class="car_rate">
                    <p class="rent">$ 340</p>
                    <p class="rent_per_km">$ 3/10 Kms</p>
                </div>
          </div>
          <div class="tab_content_bx">
                <div class="img">
                    <img src="{{asset('asset/images/taxi-icon.svg')}}" alt="">
                </div>
                <div class="car_details">
                    <h4 class="car_name">Sudan</h4>
                    <p class="stops">Multiple Stops</p>
                    <p class="num_person">4 Persons</p>
                </div>
                <div class="car_rate">
                    <p class="rent">$ 340</p>
                    <p class="rent_per_km">$ 3/10 Kms</p>
                </div>
          </div>
        </div>

        <div id="Luxury" class="tabcontent" style="display: none;">
          <div class="tab_content_bx">
                <div class="img">
                    <img src="{{asset('asset/images/taxi-icon.svg')}}" alt="">
                </div>
                <div class="car_details">
                    <h4 class="car_name">Luxury</h4>
                    <p class="stops">Multiple Stops</p>
                    <p class="num_person">4 Persons</p>
                </div>
                <div class="car_rate">
                    <p class="rent">$ 340</p>
                    <p class="rent_per_km">$ 3/10 Kms</p>
                </div>
          </div>
          <div class="tab_content_bx">
                <div class="img">
                    <img src="{{asset('asset/images/taxi-icon.svg')}}" alt="">
                </div>
                <div class="car_details">
                    <h4 class="car_name">Luxury</h4>
                    <p class="stops">Multiple Stops</p>
                    <p class="num_person">4 Persons</p>
                </div>
                <div class="car_rate">
                    <p class="rent">$ 340</p>
                    <p class="rent_per_km">$ 3/10 Kms</p>
                </div>
          </div>
          <div class="tab_content_bx">
                <div class="img">
                    <img src="{{asset('asset/images/taxi-icon.svg')}}" alt="">
                </div>
                <div class="car_details">
                    <h4 class="car_name">Luxury</h4>
                    <p class="stops">Multiple Stops</p>
                    <p class="num_person">4 Persons</p>
                </div>
                <div class="car_rate">
                    <p class="rent">$ 340</p>
                    <p class="rent_per_km">$ 3/10 Kms</p>
                </div>
          </div>
        </div>

        <a href="{{ route('mobile.rider.payment')}}" class="green_bg_btn">Button</a>
    </div>
</section>



<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>


@endsection
