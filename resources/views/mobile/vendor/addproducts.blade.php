@extends('layouts.users_app_products')

@section('content')
    <div class="main-container navStyle addStore" id="addBankDetails">
      <article id="top-nav">
        <div class="reviewBackButton">
          <img src="/pages/assets/loginScreen/leftArrow.png" alt="" />
          <p>Add Product</p>
        </div>
        <p>
          <span>3</span>
          <img src="/pages/assets/homeScreen/shoppingBag.png" alt="" />
        </p>
      </article>

      <form action="{{ route('vendor.products.store') }}" method="POST" id="form" enctype="multipart/form-data"> 
          <div id="loading"></div>
          @csrf

        <article>
          <label for="email">Select Category *</label>
          <select class="bg-drp1" name="category_id" required>
            @foreach ($catogeries as $cate)
                <Option value="{{ $cate->id }}">{{ $cate->name }}</Option>
            @endforeach
          </select>
        </article>


        <article>
          <label for="email">Select Sub Category *</label>
          <select  class="bg-drp1" id="email" name="subcate_id" required>
            <option value="Select Category">Select Category</option>
          </select>
        </article>

        <article>
          <label for="email">Product Name *</label>
          <input
            type="text"
            name="name"
            required
            placeholder="Enter Product name"
          />
        </article>
        <article>
          <label for="email">Product Description *</label>
          <textarea name="description" required></textarea>
        </article>

        <div class="2-col">
          <article>
          
            <label for="email">Units *</label>
            <input
              type="number"
              name="units"
             required
              placeholder="Enter Units"
            />
         </article>

         <article>
          <label for="email">Measurements *</label>
          <select name="measurement" required>
            <option value="Select Category">Select Category</option>
            @foreach(config('global.measurements') as $key => $measurement)
                 <option value="{{$key}}">{{$measurement}}</option>
            @endforeach
          </select>
        </article>

        </div>
           

        <article>
          <label for="email">MRP Price *</label>
          <input
            type="number"
            name="mrp"
            placeholder="Enter Mrp"
            required
          />
        </article>

        <article>
          <label for="email">Vendor Price *</label>
          <input
            type="text"
            name="Sellar_price"
            required
            placeholder="Enter Vendor  Price"
          />
        </article>
         
          
        </article>
        <article>
          <label for="email">Upload product image *</label>
          <input
            type="file"
             accept="image/*"
            name="p_image"
          />
        </article>
        
      
        <button id="register">
          <p>Save</p>
          <span>></span>
        </button>
      </form>
    </div>


    <script>
        $(document).ready(function() {
            $('.select-image').click(function() {
                $(this).next().click();
            });
            $('.image').change(function() {
                var input = $(this);
                var reader = new FileReader();
                reader.onload = function(e) {
                    var image = e.target.result;

                    input.siblings('img').attr('src', e.target.result);
                    input.siblings('img').attr('style', 'width:100%;height:100%;');

                }
                reader.readAsDataURL(this.files[0]);
            });
        });

        $(document).ready(function() {

            $('#file-upload').change(function() {
                var input = $(this);
                var reader = new FileReader();
                reader.onload = function(e) {
                    var image = e.target.result;
                    input.siblings('img').attr('src', e.target.result);
                    input.siblings('img').attr('style', 'width:100%;height:100%;');


                    var html = "<img src='" + image + "' class='img-fluid select-image' data-image='" +
                        input.attr('data-image') + "' style='width:100%;'>";
                    $('.img-uplod-box-cover').html(html);
                    $('.img-uplod-box').attr('style',
                        'padding:0px;border-radius:5px;height:130px;overflow:hidden;');
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
 </script>
{{-- set loading form  --}}
<script>
    $(document).ready(function() {
      $('#form').on('submit',function(){
     $('#loading').show();
      });
    });
    
    </script>


    

    {{-- get subcatory --}}

    <script>
        $('select[name="category_id"]').on('change', function() {
            // console.log('lo');
            var category_id = $(this).val();
            // console.log(category_id);
            if (category_id) {
                $.ajax({
                    url: "{{ route('vendor.get.subcategory') }}",
                    type: "GET",
                    data: {
                        id: category_id
                    },
                    success: function(data) {
                      console.log(data);
                        
                        $('select[name="subcate_id"]').empty();
                        // $('select[name="subcate_id"]').append(
                        //     '<option value="">Select Subcategory</option>');
                        $.each(data, function(key, value) {
                            $('select[name="subcate_id"]').append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                alert('danger');
            }
        });
    </script>
@endsection
