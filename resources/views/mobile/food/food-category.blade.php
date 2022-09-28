@extends('layouts.food')


@section('css')
@endsection

@section('content')
    @include('mobile.food.inc.header')

    <section class="slider_sec category_sec">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper category_bxs">
                <div class="swiper-slide mr-20">
                    <div class="top_bxs d_flex">
                        @foreach($sucategories as $subcategory)
                        <a href="{{ route('mobile.food.foodstore',$subcategory->id) }}" class="cat_bx">
                            <img class="food_icon" src="{{ $subcategory->subcate_image }}" alt="">
                            <h6 class="food_title">{{ $subcategory->name }}</h6>
                        </a>
                        @endforeach

                </div>
            </div>
        </div>
    </section>

    {{-- <section class="offers_sec">
        <div class="container">
            <h4 class="offer_title">Restaurants serving Burger</h4>

            <div class="offers_wrapper">
                <div class="offer_box">
                    <a href="#">
                        <img class="offers_img" src="{{ asset('asset/images/offers-img1.svg') }}" alt="">
                        <div class="offer_content">
                            <h6 class="food_name">Kabab Factory Palace</h6>
                            <div class="offer_text">
                                <p class="rating">5.0</p>
                                <p class="offer_avail">28 mins</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="offer_box">
                    <a href="#">
                        <img class="offers_img" src="{{ asset('asset/images/offers-img2.svg') }}" alt="">
                        <div class="offer_content">
                            <h6 class="food_name">Ice Cream Store</h6>
                            <div class="offer_text">
                                <p class="rating">5.0</p>
                                <p class="offer_avail">28 mins</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
        </div>
    </section> --}}
@endsection

@section('js')
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
