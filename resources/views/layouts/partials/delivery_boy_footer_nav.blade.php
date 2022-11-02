<article class="bottomNav">
        
  <article onclick="location.href='{{ route('delivery.home') }}'" class="selected">
    <img src="{{ asset('asset/images/home.png') }}" alt="" />
    <p>Home</p>
  </article>


  <article onclick="location.href='/delivery/order'"> 
    <img src="{{ asset('asset/images/bars.png') }}" alt="" />
    <p>Orders</p>
  </article>
  <article onclick="location.href='/delivery/wallet'" class="color-change">
    <img src="{{ asset('asset/images/wallet.png') }}" alt="" />
    <p>Earnings</p>
  </article>
  <article onclick="location.href='/delivery/account'">
    <img src="{{ asset('asset/images/account.png') }}" alt="" />
    <p>Account</p>
  </article>
</article>