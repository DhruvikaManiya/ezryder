@extends('layouts.mobile-rider')

@section('header_title','Book Taxi')

@section('css')
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
                        <img src="{{ asset('asset/images/location-icon.svg') }}" alt="">
                    </div>
                </div>
                <div class="inputgroup">
                    <label for="email" class="label">Drop Address</label>
                    <div class="input_inner">
                        <input type="text" class="input" name="daddress" placeholder="Enter drop address">
                        <img src="{{ asset('asset/images/location-icon.svg') }}" alt="">
                    </div>
                </div>

                <div class="buttons">
                    <a href="#"><button class="btn later">Later</button></a>
                    <a href="{{ route('mobile.homenow') }}"><button class="btn now">Now</button></a>
                </div>
            </table>
        </div>
    </section>

    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235013.70771382237!2d72.43931569817332!3d23.02049746312321!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1660549221826!5m2!1sen!2sin"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection
