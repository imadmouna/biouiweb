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


  if(isset($_GET['id']) and isset($_GET['cat'])){
      if(($_GET['id']) and ($_GET['cat'])){
          $qq = mysql_query("select * from projets where id = ".$_GET['id']);
          $tt = mysql_fetch_array($qq);
      }
  }



  if(isset($_POST['type']) and isset($_POST['titre']) and isset($_POST['desc']) and isset($_POST['id']) and isset($_POST['cat'])){
    if(($_POST['type']) and ($_POST['titre']) and ($_POST['desc']) and ($_POST['id']) and ($_POST['cat'])){


      if(isset($_FILES['logo']['tmp_name']) and ($_FILES['logo']['tmp_name'])){
          $ds          = DIRECTORY_SEPARATOR; 
          $storeFolder = '../images/uploads/';

          $tempFile = $_FILES['logo']['tmp_name'];
          $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
         

          $path = $_FILES['logo']['name'];
          $ext = pathinfo($path, PATHINFO_EXTENSION);

          $fichier = sha1(uniqid(mt_rand(), true)).".".$ext;
          $targetFile =  $targetPath.$fichier;
       
          copy($tempFile,$targetFile);


          mysql_query("update projets set type = '".
            addslashes(utf8_encode($_POST['type']))."', titre = '".
            addslashes(utf8_encode($_POST['titre']))."', descr = '".
            addslashes(utf8_encode($_POST['desc']))."', logo = '".
            $fichier."' where id= ".$_POST['id']);
      }else{

        mysql_query("update projets set type = '".
            addslashes(utf8_encode($_POST['type']))."', titre = '".
            addslashes(utf8_encode($_POST['titre']))."', descr = '".
            addslashes(utf8_encode($_POST['desc']))."' where id= ".$_POST['id']);
      }

      
      echo "<script>document.location.href='editProjet.php?id=".$_POST['id']."&cat=".$_POST['cat']."';</script>";
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
            <small>Transports & Infrastructures</small>
          </h1>
          
        </section>


        <section class="content">
            



              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Edition projet<small></small></h3>
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
                            <option value="1" <?php if(isset($tt) and $tt[1] == "1")echo "selected"; ?> >En cours</option>
                            <option value="2" <?php if(isset($tt) and $tt[1] == "2")echo "selected"; ?>>Achev&eacute;</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Titre:</label>
                        <input type="text" class="form-control" name="titre" value="<?php if(isset($tt) and $tt[2])echo stripslashes(utf8_decode($tt[2])); ?>" />
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        
                        <textarea name="desc" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php if(isset($tt) and $tt[2])echo stripslashes(utf8_decode($tt[3])); ?></textarea>
                        
                    </div>
                    <div class="form-group">
                        <label>Logo:</label>
                        <br>
                        <img src="../images/uploads/<?php echo stripslashes(utf8_decode($tt[4]));?>" class="img-thumbnail" width="100" />
                        <br>
                        <input type="file" class="form-control" name="logo" />
                    </div>

                    <input type="hidden" name="id" value="<?php echo stripslashes(utf8_decode($tt[0]));?>" />
                    <input type="hidden" name="cat" value="<?php echo $_GET['cat'];?>" />
                    
                    <div class="box-footer">
                    <input type="submit" class="btn btn-default" value="Valider">
                  </div>
                  </form>
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
        $(".btn-spr-oui").attr("href", "projecttri.php?spr="+id);

        $(".modal-me").modal("show");
    });

    </script>

  </body>
</html>