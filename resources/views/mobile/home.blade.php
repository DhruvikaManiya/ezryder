<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- swiper css cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('asset/css/main.css') }}">
    <style>
        .header {
            background-color: #008080;
            padding: 0.8rem;
            padding-left: 18px;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ asset('asset/images/EZRYDER.png') }}" alt="" width="30%" height="auto">
    </div>

    <div class="home_slider">

        <!-- Swiper start -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slider_box">
                        <div class="content">
                            <h1 class="title">Ride With Safety</h1>
                            <p class="para">Get 50% off on your first two ride</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider_box">
                        <div class="content">
                            <h1 class="title">Ride With Safety</h1>
                            <p class="para">Get 50% off on your first two ride</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider_box">
                        <div class="content">
                            <h1 class="title">Ride With Safety</h1>
                            <p class="para">Get 50% off on your first two ride</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider_box">
                        <div class="content">
                            <h1 class="title">Ride With Safety</h1>
                            <p class="para">Get 50% off on your first two ride</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="swiper-pagination"></div> -->
        </div>
        <!-- Swiper end -->
    </div>

    <!-- main area start -->
    <section class="home_main">
        <div class="container">
            <div class="home_items_bx">
                <a href="#" class="item">
                    <img src="{{ asset('asset/images/car-img.png') }}" alt="">
                    <h4 class="item_title">Ride With Safety</h4>
                </a>
                <a href="{{ route('mobile.food') }}" class="item">
                    <img src="{{ asset('asset/images/food-img.png') }}" alt="">
                    <h4 class="item_title">Order Food</h4>
                </a>
            </div>
            <div class="home_items_bx">
                <a href="{{ route('mobile.login') }}" class="item">
                    <img src="{{ asset('asset/images/grocery-img.png') }}" alt="">
                    <h4 class="item_title">Grocery</h4>
                </a>
                <a href="#" class="item">
                    <img src="{{ asset('asset/images/package-img.png') }}" alt="">
                    <h4 class="item_title">Package</h4>
                </a>
            </div>
            <div class="home_items_bx">
                <a href="#" class="item">
                    <img src="{{ asset('asset/images/rental-img.png') }}" alt="">
                    <h4 class="item_title">Rentals</h4>
                </a>
                <a href="#" class="item">
                    <img src="{{ asset('asset/images/intercity-img.png') }}" alt="">
                    <h4 class="item_title">Intercity Rides</h4>
                </a>
            </div>
            <div class="home_items_bx">
                <a href="{{route('mobile.pharmacies.pharmacieshome')}}" class="item">
                    <img src="{{ asset('asset/images/Pharmacies-img.png') }}" alt="">
                    <h4 class="item_title">Pharmacy</h4>
                </a>
                <a href="#" class="item">
                    <img src="{{ asset('asset/images/Reservations-img.png') }}" alt="">
                    <h4 class="item_title">Reservations</h4>
                </a>
            </div>
        </div>
    </section>
    <!-- main area end -->







    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: "auto",
            spaceBetween: 13,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
</body>

</html>
