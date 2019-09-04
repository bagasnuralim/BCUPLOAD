<?php
	
	$kategori = $_GET['kategori'];
	
if(!$error)
	{
		header("location: ../../application.php?page=datasp&kategori=$kategori");
	} else {
		session_start();
		$_SESSION['message'] = $error;
		header("location: ../../../application.php.php?page=setting");
	}
?>
