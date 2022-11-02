<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">

        <span class="brand-text font-weight-light">Ezryder</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            {{-- <div class="image">
                <img src="{{asset('dist/img/user2-160x160".jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div> --}}
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item menu">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                   
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="fas fa-fw fa-list"></i>
                        <p>
                            Users
                        </p>
                        <i class="right fas fa-angle-right"></i>

                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.user') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                All Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.customers') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                Customer
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.vendors') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                Vendors
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.delivery') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                Delivery boy's
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.rider') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                Riders
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="fas fa-fw fa-list"></i>
                        <p>
                            Slider
                        </p>           
                         <i class="right fas fa-angle-right"></i>

                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.slider') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                               List Slider
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.slider.add') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                Add Slider
                            </a>
                        </li>
                       
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="fas fa-fw fa-list"></i>
                        <p>
                            Category
                        </p>
                        <i class="right fas fa-angle-right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.category') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                 List Category
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.category.add') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                Add Category
                            </a>
                        </li>
                       
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="fas fa-fw fa-list"></i>
                        <p>
                            Sub Category
                        </p>
                        <i class="right fas fa-angle-right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.subcategory') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                 List Sub Category
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.subcategory.add') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                Add Sub Category
                            </a>
                        </li>
                       
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="fas fa-fw fa-list"></i>
                        <p>
                            Product
                        </p>
                        {{-- <i class="right fas fa-angle-right"></i> --}}
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.product') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                 List Product
                            </a>
                        </li>
                       
                       
                    </ul>
                </li>
                
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="fas fa-fw fa-list"></i>
                        <p>
                            Brand
                        </p>
                        <i class="right fas fa-angle-right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.brand.view') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                 List Brand
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.brand') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                Add Brand
                            </a>
                        </li>
                       
                    </ul>

                </li>

            
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="fas fa-fw fa-list"></i>
                        <p>
                            Setting
                        </p>
                        <i class="right fas fa-angle-right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.setting') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                 Admin Setting
                            </a>
                        </li>
                   
                       
                    </ul>
                </li>
                
            </ul>
          
        
        </nav>
        
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
