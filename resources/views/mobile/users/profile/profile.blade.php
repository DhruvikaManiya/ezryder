@extends('layouts.ecommerce')

@section('css')

    <style>
        .profile #top-nav img {
            z-index: 999;
        }
    </style>
@section('content')
    <div class="main-container no-padding navStyle groceryStoresHome profile" id="addBankDetails">
        <div class="background-overlay">
            <article id="top-nav">
                <img src="{{ asset('asset/images/common/pencil.png') }}" alt=""
                    onclick="window.location ='{{ route('ecommerce.profile.edit') }}'" />
                <p>
                    <span>{{ cartCount() }}</span>
                    <img src="{{ asset('asset/images/homeScreen/shoppingBag.png') }}" alt="" />
                </p>
            </article>
        </div>
        <div class="img-container">
            <img src="{{ asset('asset/images/common/profile.png') }}" alt="">
            <h1>Brijesh Mishra</h1>
        </div>
        <article class="searchbar-1">
            <input type="text" name="search" id="search" placeholder="Address" />
            <img id="address" src="{{ asset('asset/images/loginScreen/rightArrow.png') }}" alt="" />
        </article>

        @if ($favourite->count() > 0)
            <article class="header2">
                <h3>Favourite Product</h3>
            </article>
            <article id="stores">
                @foreach ($favourite as $fav)
                    <div class="store"
                        onclick="window.location = '{{ route('ecommerce.product.details', $fav->product->id) }}'">
                        <img src="{{ asset($fav->product->p_image) }}" alt="" width="117px" />
                        <p>{{ $fav->product->name }}</p>
                    </div>
                @endforeach

            </article>
        @endif

        <article class="header2">
            <h3>Recent Purchases</h3>
        </article>
        <article id="stores">
            <div class="store">
                <img src="{{ asset('asset/images/groceryStoresHome/img4.png') }}" alt="" />
                <p>Full Grain Round</p>
            </div>
            <div class="store">
                <img src="{{ asset('asset/images/groceryStoresHome/img5.png') }}" alt="" />
                <p>Buck Wheat Bun</p>
            </div>
            <div class="store">
                <img src="{{ asset('asset/images/groceryStoresHome/img6.png') }}" alt="" />
                <p>Baugette</p>
            </div>
        </article>


        @include('layouts.partials.user_footer_nav')

    </div>
@endsection
