@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Category</h1>
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
                                <!-- <th rowspan="1" colspan="1">Description</th>
                                <th rowspan="1" colspan="1"> -->
                                    Type
                                </th>
                                <th rowspan="1" colspan="1">Image</th>
                                <th rowspan="1" colspan="1" width='15%' class="text-center">Action</th>
                            </tr>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($brands as $brand)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $brand->name }}</td>
                                    
                                    </td>
                                    <td>
                                        <img src="{{ asset($brand->image) }}" alt="" width="180px">
                                    </td>
                                    <td class="text-center">
                                        <a href="#"
                                            class="btn btn-primary">Edit</a>
                                        <a href="#"
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
