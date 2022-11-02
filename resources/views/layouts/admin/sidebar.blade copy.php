<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> --}}
        <img src="{{ asset('asset/images/EZRYDER.svg') }}" alt="" class="w-100">
        {{-- <div class="sidebar-brand-text">Ezeyder <sup></sup></div> --}}
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">

    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
            aria-expanded="true" aria-controls="collapseUser">
            <i class="fas fa-fw fa-list"></i>
            <span>User</span>
        </a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Components:</h6>
                <a class="collapse-item" href="{{ route('admin.user') }}">All User</a>
                <a class="collapse-item" href="{{ route('admin.customers') }}">Customers</a>
                <a class="collapse-item" href="{{ route('admin.vendors') }}">Vendors</a>
                <a class="collapse-item" href="{{ route('admin.delivery') }}">Delivery boy's</a>
                <a class="collapse-item" href="{{ route('admin.rider') }}">Riders</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-list"></i>
            <span>Slider</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Slider Components:</h6>
                <a class="collapse-item" href="{{ route('admin.slider') }}">List Slider</a>
                <a class="collapse-item" href="{{ route('admin.slider.add') }}">Add Slider</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo2"
            aria-expanded="true" aria-controls="collapseTwo2">
            <i class="fas fa-fw fa-list"></i>
            <span>Category</span>
        </a>
        <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">category Components:</h6>
                <a class="collapse-item" href="{{ route('admin.category') }}">List category</a>
                <a class="collapse-item" href="{{ route('admin.category.add') }}">Add category</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-list"></i>
            <span>Sub-Category</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">sub-category components:</h6>
                <a class="collapse-item" href="{{ route('admin.subcategory') }}">List sub-category</a>
                <a class="collapse-item" href="{{ route('admin.subcategory.add') }}">Add sub-category</a>

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.product') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Product</span>

        </a>
        {{-- <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Product components:</h6>
                <a class="collapse-item" href="">list Product</a>
                <a class="collapse-item" href="{{ route('admin.product.add') }}">Add Product</a>

            </div>
        </div> --}}
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3"
            aria-expanded="true" aria-controls="collapseUtilities3">
            <i class="fas fa-fw fa-list"></i>
            <span>Brand</span>
        </a>
        <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Brand components:</h6>
                <a class="collapse-item" href="{{ route('admin.brand.view') }}">list Brand</a>
                <a class="collapse-item" href="{{ route('admin.brand') }}">Add Brand</a>

            </div>
        </div>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.setting') }}"  >
            <i class="fas fa-fw fa-list"></i>
            <span>Admin Setting</span>
        </a>
    </li> --}}
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
