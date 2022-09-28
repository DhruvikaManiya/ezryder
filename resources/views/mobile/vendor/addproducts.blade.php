@extends('layouts.vendor')

@section('header_title', 'Add Products')


@section('css')

    <style>
        .images img {
            border-radius: 5px;
        }

        .ml-space12 {
            margin-left: 20px;
        }
        .error-box {
            padding: 10px; 
            margin-bottom: 10px;
        }

        .error-mgs {
            color: rgb(167, 14, 14);
            font-weight: 600;
            text-align: left;
        }
    </style>
@endsection
@section('content')
    @include('mobile.vendor.inc.back-header')
    <div class="container-max p-both">
        <div class="rw">
            <div class="col-12 pad-00">

                <div class="product-box-g1 top-spc30 pos-rele">
                    <form action="{{ route('vendor.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" placeholder="Details over here"  id=""
                        required>
                        <div class="category-select">
                            <select class="category-drop-down bg-drp1" name="category_id" required>
                                <option required value="">Select Category</option>
                                @foreach ($catogeries as $cate)
                                    <Option value="{{ $cate->id }}">{{ $cate->name }}</Option>
                                @endforeach

                            </select>
                            <span class="ap-arrow1"><img src="{{ asset('asset/images/ap-arow.png') }}"
                                    alt=""></span>
                        </div>
                        <div class="category-select top-spc20 pos-rele">
                            <select class="category-drop-down bg-drp1" name="subcate_id" required>
                                <option required value="">Select Sub Category</option>

                            </select>
                            <span class="ap-arrow1"><img src="{{ asset('asset/images/ap-arow.png') }}"
                                    alt=""></span>
                        </div>


                        <div class=" product-card-tab3">
                            <p class="top-spc20 prodct-title mb-0">Product Name</p>
                            <input type="text" class="uni-box" name="name" placeholder="Product name" required>
                            <p class="error-mgs">
                                @error('name')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </p>

                        </div>

                        <div class="units-boxx top-spc20 pb-3">
                            <div class="">
                                
                                <div class="d-flex">
                                    <p>Units</p>
                                    <p class="ml-space32">Measurement</p>
                                </div>

                                <div class="d-flex">

                                    <input type="number" name="units" class="uni-box" placeholder="1" required>
                                    <p class="error-mgs">
                                        @error('units')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </p>

                                    <div class="Measurement1 ml-space12 pos-rele">
                                        <select class="category-drop-down bg-drp1" name="measurement" required>
                                            <option value="">Select</option>
                                            <option value="kgs">Kgs</option>
                                            <option value="ltr">Ltr</option>
                                            <option value="ml-ltr">Ml-ltr</option>
                                            <option value="gm">Gm</option>

                                        </select>
                                        <span class="ap-arrow3"><img src="{{ asset('asset/images/ap-arow.png') }}"
                                                alt=""></span>
                                    </div>
                                </div>
                                <div class="product-dt ">
                                    <p class=" title-foods m-0 mb-10 mt-19">Product Details</p>
                                    <input type="text" placeholder="Details over here" name="description" id=""  required>
                                    <p class="error-mgs">
                                        @error('description')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </p>
                                </div>
                                <div class="pc-dt top-spc20">
                                    <p class="title-foods m-0 mb-10">Product Price</p>
                                    <input type="number" name="price" placeholder="10" required>
                                    @error('price')
                                    <p class="error-mgs">
                                        @error('price')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </p>
                                @enderror

                                    <p class="top-spc20 title-foods m-0 mb-10">Discount %</p>
                                    <input type="number" name="dis_price" placeholder="10" required>
                                    <p class="error-mgs">
                                        @error('dis_price')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </p>
                                </div>


                                <div class="img-uplod-box t-center top-spc20 img-uplod-box-cover">
                                    <label for="file-upload" name="p_image" class="file-upload-cover"> Upload Product <br>
                                        Cover
                                        Image</label>

                                </div>
                                <input type="file" id="file-upload" name="p_image" class="d-none" accept="image/*" required>
                              
                                <p class="title-foods m-0 top-spc20">Upload product images</p>
                                <div class="img-selector1 d-flex justi-s-b top10 lab-size">

                                    <div class="images">
                                        <img src="{{ asset('asset/images/Group 5.svg') }}"
                                            class="img-fluid select-image image1" data-image="image1">
                                        <input type="file" name="image[]" id="image1" class="d-none image"
                                            accept="image/*">
                                    </div>
                                    <div class="images">
                                        <img src="{{ asset('asset/images/Group 5.svg') }}"
                                            class="img-fluid select-image image2" data-image="image2">
                                        <input type="file" name="image[]" id="image2" class="d-none image"
                                            accept="image/*">
                                    </div>
                                    <div class="images">
                                        <img src="{{ asset('asset/images/Group 5.svg') }}"
                                            class="img-fluid select-image image3" data-image="image3">
                                        <input type="file" name="image[]" id="image3" class="d-none image"
                                            accept="image/*">
                                    </div>
                                    <div class="images">
                                        <img src="{{ asset('asset/images/Group 5.svg') }}"
                                            class="img-fluid select-image image4" data-image="image4">
                                        <input type="file" name="image[]" id="image4" class="d-none image"
                                            accept="image/*">
                                    </div>
                                </div>
                                <div class="img-selector1 d-flex justi-s-b top10 lab-size">

                                    <div class="images">
                                        <img src="{{ asset('asset/images/Group 5.svg') }}"
                                            class="img-fluid select-image image5" data-image="image5">
                                        <input type="file" name="image[]" id="image5" class="d-none image"
                                            accept="image/*">
                                    </div>
                                    <div class="images">
                                        <img src="{{ asset('asset/images/Group 5.svg') }}"
                                            class="img-fluid select-image image6" data-image="image6">
                                        <input type="file" name="image[]" id="image6" class="d-none image"
                                            accept="image/*">
                                    </div>
                                    <div class="images">
                                        <img src="{{ asset('asset/images/Group 5.svg') }}"
                                            class="img-fluid select-image image7" data-image="image7">
                                        <input type="file" name="image[]" id="image7" class="d-none image"
                                            accept="image/*">
                                    </div>
                                    <div class="images">
                                        <img src="{{ asset('asset/images/Group 5.svg') }}"
                                            class="img-fluid select-image image8" data-image="image8">
                                        <input type="file" name="image[]" id="image8" class="d-none image"
                                            accept="image/*">
                                    </div>
                                </div>
                            </div>

                            <div class="btn-sub text-c top-s43 mbot-20">
                                <button class="btn btn-w" type="Submit">Submit</button>
                            </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
@endsection




@section('js')

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



    {{-- get subcatory --}}

    <script>
        $('select[name="category_id"]').on('change', function() {
            // console.log('lo');
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ route('admin.get.subcategory') }}",
                    type: "GET",
                    data: {
                        id: category_id
                    },
                    success: function(data) {

                        $('select[name="subcate_id"]').removeAttr('disabled');
                        $('select[name="subcate_id"]').empty();
                        $('select[name="subcate_id"]').append(
                            '<option value="">Select Subcategory</option>');
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
