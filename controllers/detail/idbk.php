<?php
	
	$id = $_GET['id'];
	
if(!$error)
	{
		header("location: ../../application.php?page=detailbk&id=$id");
	} else {
		session_start();
		$_SESSION['message'] = $error;
		header("location: ../../../application.php.php?page=setting");
	}
?>