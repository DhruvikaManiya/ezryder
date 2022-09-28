@extends('layouts.vendor-food')

@section('header_title', 'Products')

@section('content')
    @include('mobile.vendor-food.inc.back-header')

    <div class="container-max p-both">
        <div class="rw">
            <div class="col-12 pad-00 pb-3">
                <div class="search-box top-space30 pos-rele">
                    
                    <input type="text" placeholder="Search">
                    <span><img src="{{asset('asset/images/search.svg')}}" alt=""></span>
                </div>
                <div class="frt-price-box d-flex justi-s-b top-space30">
                    <div>
                        <img src="{{ asset('asset/images/food5.jpg') }}" alt="">
                    </div>


                    <div class="frt-b-data ml-11-m ml-3">
                        <p>Cookie </p>
                        <p>Set of 12 Pcs</p>
                        <p><del>$2</del> $1</p>
                    </div>
                    <div>
                        <p class="stock">In Stock</p>
                    </div>
                </div>

                <div class="frt-price-box d-flex justi-s-b top-space30">
                    <div>
                        <img src="{{ asset('asset/images/food2.jpg') }}" alt="">
                    </div>


                    <div class="frt-b-data ml-11-m ml-3">
                        <p>Burger </p>
                        <p>Set of 1 Pcs</p>
                        <p><del>$2</del> $1</p>
                    </div>
                    <div>
                        <p class="stock">In Stock</p>
                    </div>
                </div>
                <div class="frt-price-box d-flex justi-s-b top-space30">
                    <div>
                        <img src="{{ asset('asset/images/food3.jpg') }}" alt="">
                    </div>


                    <div class="frt-b-data ml-11-m ml-3">
                        <p>Pizza </p>
                        <p>Set of 1 Pizza</p>
                        <p><del>$2</del> $1</p>
                    </div>
                    <div>
                        <p class="stock">In Stock</p>
                    </div>
                </div>
                <div class="bottom-space30 frt-price-box d-flex justi-s-b top-space30">
                    <div>
                        <img src="{{ asset('asset/images/food4.jpg') }}" alt="">
                    </div>


                    <div class="frt-b-data ml-11-m ml-3">
                        <p>Pastry </p>
                        <p>Set of 1 Pcs</p>
                        <p><del>$2</del> $1</p>
                    </div>
                    <div>
                        <p class="stock">In Stock</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
