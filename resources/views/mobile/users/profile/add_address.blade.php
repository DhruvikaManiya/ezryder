@extends('layouts.ecommerce')
@section('content')
    <div class="main-container no-padding navStyle orderHistory" id="addBankDetails">
        <article id="top-nav">
            <div class="reviewBackButton">
                <img src="/pages/assets/loginScreen/leftArrow.png" alt="">
                <p>Add Address</p>
            </div>
            <p>
                <!-- <span>3</span> -->
                <!-- <img src="/pages/assets/homeScreen/shoppingBag.png" alt=""> -->
            </p>
        </article>
        <form method="post" action="{{ route('address.store') }}">
            @csrf
            <article>
                <label for="email">Full Address *</label>
                <input id="pac-input" type="text" placeholder="Enter Full Address" name="address" />
            </article>

            <article>

                <div id="map" style="width: 100%;height: 300px;margin-top: 10px;"></div>
                <div id="infowindow-content">
                    <span id="place-name" class="title"></span><br />
                    <span id="place-address"></span>
                </div>
            </article>

            <article>
                <label for="email">Mark</label>
                <input type="text" name="mark" placeholder="Enter your mark">
            </article>

            <article>
                <label for="email">Lat</label>
                <input type="text" name="lat" placeholder="Enter your Lat" readonly>
            </article>

            <article>
                <label for="email">Long</label>
                <input type="text" name="long" placeholder="Enter your Long" readonly>
            </article>

            <button id="login">
                <p>Save</p>
                {{-- <span>&gt;</span> --}}
            </button>
        </form>



    </div>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxFOXH9Z4pvxbdYUdzKQ7B1pOADYFHeRQ&callback=initMap&libraries=places&v=weekly"
        defer></script>

    <script>
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 40.749933,
                    lng: -73.98633
                },
                zoom: 13,
                panControl: false,
                zoomControl: false,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                overviewMapControl: false,
                rotateControl: false,
                fullscreenControl: false,

            });
            const card = document.getElementById("pac-card");
            const input = document.getElementById("pac-input");
            const biasInputElement = document.getElementById("use-location-bias");
            const strictBoundsInputElement = document.getElementById("use-strict-bounds");
            const options = {
                fields: ["formatted_address", "geometry", "name"],
                strictBounds: false,
                types: ["establishment"],
            };

            map.controls[google.maps.ControlPosition.TOP_LEFT].push(card);

            const autocomplete = new google.maps.places.Autocomplete(input, options);

            autocomplete.bindTo("bounds", map);

            const infowindow = new google.maps.InfoWindow();
            const infowindowContent = document.getElementById("infowindow-content");

            infowindow.setContent(infowindowContent);

            const marker = new google.maps.Marker({
                map,
                anchorPoint: new google.maps.Point(0, -29),
            });

            autocomplete.addListener("place_changed", () => {
                infowindow.close();
                marker.setVisible(false);

                const place = autocomplete.getPlace();

                if (!place.geometry || !place.geometry.location) {

                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }


                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }

                marker.setPosition(place.geometry.location);
                marker.setVisible(true);
                infowindowContent.children["place-name"].textContent = place.name;
                infowindowContent.children["place-address"].textContent =
                    place.formatted_address;
                infowindow.open(map, marker);




                console.log(place.geometry.location.lat(), place.geometry.location.lng());

                $('input[name=lat]').attr('value', place.geometry.location.lat());
                $('input[name=long]').attr('value', place.geometry.location.lng());

            });


        }

        window.initMap = initMap;
    </script>
@endsection
