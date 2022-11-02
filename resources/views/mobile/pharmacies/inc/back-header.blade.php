<header class="top_header align-item-center">
    <div class="header theme-bg py-2">
     <div class="container-fluid d-flex  ">
         <div class="store_header">
             <div class="store">
                 <img class="location_icon" src="{{asset('asset/images/Arrow-left.svg')}}" alt="" onclick="history.back()">
                 {{-- <div class="store_det">
                     <h1 class="store_name">@yield('header_title')</h1>
                 </div> --}}
                 <div class="store_det">
                     <span class="text-white">@yield('header_title')</span>
                 </div>
             </div>
         
   {{--  <div class="container-fluid d-flex ">
          <div class="head-left d-flex align-items-center justify-content-center">
              <span class="text-white">@yield('header_title')</span>
          </div>
        </div> --}}
    </div>
   </div>
   </header>