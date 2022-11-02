@extends('layouts.food')



@section('css')
    <style>
        .form-addr-input {
            margin-top: 0.3rem;
            margin-left: -1.25rem;
            width: 100%;
            position: relative;
            padding: 5px 10px;
            border: 1px solid rgb(61, 61, 61);
            border-radius: 5px;
        }

        ::placeholder {
            display: block;
            color: rgb(61, 61, 61) !important;
        }

        .checkOut {
            width: 100%;
            padding: 0 16px;
        }

        ::-webkit-input-placeholder {
            color: rgb(61, 61, 61) !important;
        }

        textarea {
            outline: none;
            color: rgb(61, 61, 61) !important;
        }

        .p_0 {
            padding: 0;
        }
    </style>
@endsection
@section('content')
@include('mobile.food.inc.header')
    <section class="cart pt-5">
        <div class="container-fluid">
            <div class="delivery-option d-flex justify-content-between mb-4">
                <div class="form-check text-center delivery">
                    <img src="{{ asset('asset/images/check-circle.png') }}">
                    <p> Delivery Options</p>
                </div>
                <div class="form-check text-center deliveryAddres">
                    <label class="form-check-label" for="radio2">
                        <input type="radio" class=" " id="radio2" name="optradio" value="option2" readonly>
                    </label><br>
                    <p>Delivery Address</p>
                </div>
                <div class="form-check text-center deliveryAddres pay">
                    <label class="form-check-label" for="radio2">
                        <input type="radio" class=" " id="radio2" name="optradio" value="option2" readonly>
                    </label>
                    <p>Payment</p>
                </div>
            </div>
            <div class="cat-title-cart d-flex justify-content-between mb-4 section-title">
                <h3>Delivery Address</h3>

            </div>
            <form action="{{route('mobile.food.payment')}}" class="checkOut p_0" method="POST">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <div class="d-flex justify-content-between mb-4">
                    @if ($order_type == 1)
                        <div class="form-check w-100">
                            <input type="number" placeholder="House No" class="form-addr-input" name="home_no" required>
                            @error('home_no')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                    @else
                        <div class="form-check w-100">
                            <input type="number" placeholder="Office No" class="form-addr-input" name="home_no" required>
                            @error('home_no')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif

                    <div class="form-check w-100">
                        <input type="text" placeholder="Street" class="form-addr-input" name="street" required> 
                        @error('street')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <div class="form-check w-100">
                        <textarea type="text" placeholder="Address" class="form-addr-input" name="address" rows="2" cols="" required></textarea>
                        @error('address')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <div class="form-check">
                        <input type="text" class="form-addr-input" placeholder="City" name="city" required>
                        @error('city')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="form-check">
                        <input type="text" class="form-addr-input" placeholder="State" name="state" required>
                        @error('state')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <div class="form-check w-100">
                        <input type="number" placeholder="PIN Code" class="form-addr-input" name="pin" required> 
                        @error('pin')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                    </div>
                </div>
                <button class="theme-bg btn nexBtn mb-5 mt-5">Next</button>
            </form>
        </div>
    </section>
@endsection
