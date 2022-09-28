@extends('layouts.admin.master')

@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user-tab-pane" type="button"
                role="tab" aria-controls="user-tab-pane" aria-selected="true">All Users</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin-tab-pane" type="button"
                role="tab" aria-controls="admin-tab-pane" aria-selected="false">Admins</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="vendor-tab" data-bs-toggle="tab" data-bs-target="#vendor-tab-pane" type="button"
                role="tab" aria-controls="vendor-tab-pane" aria-selected="false">Vendors</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="delivery-tab" data-bs-toggle="tab" data-bs-target="#delivery-tab-pane"
                type="button" role="tab" aria-controls="delivery-tab-pane" aria-selected="false">Delivery</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="rider-tab" data-bs-toggle="tab" data-bs-target="#rider-tab-pane" type="button"
                role="tab" aria-controls="rider-tab-pane" aria-selected="false">Riders</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="customer-tab" data-bs-toggle="tab" data-bs-target="#customer-tab-pane"
                type="button" role="tab" aria-controls="customer-tab-pane" aria-selected="false">Customers</button>
        </li>

    </ul>


    <div class="tab-content" id="myTabContent">

        {{-- ------------------------------------ALL USERS------------------------------------- --}}
        <div class="tab-pane fade show active" id="user-tab-pane" role="tabpanel" aria-labelledby="user-tab" tabindex="0">
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


                        <th rowspan="1" colspan="1" width='15%' class="text-center">Action</th>
                    </tr>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($user as $users)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{ $users->id }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->phone }}</td>
                            <td>{{ $users->address }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.user.delete', $users->id) }}"
                                    class="btn btn-danger btn-sm">Delete</a>
                                <a href="{{ route('admin.user.view', $users->id) }}" class="btn btn-info btn-sm">View</a>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- ----------------------------------------------ALL ADMINS--------------------------------------------------- --}}
        <div class="tab-pane fade" id="admin-tab-pane" role="tabpanel" aria-labelledby="admin-tab" tabindex="0">
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


                        <th rowspan="1" colspan="1" width='15%' class="text-center">Action</th>
                    </tr>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($admin as $users)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{ $users->id }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->phone }}</td>
                            <td>{{ $users->address }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.user.delete', $users->id) }}"
                                    class="btn btn-danger btn-sm">Delete</a>
                                <a href="{{ route('admin.user.view', $users->id) }}" class="btn btn-info btn-sm">View</a>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- ----------------------------------------------ALL VENDORS--------------------------------------------------- --}}
        <div class="tab-pane fade" id="vendor-tab-pane" role="tabpanel" aria-labelledby="vendor-tab" tabindex="0">
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


                        <th rowspan="1" colspan="1" width='15%' class="text-center">Action</th>
                    </tr>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($vendor as $users)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{ $users->id }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->phone }}</td>
                            <td>{{ $users->address }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.user.delete', $users->id) }}"
                                    class="btn btn-danger btn-sm">Delete</a>
                                <a href="{{ route('admin.user.view', $users->id) }}" class="btn btn-info btn-sm">View</a>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- ----------------------------------------------ALL DELIVERY--------------------------------------------------- --}}
        <div class="tab-pane fade" id="delivery-tab-pane" role="tabpanel" aria-labelledby="delivery-tab"
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


                        <th rowspan="1" colspan="1" width='15%' class="text-center">Action</th>
                    </tr>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($delivery as $users)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{ $users->id }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->phone }}</td>
                            <td>{{ $users->address }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.user.delete', $users->id) }}"
                                    class="btn btn-danger btn-sm">Delete</a>
                                <a href="{{ route('admin.user.view', $users->id) }}" class="btn btn-info btn-sm">View</a>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- ----------------------------------------------ALL RIDERS--------------------------------------------------- --}}
        <div class="tab-pane fade" id="rider-tab-pane" role="tabpanel" aria-labelledby="rider-tab" tabindex="0">
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


                        <th rowspan="1" colspan="1" width='15%' class="text-center">Action</th>
                    </tr>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($rider as $users)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{ $users->id }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->phone }}</td>
                            <td>{{ $users->address }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.user.delete', $users->id) }}"
                                    class="btn btn-danger btn-sm">Delete</a>
                                <a href="{{ route('admin.user.view', $users->id) }}" class="btn btn-info btn-sm">View</a>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- ----------------------------------------------ALL CUSTOMERS--------------------------------------------------- --}}
        <div class="tab-pane fade" id="customer-tab-pane" role="tabpanel" aria-labelledby="customer-tab"
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


                        <th rowspan="1" colspan="1" width='15%' class="text-center">Action</th>
                    </tr>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($customer as $users)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{ $users->id }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->phone }}</td>
                            <td>{{ $users->address }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.user.delete', $users->id) }}"
                                    class="btn btn-danger btn-sm">Delete</a>
                                <a href="{{ route('admin.user.view', $users->id) }}" class="btn btn-info btn-sm">View</a>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
