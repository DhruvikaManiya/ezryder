<div class="footer theme-bg py-2">
    <div class="container-fluid d-flex justify-content-between">
        <div class="home d-flex flex-column align-items-center justify-content-center" onclick="window.location='{{route('mobile.food')}}'">
            <img src="{{ asset('asset/images/Group 15.svg') }}">
            <h5>Home</h5>
        </div>
        <div class="home d-flex flex-column align-items-center justify-content-center" onclick="window.location='{{route('mobile.food.category')}}'">
            <img src="{{ asset('asset/images/hart.svg') }}">
            <h5>Categories</h5>
        </div>
        <div class="home d-flex flex-column align-items-center justify-content-center" onclick="window.location='{{route('mobile.food.orderhistory')}}'">
            <img src="{{ asset('asset/images/chat.svg') }}">
            <h5>History</h5>
        </div>
        <div class="home d-flex flex-column align-items-center justify-content-center" onclick="window.location='{{route('mobile.food.profile1')}}'">
            <img src="{{ asset('asset/images/Group 13.svg') }}">
            <h5>Profiles</h5>
        </div>
    </div>
</div>
