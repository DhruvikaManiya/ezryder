@extends('layouts.pharmacies')


@section('css')
@section('css')
    <style>
        .prodct-items .product-image {
            width: 150px;
            height: 90px;
        }
    </style>
@endsection

@endsection

@section('content')
@include('mobile.pharmacies.inc.header')
@if($carts->count() > 0)
<section class="cart pt-3">
    <div class="container-fluid">
        <div class="cat-title-cart d-flex justify-content-between mb-3 section-title">
            <h3>Your Cart</h3>

        </div>
        @php
            $total = 0;
            
        @endphp
        @foreach ($carts as $cart)

        <div class="row border-bottom mb-5 pb-5 prodct-items">
            <div class="col-4">
                <img src="{{ asset($cart->product->p_image) }}" class="product-image">
            </div>
            <div class="col-6 pl-5">
                <div class="product-footer d-flex justify-content-between flex-column">
                    <h3 class="cart-title mb-1">{{ $cart->product->name }}</h3>
                    <!-- <h6>{{ $cart->user->name }}</h6> -->
                    {{-- <p class="qty mb-2">1 pcs</p> --}}
                    <div class="price d-flex align-items-center mb-2">

                        <span class="dis-price d-flex align-items-center text-muted"
                            id='actual-price{{ $cart->id }}'><s>${{ $cart->quantity * $cart->product->MRP }}</s></span>
                        <span
                            id='discount-price{{ $cart->id }}'>${{ $cart->quantity * ($cart->product->Sellar_price + ($cart->product->Sellar_price * $cart->product->admin_charge) / 100) }}</span>
                    </div>
                    <div class="add-cart d-flex align-items-center justify-content-between ">
                        <span class="plus-icon mr-0 ml-2" id="mins-cart" data-id="{{ $cart->id }}"><img
                                src="{{ asset('asset/images/mini.svg') }}"></span>
                        <span id="qty{{ $cart->id }}">{{ $cart->quantity }}</span>

                        <span class="plus-icon" id="plus-cart" data-id="{{ $cart->id }}"><img
                                src="{{ asset('asset/images/Group 70.svg') }}"></span>
                    </div>
                </div>

            </div>
        </div>
        @php
            $total += $cart->quantity * ($cart->product->Sellar_price + ($cart->product->Sellar_price * $cart->product->admin_charge) / 100);
        @endphp
    @endforeach



    </div>
</section>
<section class="checkFooter mb-4 pt-5 pb-3">
    <div class="container-fluid ">
        <div class="checkout theme-bg py-3 w-100 px-2 d-flex justify-content-between"
            onclick="window.location='{{ route('mobile.pharma.pharmacheckout') }}'">

            <label class="items text-white mb-0">{{ $carts->count() }} Items: $ <span
                    id="total">{{ $total }}</span></label>
            <label class="text-white chkOut mb-0">Checkout <img src="{{ asset('asset//images/arrow-right.png') }}"
                    class="ml-2"></label>

        </div>
    </div>
</section>
@else

    <h3>No Item in cart</h3>

@endif

@endsection


@section('js')
<script>
    $('body').on('click', '#plus-cart', function() {

        var id = $(this).data('id');

        $.ajax({

            url: "{{ route('mobile.pharma.plustocart') }}",
            // type: "POST",
            data: {
                // "_token": "{{ csrf_token() }}",
                "id": id,
                "opretion": 'plus',
            },
            success: function(response) {
                console.log(response);
                console.log(response.data.cart.id);
                $('#qty' + response.data.cart.id).html(response.data.cart.quantity);
                $('#discount-price' + response.data.cart.id).html("$" + response.data
                .product_total);
                $('#total').html(response.data.total);
            }
        });

    })

    $('body').on('click', '#mins-cart', function() {

        var id = $(this).data('id');

        $.ajax({

            url: "{{ route('mobile.pharma.mistocart') }}",
            // type: "POST",
            data: {
                // "_token": "{{ csrf_token() }}",
                "id": id,
                "opretion": 'plus',
            },
            success: function(response) {
                console.log(response.data.id);
                $('#qty' + response.data.cart.id).html(response.data.cart.quantity);
                $('#discount-price' + response.data.cart.id).html("$" + response.data
                .product_total);
                $('#total').html(response.data.total);
                if (response.data.cart.quantity == 0) {
                    $('#qty' + response.data.cart.id).parent().parent().parent().parent().remove();
                }
            }
        });

    })
</script>
@endsection
