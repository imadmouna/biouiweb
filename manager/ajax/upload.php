<?php
$ds          = DIRECTORY_SEPARATOR; 
$storeFolder = '../../images/uploads/';
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
     
	//$targetFile =  $targetPath. $_FILES['file']['name'];


	$path = $_FILES['file']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);

    $fichier = sha1(uniqid(mt_rand(), true)).".".$ext;
    $targetFile =  $targetPath.$fichier;
 
    copy($tempFile,$targetFile);

    include("../../connect.php");
    mysql_query("insert into upload values(null, '".$fichier."')");

    $t = mysql_fetch_array(mysql_query("select id from upload where chemin like '%".$fichier."%'"));

    echo json_encode(
						array(
							"validation"=>true, 
							"fichier"=>$fichier,
							"fichier_complet"=>"../images/uploads/".$fichier,
							"id"=>$t[0]
						)
					);


}
?>     
