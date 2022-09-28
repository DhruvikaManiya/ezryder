@extends('layouts.delivery')

@section('header_title', 'Order Details')

@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/order-detail.css') }}">
    <style>
        .save {
            display: block;
            background: #008080;
            border-radius: 5px;
            padding: 13px;
            width: 40%;
            /* margin-right: 20%; */
            text-align: center;
            font-weight: 500;
            font-size: 18px;
            line-height: 23px;
            color: #FFFFFF;
        }

        .d-flex {
            display: flex;
        }

        .just-c-e {
            justify-content: space-evenly;
        }

        .error-box {
            padding: 10px;
            margin-bottom: 10px;
        }

        .error-mgs {
            color: rgb(167, 14, 14);
            font-weight: 600;
            text-align: left;
        }
        .accepted{
            color: #FFFFFF !important;
            
        }
    </style>

@endsection
@section('content')
    @include('mobile.delivery.inc.back-header')


    {{-- <section>
    <div class="header">
        <div class="container">
            <div class="header_row">
                <div class="header_text">
                    <h1>Order #2901</h1>
                </div>
                <div class="header_icon">
                    <img src="{{asset('asset/images/location-icon.png')}}">
                </div>
            </div>
        </div>
    </div> --}}

    <section class="person_section">
        <div class="container">
            <div class="person_row">
                <div class="person_name d-flex w-50">
                    <div class="person_icon_img">
                        <img src="{{ asset('asset/images/person_icon.png') }}">
                    </div>
                    <p>{{ $order->user->name }}</p>
                </div>
                <div class="person_data_time w-50">
                    <p> {{ date('d-m-Y H:i:s', strtotime($order->created_at)) }}</p>
                </div>
            </div>
        </div>
    </section>
    {{-- @dd($order->order_addres) --}}
    <section class="dmart_section">
        <div class="container">
            <div class="dmart_row1">
                <div class="dmart_circle_img">
                    <img src="{{ asset('asset/images/circle.png') }}">
                </div>
                <div class="dmart_address ml-10">
                    <h3>{{ $order->order_addres->address1 }}</h3>
                    <p class="pt-7">{{ $order->order_addres->address2 }}</p>
                </div>
                <div>
                    <img src="{{ asset('asset/images/share.png') }}" alt="">
                </div>
            </div>
            @php
             $products='App\Ordered_product'::whereIn('id',json_decode($order->ordered_products))->get();
            $total= 0;
            @endphp

            @foreach ($products as $product)
                <div class="product_name_row">
                    <img src="{{asset($product->product->p_image)}}" style="height:60px;width:50px;">
                    <div class="dmart_address">
                        <p>{{$product->product->name}}</p>
                        <div class="product_wight">
                            <table class="product_wight_table">
                                <tr>
                                    <td width="70%">{{$product->product->units}}{{$product->product->measurement}} - ${{$product->product->price}}</td>
                                    <td>X {{$product->quantity}}</td>
                                    <td class="text-a-r">${{($product->product->price)*($product->quantity)}} </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @php
                    $total += ($product->product->price)*($product->quantity)
                @endphp
            @endforeach

         
        </div>
    </section>



    <section class="item_count_section">
        <div class="container">
            <div class="item_count_row">
                <table class="item_count_table">
                    <tr>
                        <td>Item Count </td>
                        <td>{{count(json_decode($order->ordered_products))}}</td>
                    </tr>
                    <tr>
                        <td>Order Item Total</td>
                        <td>${{$total}}</td>
                    </tr>
                    <tr>
                        <td>Order Delivery Charges </td>
                        <td>$ 0</td>
                    </tr>
                    <tr>
                        <td>Coupon</td>
                        <td>-$ {{$total-$order->total}}</td>
                    </tr>
                    <tr>
                        <td>Net Payable Amount</td>
                        <td>$ {{$order->total}}</td>
                    </tr>
                </table>
                <div class="status status-spn">
                    <h3><span>Status</span> : {{$order->status == 1 ? 'Pending' : ($order->status == 2 ? 'Delivered' : ($order->status == 5 ? 'Accepted' : 'Cancelled'))}}</h3>
                    @if($order->status==1 )
                    
                    <div class="d-flex just-c-e">
                        <button class="theme-bg btn nexBtn fs-25 mb-5 mt-5 btn-w save"><a href="{{route('mobile.delivery.d_accepted',$order->id)}}" class="d_accepted">Accept</a></button>
                        {{-- <button class="theme-bg btn nexBtn fs-25 mb-5 mt-5 btn-w save"><a href="{{route('vendor.order-detail-p_deny',$order->id)}}" class="accepted">Deny</a></button> --}}
                    </div>

                    @else
                    <div class="button ">
                        <div class="theme-bg btn nexBtn fs-25 mb-5 mt-5 btn-w"><a href="{{route('mobile.delivery.complete_delivery',$order->id)}}">Pickup</div>
                    </div>
                    @endif
                   
                    {{-- @endif --}}

                  
                </div>
            </div>
        </div>
    </section>





    {{-- <footer class="footer">
        <div class="container">
            <div class="footer_row">
                <div class="order">
                    <img src="{{asset('asset/images/shopping-cart.png')}}">
                    <p>Orders</p>
                </div>
                <div class="account">
                    <img src="{{asset('asset/images/user.png')}}">
                    <p>Accounts</p>
                </div>
            </div>
        </div>
    </footer> --}}
    </section>
