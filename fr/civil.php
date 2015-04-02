<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travaux Hydrauliques &amp; G&eacute;nie Civil - BIOUITRAVAUX</title>
	

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

<body style="margin:0px;background-repeat:repeat-x;background:url(img/background.jpg) fixed" onload="submenu('projet');">
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
    <td align="left" valign="middle" height="60" style="padding-left:10px;padding-top:10px;font-size:26px;color:#77AD1B;">Travaux Hydrauliques &amp; G&eacute;nie Civil<br />
      <br /></td>
  </tr>
  <tr>
    <td align="left" valign="top" style="padding-left:10px;padding-right:20px;color:#666666"><br />
			<div style="padding-left:20px">

                    <?php
                      include("connect.php");
                      $query = mysql_query("select texte from civil");
                      $t = mysql_fetch_array($query);
                      echo utf8_decode($t[0]);                        
                    ?>

      </div>
			<br /><br />
	
	   <div style="padding-left:10px">
                  <div id="accordion" style="font-family:TitilliumMaps26L500wt;width:960px;font-size:14px">
                    <h3 style="background-image:url(img/imgh.jpg); background-repeat:repeat-y;background-position:left"><a href="#" style="color:#666666">Projets en cours </a></h3>
                    <div style="font-family:TitilliumMaps26L500wt;font-size:14px;color:#666666">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="left" valign="top"></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" style="padding-left:0px"><br />
                              <br />

                              <?php
                                $queryq = mysql_query("select * from projets where cat = 'civil' and type=1 order by titre");
                                while($tqq = mysql_fetch_array($queryq)){
                              ?>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="100" height="100" align="center" valign="middle">
                                      <img src="../images/uploads/<?php echo $tqq[4]; ?>" width="80" height="63" />
                                  </td>
                                  <td align="left" valign="middle" style="padding-bottom:0px;font-size:20px;color:#006600;font-weight:bold">
                                    <?php echo stripslashes(utf8_decode($tqq[2])); ?> 
                                  </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td> 

                                    <?php echo stripslashes(utf8_decode($tqq[3])); ?> 

                                  </td>
                                </tr>
                              </table>


                              <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody><tr>
                                  <td valign="top" width="40"><div style="border-bottom:5px #00cc00 solid">&nbsp;</div></td>
                                  <td valign="top"><div style="border-bottom:1px #00cc00 solid">&nbsp;</div></td>
                                </tr>
                              </tbody></table>

                              <br />
                              <?php
                                }
                              ?>


                                                     
                          </td>
                        </tr>
                      </table>
                    </div>
                    <h3 style="background-image:url(img/imgh.jpg); background-repeat:repeat-y;background-position:left"><a href="#" style="color:#666666">Projets achev&eacute;s </a></h3>
                    <div style="font-family:TitilliumMaps26L500wt;color:#666666">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="left" valign="top"></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" style="padding-left:20px"><br />
                            
                            <br />

                              <?php
                                $queryq = mysql_query("select * from projets where cat = 'civil' and type=2 order by titre");
                                while($tqq = mysql_fetch_array($queryq)){
                              ?>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="100" height="100" align="center" valign="middle">
                                      <img src="../images/uploads/<?php echo $tqq[4]; ?>" width="80" height="63" />
                                  </td>
                                  <td align="left" valign="middle" style="padding-bottom:0px;font-size:20px;color:#006600;font-weight:bold">
                                    <?php echo stripslashes(utf8_decode($tqq[2])); ?> 
                                  </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td> 

                                    <?php echo stripslashes(utf8_decode($tqq[3])); ?> 

                                  </td>
                                </tr>
                              </table>


                              <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody><tr>
                                  <td valign="top" width="40"><div style="border-bottom:5px #00cc00 solid">&nbsp;</div></td>
                                  <td valign="top"><div style="border-bottom:1px #00cc00 solid">&nbsp;</div></td>
                                </tr>
                              </tbody></table>

                              <br />
                              <?php
                                }
                              ?>


                                         

                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
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
