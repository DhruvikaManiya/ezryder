@extends('layouts.admin.master')



@section('css')
    <style>
        .plus-box,
        .mins-box {
            border: 1px solid rgb(134, 20, 20);
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: rgb(134, 20, 20);
            cursor: pointer;
            padding: 5px 7px;
            width: fit-content;
            float: right;
            margin-right: 10px;
        }

        .mins-box:hover {
            background-color: rgb(134, 20, 20);
            color: white;
        }

        .mins-box {
            padding: 5px 7px;
        }

        .plus-box {
            border: 1px solid rgb(11, 94, 11);
            color: rgb(11, 94, 11);
        }

        .plus-box:hover {
            background-color: rgb(11, 94, 11);
            color: white;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Product</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="">Product Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <select name="category_id" class="form-control">
                                    <option value="" selected>selecet category</option>

                                    @foreach ($categories as $cayegory)
                                        <option value="{{ $cayegory->id }}">{{ $cayegory->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Subcategory Name</label>
                                <select name="subcate_id" class="form-control" disabled>
                                    <option value="" selected>selecet category</option>
                                    @foreach ($subcategories as $subcategori)
                                        <option value="{{ $subcategori->id }}">{{ $subcategori->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control" placeholder="Enter description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Product price</label>
                                <input type="number" name="price" class="form-control" placeholder="Enter price">
                            </div>
                            <div class="form-group">
                                <label for="">Product Discount price</label>
                                <input type="number" name="dis_price" class="form-control"
                                    placeholder="Enter discount price">

                            </div>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label for="unit">Unit</label>
                                    <input type="number" name="unit" id="unit" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="measurement">Measurement</label>
                                    <select name="measurement" class="form-control" id="measurement"> 
                                        <option value="" selected>selecet Measurement</option>
                                        <option value="kg">kg</option>
                                        <option value="gm">gm</option>
                                        <option value="piece">Ltr</option>
                                        <option value="dozen">dozen</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-10">
                                        <label for="">Product image</label>
                                    </div>
                                    <div class="col-2">
                                        <div class="plus-box">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 " id="image-box">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="file" name="p_image" class="form-control"
                                                placeholder="Enter name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                    
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('js')
    <script>
        // category_id
        $('select[name="category_id"]').on('change', function() {
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
        // plus-box
        $('.plus-box').on('click', function() {
            var html = '<div class="row mt-3">\
                                            <div class="col-11">\
                                                <input type="file" name="image[]" class="form-control" placeholder="Enter name">\
                                            </div>\
                                            <div class="col-1 ">\
                                                <div class="mins-box">\
                                                    <i class="fa fa-minus" aria-hidden="true"></i>\
                                                </div>    \
                                            </div>\
                                        </div>';
            $('#image-box  ').append(html);
        });
        // mins-box
        $(document).on('click', '.mins-box', function() {
            $(this).parent().parent().remove();
        });
    </script>
@endsection
