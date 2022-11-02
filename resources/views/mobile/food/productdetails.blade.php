@extends('layouts.food')

@section('header_title', 'Product Details')

@section('css')
@endsection

@section('content')
    @include('mobile.vendor.inc.back-header')
    <section class="banner position-reltive"
        style="background:url({{ asset($item->p_image) }}) top center no-repeat;    background-size: 200% 100%;">
        <div class="popUp">
            <div class="container-fluid">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between ">
                        <h5 class="card-title mb-0">{{ $item->name }} </h5>
                        <!-- <div class="add-cart d-flex align-items-center justify-content-between "
                                    onclick="window.location='{{ route('mobile.food.cart') }}'">

                                    <span class="plus-icon"><img src="{{ asset('asset/images/Group 70.svg') }}"></span>
                                    <span>Add</span>
                                </div> -->
                        <div class="add-cart d-flex align-items-center justify-content-between addCart{{ $item->id }}"
                            id="addCart" data-id="{{ $item->id }}"
                            style="{{ $item->cart->count() > 0 ? 'display:none!important' : '' }}">
                            <span class="plus-icon"><img src="{{ asset('asset/images/Group 70.svg') }}"></span>
                            <span>Add</span>
                        </div>
                        <div class="add-cart d-flex align-items-center justify-content-between "
                            onclick="window.location='{{ route('mobile.food.cart') }}'"
                            style="{{ $item->cart->count() > 0 ? '' : 'display:none!important' }}"
                            id="iscart{{ $item->id }}">
                            <span>Go to Cart </span>
                        </div>
                    </div>
                    <!--  <h6>DMart Kirana Store</h6> -->

                    <div class="rating">

                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                    </div>
                    <p class="card-text">1 Pcs</p>
                    <div class="product-footer d-flex justify-content-between">
                        <div class="price d-flex align-items-center">
                            <span class="dis-price d-flex align-items-center text-muted"><del>${{ $item->MRP }}</del>
                            </span>
                            <span> ${{ $item->Sellar_price + ($item->Sellar_price * $item->admin_charge) / 100 }}</span>
                        </div>

                    </div>
                    <h6>{{ $item->user->name }}</h6>
                    <p>{{ $item->description }}.</p>
                </div>
                <div class="row pt-5">

                    @foreach ($products as $pro)
                        <div class="col-6 mb-4">
                            <div class="card product-card position-relative">
                                <div class="card-header position-absolute d-flex justify-content-between">

                                    <img src="{{ asset('asset/images/green-hart.svg') }}"
                                        class="wishlist{{ $pro->id }}" data-id="{{ $pro->id }}"
                                        style="{{ $pro->Wishlist->count() > 0 ? 'display:none!important' : '' }}"
                                        id="wishlist">


                                    <img src="{{ asset('asset/images/heart.png') }}"
                                        class="wishlistRemove{{ $pro->id }}"data-id="{{ $pro->id }}"
                                        style="{{ $pro->Wishlist->count() > 0 ? '' : 'display:none!important' }}"
                                        id="wishlist">


                                    @php
                                        $prod = ((($pro->Sellar_price + ($pro->Sellar_price * $pro->admin_charge) / 100) * 100) / $pro->MRP);
                                        $discount = 100 - $prod;
                                        //    $discount = round($discount);
                                    @endphp
                                    <div class="discount d-flex align-items-center justify-content-center">
                                        {{ $discount }}%
                                    </div>
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
                                            <span class="dis-price d-flex align-items-center text-muted">
                                                <s>${{ $pro->MRP }}</s>
                                            </span>

                                            <span>
                                                ${{ $pro->Sellar_price + ($pro->Sellar_price * $pro->admin_charge) / 100 }}</span>
                                        </div>

                                        <!-- <div class="add-cart d-flex align-items-center justify-content-between "
                                                onclick="window.location='{{ route('mobile.food.cart') }}'">
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
                                            onclick="window.location='{{ route('mobile.food.cart') }}'"
                                            style="{{ $pro->cart->count() > 0 ? '' : 'display:none!important' }}"
                                            id="iscart{{ $pro->id }}">
                                            <span>Go to Cart </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- <div class="col-6 mb-4">
                                <div class="card product-card position-relative">
                                    <div class="card-header position-absolute d-flex justify-content-between">
                                        <img src="{{ asset('asset/images/green-hart.svg') }}" class="card-img-top" alt="...">
                                        <div class="discount d-flex align-items-center justify-content-center">10%</div>
                                    </div>

                                    <img src="{{ asset('asset/images/banana.png') }}" class="card-img-top" alt="..."
                                        >
                                    <div class="card-body">
                                        <h5  class="card-title">
                                            ABC Store - Banana </h5>
                                        <h6>DMart Kirana Store</h6>
                                        <p class="card-text">1 Pcs</p>
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
                                                <span class="dis-price d-flex align-items-center text-muted"><s>$2</s></span>
                                                <span>$1</span>
                                            </div>
                                            <div class="add-cart d-flex align-items-center justify-content-between "
                                                onclick="window.location='{{ route('mobile.cart') }}'">
                                                <span class="plus-icon"><img
                                                        src="{{ asset('asset/images/Group 70.svg') }}"></span>
                                                <span>Add</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-4">
                                <div class="card product-card position-relative">
                                    <div class="card-header position-absolute d-flex justify-content-between">
                                        <img src="{{ asset('asset/images/green-hart.svg') }}" class="card-img-top"
                                            alt="...">
                                        <div class="discount d-flex align-items-center justify-content-center">10%</div>
                                    </div>

                                    <img src="{{ asset('asset/images/banana.png') }}" class="card-img-top" alt="..."
                                        >
                                    <div class="card-body">
                                        <h5  class="card-title">
                                            ABC Store - Banana </h5>
                                        <h6>DMart Kirana Store</h6>
                                        <p class="card-text">1 Pcs</p>
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
                                                <span class="dis-price d-flex align-items-center text-muted"><s>$2</s></span>
                                                <span>$1</span>
                                            </div>
                                            <div class="add-cart d-flex align-items-center justify-content-between "
                                                onclick="window.location='{{ route('mobile.cart') }}'">
                                                <span class="plus-icon"><img
                                                        src="{{ asset('asset/images/Group 70.svg') }}"></span>
                                                <span>Add</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-4">
                                <div class="card product-card position-relative">
                                    <div class="card-header position-absolute d-flex justify-content-between">
                                        <img src="{{ asset('asset/images/green-hart.svg') }}" class="card-img-top"
                                            alt="...">
                                        <div class="discount d-flex align-items-center justify-content-center">10%</div>
                                    </div>

                                    <img src="{{ asset('asset/images/banana.png') }}" class="card-img-top" alt="..."
                                        >
                                    <div class="card-body">
                                        <h5  class="card-title">
                                            ABC Store - Banana </h5>
                                        <h6>DMart Kirana Store</h6>
                                        <p class="card-text">1 Pcs</p>
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
                                                <span class="dis-price d-flex align-items-center text-muted"><s>$2</s></span>
                                                <span>$1</span>
                                            </div>
                                            <div class="add-cart d-flex align-items-center justify-content-between "
                                                onclick="window.location='{{ route('mobile.cart') }}'">
                                                <span class="plus-icon"><img
                                                        src="{{ asset('asset/images/Group 70.svg') }}"></span>
                                                <span>Add</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                </div>
            </div>

        </div>
    </section>
@endsection



@section('js')
    {{-- <script>
        $('body').on('click', '#addCart', function() {
            var id = $(this).data('id');
            addToCart(id, flag = 1);

        });


        function addToCart(id, flag) {
            console.log(flag);
            $.ajax({
                url: "{{ route('cart.store') }}",
                method: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}",
                    flag: flag
                },
                success: function(response) {
                    console.log(response.message);

                    if (response.success) {
                        $('#iscart' + id).show();
                        $('.addCart' + id).attr('style', 'display:none !important');

                        if (response.message == 'delete') {

                            for (var i = 0; i < response.data.length; i++) {
                                console.log($('.addCart' + response.data[i].product_id));
                                $('#iscart' + response.data[i].product_id).attr('style',
                                    'display:none !important');
                                $('.addCart' + response.data[i].product_id).attr('style',
                                    'display:block !important');

                            }

                        }
                    } else {

                        var conform = confirm(
                            'After adding this product your cart will be empty. Do you want to continue?');

                        if (conform) {
                            addToCart(id, flag = 0);
                        }

                    }
                }
            });
        }
    </script> --}}
@endsection
