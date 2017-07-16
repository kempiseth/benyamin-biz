<?php

$section = <<<"SECTION"
<table>
  <tr>
    <td>Email:</td>
    <td><a href="mailto:boryuk@gmail.com" target="_blank" title="Send us an email">boryuk@gmail.com</a></td>
  </tr>
  <tr>
    <td>Phone:</td>
    <td>
      098 481 115<br>
      092 707 212<br>
      031 3333 589
    </td>
  </tr>
</table>
<div id="googleMap" style="width:100%;height:400px;"></div>
SECTION;

$article = <<<"ARTICLE"
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
