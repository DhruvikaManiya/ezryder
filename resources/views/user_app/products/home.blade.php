@extends('layouts.users_app_products')


@section('content')



    <div
      class="main-container no-padding navStyle groceryStoresHome"
      id="addBankDetails"
    >
      <article id="top-nav">
        <div class="reviewBackButton">
          <img src="/pages/assets/loginScreen/leftArrow.png" alt="" />
          <p>Pushp complex, vastral</p>
        </div>
        <p>
          <span>3</span>
          <img src="/pages/assets/homeScreen/shoppingBag.png" alt="" />
        </p>
      </article>
      <h1 class="header1">Grocery Stores near you</h1>
      <article class="searchbar-1">
        <img src="/pages/assets/common/search.png" alt="" />
        <input
          type="text"
          name="search"
          id="search"
          placeholder="Find a store or product"
        />
      </article>

      <article class="header2">
        <h3>Popular Stores</h3>
        <p>View All</p>
      </article>

      <article id="stores">
        <div class="store">
          <img src="{{ asset('asset/images/groceryStoresHome/img1.png') }}" alt="" />
          <p>Zellers Store Closing</p>
        </div>
        <div class="store">
          <img src="{{ asset('asset/images/groceryStoresHome/img2.png') }}" alt="" />
          <p>Disney</p>
        </div>
        <div class="store">
          <img src="{{ asset('asset/images/groceryStoresHome/img3.png') }}" alt="" />
          <p>Bauget</p>
        </div>
      </article>

      <article class="header2">
        <h3>Browse By Categories</h3>
        <p>View All</p>
      </article>

      <article class="categories">
        <div class="category">
          <img src="{{ asset('asset/images/groceryStoresHome/img7.png') }}" alt="" />
          <article class="desc">
            <p class="name">Bakery</p>
            <p class="item">2 items</p>
          </article>
        </div>
        <div class="category">
          <img src="{{ asset('asset/images/groceryStoresHome/img8.png') }}" alt="" />
          <article class="desc">
            <p class="name">Fruits</p>
            <p class="item">26 items</p>
          </article>
        </div>
        <div class="category">
          <img src="{{ asset('asset/images/groceryStoresHome/img9.png') }}" alt="" />
          <article class="desc">
            <p class="name">Vegetables</p>
            <p class="item">50 items</p>
          </article>
        </div>
        <div class="category">
          <img src="{{ asset('asset/images/groceryStoresHome/img7.png') }}" alt="" />
          <article class="desc">
            <p class="name">Bakery</p>
            <p class="item">2 items</p>
          </article>
        </div>
        <div class="category">
          <img src="{{ asset('asset/images/groceryStoresHome/img8.png') }}" alt="" />
          <article class="desc">
            <p class="name">Fruits</p>
            <p class="item">26 items</p>
          </article>
        </div>
        <div class="category">
          <img src="{{ asset('asset/images/groceryStoresHome/img9.png') }}" alt="" />
          <article class="desc">
            <p class="name">Vegetables</p>
            <p class="item">50 items</p>
          </article>
        </div>
      </article>

      <article class="header2">
        <h3>Popular Products</h3>
        <p>View All</p>
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
    </div>

    @include('layouts.partials.footer_nav')
@endsection
