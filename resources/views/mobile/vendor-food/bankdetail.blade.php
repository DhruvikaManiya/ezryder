@extends('layouts.vendor-food')
@section('header_title','Bank Details')
@section('css')
<link rel="stylesheet" href="{{asset('asset/css/account.css')}}">
@endsection
@section('content')
@include('mobile.vendor-food.inc.back-header')

<section class="account_det_sec">
    <div class="container">
        <div class="amount-box">
            <div class="amount-left">
                <p class="user"><span><b>A/C No :</b> 1234 5454 5555 5555</span></p>
                <p class="user"><span><b> IFSC : </b>ABCD0001234</span></p>
                <p class="user"><span><b>City</b> : Ahmedabad</span></p>
                <p class="user"><span><b>State :</b>  Gujarat</span></p>
            </div>
        </div>
    </div>
</section>

@endsection
