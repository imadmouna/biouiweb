<?php
session_start();
if(!isset($_SESSION["admin"])){
  echo "<script language='javascript'>document.location.href='index.php';</script>";
}

if(isset($_REQUEST["dec"]) and $_REQUEST["dec"]=="1"){
  session_destroy();
  echo "<script language='javascript'>document.location.href='index.php';</script>";
}
  include("../connect.php");

  if(isset($_GET['spr'])){
    if(($_GET['spr'])){
      mysql_query("delete from activites where id=".$_GET["spr"]);
      echo "<script>alert('Suppression valide !');</script>";
      echo "<script>document.location.href='activites.php';</script>";
    }
  }
  if(isset($_POST['titre']) and isset($_POST['texte']) and isset($_FILES['photo']['tmp_name'])){
    if(($_POST['titre']) and ($_POST['texte']) and ($_FILES['photo']['tmp_name'])){

      $path = $_FILES['photo']['name'];
      $ext = pathinfo($path, PATHINFO_EXTENSION);

      $chemin = "images/others/".sha1(time()).".".$ext;
      mysql_query("insert into activites values(null,'"
              .addslashes(utf8_encode($_POST['titre']))
        ."','".addslashes(utf8_encode($_POST['texte']))."','".$chemin."')");
      copy($_FILES['photo']['tmp_name'], "../".$chemin);
      echo "<script>alert('Insertion valide !');</script>";
      echo "<script>document.location.href='activites.php';</script>";
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

        <nav class="navbar navbar-static-top" role="navigation">

          <a href="main.php" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              

              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">Alexander Pierce</span>
                </a>
                <ul class="dropdown-menu">

                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      Alexander Pierce - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>

                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <?php include("menu.php");?>

      <div class="content-wrapper">

        <section class="content-header">
          <h1>
            <small>Nos activit&eacute;s</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>


        <section class="content">
            <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'><small></small></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>

                <div class='box-body pad'>
                  <form method="POST" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label>Titre</label>
                        <input type="text" name="titre" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Texte</label>
                         <textarea name="texte" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" class="form-control" name="photo">
                    </div>
                    
                    <div class="box-footer">
                    <input type="submit" class="btn btn-default" value="Valider">
                  </div>
                  </form>

                  <br><br>

                  <table class="table table-striped">
                      <tr>
                          <td>Photo</td>
                          <td>Titre</td>
                          <td>Texte</td>
                          <td></td>
                      </tr>
                      <?php
                          $query = mysql_query("select * from activites order by id desc");
                          while($t = mysql_fetch_array($query)){
                      ?>
                      <tr>
                          <td>
                              <img src="../<?php echo stripslashes(utf8_decode($t[3])); ?>" width="100" class="thumbnail" />
                          </td>
                          <td>
                              <?php echo stripslashes(utf8_decode($t[1])); ?>
                          </td>
                          <td>
                              <?php echo substr(stripslashes(utf8_decode($t[2])),0,100)."..."; ?>
                          </td>
                          <td>
                              <a href="editActivite.php?id=<?php echo $t[0]; ?>" class="btn btn-success pull-right"><i class="fa fa-edit"></i> Modifier</a>
                              <a href="?spr=<?php echo $t[0]; ?>" class="btn btn-danger pull-right"><i class="fa fa-times"></i> Supprimer</a>
                          </td>
                      </tr>

                      <?php
                        }
                      ?>
                  </table>



                </div>
              </div>
        </section>

      </div>

      
    </div>

    <script src="lte/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="lte/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="lte/plugins/morris/morris.min.js" type="text/javascript"></script>
    <script src="lte/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <script src="lte/plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <script src="lte/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="lte/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <script src="lte/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script src="lte/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src='lte/plugins/fastclick/fastclick.min.js'></script>
    <script src="lte/dist/js/app.min.js" type="text/javascript"></script>
    <script src="lte/dist/js/pages/dashboard.js" type="text/javascript"></script>
    <script src="lte/dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>