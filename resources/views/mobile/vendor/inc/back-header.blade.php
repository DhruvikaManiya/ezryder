<div class="header theme-bg py-2">
    <div class="container-fluid d-flex justify-content-between">
        <div class="head-left d-flex align-items-center justify-content-center">
            <div onclick="history.back()">
                <img src="{{ asset('asset/images/left-arrow.svg') }}" class="mr-3" >
            </div>
            
            <span class="text-white ff-25">@yield('header_title')</span>
            {{-- <div class="notification">
                <a href="{{route('vendor.notification_store')}}">
                    <div class="notBtn" >
                      
                        <div class="head-right d-flex align-items-center justify-content-center">
                            @if (count($notifications) > 0)
                          
                            <i class="fas fa-bell" style="margin-top:-20px;color:#f5f5f5;"></i>
                            <span class="number" style="margin-top:-4px;margin-left:-5px;color:#f5f5f5;">{{count($notifications)}}</span>
                           @else
                             <i class="fas fa-bell" style="margin-top:-20px;color:#f5f5f5;"></i>
                            {{-- <span class="number" style="margin-top:-4px;margin-left:-5px;color:#f5f5f5;"></span> 
                                
                            @endif
                       
                            
                        </div>
                      
                    </div>
                </a>
            </div> --}}

        </div>

            @if(Request::route()->getName() == 'vendor.order-detail')
            <div class="head-right d-flex align-items-center justify-content-center loca-left">
               {{-- <img src="{{asset('asset/images/loca.svg')}}" alt="" onclick="window.location='#'"> --}}
            </div>
            @endif



        {{-- check route --}}
        @if (Request::route()->getName() == 'vendor.products')
            <div class="head-right d-flex align-items-center justify-content-center">
                <img src="{{ asset('asset/images/plus-circle.svg') }}" alt=""
                    onclick="window.location='{{ route('vendor.addproducts') }}'">
            </div>
        @endif

    </div>
</div>
