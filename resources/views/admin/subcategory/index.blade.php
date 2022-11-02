@extends('layouts.admin.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Sub-Category List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Sub-Category List</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">
              

                <!-- Content Row -->
                <div class="row">

                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
                        aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                            <tr>

                                <th rowspan="1" colspan="1">Name</th>
                                <th rowspan="1" colspan="1">
                                    Category Name
                                </th>
                                <th rowspan="1" colspan="1">Description</th>

                                <th rowspan="1" colspan="1" width='15%' class="text-center">Action</th>
                            </tr>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($subcategories as $subcategory)
                            
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $subcategory->name }}</td>
                                    <td>
                                    @if($subcategory->category)
                                    {{ $subcategory->category->name }}
                                    @endif
                                </td>
                                    <td>{{ $subcategory->description }}</td>
                                    <td>
                                        <img src="{{ asset($subcategory->subcate_image) }}" alt="" width="180px">
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('admin.subcategory.edit', $subcategory->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin.subcategory.delete', $subcategory->id) }}"
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
