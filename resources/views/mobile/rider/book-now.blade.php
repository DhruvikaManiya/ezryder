@extends('layouts.mobile-rider')

@section('header_title', 'Rider Request')

@section('css')

    <style>
        .book_now {
            padding-left: 0;
        }

        .row {
            padding: 15px;
        }

        .rider-3-idbox1 {
            width: 100%;
        }

        .rider-3-group {
            padding-bottom: 0px;
        }

        .head {
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


    @isset($requests)
    <div class="container">
        <div class="row book_now ">
            <div class="rider-3-group">
                <h2 class="head">Pickup Address</h2>
                <p class="address">@isset($requests) {{ $requests->pick_address }} @endisset</p>
                <h2 class="head">Drop Address</h2>
                <p class="address">@isset($requests) {{ $requests->drop_address }} @endisset</p>
                <h2 class="status mt-21 ptt-7">Payment Status: &nbsp; pending</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row book_now ptt-7">

            <div class="rider-3-idbox rider-3-idbox1">
                <form method="post" action="{{route('mobile.rider.book-request')}}">
                    @csrf
                    <div class="id-price">
                        <div class="id">
                            ID:@isset($requests) {{ \Illuminate\Support\Carbon::parse($requests->created_at)->format('mYd')  }} @endisset </div>
                        <div class="kms">12 Kms</div>
                        <div class="price">Price: $25</div>
                    </div>
                    <div class="btn-group">
                        <input type="hidden" name="request_id" value=" @isset($requests) {{ $requests->id }} @endif">
                        <button class="btn1" name="accept" value="0">Reject</button>
                        <button class="btn2" type="submit" name="accept" value="1">
                            Accept
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @else

        <div class="container">
            <div class="row book_now ">
                <div class="rider-3-group">
                    <h2 class="head">No request  you have !</h2>
                    </div>
            </div>
        </div>

    @endif



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
