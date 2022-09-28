@extends('layouts.pharmacies')


@section('content')
      @include('mobile.pharmacies.inc.header')

    <section class="slider_sec">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="pharmacy_banner">
                        <h4 class="title">
                            <span class="span">50%</span>
                            <span class="span">Discount</span>
                            <span class="span">Offer</span>
                        </h4>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="pharmacy_banner">
                        <h4 class="title">
                            <span class="span">50%</span>
                            <span class="span">Discount</span>
                            <span class="span">Offer</span>
                        </h4>
                    </div>
                </div>
            </div>
            <!-- <div class="swiper-pagination"></div> -->
        </div>

    </section>

    <section class="cat_sec">
        <div class="container">
            <h1 class="sec_title">Browser Stores by Category</h1>
          
                
          
            <div class="store_cat_box">
                  @foreach ($category as  $cate)
                <div class="store_cat" onclick="window.location='{{ route('mobile.pharmacies.pharmaciesstores', $cate->id) }} '">
                    <img class="medicine_icon" src="{{ $cate->image }}" alt="">
                    <h6 class="cat_name">{{$cate->name}}</h6>
                </div>
              
                @endforeach
            </div>
            
          
        </div>
    </section>

    <section class="hot_sec">
        <div class="container">
            <h1 class="sec_title">HOT SELLERS</h1>
            <div class="hot_sellers">
                @foreach($Product as $prod )
                    
              
                <div class="hot_seller_box">
                    <img class="hotproduct_img" src="{{ $prod->p_image }}" alt="">
                    <p class="hot_product">{{$prod->name}}</p>
                    <div class="price_box">
                        <p class="price">
                            <span class="light">${{$prod->price}}</span>
                            <span class="dark">${{$prod->price}}</span>
                        </p>
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
                        {{-- <button class="add_btn">Add</button> --}}
                    </div>
                </div>
                @endforeach
                {{-- <div class="hot_seller_box">
                    <img class="hotproduct_img" src="{{ asset('asset/images/hotseller-img2.png') }}" alt="">
                    <p class="hot_product">Sofy Antibacteria Pads Extra Long, 48 Count</p>
                    <div class="price_box">
                        <p class="price">
                            <span class="light">$399</span>
                            <span class="dark">$399</span>
                        </p>
                        <button class="add_btn">Add</button>
                    </div>
                </div> --}}
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
