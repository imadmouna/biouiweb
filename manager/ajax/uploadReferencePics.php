<?php


function resizeImage($file_src, $file_dest, $new_width, $new_height, $proportional=true){       
        $attr=getimagesize($file_src);
        $fw=$attr[0]/$new_width;
        $fh=$attr[1]/$new_height;
        
        if($proportional)
            $f=$fw>$fh?$fw:$fh;
        else
            $f=$fw>$fh?$fh:$fw;

        $w=$attr[0]/$f;
        $h=$attr[1]/$f;
        
        $file_src_infos=pathinfo($file_src);
        
        $ext=strtolower($file_src_infos['extension']);
        if($ext=="jpg")
            $ext="jpeg";
        
        $func="imagecreatefrom".$ext;
        $src  = $func($file_src);
        
        // Création de l'image de destination. La taille de la miniature sera wxh 
        $x=0;
        $y=0;
        if($proportional)
            $dest = imagecreatetruecolor($w,$h);
        else
        {
            $dest = imagecreatetruecolor($new_width,$new_height);
            $x=($new_width-$w)/2;
            $y=($new_height-$h)/2;
        }

        // Configuration du canal alpha pour la transparence
        imagealphablending($dest,false);
        imagesavealpha($dest,true);

        // Redimensionnement de src sur dest 
        imagecopyresampled($dest,$src,$x,$y,0,0,$w,$h,$attr[0],$attr[1]);

        $func="image".$ext;
        $func($dest, $file_dest);
        imagedestroy($dest);
        
        return true;        
}


$ds          = DIRECTORY_SEPARATOR; 
$storeFolder = '../../images/uploads/references';
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
     
	//$targetFile =  $targetPath. $_FILES['file']['name'];


	$path = $_FILES['file']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);

    $fichier = sha1(uniqid(mt_rand(), true)).".".$ext;
    $targetFile =  $targetPath.$fichier;
 


    $fichier_max = $targetPath."/big/";
    $fichier_min = $targetPath."/small/";



    copy($tempFile,$fichier_max.$fichier);
    copy($tempFile,$fichier_min.$fichier);


    
        
    //REDIMENSIONNER LES FICHIERS COPIES
    resizeImage($fichier_max.$fichier,$fichier_max.$fichier, 600, 600, $proportional=true);
    resizeImage($fichier_min.$fichier,$fichier_min.$fichier, 150, 150, $proportional=true);
    



    include("../../connect.php");
    mysql_query("insert into uploadreferencepics values(null, '".$fichier."')");

    $t = mysql_fetch_array(mysql_query("select id from uploadreferencepics where chemin like '%".$fichier."%'"));

    echo json_encode(
						array(
							"validation"=>true, 
							"fichier"=>$fichier,
							"fichier_complet"=>"../images/uploads/references/small/".$fichier,
							"id"=>$t[0]
						)
					);


}
?>     
