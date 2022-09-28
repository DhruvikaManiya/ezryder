@extends('layouts.delivery')
@section('header_title', 'Wallet')
@section('css')
<link rel="stylesheet" href="{{ asset('asset/css/vendor.css') }}">
@endsection
@section('content')
    @include('mobile.delivery.inc.back-header')
    <div class="container">
        <div class="wallet">
            <div class="total_wallet">
                <h1 class="total mt-bt-0">$ 5600</h1>
            </div>
            <button class="btn withdraw_btn fs-25 btn-clrr">Withdraw</button>
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
