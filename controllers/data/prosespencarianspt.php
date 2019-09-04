<?php
	
	$nama = $_GET['nama'];
	
if(!$error)
	{
		header("location: ../../application.php?page=datasp&nama=$nama");
	} else {
		session_start();
		$_SESSION['message'] = $error;
		header("location: ../../../application.php.php?page=setting");
	}
?>
