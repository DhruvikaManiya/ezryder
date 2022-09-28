<div class="header theme-bg py-2">
    <div class="container-fluid d-flex justify-content-between">
        <div class="head-left d-flex align-items-center justify-content-center">

            <img src="{{ asset('asset/images/manu.svg') }}" class="mr-3 menu w-24px">
            <img src="{{ asset('asset/images/Group 184.svg') }}" class="mr-2 w-18px">
            <span class="text-white ff-19">Ahmedabad</span>
        </div>
        <div class="head-right">
            <img src="{{ asset('asset/images/Group 185.svg') }}" class="mr-3 w-20px" onclick="window.location='{{route('mobile.search')}}'">
            <img src="{{ asset('asset/images/Group 186.svg') }}" class="mr-3 w-20px" onclick="window.location='{{route('mobile.cart')}}'">
            <img src="{{ asset('asset/images/Group 187.svg') }}" class="w-20px">

        </div>
    </div>

</div>
