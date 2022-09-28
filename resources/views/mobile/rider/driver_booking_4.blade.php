@extends('layouts.mobile-rider')

<!-- @section('header_title','Home') -->
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

@endsection
@section('content')
<!-- @include('mobile.vendor.inc.back-header') -->
<header class="header">
    <div class="container">
   <h1 class="header_title_2">Home</h1>
        
    </div>
</header>

<section class="address_content space-both mt-30">

    <div class="container-max p-both">
        <div class="rw">
            <div class="col-12 pad-00 pb-3 ">
                <table>
                    <div class="frt-price-box-2 justi-s-b top-space30 p-both-25">
                        <div class="frt-b-data ml-11-m ">
                            <p class="order-heading space-id"><b>ID :</b> 1234 </p>
                    <a href="{{route('mobile.rider.driver_book')}}"> <p class="  order-heading font-weight-bold name-tag1"> <i class="bi bi-person icon-3"></i> John Due</p>
                           
                        </div>
                        <p class="pt-2 fw-600 mbb-4">Pickup Address :</p>
                        <p class="location  ml-0 ml-16 icon-i space-index"><img src="http://127.0.0.1:8000/asset/images/clarity_map-marker-line.svg" class=" mr-1">D293, Laxmikrup,
                            D293, Laxmikdrupa, Arbadnagar, Odahv, Ahmedabad
                        </p>
                        <p class="pt-2 fw-600 mbb-4">Drop Address :</p>
                        <p class="location  ml-0 icon-i-2 ml-16 space-index"><img src="http://127.0.0.1:8000/asset/images/clarity_map-marker-line.svg" class=" mr-1">D293, Laxmikrup,
                            A510, Titanium City Center, Anand Nagar, Road, Prahlad Nagar, Ahmedabad
                        </p>
                        <div class="d-flex justi-s-b pt-2">
                            <p class="pt-1 ml-0"><b>Charges : </b>$5</p>

                            <a class="home-bttn" href="{{route('mobile.rider.driver_bookdetails')}}"><button>Accept</button></a>
                        </div>
                    </div>
                </table>
            </div>



        </div>
        <div class="col-12 pad-00 pb-3 ">
            <table>
                <div class="frt-price-box-2 justi-s-b top-space30 p-both-25">
                    <div class="frt-b-data ml-11-m ">
                        <p class="order-heading space-id"><b>ID :</b> 1234 </p>
                        <a href="{{route('mobile.rider.driver_book')}}"> <p class="  order-heading font-weight-bold name-tag1"> <i class="bi bi-person icon-3"></i> John Due</p>
   
                    </div>
                    <p class="pt-2 fw-600 mbb-4">Pickup Address :</p>
                    <p class="location  ml-0 ml-16 icon-i space-index"><img src="http://127.0.0.1:8000/asset/images/clarity_map-marker-line.svg" class=" mr-1">D293, Laxmikrup,
                        D293, Laxmikdrupa, Arbadnagar, Odahv, Ahmedabad
                    </p>
                    <p class="pt-2 fw-600 mbb-4">Drop Address :</p>
                    <p class="location  ml-0 icon-i-2 ml-16 space-index"><img src="http://127.0.0.1:8000/asset/images/clarity_map-marker-line.svg" class=" mr-1">D293, Laxmikrup,
                        A510, Titanium City Center, Anand Nagar, Road, Prahlad Nagar, Ahmedabad
                    </p>
                    <div class="d-flex justi-s-b pt-2">
                        <p class="pt-1 ml-0"><b>Charges : </b>$5</p>
                        <a class="home-bttn" href="{{route('mobile.rider.driver_bookdetails')}}"><button>Accept</button></a>
                    </div>
                </div>
            </table>
        </div>



    </div>
    <div class="col-12 pad-00 pb-3 ">
        <table>
            <div class="frt-price-box-2 justi-s-b top-space30 p-both-25">
                <div class="frt-b-data ml-11-m ">
                    <p class="order-heading space-id"><b>ID :</b> 1234 </p>
                    <a href="{{route('mobile.rider.driver_book')}}"> <p class="  order-heading font-weight-bold name-tag1"> <i class="bi bi-person icon-3"></i> John Due</p>
 </div>
                <p class="pt-2 fw-600 mbb-4">Pickup Address :</p>
                <p class="location  ml-0 ml-16 icon-i space-index"><img src="http://127.0.0.1:8000/asset/images/clarity_map-marker-line.svg" class=" mr-1">D293, Laxmikrup,
                    D293, Laxmikdrupa, Arbadnagar, Odahv, Ahmedabad
                </p>
                <p class="pt-2 fw-600 mbb-4">Drop Address :</p>
                <p class="location  ml-0 icon-i-2 ml-16 space-index"><img src="http://127.0.0.1:8000/asset/images/clarity_map-marker-line.svg" class=" mr-1">D293, Laxmikrup,
                    A510, Titanium City <br> Center, Anand Nagar, Road, Prahlad Nagar,<br> Ahmedabad
                </p>
                <div class="d-flex justi-s-b pt-2">
                    <p class="pt-1 ml-0"><b>Charges : </b>$5</p>

                    <a class="home-bttn" href="{{route('mobile.rider.driver_bookdetails')}}"><button>Accept</button></a>
                </div>
            </div>
        </table>
    </div>



    </div>
    </div>
    </div>
</section>


@endsection