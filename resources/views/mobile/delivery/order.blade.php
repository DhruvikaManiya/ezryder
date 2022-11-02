@extends('layouts.delivery_boy')
@section('content')
<div class="main-container" id="vendorListOfOrders">
      <article class="topNav">
        <h2><img src="/assets/leftArrow.png" /> Order Details</h2>
        <img src="/assets/notification.png" alt="" />
      </article>
      <article class="content-container">
        <h1 class="header2 header-color-1 padding-lr">All Orders (75) {{ Auth::id() }}</h1>
       
      <div class="items">
         @foreach ($orders as $order)
        <article class="item">
          <p class="header4"><a href="/delivery/order-detail/{{ $order->id }}"># {{ $order->id }}</a></p>
          <p class="header5">{{ $order->created_at }}</p>
          <p class="header5">{{ config('global.delivery_status')[$order->delivery_status] }}</p>
          <p class="header4">${{ $order->delivery_charges }} <img src="/pages/assets/loginScreen/rightArrow.png" alt="">
          </p>
        </article>
        @endforeach
        
        
        
      </div>
      </article>
      @include('layouts.partials.delivery_boy_footer_nav')
      
    </div>
@endsection
