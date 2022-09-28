@extends('layouts.mobile-rider')

@section('header_title', 'Rider Request')

@section('css')

<style>
.book_now {
    padding-left: 0;
}
.row{padding: 15px;}
.rider-3-idbox1 {
    width: 100%;
}
.rider-3-group{
    padding-bottom: 30px;
}
.head{
    font-weight: bold;
}

</style>
@endsection

@section('content')
    @include('mobile.rider.inc.back-header')


    <div class="maps">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d235014.15049961975!2d72.5797426!3d23.0202434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1661749568932!5m2!1sen!2sin"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

{{-- 
    <div class="container">
        <div class="row book_now">
            <div class="rider-3-group">
                <h2 class="head">Pickup Address</h2>
                <p class="address">D293, Laxmikdrupa, Arbadnagar, Odahv, Ahmedabad</p>
                <h2 class="head">Drop Address</h2>
                <p class="address">A510, Titanium city center, Anand nagar, raod, Prahlad nagar, Ahmedabad</p>
                <h2 class="status mt-21">Payment Status: &nbsp; pending</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row book_now">
            <div class="rider-3-idbox rider-3-idbox1">
                <div class="id-price">
                    <div class="id">ID: 123457</div>
                    <div class="kms">12 Kms</div>
                    <div class="price">Price: $3500</div>
                </div>
                <div class="btn-group">
                    <div class="btn1">Reject</div>
                    <div class="btn2" onclick="window.location='{{ route('mobile.rider.otp') }}'">Accept</div>
                </div>
            </div>
        </div>
    </div>
 --}}




    {{-- <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script> --}}
@endsection
