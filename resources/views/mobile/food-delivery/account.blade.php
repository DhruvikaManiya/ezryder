@extends('layouts.food-delivery')


@section('header_title', 'Account')
@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/account.css') }}">
@endsection

@section('content')
    @include('mobile.food-delivery.inc.back-header')
    <section class="account_det_sec">
        <div class="container">
            <div class="account_det">
                <img class="store_icon" src="{{ asset('asset/images/profile.png') }}" alt="store icon">
                <div class="acc_cont">
                    <h4 class="stor_name">Brijesh Mishra</h4>

                    <p class="text">brijesh@gmail.com</p>
                    <p class="text">9586979730</p>
                </div>
            </div>
        </div>
    </section>
    <section class="account_link_sec">
        <div class="container">
            <div class="account_links">

                <a href="{{ route('food.delivery.history') }}" class="link">History</a>
                <a href="{{ route('food.delivery.wallet') }}" class="link">Wallets</a>
                <a href="{{ route('food.delivery.bankdetail') }}" class="link">Bank Details</a>
                <a href="{{ route('food.delivery.login') }}" class="link">Logout</a>
            </div>
        </div>
    </section>
@endsection
