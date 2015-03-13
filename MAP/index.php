<?php
	require("GoogleMapAPI.class.php");
	//on crée notre carte
	$map = new GoogleMapAPI("map","tutoriel_map");
	$map->setAPIKey('ABQIAAAAShTzG8kE5LrshiwnXaFtxRQjmL3oEXn24_W3HvKqI5HXVN0_EBTmWUr1O33Futi9S8qTFU3JL8PkHw');
	$map->setLookupService("GOOGLE");
	$map->disableTypeControls();
	
	$map->setMapType('map'); 
	$map->disableDirections();
	
	$map->enableScaleControl();
	
    $map = new GoogleMapAPI('map');
	$map->enableZoomEncompass();
	$map->enableOverviewControl();	
	$map->setHeight("500px");
	$map->setWidth("800px");
	
    $map->addMarkerByAddress('Rue Sebou Marrakech, Maroc','Cabinet du Docteur BOUDRAR Hassan.','<b>Docteur BOUDRAR Hassan</b>');
	$a=$map->getGeocode('Rue Sebou Marrakech, Maroc');
	echo $a['lat']."<br>";
	echo $a['lon'];
	
    ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
    <head>

	<style type="text/css">
	body{font-family:tahoma;font-size:10px;}
	</style>
    <?php //$map->printHeaderJS(); ?>
    <?php $map->printMapJS(); ?>
    <!-- necessary for google maps polyline drawing in IE -->
    <style type="text/css">
      v\:* {
        behavior:url(#default#VML);
      }
    </style>
    </head>
    <body onload="onLoad()">
    <table border=0>
    <tr><td>
	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAShTzG8kE5LrshiwnXaFtxRQjmL3oEXn24_W3HvKqI5HXVN0_EBTmWUr1O33Futi9S8qTFU3JL8PkHw" type="text/javascript"></script>

    <?php $map->printMap(); ?>
    </td><td>
    <?php //$map->printSidebar(); ?>
    </td></tr>
    </table>
    </body>
    </html>

