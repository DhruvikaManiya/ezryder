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

    @include('mobile.vendor.inc.back-header')

    <section class="trend-product pb-5">
        <div class="container-fluid">
            <div class="tend-title section-title pt-3">
                <h3>Trending Products</h3>
            </div>
            <div class="row">
                @foreach ($products as $pro)
                    
                <div class="col-6 mb-4">
                    <div class="card product-card position-relative">
                        <div class="card-header position-absolute d-flex justify-content-between">
                           
                            <img src="{{ asset('asset/images/green-hart.svg') }}" class="wishlist{{$pro->id}}" data-id="{{ $pro->id }}"
                            style="{{ $pro->Wishlist->count() > 0 ? 'display:none!important' : '' }}" id="wishlist">
                    

                            <img src="{{ asset('asset/images/heart.png') }}"  class="wishlistRemove{{$pro->id}}"data-id="{{ $pro->id }}"
                            style="{{ $pro->Wishlist->count() > 0 ? '' : 'display:none!important' }}" id="wishlist">
                     
                            @php
                            $product = ((($pro->Sellar_price + ($pro->Sellar_price * $pro->admin_charge)/100)*100) / ($pro->MRP));
                            $discount = 100 - $product;
                         //    $discount = round($discount);
                     @endphp
             <div class="discount d-flex align-items-center justify-content-center">{{$discount}}%
                 </div> </div>

                        <img value="{{ $pro->id }}" src="{{ $pro->p_image }}" class="card-img-top" alt="..."
                            onclick="window.location='{{ route('mobile.productdetails',$pro->id) }}'">
                        <div class="card-body">
                            <h5 onclick="window.location='{{ route('mobile.productdetails',$pro->id) }}'" class="card-title">
                                {{ $pro->name }} </h5>
                                <h6>{{$pro->user->name}}</h6>
                            <p class="card-text">{{ $pro->units }} {{ $pro->measurement }}</p>
                            @if ($pro->quantity < 5 && $pro->quantity > 0 )

                            <p class="card-text" style="color: red;">Available:{{ $pro->quantity }}</p>
                            @elseif($pro->quantity == 0)

                            <p class="card-text" style="color: red;">Out of Stock</p>

                            {{-- @else
                            <p class="card-text">Available:{{ $pro->quantity }}</p>
                                 --}}
                            @endif
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
                                    <span class="dis-price d-flex align-items-center text-muted">
                                        <s>${{ $pro->MRP }}</s>
                                    </span>
                                   
                                    <span> ${{($pro->Sellar_price + ($pro->Sellar_price * $pro->admin_charge)/100)}}</span>
                                </div>
                                @if ($pro->quantity == 0 )
                                @else

                                <div class="add-cart d-flex align-items-center justify-content-between addCart{{ $pro->id }}"
                                    id="addCart" data-id="{{ $pro->id }}"
                                    style="{{ $pro->cart->count() > 0 ? 'display:none!important' : '' }}">
                                    <span class="plus-icon"><img
                                            src="{{ asset('asset/images/Group 186.svg') }}"></span>
                                    <span>Add</span>
                                </div>
                                <div class="add-cart d-flex align-items-center justify-content-between "
                                    onclick="window.location='{{ route('mobile.cart') }}'"
                                    style="{{ $pro->cart->count() > 0 ? '' : 'display:none!important' }}"
                                    id="iscart{{ $pro->id }}">
                                    <span>Go to Cart </span>
                                </div>
                                @endif
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
              
            @endforeach
                  
            </div>
        </div>
    </section>

@endsection
