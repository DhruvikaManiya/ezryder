@extends('layouts.delivery')
@section('header_title','Bank Details')
@section('css')
<link rel="stylesheet" href="{{ asset('asset/css/order-detail.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('asset/css/account.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('asset/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/delivry.css') }}">
    <style>
        .save {
            display: block;
            background: #008080;
            border-radius: 5px;
            padding: 13px;
            width:40%;
            /* margin-right: 20%; */
            text-align: center;
            font-weight: 500;
            font-size: 18px;
            line-height: 23px;
            color: #FFFFFF;
        }

        .d-flex{
            display: flex;
        }

        .just-c-e{
            justify-content: space-evenly;
        }
        .error-box {
            padding: 10px;
            margin-bottom: 10px;
        }

        .error-mgs {
            color: rgb(167, 14, 14);
            font-weight: 600;
            text-align: left;
        }
    </style>

@endsection
@section('content')
@include('mobile.delivery.inc.back-header')

{{-- <section class="account_det_sec">
    <div class="container">
        <div class="amount-box">
            <div class="amount-left">
            <p class="user"><span><b>A/C No :</b> 1234 5454 5555 5555</span></p>
                <p class="user"><span><b> IFSC : </b>ABCD0001234</span></p>
                <p class="user"><span><b>City</b> : Ahmedabad</span></p>
                <p class="user"><span><b>State :</b>  Gujarat</span></p>
            </div>
        </div>
    </div>
</section> --}}


    <section class="profile">
        <form action="{{route('delivery.bankdetail.update')}}" method="POST">
            @csrf
            @foreach ($bank as $data )
                
            <h3 class="mt-08">Edit Bank Information </h3>
           {{-- @dd($bank); --}}
            <input type="hidden" name="id" class="form_control" value="{{$data->id}}" placeholder="Abc"  required >

            <label>Bank Name</label>
            <input type="text" name="bank_name" class="form_control" placeholder="Abc" value="{{ $data->bank_name}}"  required  >
            @error('bank_name')
            <p class="error-mgs">
                @error('bank_name')
                    <strong>{{ $message }}</strong>
                @enderror
            </p>
            @enderror
            <label>Beneficiary Name</label>
            <input type="text" name="act_name" class="form_control" placeholder="Abc" value="{{ $data->act_name}}" required  >
            <p class="error-mgs">
                @error('act_name')
                    <strong>{{ $message }}</strong>
                @enderror
            </p>
            <label>Account Number</label>
            <input type="password" name="act_no" class="form_control"  required placeholder="123456789" value="{{ $data->act_no}}" required>
            <p class="error-mgs">
                @error('act_no')
                    <strong>{{ $message }}</strong>
                @enderror
            </p>
        <label>Confirm Account Number</label>
        <input type="number" name="act_no_confirm" class="form_control"  required placeholder="123456789"  value="{{ $data->act_no}}" required>
        <p class="error-mgs">
            @error('act_no_confirm')
                <strong>{{ $message }}</strong>
            @enderror
        </p>
            <label>IFSC Code</label>
            <input type="text" name="ifsc_code" class="form_control" placeholder="ABCD1234" value="{{ $data->ifsc_code}}" required>
            <p class="error-mgs">
                @error('ifsc_code')
                    <strong>{{ $message }}</strong>
                @enderror
            </p>
        
        <div class="d-flex just-c-e btn-pos">
            <button class="theme-bg btn nexBtn fs-25 mb-5 mt-5 btn-w">Update</button>
        </div>
        @endforeach
        </form>
    </section>

@endsection
