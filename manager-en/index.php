<?php
session_start();
?>





<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>BIOUITRAVAUX | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="lte/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="lte/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="lte/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->



    <script language="javascript">
function verifier(){
  if(document.getElementById("login").value!="" && document.getElementById("pass").value!=""){
      try{xh1=new XMLHttpRequest();}
        catch(e){
          try{xh1=new ActiveXObject("Microsoft.XMLHTTP");}
          catch(e1){
            alert("Objet non supporté!");
          }
        }
      xh1.onreadystatechange=function(){
        if(xh1.readyState==4){
          data = JSON.parse(xh1.responseText);
          if(!data.validation){
            document.getElementById("divi").innerHTML=data.message;
          }else{
            document.write(data.message);
          }
        }else{
          document.getElementById("divi").innerHTML="<img src='images/loading.gif' />";
        }
      }
            
      xh1.open("post","ajax/ajax_auth.php",true);
      xh1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      xh1.send("login="+document.getElementById("login").value+"&pass="+document.getElementById("pass").value);
      }else{
        document.getElementById('divi').innerHTML="Les champs sont vides !";
      }
}
</script>


  </head>
  <body class="login-page" onload="showRecaptcha()">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>BIOUITRAVAUX</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">
          <div id="divi" style="font-size:11px;font-family:tahoma; color:#999999;"></div>
        </p>
        <form action="../../index2.html" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Login" id="login"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" id="pass" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="button" onclick="verifier()" class="btn btn-primary btn-block btn-flat">Valider</button>
            </div><!-- /.col -->
          </div>
        </form>

       

        

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="lte/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="lte/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="lte/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>