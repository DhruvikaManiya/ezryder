@extends('layouts.ecommerce')


@section('content')
    <div class="main-container auth registerFinalValidation" id="registerFinal">
        <article id="goBack-container">
            <p><span> <img src="{{ asset('asset/images/back_arrow.svg') }}" alt="logo" class="logo_img">
                </span> Register</p>
        </article>
        <h2>Create a Free</h2>
        <h2>account</h2>
        <form action="{{ route('mobile.registerStore') }}" method="POST">
            @csrf
            <article>
                <label for="name">Your name</label>
                <input class="input  @error('name') invalid @enderror" type="text" placeholder="Enter name" name="name"
                    value="{{ old('name') }}" required>
                @error('name')
                    <article id="forgot-password">
                        <p class="invalid-msg">{{ $message }}</p>
                    </article>
                @enderror

            </article>
            <article>
                <label for="email">Your Email</label>
                <input class="input @error('email') invalid @enderror" type="email" placeholder="Enter email"
                    name="email" value="{{ old('email') }}" required>

                @error('email')
                    <article id="forgot-password">
                        <p class="invalid-msg">{{ $message }}</p>
                    </article>
                @enderror
                @if (\Session::has('email'))
                    <article id="forgot-password">
                        <p class="invalid-msg">{!! \Session::get('email') !!}</p>
                    </article>
                @endif

            </article>
            <article>
                <label for="password">Password</label>
                <input class="input @error('password') invalid @enderror" type="password" placeholder="Password"
                    name="password" required>
                @error('password')
                    <article id="forgot-password">
                        <p class="invalid-msg">{{ $message }}</p>
                    </article>
                @enderror
            </article>
            <article>
                <label for="password">Repeat Password</label>
                <input class="input @error('confirm_password') invalid @enderror" type="password"
                    placeholder="Confirm password" name="confirm_password" required>
                @error('confirm_password')
                    <article id="forgot-password">
                        <p class="invalid-msg">{{ $message }}</p>
                    </article>
                @enderror
            </article>

            <button id="login">
                <p>Register</p>
                <span>
                    <img src="{{ asset('asset/images/whitearrow.png') }}" alt="logo" class="logo_img">
                </span>
            </button>
        </form>
        <article id="register-box">
            <p id="no-account">Already have an account?</p>
            <button id="register">
                <p><a class="btn-secondary" href="{{ route('mobile.login') }}" value="Register" class="login_btn">Login</a>
                </p>
                <span><img src="{{ asset('asset/images/dark_right_arrow.png') }}" alt="logo" class="logo_img"></span>
            </button>
        </article>
    </div>
@endsection
