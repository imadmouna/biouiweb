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

  $t = "";
  if(isset($_GET['id'])){
    if(($_GET['id'])){
        $q = mysql_query("select * from machines where id = ".$_GET['id']);
        $t = mysql_fetch_array( $q );
    }
  }

  
  if(isset($_POST['des']) and isset($_POST['spec']) and isset($_POST['nbr']) and isset($_POST['cat']) and isset($_POST['id'])){
    if(($_POST['des']) and ($_POST['spec']) and ($_POST['nbr']) and ($_POST['cat']) and ($_POST['id'])){


      

        mysql_query("update machines set designation = '"
                .addslashes(utf8_encode($_POST['des']))
                ."', specification='".addslashes(utf8_encode($_POST['spec']))
                ."', nbr=".addslashes(utf8_encode($_POST['nbr']))
                .", cat=".addslashes(utf8_encode($_POST['cat']))." where id=".$_POST['id']);
      
      
      echo "<script>alert('Modification valide !');</script>";
      echo "<script>document.location.href='edit_machine.php?id=".$_POST['id']."';</script>";
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
            <small>Edition machine</small>
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
                  <form method="POST" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label>Cat&eacute;gorie</label>
                        <select class="form-control" name="cat">
                          <?php
                            $aa = mysql_query("select * from cat_machine order by cat desc");
                            while($ta = mysql_fetch_array($aa)){
                          ?>
                            <option <?php if($ta[0]==$t[4])echo "selected"?> value="<?php echo $ta[0];?>"><?php echo stripslashes(utf8_decode($ta[1]));?></option>
                          <?php
                            }
                          ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>D&eacute;signation</label>
                        <input type="text" name="des" class="form-control" value="<?php if($t) echo stripslashes(utf8_decode($t[1])); ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Sp&eacute;cification</label>
                        <input type="text" name="spec" class="form-control" value="<?php if($t) echo stripslashes(utf8_decode($t[2])); ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nbr" class="form-control" value="<?php if($t) echo stripslashes(utf8_decode($t[3])); ?>">
                    </div>
                    
                    <input type="hidden" name="id" value="<?php if(isset($_GET['id']) and $_GET['id']) echo $_GET['id']; ?>" />
                    
                    <div class="box-footer">
                    <input type="submit" class="btn btn-default" value="Valider">
                  </div>
                  </form>

                  

                  



                </div>
              </div>
        </section>

      </div>




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

    <?php
      include("js.php");
    ?>


    <script type="text/javascript">

    $(".btn-spr").click(function(e){
        e.preventDefault();

        id = $(this).data("id");
        nom = $(this).data("nom");

        $(".spr-msg").html("Voulez-vous vraiment supprimer <b>' "+nom+" '</b> ?");
        $(".btn-spr-oui").attr("href", "machines.php?spr="+id);

        $(".modal-me").modal("show");
    });

    </script>

  </body>
</html>