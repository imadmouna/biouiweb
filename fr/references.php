

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
      
        <?php
          include("connect.php");
          $query = mysql_query("select texte from texte_reference");
          $t = mysql_fetch_array($query);
          echo utf8_decode($t[0]);                        
        ?>
      
      <br />
      <div style="border:1px solid #00CC00;width:905px">
        <br>

        <?php
          $qq = mysql_query("select * from uploadreferencepics order by id DESC");
          while($ttq = mysql_fetch_array($qq)){
        ?>

            <img src="../images/uploads/references/small/<?php echo $ttq[1];?>" width="100" height="100"  style="padding-left:9px;padding-top:10px;;float:left:top:0px;position:relative" />

        <?php
          }
        ?>
        <br><br>

        

    </div>
      <p>
        <br />
        <br />
        <br />
        <div style="border:5px solid #00CC00;width:900px;height:400px" id="divi">
	

        </div>
      <br />
      <br />   
      <br />   
      <br />   
      <br />  
      </td>
  </tr>
</table>
          </td>
      </tr>
      
    </table>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

<script type="text/javascript">
    var locations = [
    <?php
      $sq = mysql_query("select * from gps order by id desc");
      while ($tsq = mysql_fetch_array($sq)){
    ?>
      ['<?php echo stripslashes(utf8_decode($tsq[2]));?>', <?php echo stripslashes(utf8_decode($tsq[1]));?>],

    <?php
      }
    ?>
    ];

    var map = new google.maps.Map(document.getElementById('divi'), {
      zoom: 5,
      center: new google.maps.LatLng(31.7948264,-7.0847677),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>


	
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
        <?php echo date("Y"); ?>, BIOUITRAVAUX <br />
        Tous droit reserv&eacute;s.<br /><br /</td>
  </tr>
</table>

</div>
</body>
</html>
