@extends('layouts.vendor')
@section('header_title', 'Accounts')

@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/account.css') }}">
@endsection

@section('content')
    @include('mobile.vendor.inc.back-header')
    <section class="account_det_sec">
        <div class="container">
            <div class="account_det">

                @if (isset($user->profile))
                    <img class="store_icon" src="{{ asset($user->profile) }}" alt="store icon">
                @else
                    <img class="store_icon" src="{{ asset('asset/images/store-icon.svg') }}" alt="store icon">
                @endif
                <div class="acc_cont">
                    <h4 class="stor_name">{{ $user->name }}</h4>
                    <p class="text">{{ $user->address }}</p>
                    <p class="text">Email : {{ $user->email }}</p>
                    <p class="text">Phone : {{ $user->phone }}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="account_link_sec">
        <div class="container">
            <div class="account_links">
                <a href="{{ route('vendor.profile') }}" class="link">Profile</a>

                <a href="{{ route('vendor.products') }}" class="link">Products</a>
                <a href="{{ route('vendor.addproducts') }}" class="link">Add Product</a>
                <a href="{{ route('vendor.order_hostory') }}" class="link">Orders History</a>
                <a href="{{ route('vendor.wallet') }}" class="link">Wallets</a>
                <a href="{{ route('vendor.bankdetail') }}" class="link">Bank Details</a>
                <a href="{{ route('vendor.review') }}" class="link">Reviews</a>
                <a href="{{ route('vendor.logout') }}" class="link">Logout</a>
            </div>
        </div>
    </section>
@endsection
