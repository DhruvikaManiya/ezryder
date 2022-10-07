@extends('layouts.admin.master')

@section('content')
<div class="container-fluid p-0">
    <div class="card">
        <div class="card-body">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product Details</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
    <hr>
    <!-- Content Row -->
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    @if(Session::has('error'))
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    @endif
    
            <div class="row">
                <div class="col-6" style="width: 100%; ">
                    <div class="form-group">
                        <label for=""> <strong>Name</strong> </label><br>
                        <label for=""> {{$product->name}}</label>
                    </div>            
                    <hr>
                </div>
                <div class="col-6" style="width: 100%; ">
                    <div class="form-group">
                        <label for=""> <strong>Category</strong> </label><br>
                        <label for=""> {{$product->Subcategory->category->name}}</label>
                    </div>            
                    <hr>
                </div>
                <div class="col-6" style="width: 100%; ">
                    <div class="form-group">
                        <label for=""> <strong>Sub-category</strong> </label><br>
                        <label for=""> {{$product->Subcategory->name}}</label>
                    </div>            
                    <hr>
                </div>
                <div class="col-6" style="width: 100%; ">
                    <div class="form-group">
                        <label for=""> <strong>Description</strong> </label><br>
                        <label for=""> {{$product->description}}</label>
                    </div>            
                    <hr>
                </div>
                <div class="col-6" style="width: 100%; ">
                    <div class="form-group">
                        <label for=""> <strong>Price</strong> </label><br>
                        <label for=""> {{$product->price}}</label>
                    </div>            
                    <hr>
                </div>
                <div class="col-6" style="width: 100%; ">
                    <div class="form-group">
                        <label for=""> <strong>Discount price</strong> </label><br>
                        <label for=""> {{$product->Dis_price}}</label>
                    </div>            
                    <hr>
                </div>
                <div class="col-6" style="width: 100%; ">
                    <div class="form-group">
                        <label for=""> <strong>Product images</strong> </label><br>
                        <label for="">  <img src="{{ asset($product->p_image) }}" alt="" width="180px"></label>
                    </div>            
                    <hr>
                </div>
                <div class="col-12 text-right" style="width:100%; ">
                    <div class="form-group">
                        <a class="btn btn-primary" style="margin-right: 40px;" href="{{route('admin.product')}}">Back</a>
                      
                        <a class="btn btn-success  {{$product->verify == 1 ?'d-none':''}}"  style="margin-right:40px;" href="{{route('admin.product.approve',$product->id)}}">Approve</a>

                         <a class="btn btn-danger {{$product->verify == 2 ?'d-none':''}}" href="{{route('admin.product.deny',$product->id)}}" >Deny</a>

                    </div> 
                              
                    <hr>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection