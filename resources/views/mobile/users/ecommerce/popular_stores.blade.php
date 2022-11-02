@extends('layouts.ecommerce')


@section('content')
    <div
      class="main-container no-padding navStyle groceryStoresPopular"
      id="addBankDetails"
    >
      <article id="top-nav">
        <div class="reviewBackButton">
          <img src="/pages/assets/loginScreen/leftArrow.png" alt="" />
          <p>Bakery</p>
        </div>
        <p>
          <span>{{ cartCount() }}</span>
          <img src="/pages/assets/homeScreen/shoppingBag.png" alt="" />
        </p>
      </article>

      <h1 class="header1">Popular Store near you</h1>

      <article class="searchbar-1">
        <img src="/pages/assets/common/search.png" alt="" />
        <input
          type="text"
          name="search"
          id="search"
          placeholder="Find a store or product"
        />
      </article>

      <article class="stores">
        <div class="store">
          <img src="/pages/assets/groceryStoresHome/img1.png" alt="" />
          <section class="desc">
            <p class="name">Zellers Store Closing</p>
            <div>
              <img src="/pages/assets/groceryStoresPopular/chart.png" alt="" />
              <p>Open Today: 8 AM - 6 PM</p>
            </div>
            <div>
              <img
                src="/pages/assets/groceryStoresPopular/location.png"
                alt=""
              />
              <p>Parkowa 15 Street 83-7555 Sopot, ontorial Canada</p>
            </div>
          </section>
        </div>
        <div class="store">
          <img src="/pages/assets/groceryStoresHome/img1.png" alt="" />
          <section class="desc">
            <p class="name">Zellers Store Closing</p>
            <div>
              <img src="/pages/assets/groceryStoresPopular/chart.png" alt="" />
              <p>Open Today: 8 AM - 6 PM</p>
            </div>
            <div>
              <img
                src="/pages/assets/groceryStoresPopular/location.png"
                alt=""
              />
              <p>Parkowa 15 Street 83-7555 Sopot, ontorial Canada</p>
            </div>
          </section>
        </div>
        <div class="store">
          <img src="/pages/assets/groceryStoresHome/img1.png" alt="" />
          <section class="desc">
            <p class="name">Zellers Store Closing</p>
            <div>
              <img src="/pages/assets/groceryStoresPopular/chart.png" alt="" />
              <p>Open Today: 8 AM - 6 PM</p>
            </div>
            <div>
              <img
                src="/pages/assets/groceryStoresPopular/location.png"
                alt=""
              />
              <p>Parkowa 15 Street 83-7555 Sopot, ontorial Canada</p>
            </div>
          </section>
        </div>
      </article>

      <section class="nav-wrapper">
        <div class="bottomNav">
          <article>
            <img src="/pages/assets/Reviews/home.png" alt="" />
            <p>Home</p>
          </article>

          <article>
            <img src="/pages/assets/Reviews/list.png" alt="" />
            <p>Orders</p>
          </article>

          <article class="color-change">
            <img src="/pages/assets/Reviews/wallet.png" alt="" />
            <p>Earnings</p>
          </article>

          <article>
            <img src="/pages/assets/Reviews/user.png" alt="" />
            <p>Account</p>
          </article>
        </div>
      </section>
    </div>
@endsection