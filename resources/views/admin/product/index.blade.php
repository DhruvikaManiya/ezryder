@extends('layouts.admin.master')

@section('css')
    <style>
        .dataTables_wrapper {
            width: -webkit-fill-available;
        }
    </style>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Product List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Product List</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
    {{-- tab in bootstrap --}}
    <ul class="nav nav-tabs" id="product" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="allproduct-tab" data-toggle="tab" href="#allproduct" role="tab"
                aria-controls="allproduct" aria-selected="true">All Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="approved-tab" data-toggle="tab" href="#approved" role="tab" aria-controls="approved"
                aria-selected="false">Approved Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="deny-tab" data-toggle="tab" href="#deny" role="tab" aria-controls="deny"
                aria-selected="false">Deny Product</a>
        </li>
    </ul>

    <div class="tab-content" id="productContent">
        <div class="tab-pane fade show active" id="allproduct" role="tabpanel" aria-labelledby="allproduct-tab">
            <div class="card">
                <div class="card-body">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">All Product</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <table class="table table-bordered dataTable" id="allProductList" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                <tr>

                                    <th rowspan="1" colspan="1">Name</th>
                                    <th rowspan="1" colspan="1"> Category Name</th>

                                    <th rowspan="1" colspan="1" width='15%'>Description</th>
                                    <th rowspan="1" colspan="1"> MRP</th>
                                    <th rowspan="1" colspan="1"> Sellar Price</th>
                                    <th rowspan="1" colspan="1"> Status </th>
                                    <th rowspan="1" colspan="1"> product image</th>
                                    <th rowspan="1" colspan="1" width='15%' class="text-center">Action</th>
                                </tr>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($product as $products)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $products->name }}</td>
                                        <td>{{ $products->Subcategory->category->name }}</td>

                                        <td>

                                            {{ Str::length($products->description) >= 60 ? Str::substr($products->description, 0, 60) . '...' : $products->description }}
                                        </td>
                                        <td>{{ $products->MRP }}</td>
                                        <td>{{ $products->Sellar_price }}</td>

                                        <td>
                                            @if ($products->verify == 1)
                                                <span class="badge badge-success">Approved</span>
                                            @else
                                                <span class="badge badge-danger">Deny</span>
                                            @endif
                                        </td>
                                        <td>
                                            <img src="{{ asset($products->p_image) }}" alt="" width="130px">
                                        </td>

                                        <td class="text-center">
                                            {{-- <a href="{{ route('admin.product.edit', $products->id) }}"
                                            class="btn btn-primary">Edit</a> --}}
                                            <a href="{{ route('admin.product.delete', $products->id) }}"
                                                class="btn btn-danger btn-sm">Delete</a>
                                            <a href="{{ route('admin.product.view', $products->id) }}"
                                                class="btn btn-info btn-sm">View</a>

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
            <div class="card">
                <div class="card-body">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">All Product</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <table class="table table-bordered dataTable" id="approvedProductList" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                <tr>

                                    <th rowspan="1" colspan="1">Name</th>
                                    <th rowspan="1" colspan="1"> Category Name</th>
                                    <th rowspan="1" colspan="1" width='15%'>Description</th>
                                    <th rowspan="1" colspan="1"> MRP</th>
                                    <th rowspan="1" colspan="1"> Sellar Price</th>
                                    <th rowspan="1" colspan="1"> Status </th>
                                    <th rowspan="1" colspan="1"> product image</th>
                                    <th rowspan="1" colspan="1" width='15%' class="text-center">Action</th>
                                </tr>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($product as $products)
                                    @if ($products->verify == 1)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{ $products->name }}</td>
                                            <td>{{ $products->Subcategory->category->name }}</td>

                                            <td>

                                                {{ Str::length($products->description) >= 60 ? Str::substr($products->description, 0, 60) . '...' : $products->description }}
                                            </td>
                                            <td>{{ $products->MRP }}</td>
                                            <td>{{ $products->Sellar_price }}</td>

                                            <td>
                                                @if ($products->verify == 1)
                                                    <span class="badge badge-success">Approved</span>
                                                @else
                                                    <span class="badge badge-danger">Deny</span>
                                                @endif
                                            </td>
                                            <td>
                                                <img src="{{ asset($products->p_image) }}" alt=""
                                                    width="130px">
                                            </td>

                                            <td class="text-center">
                                                {{-- <a href="{{ route('admin.product.edit', $products->id) }}"
                                            class="btn btn-primary">Edit</a> --}}
                                                <a href="{{ route('admin.product.delete', $products->id) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                                <a href="{{ route('admin.product.view', $products->id) }}"
                                                    class="btn btn-info btn-sm">View</a>

                                            </td>

                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="deny" role="tabpanel" aria-labelledby="deny-tab">
            <div class="card">
                <div class="card-body">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">All Product</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <table class="table table-bordered dataTable" id="denyProductList" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                <tr>

                                    <th rowspan="1" colspan="1">Name</th>
                                    <th rowspan="1" colspan="1"> Category Name</th>

                                    <th rowspan="1" colspan="1" width='15%'>Description</th>
                                    <th rowspan="1" colspan="1"> MRP</th>
                                    <th rowspan="1" colspan="1"> Sellar Price</th>
                                    <th rowspan="1" colspan="1"> Status </th>
                                    <th rowspan="1" colspan="1"> product image</th>
                                    <th rowspan="1" colspan="1" width='15%' class="text-center">Action</th>
                                </tr>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($product as $products)
                                    @if ($products->verify == 2)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{ $products->name }}</td>
                                            <td>{{ $products->Subcategory->category->name }}</td>

                                            <td>

                                                {{ Str::length($products->description) >= 60 ? Str::substr($products->description, 0, 60) . '...' : $products->description }}
                                            </td>
                                            <td>{{ $products->MRP }}</td>
                                            <td>{{ $products->Sellar_price }}</td>

                                            <td>
                                                @if ($products->verify == 1)
                                                    <span class="badge badge-success">Approved</span>
                                                @else
                                                    <span class="badge badge-danger">Deny</span>
                                                @endif
                                            </td>
                                            <td>
                                                <img src="{{ asset($products->p_image) }}" alt=""
                                                    width="130px">
                                            </td>

                                            <td class="text-center">
                                                {{-- <a href="{{ route('admin.product.edit', $products->id) }}"
                                            class="btn btn-primary">Edit</a> --}}
                                                <a href="{{ route('admin.product.delete', $products->id) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                                <a href="{{ route('admin.product.view', $products->id) }}"
                                                    class="btn btn-info btn-sm">View</a>

                                            </td>

                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            var allproduct = $('#allProductList').DataTable({
                "iDisplayLength": 10,
            });
            var approvedProduct = $('#approvedProductList').DataTable({
                "iDisplayLength": 10,
            });
            var denyProduct = $('#denyProductList').DataTable({
                "iDisplayLength": 10,
            });

        });
    </script>
@endsection
