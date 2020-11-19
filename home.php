<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 10
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('I am here');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
        // The marker, positioned at Uluru
        var uluru = {lat: 40.694358, lng: -73.985968};
       var marker = new google.maps.Marker({position: uluru, map: map});

       var uluru1 = {lat: 40.29511, lng: -73.396460};
       var marker1 = new google.maps.Marker({position: uluru1, map: map});

       var uluru2 = {lat: 40.529511, lng: -73.796460};
       var marker2 = new google.maps.Marker({position: uluru2, map: map});

       var uluru3 = {lat: 40.99511, lng: -73.996460};
       var marker3 = new google.maps.Marker({position: uluru3, map: map});
        


      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }

 
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAksmTESY6Fl13UrMykCjhjrl_b3GcHcSk&callback=initMap">
    </script>
  </body>
</html>