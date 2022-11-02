@extends('layouts.ecommerce')

@section('content')
    <div class="main-container no-padding navStyle storesFilters orderHistory" id="addBankDetails">
        <article id="top-nav">
            <div class="reviewBackButton" onclick="history.back();">
                <img src="{{ asset('asset/images/loginScreen/leftArrow.png') }}" alt="" />
                <p>Order History</p>
            </div>
            <p>
                <span>{{ cartCount() }}</span>
                <img src="{{ asset('asset/images/homeScreen/shoppingBag.png') }}" alt="" />
            </p>
        </article>

        <div class="items">
            @foreach ($orders as $order)
               
                <article class="item" onclick="window.location='{{ route('ecommerce.user-orders',$order->id) }}'">
                    <img src="{{ asset('asset/images/groceryStoresHome/img4.png') }}" alt="">
                    <div class="desc">
                        <p class="name"> {{ $order->store->name }}</p>
                        <p class="about">{{ $order->delivery_address }}</p>
                        <p class="price"><span> {{ date('d-m-Y', strtotime($order->created_at)) }} </span> {{$order->net_total}}</p>
                    </div>
                    <img src="{{ asset('asset/images/loginScreen/rightArrow.png') }}" alt="" class="bag">
                </article>
                
            @endforeach
        </div>
        @include('layouts.partials.user_footer_nav')
    </div>
@endsection
