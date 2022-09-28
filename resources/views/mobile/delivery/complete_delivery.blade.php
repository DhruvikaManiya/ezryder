@extends('layouts.delivery')

@section('header_title', 'Order')
@section('content')
@include('mobile.delivery.inc.back-header')

<section class="person_section">
    <div class="container">
        <div class="person_row">
            <div class="d-flex w-50">
                {{-- <!-- <div class="person_icon_img">
                    <img src="{{asset('asset/images/person_icon.png')}}">
            </div> --> --}}
            <b>
                <p class="mt-16">Delivery Details</p>
            </b>
        </div>
        <div class="person_data_time w-50">
            <p>{{ date('d-m-Y H:i:s', strtotime($order->created_at)) }}</p>
        </div>
    </div>
    </div>
</section>

<section class="dmart_section">
    <div class="container">
        <div class="dmart_row1">
            <div class="person_icon_img">
                <img src="{{ asset('asset/images/person_icon.png') }}">
            </div>
            <div class="dmart_address ml-10">
                <h3>{{ $order->user->name }}</h3>
                <p class="pt-7">{{ $order->user->address }}, {{ $order->user->area }}, {{ $order->user->city }}, {{ $order->user->state }}, {{ $order->user->country }}, <br> {{ $order->user->pincode }}</p>
            </div>
            <div>
                <img src="{{asset('asset/images/share.png')}}" alt="">
            </div>

        </div>
        <div class="dmart_row1  ">
            <a class="d-flex" href="tel:{{ $order->user->phone }}"><img class="call-icon" style="width:20px; height: 20px; margin-left;" src="{{ asset('asset/images/call2.png') }}">
                <b>
                    <p class=" ml-3 clr-teal">Call</p>
                </b></a>

        </div>

        <div class="person_call_img">
            {{-- <img src="{{asset('asset/images/call2.png')}}"> --}}
            <b>
                <p></p>
            </b>
        </div>
    </div>
</section>
<div class="container">
    @if( $order->status == '5')
    <div class="pending_btn" style="text-align: center">
        <a href="{{ route('mobile.delivery.delivered',$order->id) }}"><button type="button" class="btn_pending">Complete
                delivery</button></a>
    </div>

    @endif
</div>


@endsection