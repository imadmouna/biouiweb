<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Parc de machines - BIOUITRAVAUX</title>


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
    <td height="60" align="left" valign="middle" background="img/bg_t.jpg" style="padding-left:10px;padding-top:0px;font-size:26px;color:#77AD1B">Parc des machines  &amp; Equipements </td>
  </tr>
  <tr>
    <td align="left" valign="top" style="padding-left:0px;color:#666666"><br />
	<div style="padding-right:20px;padding-left:40px">
	
	<?php
        include("connect.php");
        $query = mysql_query("select texte from texte_parc");
        $t = mysql_fetch_array($query);
        echo utf8_decode($t[0]);                        
    ?>

	<br />
	<br />
	</div>
	<div style="padding-right:20px;padding-left:50px">

	<?php
        $query1 = mysql_query("select * from uploadtextparc");
        while($t1 = mysql_fetch_array($query1)){ 
    ?>

		<a href="../images/uploads/parc/big/<?php echo $t1[1]; ?>" rel="lightbox[roadtrip]" style="text-decoration:none">
		<span><img style="padding:2px;border:1px solid #00CC00;width:100px;height:75px" src="../images/uploads/parc/small/<?php echo $t1[1]; ?>" border="0" />	</span></a>
	<?php 
		}
	?>
	</div>
	<br />
<br />

<div style="padding-left:10px">
  <div id="accordion" style="font-family:TitilliumMaps26L500wt;width:980px;font-size:14px">
  
   
      
  <?php 
  include("connect.php");
  $req=mysql_query("select * from cat_machine");
  while($t=mysql_fetch_array($req)){
  
	
  	$r=mysql_query("select * from machines where cat=".$t[0]);
  	echo '<h3 style="background-image:url(img/imgi.jpg); background-repeat:repeat-y;background-position:left"><a href="#" style="color:#666666">'.stripslashes(utf8_decode($t[1])).'</a></h3>
  	<div  style="font-family:TitilliumMaps26L500wt;font-size:14px;color:#666666">
  	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:TitilliumMaps26L500wt;font-size:14px;color:#666666">';
	echo '<tr><td style="color:#00cc00">D&eacute;signation</td><td style="color:#00cc00">Sp&eacute;cifications(Puissance, capacit&eacute;, ...)</td><td style="color:#00cc00">Nombre</td></tr><tr><td>&nbsp;</td></tr>';
	while($tab=mysql_fetch_array($r)){		
		
		echo ' <tr height="22"><td height="22" width="294">'.$tab[1].'</td><td width="294">'.$tab[2].'</td><td width="294">'.$tab[3].'</td></tr>';
	
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
    <td align="center" valign="top" style="color:#5B6D61;font-family:tahoma;font-size:10px;"><br />37 ANGLE RUE DE BERKANE ET RUE AMMAR IBN YASSIR<br />
60000 OUJDA<br />
Royaume du Maroc<br /><br />
      T&eacute;l.: +212 (0) 536 680 509 / +212 (0) 536 690 116<br />
        Fax: +212 (0) 536688747 / +212 (0) 536706708<br />
        <?php echo date("Y"); ?>, BIOUITRAVAUX <br />
        Tous droit reserv&eacute;s.<br /><br /></td>
  </tr>
</table>

</div>
</body>
</html>
