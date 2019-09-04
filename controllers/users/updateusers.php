<?php
	include "/../../class/pengarsipan.php";
	$pengarsipan = new pengarsipan();

	$pengarsipan->id_login = $_POST['id_login'];
	$pengarsipan->username = $_POST['username'];
	$pengarsipan->password = $_POST['password'];
	$pengarsipan->nama = $_POST['nama'];
	$pengarsipan->gmail = $_POST['gmail'];
	$pengarsipan->hak = $_POST['hak'];

	$error = $pengarsipan->update();

	
if(!$error){
			header("location: ../../application.php?page=datausers");
} else {
		session_start();
		$_SESSION['message'] = $error;
		header("location: ../../application.php?page=profileusers&id_login={$pengarsipan->id_login}");
}

	
?>