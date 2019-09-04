<?php
	
	$nama_surat = $_GET['nama_surat'];
	
if(!$error)
	{
		header("location: ../../application.php?page=databm&nama_surat=$nama_surat");
	} else {
		session_start();
		$_SESSION['message'] = $error;
		header("location: ../../../application.php.php?page=setting");
	}
?>