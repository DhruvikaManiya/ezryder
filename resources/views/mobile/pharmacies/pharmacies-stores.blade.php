@extends('layouts.pharmacies')

@section('header_title','Category')
@section('content')
   @include('mobile.vendor.inc.back-header')

    <section class="slider_sec">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide mr-0">
                    <div class="slide_menu">
                       
                      
                        {{-- <a class="slide_menu_link active" href="#">All</a> --}}
                        @foreach ($sucategories as $subcate )
                        <a class="slide_menu_link" href="{{route('mobile.pharma.pharma_list',$subcate->id)}}">{{$subcate->name}}</a>
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
            @foreach ($stores as $store )
                
           
            <div class="store_box" onclick="window.location='{{ route('mobile.pharmacies.pharmacieslist', $store->id) }}'">
                <img class="store_img" src="{{ asset('asset/images/store-1.svg') }}" alt="">
                <div class="store_det">
                    <h6 class="store_name">{{$store->name}}</h6>
                    <p class="store_add">{{$store->address}}</p>
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
