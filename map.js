var map;
$(document).ready(function() {
    latitudine   = 30.329036563816963;
    longitudine  = -81.65843118944692;
    mapOptions = {
        center: new google.maps.LatLng(latitudine,longitudine),
        zoom: 18,
    mapTypeId: google.maps.MapTypeId.SATELLITE
    }
    map = new google.maps.Map($("#mapDiv")[0], mapOptions);
    marker = new google.maps.Marker({position: new google.maps.LatLng(latitudine,longitudine), map: map});
});