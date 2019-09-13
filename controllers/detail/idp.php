<?php
	
	$id_peminjaman = $_GET['id_peminjaman'];
	
if(!$error)
	{
		header("location: ../../application.php?page=detailp&id_peminjaman=$id_peminjaman");
	} else {
		session_start();
		$_SESSION['message'] = $error;
		header("location: ../../../application.php.php?page=setting");
	}
?>