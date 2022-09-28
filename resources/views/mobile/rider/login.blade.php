<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('asset/css/login.css') }}">
    <style>
        .error-box {
            padding: 10px;
            margin-bottom: 10px;
        }

        .error-mgs {
            color: rgb(167, 14, 14);
            font-weight: 600;
            text-align: center;
        }
    </style>
</head>

<body>
    <section class="login_sec">
        <div class="container">
            <div class="login_logo">
                <img src="{{ asset('asset/images/login-logo.svg') }}" alt="logo" class="logo_img">
            </div>
            <div class="login_form_sec inp-clrrr">
                <div class="error-box">
                    <p class="error-mgs">
                        @error('email')
                            <strong>{{ $message }}</strong>
                        @enderror
                        @if (\Session::has('error'))
                            {!! \Session::get('error') !!}
                        @endif
                    </p>
                </div>


                <form action="{{ route('mobile.rider.loginCheck') }}" method="POST">
                    @csrf
                    <div class="form_group ">
                        <label class="label" for="email">Email</label>
                        <input class="input" type="email" placeholder="Enter email" name="email"
                            value="{{ old('email') }}" required>


                    </div>
                    <div class="form_group">
                        <label class="label" for="password">Password</label>
                        <input class="input" type="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="form_group">
                        <button type="submit" value="Login" class="login_btn">Login</button>
                    </div>
                    <div class="form_group">
                        <a href="{{ route('mobile.rider.register') }}" type="submit" class="login_btn">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>
