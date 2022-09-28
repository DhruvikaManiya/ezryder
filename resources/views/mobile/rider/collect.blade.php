@extends('layouts.mobile-rider')


@section('header_title', 'Collect Your Payment')
@section('css')
@endsection

@section('content')
    @include('mobile.rider.inc.back-header')


    <section class="collected_payment">
        <div class="container">
            <div class="collected_payment_text">
            <h3>Have you collected your payment?</h3>
            </div>
            <div class="collected_payment_status posi-rel">
                <div class="collected_payment_img">
                    <img src="{{asset('asset/images/payment_status_img.png') }}">
                </div>
                <p class="payment_status_yes_no" onclick="window.location='{{ route('mobile.rider.collect2') }}'">Yes</p>
            </div>
        </div>
    </section>
