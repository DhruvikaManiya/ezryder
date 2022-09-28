<div class="header header1 theme-bg py-2">
    <div class="container-fluid d-flex justify-content-between">

        <div class="head-left d-flex align-items-center justify-content-center">
            <div onclick="history.back()">
                <img src="{{ asset('asset/images/left-arrow.svg') }}" class="mr-3">
            </div>
            <span class="text-white ff-25">@yield('header_title')</span>
        </div>

        @php
            $bell_route = ['mobile.rider.account', 'mobile.rider.document', 'mobile.rider.vehicle'];
        @endphp

        @if (in_array(Request::route()->getName(), $bell_route))
            <div class="head-right d-flex align-items-center justify-content-center loca-left">
                <img src="{{ asset('asset/images/bell1.svg') }}" alt="" onclick="window.location='#'">
            </div>
        @endif
    </div>
</div>
