@extends('layouts.admin.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">

        <div class="card">


            <div class="tab-content" id="myTabContent">


                <div class="tab-pane fade show active" id="user-tab-pane" role="tabpanel" aria-labelledby="user-tab"
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
                                <th rowspan="1" colspan="1">Type</th>



                                <th rowspan="1" colspan="1" width='15%' class="text-center">Action</th>
                            </tr>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->type == 0 ? 'Customer' : ($user->type == 1 ? 'Admin' : ($user->type == 2 ? 'Vendor' : ($user->type == 3 ? 'Delivery boy' : 'Rider'))) }}
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('admin.user.delete', $user->id) }}"
                                            class="btn btn-danger btn-sm">Delete</a>
                                        <a href="{{ route('admin.user.view', $user->id) }}"
                                            class="btn btn-info btn-sm">View</a>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-right mt-2">

                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
