@extends('layouts.delivery')

@section('header_title', 'Order')
 @section('content')
@include('mobile.delivery.inc.back-header')


<section class="dmart_section mt-5">
    <div class="container">
        <div class="mt-4" style="text-align: center;color:black;font-weight: 400;
        font-size: 25px;">Congrats !!!<br>
            Your Earning on this order</div>
            <div class="mt-4" style="text-align: center;color:black;font-weight: 400;
        font-size: 25px;">$ 50</div>
    </div>

    
</section>

<div class="d-flex justify-content-center mt-5">
    <button class="btn1 border-0" onclick="window.location='{{ route('mobile.delivery.order') }}'">Home</button>
</div>

@endsection

