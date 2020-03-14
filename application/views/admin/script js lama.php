<script>
  $(document).ready( function () {
    $('#wisata').DataTable();

  //   mymap.on('click', function(ev){
    // var latlng = mymap.mouseEventToLatLng(ev.originalEvent);
  //   var marker = new L.marker([latlng.lat, latlng.lng]).addTo(mymap)
  //     .bindPopup('Latitude :'+latlng.lat+'<br> Longitude:'+latlng.lng)
  //     .openPopup();
  //   marker.on('move')
  //   // onMapClick(latlng.lat, latlng.lng);
  //   console.log(latlng.lat + ', ' + latlng.lng);
  //   mymap.removeLayer(marker)
  // });
  mymap.on('click',
  function mapClickListen(e) {
    var latlng = mymap.mouseEventToLatLng(e.originalEvent);
    var lat = latlng.lat;
    var long = latlng.lng;
    console.log('map click event');
    var marker = L.marker(
      [latlng.lat, latlng.lng], {
        draggable: true
      }
    );
    marker.on('move', function(e) {
      console.log('marker move event');
    });
    marker.on('movestart', function(e) {
      mymap.removeLayer(marker)
    });
    marker.on('moveend', function(e) {
      mymap.addLayer(marker);
    });
    marker.addTo(mymap)
    .bindPopup('Latitude :'+latlng.lat+'<br> Longitude:'+latlng.lng)
    .openPopup();
    console.log(latlng.lat + ', ' + latlng.lng);
  }
);
  } );
  var mymap = L.map('mapid').setView([0.790990, 101.640015], 7);


  L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=stOvTjFchSGDaT6JwokJ', {
    attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
  }).addTo(mymap);
</script>