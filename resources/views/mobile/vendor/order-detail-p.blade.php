@extends('layouts.vendor')

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

        .accepted {
            color: #FFFFFF !important;

        }
    </style>

@endsection
@section('content')
    @include('mobile.vendor.inc.back-header')


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
                {{-- <div>
                    <img src="{{ asset('asset/images/share.png') }}" alt="">
                </div> --}}
            </div>
            @php
                $products = ('App\Ordered_product')::whereIn('id', json_decode($order->ordered_products))->get();
                $total = 0;
            @endphp

            @foreach ($products as $product)
                <div class="product_name_row">
                    <img src="{{ asset($product->product->p_image) }}" style="height:60px;width:50px;">
                    <div class="dmart_address">
                        <p>{{ $product->product->name }}</p>
                        <p>MRP:<del>${{ $product->product->MRP }}</del></p>
                        <div class="product_wight">
                            <table class="product_wight_table">
                                <tr>
                                    <td width="70%">{{ $product->product->units }}{{ $product->product->measurement }}
                                        -
                                        ${{ $product->product->Sellar_price + ($product->product->Sellar_price * $product->product->admin_charge) / 100 }}
                                    </td>
                                    <td>X {{ $product->quantity }}</td>
                                    <td class="text-a-r">
                                        ${{ $product->quantity * ($product->product->Sellar_price + ($product->product->Sellar_price * $product->product->admin_charge) / 100) }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @php
                    $t = $product->quantity * ($product->product->Sellar_price + ($product->product->Sellar_price * $product->product->admin_charge) / 100);
                @endphp

                @php
                    $total += $product->quantity * $product->product->MRP;
                @endphp
                @php
                    $prod = (($product->product->Sellar_price + ($product->product->Sellar_price * $product->product->admin_charge) / 100) * 100) / $product->product->MRP;
                    $discount = 100 - $prod;
                    $order_dis = $product->quantity * (($product->product->MRP * $discount) / 100);
                    
                    //    $discount = round($discount);
                    
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
                        <td>{{ count(json_decode($order->ordered_products)) }}</td>
                    </tr>
                    <tr>
                        <td>Order Item Total</td>
                        <td>${{ $total }}</td>
                    </tr>
                    <tr>
                        <td>Order Delivery Charges </td>
                        <td>$ 0</td>
                    </tr>
                    <tr>
                        <td>Discount on your porduct</td>
                        <td>-$ {{ $order_dis }}
                            <hr>
                        </td>

                    </tr>
                    <tr>
                        {{-- <td>Net Payable Amount</td> --}}
                        <td>Total order Amount</td>
                        <td>$ {{ $t }}</td>
                    </tr>
                </table>
                <div class="status status-spn">

                    <h3><span>Status</span> :
                        @if ($order->status == 0)
                        <span class="badge badge-warning">Pending</span>
                    @elseif($order->status == 1)
                        <span class="badge badge-info">Processing</span>
                    @elseif($order->status == 2)
                        <span class="badge badge-success">Delivered</span>
                    @elseif($order->status == 3)    
                        <span class="badge badge-danger">Cancelled</span>
                    @elseif($order->status == 4)    
                        <span class="badge badge-success"> Vendor Accepted</span>
                    @elseif($order->status == 5)
                        <span class="badge badge-success">Delivery-boy  Accepted</span>
                    @endif </h3>

                    @if ($order->status == 0)

                <div class="d-flex just-c-e">
                        <button class="theme-bg btn nexBtn fs-25 mb-5 mt-5 btn-w save"><a href="{{route('vendor.order-detail-p_accepted',$order->id)}}" class="accepted">Accepted</a></button>
                        <button class="theme-bg btn nexBtn fs-25 mb-5 mt-5 btn-w save"><a href="{{route('vendor.order-detail-p_deny',$order->id)}}" class="accepted">Deny</a></button>
                    </div>
                    @elseif($order->status == 1)
                    <div class="d-flex just-c-e">
                        <button class="theme-bg btn nexBtn fs-25 mb-5 mt-5 btn-w save"><a href="{{route('vendor.order-details-p_processed',$order->id)}}" class="accepted">Accepted</a></button>
                    </div>
                   {{-- @elseif($order->status == 4)
                     <div class="d-flex just-c-e">
                        <button class="theme-bg btn nexBtn fs-25 mb-5 mt-5 btn-w save"><a href="{{route('vendor.order-details-d-accpeted',$order->id)}}" class="accepted">Accepted</a></button>
                        <button class="theme-bg btn nexBtn fs-25 mb-5 mt-5 btn-w save"><a href="{{route('vendor.order-detail-p_deny',$order->id)}}" class="accepted">Cancel</a></button>
                     </div> --}}
                    @elseif($order->status == 5)
                    <div class="d-flex just-c-e">
                        <button class="theme-bg btn nexBtn fs-25 mb-5 mt-5 btn-w save"><a href="{{route('vendor.order-detail-p_delivered',$order->id)}}" class="accepted">Delivered</a></button>
                    </div>
                         @endif



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
