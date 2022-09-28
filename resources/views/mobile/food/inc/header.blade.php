<header class="top_header">
    <div class="container">
        <div class="store_header">
            <div class="store">
                <img class="location_icon" src="{{asset('asset/images/location.svg')}}" alt="">
                <div class="store_det">
                    <h1 class="store_name">Jayjoghesvari so..</h1>
                    <p class="store_add">Arbudanagar, Mahadev</p>
                </div>
            </div>
            <div class="store_cart">
                <img class="search_icon" src="{{asset('asset/images/Group 185.svg')}}" alt="" onclick="window.location='{{ route('mobile.food.search') }}'">
                <img class="cart_icon" src="{{asset('asset/images/clarity_shopping-cart.svg')}}" alt="" onclick="window.location='{{route('mobile.food.cart')}}'">
            </div>
        </div>
    </div>
</header>
