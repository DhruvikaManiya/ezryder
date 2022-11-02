@extends('layouts.delivery_boy')

@section('content')
     <div class="main-container" id="earnings">
      <article class="topNav">
        <h2>Earnings</h2>
        <img src="/assets/notification.png" alt="" />
      </article>
      <article class="content-container padding-lr">
        <article class="balance-card box-type2">
          <img src="/assets/walletBig.png" alt="" />
          <h1 class="h1-type1">$30.89</h1>
          <button class="btn-type1 header3">Withdraw to bank</button>
        </article>
        <article class="withdrawal-history">
          <h1 class="header2">Withdrawal History</h1>
          <div class="withdrawal-box box-type2">
            <p class="number  header4"># 12342434</p>
            <p class="date header5">12-10-2022</p>
            <p class="amount  header4">$300.89</p>
          </div>
          <div class="withdrawal-box box-type2">
            <p class="number  header4"># 12342434</p>
            <p class="date header5">12-10-2022</p>
            <p class="amount  header4">$300.89</p>
          </div>
          <div class="withdrawal-box box-type2">
            <p class="number  header4"># 12342434</p>
            <p class="date header5">12-10-2022</p>
            <p class="amount  header4">$300.89</p>
          </div>
          <div class="withdrawal-box box-type2">
            <p class="number  header4"># 12342434</p>
            <p class="date header5">12-10-2022</p>
            <p class="amount  header4">$300.89</p>
          </div>
        </article>
      </article>
      @include('layouts.partials.delivery_boy_footer_nav')
    </div>
@endsection
