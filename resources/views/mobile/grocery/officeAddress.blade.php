@extends('layouts.grocery')



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
            <form action="{{route('mobile.payment')}}" class="checkOut p_0">
                <div class="d-flex justify-content-between mb-4">
                    <div class="form-check w-100">
                        <input type="text" placeholder="building No" class="form-addr-input" name="address"> </input>
                    </div>
                    <div class="form-check w-100">
                        <input type="text" placeholder="Street" class="form-addr-input" name="address"> </input>
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <div class="form-check w-100">
                        <textarea type="text" placeholder="Address" class="form-addr-input" name="address" rows="2" cols=""></textarea>
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <div class="form-check">
                        <input type="text" class="form-addr-input" placeholder="City" name="city">
                    </div>
                    <div class="form-check">
                        <input type="text" class="form-addr-input" placeholder="State" name="state">
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <div class="form-check w-100">
                        <input type="text" placeholder="PIN Code" class="form-addr-input" name="pin">
                    </div>
                </div>
                <button class="theme-bg btn nexBtn mb-5 mt-5" onclick="window.location='{{route('mobile.payment')}}'">Next</button>
            </form>
        </div>
    </section>
@endsection
