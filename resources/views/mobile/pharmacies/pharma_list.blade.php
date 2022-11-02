@extends('layouts.pharmacies')

@section('header_title', 'Pharmacy')

@section('content')
@include('mobile.vendor.inc.back-header')

{{-- <header class="header_top">
    <div class="container">
        <div class="header_wrapper">
            <div class="left">
                <img class="left_arrow_icon" src="{{asset('asset/images/Arrow-left.svg')}}" alt="">
                <h4 class="header_title">ABC Pharmacy</h4>
            </div>
            <div class="right">
                <img class="search_icon" src="{{asset('asset/images/Group 185.svg')}}" alt="">
                <img class="cart_icon" src="{{asset('asset/images/clarity_shopping-cart.svg')}}" alt="">
            </div>
        </div>
    </div>
</header> --}}


<section class="stores_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="sec_title">Products</h1>
                <div class="hot_sellers">
                @foreach ($products as $prod)
                <div class="hot_seller_box card product-card position-relative">
                    
                    <div class="card-header position-absolute d-flex justify-content-between">
                
                        <img src="{{ asset('asset/images/green-hart.svg') }}" class="wishlist{{$prod->id}}" data-id="{{ $prod->id }}"
                        style="{{ $prod->Wishlist->count() > 0 ? 'display:none!important' : '' }}" id="wishlist">
                
                
                        <img src="{{ asset('asset/images/heart.png') }}"  class="wishlistRemove{{$prod->id}}"data-id="{{ $prod->id }}"
                        style="{{ $prod->Wishlist->count() > 0 ? '' : 'display:none!important' }}" id="wishlist">
                 
                        @php
                        $product = ((($prod->Sellar_price + ($prod->Sellar_price * $prod->admin_charge)/100)*100) / ($prod->MRP));
                        $discount = 100 - $product;
                     //    $discount = round($discount);
                 @endphp
                <div class="discount d-flex align-items-center justify-content-center">{{$discount}}%
                </div>
                
                     </div>
                    <img class="hotproduct_img" style="width: 100%;height:100px;" src="{{ $prod->p_image }}" alt="" onclick="window.location='{{route('mobile.pharma.productdetails', $prod->id)}}'">
                   
                    <p class="hot_product">{{ $prod->name }}</p>
                    @if ($prod->quantity < 5 && $prod->quantity > 0 )
                
                    <p class="card-text" style="color: red;">Available:{{ $prod->quantity }}</p>
                    @elseif($prod->quantity == 0)
                
                    <p class="card-text" style="color: red;">Out of Stock</p>
                
                    {{-- @else
                    <p class="card-text">Available:{{ $prod->quantity }}</p>
                         --}}
                    @endif
                    <div class="price_box">
                        <p class="price">
                            <span class="light"><del>${{ $prod->MRP }}</del></span>
                            <span class="dark">${{($prod->Sellar_price + ($prod->Sellar_price * $prod->admin_charge)/100)}}</span>
                        </p>
                        @if ($prod->quantity == 0 )
                        @else
                        <div class="add-cart d-flex align-items-center justify-content-between addCart{{ $prod->id }}"
                            id="addCart" data-id="{{ $prod->id }}"
                            style="{{ $prod->cart->count() > 0 ? 'display:none!important' : '' }}">
                            <span class="plus-icon"><img src="{{ asset('asset/images/Plus.svg') }}"></span>
                            <span>Add</span>
                        </div>
                        <div class="add-cart d-flex align-items-center justify-content-between "
                            onclick="window.location='{{ route('mobile.pharma.cart') }}'"
                            style="{{ $prod->cart->count() > 0 ? '' : 'display:none!important' }}"
                            id="iscart{{ $prod->id }}">
                            <span>Go to Cart </span>
                        </div>
                        @endif
                        {{-- <button class="add_btn">Add</button> --}}
                
                    </div>      
                </div>
               
                @endforeach
            </div>
        </div>
        </div>
    </div>
</section>







    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: "auto",
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>

@endsection
