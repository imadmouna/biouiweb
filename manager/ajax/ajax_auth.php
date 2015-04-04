<?php 
session_start();
include("../../fr/connect.php");
if(isset($_POST['login']) and isset($_POST['pass']) and $_POST['login'] and $_POST['pass']){

	

		$t=mysql_fetch_array(mysql_query("select * from manage where login='".addslashes($_POST['login'])."' and pass='".addslashes($_POST['pass'])."'"));
		if($t[0]){
			$_SESSION['admin']=$_POST['login'];
			$_SESSION['last_log']=$t['last_log'];
			mysql_query("update manage set last_log='".date("D d M H")."h".date(", Y")."'");
			echo json_encode(
					array(
						"validation"=>true,
						"message"=>"<script language='javascript'>document.location.href='accueil.php';</script>"
					)
				);
		}else{
			echo json_encode(
					array(
						"validation"=>false,
						"message"=>"Erreur, les donnees saisies sont incorrectes!"
					)
				);
		}
}
?>


<?php 
/*
session_start();
include("../../fr/connect.php");
if(isset($_POST['login']) and isset($_POST['pass']) and isset($_POST['recaptcha_response_field']) and isset($_POST['recaptcha_challenge_field']) and $_POST['login'] and $_POST['pass'] and $_POST['recaptcha_response_field'] and $_POST['recaptcha_challenge_field']){

	

	require_once('../captcha/recaptchalib.php');
	$privatekey = "6LdvmeUSAAAAAMhXaVjI75neB1XUP_huupaQeleP";
	$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

	if (!$resp->is_valid) {
		// What happens when the CAPTCHA was entered incorrectly
		echo "Erreur, le code n'est pas valide!!";
	} else {
    	// Your code here to handle a successful verification
		$t=mysql_fetch_array(mysql_query("select * from manage where login='".addslashes($_POST['login'])."' and pass='".addslashes($_POST['pass'])."'"));
		if($t[0]){
			//session_set_cookie_params( time() + 12000, './', 'seniorita-shop.com', true, true);
			$_SESSION['admin']=$_POST['login'];
			$_SESSION['last_log']=$t['last_log'];
			mysql_query("update manage set last_log='".date("D d M H")."h".date(", Y")."'");
			echo "<script language='javascript'>document.location.href='accueil.php';</script>";
		}else{
			echo "Erreur, les donnees saisies sont incorrectes!";
		}
	}
}
*/
?>