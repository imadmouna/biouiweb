<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - BIOUITRAVAUX</title>
	
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

<body style="margin:0px;background-repeat:repeat-x;background:url(img/background.jpg) fixed" >
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
        <td align="center" bgcolor="">
		  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="1000" height="280">
            <param name="movie" value="flash/ban.swf" />
            <param name="quality" value="high" />
            <param name="wmode" value="transparent" />
            <embed src="flash/ban.swf" width="1000" height="280" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent"></embed>
          </object>		  </td>
      </tr>
    </table>
	<br /></td>
  </tr>
  <tr>
    <td><table width="1000" border="0" cellpadding="0" cellspacing="0" style="border-left:0px solid #77AD1B;border-right:0px solid #77AD1B;font-family:TitilliumMaps26L500wt;font-size:14px;">
      <tr>
        <td bgcolor="#FFFFFF">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="60" align="left" valign="middle" background="img/bg_t.jpg" style="padding-left:10px;font-size:30px;font-family:TitilliumMaps26L500wt;color:#77AD1B;background-color:#C0D897">HOME</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="padding-left:40px;padding-right:20px;color:#666666;"><br /><br />
      <?php
        include("connect.php");
        $query = mysql_query("select texte from accueil");
        $t = mysql_fetch_array($query);
        echo stripslashes(utf8_decode($t[0]));                        
      ?>
      <br />
      <br />
      <br />
    </td>
  </tr>
  <tr>
  <td height="60" align="left" valign="middle" background="img/bg_t.jpg" style="padding-left:10px;font-size:30px;font-family:TitilliumMaps26L500wt;color:#77AD1B;background-color:#C0D897">Our activities</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="padding-left:40px;padding-right:20px;color:#666666;"><p></p>
      

    <?php
        $query = mysql_query("select * from activites order by id asc");
        while($t1 = mysql_fetch_array($query)){
    ?>


      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top" style="padding-left:10px"><strong style="color:#77AD1B;">
            <?php echo stripslashes(utf8_decode($t1[1])); ?>
          </strong>
          <br />
          <br />
           <?php echo stripslashes(utf8_decode($t1[2])); ?>
          </td>
          <td width="400" align="right" valign="top" style="padding-left:10px;padding-right:20px">
            <img src="../<?php echo $t1[3]; ?>" width="240" height="260" style="padding:1px;border:solid 1px #CCCCCC" />
          </td>
        </tr>
        <tr>
          <td colspan="2" style="padding-left:10px"><br /></td>
        </tr>
      </table>
      <br />
      <br />


    <?php
      }
    ?>




      
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
        <?php echo date("Y");?>, BIOUITRAVAUX <br />
        All rights reserved.<br />
      </p></td>
  </tr>
</table>

</div>
</body>
</html>
