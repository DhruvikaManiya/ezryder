@foreach ($products as $product)
    <div class="recomm_box main_box">
        <div class="recomm_img_box">
            <div class="card-header position-absolute d-flex justify-content-between">

                <img src="{{ asset('asset/images/green-hart.svg') }}" class="wishlist{{ $product->id }}"
                    data-id="{{ $product->id }}"
                    style="{{ $product->Wishlist->count() > 0 ? 'display:none!important' : '' }}" id="wishlist">


                <img src="{{ asset('asset/images/heart.png') }}"
                    class="wishlistRemove{{ $product->id }}"data-id="{{ $product->id }}"
                    style="{{ $product->Wishlist->count() > 0 ? '' : 'display:none!important' }}" id="wishlist">

                @php
                    $prod = (($product->Sellar_price + ($product->Sellar_price * $product->admin_charge) / 100) * 100) / $product->MRP;
                    $discount = 100 - $prod;
                    //    $discount = round($discount);
                @endphp
                <div class="discount d-flex align-items-center justify-content-center">{{ $discount }}%
                </div>
            </div>
            <a href="{{ route('mobile.food.productdetails', $product->id) }}">
                {{-- <img src="{{ asset($product->p_image) }}" class="p_image" alt=""> --}}
            <img class="recomm_img p_image" src="{{ $product->p_image }}" alt="">
        </div>
        <div class="recomm_content">
            <div class="food_rate">
                <h6 class="food_name">{{ $product->name }}</h6>
                <p class="rate"><del>${{ $product->MRP }}</del>
                    ${{ $product->Sellar_price + ($product->Sellar_price * $product->admin_charge) / 100 }}</p>
            </div>
            <div class="recomm_text">
                <p class="rating"> 4.5 <span>(29)</span></p>
                @if ($product->status == 2)
                @else
                    <div class="add-cart d-flex align-items-center justify-content-between addCart{{ $product->id }}"
                        id="addCart" data-id="{{ $product->id }}"
                        style="{{ $product->cart->count() > 0 ? 'display:none!important' : '' }}">
                        <span class="plus-icon"><img src="{{ asset('asset/images/plus.svg') }}"></span>
                        <span>Add</span>
                    </div>
                    <div class="add-cart d-flex align-items-center justify-content-between "
                        onclick="window.location='{{ route('mobile.food.cart') }}'"
                        style="{{ $product->cart->count() > 0 ? '' : 'display:none!important' }}"
                        id="iscart{{ $product->id }}">
                        <span>Go to Cart </span>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endforeach
