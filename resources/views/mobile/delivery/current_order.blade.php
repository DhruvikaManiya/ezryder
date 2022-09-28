@extends('layouts.delivery')

@section('header_title', ' Orders')
@section('content')
    @include('mobile.delivery.inc.back-header')

    <section class="order-box">
        <div class="carrent-order space">
            <div class="order1">
                <p class="orde" id="current-btn">Current Orders</p>
            </div>
            <div class="order1">
                <p class="past" id="past-btn">Past Orders</p>
            </div>
        </div>
    </section>
    <!---order end--->
    <!---start amount--->
    <div class="container-max" >
        <div class="order-ce">
            <p class="you-pro">You profile is inactive, please complete your profile to get started</p>
           <a href="{{route('mobile.delivery.delivery_acount')}}"> <div class="com-pro">
                <h4>Complete Your Profile</h4>
            </div></a>
        </div>
    </div>
    @endsection

    @section('js')
    <script type="text/javascript">
        $('#current-btn').click(function(e) {
            e.preventDefault();
            $('.current-order').show();
            $('.past-order').hide();

            $('.order1 p').css('color', '#858585');
            $(this).css('color', '#008080');
        });
        $('#past-btn').click(function(e) {
            e.preventDefault();
            $('.current-order').hide();
            $('.past-order').show();
            $('.order1 p').css('color', '#858585');
            $(this).css('color', '#008080');
        });
    </script>
    @endsection