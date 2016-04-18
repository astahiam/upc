<?php 	session_start(); ?>
<!doctype html>
<html>
<head>
    <!-- Set the title for the homepage -->
    <title>UPC WEB GIS</title>
 
    <!-- Load Ext -->
	    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../ext-4.2.1.883/resources/css/ext-all.css">
    <script type="text/javascript" charset="utf-8" src="../ext-4.2.1.883/ext-debug.js"></script>
 
    <!-- Load Openlayers -->
    <script src="../OpenLayers-2.13.1/OpenLayers.js"></script>
 
    <!-- Load our modules loader.js and map.js -->
    <script type="text/javascript" src="loader.js"></script>
    <script type="text/javascript" src="map.js"></script>

    <!-- Adds Google Maps API library -->
    <script src="http://maps.google.com/maps/api/js?v=3"></script>
	<!--AIzaSyBjieRan-3b0gr_ijW7z9j674R5vsLd6Iw
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjieRan-3b0gr_ijW7z9j674R5vsLd6Iw&callback=initMap" type="text/javascript"></script>-->

    <!-- Adds Bing! Maps API library, if needed? -->
    <script src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=6.2&mkt=en-us"></script>
</head>
<body><input type="hidden" id="myName" value="<?PHP echo $_SESSION['name'];?>">
</body>
</html>
<?php
	if ($_SESSION["is_auth"] == false) {
    header("location: /index.php");
    exit;
	}
?>