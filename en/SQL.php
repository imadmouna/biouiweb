<?php
mysql_connect("localhost","root","");
mysql_select_db("test");
//select typem,marque,type,count(*) from mat where typem='Excavator / Crawler' and marque='Caterpillar' and type='325BLN';

$r=mysql_query("select * from mat group by typem,marque,type");echo '<table width="100%" cellpadding="0" cellspacing="0">';
	echo '<tr><td>Designation</td><td>Specifications(Horsepower, capacity, ...)</td><td>Number</td></tr>';
while($t=mysql_fetch_array($r)){
	$s="select typem,marque,type,count(*) from mat where typem='".$t[1]."' and marque='".$t[2]."' and type='".$t[3]."';";
	$tab=mysql_fetch_array(mysql_query($s));
	
	echo ' <tr height="22"><td height="22" width="294">'.$tab[0].'</td><td width="294">'.$tab[1].'&nbsp;'.$tab[2].'</td><td width="294">'.$tab[3].'</td></tr>';

}	echo '</table>';
?>