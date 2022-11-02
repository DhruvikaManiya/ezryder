@foreach ($Product as $prod)
<div class="hot_seller_box card product-card position-relative">
    
    <div class="card-header position-absolute d-flex justify-content-between">

        <img src="{{ asset('asset/images/green-hart.svg') }}" class="wishlist{{$prod->id}}" data-id="{{ $prod->id }}"
        style="{{ $prod->Wishlist->count() > 0 ? 'display:none!important' : '' }}" id="wishlist">


        <img src="{{ asset('asset/images/heart.png') }}"  class="wishlistRemove{{$prod->id}}"data-id="{{ $prod->id }}"
        style="{{ $prod->Wishlist->count() > 0 ? '' : 'display:none!important' }}" id="wishlist">
 
        @php
        $product = ((($prod->Sellar_price + ($prod->Sellar_price * $prod->admin_charge)/100)*100) / ($prod->MRP));
        $discount = 100 - $product;
     //    $discount = round($discount);
 @endphp
<div class="discount d-flex align-items-center justify-content-center">{{$discount}}%
</div>

     </div>
    <img class="hotproduct_img" style="width: 100%;height:100px;" src="{{ $prod->p_image }}" alt="" onclick="window.location='{{route('mobile.pharma.productdetails', $prod->id)}}'">
   
    <p class="hot_product">{{ $prod->name }}</p>
    @if ($prod->quantity < 5 && $prod->quantity > 0 )

    <p class="card-text" style="color: red;">Available:{{ $prod->quantity }}</p>
    @elseif($prod->quantity == 0)

    <p class="card-text" style="color: red;">Out of Stock</p>

    {{-- @else
    <p class="card-text">Available:{{ $prod->quantity }}</p>
         --}}
    @endif
    <div class="price_box">
        <p class="price">
            <span class="light"><del>${{ $prod->MRP }}</del></span>
            <span class="dark">${{($prod->Sellar_price + ($prod->Sellar_price * $prod->admin_charge)/100)}}</span>
        </p>
        @if ($prod->quantity == 0 )
        @else
        <div class="add-cart d-flex align-items-center justify-content-between addCart{{ $prod->id }}"
            id="addCart" data-id="{{ $prod->id }}"
            style="{{ $prod->cart->count() > 0 ? 'display:none!important' : '' }}">
            <span class="plus-icon"><img src="{{ asset('asset/images/Plus.svg') }}"></span>
            <span>Add</span>
        </div>
        <div class="add-cart d-flex align-items-center justify-content-between "
            onclick="window.location='{{ route('mobile.pharma.cart') }}'"
            style="{{ $prod->cart->count() > 0 ? '' : 'display:none!important' }}"
            id="iscart{{ $prod->id }}">
            <span>Go to Cart </span>
        </div>
        @endif
        {{-- <button class="add_btn">Add</button> --}}

    </div>      
</div>
@endforeach