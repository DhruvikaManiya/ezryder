@extends('layouts.food')



@section('content')
    @include('mobile.food.inc.header')
    <section class="reast_sec">
        <div class="container">
            <div class="restaurants_bx">
                <div class="content">
                    <h4 class="title">Restaurants</h4>
                    <p class="para">Enjoy your favourite treats</p>
                    <a href="#" class="view_all">View All</a>
                </div>
                <img class="restaur_img1" src="{{ asset('asset/images/Ellipse-10.svg') }}" alt="">
            </div>

            <div class="category_sec">
                <h4 class="cat_title">Categories</h4>
                <div class="category_bxs">
                    <div class="top_bxs">
                        @foreach ($categories as $category)
                            <a href="{{ route('mobile.food.foodcategory', $category->id) }}" class="cat_bx">
                                <img class="food_icon" src="{{ asset($category->image) }}" alt="">
                                <h6 class="food_title">{{ $category->name }}</h6>
                            </a>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="slider_sec">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="restaurants_bx pb-13 pl-15">
                        <div class="content">
                            <h4 class="title mt-17">
                                <span class="span_1">Grab</span><br />
                                <span class="span_2">60% OFF</span>
                            </h4>
                            <p class="para">In publishing and graphic design, Lorem ipsum is a placeholder text</p>
                            <a href="#" class="order_btn">Order Now</a>
                        </div>
                        <img class="restaur_img1" src="{{ asset('asset/images/Ellipse-9.svg') }}" alt="">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="restaurants_bx pb-13 pl-15">
                        <div class="content">
                            <h4 class="title mt-17">
                                <span class="span_1">Grab</span><br />
                                <span class="span_2">60% OFF</span>
                            </h4>
                            <p class="para">In publishing and graphic design, Lorem ipsum is a placeholder text</p>
                            <a href="#" class="order_btn">Order Now</a>
                        </div>
                        <img class="restaur_img1" src="{{ asset('asset/images/Ellipse-9.svg') }}" alt="">
                    </div>
                </div>
            </div>
            <!-- <div class="swiper-pagination"></div> -->
        </div>

    </section>

    <section class="offers_sec">
        <div class="container">
            <h4 class="offer_title">Best Offers Around You</h4>
            @foreach ($stores as $store)
                <div class="offers_wrapper" onclick="window.location='{{ route('mobile.food.foodstore',$store->id) }}'">
                    <div class="offer_box">
                        <a href="#">
                            @if (isset($store->profile))
                            <img class="offers_img" src="{{ asset($store->profile) }}" alt="" style="max-height: 119px;width: 100%;">
                            @else   
                            <img class="store_icon" src="{{ asset('asset/images/store-icon.svg') }}" alt="store icon" style="max-height: 119px;width: 100%;">
                            @endif
                            
                            <div class="offer_content">
                                <h6 class="food_name">{{ $store->name }}</h6>
                                <div class="offer_text">
                                    <p class="rating">5.0</p>
                                    <p class="offer_avail">28 mins</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
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
