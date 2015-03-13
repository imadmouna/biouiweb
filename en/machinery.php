<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Machinery - BIOUITRAVAUX</title>


	<link rel="stylesheet" href="../themes/base/jquery.ui.all.css">
	<script src="../jquery-1.4.4.js"></script>
	<script src="../ui/jquery.ui.core.js"></script>
	<script src="../ui/jquery.ui.widget.js"></script>
	<script src="../ui/jquery.ui.accordion.js"></script>
	<link rel="stylesheet" href="../demos/demos.css">
	<script>
	var j = jQuery.noConflict();
	j(function() {
		j( "#accordion" ).accordion({
			autoHeight: false,
			collapsible: true
		});

	});
	</script>
	
	<link rel="stylesheet" href="../css/lightbox.css" type="text/css" media="screen" />
	<script src="../js/prototype.js" type="text/javascript"></script>
	<script src="../js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
	<script src="../js/lightbox.js" type="text/javascript"></script>
	
	
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

<body style="margin:0px;background-repeat:repeat-x;background:url(img/background.jpg) fixed" onload="submenu('societe');">
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
    <td>
	<table width="1000" border="0" cellpadding="0" cellspacing="0" style="border-left:0px solid #77AD1B;border-right:0px solid #77AD1B;font-family:TitilliumMaps26L500wt;font-size:14px;">
      <tr>
        <td bgcolor="#FFFFFF">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="60" align="left" valign="middle" background="img/bg_t.jpg" style="padding-left:10px;padding-top:0px;font-size:26px;color:#77AD1B">Machinery park &amp; Equipment </td>
  </tr>
  <tr>
    <td align="left" valign="top" style="padding-left:0px;color:#666666"><br />
	<div style="padding-right:20px;padding-left:40px">
	BIOUI Travaux make a big investment in machinery and equipment park to feel ready for any type of projects in all segments where it acts.<br />
Some machinery and equipment of BIOUI Travaux:<br />
<br />
	</div>
	<div style="padding-right:20px;padding-left:50px"><?php
	for($i=1;$i<=16;$i++){
?>
<a href="../parc/<?php echo $i; ?>.JPG" rel="lightbox[roadtrip]" style="text-decoration:none">
	<span><img style="padding:2px;border:1px solid #00CC00;width:100px;height:75px" src="../parc/min/<?php echo $i; ?>.JPG" border="0" />	</span></a>
<?php 
	}
?>	
</div><br />
<br />

<div style="padding-left:10px">
  <div id="accordion" style="font-family:TitilliumMaps26L500wt;width:980px;font-size:14px">
  
   
      
  <?php 
  include("../connect.php");
  $req=mysql_query("select distinct(designation) from mat");
  while($t=mysql_fetch_array($req)){
  
  	$designation="";
  	if($t[0]=='earth')$designation="Earthwork & Road Construction Machinery";
	if($t[0]=='sanitary')$designation="Sanitary works and Pipeline Construction Machinery";
	if($t[0]=='quarry')$designation="Quarry hardware and Drilling Machinery";
	if($t[0]=='asphalt')$designation="Asphalt and Bitume Equipments";
	if($t[0]=='trans')$designation="Carrying and Transportation Equipments";
	if($t[0]=='build')$designation="Elevators and Building Equipments";
	
	
	
  	$r=mysql_query("select * from mat where designation='".$t[0]."' group by typem,marque,type");echo '<h3 style="background-image:url(img/imgi.jpg); background-repeat:repeat-y;background-position:left"><a href="#" style="color:#666666">'.$designation.'</a></h3><div  style="font-family:TitilliumMaps26L500wt;font-size:14px;color:#666666"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:TitilliumMaps26L500wt;font-size:14px;color:#666666">';
	echo '<tr><td style="color:#00cc00">Designation</td><td style="color:#00cc00">Specifications(Horsepower, capacity, ...)</td><td style="color:#00cc00">Number</td></tr><tr><td>&nbsp;</td></tr>';
	while($t=mysql_fetch_array($r)){
		$s="select typem,marque,type,count(*) from mat where typem='".$t[1]."' and marque='".$t[2]."' and type='".$t[3]."' group by marque;";
		$tab=mysql_fetch_array(mysql_query($s));
		
		echo ' <tr height="22"><td height="22" width="294">'.$tab[0].'</td><td width="294">'.$tab[1].'&nbsp;'.$tab[2].'</td><td width="294">'.$tab[3].'</td></tr>';
	
	}	
	echo '</table></div>';
	}
	?>
	
	
	
    </div>
</div>
<br />
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
    <td align="center" valign="top" style="color:#5B6D61;font-family:tahoma;font-size:10px;"><p>37 ANGLE RUE DE BERKANE ET RUE AMMAR IBN YASSIR<br />
      60000 OUJDA<br />
      Kingdom of Morocco </p>
      <p>Telephone.: +212 (0) 536 680 509 / +212 (0) 536 690 116<br />
        Fax: +212 (0) 536688747 / +212 (0) 536706708<br />
        2011, BIOUITRAVAUX <br />
        All rights reserved.<br />
      </p></td>
  </tr>
</table>

</div>
</body>
</html>
