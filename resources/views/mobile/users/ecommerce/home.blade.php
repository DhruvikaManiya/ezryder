@extends('layouts.ecommerce')


@section('content')
    <div class="main-container no-padding navStyle groceryStoresHome" id="addBankDetails">
        <article id="top-nav">
            <div class="reviewBackButton" onclick="history.back();">
                <img src="{{ asset('asset/images/loginScreen/leftArrow.png') }}" alt="" />
                <p>Home</p>
            </div>
            <p>
                <span>{{ cartCount() }}</span>
                <img src="{{ asset('asset/images/homeScreen/shoppingBag.png') }}" alt="" />
            </p>
        </article>
        <h1 class="header1">Grocery Stores near you</h1>
        <article class="searchbar-1" onclick=" window.location ='{{ route('ecommerce.seach') }}'">
            <img src="{{ asset('asset/images/common/search.png') }}" alt="" />
            <input type="text" placeholder="Find a store or product" readonly />
        </article>

        <article class="header2">
            <h3>Popular Stores</h3>
            <p onclick="window.location =' {{ route('ecommerce.storelist') }}'">View All</p>
        </article>

        <article id="stores">
            @foreach ($data['stores'] as $store)
                <a href="{{ route('ecommerce.store.detail', $store->id) }}" class="store">
                    <img src="{{ asset($store->logo) }}" alt="" />
                    <p>{{ $store->name }}</p>
                </a>
            @endforeach
        </article>

        <article class="header2">
            <h3>Browse By Categories</h3>
            {{-- <p>View All</p> --}}
        </article>

        <article class="categories">

            @foreach ($data['categories'] as $category)
                <div class="category" onclick="window.location = '{{ route('ecommerce.storelist', $category->id) }}'">
                    <img src="{{ asset($category->image) }}" alt="" />
                    <article class="desc">
                        <p class="name">{{ $category->name }}</p>
                    </article>
                </div>
            @endforeach
        </article>

        <article class="header2">
            <h3>Popular Products</h3>
            {{-- <p>View All</p> --}}
        </article>

        <article id="stores">
            @foreach ($data['products'] as $product)
                <div class="store"
                    onclick=" window.location = ' {{ route('ecommerce.store.detail', $product->store->id) }}' ">
                    <img src="{{ asset($product->p_image) }}" width="120px" alt="" />
                    <p>{{ $product->name }}</p>
                </div>
            @endforeach

        </article>
        @include('layouts.partials.user_footer_nav')
    </div>
@endsection
