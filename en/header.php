<script language="javascript">
function submenu(menu){
	if(menu=='societe'){
		document.getElementById("submenu").innerHTML="<table width=\"700\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td align='center' valign='top' width=\"200\"><a href=\"ceo.php\"><div style=\"cursor:pointer;background-image:url(img/buttons/sub/ceo.png);width:140px;height:12px\"></div></a></td><td align='center' valign='top' width='120'><a href=\"services.php\"><div style=\"cursor:pointer;background-image:url(img/buttons/sub/services.png);width:67px;height:9px\"></div></a></td><td align='center' width='140'><a href=\"organization.php\"><div style=\"cursor:pointer;background-image:url(img/buttons/sub/orga.png);width:70px;height:12px\"></div></a></td><td align='center'><a href=\"machinery.php\"><div style=\"cursor:pointer;background-image:url(img/buttons/sub/machinery.png);width:171px;height:12px\"></div></a></td></tr></table>";
	}
	if(menu=='nosval'){
		document.getElementById("submenu").innerHTML="<table width=\"500\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td align='center' valign='top' width='180'><a href=\"missionvision.php\"><div style=\"cursor:pointer;background-image:url(img/buttons/sub/missionvision.png);width:89px;height:9px;\"></div></a></td><td valign='top' align='center'><a href=\"environment.php\"><div style=\"cursor:pointer;background-image:url(img/buttons/sub/enviro.png);width:70px;height:10px\"></div></a></td><td valign='top' align='center'><a href=\"security.php\"><div style=\"cursor:pointer;background-image:url(img/buttons/sub/secur.png);width:45px;height:12px\"></div></a></td></tr></table>";
	}
	if(menu=='projet'){
		document.getElementById("submenu").innerHTML="<table width=\"950\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td align='center' valign='top' width='300'><a href=\"projecttri.php\"><div style=\"cursor:pointer;background-image:url(img/buttons/sub/tri.png);width:187px;height:12px;\"></div></a></td><td valign='top' align='center' width='300'><a href=\"civil.php\"><div style=\"cursor:pointer;background-image:url(img/buttons/sub/building.png);width:192px;height:12px\"></div></a></td><td valign='top' align='center' width='300'><a href=\"plan_work.php\"><div style=\"cursor:pointer;background-image:url(img/buttons/sub/plan.png);width:183px;height:12px\"></div></a></td><td valign='top' align='center' width='320'><a href=\"projectsp.php\"><div style=\"cursor:pointer;background-image:url(img/buttons/sub/pp.png);width:106px;height:12px\"></div></a></td></tr></table>";
	}
	if(menu=='ref'){
		document.getElementById("submenu").innerHTML="<table width=\"500\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td align='center' valign='top' width='80'><a href=\"classifications.php\"><div style=\"cursor:pointer;background-image:url(img/buttons/sub/class.png);width:79px;height:9px;\"></div></a></td><td valign='top' align='center'><a href=\"awards.php\"><div style=\"cursor:pointer;background-image:url(img/buttons/sub/awards.png);width:41px;height:9px\"></div></a></td><td valign='top' align='center' width='200'><a href=\"wcc.php\"><div style=\"cursor:pointer;background-image:url(img/buttons/sub/wcc.png);width:175px;height:12px;background-repeat:no-repeat\"></div></a></td></tr></table>";
	}
	if(menu=='rh'){
		document.getElementById("submenu").innerHTML="<table width=\"500\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td align='center' valign='top' width='85'><a href=\"specialities.php\"><div style=\"cursor:pointer;background-image:url(img/buttons/sub/spec.png);width:85px;height:12px;\"></div></a></td><td valign='top' align='center'><a href=\"jobs.php\"><div style=\"cursor:pointer;background-image:url(img/buttons/sub/job.png);width:40px;height:11px\"></div></a></td><td valign='top' align='center' width='150'><a href=\"sc.php\"><div style=\"cursor:pointer;background-image:url(img/buttons/sub/sc.png);width:131px;height:12px;\"></div></a></td></tr></table>";
	}
	
}

