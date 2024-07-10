<?php
session_start(); 

$valid_user =false;

if(isset($_SESSION["E_NAME"])){
	if(!empty($_SESSION["E_NAME"])){
		$valid_user =true;	
	}
}

if(!$valid_user){
	header("Location: logout.php");
	echo '<script type="text/javascript"> window.location="logout.php"; </script>';
}


?>