@extends('layouts.vendor-food')
@section('header_title','Orders')
@section('css')
<link rel="stylesheet" href="{{asset('asset/css/account.css')}}">
@endsection
@section('content')
@include('mobile.vendor-food.inc.back-header')

<section class="account">
    <div class="container-max p-both">
        <div class="rw">
            <div class="col-12 pad-00 pb-3">
                <div class="frt-price-box d-flex justi-s-b top-space30">
                    <div class="frt-b-data ml-11-m">
                        <p><b>ID : </b>2901 </p>
                        <p><span class="mr-5"><i class="bi bi-truck "></i></span>Delivered</p>
                        <p><i class="bi bi-person"></i> Brijesh Mishra</p>
                        <p><span class="icn"><i class="bi bi-geo-alt"></i></span >D293, Laxmikrup, Arbudanagar, odhav, Ahmedabad</p>
                        <p><span><i class="bi bi-calendar"></i></span>02/07/2022</p>
                    </div>
                </div>
            </div>
            <div class="col-12 pad-00 pb-3">
                <div class="frt-price-box d-flex justi-s-b top-space30">
                <div class="frt-b-data ml-11-m">
                        <p><b>ID : </b>2901 </p>
                        <p><span class="mr-5"><i class="bi bi-truck "></i></span>Pending</p>
                        <p><i class="bi bi-person"></i> Brijesh Mishra</p>
                        <p><span class="icn"><i class="bi bi-geo-alt"></i></span >D293, Laxmikrup, Arbudanagar, Odhav, Ahmedabad</p>
                        <p><span><i class="bi bi-calendar"></i></span> 02/07/2022</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
