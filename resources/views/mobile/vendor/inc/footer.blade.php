<div class="footer theme-bg py-2">
    <div class="container-fluid d-flex justify-content-between" >
        <div class="home d-flex flex-column align-items-center justify-content-center" onclick="window.location='{{route('vendor.dashboard')}}'">

            <img src="{{ asset('asset/images/home.png') }}">
            <h5>Home</h5>
        </div>
        <div class="home d-flex flex-column align-items-center justify-content-center" onclick="window.location='{{route('vendor.analytics')}}'">
            <img src="{{ asset('asset/images/trending-up.svg') }}">
            <h5>Analytics</h5>
        </div>
        <div class="home d-flex flex-column align-items-center justify-content-center" onclick="window.location='{{route('vendor.account')}}'">
            <img src="{{ asset('asset/images/Group 13.svg') }}">
            <h5>Accounts</h5>
        </div>
    </div>
</div>
