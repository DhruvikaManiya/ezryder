<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- no scalable -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,700;1,400;1,500;1,700" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{asset('asset/css/food.css')}}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <title></title>
    <style>
        body {
            padding-bottom: 45px;
        }

        .header {
            position: sticky;
            top: 0;
            z-index: 111;
        }

        .footer {
            position: fixed;
            width: 100%;
            bottom: 0;
            left: 0;
            z-index: 999;
        }

        .profiel-div {
            width: 100%;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .profiel-div .profile-img {
            width: 30%;
            padding: 40px 0;
        }

        .profiel-div img {
            width: 100%;
            height: auto;
        }
    </style>
    @yield('css')
</head>

<body class="home">
    {{-- @include('mobile.grocery.inc.sidemanu') --}}

    @yield('content')

    @include('mobile.food.inc.footer')

    <!-- Footer Ends -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('asset/js/site.js') }}"></script>
    <script src="{{ asset('asset/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".topSwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
        });
        var swiper = new Swiper(".catSwiper", {
            slidesPerView: 4.5,
            spaceBetween: 20,
        });
        var swiper = new Swiper(".storeSwiper", {
            slidesPerView: 1,
            spaceBetween: 20,

        });
        var swiper = new Swiper(".brandSwiper", {
            slidesPerView: 5,
            spaceBetween: 20,

        });

        $(document).ready(function() {
            $(".menu").click(function() {
                $("body").addClass("menuOpen");
            });
            $(".close-icon, .overlay").click(function() {
                $("body").removeClass("menuOpen");
            });


        });
    </script>
    @yield('js')
</body>

</html>
