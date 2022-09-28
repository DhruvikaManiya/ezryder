@extends('layouts.vendor-food')

@section('header_title', 'Add Products')

@section('content')
    @include('mobile.vendor-food.inc.back-header')
    <div class="container-max p-both">
        <div class="rw">
            <div class="col-12 pad-00">

                <div class="product-box-g1 top-spc30 pos-rele">
                    <div class="category-select">
                        <select class="category-drop-down">
                            <option value="0">Select Category</option>
                            <option value="1">Cookie</option>
                            <option value="2">Burger</option>
                            <option value="3">Pizza</option>
                            <option value="3">Pastry</option>


                        </select>
                        <span class="ap-arrow1"><img src="{{ asset('asset/images/ap-arow.png') }}" alt=""></span>
                    </div>
                    <div class="category-select top-spc20 pos-rele">
                        <select class="category-drop-down">
                            <option value="0">Select Sub Category</option>
                            <option value="1">chocolate cookies</option>
                            <option value="2">Burger Bun</option>
                            <option value="3">Queen cheese pizza</option>
                            <option value="4">Black forest pastry</option>
                        </select>
                        <span class="ap-arrow1"><img src="{{ asset('asset/images/ap-arow.png') }}" alt=""></span>
                    </div>

                    <div class=" product-card-tab3">
                        <p class="top-spc20 prodct-title mb-0">Product Name</p>
                        <input type="text" placeholder="Product Name">
                    </div>

                    <div class="units-boxx top-spc20 pb-3">
                        <form action="{{route('vendorfood.products')}}" method="GET">
                            <div class="">
                                <!-- <div class="d-flex">
                                    <p>Units</p>
                                    <p class="ml-space32">Measurement</p>
                                </div>
                                <div class="d-flex">
                                    <p class="uni-box">1</p>
                                    <div class="Measurement1 ml-space12 pos-rele">
                                        <select class="category-drop-down">
                                            <option value="0">Kgs</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                        <span class="ap-arrow3"><img src="{{ asset('asset/images/ap-arow.png') }}"
                                                alt=""></span>
                                    </div>
                                </div> -->
                                <div class="product-dt ">
                                    <p class=" title-foods m-0 mb-10">Product Details</p>
                                    <input type="text" placeholder="Details over here" name="" id="">
                                </div>
                                <div class="pc-dt top-spc20">
                                    <p class="title-foods m-0 mb-10">Product Price</p>
                                    <input type="text" placeholder="10">

                                    <p class="top-spc20 title-foods m-0 mb-10">Discount %</p>
                                    <input type="text" placeholder="10">
                                </div>


                                <div class="img-uplod-box t-center top-spc20">
                                    <p class="title-foods m-0">Upload product <br> cover image</p>
                                </div>

                                <p class="title-foods m-0 top-spc20">Upload product images</p>
                                <div class="img-selector1 d-flex justi-s-b top10">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>

                                <div class="img-selector2 d-flex justi-s-b">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>

                                <div class="btn-sub text-c top-s43 mbot-20">
                                    <button class="btn" type="Submit">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
