var markers = [];

function placeMarker(position, map, id_lab) {
   var infowindow = new google.maps.InfoWindow({
      content: id_lab
    });

  var marker = new google.maps.Marker({
    position: position,
    map: map,
  });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

  markers.push(marker);

}

function latlng(lat, lng) {
  return new google.maps.LatLng(lat,lng);
}

function initMarketArray(map) {
  var index = document.getElementsByTagName('input');
  for (var i = index.length - 1; i >= 0; i--) {
    //alert(index[i].value);
    var x = index[i].getAttribute('name');
    var y = index[i].getAttribute('id');
    var id_lab = "Codigo de Laboratorio: "+index[i].getAttribute('value');
    placeMarker(latlng(x,y), map, id_lab);
  };
  //placeMarker(latlng(-34.921986,-57.957281), map);
  //placeMarker(latlng(-34.910019,-57.950073), map);
  //placeMarker(latlng(-34.868129,-57.880679), map);
  //placeMarker(latlng(-34.924705,-57.90375 ), map);
  //placeMarker(latlng(-34.815519,-57.976491), map);
  //placeMarker(latlng(-34.906476,-57.947524), map);
  //placeMarker(latlng(-34.785888,-58.243014), map);
  //placeMarker(latlng(-34.769069,-58.249304), map);
  //placeMarker(latlng(-34.779503,-58.231537), map);
}

function initialize() {
  var myLatlng = new google.maps.LatLng(-34.914998,-57.948164);
  var mapOptions = {
    zoom: 4,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  //var marker = new google.maps.Marker({
  //    position: myLatlng,
  //    map: map,
  //    title: 'Hello World!'
  //});
  initMarketArray(map);
 
}

//google.maps.event.addDomListener(window, 'load', initialize);
