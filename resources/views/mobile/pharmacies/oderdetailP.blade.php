@extends('layouts.pharmacies')

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

        .textbox {
            border-radius: 10px;
            width: 100%;
            height: 70px;
            border-color: 008080;
        }

        .btn-successs {
            color: #fff;
            background-color: 008080;
            border-color: 008080;
            margin-top: 10px;
        }

        .rating1 {
            display: flex;
            flex-direction: row-reverse;
            justify-content: start;
        }

        .rating1>input {
            display: none;
        }

        .rating1>label {
            position: relative;
            width: 1em;
            font-size: 10vw;
            color: #FFD600;
            cursor: pointer;
        }

        .rating1>label::before {
            content: "\2605";
            position: absolute;
            opacity: 0;
        }

        .rating1>label:hover:before,
        .rating1>label:hover~label:before {
            opacity: 1 !important;
        }

        .rating1>input:checked~label:before {
            opacity: 1;
        }

        .rating1:hover>input:checked~label:before {
            opacity: 0.4;
        }
    </style>

@endsection
@section('content')
    @include('mobile.vendor.inc.back-header')




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
                    <!-- <img src="{{ asset('asset/images/share.png') }}" alt=""> -->
                </div>
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
                        {{ $order->status == 0 ? 'Pending' : ($order->status == 2 ? 'Delivered' : ($order->status == 5 ? 'Accepted' : 'Cancelled')) }}
                    </h3>
                </div>

                @if ($rating != null)
                    <div>
                        <h3>Comment::{{ $rating->review }}</h3>
                        <!-- <div class="rating1">

                                <input type="radio" name="rating" value="{{ $rating->rating }}"  style="font-size:10vw;"><label>☆</label>

                                <input type="radio" name="rating" value="{{ $rating->rating }}" ><label >☆</label>
                                                
                                <input type="radio" name="rating" value="{{ $rating->rating }}" ><label >☆</label>
                                                 
                                <input type="radio" name="rating" value="{{ $rating->rating }}" ><label >☆</label>
                                                 
                                <input type="radio" name="rating" value="{{ $rating->rating }}" ><label >☆</label>
                                                 
                            </div> -->
                    </div>
                @endif

                @if ($order->status == 5)
                    <form action="{{ route('ratting-insert', $order->id) }}" method="post" id="form1">
                        @csrf
                        <div class="hide">
                            <div class="rating1">

                                <input type="radio" name="rating" value="5" id="5"
                                    style="font-size:10vw;"><label for="5">☆</label>

                                <input type="radio" name="rating" value="4" id="4"><label
                                    for="4">☆</label>

                                <input type="radio" name="rating" value="3" id="3"><label
                                    for="3">☆</label>

                                <input type="radio" name="rating" value="2" id="2"><label
                                    for="2">☆</label>

                                <input type="radio" name="rating" value="1" id="1"><label
                                    for="1">☆</label>

                            </div>
                            <textarea name="review" id="review" cols="30" rows="10" placeholder="Review" class="textbox" required></textarea>
                            <!-- <input type="text" name="review" id="review"> -->
                            <button type="submit" name="submit" class="btn btn-successs" id="hide"
                                style="margin-bottom:10px;">Submit</button>
                        </div>
                    </form>
                @endif
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

@section('js')
    <script>
        $("#hide").click(function() {
            $(".hide").hide();
        });
    </script>
@endsection
