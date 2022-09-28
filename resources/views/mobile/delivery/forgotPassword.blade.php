<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    <link rel="stylesheet" href="{{ asset('asset/css/login.css') }}">
    <style>
        .alert {
            color: red;
            padding: 5px;
            text-transform: capitalize;
        }

        ,
    </style>
</head>

<body>
    <section class="login_sec">
        <div class="container">
            <div class="login_logo">
                <img src="{{ asset('asset/images/login-logo.svg') }}" alt="logo" class="logo_img">
            </div>
            <div class="login_form_sec inp-clrrr">
                <form action="{{ route('mobile.delivery.postEmail') }}" method="post">
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
                        @if (\Session::has('error'))
                        <div class="alert ">

                            {!! \Session::get('error') !!}
                        </div>
                    @endif
                    </div>

                    <div class="form_group">
                        <button type="submit" name="submit" value="Login" class="login_btn">Send Reset Link</button>
                    </div>


                </form>
            </div>
        </div>
    </section>
</body>

</html>
