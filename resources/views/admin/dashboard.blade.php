 @extends('layouts.admin.master')
 @section('css')
 @endsection
 @section('content')
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">Dashboard</h1>
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                         <li class="breadcrumb-item active">Dashboard</li>
                     </ol>
                 </div><!-- /.col -->
             </div><!-- /.row -->
         </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->
     <div class="container-fluid">



         <!-- Content Row -->

             <div class="row ">


                 <!-- Earnings (Monthly) Card Example -->
                 <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-primary shadow h-100 py-2">
                         <div class="card-body">
                             <div class="row no-gutters align-items-center">
                                 <div class="col mr-2">
                                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                         Total User</div>
                                     <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $total_users }} </div>
                                 </div>
                                 <div class="col-auto">
                                     <i class="fas fa-user fa-2x text-gray-300"></i>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <!-- Earnings (Monthly) Card Example -->
                 <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-success shadow h-100 py-2">
                         <div class="card-body">
                             <div class="row no-gutters align-items-center">
                                 <div class="col mr-2">
                                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                         New User</div>
                                     <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $new_users }}</div>
                                 </div>
                                 <div class="col-auto">
                                     <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <!-- Earnings (Monthly) Card Example -->
                 <div class="col-xl-3 col-md-6 mb-4">
                     <div class="card border-left-info shadow h-100 py-2">
                         <div class="card-body">
                             <div class="row no-gutters align-items-center">
                                 <div class="col mr-2">
                                     <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Today's order
                                     </div>
                                     <div class="row no-gutters align-items-center">
                                         <div class="col-auto">
                                             <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $new_orders }}
                                             </div>
                                         </div>
                                         <div class="col">
                                             <div class="progress progress-sm mr-2">
                                                 <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-auto">
                                     <i class="fas fa-cart-shopping fa-2x text-gray-300"></i>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>


             </div>
         </div>
 @endsection
