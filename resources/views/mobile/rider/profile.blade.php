@extends('layouts.mobile-rider')


@section('header_title', 'Profile')
@section('css')
<link rel="stylesheet" href="{{asset('asset/css/delivry.css')}}">
<link rel="stylesheet" href="{{ asset('asset/css/account.css') }}">
<style>
    .profile{
        padding-bottom: 30px;
    }
    .btn1{
        margin-top: 20px!important;
        color: #fff;
    }
</style>
@endsection

@section('content')
@include('mobile.rider.inc.back-header')

<section class="profile inp-clrrr">


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{route('mobile.rider.add_profile')}}">
        @csrf
        <h3 class="mt-bt-0">Edit Profile</h3>
        <label>Name</label>
        <input type="text" class="form_control" placeholder="Enter name" name="name" value="{{ $user->name }}" required>
        <label>Email</label>
        <input type="email" class="form_control" placeholder="Email" name="email" readonly value="{{ $user->email }}" required>
        <label>Mobile Number</label>
        <input type="number" class="form_control" name="phone" value="{{ $user->phone }}" required>
<!--        <label>Password</label>
        <input type="password" class="form_control"  placeholder="Password" required>-->
        <label>Address</label>
        <input type="text" class="form_control" name="address" value="{{ $user->address }}" placeholder="House no. , floor , road" required>
        <label>Area</label>
        <input type="text" class="form_control" placeholder="Area  " name="area" value="{{ $user->area }}" required>
        <label>City</label>
        <input type="text" class="form_control" placeholder="City  " name="city" value="{{ $user->city }}" required>
        <label>Pincode</label>
        <input type="number" class="form_control" placeholder="Pin-code  " name="pincode" value="{{ $user->pincode }}"  required>
        <label>State</label>
        <input type="text" class="form_control" placeholder="State" name="state" value="{{ $user->state }}" required>
        <label>Country</label>
        <input type="text" class="form_control" placeholder="Country" name="country" value="{{ $user->country }}" required>
        
        <button class="theme-bg btn nexBtn btn1 mb-5 mt-5"
{{--                    onclick="window.location='{{ route('mobile.rider.account') }}'"--}}
        >Submit</button>
    </form>
</section>
@endsection