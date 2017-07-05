<?php

$section = <<<"SECTION"
<figure id="owner" class="float-left">
  <img src="/static/image/owner.jpg" alt="Uk Bory">
  <figcaption>Mr. Uk Bory, Founder</figcaption>
</figure>
<p>
Benyamin Business Co., Ltd. is a professional company specializing in business registration and tax consultation.
</p>
SECTION;

$article = <<<"ARTICLE"
<div id="googleMap" style="width:100%;height:400px;"></div>
ARTICLE;

$js = <<<"JS"
<script>
    function getMap() {
        var center = new google.maps.LatLng(11.586706,104.843967);
        var mapProp = {
            center: center,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        var marker = new google.maps.Marker({
            position: center,
            animation: google.maps.Animation.BOUNCE,
        });
        marker.setMap(map);

        var infowindow = new google.maps.InfoWindow({
            content: "Welcome!"
        });
        infowindow.open(map,marker);
    }
</script>
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACYDVau-wlf-OHsb1KIWHYQ22ex9Hq8ps&callback=getMap"></script>
JS;

require __DIR__ . '/_base_/_base_.html.php';
