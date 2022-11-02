@extends('layouts.delivery')


@section('header_title', 'Account')
@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/account.css') }}">
@endsection

@section('content')
    @include('mobile.delivery.inc.back-header')
    <section class="account_det_sec">
        <div class="container">
            <div class="account_det">
                <img class="store_icon" src="{{ asset('asset/images/profile.png') }}" alt="store icon">
                <div class="acc_cont">
                    <h4 class="stor_name">{{$user->name}}</h4>
                    <p class="text">{{$user->address}}</p>
                    <p class="text">Email:{{$user->email}}</p>
                    <p class="text">Phone: {{$user->phone}}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="account_link_sec">
        <div class="container">
            <div class="account_links">

                <a href="{{ route('mobile.delivery.order') }}" class="link">Orders</a>
                <a href="{{ route('mobile.delivery.wallet') }}" class="link">Wallets</a>
                <a href="{{ route('mobile.delivery.bankdetail') }}" class="link">Bank Details</a>
                <a href="{{ route('mobile.delivery.login') }}" class="link">Logout</a>
            </div>
        </div>
    </section>
@endsection
