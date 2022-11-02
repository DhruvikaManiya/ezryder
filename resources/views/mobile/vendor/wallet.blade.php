@extends('layouts.users_app_products')

@section('content')

    <div class="main-container no-padding navStyle" id="earnings">
      <article id="top-nav">
        <div class="reviewBackButton">
          <p>Earnings</p>
        </div>
        <p>
          <span>3</span>
          <img src="/pages/assets/homeScreen/shoppingBag.png" alt="" />
        </p>
      </article>

      <article class="balance-card">
        <img src="/pages/assets/Reviews/walletBig.png" alt=""/>
        <h1>$30.89</h1>
        <button>Withdraw to bank</button>
      </article>
      <article class="withdrawal-history">
        <h1>Withdrawal History</h1>
        <div class="withdrawal-box">
          <p class="number">#  12342434</p>
          <p class="date">12-10-2022</p>
          <p class="amount">$300.89</p>
        </div>
        <div class="withdrawal-box">
          <p class="number">#  12342434</p>
          <p class="date">12-10-2022</p>
          <p class="amount">$300.89</p>
        </div>
        <div class="withdrawal-box">
          <p class="number">#  12342434</p>
          <p class="date">12-10-2022</p>
          <p class="amount">$300.89</p>
        </div>
        <div class="withdrawal-box">
          <p class="number">#  12342434</p>
          <p class="date">12-10-2022</p>
          <p class="amount">$300.89</p>
        </div>
      </article>
@include('layouts.partials.vendor_footer_nav')
</div>
      

@endsection
