function showMap( zip, lat, lon, city, state, county ){ 
        var latlon = new google.maps.LatLng(lat, lon)
        var mapholder = document.getElementById('mapholder');

        var mapProperties = {
            center:latlon,zoom:7,
            mapTypeId:google.maps.MapTypeId.ROADMAP,
        }
        if (!map){
            var map = new google.maps.Map(mapholder, mapProperties);
        }
        var marker = new google.maps.Marker({
                        position: latlon,
                        animation: google.maps.Animation.DROP,
        });
        
        marker.setMap(map);
        
        var infowindow = new google.maps.InfoWindow({
          content: zip + " = " + city + ", " + state +", " +county
          });
        
        infowindow.open(map,marker);
}

