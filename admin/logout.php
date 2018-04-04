<?php
	session_start();
	$admin = @$_SESSION['admin'];
	if(empty($admin)){
		header("Location:login.php");
	}else{
		unset($_SESSION['admin']);
		header("Location:login.php");
	}
?>	