<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ezryder</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,700;1,300;1,500;1,700;0,1000&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('asset/css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/customStyling.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/ezryder.css') }}">
    
  </head>
  <body>
    <div class="main-container auth" id="loginFinal">
      <h1>EZRYDER</h1>
      <p>Welcome Store Owners</p>
      <form action="{{ route('vendor.login_check') }}" method="post">
        <article>
          <label for="email">Your Email</label>
          <input
            type="email"
            name="email"
            id="email"
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
          <p><a class="btn-secondary" href="{{ route('vendor.register') }}" value="Register" class="login_btn">Register</a></p>
          <span><img src="{{ asset('asset/images/dark_right_arrow.png') }}" alt="logo" class="logo_img"></span>
        </button>

        
      </article>



    </div>

  </body>
</html>
