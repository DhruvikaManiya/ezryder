<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>

    <title>Register</title>

    <link rel="stylesheet" href="{{ asset('asset/css/login.css') }}">
    <style>
        .error-box {
            padding: 10px;
            margin-bottom: 10px;
        }

        .error-mgs {
            color: rgb(167, 14, 14);
            font-weight: 600;
            text-align: left;
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
                    <p class="error-mgs text-center">

                    </p>
                </div>
                <form action="{{ route('vendor.registerStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form_group">
                        <label class="label" for="name">Name</label>
                        <input class="input" type="text" placeholder="Enter name" name="name"
                            value="{{ old('name') }}" required>
                        <p class="error-mgs">
                            @error('name')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </p>
                    </div>

                    <div class="form_group">
                        <label class="label" for="email">Email</label>
                        <input class="input" type="email" placeholder="Enter email" name="email"
                            value="{{ old('email') }}" required>
                        <p class="error-mgs">
                            @error('email')
                                <strong>{{ $message }}</strong>
                            @enderror
                            
                        </p>
                    </div>

                    <div class="form_group">
                        <label class="label" for="phone">Mobile</label>
                        <input class="input" type="number" placeholder="Enter mobile number"
                            value="{{ old('phone') }}" name="phone" required>
                        <p class="error-mgs">
                            @error('phone')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </p>
                    </div>
                   
                    <div class="form_group">
                        <label class="label" for="password">Password</label>
                        <input class="input" type="password" placeholder="Password" name="password" required>
                        <p class="error-mgs">
                            @error('password')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </p>
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
                        <label class="label" for="cpassword">Select your store type</label>
                        <div class="product-box-g1 top-spc30 pos-rele">
                            <select class="input " name="store_type">
                                <option value="1">Grocery</option>
                                <option value="2">Pharmacy</option>
                                <option value="3">Restaurants</option>
                            </select>
                            <span class="ap-arrow11"><img src="{{ asset('asset/images/ap-arow.png') }}"
                                    alt=""></span>
                        </div>
                    </div>
                    <div class="form_group">
                        <button class="login_btn">Register</button>
                    </div>
                    <div class="form_group">
                        <a href="{{ route('vendor.login')}}" style="color: #008080; text-align: center;">Already have an Account? LOGIN</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>


