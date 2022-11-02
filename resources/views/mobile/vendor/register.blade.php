@extends('layouts.users_app_products')


@section('content')

<div class="main-container auth" id="registerFinal">
      <article id="goBack-container">
        <p>
        <a href="#">
            <span> <img src="{{ asset('asset/images/back_arrow.svg') }}" alt="logo" class="logo_img">
            </span> Register
        </a>
            </p>
      </article>
      <h2>Create a Free</h2>
      <h2>account</h2>

      <form action="{{ route('vendor.registerStore') }}" method="POST">
        @csrf
        <article>
          <label for="email">Your Email</label>
          <input
            type="email"
            name="email"
            placeholder="Enter your email"
          />
        </article>
        <article>
          <label for="password">Password</label>
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Enter your password"
          />
        </article>
        <article>
          <label for="password">Repeat Password</label>
          <input
            type="password"
            name="password"
            id="repeat-password"
            placeholder="Enter your password"
          />
        </article>
        <article>
          <label for="storetype">Store Type</label>
          <select name="store_type_id" required>
            <option value="" selected>Select store type</option>
            @foreach ($store_types as $store_type)
            <option value="{{ $store_type->id }}" >{{ $store_type->title }}</option>
            @endforeach
          </select>
        </article>


        <button class="btn_primary">
          <p>Register</p>
          <span>
            <img src="{{ asset('asset/images/whitearrow.png') }}" alt="logo" class="logo_img">
            </span>
        </button>
      </form>
      <article id="register-box">
        <p id="no-account">Already have an account?</p>

        <a class="btn-secondary" href="#">Login <span><img src="{{ asset('asset/images/whitearrow.png') }}" alt="logo" class="logo_img"></span></a>
        
        </button>
      </article>
    </div>

   
@endsection
