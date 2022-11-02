@extends('layouts.ecommerce')
@section('content')
    <div class="main-container no-padding navStyle groceryStoresPopular" id="addBankDetails">
        <article id="top-nav">
            <div class="reviewBackButton" onclick="history.back();">
                <img src="{{asset('asset/images/loginScreen/leftArrow.png')}}" alt="">
                <p>{{$title}}</p>
            </div>
        </article>

        
        <article class="stores">
            @foreach ($stores as $store)
            <div class="store">
                <img src="{{asset($store->logo)}}" width="117px" alt="">
                <section class="desc">
                    <p class="name">{{$store->name}}</p>
                    <div>
                        <img src="{{asset('asset/images/groceryStoresPopular/chart.png')}}" alt="">
                        <p>Open Today: 8 AM - 6 PM</p>
                    </div>
                    <div>
                        <img src="{{asset('asset/images/groceryStoresPopular/location.png')}}" alt="">
                        <p>
                            {{$store->address}} , {{$store->city}} , {{$store->state}} , {{$store->country}}
                        </p>
                    </div>
                </section>
            </div>
            @endforeach
          
        </article>

      @include('layouts.partials.user_footer_nav')
    </div>
@endsection
