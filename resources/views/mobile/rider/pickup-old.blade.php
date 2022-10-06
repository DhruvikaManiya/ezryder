@extends('layouts.mobile-rider')

@section('header_title','Book Taxi')

@section('css')
@endsection

@section('content')
  


@include('mobile.rider.inc.back-header')

    <section class="address_content">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form method="post" action="">
               @csrf
               <table>
                   <div class="inputgroup">
                       <label for="email" class="label">Pickup Address</label>
                       <div class="input_inner">
                           <input type="text" class="input" name="pick_address" id="pick_address" placeholder="Enter pickup address">
                           <img src="{{ asset('asset/images/location-icon.svg') }}" alt="">
                       </div>
                   </div>
                   <div class="inputgroup">
                       <label for="email" class="label">Drop Address</label>
                       <div class="input_inner">
                           <input type="text" class="input" name="drop_address" placeholder="Enter drop address">
                           <img src="{{ asset('asset/images/location-icon.svg') }}" alt="">
                       </div>
                   </div>
                   <div class="inputgroup" id="late_time" style="display: none">
                       <label for="email" class="label">Time</label>
                       <div class="input_inner">
                           <input type="datetime-local" class="input" name="time" placeholder="Enter Pick Item">
                           <img src="{{ asset('asset/images/location-icon.svg') }}" alt="">
                       </div>
                   </div>

                   <div class="buttons">
                       <a href="#"><button  class="btn later" name ="btn_later"  id="btn_later" type="submit">Later</button></a>
                       <a href="#"><button class="btn now" name="btn_now" type="submit" >Now</button></a>
                   </div>
               </table>
           </form>
        </div>
    </section>

    <div id="map" style="width: 200px; height: 200px;"></div>
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235013.70771382237!2d72.43931569817332!3d23.02049746312321!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1660549221826!5m2!1sen!2sin"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection

