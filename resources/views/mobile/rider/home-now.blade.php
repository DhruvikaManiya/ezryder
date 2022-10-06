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

<form method="post" action="{{route('mobile.homenow_store',$requests->id)}}">
    @csrf
    @method('PUT')
    <section class="address_content">
        <div class="container">
            <table>
                <div class="inputgroup">
                    <label for="email" class="label">Pickup Address</label>
                    <div class="input_inner">
                        <input type="text" class="input" name="pick_address"
                               value="{{ (isset($requests) and $requests->pick_address)?$requests->pick_address:''}}"
                               placeholder="Enter pickup address">
                        <img src="{{asset('asset/images/location-icon.svg')}}" alt="">
                    </div>
                </div>
                <div class="inputgroup">
                    <label for="email" class="label">Drop Address </label>
                    <div class="input_inner">
                        <input type="text" class="input" name="drop_address"
                               value="{{  (isset($requests) and $requests->drop_address)?$requests->drop_address:''}}"
                               placeholder="Enter drop address">
                        <img src="{{asset('asset/images/location-icon.svg')}}" alt="">
                    </div>
                </div>
            </table>
        </div>
    </section>

    <section class="addr_tabs">
        <div class="container">
            <div class="tab">
                <button class="tablinks" type="button" onclick="openCity(event, 'Economy')">Economy</button>
                <button class="tablinks" type="button" onclick="openCity(event, 'Sudan')">Sudan</button>
                <button class="tablinks" type="button" onclick="openCity(event, 'Luxury')">Luxury</button>
            </div>

            <div id="Economy" class="tabcontent">
                @foreach($details as $item)
                    @if($item->vehicle_type_id==1)
                        <div class="tab_content_bx">
                            <div class="img">
                                <img src="{{asset('asset/images/taxi-icon.svg')}}" alt="">
                            </div>
                            <div class="car_details">
                                <h4 class="car_name">{{$item->vehicle_name}}</h4>
                                {{--                        <p class="stops">Multiple Stops</p>--}}
                                <p class="stops">Economy</p>
                                <p class="num_person">{{$item->number_of_seats}} Persons</p>
                            </div>
                            <div class="car_rate">
                                <p class="rent">$ 340</p>
                                <p class="rent_per_km">Rs {{$item->charge}}/{{$item->distance}} Kms</p>
                                <button class="btn btn-outline-secondary float-right" name="vehicle_id"
                                        value="{{ $item->id }}">Book
                                </button>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div id="Sudan" class="tabcontent" style="display: none;">
                @foreach($details as $item)
                    @if($item->vehicle_type_id==2)
                        <div class="tab_content_bx">
                            <div class="img">
                                <img src="{{asset('asset/images/taxi-icon.svg')}}" alt="">
                            </div>
                            <div class="car_details">
                                <h4 class="car_name">{{$item->vehicle_name}}</h4>
                                {{--                            <p class="stops">Multiple Stops</p>--}}
                                <p class="stops">Sudan</p>

                                <p class="num_person">{{$item->number_of_seats}} Persons</p>
                            </div>
                            <div class="car_rate">
                                <p class="rent">$ 340</p>
                                <p class="rent_per_km">Rs {{$item->charge}}/{{$item->distance}} Kms</p>
                                <button class="btn btn-outline-secondary float-right" name="vehicle_id"
                                        value="{{ $item->id }}">Book
                                </button>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div id="Luxury" class="tabcontent" style="display: none;">
                @foreach($details as $item)
                    @if($item->vehicle_type_id==3)
                        <div class="tab_content_bx">
                            <div class="img">
                                <img src="{{asset('asset/images/taxi-icon.svg')}}" alt="">
                            </div>
                            <div class="car_details">
                                <h4 class="car_name">{{$item->vehicle_name}}</h4>
                                {{--                            <p class="stops">Multiple Stops</p>--}}
                                <p class="stops">Luxury</p>
                                <p class="num_person">{{$item->number_of_seats}} Persons</p>
                            </div>
                            <div class="car_rate">
                                <p class="rent">$ 340</p>
                                <p class="rent_per_km">Rs {{$item->charge}}/{{$item->distance}} Kms</p>
                                <button class="btn btn-outline-secondary float-right" name="vehicle_id"
                                        value="{{ $item->id }}">Book
                                </button>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <a href="{{ route('mobile.rider.payment')}}" class="green_bg_btn">Button</a>
        </div>
    </section>
</form>



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
