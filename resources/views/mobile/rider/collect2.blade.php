@extends('layouts.mobile-rider')


@section('header_title', 'Collect Your Payment')
@section('css')
@endsection

@section('content')
    @include('mobile.rider.inc.back-header')


    <section class="collected_payment">
        <div class="container">
            <div class="collected_payment_text payment_congrats">
                <h3>Congrats !!!</h3>
            </div>
            <div class="your_trip_text">
                <p>Your Earn</p>
                <p class="mt-38">$25</p>
                <p class="pt-20">from this trip</p>
            </div>
            <button type="button" class="collected_payment_home_btn"
                onclick="window.location='{{ route('mobile.rider.book-now') }}'">Home</button>
        </div>
    </section>
