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

  if(isset($_GET['texte']) and $_GET['texte']){
      mysql_query("update texte_projetsp set texte='".addslashes(utf8_encode($_GET['texte']))."'");
      echo "<script>document.location.href='projectsp.php';</script>";
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
          var myLatlng = new google.maps.LatLng(31.6346214,-8.0078531);
          var mapOptions = {
            zoom: 8,
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
            <small>Projets en images</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>


        <section class="content">
            <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Texte<small></small></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>

                <div class='box-body pad'>
                  <div class="alert alert-warning">
                      Pour inclure une photo sur la page, veuillez vous rendre sur la séction 
                      <b><i class="fa fa-upload"></i> Upload de fichiers</b>
                      <br>Ensuite r&eacute;cup&eacute;rez le chemin de l'image et cliquez sur 
                      <a class="btn btn-primary"><i class="fa fa-file-image-o"></i></a>
                  </div>

                  <form method="get">
                    <input type="text" name="point_gps" id="point_gps" style="width:100%">
                  </form>
                  <div id="map-canvas"></div>
                    
                    <div class="box-footer">
                    <input type="submit" class="btn btn-default" value="Valider">
                  </div>
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
  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template");
  previewNode.id = "";
  var previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);
   
  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
  url: "ajax/uploadProjetspPics.php", // Set the url
  thumbnailWidth: 80,
  thumbnailHeight: 80,
  parallelUploads: 20,
  previewTemplate: previewTemplate,
  autoQueue: false, // Make sure the files aren't queued until manually added
  previewsContainer: "#previews", // Define the container to display the previews
  clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  });
   
  myDropzone.on("addedfile", function(file) {
  // Hookup the start button
  file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
  });
   
  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
  document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
  });
   
  myDropzone.on("sending", function(file) {
  // Show the total progress bar when upload starts
  document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
  });
   
  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
  });
   
  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
  };
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true);
  }; 
  myDropzone.on("complete", function(file) {
            myDropzone.removeFile(file);
        });

myDropzone.on("success", function(e, responseText) {
        objet = JSON.parse(responseText);
          //alert(objet.fichier);
        $(".lst-fichiers-table").append(
          '<tr>'+
            '<td><span class="glyphicon glyphicon-paperclip"></span></td>'+
            '<td><img src="'+objet.fichier_complet+'" class="img-thumbnail" width="50" />&nbsp;'+objet.fichier+'</td>'+
            '<td>'+
              '<div class="pull-right col-md-5">'+
                '<div class="col-md-6">'+
                  '<a target="_blank" title="Afficher" '+
                  'href="'+objet.fichier_complet+'" class="btn btn-success btn-xs">'+
                    '<i class="glyphicon glyphicon-eye-open"></i> '+
                  '</a>'+
                '</div>'+
                '<div class="col-md-6">'+
                  '<a data-nom="'+objet.fichier+'" '+
                    'data-href="'+objet.fichier+'" title="Supprimer" '+
                    'class="btn-spr btn btn-danger btn-xs">'+
                    '<i class="glyphicon glyphicon-trash"></i> '+
                  '</a>'+
                '</div>'+
              '</div>'+
            '</td>'+
          '</tr>');

        $( "body" ).delegate( ".btn-spr", "click", function() {
          href = $(this).data("href");
          nom = $(this).data("nom");

          $(".modal-me .modal-title").html('<i class="fa fa-trash-o"></i> <b>Attention !</b>');
          $(".modal-me .modal-body").html('<p class="spr-msg"></p>');
          $(".modal-me .modal-footer").html(
              '<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>'+
                  '<a href="" class="btn btn-danger btn-spr-oui"><i class="glyphicon glyphicon-trash"></i> Supprimer</a>'
          );
          
          $(".modal-me").modal("show");
  
          $(".spr-msg").html("Voulez-vous vraiment supprimer ce fichier <b>' "+nom+" '</b> ?");
          $(".btn-spr-oui").attr("href", "projectsp.php?spr="+href);         
        });
                  
      });
$(".btn-spr").click(function(e){
          href = $(this).data("href");
          nom = $(this).data("nom");

          $(".modal-me .modal-title").html('<i class="fa fa-trash-o"></i> <b>Attention !</b>');
          $(".modal-me .modal-body").html('<p class="spr-msg"></p>');
          $(".modal-me .modal-footer").html(
              '<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>'+
                  '<a href="" class="btn btn-danger btn-spr-oui"><i class="glyphicon glyphicon-trash"></i> Supprimer</a>'
          );
          //jQuery(".modal-header").html(');
          $(".modal-me").modal("show");
  
          $(".spr-msg").html("Voulez-vous vraiment supprimer ce fichier <b>' "+nom+" '</b> ?");
          $(".btn-spr-oui").attr("href", "projectsp.php?spr="+href);
        });




</script>





  </body>
</html>