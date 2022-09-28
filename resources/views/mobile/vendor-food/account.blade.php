@extends('layouts.vendor-food')
@section('header_title','Accounts')

@section('css')
<link rel="stylesheet" href="{{asset('asset/css/account.css')}}">
@endsection

@section('content')
@include('mobile.vendor.inc.back-header')
<section class="account_det_sec">
    <div class="container">
        <div class="account_det">
            <img class="store_icon" src="{{asset('asset/images/store-icon.svg')}}" alt="store icon">
            <div class="acc_cont">
                <h4 class="stor_name">ABC Store</h4>
                <p class="text">D,293, Park Avenue,<br /> small vialla, canada</p>
                <p class="text">Email: abcstore@gmail.com</p>
                <p class="text">Phone: +919586979730</p>
            </div>
        </div>
    </div>
</section>
<section class="account_link_sec">
    <div class="container">
        <div class="account_links">
            <a href="{{route('vendorfood.products')}}" class="link">Products</a>
            <a href="{{route('vendorfood.addproducts')}}" class="link">Add Product</a>
            <a href="{{ route('vendorfood.orders') }}" class="link">Orders</a>
            <a href="{{ route('vendorfood.wallet') }}" class="link">Wallets</a>
            <a href="{{ route('vendorfood.bankdetail') }}" class="link">Bank Details</a>
            <a href="{{ route('vendorfood.review') }}" class="link">Reviews</a>
            <a href="{{ route('vendorfood.login') }}" class="link">Logout</a>
        </div>
    </div>
</section>
@endsection
