/*
* Copyright (c) 2013 thatgeospatialblog.wordpress.com
*
* File: map.js
* Workshop title: Base Layers
*/
 
Ext.require([
    'Ext.container.Viewport',
    'Ext.window.MessageBox',
    'GeoExt.panel.Map'
]);
 
Ext.application({
    name: 'UPCWebMap',
    launch: function(){
		
		var options = {
                projection: new OpenLayers.Projection("EPSG:900913"),
                displayProjection: new OpenLayers.Projection("EPSG:4326"),
                units: "m",
                numZoomLevels: 22,
                maxExtent: new OpenLayers.Bounds(-20037508, -20037508,
                                                 20037508, 20037508.34)
            };
			
        var map = new OpenLayers.Map("map-id",options);

        map.addControl(new OpenLayers.Control.LayerSwitcher());

		var google_terrain = new OpenLayers.Layer.Google(
            "Google Terrain",
            {sphericalMercator: true, type: google.maps.MapTypeId.TERRAIN,numZoomLevels: 20}
        );
		
        var google_hybrid = new OpenLayers.Layer.Google(
            "Google Hybrid",
            {sphericalMercator: true, type: google.maps.MapTypeId.HYBRID,numZoomLevels: 20}
        );

        var google_physical = new OpenLayers.Layer.Google(
            "Google Physical",
            {sphericalMercator: true, type: google.maps.MapTypeId.PHYSICAL,numZoomLevels: 20}
        );

        var google_satellite = new OpenLayers.Layer.Google(
            "Google Satellite",
            {sphericalMercator: true, type: google.maps.MapTypeId.SATELLITE,numZoomLevels: 20}
        );

        var google_streets = new OpenLayers.Layer.Google(
            "Google Streets",
            {sphericalMercator: true, type: google.maps.MapTypeId.STREETS,numZoomLevels: 20}
        );

        

	var apiKey = "AkDB4iff9yzZsTsOVHyEwLfApjJv_XylEK_vxwvqLApiXmpI4WMbQ9R6qkodJyZb";

        var bing_road = new OpenLayers.Layer.Bing({
            name: "Bing! Road",
            key: apiKey,
            type: "Road"
        });
        
        var bing_hybrid = new OpenLayers.Layer.Bing({
            name: "Bing! Hybrid",
            key: apiKey,
            type: "AerialWithLabels"
        });
    
        var bing_aerial = new OpenLayers.Layer.Bing({
            name: "Bing! Aerial",
            key: apiKey,
            type: "Aerial"
        });


        map.addLayers([google_terrain,google_hybrid, google_physical, google_satellite, google_streets,  bing_road, bing_hybrid, bing_aerial]);

		var point = new OpenLayers.LonLat(-3.978,119.696); 
		point.transform(new OpenLayers.Projection("EPSG:4326"), map.getProjectionObject());

        var mappanel = Ext.create('GeoExt.panel.Map', {
            title: 'UPC Renewables GIS Website | Welcome ' + document.getElementById("myName").value +' | <a href="logout.php">logout</a> |',
			center: point,
            map: map,
			layers: [ new OpenLayers.Layer.WMS("tasmania",
                    "http://geoserver-geographic.rhcloud.com/wms",
                    {
                        layers: 'tasmania', 
                        format: 'image/png', 
                        transparent: true
                    },
                    {
                        singleTile: true
                    }
                ),
                new OpenLayers.Layer.WMS("states",
                    "http://geoserver-geographic.rhcloud.com/topp/wms",
                    {
                        layers: 'states', 
                        format: 'image/png', 
                        transparent: true
                    },
                    {
                        singleTile: true
                    }
                )
				]
        });

        Ext.create('Ext.container.Viewport', {
            layout: 'fit',
            items: [mappanel]
        });

    }
});