<section class="nav-wrapper">
    <div class="bottomNav">
        <article>
            <a href="{{ route('mobile.dashboard') }}">
                <img src="{{ asset('asset/images/Reviews/home.png') }}" alt="">
                <p>Home</p>
            </a>
        </article>

        <article class="color-change">
            <a href="{{route("ecommerce.favourite")}}">
                <img src="{{ asset('asset/images/heart_teal.svg') }}" alt="">
                <p>Favourite</p>
            </a>
        </article>


        <article>
            <a href="{{ route('ecommerce.user-orders') }}">
                <img src="{{ asset('asset/images/Reviews/list.png') }}" alt="">
                <p>Orders</p>
            </a>
        </article>



        <article>
            <a href="{{ route('ecommerce.profile') }}">
                <img src="{{ asset('asset/images/Reviews/user.png') }}" alt="" />
                <p>Account</p>
            </a>
        </article>
    </div>
</section>
