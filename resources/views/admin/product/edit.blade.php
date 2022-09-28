@extends('layouts.admin.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('admin.product.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">

                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <select name="subcate_id" class="form-control" value="{{$product->Subcategory->category->name}}">
                                @foreach($category as $cate)

                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Sub-Category Name</label>
                            <select name="subcate_id" class="form-control" value="{{$product->Subcategory->name}}">
                                @foreach($subcategory as $cate)

                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{$product->name}}">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" placeholder="Enter description">{{$product->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Product price</label>
                            <input type="text" name="price" class="form-control" placeholder="Enter price" value="{{$product->price}}">
                        </div>
                        <div class="form-group">
                            <label for="">Product Discount price %</label>
                            <input type="text" name="dis_price" class="form-control" placeholder="Enter discount price %" value="{{$product->Dis_price}}">
                        </div>
                        <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control" accept="images/*">
                                {{-- <div class="pt-3">
                                    <img src="{{ asset($product->image) }}" width="340px" >
                                </div> --}}
                            </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection