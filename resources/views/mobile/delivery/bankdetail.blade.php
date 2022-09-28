@extends('layouts.delivery')
@section('header_title', 'Bank Details')
@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/account.css') }}">
@endsection
@section('content')
    @include('mobile.delivery.inc.back-header')

    <section class="account_det_sec">
        <div class="container">
            <div class="amount-box">
                <div class="amount-left">
                    <p class="user"><span>AC no: 1234 5454 5555 5555</span></p>
                    <p class="user"><span>IFSC : ABCD1234</span></p>
                    <p class="user"><span>City: Ahmedabad</span></p>
                    <p class="user"><span>State: Gujarat</span></p>
                </div>
            </div>
        </div>
    </section>

@endsection
