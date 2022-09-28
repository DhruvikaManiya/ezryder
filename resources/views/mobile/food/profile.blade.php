@extends('layouts.food')


@section('css')
<link rel="stylesheet" href="{{asset('asset/css/account.css')}}">

@endsection

@section('content')
    {{-- @include('mobile.food.inc.header') --}}
    <section class="account_det_sec">
        <div class="container">
            <div class="account_det">
                <!-- <img class="store_icon" src="{{asset('asset/images/5907.jpg')}}" alt="store icon"> -->
                @if(isset($data->profile))
                    <img class="store_icon" src="{{ asset($data->profile)}}" alt="store icon">
               @else
               <img class="store_icon" src="{{asset('asset/images/5907.jpg')}}" alt="store icon">
               @endif
                <div class="acc_cont">
                
                
                <!-- Auth::login($user); -->
                <!-- @if($id = Auth::user()->id) -->
                    <h4 class="stor_name">{{{Auth::user()->name}}}</h4>
                    {{-- <p class="text">D,293, Park Avenue,<br /> small vialla, canada</p> --}}
                    <p class="text">Email: {{{Auth::user()->email}}}</p>
                    <p class="text">Phone: {{{Auth::user()->phone}}}</p>
                    <!-- @endif -->
                    
                    
                </div>
            </div>
        </div>
    </section>
    <section class="account_link_sec">
        <div class="container">
            <div class="account_links">
                <a href="{{route('mobile.food.profile')}}" class="link">Profile</a>
                <a href="{{route('mobile.food.orderhistory')}}" class="link">Orders</a>
                <a href="{{route('mobile.logout')}}" class="link">Logout</a>
            </div>
        </div>
    </section>
@endsection
