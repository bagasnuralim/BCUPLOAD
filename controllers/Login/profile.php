<?php
	
	$username = $_GET['username'];
	
if(!$error)
	{
		header("location: ../../application.php?page=profileusers&username=$username");
	} else {
		session_start();
		$_SESSION['message'] = $error;
		header("location: ../../../application.php.php?page=setting");
	}
?>