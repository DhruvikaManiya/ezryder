@extends('layouts.mobile-rider')
@section('header_title', 'Home')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

@endsection
@section('content')
  


@include('mobile.rider.inc.back-header')

    <section class="address_content space-both mt-30">

        <div class="container-max p-both">

            @foreach($requests as $item)
             <div class="col-12 pad-00 pb-3 ">
                <table>
                    <div class="frt-price-box-2 justi-s-b top-space30 p-both-25">
                        <div class="frt-b-data ml-11-m ">
                            <p class="order-heading space-id"><b>ID :</b> {{ \Illuminate\Support\Carbon::parse($item->created_at)->format('Ymdhms')  }} </p>
                            <a href="{{ route('mobile.rider.accept') }}">
                                <p class="  order-heading font-weight-bold name-tag1"> <i class="bi bi-person icon-3"></i>
                                    {{ $item->user->name }}</p>
                            </a>
                        </div>
                        <p class="pt-2 fw-600 mbb-4">Pickup Address :</p>
                        <p class="location  ml-0 ml-16 icon-i space-index">
<!--                            <img
                                src="http://127.0.0.1:8000/asset/images/clarity_map-marker-line.svg" class=" mr-1">-->
                            {{ $item->pick_address }}
                        </p>
                        <p class="pt-2 fw-600 mbb-4">Drop Address :</p>
                        <p class="location  ml-0 icon-i-2 ml-16 space-index">
<!--                            <img
                                src="http://127.0.0.1:8000/asset/images/clarity_map-marker-line.svg" class=" mr-1">-->
                            {{ $item->drop_address }}
                        </p>
                        <div class="d-flex justi-s-b pt-2">
                            <p class="pt-1 ml-0"><b>Charges : </b>$5</p>
                            <a class="home-bttn" href="{{ route('mobile.rider.book-view',[encrypt($item->id)]) }}"><button>View</button></a>
                        </div>
                    </div>
                </table>
            </div>
            @endforeach
        </div>


{{--        </div>--}}
{{--        </div>--}}
{{--        </div>--}}
    </section>


@endsection
