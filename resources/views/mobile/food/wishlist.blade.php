@extends('layouts.food')


@section('css')
@endsection

@section('content')
    @include('mobile.food.inc.header')


    <section class="trend-product pb-5">
        <div class="container-fluid">
            <div class="tend-title section-title pt-3">
                <h3>Your Wishlist</h3>
            </div>
            
            <div class="row">
            
                @foreach ($Product as $pro)
            
                <div class="recomm_box main_box">
                    <div class="recomm_img_box">
                        <div class="card-header position-absolute d-flex justify-content-between">
                           
                            <img src="{{ asset('asset/images/green-hart.svg') }}" class="wishlist{{ $pro->product->id }}"
                            data-id="{{ $pro->product->id }}"  style="display:none!important" id="wishlist">


                        <img src="{{ asset('asset/images/heart.png') }}"
                            class="wishlistRemove{{ $pro->product->id }}"data-id="{{ $pro->product->id }}"
                            id="wishlist">

                        <div class="discount d-flex align-items-center justify-content-center">
                            {{ $pro->product->Dis_price }}%</div>
                           </div>
                        <img class="recomm_img p_image" src="{{ $pro->product->p_image }}" alt="">
                    </div>
                    <div class="recomm_content">
                        <div class="food_rate">
                            <h6 class="food_name">{{$pro->product->name}}</h6>
                            <p class="rate">{{$pro->product->price}}</p>
                        </div>
                        <div class="recomm_text">
                            <p class="rating"> 4.5 <span>(29)</span></p>
                            @if ($pro->product->status==2)

                            @else
                            <div class="add-cart d-flex align-items-center justify-content-between addCart{{ $pro->product->id }}"
                                id="addCart" data-id="{{ $pro->product->id }}"
                                style="{{ $pro->product->cart->count() > 0 ? 'display:none!important' : '' }}">
                                <span class="plus-icon"><img
                                        src="{{ asset('asset/images/plus.svg') }}"></span>
                                <span>Add</span>
                            </div>
                            <div class="add-cart d-flex align-items-center justify-content-between "
                            onclick="window.location='{{ route('mobile.food.cart') }}'"
                                style="{{ $pro->product->cart->count() > 0 ? '' : 'display:none!important' }}"
                                id="iscart{{ $pro->product->id }}">
                                <span>Go to Cart </span>
                            </div>
                            @endif
                           
                        </div>
                    </div>
                </div>
            @endforeach

            </div>

        </div>
    </section>
@endsection

@section('js')
    <script>
        $('body').on('click', '#addCart', function() {
            var id = $(this).data('id');

            $.ajax({
                url: "{{ route('cart.store') }}",
                method: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response.success);
                    if (response.success) {
                        $('#iscart' + id).show();
                        $('.addCart' + id).attr('style', 'display:none !important');
                    }
                }
            });
        });
    </script>
    <script>
        $('body').on('click', '#wishlist', function() {
            var id = $(this).val();

            $.ajax({
                url: "{{ route('wishlist.store') }}",
                method: "POST",
                data: {
                    id: id,
                    product_id: id,
                    user_id: "{{ Auth::user()->id }}",
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response.success);
                    if (response.success) {
                        $('#wishlist' + id).show();
                        $('.wishlist' + id).attr('style', 'display:none !important');
                    }
                }
            });
        });
    </script>
@endsection
