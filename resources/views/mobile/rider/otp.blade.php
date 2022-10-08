@extends('layouts.mobile-rider')

@section('header_title', 'Rider Request')

@section('css')
    <style>
        .popup-main {
            position: fixed;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.5);
            width: 100%;
            height: 100%;
            z-index: 1111;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .popup-container {
            width: 90%;
            height: 50vh;
        }

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
                <div class="align-items-center d-flex id-price justify-content-between w-100">
                    <div class="id">ID: {{ \Illuminate\Support\Carbon::parse($requests->requests->created_at)->format('mYd')  }}</div>
                    <div class="kms">12 Kms</div>
                    <div class="price">Price: $25</div>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row book_now">
            <div class="rider-4-group">
                <h2 class="accept-status">Status: Accepted by Driver</h2>
                <div class="pickup">
                    <h2 class="head">Pickup Address</h2>
                    <img src="{{ asset('asset/images/share.png') }}" alt="" class="mr-25">
                </div>
                <p class="address">{{ $requests->requests->pick_address }}</p>
                <div class="drop">
                    <select class="drop_down_select ff-inter">
                        <option>Drop Address</option>
                    </select>
                </div>
                <div class="btn" onclick="show_popup();">Pickup Done</div>

            </div>
        </div>
    </div>


    <section class="popup-main" @if($errors->any()) @else style='display: none;' @endif>
        <div class="popup">
            <div class="popup-content">


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{route('mobile.rider.verifyotp')}}">
                    @csrf
                    <div class="head">Enter OTP for Pickup Done</div>

                    <input type="number" class="otp" required name="otp">

                    <button type="submit" class="btn">Submit</button>
                </form>
            </div>
        </div>
    </section>

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

        function show_popup() {
            $('.popup-main').show();
        }
    </script>
@endsection
