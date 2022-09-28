 @extends('layouts.grocery')

 @section('content')
     @include('mobile.grocery.inc.header')
     <section class="top-slider container-fluid mb-4 mt-3">

         <div class="swiper topSwiper">
             <div class="swiper-wrapper">
                 <div class="swiper-slide position-relative">
                     <img src="{{ asset('asset/images/4.png') }}">
                     <div class="position-absolute slider-text d-flex align-items-center">
                         <h6>Get Fresh Fruits start from $20</h6>
                     </div>

                 </div>

                 <div class="swiper-slide position-relative">
                     <img src="{{ asset('asset/images/4.png') }}">
                     <div class="position-absolute slider-text d-flex align-items-center">
                         <h6>Get Fresh Fruits start from $20</h6>
                     </div>

                 </div>
                 <div class="swiper-slide position-relative">
                     <img src="{{ asset('asset/images/4.png') }}">
                     <div class="position-absolute slider-text d-flex align-items-center">
                         <h6>Get Fresh Fruits start from $20</h6>
                     </div>

                 </div>
                 <div class="swiper-slide position-relative">
                     <img src="{{ asset('asset/images/4.png') }}">
                     <div class="position-absolute slider-text d-flex align-items-center">
                         <h6>Get Fresh Fruits start from $20</h6>
                     </div>

                 </div>
             </div>
             <div class="swiper-pagination"></div>
         </div>


     </section>
     <section class="categories">
         <div class="container-fluid">
             <div class="cat-title d-flex justify-content-between mb-3 section-title">
                 <h3>All Categories</h3>
                 <h3>View All</h3>
             </div>
             <div class="slider-wrapper">
                 <div class="swiper catSwiper">
                     <div class="swiper-wrapper">

                         @foreach ($category as $cate)
                             @if ($cate->type == '1')
                                 <div class="swiper-slide">
                                     <div class="item d-flex align-items-center justify-content-center flex-column "
                                         onclick="window.location='{{ route('mobile.productlist', $cate->id) }}'"><img
                                             src="{{ $cate->image }}"></div>
                                     <h3 class="mt-3 mb-3">{{ $cate->name }}</h3>
                                 </div>
                             @endif
                         @endforeach


                     </div>
                     <div class="swiper-pagination"></div>
                 </div>
             </div>
         </div>
     </section>


     <section class="trend-product">
         <div class="container-fluid">

             <div class="tend-title section-title pt-3">
                 <h3>Trending Products</h3>
             </div>

             <div class="row">
                 @foreach ($Product as $pro)
                     <div class="col-6 mb-4">
                         <div class="card product-card position-relative">
                             <div class="card-header position-absolute d-flex justify-content-between">
                                 <img src="{{ asset('asset/images/green-hart.svg') }}" class="card-img-top" alt="...">
                                 <div class="discount d-flex align-items-center justify-content-center">10%</div>
                             </div>

                             <img value="{{ $pro->id }}" src="{{ $pro->p_image }}" class="card-img-top" alt="..."
                                 onclick="window.location='{{ route('mobile.productdetails',$pro->id) }}'">
                             <div class="card-body">
                                 <h5 onclick="window.location='{{ route('mobile.productdetails',$pro->id) }}'" class="card-title">
                                     {{ $pro->name }} </h5>
                                     <h6>{{$pro->user->name}}</h6>
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
                                             <s>${{ $pro->price }}</s>
                                         </span>
                                         <span> ${{ $pro->price - ($pro->price * $pro->Dis_price) / 100 }}</span>
                                     </div>


                                     <div class="add-cart d-flex align-items-center justify-content-between addCart{{ $pro->id }}"
                                         id="addCart" data-id="{{ $pro->id }}"
                                         style="{{ $pro->cart->count() > 0 ? 'display:none!important' : '' }}">
                                         <span class="plus-icon"><img
                                                 src="{{ asset('asset/images/Group 186.svg') }}"></span>
                                         <span>Add</span>
                                     </div>
                                     <div class="add-cart d-flex align-items-center justify-content-between "
                                         onclick="window.location='{{ route('mobile.cart') }}'"
                                         style="{{ $pro->cart->count() > 0 ? '' : 'display:none!important' }}"
                                         id="iscart{{ $pro->id }}">
                                         <span>Go to Cart </span>
                                     </div>
                                 </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 @endforeach

             </div>
         </div>
     </section>

     <!-- Top Store -->

     <section class="categories pt-4 mb-3">
         <div class="container-fluid">
             <div class="cat-title section-title d-flex justify-content-between mb-3">
                 <h3>Top Stores</h3>

             </div>
             <div class="slider-wrapper pb-3">
                 <div class="swiper storeSwiper">
                     <div class="swiper-wrapper">
                         <div class="swiper-slide">
                             <div class="item d-flex justify-content-start">
                                 <img src="{{ asset('asset/images/7.png') }}">
                                 <div class="storeContent p-2">
                                     <h3>Vegetables</h3>
                                     <p>G-Mart</p>
                                 </div>
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div class="item d-flex justify-content-start">
                                 <img src="{{ asset('asset/images/7.png') }}">
                                 <div class="storeContent p-2">
                                     <h3>Vegetables</h3>
                                     <p>G-Mart</p>
                                 </div>
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div class="item d-flex justify-content-start">
                                 <img src="{{ asset('asset/images/7.png') }}">
                                 <div class="storeContent p-2">
                                     <h3>Vegetables</h3>
                                     <p>G-Mart</p>
                                 </div>
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div class="item d-flex justify-content-start">
                                 <img src="{{ asset('asset/images/7.png') }}">
                                 <div class="storeContent p-2">
                                     <h3>Vegetables</h3>
                                     <p>G-Mart</p>
                                 </div>
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div class="item d-flex justify-content-start">
                                 <img src="{{ asset('asset/images/7.png') }}">
                                 <div class="storeContent p-2">
                                     <h3>Vegetables</h3>
                                     <p>G-Mart</p>
                                 </div>
                             </div>
                         </div>
                         <div class="swiper-slide">
                             <div class="item d-flex justify-content-start">
                                 <img src="{{ asset('asset/images/7.png') }}">
                                 <div class="storeContent p-2">
                                     <h3>Vegetables</h3>
                                     <p>G-Mart</p>
                                 </div>
                             </div>
                         </div>

                     </div>
                     <div class="swiper-pagination"></div>
                 </div>
             </div>
         </div>
     </section>

     <section class="trend-product">
         <div class="container-fluid">
             <div class="tend-title section-title pt-3">
                 <h3>Fruits</h3>
             </div>
             <div class="row">
                 @foreach ($Product as $pro)
                     <div class="col-6 mb-4">
                         <div class="card product-card position-relative">
                             <div class="card-header position-absolute d-flex justify-content-between">
                                 <img src="{{ asset('asset/images/green-hart.svg') }}" class="card-img-top"
                                     alt="...">
                                 <div class="discount d-flex align-items-center justify-content-center">10%</div>
                             </div>

                             <img src="{{ $pro->p_image }}" class="card-img-top" alt="..."
                                 onclick="window.location='{{ route('mobile.productdetails',$pro->id)}}'">
                             <div class="card-body">
                                 <h5 onclick="window.location='{{ route('mobile.productdetails',$pro->id) }}'" class="card-title">
                                     {{ $pro->name }}</h5>
                                 <h6>{{$pro->user->name}}</h6>
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
                                             <s>${{ $pro->price }}</s>
                                         </span>
                                         <span> ${{ $pro->price - ($pro->price * $pro->Dis_price) / 100 }}</span>
                                     </div>
                                     <div class="add-cart d-flex align-items-center justify-content-between addCart{{ $pro->id }}"
                                         id="addCart" data-id="{{ $pro->id }}"
                                         style="{{ $pro->cart->count() > 0 ? 'display:none!important' : '' }}">
                                         <span class="plus-icon"><img
                                                 src="{{ asset('asset/images/Group 186.svg') }}"></span>
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
     </section>

     <section class="categories pb-5">
         <div class="container-fluid">
             <div class="cat-title d-flex justify-content-between mb-3 section-title section-title">
                 <h3>Shop by Brands</h3>

             </div>
             <div class="slider-wrapper">
                 <div class="swiper brandSwiper">
                     <div class="swiper-wrapper">

                         @foreach ($brand as $brands)
                             <div class="swiper-slide">
                                 <div class="item"><img src="{{ $brands->image }}"> </div>
                             </div>
                         @endforeach

                     </div>
                     <div class="swiper-pagination"></div>
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
