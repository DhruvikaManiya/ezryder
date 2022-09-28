@extends('layouts.mobile-rider')

@section('header_title', 'Wallet')
@section('css')
    <style>
        .btn {
            color: #FFFFFF !important;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('asset/css/vendor.css') }}">
@endsection
@section('content')
    @include('mobile.rider.inc.back-header')
    <div class="container">
        <div class="wallet">
            <div class="total_wallet">
                <h1 class="total">$ 5600</h1>
            </div>
            <button class="btn withdraw_btn fs-25">Withdraw</button>
            <div class="wallet_history">
                <h2 class="title">History</h2>
                <table class="h-table w100 tab-height mt28 v-data">
                    <thead>
                        <tr>

                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>

                            <td>09-03-2022</td>
                            <td>200</td>
                        </tr>
                        <tr>

                            <td>09-03-2022</td>
                            <td>200</td>
                        </tr>
                        <tr>

                            <td>09-03-2022</td>
                            <td>200</td>
                        </tr>
                        <tr>

                            <td>09-03-2022</td>
                            <td>200</td>
                        </tr>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
