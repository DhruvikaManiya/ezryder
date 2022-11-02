@extends('layouts.admin.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User Details</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">User Details</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container-fluid p-0">
    <div class="card">
        <div class="card-body">
  
    <hr>
    <!-- Content Row -->
    
            <div class="row">
                <div class="col-6" style="width: 100%; ">
                    <div class="form-group">
                        <label for=""> <strong>Name</strong> </label><br>
                        <label for=""> {{$user->name}}</label>
                    </div>            
                    <hr>
                </div>
                <div class="col-6" style="width: 100%; ">
                    <div class="form-group">
                        <label for=""> <strong>Email</strong> </label><br>
                        <label for=""> {{$user->email}}</label>
                    </div>            
                    <hr>
                </div>
                <div class="col-6" style="width: 100%; ">
                    <div class="form-group">
                        <label for=""> <strong>Mobile number</strong> </label><br>
                        <label for=""> {{$user->phone}}</label>
                    </div>            
                    <hr>
                </div>
                <div class="col-6" style="width: 100%; ">
                    <div class="form-group">
                        <label for=""> <strong>Password</strong> </label><br>
                        <label for=""> {{$user->password}}</label>
                    </div>            
                    <hr>
                </div>
                <div class="col-6" style="width: 100%; ">
                    <div class="form-group">
                        <label for=""> <strong>Address</strong> </label><br>
                        <label for=""> {{$user->address}}</label>
                    </div>            
                    <hr>
                </div>
                <div class="col-6" style="width: 100%; ">
                    <div class="form-group">
                        <label for=""> <strong>Area</strong> </label><br>
                        <label for=""> {{$user->area}}</label>
                    </div>            
                    <hr>
                </div>
                <div class="col-6" style="width: 100%; ">
                    <div class="form-group">
                        <label for=""> <strong>City</strong> </label><br>
                        <label for=""> {{$user->city}}</label>
                    </div>            
                    <hr>
                </div>
                <div class="col-6" style="width: 100%; ">
                    <div class="form-group">
                        <label for=""> <strong>State</strong> </label><br>
                        <label for=""> {{$user->state}}</label>
                    </div>            
                    <hr>
                </div> <div class="col-6" style="width: 100%; ">
                    <div class="form-group">
                        <label for=""> <strong>Pincode</strong> </label><br>
                        <label for=""> {{$user->pincode}}</label>
                    </div>            
                    <hr>
                </div>
                <div class="col-6" style="width: 100%; ">
                    <div class="form-group">
                        <label for=""> <strong>Country</strong> </label><br>
                        <label for=""> {{$user->country}}</label>
                    </div>            
                    <hr>
                </div>
                <div class="col-6" style="width: 100%; ">
                    <div class="form-group">
                        <label for=""> <strong>User profile</strong> </label><br>
                        {{-- @dd($user->profile) --}}
                        <label for=""> <img src="{{ asset($user->profile) }}" alt="" style="width: 100%; height:100px;" >
                        </label>
                            
                    </div>            
                    <hr>
                </div>
                <div class="col-12 text-center" style="width: 100%; ">
                    <div class="form-group">
                        <a class="btn btn-primary" href="{{route('admin.user')}}">Back</a>
                    </div>            
                    <hr>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection