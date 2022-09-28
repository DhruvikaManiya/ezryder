@extends('layouts.vendor-food')
@section('header_title', 'Wallet')
@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/account.css') }}">
@endsection
@section('content')
    @include('mobile.vendor-food.inc.back-header')
    <div class="container">
        <div class="wallet">
            <div class="total_wallet">
                <h1 class="total">$ 5600</h1>
            </div>
            <button class="btn withdraw_btn">Withdraw</button>
            <div class="wallet_history">
                <h2 class="title">History</h2>
                <div class="wallet_wrapper">
                    <div class="w_left">
                        <p class="w_date">09-03-2022</p>
                        <p class="w_date">09-03-2022</p>
                        <p class="w_date">09-03-2022</p>
                        <p class="w_date">09-03-2022</p>
                    </div>
                    <div class="w_right">
                        <div class="w_money">200</div>
                        <div class="w_money">200</div>
                        <div class="w_money">200</div>
                        <div class="w_money">200</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
