@extends('layouts.users_app_products')

@section('content')
    <div class="main-container no-padding navStyle storeAccount" id="holidays">
      <article id="top-nav">
        <div class="reviewBackButton">
          <img src="{{ asset('asset/images/storeAccount/img1.png') }}" alt="">
        </div>
        <p>
          <span>3</span>
          <img src="{{ asset('asset/images/homeScreen/shoppingBag.png') }}" alt="" />
        </p>
      </article>
      <h1>Zellers Store Closing</h1>
      
      <article class="holiday-list">
        @if(Auth::user()->store == '' )
        <a href="{{route('vendor.add_store')}}">
        <div class="holiday">
          <p class="date">Add Store Details</p>
          <img src="{{ asset('asset/images/loginScreen/rightArrow.png') }}" alt="">
        </div>
        </a>
        @else
        <a href="{{route('vendor.store_list')}}">
        <div class="holiday">
          <p class="date">Store Details</p>
          <img src="{{ asset('asset/images/loginScreen/rightArrow.png') }}" alt="">
        </div>
        </a>
        @endif
        
        <a href="/vendor/store-time">
        <div class="holiday">
          <p class="date">Store Timings</p>
          <img src="{{ asset('asset/images/loginScreen/rightArrow.png') }}" alt="">
        </div>
      </a>
        <a href="/vendor/products">
        <div class="holiday">
          
          <p class="date">Products</p>
          <img src="{{ asset('asset/images/loginScreen/rightArrow.png') }}" alt="">
         
        </div>
        </a>
        <a href="/vendor/holiday_list">
        <div class="holiday">
          <p class="date">Holidays</p>
          <img src="{{ asset('asset/images/loginScreen/rightArrow.png') }}" alt="">
        </div>
      </a>
      <a href="/vendor/bankdetail">
        <div class="holiday">
          <p class="date">Bank Details</p>
          <img src="{{ asset('asset/images/loginScreen/rightArrow.png') }}" alt="">
        </div>
      </a>
      <a href="/vendor/review">
        <div class="holiday">
          <p class="date">Reviews</p>
          <img src="{{ asset('asset/images/loginScreen/rightArrow.png') }}" alt="">
        </div>
      </a>
      <a href="{{route('vendor.logout')}}">
        <div class="holiday">
          <p class="date">Logout</p>
          <img src="{{ asset('asset/images/storeAccount/off.png') }}" alt="">
        </div>
      </article>
    </a>

     @include('layouts.partials.vendor_footer_nav')
    </div>

@endsection
