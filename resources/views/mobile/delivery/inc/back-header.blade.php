<div class="header theme-bg py-2">
    <div class="container-fluid d-flex justify-content-between">

        <div class="head-left d-flex align-items-center justify-content-center">
            <div onclick="history.back()">
                <img src="{{ asset('asset/images/left-arrow.svg') }}" class="mr-3">
            </div>
            <span class="text-white ff-25">@yield('header_title')</span>

        </div>

        @if (Request::route()->getName() == 'mobile.delivery.order-detail')
            <div class="head-right d-flex align-items-center justify-content-center loca-left">
                <img src="{{ asset('asset/images/loca.svg') }}" alt="" onclick="window.location='#'">
            </div>
        @endif
        @if (Request::route()->getName() == 'mobile.delivery.complete_delivery')
            <div class="head-right d-flex align-items-center justify-content-center loca-left">
                <img src="{{ asset('asset/images/loca.svg') }}" alt="" onclick="window.location='#'">
            </div>
        @endif
        @if (Request::route()->getName() == 'mobile.delivery.final_order')
            <div class="head-right d-flex align-items-center justify-content-center loca-left">
                <img src="{{ asset('asset/images/loca.svg') }}" alt="" onclick="window.location='#'">
            </div>
        @endif


        @if (Request::route()->getName() == 'mobile.delivery.delivery_acount')
            <div class="head-right d-flex align-items-center justify-content-center loca-left">
                <img src="{{ asset('asset/images/bell1.svg') }}" alt="" onclick="window.location='#'">
            </div>
        @endif

        @if (Request::route()->getName() == 'mobile.delivery.document')
            <div class="head-right d-flex align-items-center justify-content-center loca-left">
                <img src="{{ asset('asset/images/bell1.svg') }}" alt="" onclick="window.location='#'">
            </div>
        @endif




    </div>
</div>
</div>
