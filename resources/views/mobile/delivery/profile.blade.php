@extends('layouts.delivery_boy')


@section('content')

<div class="main-container" id="account">
      <img src="{{ asset('asset/images/profile1.png') }}" id="profileImg" alt="" />
      <article class="topNav">
        <h2></h2>
        <img src="{{ asset('asset/images/bell2.png') }}" alt="" />
      </article>
      <div class="editNav">
        <img src="{{ asset('asset/images/camera.png') }}" alt="" />
        <a href="/delivery/profile_edit">
        <img src="{{ asset('asset/images/edit.png') }}" alt="" />
        </a>
      </div>
      <article class="content-container padding-lr">
        <div class="details">
          <article>
            <h3 class="header4">
              Full Name: <span class="header5">Brijesh Mishra</span>
            </h3>
          </article>
          <article>
            <h3 class="header4">
              Mobile Number: <span class="header5">9586979730</span>
            </h3>
          </article>
          <article>
            <h3 class="header4">
              Email: <span class="header5">brijesh@bmcoder.com</span>
            </h3>
          </article>
          <article>
            <h3 class="header4">
              Address:
              <span class="header5"
                >D293, laxmikrupa, Arbudanagar, odhav, Ahmedabad</span
              >
            </h3>
          </article>
          <article>
            <h3 class="header4">
              Emergancy Contact Number: <span class="header5">9586979730</span>
            </h3>
          </article>
        </div>
      </article>
      @include('layouts.partials.delivery_boy_footer_nav')
    </div>
@endsection
