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

  if(isset($_GET['id']) and $_GET['id']){
      $qsq = mysql_query("select * from gps where id = ".$_GET['id']);
      $tqss = mysql_fetch_array($qsq);
  }


  if(isset($_GET['point_gps']) and $_GET['point_gps'] and isset($_GET['titre']) and $_GET['titre'] and isset($_GET['id']) and $_GET['id']){
    mysql_query("update gps set point = '".$_GET['point_gps']."', titre = '".addslashes(utf8_encode($_GET['titre']))."' where id = ".$_GET['id']);
    echo "<script>document.location.href='editPoint.php?id=".$_GET['id']."';</script>";
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


    <style>
          #map-canvas {
            height: 400px;
            margin: 0px;
            padding: 0px;
            position: relative;
          }
          #myForm{
            width:400px;
            position: absolute;
            top: 75px;
            left:20px;
            background-color: white;
            padding: 30px 10px 30px 10px;
          }
        </style>
        
        
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
      <script>
      
        var map;
        function initialize() {
          var myLatlng = new google.maps.LatLng(<?php if(isset($tqss) and $tqss[1])echo $tqss[1];else echo "31.6346214,-8.0078531";?>);
          var mapOptions = {
            zoom: 14,
            center: myLatlng,
            disableDefaultUI: true
          };
          map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

          var marker = new google.maps.Marker({
            draggable: true,
            position: myLatlng, 
            map: map,
            title: "Your location"
          });
          google.maps.event.addListener(marker, 'dragend', function (event) {
              lat = this.getPosition().lat();
              lng = this.getPosition().lng();
              $("#point_gps").val(lat+","+lng);
          });
        }
        
        google.maps.event.addDomListener(window, 'load', initialize);
    
        </script>



    <link href="../css/dropzone.css" type="text/css" rel="stylesheet" /> 
    <script src="../js/dropzone.js"></script>

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
            <small>Coordonn&eacute;es Gps</small>
          </h1>
          
        </section>


        <section class="content">
            <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Modification du point<small></small></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>

                <div class='box-body pad'>
                  

                  <form method="get">
                    <div class="form-group">
                      <label>Titre</label>
                      <input type="text" name="titre" id="titre" class="form-control" value="<?php if(isset($tqss) and $tqss[2])echo $tqss[2];?>">
                    </div>
                    <div class="form-group">
                      <label>Gps</label>
                      <input type="text" name="point_gps" id="point_gps" class="form-control" value="<?php if(isset($tqss) and $tqss[1])echo $tqss[1];?>">
                    </div>
                    <div id="map-canvas"></div>
                    
                    <div class="box-footer">
                    <input type="submit" class="btn btn-default" value="Valider">
                  </div>
                  <input type="hidden" name="id" value="<?php if(isset($_GET['id']) and $_GET['id'])echo $_GET['id'];?>">
                  </form>




                  

                </div>
              </div>



              

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
        $(".btn-spr-oui").attr("href", "gps.php?spr="+id);

        $(".modal-me").modal("show");
    });

    </script>




  </body>
</html>