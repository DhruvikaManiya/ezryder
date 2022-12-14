@extends('layouts.pharmacies')

@section('header_title', 'Pharmacy')

@section('content')

@include('mobile.vendor.inc.back-header')

<section class="stores_sec">
    <div class="container">
        @foreach ($products as $prod )
        <div class="store_box">
          
                
            
            <img class="store_img" src="{{ $prod->p_image}}" alt=""  onclick="window.location='{{route('mobile.pharma.productdetails', $prod->id)}}'">
            <div class="store_det">
                <h6 class="product_name">{{$prod->name}}</h6>
                @if ($prod->quantity < 5 && $prod->quantity > 0 )

                <p class="card-text" style="color: red;">Available:{{ $prod->quantity }}</p>
                @elseif($prod->quantity == 0)

                <p class="card-text" style="color: red;">Out of Stock</p>

                {{-- @else
                <p class="card-text">Available:{{ $pro->quantity }}</p>
                     --}}
                @endif
                <div class="price_box">
                    <p class="price">
                        <span class="light"><del>${{ $prod->MRP }}</del></span>
                        <span class="dark">${{($prod->Sellar_price + ($prod->Sellar_price * $prod->admin_charge)/100)}}</span>
                    </p>
                    {{-- <button class="add_btn">Add</button> --}}
                    @if ($prod->quantity == 0)
                    @else
                    <div class="add-cart d-flex align-items-center justify-content-between addCart{{ $prod->id }}"
                        id="addCart" data-id="{{ $prod->id }}"
                        style="{{ $prod->cart->count() > 0 ? 'display:none!important' : '' }}">
                        <span class="plus-icon"><img
                                src="{{ asset('asset/images/plus.svg') }}"></span>
                        <span>Add</span>
                    </div>
                    <div class="add-cart d-flex align-items-center justify-content-between "
                    onclick="window.location='{{ route('mobile.pharma.cart') }}'"
                        style="{{ $prod->cart->count() > 0 ? '' : 'display:none!important' }}"
                        id="iscart{{ $prod->id }}">
                        <span>Go to Cart </span>
                    </div>
                    @endif
                    
                </div>
            </div>
           
        </div>
        @endforeach
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
