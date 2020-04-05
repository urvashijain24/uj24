<?php 
error_reporting(0);
  $conn=mysqli_connect('localhost','root','','urvashi') or  die('db2_server_info:connection_aborted');
  // mysql_select_db('urvashi') or die('Database Selection Error');
  $sel = "select * from shop_details";
  $exe = mysqli_query($conn,$sel);
  $row = mysqli_fetch_array($sel,$exe);
  // echo "<pre>";
  // print_r($row);
  
    $a= array();
    $i=0;
    while( $row = mysqli_fetch_array($sel,$exe)){
      $b=array();

      $b[]=$row["shop_lat"];
      $b[]=$row["shop_long"]; 
      $b[]=$row["shop_name"]; 
      $b[]=$row["shop_time"];
      $b[]=$row["shop_phone"];
      $b[]=$row["shop_address"];       
         $a[$i]=$b;
         $i++;
     }

  ?>

 <!-- var locations = <?php echo json_encode($a);?>;   -->
<!DOCTYPE html>
<html>
	<head>
		<title>Responsive_GIS_Design(By-Urvashi,Keerti,Sangeeta&amp;Anju)</title>
		<link href="css/bootstrap.css" type="text/css" rel="stylesheet"/>
		<link href="css/bootstrap-theme.css" type="text/css" rel="stylesheet"/>
		<link href="css/responsive.css" type="text/css" rel="stylesheet"/>
		<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1">
		<!-- meta tag missing -->
        <style type="text/css">
  
  .olPopup{
    width: 230px !important;
    padding: 5px;

  }
  .main{
    /*background-color: cyan;*/
    border-radius: 15px;
    background-color: #b5d0d0 !important;
    box-shadow: inset 0px 5px 68px 12px #f1620f;
    margin: 0px 6px 0px 0px;
    padding: 9px;
    font-size: 11px;
    color: #0a0a0a;
  }
  .mapsize{
    width: 100%;
    height:580px; 
  }
  .heading{
    /*display: table;*/
    width: 100%;
    font-size: 18px;
    background-color: cyan;
    padding: 10px;
    font-weight: bolder;
    color: #00f;
    text-decoration: underline;
  }
</style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="js/jquery.min.js"></script>


 <script src="http://www.openlayers.org/api/OpenLayers.js"></script> 
 <script src="js/OpenLayers.js"></script> 

    
    <script type="text/javascript">
        var map, mappingLayer, vectorLayer, selectMarkerControl, selectedFeature;

        function onFeatureSelect(feature) {
            selectedFeature = feature;
            popup = new OpenLayers.Popup.FramedCloud("tempId", feature.geometry.getBounds().getCenterLonLat(),
                                     null,
                                     selectedFeature.attributes.salutation + " " + "" + " " + "",
                                     null, true);
            feature.popup = popup;
            map.addPopup(popup);
        }

        function onFeatureUnselect(feature) {
            map.removePopup(feature.popup);
            feature.popup.destroy();
            feature.popup = null;
        }   

        function init(){
            map = new OpenLayers.Map('map');
            mappingLayer = new OpenLayers.Layer.OSM("Simple OSM Map");

            map.addLayer(mappingLayer);
            vectorLayer = new OpenLayers.Layer.Vector("Vector Layer", {projection: "EPSG:4326"}); 
            selectMarkerControl = new OpenLayers.Control.SelectFeature(vectorLayer, {onSelect: onFeatureSelect, onUnselect: onFeatureUnselect});
            map.addControl(selectMarkerControl);

            selectMarkerControl.activate();
            map.addLayer(vectorLayer);
            map.setCenter(
                new OpenLayers.LonLat(26.2389, 73.0243).transform(
                    new OpenLayers.Projection("EPSG:4326"),

                    map.getProjectionObject())

                , 1
            );

  
var markers =  <?php echo json_encode($a);?>;

//Loop through the markers array
for (var i=0; i<markers.length; i++) {
   var lon = markers[i][0];
   var lat = markers[i][1];
   var name = markers[i][2];
   var time = markers[i][3];
   var phone = markers[i][4];
   var address = markers[i][5]; 
            var randomLat = lon;
            var randomLon =lat;
            var randomLonLat = new OpenLayers.Geometry.Point( randomLon, randomLat);
            randomLonLat.transform("EPSG:4326", map.getProjectionObject());
            var randomFeature = new OpenLayers.Feature.Vector(randomLonLat,
                                    { salutation: "<div class='main'> <b>Name: </b> &nbsp; "+name+"<br><b>Available Time: </b> &nbsp; "+time+"<br><b>Contact No.: &nbsp; </b> "+phone+" <br><b>Address: &nbsp; </b>"+address+"<br><b>Latitude: &nbsp; </b> "+lat+"<br><b>Longitude: &nbsp; </b> "+lon+"</div>"});
            vectorLayer.addFeatures(randomFeature);
            var popup = new OpenLayers.Popup.FramedCloud("tempId", new OpenLayers.LonLat( randomLon, randomLat).transform("EPSG:4326"),
                       null,
                       randomFeature.attributes.salutation, null, true);
            randomFeature.popup = popup;
            // map.addPopup(popup); 
        }


     }
     
    </script>


	</head>
	<body onload="init()">
		<!-- header started -->
	                     <center class="heading">Details of Dispensaries / Chemist's Shops' in Jodhpur</center>
	                    <div id="map" class="mapsize"></div>				
				
			
		<script src="js/jquery.min.js"></script>			
		<script src="js/bootstrap.js"></script>
	</body>
</html>