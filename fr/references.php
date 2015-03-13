<?php
	require("../GoogleMapAPI.class.php");
	//on crée notre carte
	$map = new GoogleMapAPI("map","tutoriel_map");
	$map->setAPIKey('ABQIAAAAShTzG8kE5LrshiwnXaFtxRTdW4fEFQl4pmI656gM9C0lQ-YmixQ0z6yRD-KOf_M-uUfU4T1jHtWXVw');
	$map->disableTypeControls();
	
	$map->setMapType('map'); 
	$map->disableDirections();
	
	$map->enableScaleControl();
	
    $map = new GoogleMapAPI('map');
	$map->enableZoomEncompass();
	$map->enableOverviewControl();	
	$map->setHeight("500px");
	$map->setWidth("900px");
	
    $map->addMarkerByAddress('Nador, Maroc','Project in Nador.','<b>Find it</b>');
	$map->addMarkerByAddress('Chefchaouen, Maroc','Project in Chefchaouen.','<b>Find it</b>');
	$map->addMarkerByAddress('Saidia, Maroc','Project in Saidia.','<b>Find it</b>');
	$map->addMarkerByAddress('Oujda, Maroc','Project in Oujda.','<b>Find it</b>');
	$map->addMarkerByAddress('Taza, Maroc','Project in Taza.','<b>Find it</b>');
	$map->addMarkerByAddress('Jerada, Maroc','Project in Jerada.','<b>Find it</b>');
	$map->addMarkerByAddress('Alhouceima, Maroc','Project in Alhouceima.','<b>Find it</b>');
	$map->addMarkerByAddress('Tanger, Maroc','Project in Tanger.','<b>Find it</b>');
	$map->addMarkerByAddress('Tetouan, Maroc','Project in Tetouan.','<b>Find it</b>');
	$map->addMarkerByAddress('Fes, Maroc','Project in Tetouan.','<b>Find it</b>');
	$map->addMarkerByAddress('Casablanca, Maroc','Project in Tetouan.','<b>Find it</b>');
	
	//$a=$map->getGeocode('Nador, Maroc');
	//echo $a['lat']."<br>";
	//echo $a['lon'];
	
    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>References - BIOUITRAVAUX</title>
	
	<script src="../fonts/specimen_files/easytabs.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="../specimen_files/specimen_stylesheet.css" type="text/css" title="" charset="utf-8">
	<link rel="stylesheet" href="../fonts/stylesheet.css" type="text/css" title="no title" charset="utf-8" />
	
	
<script language="javascript">

	if (navigator.appName=="Microsoft Internet Explorer"){
		document.write('<link rel="stylesheet" href="extra/nav_explorer.css" type="text/css" media="screen" />');
	}else{
		document.write('<link rel="stylesheet" href="extra/nav.css" type="text/css" media="screen" />');
	}

</script>
<link rel="stylesheet" href="extra/style.css" type="text/css" media="screen" />


<script type='text/javascript' src='extra/jquery.js'></script>
<script type='text/javascript' src='extra/dropdowns.js'></script>
<?php //$map->printHeaderJS(); ?>
    <?php $map->printMapJS(); ?>
<link rel="shortcut icon" href="../logo.png" />
</head>

<body style="margin:0px;background-repeat:repeat-x;background:url(img/background.jpg) fixed" onload="submenu('ref');onLoad();">
<div align="center">
<table width="1000" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="1000" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left"><?php include("header.php");?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top">
	<table width="1000" height="280" border="0" cellpadding="0" cellspacing="0" style="border-left:0px solid #77AD1B;border-right:0px solid #77AD1B">
      <tr>
        <td align="center">
		  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="1000" height="280">
            <param name="movie" value="flash/ban.swf" />
            <param name="quality" value="high" />
            <param name="wmode" value="transparent" />
            <embed src="flash/ban.swf" width="1000" height="280" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent"></embed>
          </object>		  </td>
      </tr>
    </table>
	<br />
	</td>
  </tr>
  <tr>
    <td><table width="1000" border="0" cellpadding="0" cellspacing="0" style="border-left:0px solid #77AD1B;border-right:0px solid #77AD1B;font-family:TitilliumMaps26L500wt;font-size:14px;font-stretch:extra-condensed">
      <tr>
        <td bgcolor="#FFFFFF">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="60" align="left" valign="middle" background="img/bg_t.jpg" style="padding-left:10px;padding-top:0px;font-size:26px;color:#77AD1B;">R&eacute;f&eacute;rences</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="padding-left:40px;padding-right:40px;color:#666666"><p>
      <br />
      Plus de 200 projets et travaux ont &eacute;t&eacute; effectu&eacute;s par Biouitravaux pour des administrations &agrave; plusieurs reprises depuis 2000.<br />
<br />
<br />
Parmi les r&eacute;alisations r&eacute;centes, on peut citer les suivantes: <br />
<br />
      <div style="border:1px solid #00CC00;width:905px"><table width="900" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center"><img src="img/logo/dpe.png" width="100" height="29" /></td>
		  <td align="center"><img src="img/logo/auto.gif" width="100" height="28" /></td>
          <td><img src="img/logo/geo.jpg" width="100" height="100" /></td>
          <td><img src="img/logo/marjane.jpg" width="100" height="100" /></td>
          <td><img src="img/logo/LogoONEP.gif" width="100" height="50" /></td>
          <td><img src="img/logo/omrane.jpg" width="100" height="83" /></td>
          <td><img src="img/logo/onda.JPG" width="100" height="40" /></td>
          <td><img src="img/logo/Fadesa.jpg" width="100" height="31" /></td>
          <td><img src="img/logo/oncf.jpg" width="100" height="58" /></td>
        </tr>
      </table></div>
      <p>        <br />
        <br />
        <br />
        <div style="border:5px solid #00CC00;width:900px">
	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAShTzG8kE5LrshiwnXaFtxRTdW4fEFQl4pmI656gM9C0lQ-YmixQ0z6yRD-KOf_M-uUfU4T1jHtWXVw" type="text/javascript"></script>

	<?php $map->printMap(); ?></div>
      <br />
      <br />   
<br />   <br />   <br />  
      </td>
  </tr>
</table>
          </td>
      </tr>
      
    </table>
	
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-left:0px solid #77AD1B;border-right:0px solid #77AD1B">
      <tr>
        <td align="center" bgcolor="#FFFFFF"><?php include("pied.php"); ?></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top" style="color:#5B6D61;font-family:tahoma;font-size:10px;"><br />37 ANGLE RUE DE BERKANE ET RUE AMMAR IBN YASSIR<br />
60000 OUJDA<br />
Royaume du Maroc<br /><br />
      T&eacute;l.: +212 (0) 536 680 509 / +212 (0) 536 690 116<br />
        Fax: +212 (0) 536688747 / +212 (0) 536706708<br />
        2011, BIOUITRAVAUX <br />
        Tous droit reserv&eacute;s.<br /><br /</td>
  </tr>
</table>

</div>
</body>
</html>
