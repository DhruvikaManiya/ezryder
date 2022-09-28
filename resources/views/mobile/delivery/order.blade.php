@extends('layouts.delivery')

@section('header_title', ' Orders')

@section('content')
    @include('mobile.delivery.inc.header')


    <section class="order-box">
        <div class="carrent-order space">
            <div class="order1">
                <p class="orde" id="current-btn">Current Orders</p>
            </div>
            <!-- <div class="order1">
                            <p class="past" id="past-btn">Past Orders</p>
                        </div> -->
        </div>
    </section>
    <!---order end--->
    <!---start amount--->

    <section class="current-order">
        @foreach ($order as $order)
            <section class="amount ">
                <div class="amount-box">
                    <div class="amount-left w-53">
                        <p class="num" onclick="window.location='{{ route('mobile.delivery.order-detail', $order->id) }}'"><img
                                src="{{ asset('asset/images/Vector 1.png') }}"><span>#{{ $order->id }}</span></p>
                        <p class="user"><img
                                src="{{ asset('asset/images/Vector 3.png') }}"><span>{{ $order->user->name }}</span></p>
                        <p class="location loc-pos"><img
                                src="{{ asset('asset/images/clarity_map-marker-line.svg') }}">{{ $order->user->address }},
                            {{ $order->user->area }}, {{ $order->user->city }}, {{ $order->user->pincode }} </p>

                    </div>
                    <div class="amount-right">
                        <p>{{ date('d-m-Y H:i:s', strtotime($order->created_at)) }}</p>
                    </div>
                </div>
                <div class="itembox">
                    <div class="total">
                        <p>Item count: {{ $order->total }}</p>
                    </div>
                    <div class="total">
                        <p>Total Amount: ${{ $order->total }}</p>
                    </div>
                </div>
                <div class="button" id="btns">
                    @if($order->status == 0)
                    <div class="btn1 fs-20" id="reject"><a href="{{ route('mobile.delivery.reject', $order->id) }}">Reject
                    </div>
                    <a href="{{ route('mobile.delivery.order-detail', $order->id) }}">
                        <div class="btn1 fs-20" id="details">View Details</div>
                    </a>
                    @elseif($order->status == 1)
                    <div class="btn1 fs-20" id="reject"><a href="{{ route('mobile.delivery.reject', $order->id) }}">Reject
                    </div>
                    <a href="{{ route('mobile.delivery.order-detail', $order->id) }}">
                        <div class="btn1 fs-20" id="details">View Details</div>
                    </a>
                    @elseif($order->status == 2)
                    <div class="btn1 fs-20" id="reject"><a href="{{ route('mobile.delivery.reject', $order->id) }}">Reject
                    </div>
                    <a href="{{ route('mobile.delivery.order-detail', $order->id) }}">
                        <div class="btn1 fs-20" id="details">View Details</div>
                    </a>
                    @elseif($order->status == 3)
                    <div class="button textright">
                        <div class="btn2">Cancelled</div>
                    </div>
                    @elseif($order->status == 5)
                    <div class="btn1 fs-20" ><a href="#">Accepted
                    </div>
                   
                    @endif
                    
                </div>
            </section>
        @endforeach
        <!---end amount--->
  
    </section>

    </section>
@endsection

@section('js')
    {{-- <script type="text/javascript">
            $('#current-btn').click(function(e) {
                e.preventDefault();
                $('.current-order').show();
                $('.past-order').hide();

                $('.order1 p').css('color', '#858585');
                $(this).css('color', '#008080');
            });
            $('#past-btn').click(function(e) {
                e.preventDefault();
                $('.current-order').hide();
                $('.past-order').show();
                $('.order1 p').css('color', '#858585');
                $(this).css('color', '#008080');
            });
        </script> --}}
@endsection
