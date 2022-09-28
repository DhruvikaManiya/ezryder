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
    <form action="{{route('mobile.rider.account')}}">
        <h3 class="mt-bt-0">Edit Profile</h3>
        <label>Name</label>
        <input type="text" class="form_control" placeholder="Enter name" required>
        <label>Email</label>
        <input type="email" class="form_control" placeholder="Email" required>
        <label>Mobile Number</label>
        <input type="number" class="form_control" required>
        <label>Password</label>
        <input type="password" class="form_control" placeholder="Password" required>
        <label>Address</label>
        <input type="text" class="form_control" placeholder="House no. , floor , road" required>
        <label>Area</label>
        <input type="text" class="form_control" placeholder="Area  " required>
        <label>City</label>
        <input type="text" class="form_control" placeholder="City  " required>
        <label>Pincode</label>
        <input type="number" class="form_control"  required>
        <label>State</label>
        <input type="text" class="form_control" placeholder="State" required>
        <label>Country</label>
        <input type="text" class="form_control" placeholder="Country" required>
        
        <button class="theme-bg btn nexBtn btn1 mb-5 mt-5"
                    onclick="window.location='{{ route('mobile.rider.account') }}'">Submit</button>
    </form>
</section>
@endsection