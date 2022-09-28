<div class="header theme-bg py-2">
    <div class="container-fluid d-flex justify-content-between">
        <div class="head-left d-flex align-items-center justify-content-center">
            <img src="{{ asset('asset/images/left-arrow.svg') }}" class="mr-3" onclick="history.back()">
            <span class="text-white ff-25">@yield('header_title')</span>
        </div>

        {{-- check route --}}
        @if(Request::route()->getName() == 'vendor.products')
            <div class="head-right d-flex align-items-center justify-content-center">
               <img src="{{asset('asset/images/plus-circle.svg')}}" alt="" onclick="window.location='{{route('vendorfood.addproducts')}}'">
            </div>
        @endif

    </div>
</div>
