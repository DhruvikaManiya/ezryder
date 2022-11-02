 @extends('layouts.grocery')

 @section('css')
 @endsection
 @section('content')
     @include('mobile.grocery.inc.header')
     <section class="top-slider container-fluid mb-4 mt-3">

         <div class="swiper topSwiper">
             <div class="swiper-wrapper">
                 @foreach ($slider as $sliders)
                     @if ($sliders->type == '1')
                         <div class="swiper-slide position-relative">
                             <img src="{{ $sliders->image }}">
                         </div>
                     @endif
                 @endforeach

             </div>
             <div class="swiper-pagination"></div>
         </div>


     </section>
     <section class="categories">
         <div class="container-fluid">
             <div class="cat-title d-flex justify-content-between mb-3 section-title">
                 <h3>All Categories</h3>
                 <a href="{{ route('mobile.category') }}">
                     <h3> View All</h3>
                 </a>
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
     <!-- Top Store -->

     <section class="categories pt-4 mb-3" id="topstore">
         <div class="container-fluid">
             <div class="cat-title section-title d-flex justify-content-between mb-3">
                 <h3>Top Stores</h3>

             </div>
             <div class="slider-wrapper pb-3">
                 <div class="swiper storeSwiper">
                     <div class="swiper-wrapper" id="store_details">
                        
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
             @include('mobile.grocery.product.product_list')

         </div>
     </section>



     <section class="trend-product">
         <div class="container-fluid">
             <div class="tend-title section-title pt-3">
                 <h3>Latest Product</h3>
             </div>
             @include('mobile.grocery.product.product_list')

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
     {{-- <script>

         $('body').on('click', '#wishlist', function() {
             var id = $(this).data('id');
             var user_id = {{ Auth::user()->id }};
             console.log(id, user_id);
             $.ajax({
                 url: "{{ route('wishlist.store') }}",
                 method: "POST",
                 data: {
                     id: id,
                     user_id: user_id,
                     _token: "{{ csrf_token() }}"

                 },
                 success: function(response) {
                     console.log(response);
                     
                     if (response.status == 'add') {
                         console.log('#wishlist' + id);
                         $('.wishlist' + id).attr('style', 'display:none !important');
                         $('.wishlistRemove' + id).attr('style', 'display:block !important');
                     }

                     else {
                         $('.wishlist' + id).attr('style', 'display:block !important');
                         $('.wishlistRemove' + id).attr('style', 'display:none !important');
                     }
                 }
             });
         });
     </script> --}}
 @endsection
