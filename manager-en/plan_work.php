<?php
session_start();
if(!isset($_SESSION["admin"])){
  echo "<script language='javascript'>document.location.href='index.php';</script>";
}

if(isset($_REQUEST["dec"]) and $_REQUEST["dec"]=="1"){
  session_destroy();
  echo "<script language='javascript'>document.location.href='index.php';</script>";
}
  include("connect.php");



  if(isset($_GET['spr'])){
    if(($_GET['spr'])){
      mysql_query("delete from projets where id=".$_GET["spr"]);
      echo "<script>alert('Suppression valide !');</script>";
      echo "<script>document.location.href='plan_work.php';</script>";
    }
  }


  if(isset($_GET['texte']) and $_GET['texte']){
      mysql_query("update plan_work set texte='".addslashes(utf8_encode($_GET['texte']))."'");
      echo "<script>document.location.href='plan_work.php';</script>";
  }

  if(isset($_POST['type']) and isset($_POST['titre']) and isset($_POST['desc']) and isset($_FILES['logo']['tmp_name'])){
    if(($_POST['type']) and ($_POST['titre']) and ($_POST['desc']) and ($_FILES['logo']['tmp_name'])){


      $ds          = DIRECTORY_SEPARATOR; 
      $storeFolder = '../images/uploads/';

      $tempFile = $_FILES['logo']['tmp_name'];
      $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
     

      $path = $_FILES['logo']['name'];
      $ext = pathinfo($path, PATHINFO_EXTENSION);

      $fichier = sha1(uniqid(mt_rand(), true)).".".$ext;
      $targetFile =  $targetPath.$fichier;
   
      copy($tempFile,$targetFile);


      mysql_query("insert into projets values(null, '".
        addslashes(utf8_encode($_POST['type']))."', '".
        addslashes(utf8_encode($_POST['titre']))."', '".
        addslashes(utf8_encode($_POST['desc']))."', '".
        $fichier."','plan_work')");
      echo "<script>document.location.href='plan_work.php';</script>";
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>BIOUITRAVAUX | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="lte/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <link href="lte/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="lte/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="lte/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <link href="lte/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="lte/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="lte/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        
        <a href="#" class="logo"><b>Admin</b>LTE</a>

        <?php include("nav.php");?>
      </header>

      <?php include("menu.php");?>

      <div class="content-wrapper">

        <section class="content-header">
          <h1>
            <small>Am&eacute;nagement & Autres travaux</small>
          </h1>
          
        </section>


        <section class="content">
            <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Texte de pr&eacute;sentation<small></small></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>

                <div class='box-body pad'>
                  <form method="get">
                    <textarea name="texte" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                      <?php
                        $query = mysql_query("select texte from plan_work");
                        $t = mysql_fetch_array($query);
                        echo stripslashes(utf8_decode($t[0]));
                      ?>
                    </textarea>
                    
                    <div class="box-footer">
                    <input type="submit" class="btn btn-default" value="Valider">
                  </div>
                  </form>
                </div>
              </div>





              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Projets<small></small></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>

                <div class='box-body pad'>
                  <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Type de projet:</label>
                        <select class="form-control" name="type">
                            <option value="1">En cours</option>
                            <option value="2">Achev&eacute;</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Titre:</label>
                        <input type="text" class="form-control" name="titre" />
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        
                        <textarea name="desc" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        </textarea>
                        
                    </div>
                    <div class="form-group">
                        <label>Logo:</label>
                        <input type="file" class="form-control" name="logo" />
                    </div>
                    
                    <div class="box-footer">
                    <input type="submit" class="btn btn-default" value="Valider">
                  </div>
                  </form>
                </div>
              </div>





              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Liste des projets<small></small></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>

                <div class='box-body pad'>
                  
                  <table class="table table-striped">
                    <tr>
                        <td width="100">Logo</td>
                        <td>Titre</td>
                        <td>Descriptif</td>
                        <td>Type de projet</td>
                        <td></td>
                    </tr>
                    <?php
                      $qq = mysql_query("select * from projets where cat='plan_work'");
                      while( $tqq = mysql_fetch_array($qq) ){

                    ?>
                      <tr>
                          <td><img src="../images/uploads/<?php echo stripslashes(utf8_decode($tqq[4]));?>" class="img-thumbnail" width="100" /></td>
                          <td><?php echo substr(stripslashes(utf8_decode($tqq[2])),0,20)."..."; ?></td>
                          <td><?php echo substr(stripslashes(utf8_decode($tqq[3])),0,20)."...";?></td>
                          <td><?php if($tqq[1]==1)echo "En cours"; else echo "Achev&eacute;"?></td>
                          <td>
                              <div class="col-md-6 pull-right">
                                  <div class="col-md-6">
                                      <a href="editProjet.php?id=<?php echo $tqq[0];?>&cat=plan_work" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Modifier<a/>
                                  </div>
                                  <div class="col-md-6">
                                      <a data-nom="<?php echo substr(stripslashes(utf8_decode($tqq[2])),0,20)."..."; ?>" data-id="<?php echo $tqq[0];?>" class="btn btn-danger btn-spr btn-xs"><i class="fa fa-times"></i> Supprimer<a/>
                                  </div>
                              </div>
                          </td>
                      </tr>
                    <?php

                      }
                    ?>
                  </table>

                </div>
              </div>

        </section>



        <div class="modal fade modal-me">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span></button>
              <h4 class="modal-title"><i class="fa fa-trash-o"></i> <b>Attention !</b></h4>
            </div>
            <div class="modal-body">
              <p class="spr-msg"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
              <a href="" class="btn btn-danger btn-spr-oui"><i class="glyphicon glyphicon-trash"></i> Supprimer</a>
            </div>
          </div>
        </div>
      </div>

      </div>

      
    </div>

    <?php
      include("js.php");
    ?>

    <script type="text/javascript">

    $(".btn-spr").click(function(e){
        e.preventDefault();

        id = $(this).data("id");
        nom = $(this).data("nom");

        $(".spr-msg").html("Voulez-vous vraiment supprimer <b>' "+nom+" '</b> ?");
        $(".btn-spr-oui").attr("href", "plan_work.php?spr="+id);

        $(".modal-me").modal("show");
    });

    </script>

  </body>
</html>