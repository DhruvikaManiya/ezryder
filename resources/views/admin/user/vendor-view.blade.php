@extends('layouts.admin.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Vendor Details</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Vendor Details</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
    <div class="container-fluid p-0">
        <div class="card">
            @if (Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        @if (Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
        @endif
            <div class="card-body">
                <!-- Page Heading -->
                {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Vendor Details</h1>

                </div> --}}
                <hr>


                <div class="row">
                    <div class="col-6" style="width: 100%; ">
                        <div class="form-group">
                            <label for=""> <strong>Name</strong> </label><br>
                            <label for=""> {{ $user->name }}</label>
                        </div>
                        <hr>
                    </div>
                    <div class="col-6" style="width: 100%; ">
                        <div class="form-group">
                            <label for=""> <strong>Email</strong> </label><br>
                            <label for=""> {{ $user->email }}</label>
                        </div>
                        <hr>
                    </div>
                    <div class="col-6" style="width: 100%; ">
                        <div class="form-group">
                            <label for=""> <strong>Mobile number</strong> </label><br>
                            <label for=""> {{ $user->phone }}</label>
                        </div>
                        <hr>
                    </div>

                    <div class="col-6" style="width: 100%; ">
                        <div class="form-group">
                            <label for=""> <strong>Address</strong> </label><br>
                            <label for=""> {{ $user->address }}</label>
                        </div>
                        <hr>
                    </div>
                    <div class="col-6" style="width: 100%; ">
                        <div class="form-group">
                            <label for=""> <strong>Area</strong> </label><br>
                            <label for=""> {{ $user->area }}</label>
                        </div>
                        <hr>
                    </div>
                    <div class="col-6" style="width: 100%; ">
                        <div class="form-group">
                            <label for=""> <strong>City</strong> </label><br>
                            <label for=""> {{ $user->city }}</label>
                        </div>
                        <hr>
                    </div>
                    <div class="col-6" style="width: 100%; ">
                        <div class="form-group">
                            <label for=""> <strong>State</strong> </label><br>
                            <label for=""> {{ $user->state }}</label>
                        </div>
                        <hr>
                    </div>
                    <div class="col-6" style="width: 100%; ">
                        <div class="form-group">
                            <label for=""> <strong>Pincode</strong> </label><br>
                            <label for=""> {{ $user->pincode }}</label>
                        </div>
                        <hr>
                    </div>
                    <div class="col-6" style="width: 100%; ">
                        <div class="form-group">
                            <label for=""> <strong>Country</strong> </label><br>
                            <label for=""> {{ $user->country }}</label>
                        </div>
                        <hr>
                    </div>
                    <div class="col-6" style="width: 100%; ">
                        <div class="form-group">
                            <label for=""> <strong>Vat number</strong> </label><br>
                            <label for=""> {{ $user->vendor->vat }}</label>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-12 text-right" style="width:100%; ">
                    <div class="form-group">
                        <a class="btn btn-primary" style="margin-right: 40px;"
                            href="{{route('admin.vendors')}}">Back</a>
                      {{-- @dd($user->vendor->id) --}}
                        <a href="{{route('admin.approve',$user->vendor->id)}}" class="btn btn-success {{ $user->vendor->is_verified == 1 ? 'd-none' : '' }} "
                            style="margin-right:40px;" >Approve</a>

                        <a class="btn btn-danger  @if($user->vendor) {{ $user->vendor->is_verified == 2 ? 'd-none' : '' }} @endif"
                            href="{{ route('admin.deny', $user->vendor->id) }}">Deny</a>

                    </div>

                    <hr>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h3 class="h3 mb-0 text-gray-800">Products</h3>
                </div>

                {{-- 3 tab all product  , Approved product , deny product --}}
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab"
                                    aria-controls="all" aria-selected="true">All Products</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="approved-tab" data-toggle="tab" href="#approved" role="tab"
                                    aria-controls="approved" aria-selected="false">Approved Products</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="deny-tab" data-toggle="tab" href="#deny" role="tab"
                                    aria-controls="deny" aria-selected="false">Deny Products</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mt-2">
                                            <div class="card border-bottom-primary ">
                                                <img src="{{ asset($product->p_image) }}" class="card-img-top"
                                                    alt="..." height="150px">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $product->name }}</h5>
                                                    <p class="card-text">{{ $product->description }}</p>
                                                    <a href="{{ route('admin.product.view', $product->id) }}"
                                                        class="btn btn-primary">View</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                                <div class="row">
                                    @foreach ($approved_products as $product)
                                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mt-2">
                                            <div class="card border-bottom-primary ">
                                                <img src="{{ asset($product->p_image) }}" class="card-img-top"
                                                    alt="..." height="150px">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $product->name }}</h5>
                                                    <p class="card-text">{{ $product->description }}</p>
                                                    <a href="{{ route('admin.product.view', $product->id) }}"
                                                        class="btn btn-primary">View</a>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="deny" role="tabpanel" aria-labelledby="deny-tab">
                                <div class="row">
                                    @foreach ($deny_products as $product)
                                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mt-2">
                                            <div class="card border-bottom-primary ">
                                                <img src="{{ asset($product->p_image) }}" class="card-img-top"
                                                    alt="..." height="150px">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $product->name }}</h5>
                                                    <p class="card-text">{{ $product->description }}</p>
                                                    <a href="{{ route('admin.product.view', $product->id) }}"
                                                        class="btn btn-primary">View</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
