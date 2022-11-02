@extends('layouts.ecommerce')
@section('content')
    <style type="text/css">
        .groceryStorePage .bgImage {
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

        .qty {
            width: 20px;
            border: none;
            text-align: center;
        }

        .add-cart-wrap {
            display: none;
        }

        .d-none {
            display: none;
        }

        .d-block {
            display: block;
        }
        .navStyle #top-nav{
            color: #5D8080;;
        }
        .groceryStorePage #top-nav img {
            filter: none;
        }
    </style>

    <div class="main-container no-padding navStyle storesFilters groceryStorePage" id="addBankDetails">
    
        <article id="top-nav">
            <div class="reviewBackButton" onclick="history.back();">
                <img src="{{asset('asset/images/loginScreen/leftArrow.png')}}}" alt="">
                <p>Favourite</p>
            </div>
            <p>
                <span>{{ cartCount() }}</span>
                <img src="{{asset('asset/images/homeScreen/shoppingBag.png')}}}" alt="">
            </p>
        </article>
        <div class="items">
      
            @foreach ($products as $product)
                @php
                    $price = getDisplayPrice($product->admin_charge, $product->seller_price);
                    $checkCart = checkCartInProduct($product->id);
                @endphp
                <article class="item" style="margin-bottom:20px">
                    <img src="{{ asset($product->p_image) }}" alt="" width="100px" />
                    <div class="desc">
                        <p class="name"
                            onclick="window.location='{{ route('ecommerce.product.details', $product->id) }}'">
                            {{ $product->name }}</p>
                        <p class="about">{{ $product->description }}</p>
                        <p class="price"><span>${{ $product->mrp_price }}</span> ${{ $price }}</p>
                        <p class="discount">{{ getofferPersentage($price, $product->mrp_price) }} % off</p>
                    </div>
                    <div class="add_cart addone{{ $product->id }} " productId="{{ $product->id }}"
                        style="{{ $checkCart != 0 ? 'display: none;' : '' }}">
                        <a>Add</a>
                    </div>
                    <div class="add-cart-wrap cartbtn{{ $product->id }}"
                        style="{{ $checkCart != 0 ? 'display: block;' : '' }}">
                        <div class="add">
                            <span class="minus" productId="{{ $product->id }}">-</span>
                            <input type="text" id="qty{{ $product->id }}" disabled class="qty"
                                value="{{ $checkCart != 0 ? $checkCart : '1' }}">
                            <span class="plus" productId="{{ $product->id }}">+</span>
                        </div>
                    </div>
                </article>
            @endforeach

        </div>
{{-- 
        <section class="nav-wrapper">
            <div id="viewcart"
                style="{{ cartCount() != 0 && checkStore($store->id) != 0 ? 'display: block;' : 'display: none;' }}">
                <div class="total-items">
                    <article class="count">
                        <img src="/pages/assets/common/bag.png" alt="" />
                        <p> <span id="cartcount2">{{ cartCount() }}</span> Items</p>
                    </article>
                    <article class="next">
                        <a href="{{ route('ecommerce.cart.view') }}" style="color: white;">
                            View Cart <img src="{{ asset('images/assets/loginScreen/rightArrow.png') }}" alt="" />
                        </a>
                    </article>
                </div>
            </div>
--}}

            @include('layouts.partials.user_footer_nav')
        </section> 
    </div>

    <script type="text/javascript">
        $('.add_cart').click(function() {

            var productId = $(this).attr('productId');
            var pro = productId;
            $.ajax({
                url: "{{ route('ecommerce.cart.add') }}",
                type: "GET",
                data: {
                    productId: productId
                },
                success: function(data) {
                    console.log(data.count);
                    $('#cartcount').text(data.count);
                    $('#cartcount2').text(data.count);

                    $('.addone' + pro).css('display', 'none');
                    $('.cartbtn' + pro).css('display', 'block');
                    $('#viewcart').css('display', 'block');

                }
            });
        });

        $('.minus').click(function() {

            var productId = $(this).attr('productId');
            var pro = productId;
            $.ajax({
                url: "{{ route('ecommerce.cart.decrese') }}",
                type: "GET",
                data: {
                    productId: productId
                },
                success: function(data) {


                    if (data.qty == 0) {
                        $('.addone' + pro).css('display', 'block');
                        $('.cartbtn' + pro).css('display', 'none');
                        if (data.count == 0) {
                            $('#viewcart').css('display', 'none');

                        }
                        $('#cartcount').text(data.count);
                    } else {
                        $('#qty' + pro).val(data.qty);
                        $('#cartcount').text(data.count);
                        $('#cartcount2').text(data.count);
                    }

                }
            });
        });

        $('.plus').click(function() {

            var productId = $(this).attr('productId');
            var pro = productId;
            $.ajax({
                url: "{{ route('ecommerce.cart.increse') }}",
                type: "GET",
                data: {
                    productId: productId
                },
                success: function(data) {
                    $('#qty' + pro).val(data);

                }
            });
        });
    </script>
@endsection
