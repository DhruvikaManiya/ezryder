@extends('layouts.users_app_products')


  <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>


@section('content')

<div class="main-container no-padding navStyle productList" id="addBankDetails">

      <article id="top-nav">
        <div class="reviewBackButton">
          <img src="/pages/assets/loginScreen/leftArrow.png" alt="" />
          <p>Products</p>
        </div>

      
      </article>
      @if(Auth::user()->store)
       <a class="btn-primary" href="/vendor/addproducts">Add new product<span><img src="{{ asset('asset/images/btn_primary_arrow.svg') }}" alt=""></span></a>
       @else
       <p>Please Add Store Details</p>
       @endif

       @foreach($products as $product)
          <section class="item-list">
            <div class="item">
              <img src="{{ asset($product->p_image) }}" alt="" style="width: 50px;" />
              <div class="item-data">
                <a href="{{route('vendor.product',$product->id)}}">
                <p class="light space-down">{{$product->name}}</p>
                <p class="light space-down">MRP Price ${{$product->mrp_price}}</p>
                <p class="light">Vendor Price ${{$product->seller_price}}</p>
                </a>
              </div>
              
              <div class="">
                <label class="switch">
                                
                  <input 
                    class="activeinactive" 
                    type="checkbox"
                    name="status"
                    for="product{{ $product->id }}"
                    data-product="{{ $product->id }}"
                     {{ $product->vendor_status == 1 ? 'checked' : '' }} 
                   
                      >
                  <span class="slider round"></span>
                </label>
              </div>

            </div>
          </section>
      @endforeach
     

      

      
      @include('layouts.partials.vendor_footer_nav')
    </div>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
       
        $('body').on('click','.activeinactive',function() {
           
            var product = $(this).data('product');
            // console.log(product);
          
            
            $.ajax({
                url: "{{ route('vendor.prodcuts.active') }}",
                data: {
                    id: product
                },
                success: function(responce) {
                    console.log(responce);
                }
            });

        });
    </script>
   
@endsection
