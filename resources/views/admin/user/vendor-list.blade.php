@extends('layouts.admin.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Vendor</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Vendor</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
    <div class="container-fluid">
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Vendors</h1>

        </div> --}}

        {{-- 3 tab Grocery  , Restaurants  , Pharmacy --}}

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="grocery-tab" data-toggle="tab" href="#grocery-tab-pane" role="tab"
                    aria-controls="grocery-tab-pane" aria-selected="true">All</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="grocery-tab" data-toggle="tab" href="#grocery-tab-pane" role="tab"
                    aria-controls="grocery-tab-pane" aria-selected="true">Grocery</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="restaurant-tab" data-toggle="tab" href="#restaurant-tab-pane" role="tab"
                    aria-controls="restaurant-tab-pane" aria-selected="false">Restaurants</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pharmacy-tab" data-toggle="tab" href="#pharmacy-tab-pane" role="tab"
                    aria-controls="pharmacy-tab-pane" aria-selected="false">Pharmacy</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">

            {{-- Grocery tab --}}
            <div class="tab-pane fade show active" id="grocery-tab-pane" role="tabpanel" aria-labelledby="grocery-tab"
                tabindex="0">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
                    aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                        <tr>
                            <th rowspan="1" colspan="1">Sr no.</th>
                            <th rowspan="1" colspan="1">Name</th>
                            <th rowspan="1" colspan="1">Email</th>
                            <th rowspan="1" colspan="1"> Mobile no.</th>
                            <th rowspan="1" colspan="1">Address</th>
                            <th rowspan="1" colspan="1">Status</th>
                            <th rowspan="1" colspan="1"> Action </th>

                        </tr>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($groceries as $grocery)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{ $loop->index + 1 }}</td>
                                <td>{{ $grocery->name }}</td>
                                <td>{{ $grocery->email }}</td>
                                <td>{{ $grocery->phone }}</td>
                                <td>{{ $grocery->address }}</td>
                                <td>
                                    @if ($grocery->vendor->is_verified == 1)
                                        <span class="badge badge-success">Approve</span>
                                    @elseif($grocery->vendor->is_verified == 2)
                                        <span class="badge badge-danger">Deny</span>
                                    @else
                                        <span class="badge badge-warning">Pending</span>
                                    @endif</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.user.delete', $grocery->id) }}"
                                        class="btn btn-danger btn-sm">Delete</a>
                                    <a href="{{ route('admin.vendors.view', $grocery->id) }}"
                                        class="btn btn-info btn-sm">View</a>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Restaurant tab --}}
            <div class="tab-pane fade" id="restaurant-tab-pane" role="tabpanel" aria-labelledby="restaurant-tab"
                tabindex="0">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
                    aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                        <tr>
                            <th rowspan="1" colspan="1">Sr no.</th>
                            <th rowspan="1" colspan="1">Name</th>
                            <th rowspan="1" colspan="1">Email</th>
                            <th rowspan="1" colspan="1"> Mobile no.</th>
                            <th rowspan="1" colspan="1">Address</th>
                            <th rowspan="1" colspan="1">Status</th>
                            <th rowspan="1" colspan="1"> Action </th>

                        </tr>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($restaurants as $restaurant)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{ $loop->index + 1 }}</td>
                                <td>{{ $restaurant->name }}</td>
                                <td>{{ $restaurant->email }}</td>
                                <td>{{ $restaurant->phone }}</td>
                                <td>{{ $restaurant->address }}</td>
                                <td>
                                    @if ($restaurant->vendor->is_verified == 1)
                                        <span class="badge badge-success">Approve</span>
                                    @elseif($restaurant->vendor->is_verified == 2)
                                        <span class="badge badge-danger">Deny</span>
                                    @else
                                        <span class="badge badge-warning">Pending</span>
                                    @endif</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.user.delete', $restaurant->id) }}"
                                        class="btn btn-danger btn-sm">Delete</a>
                                    <a href="{{ route('admin.vendors.view', $restaurant->id) }}"
                                        class="btn btn-info btn-sm">View</a>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

            {{-- Pharmacy tab --}}
            <div class="tab-pane fade" id="pharmacy-tab-pane" role="tabpanel" aria-labelledby="pharmacy-tab"
                tabindex="0">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                    role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                        <tr>
                            <th rowspan="1" colspan="1">Sr no.</th>
                            <th rowspan="1" colspan="1">Name</th>
                            <th rowspan="1" colspan="1">Email</th>
                            <th rowspan="1" colspan="1"> Mobile no.</th>
                            <th rowspan="1" colspan="1">Address</th>
                            <th rowspan="1" colspan="1">Status</th>
                            <th rowspan="1" colspan="1"> Action </th>

                        </tr>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pharmacies as $pharmacy)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{ $loop->index + 1 }}</td>
                                <td>{{ $pharmacy->name }}</td>
                                <td>{{ $pharmacy->email }}</td>
                                <td>{{ $pharmacy->phone }}</td>
                                <td>{{ $pharmacy->address }}</td>
                                <td>
                                    @if ($pharmacy->vendor->is_verified == 1)
                                        <span class="badge badge-success">Approve</span>
                                    @elseif($pharmacy->vendor->is_verified == 2)
                                        <span class="badge badge-danger">Deny</span>
                                    @else
                                        <span class="badge badge-warning">Pending</span>
                                    @endif</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.user.delete', $pharmacy->id) }}"
                                        class="btn btn-danger btn-sm">Delete</a>
                                    <a href="{{ route('admin.vendors.view', $pharmacy->id) }}"
                                        class="btn btn-info btn-sm">View</a>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
