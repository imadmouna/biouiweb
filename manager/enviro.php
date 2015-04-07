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

  if(isset($_GET['texte']) and $_GET['texte']){
      mysql_query("update enviro set texte='".addslashes(utf8_encode($_GET['texte']))."'");
      echo "<script>document.location.href='enviro.php';</script>";
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
            <small>Texte environnement</small>
          </h1>
          
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
                  <form method="get">
                    <textarea name="texte" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                      <?php
                        $query = mysql_query("select texte from enviro");
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
        </section>

      </div>

      
    </div>

    <?php
      include("js.php");
    ?>
  </body>
</html>