@extends('layouts.admin.master')

@section('content')
<div class="container-fluid p-0">
    <div class="card">
        <div class="card-body">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User Details</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
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