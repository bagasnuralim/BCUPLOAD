<?php
	include '../../class/pengarsipan.php';
	$pengarsipan = new pengarsipan();

	//mengisi
	$pengarsipan->kategori = $_POST['kategori'];

	//tampung data error
	$error =$pengarsipan->createkategori();

	//pengeceka n error
	if(!$error){
		header("location:../../application.php?page=form-sp");
	} else {
		//membuat session untuk menampilkan pesan eror
		session_start();
		$_SESSION['message'] = $error;
		//memanggil tampilan create kembali
		echo "gagal";
	}
?>