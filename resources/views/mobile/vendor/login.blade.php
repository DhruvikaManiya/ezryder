<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('asset/css/login.css') }}">
    <style>
        .alert {
            color: red;
            padding: 5px;
            text-transform: capitalize;
        }
        .success{
            color: green;
            padding: 5px;
            text-transform: capitalize;
            text-align: center;
            margin-bottom: 10px;
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
                @if (\Session::has('success'))
                <div class="success ">
                    {!! \Session::get('success') !!}
                </div>
            @endif
                <form action="{{ route('vendor.login_check') }}" method="post">
                    @csrf
                    <div class="form_group">
                        <label class="label" for="email">Email</label>
                        <input class="input" name="email" type="email" placeholder="Enter email"
                            value="{{ old('email') }}" required>
                        @if (\Session::has('email'))
                            <div class="alert ">

                                {!! \Session::get('email') !!}
                            </div>
                        @endif
                    </div>
                    <div class="form_group">
                        <label class="label" for="email">Password</label>
                        <input class="input" name="password" type="password" placeholder="Password" required>
                        @if (\Session::has('password'))
                            <div class="alert ">
                                {!! \Session::get('password') !!}
                            </div>
                        @endif
                    </div>
                    <div class="form_group">
                        <button type="submit" name="submit" class="login_btn">Login</button>
                    </div>
                    <div class="form_group">
                        <a href="{{ route('vendor.register') }}" value="Register" class="login_btn">Register</a>
                    </div>
                    <div class="form_group">
                        <a href="{{ route('vendor.forgotpassword') }}"
                            style="color: #008080; text-align: center;">Forget Password ?</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>
