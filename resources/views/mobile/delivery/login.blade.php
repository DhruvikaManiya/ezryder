@extends('layouts.delivery_boy')


@section('content')
    <div class="main-container" id="registerFinal">
      <article class="topNav">
        
          <h2>Login</h2>
        
        
        
      </article>
      <h1 class="h1-type1 padding-lr">Delivery & </h1>
      <h1 class="h1-type1 padding-lr">Earn Money</h1>
      <!-- <form class="padding-lr form-type1"> -->
        <form class="padding-lr form-type1" action="{{ route('mobile.delivery.loginCheck') }}" method="post">
                    @csrf
        
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
        
        
        <button class="btn-type1">
          <p>Login</p>
          <img src="/assets/rightArrow.png" alt="" />
        </button>
      </form>
      <article class="padding-lr">
        <p class="forgotPassword">Already have an account?</p>
        <button onclick="location.href='/delivery/register'" class="btn-type1 btn-color-lightGreen padding-lr">
          <p>Register</p>
          <img src="/assets/rightArrow.png" alt="" />
        </button>
      </article>
    </div>
@endsection
