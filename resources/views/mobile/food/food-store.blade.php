@extends('layouts.food')


@section('header_title', 'kabab Factory Para...')
@section('css')
    <style>
        .p_image{
            height: 200px;
            /* width: 00px; */   
        }
        .main_box{
            margin-bottom: 40px;
        }
    </style>
@endsection
@section('content')

    @include('mobile.food.inc.back-header')

    <section class="recomm_sec">
        <div class="container">
            <p class="food_title">North Indian, South Indian, Fast Food</p>
            <h4 class="rec_title">Recommended</h4>
            @foreach ($products as $product)
                <div class="recomm_box main_box">
                    <div class="recomm_img_box">
                        <img class="recomm_img p_image" src="{{ $product->p_image }}" alt="">
                        <img class="heart_img" src="{{ asset('asset/images/Green-Heart.svg') }}" alt="">
                    </div>
                    <div class="recomm_content">
                        <div class="food_rate">
                            <h6 class="food_name">{{$product->name}}</h6>
                            <p class="rate">{{$product->price}}</p>
                        </div>
                        <div class="recomm_text">
                            <p class="rating"> 4.5 <span>(29)</span></p>
                            <div class="add-cart d-flex align-items-center justify-content-between addCart{{ $product->id }}"
                                         id="addCart" data-id="{{ $product->id }}"
                                         style="{{ $product->cart->count() > 0 ? 'display:none!important' : '' }}">
                                         <span class="plus-icon"><img
                                                 src="{{ asset('asset/images/plus.svg') }}"></span>
                                         <span>Add</span>
                                     </div>
                                     <div class="add-cart d-flex align-items-center justify-content-between "
                                         onclick="window.location='{{ route('mobile.cart') }}'"
                                         style="{{ $product->cart->count() > 0 ? '' : 'display:none!important' }}"
                                         id="iscart{{ $product->id }}">
                                         <span>Go to Cart </span>
                                     </div>
                        </div>
                    </div>
                </div>
            @endforeach
           
        </div>
    </section>

@endsection
