<?php
	session_start();
	$home = @$_SESSION['home'];
	if(empty($home)){
		header("Location:login.php");
	}else{
		unset($_SESSION['home']);
		unset($_SESSION['home_username']);
		header("Location:index.php");
	}
?>	