@extends('layouts.food')


@section('css')
@endsection

@section('content')
@include('mobile.food.inc.header')
<section class="cart pt-3">
    <div class="container-fluid">
      <div class="cat-title-cart d-flex justify-content-between mb-3 section-title">
        <h3>Orders</h3>

      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
            <th scope="col">Amount</th>
          </tr>
        </thead>
        <tbody>
          @foreach($order_list as $order)
            
          <tr>
            <th scope="row" onclick="window.location='{{ route('mobile.food.orderdetailp',$order->id) }}'">{{ $order->id }}</th>
            <td>
              {{-- get only date --}}
              {{ date('d-m-Y', strtotime($order->created_at)) }}
              {{-- {{ $order->created_at }} --}}
            </td>
            <td>
              {{$order->status == 0 ? 'Pending' :($order->status == 1 ? 'Processing' :  ($order->status == 2 ? 'Delivered' : ($order->status == 5 ? 'Accepted' : 'Cancelled')))}}
          
            </td>
            <td>${{ $order->total}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>


    </div>
  </section>

  @endsection
