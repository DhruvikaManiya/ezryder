@extends('layouts.admin.master')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Brand</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Brand</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

    <div class="container-fluid">


        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Add Brand</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="{{ route('admin.brand.add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- <div class="form-group">
                                <label for="name">Type</label>
                                <select name="type" class="form-control">
                                    <option value="1">Grocery</option>
                                    <option value="2">Food</option>
                                    <option value="3">Pharmacy</option>
                                </select>
                            </div> -->
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter name">
                            </div>
                            <!-- <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control" placeholder="Enter description"></textarea>
                            </div> -->
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control" accept="images/*">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
