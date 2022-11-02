@extends('layouts.delivery_boy')


@section('content')
     <div class="main-container" id="ratings">
      <article class="topNav">
{{-- {{ asset('asset/images/stars.png') }} --}}
        <h2><img src="{{ asset('asset/images/leftArrow.png') }}" /> Reviews</h2>
        <img src="{{ asset('asset/images/notification.png') }}" alt="" />
      </article>
      <article class="content-container padding-lr">
        <div class="review box-type2">
          <img src="{{ asset('asset/images/review1.png') }}" alt="" />

          <div class="comment">
            <p class="header5">
              Best store and great services, they store staffs is very helpful.
            </p>
            <h4 class="header4"><img src="{{ asset('asset/images/stars.png') }}" alt=""><span>Brijesh Mishra</span></h4>
          </div>
        </div>

        <div class="review box-type2">
          <img src="{{ asset('asset/images/review2.png') }}" alt="" />

          <div class="comment">
            <p class="header5">I got my products on time and with great packing. Thanks.</p>
            <h4 class="header4"><img src="{{ asset('asset/images/stars.png') }}" alt=""><span>Ramesh Prajapati</span></h4>
          </div>
        </div>
      </article>
      {{-- <article class="bottomNav">
        <article class="selected">
          <img src="/assets/home.png" alt="" />
          <p>Home</p>
        </article>
        <article>
          <img src="/assets/bars.png" alt="" />
          <p>Orders</p>
        </article>
        <article class="color-change">
          <img src="/assets/wallet.png" alt="" />
          <p>Earnings</p>
        </article>
        <article>
          <img src="/assets/account.png" alt="" />
          <p>Account</p>
        </article>
      </article> --}}
      @include('layouts.partials.delivery_boy_footer_nav')

    </div>
@endsection
