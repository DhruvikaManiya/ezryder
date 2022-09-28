@extends('layouts.grocery')


@section('css')
@endsection

@section('content')
    @include('mobile.grocery.inc.header')
    <section class="cart pt-5">
        <div class="container-fluid">


            <div class="delivery-option d-flex justify-content-between mb-4">
                <div class="form-check text-center delivery pl-0">
                    <img src="{{ asset('asset/images/check-circle.png') }}">
                    <p> Delivery Options</p>
                </div>
                <div class="form-check text-center delivery ">
                    <img src="{{ asset('asset/images/check-circle.png') }}">
                    <p> Delivery Address</p>
                    {{-- <label class="form-check-label" for="radio2">
            <input type="radio" class=" " id="radio2" name="optradio" value="option2">
          </label><br>
          <p>Delivery Address</p> --}}
                </div>
                <div class="form-check text-center deliveryAddres pay">
                    <label class="form-check-label" for="radio2">
                        <input type="radio" class=" " id="radio2" name="optradio" value="option2">
                    </label>
                    <p>Payment</p>
                </div>
            </div>
            <div class="cat-title-cart d-flex justify-content-between mb-4 section-title">
                <h3>Select Payment</h3>

            </div>
            <form action="{{ route('mobile.order') }}" class="checkOut">
              @csrf
              <input type="hidden" name="order_id" value="{{ $order_addres->order_id }}">
                <div class="d-flex justify-content-between mb-4">
                    <label>Cash on Delivery</label>
                    <div class="form-check">
                        <label class="form-check-label" for="radio2">
                            <input type="radio" class="form-check-input" id="radio2" name="method" value="1">
                        </label>
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <label>UPI / Online</label>
                    <div class="form-check">
                        <label class="form-check-label" for="radio2">
                            <input type="radio" class="form-check-input" id="radio2" name="method" value="2">
                        </label>
                    </div>
                </div>
                <button class="theme-bg btn nexBtn mb-5 mt-5" type="submit">Next</button>
            </form>
        </div>
    </section>
@endsection
