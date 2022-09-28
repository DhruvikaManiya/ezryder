@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Product</h1>
                    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                </div>

                <!-- Content Row -->
                <div class="row">

                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
                        aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                            <tr>

                                <th rowspan="1" colspan="1">Name</th>
                                <th rowspan="1" colspan="1"> Category Name</th>
                                <th rowspan="1" colspan="1"> sub-Category Name</th>
                                <th rowspan="1" colspan="1">Description</th>
                                <th rowspan="1" colspan="1"> Price</th>
                                <th rowspan="1" colspan="1"> Discount Price</th>
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
                                    <td>{{ $products->Subcategory->name }}</td>
                                    <td>{{ $products->description }}</td>
                                    <td>{{ $products->price }}</td>
                                    <td>{{ $products->Dis_price }}</td>
                                    <td>
                                        <img src="{{ asset($products->p_image) }}" alt="" width="180px">
                                    </td>

                                    <td class="text-center">
                                        {{-- <a href="{{ route('admin.product.edit', $products->id) }}"
                                            class="btn btn-primary">Edit</a> --}}
                                        <a href="{{ route('admin.product.delete', $products->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
