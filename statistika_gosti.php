<?php require 'header.php'; ?>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANEoZ8RYqsd3TLyJX6CS1hcADO4wewpAg&sensor=true"></script>
    <script>
        function initialize() {
            var mapOptions = {
                center: new google.maps.LatLng(44.81890,20.45745),
                zoom: 2
            };
            var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);
            var url = "http://enyro.localhost.com/API/mapa";
            var myloc = new Array();
            $.getJSON(url, function(lokacije) {
                $.each (lokacije.markeri,function(i, marker){
                    kreirajMarker = new google.maps.Marker({
                        position: new google.maps.LatLng(marker.geoSirina,marker.geoDuzina),
                        map: map,
                        icon: 'logo.png',
                        title: marker.nazivTag
                    });
                })
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <style>
        #map-canvas { height: 500px; width: 760px; }
    </style>

<div class="container">
    <div class="page-header text-center">
        <h1>eNyro - Statistika gosta</h1>
    </div>

 <div id="map-canvas" style="margin:0 0 0 200px;"></div>

</div>

<?php require 'footer.php'; ?>