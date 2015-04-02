<?php
include("../connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Search - BIOUITRAVAUX</title>
	
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
    <td align="center" valign="top"></td>
  </tr>
  <tr>
    <td><table width="1000" border="0" cellpadding="0" cellspacing="0" style="border-left:0px solid #77AD1B;border-right:0px solid #77AD1B;font-family:TitilliumMaps26L250wt;font-size:14px;font-stretch:extra-condensed">
      <tr>
        <td bgcolor="#FFFFFF">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="60" align="left" valign="middle" background="img/bg_t.jpg" style="padding-left:10px;padding-top:0px;font-size:26px;color:#77AD1B;">Search results for &quot; <?php 
		if(isset($_REQUEST['recherche']) and $_REQUEST['recherche'])
		echo $_REQUEST['recherche'];
		?>
		&quot; </td>
  </tr>
  <tr>
    <td align="left" valign="top" style="padding-left:40px;padding-right:20px;color:#666666">
	<br />
	<br />
	<?php
		if(isset($_REQUEST['recherche']) and $_REQUEST['recherche']){
			$mc=$_REQUEST['recherche'];
			$req1=mysql_query("select * from data_link where contenu like '%$mc%'");
			$t=mysql_fetch_array($req1);
			if(empty($t))echo "No results found. Please check your request again !";
			$req=mysql_query("select * from data_link where contenu like '%$mc%'");
			while($tab=mysql_fetch_array($req)){
				$apercu=$tab[1];
				$lien=$tab[2];
				//echo "Apercu: ".strtoupper($apercu)."<br><br>";
				//echo "Mot cle: ".strtoupper($mc)."<br><br>";
				//echo "position: ".strrpos(strtoupper($apercu),strtoupper($mc));//+strlen($mc);
				
				echo ".......<b>$mc</b>".substr($apercu,strpos(strtoupper($apercu),strtoupper($mc),0)+strlen($mc),60)."...: ";
				echo "<a href='$lien'>$lien</a><br><br>";
			}
		}
		?>
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
