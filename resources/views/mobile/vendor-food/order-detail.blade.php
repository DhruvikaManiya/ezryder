@extends('layouts.vendor-food')

@section('header_title', 'Order Detail')

@section('css')
    <link rel="stylesheet" href="{{ asset('asset/css/order-detail.css') }}">

@endsection
@section('content')
    @include('mobile.vendor-food.inc.back-header')


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
                <div class="person_name d-flex w-50 align-items-center">
                    <div class="person_icon_img">
                        <img src="{{asset('asset/images/person_icon.png')}}">
                    </div>
                    <p class="mb-0">Brijesh Mishra</p>
                </div>
                <div class="person_data_time w-50">
                    <p class="mb-0">09-03-2022 9.30 AM</p>
                </div>
            </div>
        </div>
    </section>

    <section class="dmart_section">
        <div class="container">
            <div class="dmart_row1">
                <div class="dmart_circle_img">
                    <img src="{{asset('asset/images/circle.png')}}">
                </div>
                <div class="dmart_address ml-10">
                    <h3>Burger King</h3>
                    <p class="pt-7">D293, Laxmikrup, Arbudanagar, odhav,<br> ahmedabad</p>
                </div>
            </div>

            <div class="product_name_row">
                <img src="{{asset('asset/images/Rectangle.png')}}">
                <div class="dmart_address">
                    <p>Burger</p>
                    <div class="product_wight">
                        <table class="product_wight_table">
                            <tr>
                                <td width="70%">Extra Cheese</td>
                                <td>X 1</td>
                                <td class="text-a-r">$ 10</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>


            <div class="product_name_row">
                <img src="{{asset('asset/images/Rectangle.png')}}">
                <div class="dmart_address">
                    <p>Fries</p>
                    <div class="product_wight">
                        <table class="product_wight_table">
                            <tr>
                                <td width="70%">Peri Peri Loaded</td>
                                <td>X 2</td>
                                <td class="text-a-r">$ 100</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="dmart_section mt-20">
        <div class="container">
            <div class="dmart_row1">
                <div class="dmart_circle_img">
                    <img src="{{asset('asset/images/circle.png')}}">
                </div>
                <div class="dmart_address ml-10">
                    <h3>Dmart</h3>
                    <p class="pt-7">D293, Laxmikrup, Arbudanagar, odhav,<br> ahmedabad</p>
                </div>
            </div>

            <div class="product_name_row">
                <img src="{{asset('asset/images/Rectangle.png')}}">
                <div class="dmart_address">
                    <p>Lifeboy Soap</p>
                    <div class="product_wight">
                        <table class="product_wight_table">
                            <tr>
                                <td width="70%">1 Pkg - $2</td>
                                <td>X 1</td>
                                <td class="text-a-r">$ 2</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="item_count_section">
        <div class="container">
            <div class="item_count_row">
                <table class="item_count_table">
                    <tr>
                        <td>Item Count   </td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>Order Item Total</td>
                        <td>$ 110</td>
                    </tr>
                    <tr>
                        <td>Order Delivery Charges </td>
                        <td>$ 20</td>
                    </tr>
                    <tr>
                        <td>Coupon</td>
                        <td>-$ 20</td>
                    </tr>
                    <tr >
                        <td class="pt-2">  Net Payable Amount</td>
                        <td class="pt-2">$ 70</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>



    <div class="container">
        <div class="pending_btn">
        <button type="button" class="btn_pending">Pending</button>
        </div>
    </div>

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
