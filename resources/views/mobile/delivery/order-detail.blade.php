@extends('layouts.users_app_products')

@section('content')

    <div
      class="main-container no-padding navStyle orderHistory"
      id="addBankDetails"
    >
      <article id="top-nav">
        <div class="reviewBackButton">
        <a class="back-arrow-btn" href="/delivery/order">
          <img src="{{ asset('asset/images/back_arrow.svg') }}" alt="" />
          </a>
          <p>Order #{{ $order->id }}</p>
        </div>
        <p>
          <span>{{ cartCount() }}</span>
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
            <article>
              <p>Delivery Chargges</p>
              <p class="value">${{ $order->delivery_charges }}</p>
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

        <div class="address">
          <h1>Pickup Address</h1>
          <p>Delivered</p>
        </div>

        <div class="address">
          <h1>Drop Location</h1>
          <p>Delivered</p>
        </div>

        
        

        @if( $order->delivery_status == 1 )
          
          <a href="/delivery/update_order_status/{{ $order->id }}/2">Accept</a>

        @endif

        @if( $order->delivery_status == 2 )
          
          Order will be ready for the pickup shortly

        @endif

        @if( $order->delivery_status == 3 )
          
          <a href="/delivery/update_order_status/{{ $order->id }}/4">Pickup Done</a>

        @endif

        @if( $order->delivery_status == 4 )
          
          <a href="/delivery/update_order_status/{{ $order->id }}/5">Delivery Done</a>

        @endif




        
       
       


      </article>
    </div>

@endsection



