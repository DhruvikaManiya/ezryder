@extends('layouts.pharmacies')


@section('css')
@endsection

@section('content')
@include('mobile.pharmacies.inc.header')
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
        @foreach($order as $orders)
            
          <tr>
            <th scope="row" onclick="window.location='{{ route('mobile.pharma.orderdetailp',$orders->id) }}'">{{ $orders->id }}</th>
            <td>
            {{-- get only date --}}
              {{ date('d-m-Y', strtotime($orders->created_at)) }}
              {{-- {{ $orders->created_at }} --}}
            </td>
            <td>
            
            {{ $orders->status==0?'Pending':($orders->status == 1?'Processing':($orders->status == 4 ?'Accepted':'Cancelled')) }}
            </td>
            <td>${{ $orders->total}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>


    </div>
  </section>

  @endsection
