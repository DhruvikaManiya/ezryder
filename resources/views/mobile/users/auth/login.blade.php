@extends('layouts.ecommerce')


@section('content')
    <div class="main-container auth" id="loginFinal">
      <h1>EZRYDER</h1>
      <form action="{{route('mobile.login_check')}}" method="post">
        @csrf
        <article>
          <label for="email">Your Email</label>
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Enter your email"
            value="abc@gmail.com"
          />
        </article>
        <article>
          <label for="password">Password</label>
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Enter your password"
            value="12345678"
          />
        </article>
        <input name="fcmtoken" type="text" value="<?php echo isset($_GET['fcmtoken']) ? $_GET['fcmtoken'] : ''; ?>">
        <article id="forgot-password">
          <p>Forgot password?</p>
        </article>
        <button id="login">
          <p>Log in</p>
          <span>
            <img src="{{ asset('asset/images/whitearrow.png') }}" alt="logo" class="logo_img">
            </span>
        </button>
      </form>
      <article id="register-box">
        <p id="no-account">Don't have an account?</p>
        <button id="register">
          <p><a class="btn-secondary" href="{{ route('mobile.register') }}" value="Register" class="login_btn">Register</a></p>
          <span><img src="{{ asset('asset/images/dark_right_arrow.png') }}" alt="logo" class="logo_img"></span>
        </button>
      </article>
    </div>
@endsection
