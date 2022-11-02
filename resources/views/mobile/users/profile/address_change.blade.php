@extends('layouts.ecommerce')
@section('content')
<div class="main-container no-padding navStyle addNewAddress" id="addBankDetails">
      <article id="top-nav">
        <div class="reviewBackButton">
          <img src="/pages/assets/loginScreen/leftArrow.png" alt="">
          <p>Add Address</p>
        </div>
        <p>
          <a href="{{route('address.add')}}">Add</a>
        </p>
      </article>
      <article class="items">
      	@foreach($addresses as $address)
        <a href="{{route('address.select',$address->id)}}" class="item">
          <article>
            
            <p>
              {{$address->full_address}}
            </p>
          </article>
        </a>
        @endforeach
       
      </article>
    </div>
@endsection