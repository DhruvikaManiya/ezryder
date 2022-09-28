<header class="top_header align-item-center">
    <div class="container">
        <div class="store_header">
            <div class="store">
                <img class="location_icon" src="{{asset('asset/images/Arrow-left.svg')}}" alt="" onclick="history.back()">
                <div class="store_det">
                    <h1 class="store_name">@yield('header_title')</h1>
                </div>
            </div>
            <div class="store_cart">
                @if(Route::currentRouteName() != 'mobile.food.foodcart')
                    <img class="search_icon" src="{{asset('asset/images/Group 185.svg')}}" alt="">
                    <img class="cart_icon" src="{{asset('asset/images/clarity_shopping-cart.svg')}}" alt="">
                @endif
            </div>
        </div>
    </div>
</header>
