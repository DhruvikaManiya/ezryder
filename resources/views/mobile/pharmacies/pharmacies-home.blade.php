@extends('layouts.pharmacies')


@section('content')
    @include('mobile.pharmacies.inc.header')

    <section class="slider_sec">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($slider as $sliders)
                    @if ($sliders->type == 3)
                        <div class="swiper-slide">
                            <div class="pharmacy_banner">
                                <img src="{{ $sliders->image }}">
                                {{-- <h4 class="title">
                                      <h4 class="title">
                                             <span class="span">50%</span>
                                             <span class="span">Discount</span>
                                             <span class="span">Offer</span>
                                    </h4> --}}
                                </h4>
                            </div>
                        </div>
                    @endif
                @endforeach
                {{-- <div class="swiper-slide">
                    <div class="pharmacy_banner">
                        <h4 class="title">
                            <span class="span">50%</span>
                            <span class="span">Discount</span>
                            <span class="span">Offer</span>
                        </h4>
                    </div>
                </div> --}}
            </div>
            <!-- <div class="swiper-pagination"></div> -->
        </div>

    </section>

    <section class="cat_sec">
        <div class="container">
            <h1 class="sec_title">Browser Stores by Category</h1>



            <div class="store_cat_box">
                @foreach ($category as $cate)
                    <div class="store_cat"
                        onclick="window.location='{{ route('mobile.pharmacies.pharmaciesstores', $cate->id) }} '">
                        <img class="medicine_icon" src="{{ $cate->image }}" alt="">
                        <h6 class="cat_name">{{ $cate->name }}</h6>
                    </div>
                @endforeach
            </div>


        </div>
    </section>

    <section class="hot_sec">
        <div class="container">
            <h1 class="sec_title">HOT SELLERS</h1>
            <div class="hot_sellers">
              @include('mobile.pharmacies.product.pharma_list')
               
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
