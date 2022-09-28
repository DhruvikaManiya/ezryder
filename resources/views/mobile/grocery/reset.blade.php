<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    <link rel="stylesheet" href="{{ asset('asset/css/login.css') }}">
    <style>
        .alert {
            color: red;
            padding: 5px;
            text-transform: capitalize;
        }

        .card_title {
            color: #008080; !important;
            font-size: x-large;
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <section class="login_sec">
        <div class="container">
            <div class="login_logo">
                <img src="{{ asset('asset/images/login-logo.svg') }}" alt="logo" class="logo_img">
            </div>
            <div class="login_form_sec inp-clrrr ">
                <h4 class="card_title">Reset Password</h4>
                <div class="card-body">
                    <form method="POST" action="{{ route('mobile.passwordupdate') }}">
                        @csrf
                        <input type="hidden" name="email" value="{{ $user->user->email }}">


                        <div class="form_group">
                            <label class="label" for="email">New Password</label>
                            <input class="input" name="password" type="password" placeholder="Password" required>
                            @if (\Session::has('password'))
                                <div class="alert ">

                                    {!! \Session::get('password') !!}
                                </div>
                            @endif
                        </div>

                        <div class="form_group">
                            <label class="label" for="cpassword">Confirm Password</label>
                            <input class="input" type="password" placeholder="Confirm password" name="confirm_password"
                                required>
                            <p class="error-mgs">
                                @error('confirm_password')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </p>
                        </div>

                        <div class="form_group">
                            <button type="submit" name="submit" class="login_btn">Reset</button>
                        </div>
                </div>
            </div>
            </form>
        </div>
    </section>
</body>
{{-- jquery cdn --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    // on form submit password validation
    $('form').submit(function() {
        var password = $('input[name="password"]').val();
        var confirm_password = $('input[name="confirm_password"]').val();
        if (password != confirm_password) {
            alert('Password and Confirm Password does not match');
            return false;
        }
    });
</script>
</html>
