@extends('layouts.delivery_boy')


@section('content')
   <div class="main-container" id="account">
      <img src="/assets/profile1.png" id="profileImg" alt="" />
      <article class="topNav">
        <h2></h2>
        <img src="/assets/bell2.png" alt="" />
      </article>
      <article class="content-container padding-lr">
        <form class="form-type1" method="POST">
          <article class="input-label-container1">
            <label for="name" class="label-type1">Full Name</label>
            <input
              type="text"
              name="name"
              id="name"
              class="input-type1"
              placeholder="Reza Blazer"
            />
          </article>
           <article class="input-label-container1">
          <label for="frontDoc" class="label-type1">Upload Profile Picture</label>
          <input
            type="file"
            name="frontDoc"
            id="frontDoc"
            class="input-type1"
            placeholder="Upload"
          />
        </article>
          <article class="input-label-container1">
            <label for="email" class="label-type1">Mobile Number</label>
            <input
              type="email"
              class="input-type1"
              name="email"
              id="email"
              placeholder="9586979730"
            />
          </article>
          <article class="input-label-container1">
            <label for="password" class="label-type1">Email</label>
            <input
              type="password"
              name="password"
              class="input-type1"
              id="password"
              placeholder="bries@bmcoder.com"
            />
          </article>
          <article class="input-label-container1">
            <label for="repeatPassword" class="label-type1">Address</label>
            <input
              type="password"
              name="password"
              class="input-type1"
              id="repeatPassword"
              placeholder="D/239, Laxmikrupa Arbudanagar, "
            />
          </article>
          <article class="input-label-container1">
            <label for="city" class="label-type1"
              >Emergancy Contact Nmber</label
            >
            <input
              type="number"
              name="number"
              class="input-type1"
              id="phoneNumber"
              placeholder="9586979730"
            />
          </article>
          <button class="btn-type2 btn-darkBlue">
            <p>Save</p>
          </button>
        </form>
      </article>
            @include('layouts.partials.delivery_boy_footer_nav')

    </div>
@endsection
