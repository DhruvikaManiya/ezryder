@extends('layouts.ecommerce')

@section('content')
    <div class="main-container navStyle addStore no-padding" id="productDetails">
        <div id="img-div" style="background-image: url({{ asset($product->p_image) }});"></div>
        <article id="top-nav">
            <div class="reviewBackButton" onclick="history.back();">
                <img src="{{ asset('asset/images/loginScreen/leftArrow.png') }}" alt="" />
                <p>Product</p>
            </div>
            <p>
                @if($product->Wishlist == null)
                <img class="heart-img" src="{{ asset('asset/images/green-hart.svg') }}" alt="" id="add-wishlist" />
                @endif
                <span>{{ cartCount() }}</span>
                <img src="{{ asset('asset/images/homeScreen/shoppingBag.png') }}" alt="" />
            </p>
        </article>

        <section id="middle-section">
            <div class="header">
                <h1>{{ $product->name }}</h1>
                {{-- <img src="{{ asset('asset/images/productDetails/radio.png') }}" alt="" /> --}}
            </div>

            <p class="about">
                {{ $product->description }}
            </p>

            <div class="category">
                <p>Catgory: {{ $product->category->name }}</p>
                <p>Catgory: {{ $product->Subcategory->name }}</p>
                <p>Units: {{ $product->units }} {{ $product->measurement }}</p>
                <p>Vendor Price ${{ $product->seller_price }}</p>
            </div>

            <button id="edit">
                <p>Add to Cart</p>
            </button>

        </section>

        @include('layouts.partials.user_footer_nav')
    </div>
@endsection

@section('js')
    <script>
        $('#add-wishlist').click(function() {
            console.log('clicked');
            $.ajax({
                type: "get",
                url: "{{ route('ecommerce.addWishlist') }}",
                data: {
                    product_id: {{ $product->id }}
                },
                success: function(response) {
                    console.log(response);
                    $('#add-wishlist').remove();
                }
            });
        });
    </script>
@endsection
