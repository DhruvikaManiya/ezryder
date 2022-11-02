@extends('layouts.delivery')
@section('header_title', 'Orders History')

@section('css')
    <style>
        .order_id {
            font-weight: 600;

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
    @include('mobile.delivery.inc.back-header')


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
                                <th scope="row"><a href="{{ route('delivery.order-detail-p',$order->id) }}"
                                        class="order_id">{{$loop->iteration}}</a></th>
                                <td>
                                    {{-- get only date --}}
                                    {{ date('d-m-Y', strtotime($order->created_at)) }}
                                    {{-- {{ $order->created_at }} --}}
                                </td>
                                <td>
                                    ${{ $order->total }}
                                </td>
                                <td class="status">
                                   
                                    @if ($order->status == 0)
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($order->status == 1)
                                        <span class="badge badge-info">Processing</span>
                                    @elseif($order->status == 2)
                                        <span class="badge badge-success">Delivered</span>
                                    @elseif($order->status == 3)    
                                        <span class="badge badge-danger">Cancelled</span>
                                    @elseif($order->status == 4)    
                                        <span class="badge badge-success">Accepted</span>
                                    @elseif($order->status == 5)
                                        <span class="badge badge-success">Accepted</span>
                                    @endif

                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection
