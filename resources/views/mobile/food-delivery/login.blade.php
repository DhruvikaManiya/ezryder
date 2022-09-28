<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{asset('asset/css/login.css')}}">
</head>
<body>
    <section class="login_sec">
        <div class="container">
            <div class="login_logo">
                <img src="{{asset('asset/images/login-logo.svg')}}" alt="logo" class="logo_img">
            </div>
            <div class="login_form_sec">
                <form action="{{route('food.delivery.home')}}">
                    <div class="form_group">
                        <label class="label" for="email">Email</label>
                        <input class="input" type="email" placeholder="Enter email">
                    </div>
                    <div class="form_group">
                        <label class="label" for="email">Password</label>
                        <input class="input" type="password" placeholder="Password">
                    </div>
                    <div class="form_group">
                        <button type="submit" value="Login" class="login_btn" >Login</button>
                    </div>
                    <div class="form_group">
                        <a href="{{route('food.delivery.register')}}" value="Register" class="login_btn">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
