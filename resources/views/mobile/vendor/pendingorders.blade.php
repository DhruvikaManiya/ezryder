@extends('layouts.vendor')
@section('header_title', 'Pending Orders')

@section('css')
    <style>
        .order_id {
            font-weight: 600;
            text-decoration: none;
            color: #008080;
        }

        .status {
            font-weight: 400;
            font-size: 16px;
            color: #444444;
        }

        .status_th {
            font-weight: 600;
            font-size: 21px;
            color: #008080;
            

        }

        .tab_1 th{
            width: 10px !important;
            padding: 0 !important;
        }
        .h-table tbody tr td:nth-child(2){
            font-size: 15px;
            padding-left: 0px;
            width: 34%;
        }
        .h-table tbody tr td:nth-child(3) {
            font-size: 16px;
            padding-left: 0;
        }
    </style>
@endsection
@section('content')
    @include('mobile.vendor.inc.back-header')


    <div class="container-maxx p-both">
        <div class="rw ">
            <div class="col-100">
                <!-- <h2 class="ord-title top30-m">Orders</h2> -->
                <table class="h-table w100 tab-height mt88 tab-head1">

                    <thead class="text-center">
                        <tr class="tab_1">
                            <th>ID</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th >Status</th>

                        </tr>
                    </thead>


                    <tbody class="text-center">
                        @foreach ($order_list as $order)

                            <tr>
                                <th scope="row"><a href="{{ route('vendor.order-detail-p',$order->id) }}"
                                        class="order_id">{{ $order->id }}</a></th>
                                <td>
                                    {{-- get only date --}}
                                    {{ date('d-m-Y', strtotime($order->created_at)) }}
                                    {{-- {{ $order->created_at }} --}}
                                </td>
                                <td>
                                    ${{ $order->total }}
                                </td>
                                <td class="status">
                                    {{ $order->status == 0 ? 'Pending' : ($order->status == 1 ? 'Pending' : ($order->status == 2 ? 'Delivered' : ($order->status == 4 ? 'Accepted' : 'Cancelled'))) }}

                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection
