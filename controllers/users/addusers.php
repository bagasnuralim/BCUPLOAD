<?php
	include '../../class/pengarsipan.php';
	$pengarsipan = new pengarsipan();

	//mengisi
	$pengarsipan->id_login = $_POST['id_login'];
	$pengarsipan->username = $_POST['username'];
	$pengarsipan->password = $_POST['password'];
	$pengarsipan->nama = $_POST['nama'];
	$pengarsipan->gmail = $_POST['gmail'];
	$pengarsipan->hak = $_POST['hak'];

	//tampung data error
	$error =$pengarsipan->createusers();

	//pengeceka n error
	if(!$error){
		header("location:../../application.php?page=addusers");
	} else {
		//membuat session untuk menampilkan pesan eror
		session_start();
		$_SESSION['message'] = $error;
		//memanggil tampilan create kembali
		echo "gagal";
	}
?>