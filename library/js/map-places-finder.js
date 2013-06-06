var map, places, iw, shadow, filterSTO,id_divre;
var ne_lat,ne_lon,sw_lat,sw_lon;
var id_sto=[];
var markers_sto = [];
var markers_fo = [];
var latlon_sto=[];
var latlon_fo=[];
var nama_fo=[];
var nama_sto=[];
var autocomplete;
var countryRestrict = { 'country': 'id' };
var MARKER_DIVRE = '../library/images/office-building.png';
var MARKER_STO = '../library/images/bighouse.png';
var MARKER_FO = '../library/images/group-2.png';
var MARKER_CALL = '../library/images/telephone.png';
var MARKER_PATH = 'http://maps.gstatic.com/intl/en_us/mapfiles/marker_orange';
var SHADOW_URL = "http://maps.gstatic.com/intl/en_us/mapfiles/markers/marker_sprite.png";
var hostnameRegexp = new RegExp('^https?://.+?/');

var countries = {
  'id': {center: new google.maps.LatLng(-1,115),
    zoom: 5
  }
};

$(document).ready(function(){	
	initialize();
});

function initialize() {
  //opsi tampilan peta
  var myOptions = {
    zoom: countries['id'].zoom,
    center: countries['id'].center,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }

  //buat peta 
  map = new google.maps.Map(document.getElementById("map-places-finder"), myOptions);

  var lat,lon;
  
  google.maps.event.addListener(map, "click", function(event) {
    var lat = event.latLng.lat();
    var lng = event.latLng.lng();
    map.panTo(new google.maps.LatLng(lat,lng));
    map.setZoom(12);
  });


  google.maps.event.addListener(map, 'idle', function() {

    var bounds =  map.getBounds();
    ne_lat = bounds.getNorthEast().lat();
    ne_lon = bounds.getNorthEast().lng();
    sw_lat = bounds.getSouthWest().lat();
    sw_lon = bounds.getSouthWest().lng();
    latlon_sto=[];
    latlon_fo=[];
    console.log(map.getZoom());

    if(map.getZoom()>=10){
      getCoordinatSTObyMapBounds();
    }
    if (map.getZoom()>=12){
      getCoordinatSTObyMapBounds();
    }
    if (map.getZoom()<12) {
      clearMarkersFO();
      clearResultsFO();
    }
    if (map.getZoom()<10) {
      clearMarkersSTO();
      clearResultsSTO();
    }
  });

  //aksi jika dropdown STO di pilih
  $("#filterSTO").change(function(){
    var lat,lon;
    id_sto=$("#filterSTO").val();

    var nama,data1;

    //ambil data koordinat FO berdasarkan STO
    $.ajax({ 
      url: "../peta/get_data.php", 
      data: "filter=get_coor_fo&id="+id_sto, 
      cache: false, 
      success: function(msg){

        data = msg.split("#"); 
        for (var i =0; i<data.length;i++){
          data1=data[i].split("|");
          nama=data1[0];
          lat=data1[1];
          lon=data1[2];
          nama_team[i]=nama;
          latlon[i]=new google.maps.LatLng(lat,lon);
          console.log(lat+"_"+lon);
        }
      } 
    }); 
    

    //ambil data koordinat zoom peta berdasarkan STO
    $.ajax({ 
      url: "../peta/get_data.php", 
      data: "filter=get_coor&id="+id_sto, 
      cache: false, 
      success: function(msg){ 
        data = msg.split("|"); 
        lat=data[0];
        lon=data[1];

        place_changed(lat,lon);
      } 
    }); 

  });

  shadow = new google.maps.MarkerImage(
    SHADOW_URL,
    new google.maps.Size(32,37),
    new google.maps.Point(22,0),
    new google.maps.Point(8, 32)
  );      
}

//fungsi zoom
function place_changed(lat,lon) {
	map.panTo(new google.maps.LatLng(lat,lon));
	map.setZoom(7);
	search();
  node();
}

function click_zoom_sto(i){
  return function(place, status) {
    map.panTo(latlon_sto[i]);
    map.setZoom(12);
    // getCoordinatFO_byMapBounds_bySTO(id_sto[i]);
    getCoordinatFO_bySTO(id_sto[i]);
  }
}
function click_zoom_fo(i){
  return function(place, status) {
    map.panTo(latlon_fo[i]);
    map.setZoom(15);
    console.log("sdasdasdsadasdas");
  }
}

function getCoordinatSTObyMapBounds(){
  var dat="filter=get_coor_sto_by_map_bounds&ne_lat="+ne_lat+"&ne_lon="+ne_lon+"&sw_lat="+sw_lat+"&sw_lon="+sw_lon;
  $.ajax({ 
      url: "../peta/get_data.php", 
      // data: dat, 
      data: dat, 
      cache: false, 
      success: function(msg){

        data = msg.split("#"); 
        for (var i =0; i<data.length;i++){
          data1=data[i].split("|");
          id_sto[i]=data1[0];
          nama=data1[1];
          lat=data1[2];
          lon=data1[3];
          nama_sto[i]=nama;
          if (nama!=""){
            latlon_sto[i]=new google.maps.LatLng(lat,lon);
            // console.log(lat+"_"+lon);
            // console.log(dat);
            nodeSTO();
          }else{

            clearMarkersSTO();
            clearResultsSTO();

          }
        }
      } 
    }); 
}
function getCoordinatFO_bySTO(sto){
  var dat="filter=get_coor_fo_by_sto&id_sto="+sto;
  $.ajax({ 
      url: "../peta/get_data.php", 
      // data: dat, 
      data: dat, 
      cache: false, 
      success: function(msg){

        data = msg.split("#"); 
        for (var i =0; i<data.length;i++){
          data1=data[i].split("|");
          nama=data1[0];
          lat=data1[1];
          lon=data1[2];
          nama_fo[i]=nama;
          if (nama!=""){
            latlon_fo[i]=new google.maps.LatLng(lat,lon);
            // console.log(lat+"_"+lon);
            // console.log(dat);
          }
        }
        nodeFO();
      } 
    }); 
}
function getCoordinatFO_byMapBounds_bySTO(sto){
  var dat="filter=get_coor_fo_by_map_bounds_by_sto&id_sto="+sto+"&ne_lat="+ne_lat+"&ne_lon="+ne_lon+"&sw_lat="+sw_lat+"&sw_lon="+sw_lon;
  $.ajax({ 
      url: "../peta/get_data.php", 
      // data: dat, 
      data: dat, 
      cache: false, 
      success: function(msg){

        data = msg.split("#"); 
        for (var i =0; i<data.length;i++){
          data1=data[i].split("|");
          nama=data1[0];
          lat=data1[1];
          lon=data1[2];
          nama_fo[i]=nama;
          if (nama!=""){
            latlon_fo[i]=new google.maps.LatLng(lat,lon);
            // console.log(lat+"_"+lon);
            // console.log(dat);
            nodeFO();
          }else{

            clearMarkersFO();
            clearResultsFO();

          }
        }
      } 
    }); 
}

