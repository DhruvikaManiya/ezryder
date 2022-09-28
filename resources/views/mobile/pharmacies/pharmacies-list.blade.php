@extends('layouts.pharmacies')


@section('content')

<header class="header_top">
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
</header>

<section class="logo_search_sec">
    <div class="container">
        <img class="pharmacy_bg" src="{{asset('asset/images/pharmacy-bg.png')}}" alt="">

        <div class="location_box">
            <img class="location_icon" src="{{asset('asset/images/location-icon.svg')}}" alt="">
            <p class="location">Arbudangar, odhav</p>
        </div>
        <div class="search_box">
            <input type="search" name="search" id="search" placeholder="Search">
            <img class="search_icon" src="{{asset('asset/images/green-search.svg')}}" alt="">
        </div>
    </div>
</section>

<section class="slider_sec">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide mr-0">
                    <div class="slide_menu">
                        {{-- <a class="slide_menu_link active" href="#">All</a> --}}
                        @foreach ($categories as $category)
                        <a class="slide_menu_link" href="#">{{$category->name}}</a>
                        {{-- <a class="slide_menu_link" href="#">Cosmetics</a> --}}
                        @endforeach
                    </div>
                </div>
                {{-- <div class="swiper-slide">
                    <div class="slide_menu">
                        <a class="slide_menu_link" href="#">Cosmetics</a>
                        <a class="slide_menu_link" href="#">Cosmetics</a>
                        <a class="slide_menu_link" href="#">Cosmetics</a>
                    </div>
                </div> --}}
            </div>
            <!-- <div class="swiper-pagination"></div> -->
        </div>

</section>

<section class="stores_sec">
    <div class="container">
        @foreach ($products as $prod )
        <div class="store_box">
          
                
            
            <img class="store_img" src="{{ $prod->p_image}}" alt="">
            <div class="store_det">
                <h6 class="product_name">{{$prod->name}}</h6>
                <div class="price_box">
                    <p class="price">
                        <span class="light">${{$prod->price}}</span>
                        <span class="dark">${{$prod->price}}</span>
                    </p>
                    {{-- <button class="add_btn">Add</button> --}}
                    <div class="add-cart d-flex align-items-center justify-content-between addCart{{ $prod->id }}"
                        id="addCart" data-id="{{ $prod->id }}"
                        style="{{ $prod->cart->count() > 0 ? 'display:none!important' : '' }}">
                        <span class="plus-icon"><img
                                src="{{ asset('asset/images/plus.svg') }}"></span>
                        <span>Add</span>
                    </div>
                    <div class="add-cart d-flex align-items-center justify-content-between "
                        onclick="window.location='{{ route('mobile.cart') }}'"
                        style="{{ $prod->cart->count() > 0 ? '' : 'display:none!important' }}"
                        id="iscart{{ $prod->id }}">
                        <span>Go to Cart </span>
                    </div>
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
