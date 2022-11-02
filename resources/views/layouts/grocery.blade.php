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
    @include('mobile.grocery.inc.sidemanu')

    @yield('content')

    @include('mobile.grocery.inc.footer')

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

    <script>
        $('body').on('click', '#addCart', function() {
            var id = $(this).data('id');
            addToCart(id, flag = 1);

        });


        function addToCart(id, flag) {
            console.log(flag);
            $.ajax({
                url: "{{ route('cart.store') }}",
                method: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}",
                    flag: flag
                },
                success: function(response) {
                    console.log(response.message);

                    if (response.success) {
                        $('#iscart' + id).show();
                        $('.addCart' + id).attr('style', 'display:none !important');

                        if (response.message == 'delete') {

                            for (var i = 0; i < response.data.length; i++) {
                                console.log($('.addCart' + response.data[i].product_id));
                                $('#iscart' + response.data[i].product_id).attr('style',
                                    'display:none !important');
                                $('.addCart' + response.data[i].product_id).attr('style',
                                    'display:block !important');

                            }

                        }
                    } else {

                        var conform = confirm(
                            'After adding this product your cart will be empty. Do you want to continue?');

                        if (conform) {
                            addToCart(id, flag = 0);
                        }

                    }
                }
            });
        }
    </script>
    <script>
        $('body').on('click', '#wishlist', function() {
            var id = $(this).data('id');
            var user_id = {{ Auth::user()->id }};
            console.log(id, user_id);
            $.ajax({
                url: "{{ route('wishlist.store') }}",
                method: "POST",
                data: {
                    id: id,
                    user_id: user_id,
                    _token: "{{ csrf_token() }}"

                },
                success: function(response) {
                    console.log(response);

                    if (response.status == 'add') {
                        console.log('#wishlist' + id);
                        $('.wishlist' + id).attr('style', 'display:none !important');
                        $('.wishlistRemove' + id).attr('style', 'display:block !important');
                    } else {
                        $('.wishlist' + id).attr('style', 'display:block !important');
                        $('.wishlistRemove' + id).attr('style', 'display:none !important');
                    }
                }
            });
        });
    </script>
    <script>
        var lat = 0;
        var long = 0;

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Allow to premition.");
            }
        }

        function showPosition(position) {
            lat = position.coords.latitude;
            long = position.coords.longitude;

            $.ajax({
                url: "{{ route('mobile.nearbystore') }}",
                method: "POST",
                data: {
                    lat: lat,
                    long: long,
                    _token: "{{ csrf_token() }}"

                },
                success: function(response) {
                    $('#store_details').empty();
                    // console.log(response.data);
                    $.each(response.data, function(key, value) {
                     
                        var html = '<div class="swiper-slide">\
                                        <div class="item d-flex justify-content-start" id="store_url" data-id='+value.id+'>';
                        if (value.profile != null) {
                            html += '<img src="' + value.profile + '">';
                        } else {
                            html += '<img src="/asset/images/store-icon.svg">';
                        }

                        html += '<div class="storeContent p-2">\
                                                     <h3>' + value.name + '</h3>\
                                                     <p>' + value.address + '</p>\
                                                 </div>\
                                             </div>\
                                         </div>';
                        $('#store_details').append(html);
                    });

                    var swiper = new Swiper(".storeSwiper", {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    });
                    
                }
            });
        }

        window.onload = getLocation;

        $('body').on('click', '#store_url', function() {
            var id = $(this).data('id');
            window.location.href = "{{ url('mobile/store') }}/" + id;
        });
    </script>
    @yield('js')
</body>

</html>
