<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Title</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no">


    <link rel="stylesheet" href="{{ asset('asset/css/login.css') }}">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- owl-carousel cdn css links -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>
<style>
    body {
        font-family: 'Roboto', sans-serif;
    }
</style>

<body>

    <style>
        .input-box {
            display: flex;
        }

        .input-number {}

        input:focus {
            border-color: rgb(231 37 34) !important;
            outline: none;
        }

        .login-form input[type="number"] {
            width: 50px;
            margin: 5px 14.78px;
            font-size: 22px;
            border: 1px solid slategray;
            border-radius: 5px;
            text-align: center;
            padding: 6px 12px;
        }

        .login-form input[type="number"]:first-child {
            margin-left: 1.2px;
        }

        .login-form input[type="number"]:last-child {
            margin-right: 0px;
        }

        .login-btn {
            background: #008080;
            border-radius: 5px;
            padding: 13px 0px;
            border: none;
            font-weight: 400;
            font-size: 25px;
            line-height: 30px;
            text-align: center;
            color: #FFFFFF;
        }

        .alert {
            color: red;
            padding: 5px;
            text-transform: capitalize;
        }
    </style>

    <div class="main-head">
        <section class="login_sec">
            <div class="main-wrapper">
                <div class="login-wrap">    
                    <div class="login-main-content">
                        <div class="login_logo text-center ">
                            <img src="{{ asset('asset/images/login-logo.svg') }}" alt="logo" class="logo_img">
                        </div>
                        <p class="content text-center">Check your Email for OTP</p>
                        <div class="login-otp-frm">

                            <form
                                class="login-form d-flex flex-column justify-content-around accordion-body align-content-around"
                                action="{{ route('mobile.delivery.verifyotp') }}" method="post">
                                @csrf
                                <input type="hidden" name="email" value="{{ $user->user->email }}">

                                <div class="input-box justify-content-center">
                                    <input type="number" name="otp[]" class="input-number" maxlength="1" autofocus>
                                    <input type="number" name="otp[]" class="input-number" maxlength="1">
                                    <input type="number" name="otp[]" class="input-number" maxlength="1">
                                    <input type="number" name="otp[]" class="input-number number4" maxlength="1">
                                </div>
                                @if (\Session::has('error'))
                                    <div class="alert ">

                                        {!! \Session::get('error') !!}
                                    </div>
                                @endif
                                <button type="submit" class="login-btn mt-4"> Verify OTP</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>


        <script>
            var elts = document.getElementsByClassName('input-number')
            Array.from(elts).forEach(function(elt) {
                elt.addEventListener("keyup", function(event) {
                    // Number 13 is the "Enter" key on the keyboard
                    if (event.keyCode === 13 || elt.value.length == 1) {
                        // Focus on the next sibling
                        elt.nextElementSibling.focus()
                    }
                    // Number 8 is the "backspace" key on the keyboard
                    if (event.keyCode === 8 || elt.value.length == 0) {
                        // Focus on the previous sibling
                        elt.previousElementSibling.focus()
                    }
                });
            })
        </script>



        <script>
            $(window).scroll(function() {
                if ($(window).scrollTop() >= 10) {
                    $('.main-head').addClass('fixed-header');
                    $('.main-head div').addClass('visible-title');
                } else {
                    $('.main-head').removeClass('fixed-header');
                    $('.main-head div').removeClass('visible-title');
                }
            });
        </script>
</body>

</html>
