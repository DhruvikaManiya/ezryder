@extends('layouts.mobile-rider')


@section('header_title', 'Rider Request')
@section('css')
<style>
     .book_now {
        padding-left: 0;
    }
    .row{padding:0 15px;}
    .rider-4-group{padding-top: 0;}
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
    <div class="container">
        <div class="row book_now">
            <div class="rider-4-idbox w-100">
                <div class="id-price align-items-center d-flex justify-content-between w-100">
                    <div class="id">ID: {{ \Illuminate\Support\Carbon::parse($requests->requests->created_at)->format('mYd')  }}</div>
                    <div class="kms">12 Kms</div>
                    <div class="price">Price: $25</div>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row book_now">
            <form method="post" action="{{route('mobile.rider.drop_complete')}}" >
                @csrf
                <div class="rider-4-group">
                    <h2 class="accept-status">Status: Pickup done by Driver</h2>
                    <div class="pickup">
                        <h2 class="head">Drop Address</h2>
                        <img src="{{ asset('asset/images/share.png') }}" alt="">
                    </div>
                    <p class="address">{{ $requests->requests->drop_address }}</p>
<!--                    <div class="btn rider-6-btn" onclick="window.location='{{ route('mobile.rider.collect') }}'">Drop
                        Completed
                    </div>-->

                    <button class="btn rider-6-btn" type="submit" name="request_id" value="{{ $requests->requests->id }}">
                        Drop Completed
                    </button>

                </div>
            </form>
        </div>
    </div>





    <script>
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
    </script>
@endsection