function envoyer(){
	texte=document.getElementById('text').value;
	//alert(texte.toUpperCase());
	if(texte.toUpperCase()!='SEARCH'){
		document.fo.submit();
	}
}
function texte_focus(){
	if(document.getElementById('text').value.toUpperCase()=='SEARCH'){
		document.getElementById('text').value='';
	}
}
function texte_loose_focus(){
	if(document.getElementById('text').value.toUpperCase()==''){
		document.getElementById('text').value='Search';
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
if($_SERVER['PHP_SELF']=='/en/index.php'){
	echo "#b1{background:url(img/buttons/home_h.jpg);}";
}else{
	echo "#b1{background:url(img/buttons/home.jpg);}";
	echo "#b1:hover{background:url(img/buttons/home_h.jpg);}";
}
if($_SERVER['PHP_SELF']=='/en/ceo.php' or $_SERVER['PHP_SELF']=='/en/services.php' or $_SERVER['PHP_SELF']=='/en/organization.php' or $_SERVER['PHP_SELF']=='/en/machinery.php'){
	echo "#b2{background:url(img/buttons/company_h.jpg);}";
}else{
	echo "#b2{background:url(img/buttons/company.jpg);}";
	echo "#b2:hover{background:url(img/buttons/company_h.jpg);}";
}
if($_SERVER['PHP_SELF']=='/en/missionvision.php' or $_SERVER['PHP_SELF']=='/en/environment.php' or $_SERVER['PHP_SELF']=='/en/security.php'){
	echo "#b3{background:url(img/buttons/values_h.jpg);}";
}else{
	echo "#b3{background:url(img/buttons/values.jpg);}";
	echo "#b3:hover{background:url(img/buttons/values_h.jpg);}";
}
if($_SERVER['PHP_SELF']=='/en/projecttri.php' or $_SERVER['PHP_SELF']=='/en/civil.php' or $_SERVER['PHP_SELF']=='/en/plan_work.php' or $_SERVER['PHP_SELF']=='/en/projectsp.php'){
	echo "#b4{background:url(img/buttons/projects_h.jpg);}";
}else{
	echo "#b4{background:url(img/buttons/projects.jpg);}";
	echo "#b4:hover{background:url(img/buttons/projects_h.jpg);}";
}
if($_SERVER['PHP_SELF']=='/en/references.php' or $_SERVER['PHP_SELF']=='/en/classifications.php' or $_SERVER['PHP_SELF']=='/en/awards.php' or $_SERVER['PHP_SELF']=='/en/wcc.php'){
	echo "#b5{background:url(img/buttons/ref_h.jpg);}";
}else{
	echo "#b5{background:url(img/buttons/ref.jpg);}";
	echo "#b5:hover{background:url(img/buttons/ref_h.jpg);}";
}
if($_SERVER['PHP_SELF']=='/en/specialities.php' or $_SERVER['PHP_SELF']=='/en/jobs.php' or $_SERVER['PHP_SELF']=='/en/sc.php'){
	echo "#b6{background:url(img/buttons/rh_h.jpg);}";
}else{
	echo "#b6{background:url(img/buttons/rh.jpg);}";
	echo "#b6:hover{background:url(img/buttons/rh_h.jpg);}";
}
if($_SERVER['PHP_SELF']=='/en/contact.php'){
	echo "#b7{background:url(img/buttons/ctt_h.jpg);}";
}else{
	echo "#b7{background:url(img/buttons/ctt.jpg);}";
	echo "#b7:hover{background:url(img/buttons/ctt_h.jpg);}";
}
if($_SERVER['PHP_SELF']=='/en/legal.php'){
	echo "#b8{background:url(img/buttons/ln_h.jpg);}";
}else{
	echo "#b8{background:url(img/buttons/ln.jpg);}";
	echo "#b8:hover{background:url(img/buttons/ln_h.jpg);}";
}
?>

</style>
<form action="search.php" method="get" name="fo">
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
                            <td align="right"><input name="recherche" id="text" type="text" style="border:1px solid #CCCCCC;width:190px;height:16px;font-family:tahoma;font-size:11px;color:#666666;padding-left:5px" value="Search" onclick="texte_focus();" onblur="texte_loose_focus();"/></td>
                            <td align="left"><input name="button" type="button" style="background-image:url('img/search.png');border:0px;width:20px;height:20px" onclick="envoyer();" value=" "/></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td align="center" valign="bottom" style="padding-top:5px"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="120" height="20" align="right" valign="middle">&nbsp;</td>
                            <td width="80" align="center" valign="middle"><a href="newsletters.php"><img src="img/news.png" width="62" height="10" border="0" /></a></td>
                            <td width="2" align="right" valign="middle"><img src="img/dots.png" width="2" height="12" /></td>
                            <td width="70" align="center" valign="middle" style="padding-top:4px;padding-left:5px"><a href="plan.php"><img src="img/plan.png" width="43" height="12" border="0" /></a></td>
                            <td width="10" align="right" valign="bottom">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="20" align="right" valign="middle">&nbsp;</td>
                            <td align="center" valign="top" style="padding-top:4px;padding-left:5px"><a href="../fr/index.php" ><img src="../fr.png" width="51" height="12" border="0" /></a></td>
                          <td align="right" valign="top">&nbsp;</td>
                          <td align="center" valign="top" style="padding-top:4px;padding-left:5px"><a href="../en/index.php" ><img src="../en.png" width="47" height="12" border="0" /></a></td>
                            <td align="right" valign="bottom">&nbsp;</td>
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
          <td align="center" valign="middle"><a href="index.php"><div id="b1" style="width:93px;height:40px"></div></a></td>
          <td align="center" valign="middle"><div onclick="javascript:submenu('societe');" id="b2" style="width:93px;height:40px;cursor:pointer"></div></td>
          <td align="center" valign="middle"><div onclick="javascript:submenu('nosval');" id="b3" style="width:93px;height:40px;cursor:pointer"></div></td>
          <td align="center" valign="middle"><div onclick="javascript:submenu('projet');" id="b4" style="width:93px;height:40px"></div></td>
          <td align="center" valign="middle"><a href="references.php"><div id="b5" style="width:93px;height:40px"></div></a></td>
          <td align="center" valign="middle"><div onclick="javascript:submenu('rh');" id="b6" style="width:135px;height:40px"></div></td>
          <td align="center" valign="middle"><a href="contact.php"><div id="b7" style="width:81px;height:40px"></div></a></td>
          <td align="center" valign="middle"><a href="legal.php"><div id="b8" style="width:102px;height:40px"></div></a></td>
        </tr>
        <tr>
          <td colspan="9" align="center" valign="middle">&nbsp;</td>
          </tr>
        <tr>
          <td height="32" colspan="9" align="center" valign="middle" bgcolor="#C0D897">
		  <div id="submenu" align="center">		  </div>
		  </td>
        </tr>
        <tr>
          <td colspan="9" align="center" valign="middle">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>