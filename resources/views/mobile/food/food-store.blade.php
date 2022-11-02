@extends('layouts.food')


@section('header_title', 'Restaurants')
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

    @include('mobile.vendor.inc.back-header')

    <section class="recomm_sec">
        <div class="container">
            <p class="food_title">North Indian, South Indian, Fast Food</p>
            <h4 class="rec_title">Recommended</h4>
           @include('mobile.food.product.food_list');
        </div>
    </section>

@endsection
