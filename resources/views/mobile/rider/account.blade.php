@extends('layouts.mobile-rider')


@section('header_title', 'Account')
@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/account.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/delivry.css ') }}">

@endsection

@section('content')
    @include('mobile.rider.inc.back-header')

    <section class="up-img">
        <h3 class="in_acti">InActive</h3>
        <label for="file-upload" class="dark active_img">+</label>
        <input type="file" id="file-upload" style="display:none;" class="title-foods m-0  ">
        <h3 class="upload">Upload image</h3>
    </section>

    <a href="{{ route('mobile.rider.document') }}">
        <div class="add-p add_p_bold add_p_center">
            <p>Add your id proof</p>
            <p>Upload your licence</p>
            <p>Upload vehicle details</p>
        </div>
    </a>


    <section class="account_link_sec pb-85">
        <div class="container">
            <div class="account_links">
             
                <a href="{{ route('mobile.rider.profile') }}" class="link">Profile</a>
                <a href="{{ route('mobile.rider.wallet') }}" class="link">Wallets</a>
                <a href="{{ route('mobile.rider.document') }}" class="link">Documents</a>
                <a href="{{ route('mobile.rider.vehicle') }}" class="link">Vehicle</a>
                <a href="{{ route('mobile.rider.logout') }}" class="link">Logout</a>
            </div>
        </div>
    </section>
@endsection
