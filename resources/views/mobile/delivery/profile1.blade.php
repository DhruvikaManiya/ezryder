@extends('layouts.delivery')

@section('header_title', 'Profile')

@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/order-detail.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/account.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/delivry.css') }}">


    <style>
        .btn {
            color: #fff;
        }

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

@endsection

@section('content')
@include('mobile.delivery.inc.back-header')
    <section class="profile profile-inp inp-clrrr">

        <form action="{{ route('mobile.delivery.profile.edit') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3>Edit Profile</h3>
            <input type="hidden" name="id" class="form_control" value="" required>
            
            <label>Name</label>
            <input type="text" name="name" class="form_control" placeholder="Enter name" value="{{ $user->name }}"
                required>
            <p class="error-mgs">
                @error('name')
                    <strong>{{ $message }}</strong>
                @enderror
            </p>
                <label>Email</label>
                <input type="email" name="email" class="form_control" placeholder="Enter email"
                    value="{{ $user->email }}" readonly>
            <p class="error-mgs">
                @error('email')
                    <strong>{{ $message }}</strong>
                @enderror
            </p>
                <label>Moblie Number</label>
                <input type="number" name="phone" class="form_control" placeholder="Enter mobile Number"
                    value="{{ $user->phone }}" required>
            <p class="error-mgs">
                @error('phone')
                    <strong>{{ $message }}</strong>
                @enderror
            </p>
                {{-- <label>Password</label>
        <input type="password" name="password" class="form_control" value="{{$user->password}}" placeholder="Enter your password"  required> --}}


                <label>Address</label>
                <input type="text" name="address" class="form_control" placeholder="House no. ,floor , road"
                value="{{ $user->address }}" required>
            <p class="error-mgs">
                @error('address')
                    <strong>{{ $message }}</strong>
                @enderror
            </p>
                <label>Area</label>
                <input type="text" name="area" class="form_control" placeholder="Area "  value="{{ $user->area }}"
                    required>
            <p class="error-mgs">
                @error('area')
                    <strong>{{ $message }}</strong>
                @enderror
            </p>
                <label>City</label>
                <input type="text" name="city" class="form_control" placeholder="City  " value="{{ $user->city }}"
                    required>
            <p class="error-mgs">
                @error('city')
                    <strong>{{ $message }}</strong>
                @enderror
            </p>
                <label>Pincode</label>
                <input type="number" name="pincode" class="form_control"  value="{{ $user->pincode }}" required>
            <p class="error-mgs">
                @error('pincode')
                    <strong>{{ $message }}</strong>
                @enderror
            </p>
                <label>State</label>
                <input type="text" name="state" class="form_control" placeholder="State"  value="{{ $user->state }}"
                    required>
            <p class="error-mgs">
                @error('state')
                    <strong>{{ $message }}</strong>
                @enderror
            </p>
                <label>Country</label>
                <input type="text" name="country" class="form_control" placeholder="Country"
                value="{{ $user->country }}" required>
            <p class="error-mgs">
                @error('country')
                    <strong>{{ $message }}</strong>
                @enderror
            </p>
                <label>Profile photo </label>
                <input type="file" name="profile" class="form_control" placeholder="profile"
                value="{{ $user->profile }}" required>
            <p class="error-mgs">
                @error('profile')
                    <strong>{{ $message }}</strong>
                @enderror
            </p>
                <label></label>

                <button type=" submit" name="submit"
                    class="theme-bg btn btn1 nexBtn mb-5 btn-tab-space btn-w">Submit</button>
        </form>
    </section>
@endsection
