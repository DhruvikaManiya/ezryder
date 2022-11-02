@extends('layouts.ecommerce')
@section('content')
<style type="text/css">
  .groceryStorePage .bgImage{
        height: 200px;
        background: #145280;
  }
  
  .add_cart {
      background: #145280;
      color: white;
      display: block;
      height: 30px;
      padding: 1px 10px;
      display: flex;
      align-items: center;
      border-radius: 5px;
}
.add {
    border: 2px solid #145280;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-radius: 6px;
    
}
span.minus {
    font-size: 18px;
    /*background: red;*/
    width: 25px;
    text-align: center;
}
span.plus {
    font-size: 18px;
    /*background: red;*/
    width: 25px;
    text-align: center;
}
.qty{
  width: 20px;
  border: none;
  text-align: center;
}
.add-cart-wrap{
  display: none;
}
.d-none{
  display: none;
}
.d-block{
  display: block;
}

</style>

<div class="main-container no-padding navStyle orderHistory" id="addBankDetails">
      <article id="top-nav">
        <div class="reviewBackButton">
          <img src="/pages/assets/loginScreen/leftArrow.png" alt="">
          <p>Checkout</p>
        </div>
        <p>
          <span id="cartcount">{{cartCount()}}</span>
          <img src="/pages/assets/homeScreen/shoppingBag.png" alt="">
        </p>
      </article>
      <article class="box">
        <div class="items">
          <div class="details">
          	@php
          		$subtotal = 0;
          	@endphp
          	@foreach($carts as $cart)
          		@php
            	 $price = getDisplayPrice($cart->product->admin_charge,$cart->product->seller_price);
            	 $item_total = $price * $cart->quantity;
            	 $subtotal = $item_total + $subtotal;
         	 @endphp
            <article>
              <div>
                <img src="{{asset($cart->product->p_image)}}" alt="" style="width:70px">
                <p>{{$cart->product->name}}</p>
              </div>
              <div>
             
                <p class="value">${{$price}}*{{$cart->quantity}}</p>
           
              </div>
            </article>
            @endforeach
           
            <hr>
            <article class="total">
              <p>Item Total</p>
              <p class="value">${{$subtotal}}</p>
            </article>
          </div>
        </div>
        <div class="billSummary">
          <h1>Bill Summary</h1>
          <div class="details">
            <article class="itemTotal">
              <p>Item total | <span class="blue-underline">View Details </span></p>
              <p class="value">${{$subtotal}}</p>
            </article>
            <article>
              <p class="charge">
                Delivery charge 
                <img src="/pages/assets/common/info.png" alt="">
              </p>
              <p class="value">${{round($setting->delivery_per_km_rate*$kmt)}}</p>
            </article>

            <article>
              <p>Govt. Taxes</p>
              <p class="value">${{ $subtotal*$setting->gov_tax_in_percent/100 }}</p>
            </article>
            <article>
              <p>Packaging Charges</p>
              <p class="value">${{$setting->packaging_charges}}</p>
            </article>
           
            <hr>
            <article class="total">
              <p>Grand Total</p>
              <p class="value">${{$subtotal+round($setting->delivery_per_km_rate*$kmt)+ $subtotal*$setting->gov_tax_in_percent/100 +$setting->packaging_charges}}</p>
            </article>
          </div>
        </div>

        <!-- <div class="instructions">
          <h1>Add delivery instructions</h1>
          <p>Help your delivery partner to reach you faster</p>
          <textarea name="message" id="message" cols="30" rows="5" placeholder="Enter your message"></textarea>
        </div> -->

       <!--  <div class="address">
          <h1>Delivery Address <span class="blue-underline">Change</span></h1>
          <p>A 510, Titanium city center, Anand nagar road</p>
        </div> -->
        <form  action="{{route('ecommerce.order-store')}}" method="post">
        	
        	@csrf
        	<input type="text" value="{{Auth::user()->id}}" name="user_id">
        	<input type="text" value="{{$store_id}}" name="store_id">
        	<input type="text" value="{{$orderdata['total_seller_price']}}" name="seller_total_price">
        	<input type="text" value="{{$orderdata['seller_govt_taxes']}}" name="seller_govt_taxes">
        	<input type="text" value="{{$orderdata['seller_total_with_govt_taxes']}}" name="seller_total_with_govt_taxes">
        	<input type="text" value="{{$subtotal - $orderdata['total_seller_price'] }}" name="admin_total_charges">
        	<input type="text" value="{{$subtotal}}" name="net_total_price_before_tax">
        	<input type="text" value="{{ $subtotal*$setting->gov_tax_in_percent/100 }}" name="govt_taxes">
        	<input type="text" value="{{ $subtotal + $subtotal*$setting->gov_tax_in_percent/100 }}" name="net_total_price_after_tax">
        	<input type="text" value="{{round($setting->delivery_per_km_rate*$kmt)}}" name="delivery_charges">
        	<input type="text" value="{{$subtotal+round($setting->delivery_per_km_rate*$kmt)+ $subtotal*$setting->gov_tax_in_percent/100 +$setting->packaging_charges}}" name="net_total">
        	<input type="text" name="packaging_charges" value="{{$setting->packaging_charges}}">
        	<input type="text" name="delivery_distance_kms" value="{{$kmt}}">
        	<input type="text" name="delivery_adress_mark" value="{{$address->mark}}">
        	<input type="text" name="delivery_address" value="{{$address->full_address}}">
        	<input type="text" name="delivery_lat" value="{{$address->lat}}">
        	<input type="text" name="delivery_long" value="{{$address->long}}">


        	<input id="btn1" type="submit" name="" value="Cash on delivery">
        </form>
       

 <div class="btn-container">
          <button id="btn2">Pay online</button>
        </div>
      </article>
    </div>

<script type="text/javascript">
  $('.add_cart').click(function(){

    var productId = $(this).attr('productId');
    var pro = productId;
        $.ajax({
              url: "{{ route('ecommerce.cart.add') }}",
              type: "GET",
              data: {
                  productId: productId
              },
              success: function(data) {

                  $('.addone'+pro).css('display','none');
                  $('.cartbtn'+pro).css('display','block');
                  $('#viewcart').css('display','block');
                  $('#cartcount').text(data.count);
              }
          });
  });

  $('.minus').click(function(){

    var productId = $(this).attr('productId');
    var pro = productId;
        $.ajax({
              url: "{{ route('ecommerce.cart.decrese') }}",
              type: "GET",
              data: {
                  productId: productId
              },
              success: function(data) {
                if(data.qty == 0){
                  $('.addone'+pro).css('display','block');
                  $('.cartbtn'+pro).css('display','none');
                  if(data.count == 0){
                    $('#viewcart').css('display','none');
                     
                  }
                  $('#cartcount').text(data.count);
                }else{
                   $('#qty'+pro).val(data.qty);
                   $('#cartcount').text(data.count);
                }
                 
              }
          });
  });

  $('.plus').click(function(){

    var productId = $(this).attr('productId');
    var pro = productId;
        $.ajax({
              url: "{{ route('ecommerce.cart.increse') }}",
              type: "GET",
              data: {
                  productId: productId
              },
              success: function(data) {
                  $('#qty'+pro).val(data);

              }
          });
  });


</script>

@endsection