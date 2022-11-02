@extends('layouts.mobile-taxi-rider')
@section('header_title', 'Home')

@section('content')
    <div class="main-container" id="dropLocation">
        <div class="topNavbar">
            <article class="topNav">
                <h2><img src="{{ url('asset/rider/assets/leftArrow.png')}}"/>Select Car</h2>
                <img src="{{ url('asset/rider/assets/notification.png')}}" alt=""/>
            </article>

            <form action="" id="dropLocationSearch" class="padding-lr">
                <div class="inputContainer">
                    <img src="{{ url('asset/rider/assets/compass.png') }}" alt=""/>
                    <input
                            type="text"
                            name="pick_address" id="pick_address"
                            class="address"
                            placeholder="Enter your pickup Address"
                    />
                </div>
                <div class="inputContainer">
                    <img src="{{ url('asset/rider/assets/search.png') }}" alt=""/>
                    <input
                            type="text"
                            class="search" onkeypress="calcRoute()"
                            name="drop_address" id="drop_address"
                            placeholder="Select your drop location"
                    />
                </div>
                <div id="map" style="width: 100%;height: 300px;margin-top: 10px;"></div>
            </form>
        </div>
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
        const input = document.getElementById("pick_address");
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
        });

        const input1 = document.getElementById("drop_address");
        const options1 = {
          fields: ["formatted_address", "geometry", "name"],
          strictBounds: false,
          types: ["establishment"],
        };

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(card);
        const autocomplete1 = new google.maps.places.Autocomplete(input1, options1);
        autocomplete1.bindTo("bounds", map);


        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer();
        directionsRenderer.setMap(map);

      }
      function calcRoute() {
        const directionsService = new google.maps.DirectionsService();
        var start = document.getElementById('pick_address').value;
        var end = document.getElementById('drop_address').value;
        var request = {
          origin: start,
          destination: end,
          travelMode: 'DRIVING'
        };
        directionsService.route(request, function(result, status) {
          if (status == 'OK') {
            directionsRenderer.setDirections(result);
          }
        });
      }
      window.initMap = initMap;

    </script>
@endsection