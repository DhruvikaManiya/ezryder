@extends('layouts.grocery')


@section('header_title', 'Product')
@section('css')
    <style>
        .p_image {
            height: 200px;
            /* width: 00px; */
        }

        .main_box {
            margin-bottom: 40px;
        }
    </style>
@endsection
@section('content')

    @include('mobile.grocery.inc.back-header')

    <section class="trend-product pb-5">
        <div class="container-fluid">
            <div class="tend-title section-title pt-3">
                <h3>Trending Products</h3>
            </div>
            <div class="row">
            
                    @foreach ($products as $product)
                        <div class="col-6 mb-4">
                            <div class="card product-card position-relative">
                                <div class="card-header position-absolute d-flex justify-content-between">
                                    <img src="{{ asset('asset/images/green-hart.svg') }}" class="card-img-top"
                                        alt="...">
                                    <div class="discount d-flex align-items-center justify-content-center">10%</div>
                                </div>

                                <img src="{{ $product->p_image }}" class="card-img-top" alt="..."
                                    onclick="window.location='{{ route('mobile.productdetails', $product->id) }}'">
                                <div class="card-body">
                                    <h5 class="card-title"
                                        onclick="window.location='{{ route('mobile.productdetails', $product->id) }}'">
                                        {{ $product->name }}</h5>
                                    <h6>{{ $product->description }}</h6>
                                    <p class="card-text">{{ $product->units }} {{ $product->measurement }}</p>
                                    <div class="rating">

                                        <input type="radio" name="rating" value="5" id="5"><label
                                            for="5">☆</label>
                                        <input type="radio" name="rating" value="4" id="4"><label
                                            for="4">☆</label>
                                        <input type="radio" name="rating" value="3" id="3"><label
                                            for="3">☆</label>
                                        <input type="radio" name="rating" value="2" id="2"><label
                                            for="2">☆</label>
                                        <input type="radio" name="rating" value="1" id="1"><label
                                            for="1">☆</label>
                                    </div>
                                    <div class="product-footer d-flex justify-content-between">
                                        <div class="price d-flex align-items-center">
                                            <span
                                                class="dis-price d-flex align-items-center text-muted"><s>${{ $product->Dis_price }}</s></span>
                                            <span>${{ $product->price }}</span>
                                        </div>
                                        <!-- <div class="add-cart d-flex align-items-center justify-content-between "
                                            onclick="window.location='{{ route('mobile.cart') }}'">
                                            <span class="plus-icon"><img src="{{ asset('asset/images/Group 70.svg') }}"></span>
                                            <span>Add</span>
                                        </div> -->
                                        <div class="add-cart d-flex align-items-center justify-content-between addCart{{ $product->id }}"
                                            id="addCart" data-id="{{ $product->id }}"
                                            style="{{ $product->cart->count() > 0 ? 'display:none!important' : '' }}">
                                            <span class="plus-icon"><img
                                                    src="{{ asset('asset/images/Group 70.svg') }}"></span>
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
                        </div>
                    @endforeach
           
            </div>
        </div>
    </section>

@endsection
