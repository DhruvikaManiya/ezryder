@extends('layouts.users_app_products')

@section('content')

    <div
      class="main-container no-padding navStyle orderHistory"
      id="addBankDetails"
    >
      <article id="top-nav">
        <div class="reviewBackButton">
        <a class="back-arrow-btn" href="/vendor/orders">
          <img src="{{ asset('asset/images/back_arrow.svg') }}" alt="" />
          </a>
          <p>Order #{{ $order->id }}</p>
        </div>
        <p>
          <span>3</span>
          <img src="/pages/assets/homeScreen/shoppingBag.png" alt="" />
        </p>

        
      </article>
      <article class="box">
        <div class="items">
          <div class="details">
            
              @foreach ($order_items as $item)
            <article>
              <div>
                <img src="/pages/assets/viewCart/img2.png" alt="">
                <p>{{ $item->product_id }}</p>
              </div>
              <div>
                <p class="value">${{ $item->seller_total_price }}</p>
                <p class="count">{{ $item->qty }}</p>
              </div>
            </article>
                

              @endforeach
              
             
            
            
            
            
            <hr />
            <article class="total">
              <p>Grand Total</p>
              <p class="value">${{ $order->seller_total_price }}</p>
            </article>
          </div>
        </div>
        <div class="billSummary">
          <h1>Order Summary</h1>
          <div class="details">
            <article class="itemTotal">
              <p>Item total </p>
              <p class="value">${{ $order->seller_total_price }}</p>
            </article>
            
            <article>
              <p>Govt. Taxes</p>
              <p class="value">${{ $order->seller_govt_taxes }}</p>
            </article>
            
           
           
            <hr />
            <article class="total">
              <p>Net Total</p>
              <p class="value">${{ $order->seller_total_with_govt_taxes }}</p>
            </article>
          </div>
        </div>

        

        <div class="address">
          <h1>Delivery Status</h1>
          <p>{{ config('global.delivery_status')[$order->delivery_status] }}</p>
        </div>

        @if( $order->delivery_status == 0)
          
         <a href="/vendor/update_order_status/{{ $order->id }}/1">Accept Order</a>
          <a href="/vendor/update_order_status/{{ $order->id }}/6">Reject Order</a>

        @endif

        @if( $order->delivery_status == 1 ||  $order->delivery_status == 2)
          
          <a href="/delivery/update_order_status/{{ $order->id }}/3">Ready For Pickup</a>

        @endif


       


      </article>
    </div>

@endsection


