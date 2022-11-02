@extends('layouts.delivery_boy')


@section('content')
    <div class="main-container" id="registerFinal">
      <article class="topNav">
        
          <h2 onclick="location.href='/delivery'"><img src="{{ asset('asset/images/back_arrow.svg') }}" /> Register</h2>
        
        
        
      </article>
      <h1 class="h1-type1 padding-lr">Delivery & </h1>
      <h1 class="h1-type1 padding-lr">Earn Money</h1>
      <!-- <form class="padding-lr form-type1"> -->
        <form class="padding-lr form-type1" action="{{ route('mobile.delivery.registerStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
        <article class="input-label-container1">
          <label for="name" class="label-type1">Your Name</label>
          <input
            type="text"
            name="name"
            id="name"
            class="input-type1"
            placeholder="Enter your name"
          />
        </article>
        <article class="input-label-container1">
          <label for="email" class="label-type1">Your Email</label>
          <input
            type="email"
            class="input-type1"
            name="email"
            id="email"
            placeholder="Enter your email"
          />
        </article>
        <article class="input-label-container1">
          <label for="password" class="label-type1">Password</label>
          <input
            type="password"
            name="password"
            class="input-type1"
            id="password"
            placeholder="Enter your password"
          />
        </article>
        <article class="input-label-container1">
          <label for="repeatPassword" class="label-type1">Repeat Password</label>
          <input
            type="password"
            name="confirm_password"
            class="input-type1"
            id="repeatPassword"
            placeholder="Enter your password"
          />
        </article>
        <article class="input-label-container1">
          <label for="city" class="label-type1">Select City</label>
          <select name="city" id="city" class="select-type1">
            <option value="">Select city type</option>
            <option value="ontorio">Ontorio</option>
          </select>
        </article>
        <button class="btn-type1">
          <p>Register</p>
          <img src="/assets/rightArrow.png" alt="" />
        </button>
      </form>
      <article class="padding-lr">
        <p class="forgotPassword">Already have an account?</p>
        <button onclick="location.href='/delivery'" class="btn-type1 btn-color-lightGreen padding-lr">
          <p>Login</p>
          <img src="/assets/rightArrow.png" alt="" />
        </button>
      </article>
    </div>
@endsection
