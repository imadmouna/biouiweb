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
      mysql_query("update texte_reference set texte='".addslashes(utf8_encode($_GET['texte']))."'");
      echo "<script>document.location.href='gps.php';</script>";
  }



  if(isset($_GET['spr']) and $_GET['spr']){
      mysql_query("delete from uploadreferencepics where chemin like '%".$_GET['spr']."%'");
      unlink("../images/uploads/references/small/".$_GET['spr']);
      unlink("../images/uploads/references/big/".$_GET['spr']);
      echo "<script>document.location.href='gps.php';</script>";
  }


  if(isset($_GET['point_gps']) and $_GET['point_gps'] and isset($_GET['titre']) and $_GET['titre']){
    mysql_query("insert into gps values(null, '".$_GET['point_gps']."', '".addslashes(utf8_encode($_GET['titre']))."')");
    echo "<script>document.location.href='gps.php';</script>";
  }


  if(isset($_GET['spr'])){
    if(($_GET['spr'])){
      mysql_query("delete from gps where id=".$_GET["spr"]);
      echo "<script>alert('Suppression valide !');</script>";
      echo "<script>document.location.href='gps.php';</script>";
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
            <small>Coordonn&eacute;es Gps</small>
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
                    <textarea name="texte" class="textarea" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                      <?php
                        $query = mysql_query("select texte from texte_reference");
                        $t = mysql_fetch_array($query);
                        echo utf8_decode($t[0]);                        
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
                  <h3 class='box-title'>Logos<small></small></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>

                <div class='box-body pad'>
                  <div id="actions" class="row">

                    <div class="col-lg-7">
                      <!-- The fileinput-button span is used to style the file input field as button -->
                      <span class="btn btn-success fileinput-button dz-clickable">
                          <i class="glyphicon glyphicon-plus"></i>
                          <span>Ajouter des images...</span>
                      </span>
                      <button type="submit" class="btn btn-primary start">
                          <i class="glyphicon glyphicon-upload"></i>
                          <span>Commencer l'upload</span>
                      </button>
                      <button type="reset" class="btn btn-warning cancel">
                          <i class="glyphicon glyphicon-ban-circle"></i>
                          <span>Annuler</span>
                      </button>
                    </div>

                    <div class="col-lg-5">
                      <!-- The global file processing state -->
                      <span class="fileupload-process">
                        <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                          <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress=""></div>
                        </div>
                      </span>
                    </div>

                  </div>

                  <div class="table table-striped" class="files" id="previews">
                   
                  <div id="template" class="file-row">
                  <!-- This is used as the file preview template -->
                  <div>
                  <span class="preview"><img data-dz-thumbnail /></span>
                  </div>
                  <div>
                  <p class="name" data-dz-name></p>
                  <strong class="error text-danger" data-dz-errormessage></strong>
                  </div>
                  <div>
                  <p class="size" data-dz-size></p>
                  <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                  </div>
                  </div>
                  <div>
                  <button class="btn btn-primary start">
                  <i class="glyphicon glyphicon-upload"></i>
                  <span>Commencer</span>
                  </button>
                  <button data-dz-remove class="btn btn-warning cancel">
                  <i class="glyphicon glyphicon-ban-circle"></i>
                  <span>Annuler</span>
                  </button>
                  <button data-dz-remove class="btn btn-danger delete">
                  <i class="glyphicon glyphicon-trash"></i>
                  <span>Supprimer</span>
                  </button>
                  </div>
                  </div>
                   
                  </div> 

<table class="table table-striped lst-fichiers-table">

<?php
  $qq = mysql_query("select * from uploadreferencepics order by id DESC");
  while($ttq = mysql_fetch_array($qq)){
?>
          <tr>
            <td><span class="glyphicon glyphicon-paperclip"></span></td>
            <td>
              <img src="../images/uploads/references/small/<?php echo $ttq[1];?>" width="50" class="img-thumbnail" />
              <?php echo $ttq[1];?></td>
            
            <td>
              <div class="pull-right col-md-5">
                <div class="col-md-6">
                  <a target="_blank" title="Afficher" 
                  href="../images/uploads/references/small/<?php echo $ttq[1];?>" class="btn btn-success btn-xs">
                    <i class="glyphicon glyphicon-eye-open"></i> 
                  </a>
                </div>
                <div class="col-md-6">
                  <a data-nom="<?php echo $ttq[1];?>" title="Supprimer" 
                    data-href="<?php echo $ttq[1];?>" 
                    class="btn-spr btn btn-danger btn-xs">
                    <i class="glyphicon glyphicon-trash"></i> 
                  </a>
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






            <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Cr&eacute;ation d'un point<small></small></h3>
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
                      <input type="text" name="titre" id="titre" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Gps</label>
                      <input type="text" name="point_gps" id="point_gps" class="form-control">
                    </div>
                    <div id="map-canvas"></div>
                    
                    <div class="box-footer">
                    <input type="submit" class="btn btn-default" value="Valider">
                  </div>
                  </form>




                  <table class="table table-striped">
                      <tr>
                          <td>Titre</td>
                          <td>Gps</td>
                          <td></td>
                      </tr>
                      <?php
                        $sq = mysql_query("select * from gps order by id desc");
                        while ($tsq = mysql_fetch_array($sq)){
                      ?>

                      <tr>
                          <td><?php echo stripslashes(utf8_decode($tsq[2]));?></td>
                          <td><?php echo stripslashes(utf8_decode($tsq[1]));?></td>
                          <td>
                              <div class="col-md-8 pull-right">
                                  <div class="col-md-6">
                                      <a href="editPoint.php?id=<?php echo $tsq[0];?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Modifier<a/>
                                  </div>
                                  <div class="col-md-6">
                                      <a data-nom="<?php echo stripslashes(utf8_decode($tsq[2])); ?>" data-id="<?php echo $tsq[0];?>" class="btn btn-danger btn-spr btn-xs"><i class="fa fa-times"></i> Supprimer<a/>
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
  url: "ajax/uploadReferencePics.php", // Set the url
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
          $(".btn-spr-oui").attr("href", "machine_text_photo.php?spr="+href);         
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
          $(".btn-spr-oui").attr("href", "machine_text_photo.php?spr="+href);
        });




</script>

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