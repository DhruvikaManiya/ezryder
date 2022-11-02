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
.btn {
    height: 56px;
    background: #008080;
    box-shadow: 0px 8px 16px -4px rgb(0 128 128 / 50%);
    border-radius: 12px;
    border-color: transparent;
    font-weight: 800;
    font-size: 20px;
    line-height: 25px;
    text-align: center;
    color: #FFFFFF;
    text-shadow: 0px 1px 2px rgb(0 128 128 / 25%);
    display: grid;
    align-items: center;

    }
    .address a {
    display: block;
    margin-bottom: 10px;
    color: #3d8181;
}
.address a img {
    width: 17px;
    margin-left: 5px;
}

</style>

<div class="main-container no-padding navStyle orderHistory" id="addBankDetails">
      <article id="top-nav">
        <div class="reviewBackButton">
          <img src="/pages/assets/loginScreen/leftArrow.png" alt="">
          <p>Cart</p>
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
             
                <p class="value">${{$price}}</p>
                <div class="add-cart-wrap cartbtn{{$cart->product->id}}" > 
            		
		              <div class="add">
		                <span class="minus" productId="{{$cart->product->id}}">-</span>
		                <input type="text" id="qty{{$cart->product->id}}" disabled class="qty" value="{{$cart->quantity}}">
		                <span class="plus" productId="{{$cart->product->id}}">+</span>
		              </div>
          			</div>
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


          <div class="address">
            <a href="{{route('address.change')}}">Change Address<img src="{{asset('asset/images/edit.png')}}">

            </a>
            {{$address->full_address}}
          </div>
      

       
          @if($address)
          <a class="btn" href="{{route('ecommerce.cart.checkout')}}">CheckOut</a>

          @else
          <a class="btn" href="{{route('address.add')}}">Add Address</a>
          @endif


 <!-- <div class="btn-container">
          <button >Cash on delivery</button>
          <button id="btn2">Pay online</button>
        </div> -->
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
                  window.location.href="";
                 
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
 window.location.href="";
              }
          });
  });


</script>

@endsection