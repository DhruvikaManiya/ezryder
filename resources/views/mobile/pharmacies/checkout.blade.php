@extends('layouts.pharmacies')


@section('css')
@endsection

@section('content')
    @include('mobile.pharmacies.inc.header')
    <section class="cart pt-5">
        <div class="container-fluid">


            <div class="delivery-option d-flex justify-content-between mb-4">
                <div class="form-check text-center delivery">
                    <img src="{{ asset('asset/images/check-circle.png') }}">
                    <p> Delivery Options</p>
                </div>
                <div class="form-check text-center deliveryAddres">
                    <label class="form-check-label" for="radio2">
                        <input type="radio" class=" " id="radio2" name="optradio" value="option2">
                    </label><br>
                    <p>Delivery Address</p>
                </div>
                <div class="form-check text-center deliveryAddres pay">
                    <label class="form-check-label" for="radio2">
                        <input type="radio" class=" " id="radio2" name="optradio" value="option2">
                    </label>
                    <p>Payment</p>
                </div>
            </div>
            <div class="cat-title-cart d-flex justify-content-between mb-4 section-title">
                <h3>Select Delivery</h3>

            </div>
            <form action="{{ route('mobile.pharma.orderAddress') }}" class="checkOut" method="POST">
                @csrf
                <div class="d-flex justify-content-between mb-4">
                    <label>At Home</label>
                    <div class="form-check">
                        <label class="form-check-label" for="radio2">
                            <input type="radio" class="form-check-input" id="radio2" name="order_type" value="1">
                        </label>
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <label>At Office</label>
                    <div class="form-check">
                        <label class="form-check-label" for="radio2">
                            <input type="radio" class="form-check-input" id="radio2" name="order_type" value="2">
                        </label>
                    </div>
                </div>
                
                <button class="theme-bg btn nexBtn mb-5 mt-5"
                   >Next</button>
            </form>
        </div>
    </section>
@endsection
