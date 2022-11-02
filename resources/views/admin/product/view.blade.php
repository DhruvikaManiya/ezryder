@extends('layouts.admin.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Product Details</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Product Details</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                      {{-- <h5 class="h3 mb-0 text-gray-800">Product Details</h5> --}}
                   
                </div>
                <hr>
                <!-- Content Row -->
                @if (Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                @if (Session::has('error'))
                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                @endif
                <form action="{{ route('admin.product.approve') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <div class="row">
                        <div class="col-6" style="width: 100%; ">
                            <div class="form-group">
                                <label for=""> <strong>Name</strong> </label><br>
                                <label for=""> {{ $product->name }}</label>
                            </div>
                            <hr>
                        </div>
                        <div class="col-6" style="width: 100%; ">
                            <div class="form-group">
                                <label for=""> <strong>Category</strong> </label><br>
                                <label for=""> {{ $product->Subcategory->category->name }}</label>
                            </div>
                            <hr>
                        </div>
                        <div class="col-6" style="width: 100%; ">
                            <div class="form-group">
                                <label for=""> <strong>Sub-category</strong> </label><br>
                                <label for=""> {{ $product->Subcategory->name }}</label>
                            </div>
                            <hr>
                        </div>
                        <div class="col-6" style="width: 100%; ">
                            <div class="form-group">
                                <label for=""> <strong>Description</strong> </label><br>
                                <label for=""> {{ $product->description }}</label>
                            </div>
                            <hr>
                        </div>
                        <div class="col-6" style="width: 100%; ">
                            <div class="form-group">
                                <label for=""> <strong>MRP</strong> </label><br>
                                <label for=""> {{ $product->MRP }}</label>
                            </div>
                            <hr>
                        </div>
                        <div class="col-6" style="width: 100%; ">
                            <div class="form-group">
                                <label for=""> <strong>Sellar price</strong> </label><br>
                                <label for=""> {{ $product->Sellar_price }}</label>
                            </div>
                            <hr>
                        </div>


                        <div class="col-6" style="width: 100%; ">
                            <div class="form-group">
                                <label for=""> <strong>Product images</strong> </label><br>
                                <label for=""> <img src="{{ asset($product->p_image) }}" alt=""
                                        width="180px"></label>
                            </div>
                            <hr>
                        </div>
                        {{-- <div class="col-6" style="width: 100%; ">
                            <div class="form-group">
                                <label for=""> <strong>Selling Price</strong> </label><br>
                                <label for=""> {{  ($product->vendor_price * $product->Dis_price/100)  }}</label>
                            </div>
                            <hr>
                        </div> --}}
                        <div class="col-12" style="width: 100%; ">
                            <div class="row">
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for=""> <strong>Ezryder charges <span class="text-danger text-xs"> (Enter
                                            charges in Percentage ) </span></strong> </label><br>
                                        <input type="number" name="admin_charge" class="form-control" id="" required
                                            value="{{ $product->admin_charge != '' ? $product->admin_charge : '10' }}"">
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-12 text-right" style="width:100%; ">
                            <div class="form-group">
                                <a class="btn btn-primary" style="margin-right: 40px;"
                                    href="{{ route('admin.product') }}">Back</a>

                                <button class="btn btn-success  {{ $product->verify == 1 ? 'd-none' : '' }}"
                                    style="margin-right:40px;" type="submit">Approve</button>

                                <a class="btn btn-danger {{ $product->verify == 2 ? 'd-none' : '' }}"
                                    href="{{ route('admin.product.deny', $product->id) }}">Deny</a>

                            </div>

                            <hr>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
