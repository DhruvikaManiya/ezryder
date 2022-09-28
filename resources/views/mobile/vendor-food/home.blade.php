@extends('layouts.vendor-food')

@section('content')
@include('mobile.vendor-food.inc.header')
<div class="container-maxx p-both">
    <div class="rw ">
        <div class="col-100">
            <h2 class="ord-title top30-m">Orders</h2>
            <table class="h-table w100 tab-height">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Amount</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td onclick="window.location='{{route('vendorfood.order-detail')}}'">#2901</td>
                        <td>09-03-2022</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td onclick="window.location='{{route('vendorfood.order-detail')}}'">#2901</td>
                        <td>09-03-2022</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td onclick="window.location='{{route('vendorfood.order-detail')}}'">#2901</td>
                        <td>09-03-2022</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td onclick="window.location='{{route('vendorfood.order-detail')}}'">#2901</td>
                        <td>09-03-2022</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td onclick="window.location='{{route('vendorfood.order-detail')}}'">#2901</td>
                        <td>09-03-2022</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td onclick="window.location='{{route('vendorfood.order-detail')}}'">#2901</td>
                        <td>09-03-2022</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td onclick="window.location='{{route('vendorfood.order-detail')}}'">#2901</td>
                        <td>09-03-2022</td>
                        <td>200</td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
