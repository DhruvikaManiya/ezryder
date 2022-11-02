@extends('layouts.ecommerce')

@section('content')
    <div class="main-container no-padding navStyle orderHistory" id="addBankDetails">
        <article id="top-nav">
            <div class="reviewBackButton">
                <img src="{{ asset('asset/images/loginScreen/leftArrow.png') }}" alt="" />
                <p>Order #{{ $order->id }}</p>
            </div>
            <p>
                <span>{{ cartCount() }}</span>
                <img src="{{ asset('asset/images/homeScreen/shoppingBag.png') }}" alt="" />
            </p>
        </article>
        <article class="box">
            <div class="items">
                <div class="details">
                    @php
                        $product_total = 0;
                        
                    @endphp
                    @foreach ($order->orderItems as $orderitem)
                        {{-- @dd($orderitem); --}}
                        <article>
                            <div>
                                <img src="{{ asset($orderitem->product->p_image) }}" width="22px" alt="">
                                <p>{{ $orderitem->product->name }}</p>
                            </div>
                            <div>
                                <p class="value">${{ $orderitem->pric_net_total_amout }}</p>

                            </div>
                        </article>
                        @php
                            $product_total += $orderitem->pric_net_total_amout;
                        @endphp
                    @endforeach


                    <hr />
                    <article class="total">
                        <p>Grand Total</p>
                        <p class="value">${{$product_total}}</p>
                    </article>
                </div>
            </div>
            <div class="billSummary">
                <h1>Bill Summary</h1>
                <div class="details">
                    <article class="itemTotal">
                        <p>Item total | <span class="blue-underline">View Details </span></p>
                        <p class="value">$ {{ $product_total }} </p>
                    </article>
                    <article>
                        <p class="charge">
                            Delivery charge for 8 Km
                            <img src="{{ asset('asset/images/common/info.png') }}" alt="" />
                        </p>
                        <p class="value">${{$order->delivery_charges}}</p>
                    </article>
                    <article>
                        <p>Govt. Taxes</p>
                        <p class="value">${{$order->govt_taxes}} </p>
                    </article>
                    <article>
                        <p>Other Charges</p>
                        <p class="value">$ {{$order->packaging_charges}} </p>
                    </article>
                    {{-- <article>
                        <p>Feeding Canada Donation | <span class="red">Remove</span></p>
                        <p class="value">$3</p>
                    </article> --}}
                    {{-- <article>
                        <p>Cash round off</p>
                        <p class="value">$.15</p>
                    </article> --}}
                    <hr />

                    @php 
                        $total = $product_total + $order->delivery_charges + $order->govt_taxes + $order->packaging_charges + 3;
                    @endphp
                    <article class="total">
                        <p>Grand Total</p>
                        <p class="value">${{$total}} </p>
                    </article>
                </div>
            </div>



            <div class="address">
                <h1>Delivery Address </h1>
                <p>
                    {{ $order->delivery_address }}
                </p>
            </div>

            <div class="address">
                <h1> Store Details</h1>
                <p>
                    {{ $order->store->name }}
                </p>
                <p>
                    {{ $order->store->address }}, {{ $order->store->city }} , {{ $order->store->state }} , {{ $order->store->country }}
                </p>
            </div>

        </article>

        @include('layouts.partials.user_footer_nav')
    </div>
@endsection
