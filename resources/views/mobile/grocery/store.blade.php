@extends('layouts.grocery')


@section('header_title', $store->name)
@section('css')
<style>
    .store-info{
        padding: 10px;
        margin-top: 10px !important;
        background: #00808033;
        width: 100%;
        margin: 0 auto;
    }
    .store-img img{
        width: 100%;
        object-fit: cover;
    }
    .store_name{
        font-size: 20px;
        font-weight: bold;
        color: #008080;
    }
    .sotre_details
    {
        font-size: 14px;
        color: #008080;
        display: flex;
    }
    .store_address{
        padding-left: 10px;
        font-size: 12px;
    }
</style>
@endsection

@section('content')
    @include('mobile.grocery.inc.back-header')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="store-info row">
                        <div class="store-img col-4">
                            <img src="{{ asset('asset/images/store-icon.svg') }}" alt="{{ $store->name }}">
                        </div>
                        <div class="store-details col-8">
                            <h4 class="store_name">{{ $store->name }}</h4>
                            <div class="sotre_details">
                                <div class="locatoin-icon">
                                    <img src="{{ asset('asset/images/clarity_map-marker-line.svg') }}" alt="location">
                                </div>
                                <div class="store_address">
                                    <p>A-510, TITANIUM CITY CENTER , 100 Feet Anand Nagar Rd, Ahmedabad, Gujarat 380015, India.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-5">

                    @foreach ($products as $pro)
                        <div class="col-6 mb-4">
                            <div class="card product-card position-relative">
                                <div class="card-header position-absolute d-flex justify-content-between">
                                    <img src="{{ asset('asset/images/green-hart.svg') }}" class="card-img-top"
                                        alt="...">
                                    <div class="discount d-flex align-items-center justify-content-center">10%</div>
                                </div>

                                <img src="{{ $pro->p_image }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $pro->name }}</h5>
                                    <h6>{{ $pro->user->name }}</h6>
                                    <p class="card-text">{{ $pro->units }} {{ $pro->measurement }}</p>
                                    <div class="rating">

                                        <input type="radio" name="rating" value="5" id="5"><label
                                            for="5">☆</label>
                                        <input type="radio" name="rating" value="4" id="4"><label
                                            for="4">☆</label>
                                        <input type="radio" name="rating" value="3" id="3"><label
                                            for="3">☆</label>
                                        <input type="radio" name="rating" value="2" id="2"><label
                                            for="2">☆</label>
                                        <input type="radio" name="rating" value="1" id="1"><label
                                            for="1">☆</label>
                                    </div>
                                    <div class="product-footer d-flex justify-content-between">
                                        <div class="price d-flex align-items-center">
                                            <span
                                                class="dis-price d-flex align-items-center text-muted"><s>${{ $pro->price }}</s></span>
                                            <span>${{ $pro->price - ($pro->price * $pro->Dis_price) / 100 }}</span>
                                        </div>
                                        <!-- <div class="add-cart d-flex align-items-center justify-content-between "
                                            onclick="window.location='{{ route('mobile.cart') }}'">
                                            <span class="plus-icon"><img src="{{ asset('asset/images/Group 70.svg') }}"></span>
                                            <span>Add</span>
                                        </div> -->
                                        <div class="add-cart d-flex align-items-center justify-content-between addCart{{ $pro->id }}"
                                            id="addCart" data-id="{{ $pro->id }}"
                                            style="{{ $pro->cart->count() > 0 ? 'display:none!important' : '' }}">
                                            <span class="plus-icon"><img
                                                    src="{{ asset('asset/images/Group 70.svg') }}"></span>
                                            <span>Add</span>
                                        </div>
                                        <div class="add-cart d-flex align-items-center justify-content-between "
                                            onclick="window.location='{{ route('mobile.cart') }}'"
                                            style="{{ $pro->cart->count() > 0 ? '' : 'display:none!important' }}"
                                            id="iscart{{ $pro->id }}">
                                            <span>Go to Cart </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    


@endsection