function search() {    
  var search = {
    bounds: map.getBounds(),
    types: [ 'lodging' ]
  };
}

function nodeSTO() {
  clearResultsSTO();
  clearMarkersSTO();


  for (var i = 0; i < latlon_sto.length; i++) {
    var markerIcon = MARKER_DIVRE;
    markers_sto[i] = new google.maps.Marker({
      position: latlon_sto[i],
      icon: markerIcon,
      shadow: shadow
    });
    google.maps.event.addListener(markers_sto[i], 'click', click_zoom_sto(i));
    setTimeout(dropMarkerSTO(i), i * 100);
    addResultSTO(nama_sto[i], i);
  }   
}
function nodeFO() {
  clearResultsFO();
  clearMarkersFO();


  for (var i = 0; i < latlon_fo.length; i++) {
    var markerIcon = MARKER_FO;
    markers_fo[i] = new google.maps.Marker({
      position: latlon_fo[i],
      icon: markerIcon,
      shadow: shadow
    });
    google.maps.event.addListener(markers_fo[i], 'click', click_zoom_fo(i));
    setTimeout(dropMarkerFO(i), i * 100);
    addResultFO(nama_fo[i], i);
  }   
}

function clearMarkersSTO() {
  for (var i = 0; i < markers_sto.length; i++) {
    if (markers_sto[i]) {
  	markers_sto[i].setMap(null);
  	markers_sto[i] == null;
    }
  }
}
function clearMarkersFO() {
  for (var i = 0; i < markers_fo.length; i++) {
    if (markers_fo[i]) {
    markers_fo[i].setMap(null);
    markers_fo[i] == null;
    }
  }
}

function dropMarkerSTO(i) {
  return function() {
    markers_sto[i].setMap(map);
  }
}
function dropMarkerFO(i) {
  return function() {
    markers_fo[i].setMap(map);
  }
}

function addResultSTO(result, i) {
  var results = document.getElementById("results");
  var markerIcon = MARKER_DIVRE;

  var tr = document.createElement('tr');
  tr.onclick = function() {
    google.maps.event.trigger(markers_sto[i], 'click');
  };

  var iconTd = document.createElement('td');
  var nameTd = document.createElement('td');
  var icon = document.createElement('img');
  icon.src = markerIcon;
  icon.setAttribute("class", "placeIcon");
  icon.setAttribute("className", "placeIcon");
  var name = document.createTextNode(result);
  iconTd.appendChild(icon);
  nameTd.appendChild(name);
  tr.appendChild(iconTd);
  tr.appendChild(nameTd);
  results.appendChild(tr);
}
function addResultFO(result, i) {
  var results = document.getElementById("results_fo");
  var markerIcon = MARKER_FO;

  var tr = document.createElement('tr');
  tr.onclick = function() {
    google.maps.event.trigger(markers_fo[i], 'click');
  };

  var iconTd = document.createElement('td');
  var nameTd = document.createElement('td');
  var icon = document.createElement('img');
  icon.src = markerIcon;
  icon.setAttribute("class", "placeIcon");
  icon.setAttribute("className", "placeIcon");
  var name = document.createTextNode(result);
  iconTd.appendChild(icon);
  nameTd.appendChild(name);
  tr.appendChild(iconTd);
  tr.appendChild(nameTd);
  results.appendChild(tr);
}

function clearResultsSTO() {
  var results = document.getElementById("results");
  while (results.childNodes[0]) {
    results.removeChild(results.childNodes[0]);
  }
}

function clearResultsFO() {
  var results = document.getElementById("results_fo");
  while (results.childNodes[0]) {
    results.removeChild(results.childNodes[0]);
  }
}

function getDetails(result, i) {
  return function() {
    places.getDetails({
  	  reference: result.reference
    }, showInfoWindow(i));
  }
}

function showInfoWindow(i) {
  return function(place, status) {
    if (iw) {
  	iw.close();
  	iw = null;
    }
    
  	iw = new google.maps.InfoWindow({
  	  content: getIWContent(place)
  	});
  	iw.open(map, markers[i]);        
  }
}

function getIWContent(place) {
  var content = "";
  content += '<table>';
  content += '<tr class="iw_table_row">';
  content += '<td style="text-align: right"><i class="micon-home"></i></td>';
  content += '<td><b><a> Divre III - Bandung</a></b></td></tr>';
  content += '<tr class="iw_table_row"><td class="iw_attribute_name">Address:</td><td>Bandung</td></tr>';
  content += '</table>';
  return content;
}