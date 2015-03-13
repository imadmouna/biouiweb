<?php 
//include("connexion.php");
$success=0;
$code=0;
$var=rand(1,3);
$img="rand/".$var.".png";
$valide="";
$nom="";
$msg="";
$mail="";
$tel="";
$fax="";
$sujet="";


if(isset($_POST['nom']) and isset($_POST['code'])  and isset($_POST['hide']) and isset($_POST['msg']) and isset($_POST['mail']) or isset($_POST['fax']) or isset($_POST['sujet']) or isset($_POST['tel'])  ){
if( $_POST['nom']  and  $_POST['code'] and  $_POST['hide']  and  $_POST['msg']  and  $_POST['mail']  or  $_POST['fax']  or  $_POST['sujet']  or  $_POST['tel']  ){

$v=$_POST['hide'];
$cde=strtoupper($_POST['code']);

$nom=$_POST['nom'];
$msg=$_POST['msg'];
$mail=$_POST['mail'];
$tel=$_POST['tel'];
$fax=$_POST['fax'];
$sujet=$_POST['sujet'];

if($v==1){
$cd="B15DF";
}
if($v==2){
$cd="OP8MR";
}
if($v==3){
$cd="3FEA9";
}
if($cde==$cd){
	$headers ='From: "'.$nom.'"<'.$mail.'>'."\n"; 
    $headers .='Content-Type: text/html; charset="iso-8859-1"'."\n";
    $headers .='Content-Transfer-Encoding: 8bit'; 
	$txt="<br /><b>Name: </b>".$nom;
	$txt.="<br /><b>Phone Number: </b>".$tel;
	$txt.="<br /><b>Fax: </b>".$fax;
	$txt.="<br /><b>Subject: </b>".$sujet;
	$txt.="<br /><br /><b>Message: </b><br /><br />".$msg;
mail("contact@biouitravaux.ma","contact .. ".$sujet,$txt,$headers);
echo "<script language='javascript'>alert('Your email has just been sent !');</script>";


$success=1;
}else{
$valide="non";
}

}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Contact - BIOUITRAVAUX</title>
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

<body style="margin:0px;background-repeat:repeat-x;background:url(img/background.jpg) fixed">
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
	<br /></td>
  </tr>
  <tr>
    <td><table width="1000" border="0" cellpadding="0" cellspacing="0" style="border-left:0px solid #77AD1B;border-right:0px solid #77AD1B;font-family:TitilliumMaps26L500wt;font-size:14px;font-stretch:extra-condensed">
      <tr>
        <td bgcolor="#FFFFFF">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="60" align="left" valign="middle" background="img/bg_t.jpg" style="padding-left:10px;padding-top:0px;font-size:26px;color:#77AD1B;">Contact us, </td>
  </tr>
  <tr>
    <td align="center" valign="top" style="padding-left:40px;color:#666666"><br />
	<div align="left">We are always listening to you, contact us:</div>
	<br /><br />
	<form action="contact.php" method="post" style="">
          <br /><table width="100%" height="400" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td align="left" valign="top" style="font-family:TitilliumMaps26L500wt;font-size:14px; color:#666666; text-align:left">First name  / Name * </td>

              <td align="left" valign="top"><input name="nom" type="text" id="nom"  value="" style=";border:1px solid #339900;padding:2px;width:200px"/></td>
              <td rowspan="12" align="left" valign="top" style="padding-left:40px"><img src="img/sha.png" width="9" height="273" /></td>
              <td rowspan="12" align="left" valign="top" style="padding-left:10px"><table style="font-family:TitilliumMaps26L500wt;font-size:14px; color:#666666; text-align:left" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="left" valign="top" style="font-family:TitilliumMaps26L500wt;font-size:14px; color:#666666; text-align:left;letter-spacing:1px"><p>BIOUI TRAVAUX <br />
                          <br />
                          37 ANGLE RUE DE BERKANE ET RUE AMMAR IBN YASSIR<br />
60000 OUJDA<br />
Kingdom of Morocco </p>
                      <p>Telephone.: +212 (0) 536 680 509 / +212 (0) 536 690 116<br />
                        Fax: +212 (0) 536688747 / +212 (0) 536706708</p>
                      <p><a href="mailto:contact@biouitravaux.ma">contact@biouitravaux.ma</a><br />
                    </p>
                      </td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="left" valign="top" style="font-family:TitilliumMaps26L500wt;font-size:14px; color:#666666; text-align:left">Email * </td>
              <td align="left" valign="top"><input name="mail" type="text" id="mail" value="" style=";border:1px solid #339900;padding:2px;width:200px" /></td>
            </tr>
            <tr>
              <td align="left" valign="top" style="font-family:TitilliumMaps26L500wt;font-size:14px; color:#666666; text-align:left">Tel</td>

              <td align="left" valign="top"><input name="tel" type="text" id="tel" value="" style=";border:1px solid #339900;padding:2px;width:200px"></td>
            </tr>
            <tr>
              <td align="left" valign="top" style="font-family:TitilliumMaps26L500wt;font-size:14px; color:#666666; text-align:left">Fax</td>
              <td align="left" valign="top"><input name="fax" type="text" id="fax" value="" style=";border:1px solid #339900;padding:2px;width:200px"></td>
            </tr>
            <tr>
              <td align="left" valign="top" style="font-family:TitilliumMaps26L500wt;font-size:14px; color:#666666; text-align:left">Subjet</td>

              <td align="left" valign="top"><input name="sujet" type="text" id="sujet"  value="" style=";border:1px solid #339900;padding:2px;width:200px" /></td>
            </tr>
            <tr>
              <td align="left" valign="top" style="font-family:TitilliumMaps26L500wt;font-size:14px; color:#666666; text-align:left">Your message * </td>
              <td align="left" valign="top">
			  <textarea name="msg" id="msg" style="width:200px; height:100px;border:1px solid #339900;padding:2px"></textarea>
			  </td>
            </tr>
            <tr>
              <td width="300" align="left" valign="top" style="font-family:TitilliumMaps26L500wt;font-size:14px; color:#666666; text-align:left"><span id="result_box"><span title="Recopiez le code de">Enter the <span id="result_box"><span title="s&eacute;curit&eacute;">Security</span></span> code
              </span></span> * </td>

              <td align="left" valign="top"><input name="code" type="text" id="code" style=";border:1px solid #339900;padding:2px;width:200px" /></td>
            </tr>
            <tr>
              <td align="left" valign="top" style="font-family:TitilliumMaps26L500wt;font-size:14px; color:#666666; text-align:left">&nbsp;</td>
              <td align="left" valign="top"><img src="<?php echo $img;?>" />
                <input type="hidden" name="hide" value="<?php echo $var;?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>

              <td align="left" valign="top" style="font-family:TitilliumMaps26L500wt;font-size:14px; color:#FF0000; text-align:left; text-decoration:blink; display:
					none					">Incorrect Code</td>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top"  style="font-family:TitilliumMaps26L500wt;font-size:14px; color:#666666; text-align:left">*Empty Fields</td>

              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><label>
                      <input type="reset" name="Submit" value="back" style="background-color:#E4E4E4; font-size:12px; border:1px #339900 solid;width:100px;" />
                    </label></td>

                    <td align="center"><input type="submit" name="Submit2" value="send" style="background-color:#E4E4E4; font-size:12px; border:1px #339900 solid;width:100px" /></td>
                  </tr>
              </table></td>
            </tr>
          </table>
          <br />
        </form>

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
