@extends('layouts.vendor')

@section('content')
    @include('mobile.vendor.inc.header')

    <div class="container-max">
        <div class="dash-box">
            <div class="pan" onclick="window.location='{{ route('vendor.pendingorders') }}'">
                <h3 class="pan_od">Pending <br>orders</h3>
                <p class="ten">{{ $pending_orders }}</p>
            </div>
            <div class="pan" onclick="window.location='{{ route('vendor.completeorders') }}'">
                <h3 class="pan_od">Completed <br>orders</h3>
                <p class="ten">{{ $completed_orders }}</p>
            </div>
        </div>
        <div class="dash-box">
            <div class="pan" onclick="window.location='{{ route('vendor.products') }}'">
                <h3 class="pan_od">Active<br> products</h3>
                <p class="ten">{{ $active_products }}</p>
            </div>
            <div class="pan" onclick="window.location='{{ route('vendor.products') }}'">
                <h3 class="pan_od">In active <br>products</h3>
                <p class="ten">{{ $inactive_products }}</p>
            </div>
        </div>
        <div class="dash-box">
            <div class="pan" onclick="window.location='{{ route('vendor.wallet') }}'">
                <h3 class="pan_od">Total<br> earnings</h3>
                <p class="ten">$300</p>
            </div>
            <div class="pan" onclick="window.location='{{ route('vendor.review') }}'">
                <h3 class="pan_od">Total<br> reviews</h3>
                <p class="ten">250</p>
            </div>
        </div>
    </div>
@endsection
