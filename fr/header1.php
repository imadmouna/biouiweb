<script language="javascript">
function envoyer(){
	texte=document.getElementById('text').value;
	//alert(texte.toUpperCase());
	if(texte.toUpperCase()!='RECHERCHE'){
		document.fo.submit();
	}
}
function texte_focus(){
	if(document.getElementById('text').value.toUpperCase()=='RECHERCHE'){
		document.getElementById('text').value='';
	}
}
function texte_loose_focus(){
	if(document.getElementById('text').value.toUpperCase()==''){
		document.getElementById('text').value='Recherche';
	}
}
</script>
<style type="text/css">
#b1{cursor:pointer;}
#b2{cursor:pointer;}
#b3{cursor:pointer;}
#b4{cursor:pointer;}
#b5{cursor:pointer;}
#b6{cursor:pointer;}
#b7{cursor:pointer;}
#b8{cursor:pointer;}
<?php 
if($_SERVER['PHP_SELF']=='/tmp/index.php'){
	echo "#b1{background:url(img/buttons/accueil_h.jpg);}";
}else{
	echo "#b1{background:url(img/buttons/accueil.jpg);}";
	echo "#b1:hover{background:url(img/buttons/accueil_h.jpg);}";
}
if($_SERVER['PHP_SELF']=='/tmp/societe.php'){
	echo "#b2{background:url(img/buttons/societe_h.jpg);}";
}else{
	echo "#b2{background:url(img/buttons/societe.jpg);}";
	echo "#b2:hover{background:url(img/buttons/societe_h.jpg);}";
}
if($_SERVER['PHP_SELF']=='/tmp/valeur.php'){
	echo "#b3{background:url(img/buttons/valeur_h.jpg);}";
}else{
	echo "#b3{background:url(img/buttons/valeur.jpg);}";
	echo "#b3:hover{background:url(img/buttons/valeur_h.jpg);}";
}
if($_SERVER['PHP_SELF']=='/tmp/projet.php'){
	echo "#b4{background:url(img/buttons/projet_h.jpg);}";
}else{
	echo "#b4{background:url(img/buttons/projet.jpg);}";
	echo "#b4:hover{background:url(img/buttons/projet_h.jpg);}";
}
if($_SERVER['PHP_SELF']=='/tmp/reference.php'){
	echo "#b5{background:url(img/buttons/ref_h.jpg);}";
}else{
	echo "#b5{background:url(img/buttons/ref.jpg);}";
	echo "#b5:hover{background:url(img/buttons/ref_h.jpg);}";
}
if($_SERVER['PHP_SELF']=='/tmp/rh.php'){
	echo "#b6{background:url(img/buttons/rh_h.jpg);}";
}else{
	echo "#b6{background:url(img/buttons/rh.jpg);}";
	echo "#b6:hover{background:url(img/buttons/rh_h.jpg);}";
}
if($_SERVER['PHP_SELF']=='/tmp/contact.php'){
	echo "#b7{background:url(img/buttons/ctt_h.jpg);}";
}else{
	echo "#b7{background:url(img/buttons/ctt.jpg);}";
	echo "#b7:hover{background:url(img/buttons/ctt_h.jpg);}";
}
if($_SERVER['PHP_SELF']=='/tmp/legale.php'){
	echo "#b8{background:url(img/buttons/ml_h.jpg);}";
}else{
	echo "#b8{background:url(img/buttons/ml.jpg);}";
	echo "#b8:hover{background:url(img/buttons/ml_h.jpg);}";
}
?>

</style>
<form action="recherche.php" method="post" name="fo">
  <table width="1000" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><table width="1000" height="115" border="0" cellpadding="0" cellspacing="0" background="img/millieu.png" style="background-repeat:repeat-x;border-bottom:1px solid #F7CC93">
        <tr>
          <td width="12">&nbsp;</td>
          <td height="113" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td valign="middle"><table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="211"><img src="img/logo.png" width="211" height="80" /></td>
                      <td width="211"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="300" height="50">
                          <param name="movie" value="flash/ban2.swf" />
                          <param name="quality" value="high" />
                          <param name="wmode" value="transparent" />
                          <embed src="flash/ban2.swf" width="300" height="50" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent"></embed>
                      </object></td>
                    </tr>
                </table></td>
                <td align="right" valign="top"><table width="220" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="35">&nbsp;</td>
                    </tr>
                    <tr>
                      <td><table width="215" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="right"><input name="text" id="text" type="text" style="border:1px solid #CCCCCC;width:190px;height:16px;font-family:tahoma;font-size:11px;color:#666666;padding-left:5px" value="Recherche" onclick="texte_focus();" onblur="texte_loose_focus();"/></td>
                            <td align="left"><input name="button" type="button" style="background-image:url('img/search.png');border:0px;width:20px;height:20px" onclick="envoyer();" value=" "/></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="20" align="right" valign="middle">&nbsp;</td>
                            <td width="80" align="center" valign="middle"><a href="newsletters.php"><img src="img/news.png" width="62" height="10" border="0" /></a></td>
                            <td width="2" align="right" valign="middle"><img src="img/dots.png" width="2" height="12" /></td>
                            <td width="70" align="right" valign="middle"><a href="plan.php"><img src="img/plan.png" width="62" height="10" border="0" /></a></td>
                            <td width="10" align="right" valign="bottom">&nbsp;</td>
                          </tr>
                      </table></td>
                    </tr>
                </table></td>
              </tr>
          </table></td>
          <td width="12">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0" background="img/milieu1.jpg" style="background-repeat:repeat-x">
        <tr>
          <td align="center" valign="middle">&nbsp;</td>
          <td align="center" valign="middle"><a href="index.php">
            <div id="b1" style="width:93px;height:40px"></div></a></td>
          <td align="center" valign="middle"><a href="societe.php">
            <div id="b2" style="width:93px;height:40px"></div></a></td>
          <td align="center" valign="middle"><a href="valeur.php">
            <div id="b3" style="width:93px;height:40px"></div></a></td>
          <td align="center" valign="middle"><a href="projet.php">
            <div id="b4" style="width:93px;height:40px"></div></a></td>
          <td align="center" valign="middle"><a href="references.php">
            <div id="b5" style="width:93px;height:40px"></div></a></td>
          <td align="center" valign="middle"><a href="rh.php">
            <div id="b6" style="width:160px;height:40px"></div></a></td>
          <td align="center" valign="middle"><a href="contact.php">
            <div id="b7" style="width:83px;height:40px"></div></a></td>
          <td align="center" valign="middle"><a href="legale.php">
            <div id="b8" style="width:130px;height:40px"></div></a></td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>